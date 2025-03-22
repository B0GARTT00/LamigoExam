@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m2 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Appointments</h2>
                    <p class="text-2xl font-bold">{{ $totalAppointments }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="flex items-center">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg class="h-8 w-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 16v2m0-6h.01M5 8h14M5 12h14M5 16h14" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Pending Appointments</h2>
                    <p class="text-2xl font-bold">{{ $pendingAppointments }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="h-8 w-8 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Completed Appointments</h2>
                    <p class="text-2xl font-bold">{{ $completedAppointments }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Appointments -->
    <h2 class="text-2xl font-bold mt-8 mb-4">Recent Appointments</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-6 text-left text-gray-600 font-semibold uppercase">Patient</th>
                    <th class="py-3 px-6 text-left text-gray-600 font-semibold uppercase">Date</th>
                    <th class="py-3 px-6 text-left text-gray-600 font-semibold uppercase">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentAppointments as $appointment)
                <tr class="hover:bg-gray-50 border-b">
                    <td class="py-4 px-6">{{ $appointment->patient->name ?? 'Unknown' }}</td>
                    <td class="py-4 px-6">{{ $appointment->appointment_date }}</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                            {{ $appointment->status === 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $appointment->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
