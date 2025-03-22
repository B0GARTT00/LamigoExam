@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg border border-gray-200">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Add Patient</h1>

        <!-- Form -->
        <form action="{{ route('patients.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Name -->
            <div class="relative">
                <label for="name" class="block text-gray-700 font-medium">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter full name"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none" required>
            </div>

            <!-- Email -->
            <div class="relative">
                <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none" required>
            </div>

            <!-- Phone -->
            <div class="relative">
                <label for="phone" class="block text-gray-700 font-medium">Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none" required>
            </div>

            <!-- Address -->
            <div class="relative">
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter address"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none">
            </div>

            <!-- Birthdate -->
            <div class="relative">
                <label for="birthdate" class="block text-gray-700 font-medium">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-gray-800 text-white font-semibold px-4 py-2 rounded-lg hover:bg-gray-900 transition duration-300">
                Save Patient
            </button>
        </form>
    </div>
</div>
@endsection
