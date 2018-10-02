<?php
namespace App;

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


$app->get('/test', function() {
    echo "test";
});

$app->get('/ping', function() {
    echo "ping";
});

    
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
    return $this->view->render($response, 'home.html', $args);
});

