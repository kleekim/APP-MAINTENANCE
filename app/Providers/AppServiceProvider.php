<?php

namespace App\Providers;

use App\Broadcasting\SmsChannel;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enregistrer le canal SMS personnalisé
        Notification::resolved(function (ChannelManager $service): void {
            $service->extend('sms', function ($app) {
                return new SmsChannel($app->make(\App\Services\SmsService::class));
            });
        });
    }
}
