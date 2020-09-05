<?php

/*
|--------------------------------------------------------------------------
| Patient Privacy Contacts Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_contact_communications table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Patients\Patient;
use App\Models\Patients\PatientContact;
use App\Models\Patients\PatientPrivacyContact;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PatientPrivacyContact::class, function (Faker\Generator $faker) {

    // Get all the patient ids in patients table.
    $patient_ids = Patient::all()->pluck('id')->toArray();

    $booleanValue = array(true, false);

    return [
	    'patient_id' => $faker->randomElement($patient_ids),
	    'contact_id' => factory(PatientContact::class)->create()->id,
	    'allow_patient_portal' => $booleanValue[array_rand($booleanValue, 1)],
	    'allow_health_info_ex' => $booleanValue[array_rand($booleanValue, 1)],
	    'allow_imm_info_share' => $booleanValue[array_rand($booleanValue, 1)],
	    'allow_imm_reg_use' => $booleanValue[array_rand($booleanValue, 1)],
	    'vfc' => $booleanValue[array_rand($booleanValue, 1)],
	    'secure_email' => $faker->unique()->safeEmail,
	    'deceased_reason' => $faker->text($maxNbChars = 100),
	    'deceased_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
