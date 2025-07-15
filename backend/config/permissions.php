<?php

return [

    'roles' => [
        'admin',
        'user',
        'moderator',
    ],

    'permissions' => [
        'users' => [
            'view users',
            'create users',
            'edit users',
            'delete users',
        ],
        'items' => [
            'view items',
            'create items',
            'edit items',
            'delete items',
            'rent items',
        ],
        'categories' => [
            'manage categories',
        ],
    ],

    // Назначение прав ролям (опционально)
    'role_permissions' => [
        'admin' => '*', // все
        'moderator' => [
            'users.view users',
            'items.view items',
            'items.edit items',
        ],
        'user' => [
            'items.rent items',
        ],
    ],
];
