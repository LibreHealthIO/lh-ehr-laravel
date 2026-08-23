<?php

namespace App\Models\Patients;

use Database\Factories\Patients\PatientContactLinkFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientContactLink extends Model
{
    /**
     * @use HasFactory<PatientContactLinkFactory>
     */
    use HasFactory;
}
