<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | CI/CD Environment Variables
    |--------------------------------------------------------------------------
    |
    | These values are provided by the CI/CD runner. They are centralized here
    | so the application can read them via config() instead of env() after the
    | configuration has been cached.
    |
    */

    'commit_short_sha' => env('CI_COMMIT_SHORT_SHA', ''),
    'commit_ref_name'  => env('CI_COMMIT_REF_NAME', ''),
    'pipeline_id'      => env('CI_PIPELINE_ID', 'local'),
    'pipeline_url'     => env('CI_PIPELINE_URL', ''),
];
