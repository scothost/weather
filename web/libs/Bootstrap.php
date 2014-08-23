<?php

class Bootstrap {

	function __construct() {
		
		// checks if an url is set and assign it to $url or assign null
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		// trims the slashes at the end of an url 
		$url = rtrim($url, '/');
		// sanitize function
		$url = filter_var($url, FILTER_SANITIZE_URL);
		// explode url into an array
		$url = explode( '/' , $url );
		
		// print_r($url);

		if ( empty($url[0]) ) {
			// takes care of the situations in which index.php is not specified in the url.
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			// return false so that none of the other stuff will be executed
			return false;
		}

		// the first argument will allways be the controller
		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)){
			require $file;
		}else{
			$this->error();
		}
		
		$controller = new $url[0];
		$controller->loadModel($url[0]);
		
		// calling methods in an extremly unefficient way.
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