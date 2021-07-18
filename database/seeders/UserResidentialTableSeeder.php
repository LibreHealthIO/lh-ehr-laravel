<?php

namespace Database\Seeders;

use App\Models\UserResidentialLink;
use Illuminate\Database\Seeder;

class UserResidentialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed user_residential_links table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        UserResidentialLink::factory()
            ->count(25)
            ->create();
    }
}
