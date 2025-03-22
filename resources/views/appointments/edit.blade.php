@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Appointment</h1>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="patient_id" class="form-label">Patient</label>
            <select class="form-control" name="patient_id" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Appointment Date</label>
            <input type="datetime-local" class="form-control" name="appointment_date" value="{{ $appointment->appointment_date }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" required>
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
