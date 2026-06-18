<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ZapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatabaseSeeder::class);

        $adminRole = Role::where('name', 'admin')->first();

        $user = User::updateOrCreate(
            ['username' => 'zap-user'],
            [
                'email' => 'zap@zap.com',
                'password' => bcrypt('zap_password123'),
                'first_name' => 'Zap',
                'last_name' => 'Test',
                'federal_tax_id' => '12345-TEST',
                'federal_drug_id' => (string) Str::uuid(),
                'see_auth' => 1,
                'npi' => '1234567890',
                'suffix' => 'Mr.',
                'taxonomy' => Str::random(10),
                'calendar_ui' => 'Original',
                'info' => 'OWASP ZAP Dynamic Layer Analysis Test User',
                'new_crop_user_role' => 'NewCrop Admin',
                'access_control' => 'Administrators',
                'in_calendar' => 1,
            ]
        );

        if ($adminRole && !$user->hasRole('admin')) {
            $user->addRole($adminRole);
        }
    }
}
