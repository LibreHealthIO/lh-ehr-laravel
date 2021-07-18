<?php

/*
|--------------------------------------------------------------------------
| User Communication Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_communications table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories;

use App\Models\User;
use App\Models\UserCommunication;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCommunicationFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserCommunication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $type = array(0, 1, 2, 3, 4);

        $faker= Faker::create();

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'contact_number' => $faker->phoneNumber,
            'type' => $type[array_rand($type, 1)],
        ];
    }
}
