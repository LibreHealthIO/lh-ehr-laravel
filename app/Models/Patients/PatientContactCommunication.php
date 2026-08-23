<?php

namespace App\Models\Patients;

use Database\Factories\Patients\PatientContactCommunicationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientContactCommunication extends Model
{
    /**
     * @use HasFactory<PatientContactCommunicationFactory>
     */
    use HasFactory;
}
