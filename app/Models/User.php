<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Notifications\DatabaseNotification;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;
use Khsing\World\Models\Country;
use Laratrust\Traits\HasRolesAndPermissions as LaratrustUserTrait;

/**
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $profile_picture
 * @property string|null $suffix
 * @property string|null $info
 * @property bool $active
 * @property string|null $email_verified_at
 * @property string|null $timezone
 * @property-read \Khsing\World\Models\Country $country
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\Currency $currency
 */
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;
    use HasFactory;
    use LaravelVueDatatableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username', 'password', 'first_name', 'middle_name', 'last_name', 'federal_tax_id',
        'federal_drug_id', 'see_auth', 'npi', 'suffix', 'taxonomy', 'calendar_ui', 'info',
        'new_crop_user_role', 'access_control', 'in_calendar', 'device_id', 'last_login_at',
        'last_login_ip', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Return address of the user.
     *
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Return user's country default is USA (id = 169)
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Gets user's currency (default XAF)
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Return all user's roles
     * @return Collection
     */
    public function getUserRolesAttribute(): Collection
    {
        return $this->roles()->get(['id', 'name']);
    }

    /**
     * Return all user's permissions
     * @return Collection
     */
    public function getUserPermissionsAttribute(): Collection
    {
        return $this->permissions()->get(['id', 'name']);
    }

    /**
     * Specifies the user's FCM token
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->device_id;
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }
}
