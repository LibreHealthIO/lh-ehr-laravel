<?php

namespace App\Models\Patients;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientFaceSheet extends Model
{
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
            $unit = __('forms.years');
            if ($age == 0) {
                $age = Carbon::now()->diffInMonths($this->dob);
                $unit = __('forms.months');
                if ($age == 0) {
                    $age = Carbon::now()->diffInDays($this->dob);
                    $unit = __('forms.days');
                    if ($age == 0) {
                        $age = Carbon::now()->diffInHours($this->dob);
                        $unit = __('forms.hours');
                        if ($age == 0) {
                            $age = Carbon::now()->diffInMinutes($this->dob);
                            $unit = __('forms.minutes');
                            if ($age == 0) {
                                $age = Carbon::now()->diffInSeconds($this->dob);
                                $unit = __('forms.seconds');
                            }
                        }
                    }
                }
            }
        }
        return $age. " ".$unit;
    }
}
