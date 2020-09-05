<?php

use App\Models\Address;
use App\Models\Patients\Patient;
use App\Models\Patients\PatientFaceSheet;
use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This seeds patients table only.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function run()
    {
        // Create 200 records of customers
        factory(Patient::class, 200)->create()->each(function ($patient) {

            // Seed the relation with one face sheet
            $faceSheet = factory(PatientFaceSheet::class)->make();
            $patient->faceSheet()->save($faceSheet);
        });
    }
}
