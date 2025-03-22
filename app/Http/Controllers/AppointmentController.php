<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments.
     */
    public function index()
    {
        $appointments = Appointment::with('patient')->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $patients = \App\Models\Patient::all();
        return view('appointments.create', compact('patients'));
    }

    /**
     * Store a newly created appointment.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully');
    }

    /**
     * Show the form for editing an appointment.
     */
    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        return view('appointments.edit', compact('appointment', 'patients'));
    }

    /**
     * Update the specified appointment.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
    }

    /**
     * Remove the specified appointment.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }

    /**
     * Mark the specified appointment as completed.
     */
    public function complete($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        if ($appointment) {
            // Check if the appointment is not already completed
            if ($appointment->status !== 'completed') {
                $appointment->status = 'completed';
                $appointment->save();

                return redirect()->route('appointments.index')->with('success', 'Appointment marked as completed!');
            }

            return redirect()->route('appointments.index')->with('success', 'This appointment is already completed.');
        }

        return redirect()->route('appointments.index')->with('error', 'Appointment not found.');
    }

    /**
     * Display the details of a specific appointment.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }
}
