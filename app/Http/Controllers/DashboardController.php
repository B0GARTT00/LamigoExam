<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard data.
     */
    public function index()
    {
        $totalAppointments = Appointment::count();
        $pendingAppointments = Appointment::where('status', 'Pending')->count();
        $completedAppointments = Appointment::where('status', 'Completed')->count();
        $recentAppointments = Appointment::with('patient')
            ->orderBy('appointment_date', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalAppointments', 
            'pendingAppointments', 
            'completedAppointments', 
            'recentAppointments'
        ));
    }
}

