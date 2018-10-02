<?php

require_once './vendor/autoload.php';
$settings = require './app/settings.php';
$app = new \Slim\App($settings);
$container = $app->getContainer();
$db_config = $container['settings']['database'];

 return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',
        'production' => $db_config['production'],
        'development' => $db_config['development'],
        'testing' => $db_config['test']
    ],
    'version_order' => 'creation'
]; 