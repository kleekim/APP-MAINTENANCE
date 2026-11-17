<?php

namespace App\Http\Controllers;

use App\Models\Client_Contrat;
use Illuminate\Http\Request;
use App\Models\Planning;


class ContractuelsController extends Controller
{
    public function Contractuels()
    {
        $clients = Client_Contrat::all();
        return view('technicien.contractuels', compact('clients'));
    }

    public function create($clientId)
    { 
        $client = Client_Contrat::findOrFail($clientId);

        $planning = Planning::where('client_contractuel_id', $clientId)
            ->latest()
            ->get()
            ->groupBy('mois_debut')
            ->first();

        return view('technicien.planning_intervention', compact('client', 'planning'));
    }

    public function store(Request $request, $clientId)
    {
        $request->validate([
            'mois_debut'  => 'required|string',
            'mois_fin'    => 'required|string',
            'dates.*'     => 'required|date',
            'heures.*'    => 'required|date_format:H:i',
            'equipes.*'   => 'required|string|max:100',
            'activite'    => 'required|string',
            'observation' => 'required|string',
        ], [
            'mois_debut.required'  => 'Le champ "Mois de début" est obligatoire.',
            'mois_fin.required'    => 'Le champ "Mois de fin" est obligatoire.',
            'dates.*.required'     => 'Toutes les dates sont obligatoires.',
            'dates.*.date'         => 'Une des dates saisies n\'est pas valide.',
            'heures.*.required'    => 'Toutes les heures sont obligatoires.',
            'heures.*.date_format' => 'Une des heures n\'est pas au bon format (HH:MM).',
            'equipes.*.required'   => 'Tous les champs "Équipe" sont obligatoires.',
            'equipes.*.max'        => 'Un des noms d\'équipe dépasse 100 caractères.',
            'activite.required'    => 'Le champ "Activité" est obligatoire.',
            'observation.required' => 'Le champ "Observation" est obligatoire.',
        ]);

        $client = Client_Contrat::findOrFail($clientId);

        foreach ($request->dates as $i => $date) {
            Planning::create([
                'user_id'               => auth()->id(),
                'client_contractuel_id' => $client->id,
                'mois_debut'            => $request->mois_debut,
                'mois_fin'              => $request->mois_fin,
                'date'                  => $date,
                'activite'              => $request->activite,
                'heure'                 => $request->heures[$i],
                'equipe'                => $request->equipes[$i],
                'observation'           => $request->observation,
            ]);
        }

        return redirect()->route('technicien.planning_intervention', $client->id)
            ->with('success', 'Planning enregistré avec succès.');
    }

    public function update(Request $request, $clientId)
    {
        $request->validate([
            'mois_debut'  => 'required|string',
            'mois_fin'    => 'required|string',
            'dates.*'     => 'required|date',
            'heures.*'    => 'required|date_format:H:i',
            'equipes.*'   => 'required|string|max:100',
            'activite'    => 'required|string',
            'observation' => 'required|string',
        ], [
            'mois_debut.required'  => 'Le champ "Mois de début" est obligatoire.',
            'mois_fin.required'    => 'Le champ "Mois de fin" est obligatoire.',
            'dates.*.required'     => 'Toutes les dates sont obligatoires.',
            'dates.*.date'         => 'Une des dates saisies n\'est pas valide.',
            'heures.*.required'    => 'Toutes les heures sont obligatoires.',
            'heures.*.date_format' => 'Une des heures n\'est pas au bon format (HH:MM).',
            'equipes.*.required'   => 'Tous les champs "Équipe" sont obligatoires.',
            'equipes.*.max'        => 'Un des noms d\'équipe dépasse 100 caractères.',
            'activite.required'    => 'Le champ "Activité" est obligatoire.',
            'observation.required' => 'Le champ "Observation" est obligatoire.',
        ]);

        $client = Client_Contrat::findOrFail($clientId);

        Planning::where('client_contractuel_id', $clientId)->delete();

        foreach ($request->dates as $i => $date) {
            Planning::create([
                'user_id'               => auth()->id(),
                'client_contractuel_id' => $client->id,
                'mois_debut'            => $request->mois_debut,
                'mois_fin'              => $request->mois_fin,
                'date'                  => $date,
                'activite'              => $request->activite,
                'heure'                 => $request->heures[$i],
                'equipe'                => $request->equipes[$i],
                'observation'           => $request->observation,
            ]);
        }

        return redirect()->route('technicien.planning_intervention', $client->id)
            ->with('success', 'Planning modifié avec succès.');
    }
}
