<?php

namespace App\Notifications;

use App\Models\FicheAccueil;
use Illuminate\Notifications\Notification;


class FicheAccueilCommercialeNotification extends Notification
{
    public function __construct(public FicheAccueil $fiche) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => 'La fiche d\'accueil du client ' . $this->fiche->demande->nom_complet . ' a été complétée par le technicien.',
            'fiche_id' => $this->fiche->id,
            'demande_id' => $this->fiche->demande_id,
            'type' => 'fiche_accueil_completee',
        ];
    }
}
