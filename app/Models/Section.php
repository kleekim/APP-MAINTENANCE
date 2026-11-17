<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    protected $guarded = []; 

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function demande()
    {
        return $this->hasMany(Demande::class);
    }

    public function ficheacceuil()
    {
        return $this->hasMany(FicheAccueil::class);
    }

    public function facture()
    {
        return $this->hasMany(Facture::class);
    }

    public function ficheintervention()
    {
        return $this->hasMany(FicheIntervention::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }







    
    




}
