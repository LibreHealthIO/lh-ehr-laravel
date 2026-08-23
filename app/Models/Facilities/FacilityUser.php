<?php

namespace App\Models\Facilities;

use Database\Factories\Facilities\FacilityUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityUser extends Model
{
    /**
     * @use HasFactory<FacilityUserFactory>
     */
    use HasFactory;
}
