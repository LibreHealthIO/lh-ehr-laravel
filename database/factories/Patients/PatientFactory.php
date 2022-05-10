<?php

/*
|--------------------------------------------------------------------------
| Patient Data Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_data table.
| Further used in PatientDataTableSeeder.php.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories\Patients;

use App\Models\Address;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;


class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // Add if any new occupation is added in the UI
        $occupation = ['Engineer', 'Doctor', 'Lawyer', 'Site Worker', 'Student'];

        //Add if any new industry is added in UI.
        $industry = ['Law Firm', 'Engineering Firm', 'Construction Firm', 'College'];

        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'title' => $this->faker->title($gender),
            'occupation' => $occupation[array_rand($occupation, 1)],
            'industry' => $industry[array_rand($industry, 1)],
            'address_id' => Address::factory(),
        ];
    }
}

