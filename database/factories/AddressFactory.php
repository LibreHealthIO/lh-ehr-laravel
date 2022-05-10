<?php

/*
|--------------------------------------------------------------------------
| Address Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed Address table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'line1' => $this->faker->streetName,
            'line2' => $this->faker->streetAddress,
            'city_id' => 4,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'plus_four' => Str::random(4),
            'country_id' => $this->faker->numberBetween(1, 248),
        ];
    }
}
