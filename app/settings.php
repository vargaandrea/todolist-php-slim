<?php

namespace App;


return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
       
        
        // Database settings
        'database' => [
            'production' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'todo_prod',
                'user' => 'web',
                'pass' => 'web',
                'port' => '3306',
                'charset' => 'utf8',
             ],
            'development' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'todo_dev',
                'user' => 'web',
                'pass' => 'web',
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'test' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'todo_test',
                'user' => 'web',
                'pass' => 'web',
                'port' => '3306',
                'charset' => 'utf8',
            ],
        ],
    ],
];
