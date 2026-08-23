<?php

namespace App\Models\Patients;

use Database\Factories\Patients\PatientSocialStatisticFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSocialStatistic extends Model
{
    /**
     * @use HasFactory<PatientSocialStatisticFactory>
     */
    use HasFactory;
}
