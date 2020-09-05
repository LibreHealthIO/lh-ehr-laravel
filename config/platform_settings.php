<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Currency Settings
    |--------------------------------------------------------------------------
    |
    | This sets the default currency parameters to use for processing.
    | It is automatically converted to user defined currency.
    |
    */
    'default_currency' => env('DEFAULT_CURRENCY', 'USD'),

    /*
   |--------------------------------------------------------------------------
   | Users Settings
   |--------------------------------------------------------------------------
   |
   | You may state parameters such as the minimum number of days a user can stay banned, minimum
   | transaction amount, max number of transactions a day etc
   |
   |
   */
    'minimum_ban_days' => env('MIN_USER_BAN_DAYS', 30),
];
