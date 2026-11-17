<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Client extends Model
{

    use HasFactory;

    protected $fillable = ['user_id', 'type_clients', 'nom_complet', 'telephone', 'email', 'adresse'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ficheAccueil()
    {
        return $this->hasMany(FicheAccueil::class);
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function facture()
    {
        return $this->hasMany(Facture::class);
    }

    public function planning()
    {
        return $this->hasMany(planning::class);
    }

    public function contrat()
    {
        return $this->hasOne(Contrat::class);
    }

}
