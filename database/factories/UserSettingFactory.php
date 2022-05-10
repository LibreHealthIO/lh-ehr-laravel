<?php

/*
|--------------------------------------------------------------------------
| User Setting Factory
|--------------------------------------------------------------------------
|
| Use this factory to seed user_settings table and test database.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
|
*/

namespace Database\Factories;

use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserSettingFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user_ids = User::all()->pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'setting_label' => Str::random(10),
            'setting_value' => $this->faker->randomNumber($nbDigits = 2, $strict = false),
        ];
    }
}
