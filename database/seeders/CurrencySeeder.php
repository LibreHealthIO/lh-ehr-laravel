<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Adding Currencies');
        Currency::create([
            'name' => 'US Dollar',
            'code' => 'USD',
            'symbol' => '$',
            'format' => '$1,0.00',
            'exchange_rate' => 0.0018,
            'active' => 1,
        ]);
        Currency::create([
            'name' => 'Euro',
            'code' => 'EUR',
            'symbol' => '€',
            'format' => '1.0,00 €',
            'exchange_rate' => 0.8,
            'active' => 1,
        ]);
        Currency::create([
            'name' => 'Pound Sterling',
            'code' => 'GBP',
            'symbol' => '£',
            'format' => '£1,0.00',
            'exchange_rate' => 0.72,
            'active' => 1,
        ]);
        Currency::create([
            'name' => 'China Yuan Renminbi',
            'code' => 'CNY',
            'symbol' => '¥',
            'format' => '¥1,0.00',
            'exchange_rate' => 6.51,
            'active' => 1,
        ]);
    }
}
