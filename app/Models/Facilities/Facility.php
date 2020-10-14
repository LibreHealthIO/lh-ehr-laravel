<?php

namespace App\Models\Facilities;

use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facility extends Model
{
    /**
     * Returns facility address.
     *
     * @return BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
