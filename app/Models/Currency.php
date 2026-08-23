<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    /**
     * Returns currency that belongs to users
     * @return HasMany<User, self>
     */
    public function users(): HasMany<User, self>
    {
        return $this->hasMany(User::class);
    }
}
