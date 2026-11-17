<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\FicheIntervention;
use App\Models\User;
use App\Notifications\FicheInterventionEmiseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FichesInterventionController extends Controller
{
    public function fiches_intervention($id)
    {
        $demande = Demande::findOrFail($id);
        $fiche = FicheIntervention::where('demande_id', $demande->id)->first();

        return view('technicien.fiches_intervention', compact('demande', 'fiche'));
    }

    public function store(Request $request, $demande_id)
    {
       
        $request->validate([
            'date_arrivee'                => 'required|date',
            'date_sortie'                 => 'required|date|after_or_equal:date_arrivee',
            'motif_intervention'          => 'required|string',
            'technicien_nom'              => 'required|string',
            'Compte_rendues_Intervention' => 'required|string',
            'Proposition_Montant'         => 'required|string',
        ], [
            'date_arrivee.required'                => 'La date d\'arrivée est obligatoire.',
            'date_sortie.required'                 => 'La date de sortie est obligatoire.',
            'date_sortie.after_or_equal'           => 'La date de sortie doit être après la date d\'arrivée.',
            'motif_intervention.required'          => 'Le motif de l\'intervention est obligatoire.',
            'Compte_rendues_Intervention.required' => 'Le compte rendu de l\'intervention est obligatoire.',
            'Proposition_Montant.required'         => 'La proposition de montant est obligatoire.',
            'technicien_nom.required'              => 'Le nom du technicien est obligatoire.',
        ]);

      
        $demande = Demande::findOrFail($demande_id);

        
        $statut = $this->determinerStatut($request);

        
        $ficheExistait = FicheIntervention::where('demande_id', $demande_id)->exists();

     
        FicheIntervention::updateOrCreate(
            ['demande_id' => $demande_id],
            [
                'user_id'                     => auth()->id(),
                'date_arrivee'                => $request->date_arrivee,
                'date_sortie'                 => $request->date_sortie,
                'motif_intervention'          => $request->motif_intervention,
                'Technicien_Nom'              => $request->technicien_nom,
                'Compte_rendues_Intervention' => $request->Compte_rendues_Intervention,
                'Proposition_Montant'         => $request->Proposition_Montant,
                'statut'                      => $statut,
            ]
        );

        
        if ($demande->statut !== 'termine') {
            $demande->update(['statut' => 'en_cours']);
        }

        
        if (!$ficheExistait) {
            $commerciaux = User::role('commerciale')->get();
            Notification::send($commerciaux, new FicheInterventionEmiseNotification($demande));
        }

        return redirect()
            ->route('technicien.fiches_intervention', $demande->id)
            ->with('success', 'Fiche enregistrée avec succès.');
    }

    private function determinerStatut(Request $request): string
    {
        $champsObligatoires = [
            'date_arrivee',
            'date_sortie',
            'motif_intervention',
            'technicien_nom',
            'Compte_rendues_Intervention',
            'Proposition_Montant',
        ];

        foreach ($champsObligatoires as $champ) {
            if (empty($request->$champ)) {
                return 'en_cours';
            }
        }

        return 'completee';
    }
}
