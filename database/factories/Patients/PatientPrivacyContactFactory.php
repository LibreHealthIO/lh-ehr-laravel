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

namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use App\Models\Patients\PatientContact;
use App\Models\Patients\PatientPrivacyContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientPrivacyContactFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientPrivacyContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // Get all the patient ids in patients table.
        $patient_ids = Patient::all()->pluck('id')->toArray();

        $booleanValue = array(true, false);

        return [
            'patient_id' => $this->faker->randomElement($patient_ids),
            'contact_id' => PatientContact::factory(),
            'allow_patient_portal' => $booleanValue[array_rand($booleanValue, 1)],
            'allow_health_info_ex' => $booleanValue[array_rand($booleanValue, 1)],
            'allow_imm_info_share' => $booleanValue[array_rand($booleanValue, 1)],
            'allow_imm_reg_use' => $booleanValue[array_rand($booleanValue, 1)],
            'vfc' => $booleanValue[array_rand($booleanValue, 1)],
            'secure_email' => $this->faker->unique()->safeEmail,
            'deceased_reason' => $this->faker->text($maxNbChars = 100),
            'deceased_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
