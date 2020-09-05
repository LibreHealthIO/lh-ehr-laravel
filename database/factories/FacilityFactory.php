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

use App\Models\Address;
use App\Models\Facility;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/** @var Factory $factory */
$factory->define(
    Facility::class,
    function ($faker) {

    $booleanValue = array(true, false);
    $taxIdType = array('EI', 'SS');

    /*Different language formatters*/
    $faker = Faker::create('fr_BE');
    $faker_phone = Faker::create('pt_BR');
    $faker_fax = Faker::create('en_HK');

    return [
        'address_id' => factory(Address::class)->create()->id,
        'name' => Str::random(10),
        'federal_ein' => $faker->vat,
        'phone' => $faker_phone->cellphone,
        'fax' => $faker_fax->faxNumber,
        'website' => $faker->url,
        'email' => $faker->unique()->safeEmail,
        'service_location' => $booleanValue[array_rand($booleanValue, 1)],
        'billing_location' => $booleanValue[array_rand($booleanValue, 1)],
        'accept_assignment' => $booleanValue[array_rand($booleanValue, 1)],
        'pos_code' => $faker->randomNumber($nbDigits = 3, $strict = false),
        'attn' => Str::random(10),
        'domain_identifier' => Str::random(10),
        'facility_npi' => $faker->uuid,
        'tax_id_type' => $taxIdType[array_rand($taxIdType, 1)],
        'color' => $faker->hexcolor,
        'primary_business_entity' => $booleanValue[array_rand($booleanValue, 1)],
    ];
});
