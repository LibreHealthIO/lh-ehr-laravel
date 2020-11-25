<?php

/*
|--------------------------------------------------------------------------
| User Facility Link Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_facility_links table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/


/** @var Factory $factory */

use App\Models\Facilities\Facility;
use App\Models\Facilities\FacilityUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factory;

$factory->define(
    FacilityUser::class,
    function (Faker\Generator $faker) {

    $user_ids = User::all()->pluck('id')->toArray();
    $facility_ids = Facility::all()->pluck('id')->toArray();
    $booleanValue = array(true, false);

    return [
	    'user_id' => $faker->randomElement($user_ids),
	    'facility_id' => $faker->randomElement($facility_ids),
	    'is_default' => $booleanValue[array_rand($booleanValue, 1)],
    ];
});
