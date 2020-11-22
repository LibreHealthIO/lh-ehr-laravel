<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Khsing\World\Models\Country;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'first_name', 'middle_name', 'last_name', 'federal_tax_id',
        'federal_drug_id', 'see_auth', 'npi', 'suffix', 'taxonomy', 'calendar_ui', 'info',
        'new_crop_user_role', 'access_control', 'in_calendar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Return address of the user.
     *
     * @return HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Return user's country default is USA (id = 169)
     *
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
