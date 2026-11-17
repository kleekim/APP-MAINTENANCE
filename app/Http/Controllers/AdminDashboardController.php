<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AdminDashboardController extends Controller
{

    use AuthorizesRequests;

    public function index(Request $request)
    {

        $totalUsers      = User::count();
        $totalClients    = User::role('client')->count();
        $totalTechniciens = User::role('technicien')->count();
        $totalAdmins     = User::role('administrateur')->count();
        $totalDemandes   = Demande::count();



        $demandesParMois = Demande::select(
            DB::raw('MONTH(created_at) as mois'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('mois')
            ->orderBy('mois')
            ->pluck('total', 'mois');


        $chartDemandes = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartDemandes[] = $demandesParMois[$i] ?? 0;
        }

        $raw = Demande::select('statut', DB::raw('COUNT(*) as total'))
            ->groupBy('statut')
            ->pluck('total', 'statut');


        $statutsFormatted = collect(Demande::$STATUTS)
            ->mapWithKeys(fn($config, $key) => [
                $config['label'] => $raw[$key] ?? 0
            ]);


        $users = User::orderBy('name')->paginate(20);


        return view('admin.dashboard', compact(
            'totalUsers',
            'totalClients',
            'totalTechniciens',
            'totalAdmins',
            'totalDemandes',
            'chartDemandes',
            'statutsFormatted',
            'users'
        ));
    }


    public function showNotifications()
    {
        $admin         = auth()->user();
        $notifications = $admin->unreadNotifications;

        return view('admin.demandes.index', compact('notifications'));
    }
}
