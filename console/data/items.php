<?php
return [
    'createUsers' => [
        'type' => 2,
        'description' => 'Create Users',
    ],
    'editThread' => [
        'type' => 2,
        'description' => 'Edit Thread',
    ],
    'editPost' => [
        'type' => 2,
        'description' => 'Edit Post',
    ],
    'editUserProfile' => [
        'type' => 2,
        'description' => 'Edit User Profile',
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'editOwnThread',
            'editOwnPost',
        ],
    ],
    'moderator' => [
        'type' => 1,
        'children' => [
            'user',
            'editPost',
            'editThread',
        ],
    ],
    'super_moderator' => [
        'type' => 1,
        'children' => [
            'moderator',
            'editUserProfile',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'super_moderator',
            'createUsers',
        ],
    ],
    'editOwnThread' => [
        'type' => 2,
        'description' => 'Update own thread',
        'ruleName' => 'isThreadStarter',
        'children' => [
            'editThread',
        ],
    ],
    'editOwnPost' => [
        'type' => 2,
        'description' => 'Edit own Post',
        'ruleName' => 'isPostStarter',
        'children' => [
            'editPost',
        ],
    ],
];
