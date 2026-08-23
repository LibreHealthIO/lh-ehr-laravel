<?php

namespace App\Models\Patients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientHistory extends Model
{
    protected $table = 'patient_histories';

    /**
     * Return patient that has this history
     *
     * @return BelongsTo<Patient, self>
     */
    public function patient(): BelongsTo<Patient, self>
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
