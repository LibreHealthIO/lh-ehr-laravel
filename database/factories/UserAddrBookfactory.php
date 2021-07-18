<?php

/*
|--------------------------------------------------------------------------
| User Addr Book Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for user_addr_books table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/

namespace Database\Factories;


use App\Models\User;
use App\Models\UserAddrBook;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserAddrBookFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAddrBook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $address_book_type = ['Imaging Service', 'Immunization Service', 'Lab Service', 'Specialist',
            'Vendor', 'Distributor', 'Care Coordination', 'Other', 'EMR Direct', 'External Provider',
            'External Organization'];

        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'title' => $this->faker->title($gender),
            'email' => $this->faker->unique()->safeEmail,
            'url' => $this->faker->url,
            'assistant' => Str::random(),
            'organization' => $this->faker->company,
            'valedictory' => Str::random(10),
            'speciality' => Str::random(10), /*These likes nurse, physician, etc*/
            'notes' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'address_book_type' => $address_book_type[array_rand($address_book_type, 1)],
        ];
    }
}
