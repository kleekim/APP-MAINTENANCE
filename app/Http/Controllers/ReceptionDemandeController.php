<?php

namespace App\Http\Controllers;
use App\Models\Demande;


//use Illuminate\Http\Request;

class ReceptionDemandeController extends Controller
{
    public function reception_demande()
    {
        $demandes = Demande::latest()->paginate(10);

        return view('commercial.reception_demande',compact('demandes'));
    }

   

}
