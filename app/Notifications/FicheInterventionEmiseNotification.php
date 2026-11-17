<?php

namespace App\Notifications;

use App\Models\Demande;
use Illuminate\Notifications\Notification;

class FicheInterventionEmiseNotification extends Notification
{
    protected $demande;

    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'type'       => 'fiche_intervention_emise',
            'demande_id' => $this->demande->id,
            'nom_complet'=> $this->demande->nom_complet,
            'message'    => "La fiche d'intervention du client {$this->demande->nom_complet} est prête, vous pouvez établir la facture.",
        ];
    }
}