<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheIntervention extends Model
{
    /** @use HasFactory<\Database\Factories\FicheInterventionFactory> */
    use HasFactory;


    protected $fillable = ['user_id', 'demande_id', 'date_arrivee', 'date_sortie', 'motif_intervention', 'Technicien_Nom', 'Compte_rendues_Intervention', 'Proposition_Montant', 'statut'];
    protected $table = 'fiches_interventions';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
