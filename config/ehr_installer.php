<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | This is the default minimum server requirements, needed by the EHR Software to work.
    | We check if the extension is enabled by looping through the array and run "extension_loaded" on it.
    |
    */

    'core' => [
        'minPhpVersion' => '7.2.5', // As per the laravel documentation
    ],

    'requirements' => [
        'php' => [
            'bz2',
            'date',
            'mbstring',
            'dom',
            'json',
            'curl',
            'exif',
            'gettext',
            'imagick',
            'grpc',
            'gd',
            'libxml',
            'intl',
            'mbstring',
            'mysqli',
            'mysqlnd',
            'openssl',
            'pdo',
            'openssl',
            'posix',
            'posix',
            'sqlite3',
            'soap',
            'xml',
            'xmlrpc',
            'xmlreader',
            'xmlwriter',
            'xsl',
            'zip',
            'zlib',
        ],
        'apache' => [
            'mod_rewrite',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel folders permissions. This will be used by the
    | software to write data. Add any other folders in here
    |
    */
    'permissions' => [
        'storage/framework/'     => '775',
        'storage/logs/'          => '775',
        'bootstrap/cache/'       => '775',
    ],

];
