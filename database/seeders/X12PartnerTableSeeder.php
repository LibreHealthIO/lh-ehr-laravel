<?php

namespace Database\Seeders;

use App\Models\X12Partner;
use Illuminate\Database\Seeder;

class X12PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed x12_partners table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        X12Partner::factory()
            ->count(25)
            ->create();
    }
}
