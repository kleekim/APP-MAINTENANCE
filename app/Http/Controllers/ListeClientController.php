<?php

namespace App\Http\Controllers;
use App\Models\Client;


class ListeClientController extends Controller
{
    public function liste_client()
    {
        $clients = Client::all();
        return view('technicien.Liste_client' , compact('clients'));
    }
}

