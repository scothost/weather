<?php

class Login_Model extends Model{

	function __construct() 
	{
		parent::__construct();
	}
	
	public function run()
	{
		$sth = $this->db->prepare("
			SELECT userid,role FROM user
			WHERE username = :username AND password = :password");
		$sth->execute(array(
			':username' => $_POST['username'],
			':password' => Hash::create('md5', $_POST['password'], MY_HASH_PASSWORD_KEY)
			
			));
		$data = $sth->fetch();
		$count = $sth->rowCount();
		if ($count > 0) {
			//login
			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			Session::set('userid', $data['userid']);
			header('location: ../dashboard');
		}else{
			//show error
			header('location: ../login');
		}
		
	}
}