<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FicheAccueil extends Model
{
    /** @use HasFactory<\Database\Factories\FicheAccueilFactory> */
    use HasFactory;


    protected $fillable = ['user_id', 'demande_id', 'type_machine', 'accessoires', 'informations_commerciale', 'informations_technicien', 'Nom_agent_commercial', 'Nom_technicien', 'statut'];
    protected $table = 'fiches_accueils';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function section()
    {
        return $this->belongsToMany(Section::class);
    }
}
