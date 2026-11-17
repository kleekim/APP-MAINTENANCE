<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }



public static function redirectTo(): string
{
    $user = Auth::user();

    if (! $user) {
        return '/login';
    }

    $roleName = $user->roles->first()?->name;

    return match ($roleName) {
        'administrateur' => route('admin.dashboard'),
        'client' => route('client_Dashboard'),
        'commerciale' => route('commercial.dashboard'),
        'technicien' => route('technicien.dashboard'),
        'recouvrement' => route('recouvrement.dashboard'),
        default => route('dashboard'),
    };
}

}


