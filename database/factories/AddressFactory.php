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
use Illuminate\Support\Facades\DB;
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
        
        $country = DB::table('world_countries')->inRandomOrder()->first();
        $countryId = $country ? $country->id : 156;
        
        $city = DB::table('world_cities')->where('country_id', $countryId)->inRandomOrder()->first();
        $cityId = $city ? $city->id : null;

        return [
            'line1'      => $this->faker->streetName,
            'line2'      => $this->faker->streetAddress,
            'city_id'    => $cityId,
            'state'      => $this->faker->state,
            'zip'        => $this->faker->postcode,
            'plus_four'  => Str::random(4),
            'country_id' => $countryId,
        ];
    }
}
