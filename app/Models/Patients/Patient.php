<?php

namespace App\Models\Patients;

use App\Models\Address;
use Database\Factories\Patients\PatientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

/**
 * @property int $id
 * @property string $pid
 * @property string $title
 * @property string $occupation
 * @property string $industry
 * @property int $address_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Patients\PatientFaceSheet $faceSheet
 * @property-read \App\Models\Address $address
 */
class Patient extends Model
{
    /**
     * @use HasFactory<PatientFactory>
     */
    use HasFactory;
    use LaravelVueDatatableTrait;
    use SoftDeletes;

    /**
     * @var array<string, array<string, bool>>
     */
    protected array $dataTableColumns = [
        'id' => ['searchable' => false],
        'pid' => ['searchable' => true],
        'occupation' => ['searchable' => true],
        'industry' => ['searchable' => true],
        'created_at' => ['searchable' => true],
        'updated_at' => ['searchable' => true],
    ];

    /**
     * Return address of the patient.
     *
     * @return BelongsTo<Address, self>
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * Return patient's face sheet data
     *
     * @return HasOne<PatientFaceSheet, self>
     */
    public function faceSheet(): HasOne
    {
        return $this->hasOne(PatientFaceSheet::class, 'patient_id');
    }

    /**
     * Return patient's history data
     *
     * @return HasOne<PatientHistory, self>
     */
    public function history(): HasOne
    {
        return $this->hasOne(PatientHistory::class, 'patient_id');
    }
}
