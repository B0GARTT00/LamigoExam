@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-center mb-6">Patients</h1>

    <a href="{{ route('patients.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300 mb-6 inline-block">
        Add Patient
    </a>

    @if (session('success'))
        <div class="bg-green-200 text-green-800 px-6 py-3 mt-4 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    @if ($patients->isEmpty())
        <div class="bg-gray-100 text-gray-600 px-6 py-3 mt-4 rounded-lg shadow-md text-center">
            No patients found.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($patients as $patient)
                <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-4 hover:shadow-2xl transition duration-300">
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-700">{{ $patient->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $patient->email }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600">Phone: {{ $patient->phone }}</p>
                        <p class="text-sm text-gray-600">Address: {{ $patient->address ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-600">Birthdate: {{ $patient->birthdate ?? 'N/A' }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('patients.edit', $patient->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-300">
                            Edit
                        </a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300"
                                onclick="return confirm('Are you sure you want to delete this patient?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
