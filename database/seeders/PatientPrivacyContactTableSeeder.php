<?php

namespace Database\Seeders;

use App\Models\Patients\PatientPrivacyContact;
use Illuminate\Database\Seeder;

class PatientPrivacyContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed patient_privacy_contacts table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        PatientPrivacyContact::factory()
            ->count(100)
            ->create();
    }
}
