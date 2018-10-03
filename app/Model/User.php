<?php

namespace App\Model;


class User extends Model
{
	protected $firstName;
	protected $lastName;
	protected $email;
	protected $password;
    
	public function __construnct()
	{
	    $this->table = "user";
	}

	public function getId($id)
	{
		$this->db->prepare("select..." );
	}
}