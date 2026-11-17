<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Redirection selon le rôle de l'utilisateur 
        $roleName = $user->roles->first()?->name ?? 'client';

        return match ($roleName) {
            'admin', 'administrateur' => redirect()->route('admin.dashboard'),
            'client' => redirect()->route('client_Dashboard'),
            'commercial', 'commerciale' => redirect()->route('commercial.dashboard'),
            'technicien' => redirect()->route('technicien.dashboard'),
            'recouvrement' => redirect()->route('recouvrement.dashboard'),
            default => redirect()->route('dashboard'),
        };
    }
}

