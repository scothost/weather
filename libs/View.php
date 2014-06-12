<?php

class View {

	function __construct() {

		echo 'This is the view';
		
	}

	public function render($name, $noInclude = false)
	{
		if ($noInclude) { //if it's true it does not include the header and footer and if it's false as the default value it includes them
			require 'views/' . $name . '.php';
		}else{
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';
		}
		
	}
	
}