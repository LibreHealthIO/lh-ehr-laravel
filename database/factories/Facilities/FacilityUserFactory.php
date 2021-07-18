<?php

/*
|--------------------------------------------------------------------------
| User Facility Link Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_facility_links table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories\Facilities;

use App\Models\Facilities\Facility;
use App\Models\Facilities\FacilityUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityUserFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FacilityUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $facility_ids = Facility::all()->pluck('id')->toArray();
        $booleanValue = array(true, false);

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'facility_id' => $this->faker->randomElement($facility_ids),
            'is_default' => $booleanValue[array_rand($booleanValue, 1)],
        ];
    }
}
