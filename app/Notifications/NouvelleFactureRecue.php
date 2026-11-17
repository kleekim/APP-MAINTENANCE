<?php

namespace App\Notifications;

use App\Models\Facture;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NouvelleFactureRecue extends Notification
{
    use Queueable;

    public function __construct(public Facture $facture) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'facture_id' => $this->facture->id,
            'client'     => $this->facture->demande->nom_complet ?? $this->facture->Doit,
            'montant'    => $this->facture->Total,
            'message'    => 'Nouvelle facture reçue de '.($this->facture->demande->nom_complet ?? $this->facture->Doit),
        ];
    }
}