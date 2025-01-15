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
            'montant' => 'required|numeric',
        ]); 
        Apprenant::create($request->all());

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
            'name' => 'required|string|max:255', 
            'surname' => 'required|string|max:255', 
            'email' => 'required|string|max:255', 
            'address' => 'required|string|max:255', 
            'phone' => 'required|string|max:15', 
            'formation' => 'required|string|max:255', 
            'session' => 'required|string|max:255', 
            'montant' => 'required|numeric',
        ]); 

        $apprenant->update($request->all()); 
        return redirect()->route('apprenants.index') ->with('success', 'Apprenant mis à jour avec succès.'); 
    } 

    public function destroy(Apprenant $apprenant) 
    { 
        $apprenant->delete(); return redirect()->route('apprenants.index') ->with('success', 'Apprenant supprimé avec succès.'); 
    } 
}
