<?php

class Login_Model extends Model{

	function __construct() 
	{
		parent::__construct();
	}
	
	public function run()
	{	
		//this->db->query("
		//	SELECT id FROM users 
		//	WHERE login = '$login' AND password = '$password'");
		
		$statement = $this->db->prepare("
			SELECT id FROM users 
			WHERE username = :username AND password = MD5(:password)");
		$statement->execute(array(
			':username' => $_POST['username'],
			':password' => $_POST['password']
			));
		
		
		//$data = $statement->fetchAll();
		//print_r($data);
		
		$count = $statement->rowCount();
		if ($count > 0) {
			//login
			Session::init();
			Session::set('loggedIn', true);
			header('location: ../dashboard');
		}else{
			//show error
			header('location: ../login');
		}
		
	}
}