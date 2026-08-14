<?php

namespace App\Models\Patients;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string|null $dob
 * @property string $age
 * @property string|null $marital_status
 * @property string|null $license_id
 * @property string|null $email
 * @property string|null $sex
 * @property string|null $billing_note
 */
class PatientFaceSheet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $appends = ['age'];

    /**
     * Return patient that has this face sheet
     *
     * @return BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getAgeAttribute()
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
