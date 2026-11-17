<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture; 
use App\Models\Demande;
use App\Models\User;
use App\Notifications\NouvelleFactureRecue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClientNotification;
use App\Models\FicheIntervention;
class FacturationController extends Controller
{
    public function facturation($demande_id)
    {
        $demande = Demande::findOrFail($demande_id);
        $facture = Facture::where('demande_id', $demande_id)->first();
        $ficheIntervention = FicheIntervention::where('demande_id', $demande_id)->first();

        return view('commercial.facturation', compact('demande', 'facture', 'ficheIntervention'));
    }

    public function store(Request $request, $demande_id)
    {
        
        $request->validate([
            'Date'        => 'required|date',
            'Doit'        => 'required|string|max:255',
            'Objet'       => 'required|string|max:255',
            'Designation' => 'required|string',
            'Montant'     => 'required|string|max:255',
        ], [
            'Date.required'        => 'La date est obligatoire.',
            'Doit.required'        => 'Le champ "Doit" est obligatoire.',
            'Objet.required'       => 'L\'objet est obligatoire.',
            'Designation.required' => 'La désignation est obligatoire.',
            'Montant.required'     => 'Le montant est obligatoire.',
        ]);

       
        $total = $this->calculerTotal($request->Montant);

        if ($total <= 0 || $total >= 1000000000) {
            return back()
                ->withErrors(['Montant' => 'Veuillez saisir des montants valides (un montant par ligne, total inférieur à un milliard).'])
                ->withInput();
        }

        $demande = Demande::findOrFail($demande_id);

        $facture = Facture::create([
            'user_id'       => auth()->id(),
            'demande_id'    => $demande->id,
            'Date'          => $request->Date,
            'Numéro'        => $request->Numéro,
            'Doit'          => $request->Doit,
            'Objet'         => $request->Objet,
            'Designation'   => $request->Designation,
            'Montant'       => $request->Montant,
            'Total'         => $total,
            'Total_lettres' => $this->totalEnLettres($total),
            'statut'        => 'facturée',
        ]);

        // Passer la demande en "terminé" dès que la facture est émise
        $demande->update(['statut' => 'termine']);

        $recouvreurs = User::role('recouvrement')->get();
        Notification::send($recouvreurs, new NouvelleFactureRecue($facture));

        // Notifier le client
        $demande->user->notify(new ClientNotification(
            'Votre matériel a été réparé et votre facture a été émise. Veuillez vous rapprocher de l\'ACSI pour le paiement et la récupération de votre matériel.',
            'facture'
        ));

        return redirect()
            ->route('commercial.facturation', $demande->id)
            ->with('success', 'Facture enregistrée avec succès.');
    }

    public function update(Request $request, Facture $facture)
    {
        // Validation EN PREMIER
        $request->validate([
            'Date'        => 'required|date',
            'Doit'        => 'required|string|max:255',
            'Objet'       => 'required|string|max:255',
            'Designation' => 'required|string',
            'Montant'     => 'required|string|max:255',
        ], [
            'Date.required'        => 'La date est obligatoire.',
            'Doit.required'        => 'Le champ "Doit" est obligatoire.',
            'Objet.required'       => 'L\'objet est obligatoire.',
            'Designation.required' => 'La désignation est obligatoire.',
            'Montant.required'     => 'Le montant est obligatoire.',
        ]);

        // Calcul du total côté serveur
        $total = $this->calculerTotal($request->Montant);

        if ($total <= 0 || $total >= 1000000000) {
            return back()
                ->withErrors(['Montant' => 'Veuillez saisir des montants valides (un montant par ligne, total inférieur à un milliard).'])
                ->withInput();
        }

        $facture->update([
            'Date'          => $request->Date,
            'Doit'          => $request->Doit,
            'Objet'         => $request->Objet,
            'Designation'   => $request->Designation,
            'Montant'       => $request->Montant,
            'Total'         => $total,
            'Total_lettres' => $this->totalEnLettres($total),
            'statut'        => 'facturée',
        ]);

        // la demande reste bien en "termine" après modification
        $facture->demande->update(['statut' => 'termine']);

        return redirect()
            ->route('commercial.facturation', $facture->demande_id)
            ->with('success', 'Facture modifiée avec succès.');
    }


    private function calculerTotal(?string $montants): int
    {
        $total = 0;

        foreach (preg_split('/\R/', $montants ?? '') as $ligne) {
            $chiffres = preg_replace('/\D/', '', $ligne);
            if ($chiffres !== '') {
                $total += (int) $chiffres;
            }
        }

        return $total;
    }

    private function totalEnLettres(int $n): string
    {
        $millions = intdiv($n, 1000000) % 1000;
        $milliers = intdiv($n, 1000) % 1000;
        $reste    = $n % 1000;
        $parties  = [];

        if ($millions > 0) {
            $parties[] = $this->moinsDeMille($millions, true) . ' million' . ($millions > 1 ? 's' : '');
        }
        if ($milliers > 0) {
            $parties[] = $milliers === 1 ? 'mille' : $this->moinsDeMille($milliers, false) . ' mille';
        }
        if ($reste > 0) {
            $parties[] = $this->moinsDeMille($reste, true);
        }

        $texte = implode(' ', $parties);
        $texte = mb_strtoupper(mb_substr($texte, 0, 1)) . mb_substr($texte, 1);
        $de    = ($n % 1000000 === 0) ? ' de' : '';

        return $texte . $de . ' francs CFA';
    }

    private function moinsDeCent(int $n, bool $final): string
    {
        $unites = ['zéro', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf',
            'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize'];
        $dizaines = ['', '', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante'];

        if ($n < 17) {
            return $unites[$n];
        }
        if ($n < 20) {
            return 'dix-' . $unites[$n - 10];
        }
        if ($n < 70) {
            $d = intdiv($n, 10);
            $u = $n % 10;
            if ($u === 0) {
                return $dizaines[$d];
            }
            if ($u === 1) {
                return $dizaines[$d] . ' et un';
            }
            return $dizaines[$d] . '-' . $unites[$u];
        }
        if ($n < 80) {
            if ($n === 71) {
                return 'soixante et onze';
            }
            return 'soixante-' . $this->moinsDeCent($n - 60, $final);
        }
        if ($n === 80) {
            return $final ? 'quatre-vingts' : 'quatre-vingt';
        }
        return 'quatre-vingt-' . $this->moinsDeCent($n - 80, $final);
    }

    private function moinsDeMille(int $n, bool $final): string
    {
        $unites = ['zéro', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf'];
        $c = intdiv($n, 100);
        $r = $n % 100;

        if ($c === 0) {
            return $this->moinsDeCent($r, $final);
        }

        $texte = ($c === 1) ? 'cent' : $unites[$c] . ' cent';

        if ($r === 0) {
            return ($c > 1 && $final) ? $texte . 's' : $texte;
        }

        return $texte . ' ' . $this->moinsDeCent($r, $final);
    }
}