<?php
namespace App;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Model\Todo;
use \PDO;
use \Exception;


// Routes

$app->get('/ping', function() {
    echo "ping";
});

$app->get('/home', function(Request $request, Response $response, array $args) {
    return $this->view->render($response, 'home.html.twig', $args);
});

$app->get('/todolist', \App\Controller\TodoController::class);

$app->post('/todo/add', '\App\Controller\TodoController:add');

// API group
$app->group('/api', function () use ($app) {
    $app->get('/todos', \App\Controller\TodoJSONController::class);
});




$app->get('/', function(Request $request, Response $response, array $args) {
    return $response->withRedirect('/home');
});



