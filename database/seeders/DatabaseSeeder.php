<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Khsing\World\World;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating LH EHR Tables 🗑️ ⏳');
        $this->truncateAndSeedData();
    }

    /**
     * Truncates all the tables in the database.
     *
     * @return void
     */
    public function truncateAndSeedData()
    {
        Schema::disableForeignKeyConstraints();
        $databaseName = env('DB_DATABASE', 'libre_ehr');
        $tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
        foreach ($tables as $table) {
            $name = $table->TABLE_NAME;
            if ($name == 'migrations') {
                continue;
            }
            if (strpos($name, 'world') === 0) {
                continue;
            }
            DB::table($name)->truncate();
        }
        Schema::enableForeignKeyConstraints();
        $this->seedData();
        $this->complete();
    }

    /**
     * Seeds database.
     *
     * @return void
     */
    public function seedData()
    {
        $this->command->info('Seeding LH EHR Tables 🌱');
        $continents = World::Continents();
        if(count($continents) < 1) {
            Artisan::call('world:init');
        }
        $this->call(CurrencySeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(FacilityTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(PatientContactCommunicationTableSeeder::class);
        $this->call(PatientContactTableSeeder::class);
        $this->call(PatientEmployerTableSeeder::class);
        $this->call(PatientPrivacyContactTableSeeder::class);
        $this->call(PatientSocialStatisticTableSeeder::class);
        $this->call(UserAddrBookTableSeeder::class);
        $this->call(UserCommunicationTableSeeder::class);
        $this->call(FacilityUserTableSeeder::class);
        $this->call(UserResidentialTableSeeder::class);
        $this->call(UserSettingTableSeeder::class);
        $this->call(X12PartnerTableSeeder::class);
    }

    /**
     * Returns when seed is complete
     *
     * @return void
     */
    public function complete()
    {
        $this->command->info('Seeding Completed! 🤩');
    }
}

