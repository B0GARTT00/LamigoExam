<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get random patients
        $patients = Patient::all();

        // Seed 10 appointments with random data
        foreach ($patients as $patient) {
            Appointment::create([
                'patient_id' => $patient->id,
                'appointment_date' => Carbon::now()->addDays(rand(1, 30)),  // Appointment within the next 30 days
                'status' => ['Pending', 'Completed', 'Cancelled'][rand(0, 2)], // Random appointment status
            ]);
        }
    }
}
