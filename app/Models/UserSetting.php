<?php

namespace App\Models;

use Database\Factories\UserSettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    /**
     * @use HasFactory<UserSettingFactory>
     */
    use HasFactory;
}
