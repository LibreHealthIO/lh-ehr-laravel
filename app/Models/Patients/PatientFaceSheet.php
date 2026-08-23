<?php

namespace App\Models\Patients;

use App\Models\User;
use Carbon\Carbon;
use Database\Factories\Patients\PatientFaceSheetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $patient_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $dob
 * @property string $age
 * @property string $marital_status
 * @property string $license_id
 * @property string $email
 * @property string $sex
 * @property string|null $billing_note
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Patients\Patient $patient
 */
class PatientFaceSheet extends Model
{
    /**
     * @use HasFactory<PatientFaceSheetFactory>
     */
    use HasFactory;
    use SoftDeletes;

    protected $appends = ['age'];

    /**
     * Return patient that has this face sheet
     *
     * @return BelongsTo<Patient, $this>
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getAgeAttribute(): string
    {
        $age = 0;
        $unit = 'seconds';
        if ($this->dob != null) {
            $age = Carbon::now()->diffInYears($this->dob);
            $unit = trans_choice('forms.year', $age);
            if ($age == 0) {
                $age = Carbon::now()->diffInMonths($this->dob);
                $unit = trans_choice('forms.month', $age);
                if ($age == 0) {
                    $age = Carbon::now()->diffInDays($this->dob);
                    $unit = trans_choice('forms.day', $age);
                    if ($age == 0) {
                        $age = Carbon::now()->diffInHours($this->dob);
                        $unit = trans_choice('forms.hour', $age);
                        if ($age == 0) {
                            $age = Carbon::now()->diffInMinutes($this->dob);
                            $unit = trans_choice('forms.minute', $age);
                            if ($age == 0) {
                                $age = Carbon::now()->diffInSeconds($this->dob);
                                $unit = trans_choice('forms.second', $age);
                            }
                        }
                    }
                }
            }
        }
        return $age. " ".$unit;
    }
}
