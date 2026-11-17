<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client_Contrat;



class Fiche_intervention_ClientEntreprise extends Model
{
    protected $table = 'fiches_interventions_clients_entreprises';

    protected $fillable = [
        'user_id',
        'client_contractuel_id',
        'date',             
        'direction',
        'service',
        'date_service',    
        'heure',
        'motif_demandeur',
        'intervenants',
        'compte_rendu_intervention',
        'observation_agent',
        'observation_service',
    ];

    public function client()
    {
        return $this->belongsTo(Client_Contrat::class, 'client_contractuel_id');
    }
}