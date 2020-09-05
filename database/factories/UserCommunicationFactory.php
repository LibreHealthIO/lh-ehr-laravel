<?php

/*
|--------------------------------------------------------------------------
| User Communication Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_communications table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

use App\Models\User;
use App\Models\UserCommunication;
use Faker\Factory as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    UserCommunication::class,
    function ($faker) {

    $user_ids = User::all()->pluck('id')->toArray();
    $type = array(0, 1, 2, 3, 4);

    $faker_phone = Faker::create('pt_BR');

    return [
	    'user_id' => $faker->randomElement($user_ids),
	    'contact_number' => $faker_phone->cellphone,
	    'type' => $type[array_rand($type, 1)],
    ];
});
