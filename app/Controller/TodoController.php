<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use \PDO;
use \Exception;

class TodoController extends \App\Controller\Controller
{
    protected function getTodos()
    {
        $db = $this->container->db;
        $todos = [];
        
        try{
            $stmt = $db->prepare("SELECT id, user_id, text, due_date FROM todo WHERE user_id=:userId ORDER BY due_date DESC");
            $stmt->execute([':userId' => 1]);
            
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $todos = $stmt->fetchAll();
            
        } catch (Exception $e) {
            $this->container->logger->error($e->getMessage());
            exit('Error'); //something a user can understand
        }
        
        return $todos;
    }
    
    protected function addTodo($todoText)
    {
        $db = $this->container->db;
        $todos = [];
        
        try{
            
            $data = [
                'userId' => 1,
                'text' => $todoText
            ];
            $sql = "INSERT INTO todo (user_id, text, due_date) VALUES (:userId, :text, CURDATE() + INTERVAL 1 DAY)";
            $stmt= $db->prepare($sql);
            $stmt->execute($data);
            
        } catch (Exception $e) {
            $this->container->logger->error($e->getMessage());
            exit('Error'); //something a user can understand
        }
        
    }
    
    public function __invoke(Request $request, Response $response, array $args) 
    { 
        $args['todolist'] = $this->getTodos();
        return $this->container->view->render($response, 'todolist.html', $args); 
    }
    
    
    public function add(Request $request, Response $response, array $args)
    {
        
        
        $this->addTodo($request->getParsedBody()['todo_text']);
        
        return $response->withRedirect('/todolist');
        
    }
    
    
}