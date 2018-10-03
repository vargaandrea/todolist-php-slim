<?php 

namespace App\Controller;

class Controller
{
    protected $container;
    
    function __construct($container)
    {
        $this->container = $container;
    }
}