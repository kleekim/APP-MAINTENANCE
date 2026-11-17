<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

 

class AdminClientController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $this->authorize('ajouter_client');
        $clients = Client::all();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $this->authorize('ajouter_client');

        $clients = Client::all();

        return view('admin.clients.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|digits:9|unique:clients,telephone',
            'email' => 'required|email|unique:users,email|unique:clients,email',
            'address' => 'nullable|string|max:255',
            'type_clients' => 'required|string|in:Particuliers,Entreprises',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'email_verified_at' => now(),
        ]);

        $user->assignRole('client');

        // Création du client
        $client = Client::create([
            'user_id'      => $user->id,
            'type_clients' => $validated['type_clients'],
            'nom_complet'  => $validated['name'],
            'telephone'    => $validated['phone'],
            'email'        => $validated['email'],
            'adresse'      => $validated['address'],
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     *public function edit(string $id)
     *{
     * $client = Client::findOrFail($id);

     * return view('admin.clients.edit', compact('client'));
     * }
     */

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }


    /**
     * Update the specified resource in storage.
     */
    /**public function update(Request $request, string $id)
    {
        //    

    }
     */


    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'telephone' => 'nullable|string|digits:9|unique:clients,telephone,' . $client->id,
            'email' => 'required|email|unique:users,email,' . $client->user_id . '|unique:clients,email,' . $client->id,
            'address' => 'nullable|string|max:255',
            'type_clients' => 'required|string|in:particuliers,entreprises',
        ]);



        // Mise à jour de l'utilisateur qui est lié au client 

        $client->user->update([
            'name' => $validated['nom_complet'],
            'email' => $validated['email'],
            'phone' => $validated['telephone'],
        ]);

        // Mise à jour du client
        $client->update([
            'nom_complet' => $validated['nom_complet'],
            'type_clients' => $validated['type_clients'],
            'telephone' => $validated['telephone'],
            'email' => $validated['email'],
            'adresse' => $validated['address'],
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */

    /** */


    /**
     * public function destroy(string $id)
     *{
        
     *}
     */

    public function destroy(Client $client)
    {
        $this->authorize('supprimer_client');
        $client->demandes()->delete(); 
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client supprimé avec succès');
    }
}


