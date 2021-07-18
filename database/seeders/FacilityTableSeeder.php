<?php

namespace Database\Seeders;

use App\Models\Facilities\Facility;
use Illuminate\Database\Seeder;

class FacilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seeds facilities table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        Facility::factory()
            ->count(25)
            ->create();
    }
}
