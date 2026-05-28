<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * This seeder creates a role-based test users for the MU security test suite.
 */
class SecurityTestSeeder extends Seeder
{
    public function run(): void
    {
        $this->truncateTables();

        $roles = $this->seedRoles();

        $permissions = $this->seedPermissions();

        $this->attachPermissionsToRoles($roles, $permissions);

        $this->seedUsers($roles);
    }

    
    private function truncateTables(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('permission_role')->delete();
        DB::table('permission_user')->delete();
        DB::table('role_user')->delete();

        DB::table('users')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        Schema::enableForeignKeyConstraints();
    }

    private function seedRoles() : \Illuminate\Support\Collection
    {
        $roles = [
            'super_admin',
            'admin',
            'clinician',
            'nurse',
            'user',
            'patient',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
        return Role::all()->keyBy('name');
    }

    private function seedPermissions() : \Illuminate\Support\Collection
    {
        $permissions = [
            'manage-patients',
            'view-patients',
            'view-own-records',

            'manage-encounters',
            'view-clinical-data',
            'manage-prescriptions',
            'view-prescriptions',

            'view-cds-alerts',

            'view-reports',
            'manage-reports',

            'manage-users',
            'manage-facilities',
            'manage-settings',

            'manage-appointments',
            'view-own-appointments',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        return Permission::all()->keyBy('name');
    }

    private function attachPermissionsToRoles($roles, $permissions) : void
    {
        $map = [
            'super_admin' => [
                'manage-patients',
                'view-patients',
                'manage-encounters',
                'view-clinical-data',
                'manage-prescriptions',
                'view-prescriptions',
                'view-cds-alerts',
                'view-reports',
                'manage-reports',
                'manage-users',
                'manage-facilities',
                'manage-settings',
                'manage-appointments',
            ],

            'admin' => [
                'manage-patients',
                'view-patients',
                'view-clinical-data',
                'view-prescriptions',
                'view-reports',
                'manage-reports',
                'manage-users',
                'manage-facilities',
                'manage-appointments',
            ],

            'clinician' => [
                'view-patients',
                'manage-encounters',
                'view-clinical-data',
                'manage-prescriptions',
                'view-prescriptions',
                'view-cds-alerts',
                'view-reports',
                'manage-appointments',
            ],

            'nurse' => [
                'view-patients',
                'view-clinical-data',
                'view-prescriptions',
                'view-cds-alerts',
                'manage-appointments',
            ],

            'user' => [
                'manage-patients',
                'view-patients',
                'manage-appointments',
            ],

            'patient' => [
                'view-own-records',
                'view-own-appointments',
            ],
        ];

        foreach ($map as $roleName => $permissionNames) {

            $permissionIds = collect($permissionNames)
                ->map(fn ($name) => $permissions[$name]->id)
                ->toArray();

            $roles[$roleName]->givePermissions($permissionIds);
        }

    }

    private function seedUsers($roles): void
    {
        $password = bcrypt('security_test_123');

        $users = [
            [
                'role' => 'super_admin',
                'data' => [
                    'username' => 'test_super_admin',
                    'email' => 'super_admin@test.com',
                    'password' => $password,
                    'first_name' => 'Super',
                    'last_name' => 'Admin',
                    'suffix' => 'Mr',
                    'federal_tax_id' => 'tax-super_admin',
                    'federal_drug_id' => 'drug-super_admin',
                    'taxonomy' => '207Q00000X',
                    'see_auth' => 1,
                    'calendar_ui' => 'Original',
                    'npi' => 1000000001,
                    'new_crop_user_role' => 'super_admin',
                    'access_control' => 'Administrators',
                    'country_id' => null,
                    'city_id' => null,
                ],
            ],

            [
                'role' => 'admin',
                'data' => [
                    'username' => 'test_admin',
                    'email' => 'admin@test.com',
                    'password' => $password,
                    'first_name' => 'Test',
                    'last_name' => 'Admin',
                    'suffix' => 'Mr',
                    'federal_tax_id' => 'tax-admin',
                    'federal_drug_id' => 'drug-admin',
                    'taxonomy' => '207Q00000X',
                    'see_auth' => 1,
                    'calendar_ui' => 'Original',
                    'npi' => 1000000002,
                    'new_crop_user_role' => 'admin',
                    'access_control' => 'Administrators',
                    'country_id' => null,
                    'city_id' => null,
                ],
            ],

            [
                'role' => 'clinician',
                'data' => [
                    'username' => 'test_clinician',
                    'email' => 'clinician@test.com',
                    'password' => $password,
                    'first_name' => 'Test',
                    'last_name' => 'Clinician',
                    'suffix' => 'Dr',
                    'federal_tax_id' => 'tax-clinician',
                    'federal_drug_id' => 'drug-clinician',
                    'taxonomy' => '207Q00000X',
                    'see_auth' => 1,
                    'calendar_ui' => 'Original',
                    'npi' => 1000000003,
                    'new_crop_user_role' => 'clinician',
                    'access_control' => 'Clinicians',
                    'country_id' => null,
                    'city_id' => null,
                ],
            ],

            [
                'role' => 'nurse',
                'data' => [
                    'username' => 'test_nurse',
                    'email' => 'nurse@test.com',
                    'password' => $password,
                    'first_name' => 'Test',
                    'last_name' => 'Nurse',
                    'suffix' => 'Ms',
                    'federal_tax_id' => 'tax-nurse',
                    'federal_drug_id' => 'drug-nurse',
                    'taxonomy' => '207Q00000X',
                    'see_auth' => 1,
                    'calendar_ui' => 'Original',
                    'npi' => 1000000004,
                    'new_crop_user_role' => 'nurse',
                    'access_control' => 'Nurses',
                    'country_id' => null,
                    'city_id' => null,
                ],
            ],

            [
                'role' => 'user',
                'data' => [
                    'username' => 'test_front_desk',
                    'email' => 'frontdesk@test.com',
                    'password' => $password,
                    'first_name' => 'Front',
                    'last_name' => 'Desk',
                    'suffix' => 'Mr',
                    'federal_tax_id' => 'tax-user',
                    'federal_drug_id' => 'drug-user',
                    'taxonomy' => '207Q00000X',
                    'see_auth' => 1,
                    'calendar_ui' => 'Original',
                    'npi' => 1000000005,
                    'new_crop_user_role' => 'user',
                    'access_control' => 'Front Desk',
                    'country_id' => null,
                    'city_id' => null,
                ],
            ],

            [
                'role' => 'patient',
                'data' => [
                    'username' => 'test_patient_user',
                    'email' => 'patient@test.com',
                    'password' => $password,
                    'first_name' => 'Test',
                    'last_name' => 'Patient',
                    'suffix' => 'Mr',
                    'federal_tax_id' => 'tax-patient',
                    'federal_drug_id' => 'drug-patient',
                    'taxonomy' => '207Q00000X',
                    'see_auth' => 1,
                    'calendar_ui' => 'Original',
                    'npi' => 1000000006,
                    'new_crop_user_role' => 'patient',
                    'access_control' => 'Patients',
                    'country_id' => null,
                    'city_id' => null,
                ],
            ],
        ];

        foreach ($users as $entry) {

            $user = User::create($entry['data']);

            $user->addRole($roles[$entry['role']]);
        }
    }

}
