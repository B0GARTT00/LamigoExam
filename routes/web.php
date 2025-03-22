<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes for appointments and patients
    Route::resource('appointments', AppointmentController::class);
    Route::resource('patients', PatientController::class);

    // Custom route for marking an appointment as completed
    Route::put('/appointments/{appointment}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');
});

require __DIR__.'/auth.php';
