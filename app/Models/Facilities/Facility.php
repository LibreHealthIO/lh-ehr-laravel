<?php

namespace App\Models\Facilities;

use App\Models\Address;
use Database\Factories\Facilities\FacilityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facility extends Model
{
    /**
     * @use HasFactory<FacilityFactory>
     */
    use HasFactory;

    /**
     * Returns facility address.
     *
     * @return BelongsTo<Address, $this>
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
