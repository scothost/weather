<?php

class Bootstrap {

	function __construct() {
		
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/'); //trims the slashes at the end of an url
		$url = explode( '/' , $url );
		
		//print_r($url);

		if ( empty($url[0]) ){// takes care of the situations in which index.php is not specified in the url
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false; // so that none of the other stuff will be executed
		}

		$file = 'controllers/' . $url[0] . '.php'; //the first argument will allways be the controller
		if (file_exists($file)){
			require $file;
		}else{
			$this->error();
		}
		
		$controller = new $url[0];
		$controller->loadModel($url[0]);
		
		//calling methods
		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
	}
	
	
	
	function error() {
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index();
		return false;
	}

}