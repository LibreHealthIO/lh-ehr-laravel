<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creates seeder for users table.
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $this->command->info('Truncating User, Role and Permission tables');
            $this->truncateUserTables();


            $faker = \Faker\Factory::create();
            $faker_tax1 = $faker->unique()->bothify('#####-????');
            $faker_tax2 = $faker->unique()->bothify('#####-????');

            // Super Admin (super admin user)
            $user = User::create([
                'username' => 's_admin',
                'email' => 's_admin@librehealthehr.com',
                'password' => bcrypt('s_admin123'),
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'federal_tax_id' => $faker_tax1,
                'federal_drug_id' => $faker->uuid,
                'see_auth' => $faker->randomDigit,
                'npi' => $faker->unique()->numerify('##########'),
                'suffix' => $faker->suffix,
                'taxonomy' => Str::random(10),
                'calendar_ui' => 'Original',
                'info' => 'LibreHealth Super Admin',
                'new_crop_user_role' => 'NewCrop Admin',
                'access_control' => 'Administrators',
                'in_calendar' => 0,
            ]);
            $role = Role::where('name', '=', 'super_admin')->first();
            $permissions=$role->permissions;
            $user->attachRole($role);
            foreach ($permissions as $permission) {
                $user->attachPermission($permission);
            }
            $user->save();


            // Admin user (default user to login with)
            $user = User::create([
                'username' => 'admin',
                'email' => 'admin@librehealthehr.com',
                'password' => bcrypt('admin123'),
                'first_name' => 'LibreHealth',
                'last_name' => 'Admin',
                'federal_tax_id' => $faker_tax2,
                'federal_drug_id' => $faker->uuid,
                'see_auth' => $faker->randomDigit,
                'npi' => $faker->unique()->numerify('##########'),
                'suffix' => $faker->suffix,
                'taxonomy' => Str::random(10),
                'calendar_ui' => 'Original',
                'info' => 'LibreHealth Admin',
                'new_crop_user_role' => 'NewCrop Admin',
                'access_control' => 'Administrators',
                'in_calendar' => 1,
            ]);
            $role = Role::where('name', '=', 'admin')->first();
            $permissions=$role->permissions;
            $user->attachRole($role);
            foreach ($permissions as $permission) {
                $user->attachPermission($permission);
            }
            $user->save();

        }

        // Creating random user
        User::factory()
            ->count(25)
            ->create();
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return void
     */
    public function truncateUserTables()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
