<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $table = 'invitations';
    protected $fillable = ['for_user', 'email', 'token', 'status', 'valid_till'];

    public function user()
    {
        return $this->belongsTo(User::class, 'for_user');
    }
}
