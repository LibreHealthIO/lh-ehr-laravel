<?php

/*
|--------------------------------------------------------------------------
| Patient Contact Communication Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_contact_communications table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Patients\PatientContact;
use App\Models\Patients\PatientContactCommunication;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PatientContactCommunication::class, function (Faker\Generator $faker) {

    //Get all the patients ids in patients table.
    $patient_ids = Patient::all()->pluck('id')->toArray();

    $mailMode = array(true, false);
    $voiceMode = array(true, false);
    $messageMode = array(true, false);

    return [
	    'patient_id' => $faker->randomElement($patient_ids),
	    'contact_id' => factory(PatientContact::class)->create()->id,
	    'mail_mode' => $mailMode[array_rand($mailMode, 1)],
	    'voice_mode' => $voiceMode[array_rand($voiceMode, 1)],
	    'message' => $faker->text($maxNbChars = 200),
	    'message_mode' => $messageMode[array_rand($messageMode, 1)],
    ];
});
