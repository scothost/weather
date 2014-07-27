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
		
		$sth = $this->db->prepare("
			SELECT id,role FROM user
			WHERE username = :username AND password = :password");
		$sth->execute(array(
			':username' => $_POST['username'],
			':password' => Hash::create('md5', $_POST['password'], MY_HASH_PASSWORD_KEY)
			
			));
		
		$data = $sth->fetch();
		//$data = $sth->fetchAll();
        //print_r($data);
        //print_r($data['role']);
        //die();
		
		
		
		
		
		$count = $sth->rowCount();
		if ($count > 0) {
			//login
			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			header('location: ../dashboard');
		}else{
			//show error
			header('location: ../login');
		}
		
	}
}