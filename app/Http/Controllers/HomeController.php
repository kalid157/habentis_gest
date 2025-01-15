<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Recette;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalDepenses = Depense::sum('montant');
        $totalRecettes = Recette::sum('montant');
        $solde = $totalRecettes - $totalDepenses;

        // Fetch the user registrations count
        $userRegistrations = Setting::where('key', 'user_registrations')->value('value') ?? 0;



        return view('dashboard.index', compact('totalDepenses','totalRecettes', 'solde'));
    }
    
}
