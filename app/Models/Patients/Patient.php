<?php

namespace App\Models\Patients;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Patient extends Model
{
    use HasFactory;
    use LaravelVueDatatableTrait;

    protected array $dataTableColumns = [
        'id' => ['searchable' => false],
        'occupation' => ['searchable' => true],
        'industry' => ['searchable' => true],
        'created_at' => ['searchable' => true],
        'updated_at' => ['searchable' => true],
    ];

    /**
     * Return address of the patient.
     *
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * Return patient's face sheet data
     *
     * @return HasOne
     */
    public function faceSheet(): HasOne
    {
        return $this->hasOne(PatientFaceSheet::class, 'patient_id');
    }

    /**
     * Return patient's history data
     *
     * @return HasOne
     */
    public function history(): HasOne
    {
        return $this->hasOne(PatientHistory::class, 'patient_id');
    }
}
