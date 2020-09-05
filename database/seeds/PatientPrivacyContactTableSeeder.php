<?php

use App\Models\Patients\PatientPrivacyContact;
use Illuminate\Database\Seeder;

class PatientPrivacyContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed patient_privacy_contacts table.
     * @author Piyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function run()
    {
        factory(PatientPrivacyContact::class, 100)->create();
    }
}
