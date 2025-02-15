<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $designs = Design::all();
        $totalDesigns = Design::count(); 
        return view('designs.index', compact('designs','totalDesigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('designs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Log::debug('Données de la requête pour la création d\'un employé', $request->all());
        
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
         $design = new Design(); // Crée une nouvelle instance du modèle
    
         $design->fill($request->all()); // Remplis l'instance avec les données de la requête
     
         $sumOfTranches = $design->tranche1 + $design->tranche2 + $design->tranche3 + $design->tranche4;
         $montantRestant = $design->montant - $sumOfTranches;
     
         $design->montantrestant = $montantRestant; // Assignation du montant restant
     
         $design->save(); // Enregistre dans la base de données

            return redirect()->route('designs.index')->with('success', 'Apprenant enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $session)
    {
        $sessionData = Design::where('session', $session)->get();
        $sessionValue = $session; // Renomme la variable pour éviter le conflit
        return view('design.session', ['session' => $sessionValue, 'sessionData' => $sessionData]);
       // return view('designs.show', compact('design'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Design $design)
    {
        //$design = Design::find('Design'); 
        return view('designs.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Design $design)
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

         $design->fill($request->all());  // Mets à jour les attributs avec les données de la requête
    
        $sumOfTranches = $design->tranche1 + $design->tranche2 + $design->tranche3 + $design->tranche4;
        $montantRestant = $design->montant - $sumOfTranches;
    
        $design->montantrestant = $montantRestant; // Assignation du montant restant
    
        $design->save();  // Sauvegarde les modifications
    
         return redirect()->route('designs.index')->with('success', 'Apprenant mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Design $design)
    {
        $design->delete();
        return redirect()->route('designs.index')->with('success', 'Apprenant deleted successfully');
    }
}
