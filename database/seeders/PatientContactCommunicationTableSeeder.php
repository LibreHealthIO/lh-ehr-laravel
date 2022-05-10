<?php

namespace Database\Seeders;

use App\Models\Patients\PatientContactCommunication;
use Illuminate\Database\Seeder;

class PatientContactCommunicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed patient_contact_communications table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        PatientContactCommunication::factory()
            ->count(100)
            ->create();
    }
}
