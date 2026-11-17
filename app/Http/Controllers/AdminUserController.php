<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    use AuthorizesRequests;
    /**
     * Afficher la liste des utilisateurs
     */
    public function index()
    {
        $this->authorize('ajouter_utilisateur');

        $users = User::with('roles')->paginate(15);
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }


    /**
     * Afficher le formulaire de création d'utilisateur
     */
    public function create()
    {
        $this->authorize('ajouter_utilisateur');

        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Stocker un nouvel utilisateur
     */
    public function store(Request $request)
    {
        $this->authorize('ajouter_utilisateur');

        $validated = $request->validate([
            'name' => 'required|string|unique:users,name|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|digits:9|unique:users,phone',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'email_verified_at' => now(),
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès');
    }

    /**
     * Afficher le formulaire d'édition d'utilisateur
     */
    public function edit(User $user)
    {
        $this->authorize('ajouter_utilisateur');

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Mettre à jour un utilisateur
     */

    public function update(Request $request, User $user)
    {
        $this->authorize('ajouter_utilisateur');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|exists:roles,name',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
        ]);

        // Mettre à jour le client associé s'il existe

        $user->client?->update([
            'nom_complet' => $validated['name'],
            'email'       => $validated['email'],
            'telephone'   => $validated['phone'] ?? null,
        ]);


        // Synchroniser les rôles
        $user->syncRoles($validated['role']);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    /**
     * Supprimer un utilisateur
     */

    public function destroy(User $user)
    {
        $this->authorize('supprimer_utilisateur');

        $client = $user->client;
        $client?->demandes()->delete();
        $client?->delete();
        $user->delete();


        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
