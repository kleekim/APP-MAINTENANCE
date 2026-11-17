<?php

namespace App\Http\Controllers;

use App\Models\FicheAccueil;
use App\Models\FicheIntervention;
use App\Models\Facture;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;

class CommercialDashboardController extends Controller
{
    public function dashboard_commercial()
    {

        // KPIs principaux

        $totalfiches_accueils      = FicheAccueil::count();
        $totalfiches_interventions = FicheIntervention::count();
        $totalfactures             = Facture::count();
 

        // Dernières demandes

        $dernieresDemandes = FicheAccueil::latest()->take(5)->get();


        // RÉPARTITION DES DEMANDES

        $demandes = Demande::select('statut', DB::raw('count(*) as total'))
            ->groupBy('statut')
            ->pluck('total', 'statut');

        $demandesAttente    = $demandes['en_attente'] ?? 0;
        $demandesEnCours    = $demandes['en_cours'] ?? 0;
        $demandesApprouvees = $demandes['approuve'] ?? 0;
        $demandesTerminees  = $demandes['termine'] ?? 0;

        $totalDemandes = $demandesAttente + $demandesEnCours + $demandesApprouvees + $demandesTerminees;


        //  ACTIVITÉ RÉCENTE


        // demandes semaine
        $demandesSemaine = Demande::where('created_at', '>=', now()->startOfWeek())->count();

        // interventions semaine
        $interventionsSemaine = FicheIntervention::where('created_at', '>=', now()->startOfWeek())->count();

        // nouveaux clients mois
        $nouveauxClients = User::role('client')
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();

        // factures mois
        $facturesMois = Facture::where('created_at', '>=', now()->startOfMonth())->count();


        //  CHAT 

        $client = User::role('client')->first();


        //  RETURN VIEW

        return view('commercial.dashboard', compact(
            'totalfiches_accueils',
            'totalfiches_interventions',
            'totalfactures',
            'dernieresDemandes',

            'demandesAttente',
            'demandesEnCours',
            'demandesApprouvees',
            'demandesTerminees',

            'demandesSemaine',
            'interventionsSemaine',
            'nouveauxClients',
            'facturesMois'
        ) + [
            'chatPartnerId' => $client?->id
        ]);
    }
}