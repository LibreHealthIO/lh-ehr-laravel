<?php

/*
|--------------------------------------------------------------------------
| User Residential Link Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_residential_links table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Address;
use App\Models\User;
use App\Models\UserResidentialLink;
use Illuminate\Database\Eloquent\Factory;

$factory->define(UserResidentialLink::class, function (Faker\Generator $faker) {

    $user_ids = User::all()->pluck('id')->toArray();
    $addr_type = array(0, 1);
    return [
        'address_id' => factory(Address::class)->create()->id,
	    'user_id' => $faker->randomElement($user_ids),
	    'type' => $addr_type[array_rand($addr_type, 1)],
    ];
});
