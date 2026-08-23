<?php

namespace App\Models\Patients;

use Database\Factories\Patients\PatientContactFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientContact extends Model
{
    /**
     * @use HasFactory<PatientContactFactory>
     */
    use HasFactory;
}
