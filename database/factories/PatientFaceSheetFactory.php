<?php

/*
|--------------------------------------------------------------------------
| Patient Data Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_face_sheets table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Patients\PatientFaceSheet;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PatientFaceSheet::class, function (Faker\Generator $faker) {

    $sex = ['male', 'female'];
    $marital_status = ['married', 'single', 'divorced', 'widowed', 'separated', 'd_partner'];
    $middle_name = ['kumar', 'singh', 'stewart'];
    $gender = $faker->randomElement($sex);

    return [
        'first_name' => $faker->firstName($gender),
        'middle_name' => $middle_name[array_rand($middle_name, 1)],
        'last_name' => $faker->lastName,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'marital_status' => $marital_status[array_rand($marital_status, 1)],
        'license_id' => $faker->uuid,
        'email' => $faker->unique()->safeEmail,
        'sex' => $sex[array_rand($sex, 1)],
        'billing_note' => $faker->text($maxNbChars = 200),
    ];
});
