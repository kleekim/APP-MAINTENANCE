<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_Contrat extends Model
{

    protected $table = 'clients_contractuels';
    protected $fillable = ['client', 'telephone', 'email', 'adresse', 'type_contrats', 'interventions_par_mois'];

    public function plannings()
    {
        return $this->hasMany(Planning::class);
    }

    public function fiches()
    {
        return $this->hasMany(Fiche_intervention_ClientEntreprise::class);
    }
}
