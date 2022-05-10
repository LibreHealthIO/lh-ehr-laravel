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
            $this->truncateLaratrustTables();

            // ===================
            // CREATING ROLES
            // ===================
            $superAdminRole = new Role();
            $superAdminRole->name = "super_admin";
            $superAdminRole->display_name = "Super Administrator";
            $superAdminRole->description  = 'User is the super admin of the system';
            $superAdminRole->save();

            $adminRole = new Role();
            $adminRole->name = "admin";
            $adminRole->display_name = "Administrator";
            $adminRole->description  = 'User is the admin. They own/manage, but fewer privileges than super admins.';
            $adminRole->save();


            $userRole = new Role();
            $userRole->name = "user";
            $userRole->display_name = "User";
            $userRole->description  = 'Regular/Default User of the system can be a front desk personnel';
            $userRole->save();

            // =======================
            // CREATING PERMISSIONS
            // =======================
            $manageUsers = new Permission();
            $manageUsers->name         = 'manage-users';
            $manageUsers->display_name = 'Manage Loans';
            $manageUsers->description  = 'Manage all users of the system';
            $manageUsers->save();

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
            $user->save();
            $user->attachRole($superAdminRole);
            $superAdminRole->attachPermissions([$manageUsers]);

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
            $user->save();
            $user->attachRole($adminRole);
            $adminRole->attachPermissions([$manageUsers]);

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
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();
        User::truncate();
        Role::truncate();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
