<?php
class UserModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function doLogin($username, $password, $remember)
	{
		//encript password
		$password = substr(sha1($username).md5($password),0,40);
		
		//database login chack
		$query = $this->db->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1");
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		
		   $userData = array(
		   		'id' => $row->id,
				'username' => $row->username,
				'logedIn' => TRUE
		   );
		}
		else
		{
			$userData = array(
				'logedIn' => FALSE
			);
		}
		
		return $userData;		
	}
	
	function userData($id = 0)
	{
		$this->db->select('username, firstName, lastName,  image, forumResponse, fullName');
		$this->db->from('users');
		$query = $this->db->get();
		return $query->row();
	}
}