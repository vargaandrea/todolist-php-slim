<?php
namespace App;

use \PDO;

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../app/settings.php';
$app = new \Slim\App($settings);

$container = $app->getContainer();
$container['view'] = function ($container) {

    $view = new \Slim\Views\Twig(__DIR__ . '/../app/View/template', [
        'cache' => false
        // 'cache' => $container->settings['views']['cache']
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));
    return $view;
};

$container['db'] = function($container) {
    $settings = $container['settings'];
    $db_config = $settings['database'][$settings['environment']];
    $dbh = new PDO("mysql:host=".$db_config['host'].";dbname=".$db_config['name'], $db_config['user'], $db_config['pass']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
};

// Set up dependencies
require __DIR__ . '/../app/dependencies.php';

// Register middleware
require __DIR__ . '/../app/middleware.php';

// Register routes
require __DIR__ . '/../app/routes.php';

// Run app
$app->run();