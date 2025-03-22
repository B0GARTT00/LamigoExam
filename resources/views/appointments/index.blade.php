@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Appointments</h1>

    <!-- Add Appointment Button -->
    <a href="{{ route('appointments.create') }}" 
       class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-md transition duration-200 shadow-md inline-block">
        + Add Appointment
    </a>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 mt-4 rounded shadow-md">
            {{ session('success') }}
        </div>
    @endif

    @if ($appointments->isEmpty())
        <p class="text-gray-500 mt-6 text-center">No appointments found.</p>
    @else
        <!-- Cards Container -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($appointments as $appointment)
                <!-- Appointment Card -->
                <div class="bg-white rounded-lg shadow-md p-5 border border-gray-200 hover:shadow-lg transition duration-300">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-xl font-semibold text-gray-800">#{{ $appointment->id }}</h2>
                        <span class="px-3 py-1 text-sm font-semibold rounded 
                            {{ $appointment->status === 'Pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                            {{ $appointment->status }}
                        </span>
                    </div>

                    <p class="text-gray-600 mb-2"><strong>Patient:</strong> {{ $appointment->patient->name }}</p>
                    <p class="text-gray-600 mb-2"><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y h:i A') }}</p>

                    <!-- Action Buttons -->
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('appointments.show', $appointment->id) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm transition duration-200 shadow">
                            View
                        </a>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm transition duration-200 shadow">
                            Edit
                        </a>

                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm transition duration-200 shadow">
                                Delete
                            </button>
                        </form>
                    </div>

                    <!-- Mark as Completed -->
                    @if ($appointment->status !== 'completed')
                        <form action="{{ route('appointments.complete', $appointment->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('PUT')
                            <button type="submit" 
                                    class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm transition duration-200 shadow">
                                Mark as Completed
                            </button>
                        </form>
                    @else
                        <p class="text-green-600 text-sm text-center mt-3">Completed</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
