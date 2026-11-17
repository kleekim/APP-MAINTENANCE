<?php

namespace App\Http\Controllers;

use App\Models\Demande;

//use Illuminate\Http\Request;

class PageFactureController extends Controller
{
    public function facture()
    {

        $demandes = Demande::with(['ficheAccueil', 'ficheIntervention', 'facture'])
            ->latest()
            ->paginate(10);

        return view('commercial.pagefacture', compact('demandes'));
    }
}
