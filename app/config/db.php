<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=translatorn',
    'username' => 'root',
    'password' => '4319',
    'charset' => 'utf8',
    'tablePrefix' => '',
    'enableSchemaCache' => true,
    'schemaMap' => [
        'mysql' => [
            'class' => 'yii\db\mysql\Schema',
              'defaultSchema' => 'translatorn',
        ],
    ]
];
