<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $employeeCount = Employee::count(); // Récupère le nombre d'employés
        return view('employees.index', compact('employees', 'employeeCount')); // Passe la variable à la vue
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
        // Ajout d'un journal de debug pour visualiser les données de la requête
        Log::debug('Données de la requête pour la création d\'un employé', $request->all());
        
        // Valider la requête entrante 
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees',
            'address' => 'required',
            'phone' => 'required',
            'fonction' => 'required',
            'status' => 'required'
        ]);
        
        // Create new employee
        Employee::create($request->all());
  
        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employe = Employee::findOrFail($employee);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'address' => 'required',
            'phone' => 'required',
            'fonction' => 'required',
            'status' => 'required',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
