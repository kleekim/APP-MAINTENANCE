<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\FicheIntervention;

class SuiviInterventionController extends Controller
{
    public function suivi_intervention()
    {
        $interventions = FicheIntervention::with('demande.ficheaccueil', 'demande.client')
            ->latest()
            ->get();

        // Les stats basées sur les demandes ayant une fiche intervention

        $totalInterventions = Demande::has('ficheIntervention')->count();

        $enCours = Demande::where('statut', 'en_cours')
            ->whereHas('ficheIntervention')
            ->count();

        $terminees = Demande::where('statut', 'termine')
            ->whereHas('ficheIntervention')
            ->count();


        return view('admin.interventions.suivi_interventions', compact(
            'interventions',
            'totalInterventions',
            'enCours',
            'terminees'
        ));
    }
}
