<?php

class Login extends Controller{

	function __construct() {
		parent::__construct();
	}

	function index() 
	{
	    //echo Hash::create('md5','chronoss', MY_HASH_PASSWORD_KEY);
	    $this->view->title = 'Login';
		$this->view->render('login/index');
	}
	
	function run() 
	{
		$this->model->run();
	}
}