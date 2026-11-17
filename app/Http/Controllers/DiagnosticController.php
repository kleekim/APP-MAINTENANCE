<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Demande;

class DiagnosticController extends Controller
{
    public function diagnostic()
    {

        $demandes = Demande::with('ficheAccueil')
            ->latest()
            ->get();

        return view('technicien.diagnostic', compact('demandes'));
    }
}
 