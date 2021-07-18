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

namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use App\Models\Patients\PatientContact;
use App\Models\Patients\PatientContactCommunication;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientContactCommunicationFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientContactCommunication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        //Get all the patients ids in patients table.
        $patient_ids = Patient::all()->pluck('id')->toArray();

        $mailMode = array(true, false);
        $voiceMode = array(true, false);
        $messageMode = array(true, false);

        return [
            'patient_id' => $this->faker->randomElement($patient_ids),
            'contact_id' => PatientContact::factory(),
            'mail_mode' => $mailMode[array_rand($mailMode, 1)],
            'voice_mode' => $voiceMode[array_rand($voiceMode, 1)],
            'message' => $this->faker->text($maxNbChars = 200),
            'message_mode' => $messageMode[array_rand($messageMode, 1)],
        ];
    }
}
