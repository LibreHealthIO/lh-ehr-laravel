<?php

namespace App\Models;

use App\Models\Facilities\Facility;
use App\Models\Patients\Patient;
use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Khsing\World\Models\City;
use Khsing\World\Models\Country;

class Address extends Model
{
    /**
     * @use HasFactory<AddressFactory>
     */
    use HasFactory;

    protected $with = ['city', 'country'];

    /**
     * Return patients' address
     *
     * @return BelongsTo<Patient, self>
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'id');
    }

    /**
     * Returns facilities' address
     *
     * @return BelongsTo<Facility, self>
     */
    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'id');
    }

    /**
     * Return users' address
     *
     * @return BelongsTo<User, self>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Return address' city
     *
     * @return BelongsTo<City, self>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Return address' country
     *
     * @return BelongsTo<Country, self>
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
