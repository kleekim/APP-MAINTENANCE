<?php

namespace App\Notifications;

use App\Models\Demande;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MaintenanceNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $demande;

    /**
     * Create a new notification instance.
     */
    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [ 'database'];
    }


    /**
     * Get the mail representation of the notification.
    
   * public function toMail(object $notifiable): MailMessage
    *{
       * $url = url("/admin/demandes/{$this->demande->id}/edit");
        *return (new MailMessage)
         *   ->subject("Nouvelle demande de maintenance ({$this->demande->id})")
          *  ->greeting("Bonjour {$notifiable->name},")
           * ->line("Une nouvelle demande de maintenance a été soumise par {$this->demande->nom_complet}.")
            *->line("Objet: {$this->demande->objet}")
            *->line("Description: {$this->demande->panne}")
            *->action("Voir la demande", $url);
        
    *} 
            */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "demande_id" => $this->demande->id,
            "nom_complet" => $this->demande->nom_complet,
            "objet" => $this->demande->objet,
            "message" => "Demande de maintenance soumise par {$this->demande->nom_complet}.",
        ];
    }
}


