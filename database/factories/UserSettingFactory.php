<?php

/*
|--------------------------------------------------------------------------
| User Setting Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_settings table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
|
*/

/** @var Factory $factory */

use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(
    UserSetting::class,
    function (Faker\Generator $faker) {

    $user_ids = User::all()->pluck('id')->toArray();

    return [
        'user_id' => $faker->randomElement($user_ids),
	    'setting_label' => Str::random(10),
	    'setting_value' => $faker->randomNumber($nbDigits = 2, $strict = false),
    ];
});
