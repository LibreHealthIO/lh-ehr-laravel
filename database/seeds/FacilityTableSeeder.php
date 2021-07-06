<?php

use App\Models\Facilities\Facility;
use Illuminate\Database\Seeder;

class FacilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seeds facilities table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function run()
    {
        factory(Facility::class, 25)->create();
    }
}
