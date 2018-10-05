<?php

namespace App\Model;


/**
 * @author andi
 *
 */
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
	

	/**
	 * @param unknown $id
	 */
	public function getById($id)
	{
		$this->db->prepare("select..." );
	}
}