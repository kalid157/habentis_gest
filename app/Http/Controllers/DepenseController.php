<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepenseController extends Controller
{
    
    public function index(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

       $depenses = Depense::when($year, function ($query, $year) {
             return $query->whereYear('date', $year);
         })
          ->when($month, function ($query, $month) {
             return $query->whereMonth('date', $month);
         })
         ->orderBy('date', 'desc')
         ->paginate(13);
        // dd($depenses);
       $totalDepenses = Depense::sum('montant');


      $months = Depense::select(
        DB::raw('YEAR(date) as year'),
         DB::raw('MONTH(date) as month')
         )
          ->groupBy('year', 'month')
          ->orderBy('year', 'desc')
          ->orderBy('month', 'desc')
          ->get();


        $totalParMois = Depense::when($year, function ($query, $year) {
             return $query->whereYear('date', $year);
          })
         ->when($month, function ($query, $month) {
             return $query->whereMonth('date', $month);
         })
        ->sum('montant');

     return view('depenses.index', compact('depenses', 'months','year','month','totalDepenses','totalParMois'));
    }

    public function create()
    {
        return view('depenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required',
            'montant' => 'required|numeric|min:0.01',
        ]);

        Depense::create($request->all());

        return redirect()->route('depenses.index')->with('success', 'Dépense ajoutée avec succès.');
    }

    public function show(Depense $depense)
     {
        return view('depenses.show', ['depense' => $depense]);
    }

     public function edit(Depense $depense)
     {
         return view('depenses.edit', ['depense' => $depense]);
     }

     public function update(Request $request, Depense $depense)
     {
        $validated = $request->validate([
             'date' => 'required|date',
             'description' => 'required|string',
             'montant' => 'required|numeric',
         ]);

         $depense->update($validated);
         return redirect()->route('depenses.index')->with('success', 'Depense updated successfully!');
     }

    public function destroy(Depense $depense)
    {
        $depense->delete();
        return redirect()->route('depenses.index')->with('success', 'Dépense supprimée avec succès.');
    }
}
