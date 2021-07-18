<?php

/*
|--------------------------------------------------------------------------
| User Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for users table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/


namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $middle_name = ['kumar', 'singh', 'stewart'];
        $calendar_ui = ['outlook', 'Original', 'Fancy'];
        $newcrop_user_role = ['NewCrop Admin', 'NewCrop Nurse',
            'NewCrop Manager', 'NewCrop Dcotor', 'NewCrop Midlevel Prescriber',
            'NewCrop Supervising Doctor'];

        /*Update if new acl added.*/
        $access_control = ['Accounting', 'Administrators', 'Clinicians', 'Emergency Log', 'Front Office', 'Physicians'];
        $booleanVal = array(true, false);

        $faker_tax = $this->faker->unique()->bothify('?????-#####');
        $faker_npi = $this->faker->unique()->numerify('##########');

        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('$lh_ehr3#!'),
            'first_name' => $this->faker->firstName($gender),
            'middle_name' => $middle_name[array_rand($middle_name, 1)],
            'last_name' => $this->faker->lastName,
            'federal_tax_id' => $faker_tax,
            'federal_drug_id' => $this->faker->uuid,
            'see_auth' => $this->faker->randomDigit,
            'npi' => $faker_npi,
            'suffix' => $this->faker->suffix,
            'taxonomy' => Str::random(10),
            'calendar_ui' => $calendar_ui[array_rand($calendar_ui, 1)],
            'info' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'new_crop_user_role' => $newcrop_user_role[array_rand($newcrop_user_role, 1)],
            'access_control' => $access_control[array_rand($access_control, 1)],
            'in_calendar' => $booleanVal[array_rand($booleanVal, 1)],
        ];
    }
}
