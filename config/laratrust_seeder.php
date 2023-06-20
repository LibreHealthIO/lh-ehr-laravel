<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'calendar' => 'c,r,u,d',
            'flow-board' => 'c,r,u,d',
            'patient' => 'c,r,u,d',
            'fees' => 'c,r,u,d',
            'inventory' => 'c,r,u,d',
            'procedures' => 'c,r,u,d',
            'administration' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'misc' => 'c,r,u,d',
            'popups' => 'c,r,u,d',
            'qa-measures' => 'c,r,u,d',
            'help' => 'c,r,u,d',
        ],
        'administrators' => [
            'calendar' => 'c,r,u,d',
            'flow-board' => 'c,r,u,d',
            'patient' => 'c,r,u,d',
            'fees' => 'c,r,u,d',
            'inventory' => 'c,r,u,d',
            'procedures' => 'c,r,u,d',
            'administration' => 'c,r',
            'reports' => 'c,r,u,d',
            'misc' => 'c,r,u,d',
            'popups' => 'c,r,u,d',
            'qa-measures' => 'c,r,u,d',
            'help' => 'r',
        ],
        'users' => [
            'calendar' => 'r',
            'patient' => 'r',
            'fees' => 'r',
            'inventory' => 'r',
            'procedures' => 'r',
            'administration' => 'r',
            'reports' => 'r',
            'misc' => 'r',
            'popups' => 'r',
            'qa-measures' => 'r',
            'help' => 'r',
        ],
        'accounting' => [
            'Calendar' => 'r',
            'patient' => 'r',
            'fees' => 'c,r,u,d',
            'inventory' => 'r',
            'procedures' => 'r',
            'administration' => 'r,u',
            'reports' => 'c,r,u,d',
            'misc' => 'r,u',
            'popups' => 'r,u',
            'qa-measures' => 'r,u',
            'help' => 'r',
        ],
        'clinicians' => [
            'calendar' => 'c,r,u,d',
            'patient' => 'c,r,u,d',
            'fees' => 'c,r,u,d',
            'inventory' => 'r,u',
            'procedures' => 'r,u',
            'administration' => 'r,u',
            'reports' => 'r,u',
            'misc' => 'r,u',
            'popups' => 'r,u',
            'qa-measures' => 'r,u',
            'help' => 'r',
        ],
        'emergency_login' => [
            'calendar' => 'r',
            'patient' => 'c,r,u,d',
            'fees' => 'r',
            'inventory' => 'r',
            'procedures' => 'r',
            'administration' => 'r',
            'reports' => 'r',
            'misc' => 'r',
            'popups' => 'r',
            'qa-measures' => 'r',
            'help' => 'r',
        ],
        'front_office' => [
            'calendar' => 'r,u',
            'patient' => 'r,u',
            'fees' => 'r,u',
            'inventory' => 'r',
            'procedures' => 'r',
            'administration' => 'r',
            'reports' => 'r',
            'misc' => 'r',
            'popups' => 'r',
            'qa-measures' => 'r',
            'help' => 'r',
        ],
        'physicians' => [
            'calendar' => 'c,r,u,d',
            'patient' => 'c,r,u,d',
            'fees' => 'r,u',
            'inventory' => 'r',
            'procedures' => 'c,r,u,d',
            'administration' => 'c,r',
            'reports' => 'c,r,u,d',
            'misc' => 'c,r,u,d',
            'popups' => 'c,r,u,d',
            'qa-measures' => 'c,r,u,d',
            'help' => 'r',
        ],
        'super_student' => [
            'calendar' => 'r,u',
            'patient' => 'r,u',
            'fees' => 'r',
            'inventory' => 'r',
            'procedures' => 'r,u',
            'administration' => 'r,u',
            'reports' => 'r,u',
            'misc' => 'r,u',
            'popups' => 'r,u',
            'qa-measures' => 'r,u',
            'help' => 'r',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
    ];
