<?php

use App\Models\UserCommunication;
use Illuminate\Database\Seeder;

class UserCommunicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed user_communications table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function run()
    {
        factory(UserCommunication::class, 25)->create();
    }
}
