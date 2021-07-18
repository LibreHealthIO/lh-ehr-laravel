<?php

namespace App\Models\Patients;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends Model
{
    use HasFactory;

    /**
     * Return address of the patient.
     *
     * @return BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * Return patient's face sheet data
     *
     * @return HasOne
     */
    public function faceSheet()
    {
        return $this->hasOne(PatientFaceSheet::class, 'patient_id');
    }

    /**
     * Return patient's history data
     *
     * @return HasOne
     */
    public function history()
    {
        return $this->hasOne(PatientHistory::class, 'patient_id');
    }
}
