<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Support\Facades\Auth;

class SuiviDemandeController extends Controller
{
    public function demande()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $demandes = $user->demande()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('CLIENTS.Clients_Particuliers.suivi_demande', compact('demandes'));
    }

    //  méthode pour le dashboard client la partie des demandes récentes

    public function dashboard()
    {
        $user = Auth::user();

        $query = $user->demande();

        $recentDemandes = (clone $query)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $totaldemandes = (clone $query)->count();

        $demandesEnCours = (clone $query)
            ->whereIn('statut', ['en_cours', 'en cours'])
            ->count();

        $demandesTerminees = (clone $query)
            ->whereIn('statut', ['termine', 'terminé'])
            ->count();

        return view('CLIENTS.Clients_Particuliers.client_Dashboard', [
            'recentDemandes' => $recentDemandes,
            'totaldemandes' => $totaldemandes,
            'demandesEnCours' => $demandesEnCours,
            'demandesTerminees' => $demandesTerminees,
        ]);
    }
}
