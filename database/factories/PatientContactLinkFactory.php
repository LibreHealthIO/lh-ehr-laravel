<?php

/*
|--------------------------------------------------------------------------
| Patient Contact Link Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_contact_links table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Patients\PatientContact;
use App\Models\Patients\PatientContactLink;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factory;

$factory->define(
    PatientContactLink::class,
    function (Faker\Generator $faker) {

    //Get all the patient ids in patients table.
    $patient_ids = Patient::all()->pluck('id')->toArray();

    return [
        'patient_id' => $faker->randomElement($patient_ids),
	    'contact_id' => factory(PatientContact::class)->create()->id,
    ];
});
