<?php

namespace App\Http\Controllers;

use App\Models\Demande;
//use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function intervention()
    {
        $demandes = Demande::all();
        
        return view('technicien.intervention', compact('demandes'));
    }
}