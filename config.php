<?php

return [
    'database' => [
        'connection' => 'mysql:host=127.0.0.1',
        'dbname' => 'pos_db',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];