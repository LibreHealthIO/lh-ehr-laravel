<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $table = 'invitations';
    protected $fillable = ['email', 'facility', 'token', 'status', 'valid_till', 'accepted_at'];
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
