<?php

/*
|--------------------------------------------------------------------------
| X12 Partner Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed X12 Partners table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories;

use App\Models\X12Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class X12PartnerFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = X12Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $version = array('005010X222A1', '004010X098A1');
        $processing_format = array('standard', 'medi-cal', 'cms', 'proxymed');
        $ISA15 = array('T', 'P');
        $boolean_value = array(true, false);
        $ISA07_05 = array('01', '14', '20', '27', '28', '29', '30', '33', 'ZZ');
        $id_number = '830682610';

        return [
            'name' => $this->faker->company." ".$this->faker->companySuffix,
            'id_number' => $id_number,
            'x12_sender_id' => Str::random(10),
            'x12_receiver_id' => Str::random(10),
            'x12_version' => $version[array_rand($version, 1)],
            'processing_format' => $processing_format[array_rand($processing_format, 1)],
            'x12_isa_01' => '00',
            'x12_isa_02' => NULL,
            'x12_isa_03' => '00',
            'x12_isa_04' => NULL,
            'x12_isa_05' => $ISA07_05[array_rand($ISA07_05, 1)],
            'x12_isa_07' => $ISA07_05[array_rand($ISA07_05, 1)],
            'x12_isa_14' => $boolean_value[array_rand($boolean_value, 1)],
            'x12_isa_15' => $ISA15[array_rand($ISA15, 1)],
            'x12_gs_02' => 'AV0'.Str::random(10),
            'x12_per_06' => 'P'.Str::random(10),
            'x12_gs_03' => Str::random(10),
        ];
    }
}
