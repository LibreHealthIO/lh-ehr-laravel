<?php

/*
|--------------------------------------------------------------------------
| User Addr Book Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for user_addr_books table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/


/** @var Factory $factory */

use App\Models\User;
use App\Models\UserAddrBook;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(
    UserAddrBook::class,
    function (Faker\Generator $faker) {

    $user_ids = User::all()->pluck('id')->toArray();
    $address_book_type = ['Imaging Service', 'Immunization Service', 'Lab Service', 'Specialist',
        'Vendor', 'Distributor', 'Care Coordination', 'Other', 'EMR Direct', 'External Provider',
        'External Organization'];

    $gender = $faker->randomElement(['male', 'female']);

    return [
	    'user_id' => $faker->randomElement($user_ids),
	    'title' => $faker->title($gender),
	    'email' => $faker->unique()->safeEmail,
	    'url' => $faker->url,
	    'assistant' => Str::random(),
	    'organization' => $faker->company,
	    'valedictory' => Str::random(10),
	    'speciality' => Str::random(10), /*These likes nurse, physician, etc*/
	    'notes' => $faker->realText($maxNbChars = 200, $indexSize = 2),
	    'address_book_type' => $address_book_type[array_rand($address_book_type, 1)],
    ];
});
