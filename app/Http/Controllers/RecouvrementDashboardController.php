<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Support\Facades\DB;

class RecouvrementDashboardController extends Controller
{ 
    public function dashboard_recouvrement()
    {
        $totalFactures = Facture::count();

        $totalAmount = DB::table('factures')
            ->selectRaw("SUM(CAST(REPLACE(REPLACE(Total, ' ', ''), ',', '') AS DECIMAL(15,2))) as total")
            ->value('total');

        return view('recouvrement.dashboard', compact('totalFactures', 'totalAmount'));
    }

    public function factures_par_client()
    {
        $facturesParClient = DB::table('factures')
            ->join('demandes', 'factures.demande_id', '=', 'demandes.id')
            ->join('users', 'demandes.user_id', '=', 'users.id')
            ->select(
                'users.id as client_id',
                'users.name as client',
                DB::raw('COUNT(factures.id) as total_factures'),
                DB::raw("SUM(CAST(REPLACE(REPLACE(factures.Total, ' ', ''), ',', '') AS DECIMAL(15,2))) as montant_total")
            )
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_factures')
            ->get();

        return view('recouvrement.clients', compact('facturesParClient'));
    }
}