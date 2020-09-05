<?php

/*
|--------------------------------------------------------------------------
| Patient Employer Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_employers table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Address;
use App\Models\Patients\Patient;
use App\Models\Patients\PatientEmployer;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PatientEmployer::class, function (Faker\Generator $faker) {

    //Get all the patients ids in patient_data table.
    $patient_ids = Patient::all()->pluck('id')->toArray();
    return [
        'patient_id' => $faker->randomElement($patient_ids),
	    'address_id' => factory(Address::class)->create()->id,
	    'name' => $faker->company,
    ];
});
