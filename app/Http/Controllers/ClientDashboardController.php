<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function dashboard_client()
    {
        
        $commercial = User::role('commerciale')->first();

        return view('CLIENTS.Clients_Particuliers.client_Dashboard', [
            'chatPartnerId' => $commercial?->id,
        ]);
    }
}

 