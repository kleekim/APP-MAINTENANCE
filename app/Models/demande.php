<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Client;
use App\Models\FicheAccueil;
use App\Models\FicheIntervention;
use App\Models\Facture;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'telephone',
        'email',
        'adresse',
        'objet',
        'panne',
        'statut',
        'user_id',
        'client_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function ficheaccueil()
    {
        return $this->hasOne(FicheAccueil::class);
    }

    public function ficheIntervention()
    {
        return $this->hasOne(FicheIntervention::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }

    // Statuts des demandes

    public static array $STATUTS = [
        'en_attente' => [
            'label'         => 'En attente',
            'couleur_badge' => 'background:#fecaca; color:#991b1b;',
            'classe_badge'  => 'bg-red-200 text-red-900',
        ],
        'en_cours' => [
            'label'         => 'En cours',
            'couleur_badge' => 'background:#fed7aa; color:#9a3412;',
            'classe_badge'  => 'bg-orange-200 text-orange-800',
        ],
        'approuve' => [
            'label'         => 'Approuvé',
            'couleur_badge' => 'background:#bbf7d0; color:#065f46;',
            'classe_badge'  => 'bg-green-200 text-emerald-800',
        ],
        'termine' => [
            'label'         => 'Terminé',
            'couleur_badge' => 'background:#006937; color:#ffffff;',
            'classe_badge'  => 'bg-[#006937] text-white',
        ],
    ];

    public function getStatutLabelAttribute(): string
    {
        return self::$STATUTS[$this->statut]['label'] ?? ucfirst($this->statut);
    }

    public function getStatutCouleurAttribute(): string
    {
        return self::$STATUTS[$this->statut]['couleur_badge'] ?? 'background:#f3f4f6; color:#374151;';
    }

    public function getStatutClasseAttribute(): string
    {
        return self::$STATUTS[$this->statut]['classe_badge'] ?? 'bg-gray-100 text-gray-800';
    }

    // Délai de traitement des demandes

    public function getDelaiTraitementMinutesAttribute(): ?int
    {
        if (!$this->facture) {
            return null;
        }

        
        $debut = $this->created_at->copy()->startOfMinute();
        $fin   = $this->facture->created_at->copy()->startOfMinute();

        return (int) abs($debut->diffInMinutes($fin));
    }

    public function getDelaiTraitementAttribute(): ?string
    {
        $minutes = $this->delai_traitement_minutes;

        if ($minutes === null) {
            return null;
        }

        $jours  = intdiv($minutes, 1440);
        $reste  = $minutes % 1440;
        $heures = intdiv($reste, 60);
        $mins   = $reste % 60;

        if ($jours > 0) {
            return $heures > 0 ? "{$jours} j {$heures} h" : "{$jours} j";
        } elseif ($heures > 0) {
            return $mins > 0 ? "{$heures} h {$mins} min" : "{$heures} h";
        }

        return "{$mins} min";
    }
}