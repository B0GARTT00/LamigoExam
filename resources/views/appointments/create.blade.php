@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg border border-gray-200">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Create Appointment</h1>

        <!-- Form -->
        <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Patient Dropdown -->
            <div>
                <label for="patient_id" class="block text-gray-700 font-medium">Select Patient</label>
                <select name="patient_id" id="patient_id"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none">
                    <option value="">-- Select Patient --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('patient_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Appointment Date -->
            <div>
                <label for="appointment_date" class="block text-gray-700 font-medium">Date</label>
                <input type="date" name="appointment_date" id="appointment_date"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none" required>
                @error('appointment_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Time -->
            <div>
                <label for="time" class="block text-gray-700 font-medium">Time</label>
                <input type="time" name="time" id="time"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none" required>
                @error('time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700 font-medium">Status</label>
                <select name="status" id="status"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none">
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-medium">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none" required></textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-gray-800 text-white font-semibold px-4 py-2 rounded-lg hover:bg-gray-900 transition duration-300">
                Save Appointment
            </button>
        </form>
    </div>
</div>
@endsection
