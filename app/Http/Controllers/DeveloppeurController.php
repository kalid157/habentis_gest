<?php

namespace App\Http\Controllers;

use App\Models\Developpeur;
use Illuminate\Http\Request;

class DeveloppeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developpeurs = Developpeur::all(); // Fetch all records from the database
          $groupDev = $developpeurs->groupBy('session');

          return view('developpeurs.index', ['groupDev' => $groupDev]);
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
            'montant' => 'required|numeric',
         ]); 
            // Create new employee
            Developpeur::create($request->all()); 

            return redirect()->route('developpeurs.index')->with('success', 'Apprenant enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $session)
    {
        $sessionData = Developpeur::where('session', $session)->get();
          return view('developpeur.session', ['session' => $session, 'sessionData' => $sessionData]);
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
