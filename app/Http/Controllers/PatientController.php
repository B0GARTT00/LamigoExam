<?php

namespace App\Http\Controllers;

use App\Models\Patient; 

use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display a list of patients
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Show the form for creating a new patient
    public function create()
    {
        return view('patients.create');
    }

    // Store a newly created patient in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'required|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    // Display a single patient
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    // Show the form for editing the patient
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Update the patient in the database
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'phone' => 'required|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    // Delete the patient from the database
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}