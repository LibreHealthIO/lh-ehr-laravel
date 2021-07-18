<?php

namespace Database\Seeders;

use App\Models\UserSetting;
use Illuminate\Database\Seeder;

class UserSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seeds user_settings table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        UserSetting::factory()
            ->count(25)
            ->create();
    }
}
