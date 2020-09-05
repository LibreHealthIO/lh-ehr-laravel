<?php

/*
|--------------------------------------------------------------------------
| User Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for users table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/


use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/** @var Factory $factory */

$factory->define(User::class, function ($faker) {

    $middle_name = ['kumar', 'singh', 'stewart'];
    $calendar_ui = ['outlook', 'Original', 'Fancy'];
    $newcrop_user_role = ['NewCrop Admin', 'NewCrop Nurse',
        'NewCrop Manager', 'NewCrop Dcotor', 'NewCrop Midlevel Prescriber',
        'NewCrop Supervising Doctor'];

    /*Update if new acl added.*/
    $access_control = ['Accounting', 'Administrators', 'Clinicians', 'Emergency Log', 'Front Office', 'Physicians'];
    $booleanVal = array(true, false);

    $faker_tax = Faker::create('it_IT');
    $faker_npi = Faker::create('ar_SA');

    $gender = $faker->randomElement(['male', 'female']);

    return [
	    'username' => $faker->unique()->userName,
	    'password' => bcrypt('$lh_ehr3#!'),
	    'first_name' => $faker->firstName($gender),
	    'middle_name' => $middle_name[array_rand($middle_name, 1)],
	    'last_name' => $faker->lastName,
	    'federal_tax_id' => $faker_tax->unique()->taxId(),
	    'federal_drug_id' => $faker->uuid,
	    'see_auth' => $faker->randomDigit,
	    'npi' => $faker_npi->nationalIdNumber,
	    'suffix' => $faker->suffix,
	    'taxonomy' => Str::random(10),
	    'calendar_ui' => $calendar_ui[array_rand($calendar_ui, 1)],
	    'info' => $faker->realText($maxNbChars = 200, $indexSize = 2),
	    'new_crop_user_role' => $newcrop_user_role[array_rand($newcrop_user_role, 1)],
	    'access_control' => $access_control[array_rand($access_control, 1)],
	    'in_calendar' => $booleanVal[array_rand($booleanVal, 1)],
    ];
});
