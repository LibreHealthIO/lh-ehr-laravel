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

namespace Database\Factories\Patients;

use App\Models\Patients\PatientContact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PatientContactFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        /*
         * ProviderId and ReferenceProviderId may refer to users table.
         * If this is the case, then get id from user factory.
         * Right now they are seeded with random numbers.
         */

        $contact_relationship = ['father', 'mother', 'spouse', 'siblings', 'son', 'daughter', 'friend', 'self'];

        return [
            'provider_id' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
            'reference_provider_id' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
            'home_phone' => $this->faker->e164PhoneNumber,
            'work_phone' => $this->faker->e164PhoneNumber,
            'contact_phone' => $this->faker->e164PhoneNumber,
            'contact_relationship' => $contact_relationship[array_rand($contact_relationship, 1)],
            'patient_email' => $this->faker->unique()->safeEmail,
            'county' => Str::random(10),
            'country_id' => $this->faker->numberBetween(1, 248),
        ];
    }
}
