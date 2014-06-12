<?php

	class Error extends Controller{

	function __construct() {
		parent::__construct;
		echo 'This is an error';
	}

	function __construct($arg) {
		parent::__construct();
		echo 'The file: <b>' . $arg . '</b> does not exist.';
	}

	function index() {
		$this->view->msg = "This page does not exists";
		$this->view->render('error/index');
	}

}