<?php

namespace Database\Seeders;

use App\Models\UserAddrBook;
use Illuminate\Database\Seeder;

class UserAddrBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Use this to seed user_addr_books table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function run()
    {
        UserAddrBook::factory()
            ->count(25)
            ->create();
    }
}
