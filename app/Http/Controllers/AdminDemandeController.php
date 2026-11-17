<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Demande;


class AdminDemandeController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {

        $demandes = Demande::latest()->paginate(10);
        $totaldemandes = Demande::count();

        return view('admin.demande.index', compact('demandes', 'totaldemandes'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $demande = Demande::with('user')->findOrFail($id);
        return view('admin.demande.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $demande = Demande::findOrFail($id);

        // les statuts 
        $statuts = [
            'en_attente' => 'En attente',
            'approuvé' => 'Approuvé',
            'terminé' => 'Terminé',

        ];

        return view("admin.demande.edit", compact("demande", "statuts"));

        $demande = Demande::findOrFail($id);
        return view("admin.demande.edit", compact("demande"));
    }

    /**
     * Update the specified resource in storage.
     
    
     *public function update(Request $request, string $id)
     *{
     *    //
     *}
     */

    public function update(Request $request, Demande $demande)
    {
        
        $validated = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'telephone' => 'nullable|string|digits:9|unique:clients,telephone,' . $demande->id,
            'email' => 'required|email|unique:users,email,' . $demande->user_id . '|unique:clients,email,' . $demande->id,
            'adresse'     => 'nullable|string|max:255',
            'objet' => 'nullable|string|max:255',
            'panne' => 'nullable|string|max:255',
            'statut' => 'nullable|string|max:255',

        ]);

        $demande->update([
            'nom_complet' => $validated['nom_complet'],
            'telephone' => $validated['telephone'],
            'email' => $validated['email'],
          'adresse'     => $validated['adresse'],
            'objet' => $validated['objet'],
            'panne' => $validated['panne'],
            'statut' => $validated['statut'],

        ]); 

        return redirect()->route('admin.demandes.index')->with('success', 'Demande mise à jour avec succès');
    }



    /**
     * Remove the specified resource from storage.
    

     *public function destroy(string $id)
     *{
     *   //
     *}
     */ 
    
    public function destroy(Demande $demande)
    {
        $this->authorize('supprimer_demande');

        // ici je supprime la demande
        $demande->delete();

        return redirect()->route('admin.demandes.index')->with('success', 'Demande supprimé avec succès');
    }

}






