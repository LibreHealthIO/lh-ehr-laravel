<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInvited extends Model
{
    use HasFactory;
    protected $table = 'users_invited';
    protected $fillable = [
        'username','email', 'first_name', 'middle_name', 'last_name', 'federal_tax_id',
        'federal_drug_id', 'npi', 'suffix', 'taxonomy','license','provider_type','warehouse', 'info','facility',
     'access_control',
    ];

}
