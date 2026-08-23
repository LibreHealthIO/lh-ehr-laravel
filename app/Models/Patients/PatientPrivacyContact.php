<?php

namespace App\Models\Patients;

use Database\Factories\Patients\PatientPrivacyContactFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientPrivacyContact extends Model
{
    /**
     * @use HasFactory<PatientPrivacyContactFactory>
     */
    use HasFactory;
}
