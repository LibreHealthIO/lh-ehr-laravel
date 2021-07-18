<?php

/*
|--------------------------------------------------------------------------
| Facility Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed facilities table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories\Facilities;

use App\Models\Address;
use App\Models\Facilities\Facility;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FacilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Facility::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $booleanValue = array(true, false);
        $taxIdType = array('EI', 'SS');

        /* Different language formatters */
        $faker = Faker::create('it_IT');
        $faker_phone = Faker::create('pt_BR');
        $faker_fax = Faker::create('en_HK');

        return [
            'address_id' => Address::factory(),
            'name' => Str::random(10),
            'federal_ein' => $faker->vatId(),
            'phone' => $faker_phone->cellphone,
            'fax' => $faker_fax->faxNumber,
            'website' => $this->faker->url,
            'email' => $this->faker->unique()->safeEmail,
            'service_location' => $booleanValue[array_rand($booleanValue, 1)],
            'billing_location' => $booleanValue[array_rand($booleanValue, 1)],
            'accept_assignment' => $booleanValue[array_rand($booleanValue, 1)],
            'pos_code' => $this->faker->randomNumber($nbDigits = 3, $strict = false),
            'attn' => Str::random(10),
            'domain_identifier' => Str::random(10),
            'facility_npi' => $this->faker->uuid,
            'tax_id_type' => $taxIdType[array_rand($taxIdType, 1)],
            'color' => $this->faker->hexcolor,
            'primary_business_entity' => $booleanValue[array_rand($booleanValue, 1)],
        ];
    }
}
