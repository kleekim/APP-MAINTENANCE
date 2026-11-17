<?php

namespace App\Broadcasting;

use App\Services\SmsService;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct(
        protected SmsService $smsService
    ) {
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification): void
    {
        if (! method_exists($notification, 'toSms')) {
            return;
        }

        $message = $notification->toSms($notifiable);

        if (! $message) {
            return;
        }

        $phoneNumber = $notifiable->routeNotificationForSms($notifiable);

        if (! $phoneNumber) {
            return;
        }

        $this->smsService->send($phoneNumber, $message);
    }
}
