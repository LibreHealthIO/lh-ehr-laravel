<?php

/*
|--------------------------------------------------------------------------
| Patient Contact Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_contacts table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

/** @var Factory $factory */

use App\Models\Patients\PatientContact;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(PatientContact::class,
    function (Faker\Generator $faker) {

    /*
     * ProviderId and ReferenceProviderId may refer to users table.
     * If this is the case, then get id from user factory.
     * Right now they are seeded with random numbers.
     */

    $contact_relationship = ['father', 'mother', 'spouse', 'siblings', 'son', 'daughter', 'friend', 'self'];

    return [
	    'provider_id' => $faker->randomNumber($nbDigits = 4, $strict = false),
	    'reference_provider_id' => $faker->randomNumber($nbDigits = 4, $strict = false),
	    'home_phone' => $faker->e164PhoneNumber,
	    'work_phone' => $faker->e164PhoneNumber,
	    'contact_phone' => $faker->e164PhoneNumber,
	    'contact_relationship' => $contact_relationship[array_rand($contact_relationship, 1)],
	    'patient_email' => $faker->unique()->safeEmail,
	    'county' => Str::random(10),
	    'country_id' => $faker->numberBetween(1, 248),
    ];
});
