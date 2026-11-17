<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class EmailVerificationNotification extends Notification implements ShouldQueue
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $expireMinutes = config('auth.verification.expire', 60);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes($expireMinutes),
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );

        return (new MailMessage)
            ->subject('Vérifiez votre adresse email')
            ->greeting('Bonjour '.$notifiable->name.' !')
            ->line('Merci de vous être inscrit sur notre plateforme de gestion de maintenance.')
            ->line('Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.')
            ->action('Vérifier mon email', $verificationUrl)
            ->line('Si vous n\'avez pas créé de compte, aucune action n\'est requise.')
            ->line('Ce lien de vérification expirera dans '.$expireMinutes.' minutes.')
            ->salutation('Cordialement, L\'équipe de maintenance');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Vérification de l\'adresse email requise',
        ];
    }
}
