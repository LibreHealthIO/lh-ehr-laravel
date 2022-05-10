<?php

namespace Database\Seeders;

use App\Models\Patients\PatientContactLink;
use Illuminate\Database\Seeder;

class PatientContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed patient_contact_links table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        PatientContactLink::factory()
            ->count(100)
            ->create();
    }
}
