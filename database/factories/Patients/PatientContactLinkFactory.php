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

namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use App\Models\Patients\PatientContact;
use App\Models\Patients\PatientContactLink;
use Illuminate\Database\Eloquent\Factories\Factory;


class PatientContactLinkFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientContactLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        //Get all the patient ids in patients table.
        $patient_ids = Patient::all()->pluck('id')->toArray();

        return [
            'patient_id' => $this->faker->randomElement($patient_ids),
            'contact_id' => PatientContact::factory(),
        ];
    }
}
