<?php

namespace Database\Seeders;

use App\Models\Patients\Patient;
use App\Models\Patients\PatientFaceSheet;
use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This seeds patients table only.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        Patient::factory()
            ->count(200)
            ->create()
            ->each(function ($patient) {
                $faceSheet = PatientFaceSheet::factory()->make();
                $patient->faceSheet()->save($faceSheet);
            });
    }
}
