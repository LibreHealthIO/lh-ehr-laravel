<?php

namespace App\Models\Patients;

use Database\Factories\Patients\PatientEmployerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientEmployer extends Model
{
    /**
     * @use HasFactory<PatientEmployerFactory>
     */
    use HasFactory;
}
