<?php

namespace Database\Seeders;

use App\Models\Facilities\FacilityUser;
use Illuminate\Database\Seeder;

class FacilityUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This seeds facility_users table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        FacilityUser::factory()
            ->count(25)
            ->create();
    }
}
