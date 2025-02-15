<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ApprenantController extends Controller
{
    public function index() 
    { 
        $apprenants = Apprenant::all(); 
        $dataCount = Apprenant::count();
        return view('apprenants.index', compact('apprenants','dataCount')); 
    }

        
    public function create()
        
    {
        return view('apprenants.create'); 
    } 
    
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
                $apprenant = new Apprenant(); // Crée une nouvelle instance du modèle

                $apprenant->fill($request->all()); // Remplis l'instance avec les données de la requête

                $sumOfTranches = $apprenant->tranche1 + $apprenant->tranche2 + $apprenant->tranche3 + $apprenant->tranche4;
                $montantRestant = $apprenant->montant - $sumOfTranches;

                $apprenant->montantrestant = $montantRestant; // Assignation du montant restant

                $apprenant->save(); // Enregistre dans la base de données

                return redirect()->route('apprenants.index') ->with('success', 'Employé ajouté avec succès.');
        } 



        public function show(Apprenant $apprenant)
        { 
            return view('apprenants.show', compact('apprenant')); 
        } 


        public function edit(Apprenant $apprenant) 
        { 
            return view('apprenants.edit', compact('apprenant'));
        }



        public function update(Request $request, Apprenant $apprenant)
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
            'montant' => 'required|numeric',
        ]); 

        $apprenant->fill($request->all());  // Mets à jour les attributs avec les données de la requête
    
        $sumOfTranches = $apprenant->tranche1 + $apprenant->tranche2 + $apprenant->tranche3 + $apprenant->tranche4;
        $montantRestant = $apprenant->montant - $sumOfTranches;
    
        $apprenant->montantrestant = $montantRestant; // Assignation du montant restant
    
        $apprenant->save();  // Sauvegarde les modifications
    
        return redirect()->route('apprenants.index') ->with('success', 'Apprenant mis à jour avec succès.'); 
    } 



    public function destroy(Apprenant $apprenant) 
    { 
        $apprenant->delete(); return redirect()->route('apprenants.index') ->with('success', 'Apprenant supprimé avec succès.'); 
    } 
}
