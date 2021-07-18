<?php

namespace Database\Seeders;

use App\Models\Patients\PatientEmployer;
use Illuminate\Database\Seeder;

class PatientEmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed patient_employers table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        PatientEmployer::factory()
            ->count(100)
            ->create();
    }
}
