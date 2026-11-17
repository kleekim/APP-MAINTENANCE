<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\FicheAccueil;
use Illuminate\Support\Facades\DB;

class TechnicienDashboardController extends Controller
{
    public function dashboard_technicien()
    {
        $enCours = Demande::where('statut', 'en_cours')
            ->whereHas('ficheIntervention')
            ->count();

        $terminees = Demande::where('statut', 'termine')
            ->whereHas('ficheIntervention')
            ->count();

        // Matériel le plus souvent en panne
        $materielsFrequents = FicheAccueil::select(
                DB::raw('TRIM(LOWER(type_machine)) as materiel_normalise'),
                DB::raw('count(*) as total')
            )
            ->whereNotNull('type_machine')
            ->where('type_machine', '!=', '')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('materiel_normalise')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $materielLabels = $materielsFrequents->pluck('materiel_normalise')
            ->map(fn($m) => ucfirst($m))
            ->toArray();

        $materielValeurs = $materielsFrequents->pluck('total')->toArray();

        // Évolution des pannes sur 30 jours (un point par jour)
        $pannesParJour = Demande::whereNotNull('panne')
            ->where('panne', '!=', '')
            ->where('created_at', '>=', now()->subDays(29)->startOfDay())
            ->selectRaw('DATE(created_at) as jour, COUNT(*) as total')
            ->groupBy('jour')
            ->pluck('total', 'jour');

        $evolutionLabels = [];
        $evolutionValeurs = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $evolutionLabels[] = now()->subDays($i)->format('d/m');
            $evolutionValeurs[] = $pannesParJour->get($date, 0);
        }

        return view('technicien.dashboard', compact(
            'enCours',
            'terminees',
            'materielLabels',
            'materielValeurs',
            'evolutionLabels',
            'evolutionValeurs'
        ));
    }

    public function rapportPannes()
    {
        $demandes = Demande::whereNotNull('panne')
            ->where('panne', '!=', '')
            ->latest()
            ->paginate(20);

        return view('technicien.rapports_pannes', compact('demandes'));
    }
}