<?php

namespace App\Http\Controllers;

use App\Models\FicheAccueil;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Notifications\FicheAccueilTechnicienNotification;
use App\Notifications\FicheAccueilCommercialeNotification;
use App\Models\User;

class FichesAccueilController extends Controller
{
    public function fiche_accueil($id = null)
    {
        $demande = $id ? \App\Models\Demande::findOrFail($id) : null;
        $fiche = $demande ? FicheAccueil::where('demande_id', $demande->id)->first() : null;

        return view('commercial.fiches_accueil', compact('demande', 'fiche'));
    }

    
    public function store(Request $request, $demande_id)
    {
        $request->validate([
            'type_machine'            => 'required|string|max:255',
            'accessoires'             => 'required|string|max:255',
            'informations_commercial' => 'required|string',
        ], [
            'type_machine.required'            => 'Le champ "Type de machines" est obligatoire.',
            'accessoires.required'             => 'Le champ "Accessoires" est obligatoire.',
            'informations_commercial.required' => 'Le champ "Informations commerciales" est obligatoire.',
        ]);

        $demande = Demande::findOrFail($demande_id);

        $fiche = FicheAccueil::create([
            'user_id'                  => auth()->id(),
            'demande_id'               => $demande->id,
            'type_machine'             => $request->type_machine,
            'accessoires'              => $request->accessoires,
            'informations_commerciale' => $request->informations_commercial,
            'Nom_agent_commercial'     => auth()->user()->name,
            'statut'                   => 'brouillon',
        ]);  

       
        $techniciens = User::role('technicien')->get();
        foreach ($techniciens as $technicien) {
            $technicien->notify(new FicheAccueilTechnicienNotification($fiche));
        }  

        return redirect()
            ->route('commercial.fiches_accueil', $demande->id)
            ->with('success', 'Fiche enregistrée avec succès.');
    }

    // Modifier la fiche (commercial) et aucune notification, c'est juste une modification
    public function update(Request $request, FicheAccueil $fiche)
    {
        $request->validate([
            'type_machine'            => 'required|string|max:255',
            'accessoires'             => 'required|string|max:255',
            'informations_commercial' => 'nullable|string',
        ], [
            'type_machine.required' => 'Le champ "Type de machine" est obligatoire.',
            'accessoires.required'  => 'Le champ "Accessoires" est obligatoire.',
        ]);

        $fiche->update([
            'type_machine'             => $request->type_machine,
            'accessoires'              => $request->accessoires,
            'informations_commerciale' => $request->informations_commercial,
        ]);


        return redirect()
            ->route('commercial.fiches_accueil', $fiche->demande->id)
            ->with('success', 'Informations mises à jour avec succès.');
    }

    // Modifier la fiche (technicien) et notifié le commercial UNE SEULE FOIS
    public function updateTechnicien(Request $request, FicheAccueil $fiche)
    {
        $request->validate([
            'informations_technicien' => 'required|string',
        ], [
            'informations_technicien.required' => 'Le champ "Informations technicien" est obligatoire.',
        ]);

        // On vérifie AVANT la mise à jour si le technicien remplissait sa partie pour la 1ère fois
        $estPremierRemplissage = empty($fiche->informations_technicien);

        $fiche->update([
            'informations_technicien' => $request->informations_technicien,
            'Nom_technicien'          => auth()->user()->name,
            'statut'                  => 'completee',
        ]);

        // Notification envoyée UNE SEULE FOIS (uniquement au premier remplissage)
        if ($estPremierRemplissage) {
            $commercial = User::find($fiche->user_id);
            if ($commercial) {
                $commercial->notify(new FicheAccueilCommercialeNotification($fiche));
            }
        }

        return redirect()
            ->route('technicien.fiches_accueil', $fiche->demande->id)
            ->with('success', 'Informations enregistrées avec succès.');
    }
}