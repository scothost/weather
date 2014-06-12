<?php

class Help extends Controller{

	function __construct() {
		echo 'we are in help </br>';
	}

	public function other( $arg = false ) {
		echo 'we are inside other</br>'
		echo 'Optional: ' . $arg;


		require 'models/help.php';
		$model = new Help_Model();
	}
}