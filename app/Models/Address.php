<?php

namespace App\Models;

use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    /**
     * Return patient that has this address
     *
     * @return BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id');
    }


    /**
     * Return user that has this address
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
