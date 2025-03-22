<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'appointment_date',
        'status',
    ];

    // Define the relationship with patients
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
