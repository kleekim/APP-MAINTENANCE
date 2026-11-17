<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Support\Str;

class RapportsController extends Controller
{
    public function rapport()
    {
        $demandes = Demande::where('statut', 'termine')
            ->whereHas('facture')
            ->with('facture')
            ->get();

        $total = $demandes->count();

        $classement = $demandes
            ->groupBy(fn ($d) => self::categoriser($d->panne))
            ->map(fn ($groupe, $type) => [
                'type'        => $type,
                'total'       => $groupe->count(),
                'part'        => round($groupe->count() / $total * 100),
                'delai_moyen' => round($groupe->avg('delai_traitement_minutes')),
                'derniere'    => $groupe->max('created_at'),
            ])
            ->sortByDesc('total')
            ->values();

        return view('admin.rapport.suivi_rapport', compact('classement', 'total'));
    }

    private static function categoriser(?string $panne): string
    {
        
        $texte = Str::lower(Str::ascii($panne ?? ''));

        
        $types = [
            'Logiciel / Système' => [
                'ecran bleu', 'windows', 'systeme', 'virus', 'logiciel', 'application',
                'mise a jour', 'installation', 'session', 'mot de passe', 'bug',
            ],
            'Mémoire / Stockage' => [
                'memoire', 'ram$', 'disque', 'ssd', 'stockage', 'lent',
                'lenteur', 'ralenti', 'plante', 'fige', 'bloque', 'saturee',
            ],
            'Écran / Affichage' => [
                'ecran', 'affichage', 'moniteur', 'image', 'pixel', 'lignes', 'fissure',
            ],
            'Réseau / Internet' => [
                'reseau', 'internet', 'wifi', 'wi-fi', 'connexion', 'connecte', 'routeur', 'ethernet',
            ],
            'Imprimante' => [
                'imprim', 'toner', 'encre', 'scanner', 'papier',
            ],
            'USB / Périphérique' => [
                'usb', 'cle$', 'clavier', 'souris', 'webcam', 'casque', 'haut-parleur', 'touche',
            ],
            'Panne matérielle' => [
                'allume', 'demarre pas', 'demarre plus', 'eteint', 'chauffe', 'surchauffe',
                'ventilateur', 'bruit', 'batterie', 'chargeur', 'charge', 'alimentation',
                'carte mere', 'tombe', 'chute', 'casse', 'choc', 'liquide', 'eau', 'brule',
            ],
        ];

        foreach ($types as $type => $motsCles) {
            foreach ($motsCles as $mot) {
                $motif = str_ends_with($mot, '$')
                    ? '/\b' . preg_quote(rtrim($mot, '$'), '/') . '\b/'
                    : '/\b' . preg_quote($mot, '/') . '/';

                if (preg_match($motif, $texte)) {
                    return $type;
                }
            }
        }

        // Le client mentionne seulement son ordinateur, sans précision : on reste sur le matériel
        if (preg_match('/\b(ordinateur|portable|laptop|pc)\b/', $texte)) {
            return 'Panne matérielle';
        }

        return 'Autre';
    }
}