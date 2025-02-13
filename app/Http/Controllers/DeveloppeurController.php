<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Developpeur;
use Illuminate\Http\Request;

class DeveloppeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          $developpeurs = Developpeur::all();

          $totalDev = Developpeur::count();
          
          $totalMontant = \App\Models\Developpeur::sum('montant');
          
          return view('developpeurs.index', compact('developpeurs','totalDev','totalMontant'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'formation' => 'required|string|max:255',
            'session' => 'required|string|max:255',
            'tranche1' => 'required|numeric',
            'tranche2' => 'required|numeric',
            'tranche3' => 'required|numeric',
            'tranche4' => 'required|numeric',
            'montant' => 'required|numeric',
        ]);
    
        $developpeur = new Developpeur(); // Crée une nouvelle instance du modèle
    
        $developpeur->fill($request->all()); // Remplis l'instance avec les données de la requête
    
        $sumOfTranches = $developpeur->tranche1 + $developpeur->tranche2 + $developpeur->tranche3 + $developpeur->tranche4;
        $montantRestant = $developpeur->montant - $sumOfTranches;
    
        $developpeur->montantrestant = $montantRestant; // Assignation du montant restant
    
        $developpeur->save(); // Enregistre dans la base de données
    
        return redirect()->route('developpeurs.index')->with('success', 'Apprenant enregistré avec succès !');
    }

    public function update(Request $request, Developpeur $developpeur)
    {
        $request->validate([
            'name' => 'string|max:255',
            'surname' => 'string|max:255',
            'email' => 'string|max:255',
            'address' => 'string|max:255',
            'phone' => 'string|max:15',
            'formation' => 'string|max:255',
            'session' => 'string|max:255',
            'tranche1' => 'numeric',
            'tranche2' => 'numeric',
            'tranche3' => 'numeric',
            'tranche4' => 'numeric',
            'montant' => 'numeric',
        ]);
    
        $developpeur->fill($request->all());  // Mets à jour les attributs avec les données de la requête
    
        $sumOfTranches = $developpeur->tranche1 + $developpeur->tranche2 + $developpeur->tranche3 + $developpeur->tranche4;
        $montantRestant = $developpeur->montant - $sumOfTranches;
    
        $developpeur->montantrestant = $montantRestant; // Assignation du montant restant
    
        $developpeur->save();  // Sauvegarde les modifications
    
        return redirect()->route('developpeurs.index')->with('success', 'Apprenant mis à jour avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $session)
{
    $sessionData = Developpeur::where('session', $session)->get();
    $sessionValue = $session; // Renomme la variable pour éviter le conflit
    return view('developpeur.session', ['session' => $sessionValue, 'sessionData' => $sessionData]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developpeur $developpeur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $developpeur = Developpeur::find($id); // Recherche le développeur par son ID

    if ($developpeur) {
        $developpeur->delete(); // Supprime le développeur
        return redirect()->route('developpeurs.index')->with('success', 'Apprenant supprimé avec succès !');
    } else {
        return redirect()->route('developpeurs.index')->with('error', 'Apprenant non trouvé !');
    }
}
}
