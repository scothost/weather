<?php

class Login_Model extends Model{

	function __construct() 
	{
		parent::__construct();
		echo md5('ioto');
		
	}
	
	public function run()
	{
		$login 		= $_POST['login'];
		$password 	= $_POST['password'];
		
		//this->db->query("
		//	SELECT id FROM users 
		//	WHERE login = '$login' AND password = '$password'");
		
		$statement = $this->db->prepare("
			SELECT id FROM users 
			WHERE login = :login AND password = MD5(:password)");
		$statement->execute(array(
			':login' => $login,
			':password' => $password
			));
			
		$data = $sth->fetchAll();
		print_r($data);
	}
}