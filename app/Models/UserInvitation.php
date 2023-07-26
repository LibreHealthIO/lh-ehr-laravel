<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvitation extends Model
{
    use HasFactory;
    protected $table = 'user_invitations';
    protected $fillable = ['for_user', 'email', 'code', 'status', 'valid_till'];

    public function user()
    {
        return $this->belongsTo(UsersInvited::class, 'for_user');
    }
}
