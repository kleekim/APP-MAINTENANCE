<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiche_intervention_ClientEntreprise;
use App\Models\Client_Contrat;

class FicheInterventionContratController extends Controller
{
    public function fiche_intervention_contrat($clientId)
    {
        $client = Client_Contrat::findOrFail($clientId);

        $fiche = Fiche_intervention_ClientEntreprise::where('client_contractuel_id', $clientId)
            ->latest()
            ->first();

        return view('technicien.fiche_intervention_contrat', compact('client', 'fiche'));
    }

    public function store(Request $request, $clientId)
    {

        $request->validate([
            'date' => 'required|date',
            'date_service' => 'required|date',
            'direction' => 'required|string',
            'service' => 'required|string',
            'heure' => 'required',
            'motif_demandeur' => 'required|string',
            'intervenants' => 'required|string',
            'compte_rendu_intervention' => 'required|string',
            'observation_agent' => 'required|string',
            'observation_service' => 'required|string',
        ]);

        $client = Client_Contrat::findOrFail($clientId);

        Fiche_intervention_ClientEntreprise::create([
            'user_id' => auth()->id(),
            'client_contractuel_id' => $client->id,
            'date' => $request->date,
            'date_service' => $request->date_service,
            'direction' => $request->direction,
            'service' => $request->service,
            'heure' => $request->heure,
            'motif_demandeur' => $request->motif_demandeur,
            'intervenants' => $request->intervenants,
            'compte_rendu_intervention' => $request->compte_rendu_intervention,
            'observation_agent' => $request->observation_agent,
            'observation_service' => $request->observation_service,
        ]);

        return redirect()
            ->route('technicien.fiche_intervention_contrat', $clientId)
            ->with('success', 'Fiche enregistrée avec succès.');
    }

    public function update(Request $request, $clientId)
    {

        $request->validate([ 
            'date' => 'required|date',
            'date_service' => 'required|date',
            'direction' => 'required|string',
            'service' => 'required|string',
            'heure' => 'required',
            'motif_demandeur' => 'required|string',
            'intervenants' => 'required|string',
            'compte_rendu_intervention' => 'required|string',
            'observation_agent' => 'required|string',
            'observation_service' => 'required|string',
        ]);

        $fiche = Fiche_intervention_ClientEntreprise::where('client_contractuel_id', $clientId)
            ->latest()
            ->firstOrFail();

        $fiche->update([
            'date' => $request->date,
            'date_service' => $request->date_service,
            'direction' => $request->direction,
            'service' => $request->service,
            'heure' => $request->heure,
            'motif_demandeur' => $request->motif_demandeur,
            'intervenants' => $request->intervenants,
            'compte_rendu_intervention' => $request->compte_rendu_intervention,
            'observation_agent' => $request->observation_agent,
            'observation_service' => $request->observation_service,
        ]);

        return redirect()
            ->route('technicien.fiche_intervention_contrat', $clientId)
            ->with('success', 'Fiche modifiée avec succès.');
    }
}
