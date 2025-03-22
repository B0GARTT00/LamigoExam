<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone' => '09123456789',
                'address' => '123 Main Street',
                'birthdate' => '1990-01-15',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone' => '09129876543',
                'address' => '456 Elm Street',
                'birthdate' => '1995-03-22',
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michaeljohnson@example.com',
                'phone' => '09213456789',
                'address' => '789 Pine Avenue',
                'birthdate' => '1988-07-10',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emilydavis@example.com',
                'phone' => '09345678912',
                'address' => '321 Oak Street',
                'birthdate' => '1993-05-18',
            ],
            [
                'name' => 'Chris Brown',
                'email' => 'chrisbrown@example.com',
                'phone' => '09456789123',
                'address' => '654 Maple Road',
                'birthdate' => '1991-11-30',
            ],
            [
                'name' => 'Olivia Wilson',
                'email' => 'oliviawilson@example.com',
                'phone' => '09567891234',
                'address' => '987 Cedar Lane',
                'birthdate' => '1997-09-14',
            ],
            [
                'name' => 'David Martinez',
                'email' => 'davidmartinez@example.com',
                'phone' => '09678912345',
                'address' => '258 Spruce Drive',
                'birthdate' => '1985-06-25',
            ],
            [
                'name' => 'Sophia Taylor',
                'email' => 'sophiataylor@example.com',
                'phone' => '09789123456',
                'address' => '369 Redwood Blvd',
                'birthdate' => '1994-04-03',
            ],
            [
                'name' => 'Daniel Anderson',
                'email' => 'danielanderson@example.com',
                'phone' => '09891234567',
                'address' => '147 Birch Court',
                'birthdate' => '1989-02-28',
            ],
            [
                'name' => 'Emma Thomas',
                'email' => 'emmathomas@example.com',
                'phone' => '09912345678',
                'address' => '753 Elmwood Avenue',
                'birthdate' => '1996-08-21',
            ],
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }
}
