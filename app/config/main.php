<?php

return $main = [

    'db' => [
        'dsn' => 'mysql://root:123@localhost/trabalhotcc',
    ],
    'app' => [
        'model'    => '/app/models/',
        'controller'=> '/app/controllers/',
        'view'     => [
            '/app/web/',
            ['trabalhotcc','painel'],
        ],
        'timezone'  => 'America/Sao_Paulo',
        'diralias'=>'',
    ],
    'urlManager' => [
        'class'
    ],
];