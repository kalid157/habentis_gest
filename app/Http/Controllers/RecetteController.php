<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecetteController extends Controller
{
    public function index(Request $request)
    { 
        $year = $request->input('year');
        $month = $request->input('month');

          $recettes = Recette::when($year, function ($query, $year) {
                return $query->whereYear('date', $year);
            })
             ->when($month, function ($query, $month) {
                return $query->whereMonth('date', $month);
            })
            ->orderBy('date', 'desc')
            ->paginate(4);

         $totalRecettes = Recette::sum('montant');

         $months = Recette::select(
           DB::raw('YEAR(date) as year'),
            DB::raw('MONTH(date) as month')
            )
             ->groupBy('year', 'month')
             ->orderBy('year', 'desc')
             ->orderBy('month', 'desc')
             ->get();


           $totalParMois = Recette::when($year, function ($query, $year) {
                return $query->whereYear('date', $year);
             })
            ->when($month, function ($query, $month) {
                return $query->whereMonth('date', $month);
            })
           ->sum('montant');

        return view('recettes.index', compact('recettes', 'months','year','month','totalRecettes','totalParMois'));
    }

    public function create()
    {
        return view('recettes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required',
            'montant' => 'required|numeric|min:0.01',
        ]);

        Recette::create($request->all());

        return redirect()->route('recettes.index')->with('success', 'Recette ajoutée avec succès.');
    }

    public function destroy(Recette $recette)
    {
        $recette->delete();
        return redirect()->route('recettes.index')->with('success', 'Recette supprimée avec succès.');
    }
}
