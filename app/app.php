<?php
namespace App;

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
$settings = require __DIR__ . '/settings.php';
$app = new \Slim\App($settings);

$container = $app->getContainer();
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/views/templates', [
        'cache' => false
        // 'cache' => $container->settings['views']['cache']
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));
    return $view;
};

// Set up dependencies
require __DIR__ . '/dependencies.php';

// Register middleware
require __DIR__ . '/middleware.php';

// Register routes
require __DIR__ . '/routes.php';

// Run app
$app->run();