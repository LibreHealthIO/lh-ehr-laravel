<?php

namespace Database\Seeders;

use App\Models\Patients\PatientContact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed patient_contacts table.
     * This can be seeded standalone as contacts are generic.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        PatientContact::factory()
            ->count(25)
            ->create();
    }
}
