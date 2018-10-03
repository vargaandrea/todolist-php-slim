<?php

namespace App\Model;

class Model
{
    protected $db;
    
    protected $table = 'model';
    protected $id;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
}