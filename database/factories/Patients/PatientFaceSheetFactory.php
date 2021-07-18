<?php

/*
|--------------------------------------------------------------------------
| Patient Data Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_face_sheets table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories\Patients;

use App\Models\Patients\PatientFaceSheet;
use Illuminate\Database\Eloquent\Factories\Factory;


class PatientFaceSheetFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientFaceSheet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $sex = ['male', 'female'];
        $marital_status = ['married', 'single', 'divorced', 'widowed', 'separated', 'd_partner'];
        $middle_name = ['kumar', 'singh', 'stewart'];
        $gender = $this->faker->randomElement($sex);

        return [
            'first_name' => $this->faker->firstName($gender),
            'middle_name' => $middle_name[array_rand($middle_name, 1)],
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'marital_status' => $marital_status[array_rand($marital_status, 1)],
            'license_id' => $this->faker->uuid,
            'email' => $this->faker->unique()->safeEmail,
            'sex' => $sex[array_rand($sex, 1)],
            'billing_note' => $this->faker->text($maxNbChars = 200),
        ];
    }
}
