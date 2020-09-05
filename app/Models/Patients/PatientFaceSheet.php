<?php

namespace App\Models\Patients;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientFaceSheet extends Model
{
    /**
     * Return patient that has this face sheet
     *
     * @return BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patients\Patient', 'patient_id');
    }
}
