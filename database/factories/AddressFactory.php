<?php

/*
|--------------------------------------------------------------------------
| Address Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed Address table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Address;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Address::class, function (Faker\Generator $faker) {

    return [
        'line1' => $faker->streetName,
        'line2' => $faker->streetAddress,
        'city_id' => 4,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'plus_four' => Str::random(4),
        'country_id' => $faker->numberBetween(1, 248),
    ];
});
