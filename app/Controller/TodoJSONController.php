<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use \PDO;
use \Exception;

class TodoJSONController extends \App\Controller\TodoController
{   
    
    public function __invoke(Request $request, Response $response, array $args) 
    { 
        return $response->withJson($this->getTodos());
       
    }
    
}