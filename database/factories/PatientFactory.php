<?php

/*
|--------------------------------------------------------------------------
| Patient Data Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_data table.
| Further used in PatientDataTableSeeder.php.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Address;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Patient::class, function (Faker\Generator $faker) {

    // Add if any new occupation is added in the UI
    $occupation = ['Engineer', 'Doctor', 'Lawyer', 'Site Worker', 'Student'];

    //Add if any new industry is added in UI.
    $industry = ['Law Firm', 'Engineering Firm', 'Construction Firm', 'College'];

    $gender = $faker->randomElement(['male', 'female']);

    return [
        'title' => $faker->title($gender),
        'occupation' => $occupation[array_rand($occupation, 1)],
	    'industry' => $industry[array_rand($industry, 1)],
	    'address_id' => factory(Address::class)->create()->id,
    ];
});
