<?php

namespace App\Http\Controllers;

use App\Models\Facture;

//use Illuminate\Http\Request;

class ReceptionFactureController extends Controller
{
    public function reception_facture()
    {
        $factures = Facture::latest()->paginate(10);
        return view('recouvrement.reception_facture', compact('factures'));
    }
}
