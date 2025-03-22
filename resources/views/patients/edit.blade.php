@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Patient</h1>

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $patient->name }}" class="border px-4 py-2 w-full mb-2" required>
        <input type="email" name="email" value="{{ $patient->email }}" class="border px-4 py-2 w-full mb-2" required>
        <input type="text" name="phone" value="{{ $patient->phone }}" class="border px-4 py-2 w-full mb-2" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
