<?php


class Bootstrap {

	function __construct() {
		
		$url = $_GET['url'];
		$url = rtrim($url, '/'); //trims the slashes at the end of an url
		$url = explode( '/' ,  );
		
		//print_r($url);

		$file = 'controllers/' . $url[0] . '.php'; //the first argument will allways be the controller
		if (file_exists($file)){
			require $file;
		}else{
			require 'controllers/error.php';
			controller = new Error($file);
			return false;
		}
		
		require 
		$controller = new $url[0];

		if (isset ($url[1])) {
			$controller->{$url[1]}()  //equivalent to controller->function();
		}else{
			if (isset ($url[2])) {
				$controller->{$url[1]}(url[2])
			}
		}
	}






	
}