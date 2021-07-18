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

namespace Database\Factories\Patients;

use App\Models\Address;
use App\Models\Patients\Patient;
use App\Models\Patients\PatientEmployer;
use Illuminate\Database\Eloquent\Factories\Factory;


class PatientEmployerFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientEmployer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // Get all the patients ids in patient_data table.
        $patient_ids = Patient::all()->pluck('id')->toArray();
        return [
            'patient_id' => $this->faker->randomElement($patient_ids),
            'address_id' => Address::factory(),
            'name' => $this->faker->company,
        ];
    }
}
