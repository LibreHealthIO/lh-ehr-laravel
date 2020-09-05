<?php

use App\Models\UserSetting;
use Illuminate\Database\Seeder;

class UserSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seeds user_settings table.
     * @return void
     */
    public function run()
    {
       factory(UserSetting::class, 25)->create();
    }
}
