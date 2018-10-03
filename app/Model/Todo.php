<?php

namespace App\Model;


class Todo extends Model
{
	
	protected $firstName;
	protected $lastName;
	protected $email;
	protected $password;
    
	public function __construnct()
	{
	    $this->table = "user";
	}
	

	public function getById($id)
	{
		$this->db->prepare("select..." );
	}
}