<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $channels = ['mail'];

        // Ajouter SMS si le numéro de téléphone est disponible
        if ($notifiable->routeNotificationForSms($notifiable)) {
            $channels[] = 'sms';
        }

        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bienvenue sur notre plateforme de gestion de maintenance')
            ->greeting('Bonjour '.$notifiable->name.' !')
            ->line('Nous sommes ravis de vous accueillir sur notre plateforme de gestion de maintenance.')
            ->line('Votre compte a été créé avec succès. Vous pouvez maintenant :')
            ->line('• Soumettre des demandes de maintenance')
            ->line('• Suivre l\'état de vos interventions')
            ->line('• Consulter vos factures et contrats')
            ->action('Accéder à votre tableau de bord', route('client_dashboard'))
            ->line('Si vous avez des questions, n\'hésitez pas à nous contacter.')
            ->salutation('Cordialement, L\'équipe de maintenance');
    }

    /**
     * Get the SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toSms(object $notifiable): string
    {
        return "Bonjour {$notifiable->name} ! Bienvenue sur notre plateforme de gestion de maintenance. Votre compte a été créé avec succès. Vous pouvez maintenant soumettre des demandes, suivre vos interventions et consulter vos factures.";
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Bienvenue sur notre plateforme de gestion de maintenance',
        ];
    }
}
