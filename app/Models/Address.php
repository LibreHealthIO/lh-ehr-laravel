<?php

namespace App\Models;

use App\Models\Facilities\Facility;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Khsing\World\Models\City;
use Khsing\World\Models\Country;

class Address extends Model
{

    protected $with = ['city', 'country'];

    /**
     * Return patients' address
     *
     * @return BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id');
    }

    /**
     * Returns facilities' address
     *
     * @return BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'id');
    }

    /**
     * Return users' address
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Return address' city
     *
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Return address' country
     *
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
