<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturesClientController extends Controller
{
     public function facture()
    {
        return view('maintenance.commercial.facturation');
    }

}
