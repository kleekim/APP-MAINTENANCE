<?php

namespace App\Http\Controllers;

use App\Models\Client_Contrat;
//use Illuminate\Http\Request;


class PlanningInterventionController extends Controller
{
    public function planning_intervention($client)
    {
        $client = Client_Contrat::findOrFail($client);

        return view('technicien.planning_intervention', compact('client'));
    }
}