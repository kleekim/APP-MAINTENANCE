<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client_Contrat;

class Planning extends Model
{
    protected $table = 'plannings';

    protected $fillable = [
        'user_id',
        'client_contractuel_id',
        'mois_debut',
        'mois_fin',
        'date',
        'activite',    
        'heure',
        'equipe',
        'observation',
    ];

    public function client()
    {
        return $this->belongsTo(Client_Contrat::class, 'client_contractuel_id');
    }
}
