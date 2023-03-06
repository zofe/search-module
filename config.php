<?php

/*
|--------------------------------------------------------------------------
| Search Module Configurations
|--------------------------------------------------------------------------
|
|
*/
return [

    'models' => [
        [
            'class' => \App\Models\User::class,
            'scope' => 'ssearch',
            'route' => 'auth.users.view',
            'limit' => 5,
            'view'  => 'search::item',
        ],
    ]
];
