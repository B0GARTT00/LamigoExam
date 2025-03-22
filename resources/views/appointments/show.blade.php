@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Appointment Details</h1>

    <div class="mb-4">
        <strong>Patient Name:</strong> {{ $appointment->patient->name }}
    </div>
    <div class="mb-4">
        <strong>Appointment Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y h:i A') }}
    </div>
    <div class="mb-4">
        <strong>Status:</strong> 
        <span class="px-3 py-1 text-sm font-semibold 
            {{ $appointment->status === 'Pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }} 
            rounded">
            {{ $appointment->status }}
        </span>
    </div>
    <div class="mb-4">
        <strong>Description:</strong> {{ $appointment->description ?? 'No description available.' }}
    </div>

    <a href="{{ route('appointments.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-200">
        Back to Appointments
    </a>
</div>
@endsection
