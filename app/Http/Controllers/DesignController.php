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
            'montant' => 'required|numeric',
         ]); 
            // Create new employee
            Design::create($request->all()); 

            return redirect()->route('designs.index')->with('success', 'Apprenant enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Design $design)
    {
        $design = Design::findOrFail($design); 
        return view('designs.show', compact('design'));
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
            'name' => 'required|string|max:255', 
            'surname' => 'required|string|max:255', 
            'email' => 'required|string|max:255', 
            'address' => 'required|string|max:255', 
            'phone' => 'required|string|max:15', 
            'formation' => 'required|string|max:255', 
            'session' => 'required|string|max:255', 
            'montant' => 'required|numeric',
         ]);

         //$design = Design::find($design); 
         $design->update($request->all()); 
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
