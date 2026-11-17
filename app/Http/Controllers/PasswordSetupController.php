<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PasswordSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {

        abort_unless($request->hasValidSignature(), 403);

        // Vérifier le token unique pour rendre le lien à usage unique (POST ou query)
        $token = $request->input('token') ?? $request->query('token');
        if (empty($token) || $user->password_setup_token !== $token) {
            abort(403, 'Lien invalide ou déjà utilisé.');
        }

        $request->validate(['password' => 'required|min:8|confirmed']);

        $user->update(['password' => bcrypt($request->password), 'password_setup_token' => null, 'password_setup_sent_at' => null]);

        Auth::login($user);

        return redirect()->route('client_Dashboard');



    }

    /**
     * Display the specified resource.
     */

    /**
     *public function show(string $id)
     *{
        
     *}
     */


    public function show(Request $request, User $user)
    {
        abort_unless($request->hasValidSignature(), 403);

        $token = $request->query('token');
        if (empty($token) || $user->password_setup_token !== $token) {
            abort(403, 'Lien invalide ou déjà utilisé.');
        }

        return view('auth.password-setup', compact('user'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
