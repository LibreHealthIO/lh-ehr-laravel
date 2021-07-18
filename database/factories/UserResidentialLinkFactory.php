<?php

/*
|--------------------------------------------------------------------------
| User Residential Link Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_residential_links table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use App\Models\UserResidentialLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserResidentialLinkFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserResidentialLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $addr_type = array(0, 1);

        return [
            'address_id' => Address::factory()->create()->id,
            'user_id' => $this->faker->randomElement($user_ids),
            'type' => $addr_type[array_rand($addr_type, 1)],
        ];
    }
}
