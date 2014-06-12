<?php


class Bootstrap {

	function __construct() {
		
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/'); //trims the slashes at the end of an url
		$url = explode( '/' ,  );
		
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
			require 'controllers/error.php';
			controller = new Error($file);
			return false; // so that none of the other stuff will be executed
		}
		
		 
		$controller = new $url[0];


		//calling methods
		if (isset ($url[2])) {
			if (method_exists($controller, {$url[1]}) {
					$controller->{$url[1]}($url[2]);
			}else{
				echo 'errr';
			}
		}else{
			if (isset ($url[1])) {
				$controller->{$url[1]}();
				return false;
			}else{
				$controller->index();
			}
		}

		



	}






	
}