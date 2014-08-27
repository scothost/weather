<?php

class Bootstrap {

	private $_url = null;
	private $_controller;

	// Allways include trailing slash
	private $_controllerPath = 'controllers/';
	private $_modelPath = 'models/';

	private $_errorFile = 'error.php';
	private $_defaultFile = 'index.php';

	// Use init()
	function __construct() 
	{
	}

	public function init()
	{
		//sets the protected field $_url;
		$this->_getUrl();

		// Load the default controller if no url is set
		if ( empty($this->_url[0]) ) {
			$this->_loadDefaultController();
			// return false so that none of the other stuff will be executed
			return false;
		}

		// Load an existing controller if there is a GET parameter passed
		$this->_loadExistingController();

		// Calls the method from the loaded controller
		$this->_callControllerMethods();
	}

	
	public function setControllerPath($path)
	{
		// Trim the provided path of slashes but manually adds one at the end
		$this->_controllerPath = trim($path, '/') . '/';
	}

	public function setModelPath($path)
	{
		$this->_modelPath = trim($path, '/') . '/';
	}

	// Use the filename only of your controller, eg.: error.php
	public function setErrorFile($path)
	{
		$this->_errorFile = trim($path, '/') . '/';
	}

	public function setDefaultFile($path)
	{
		$this->_defaultFile = trim($path, '/') . '/';
	}

	private function _getUrl()
	{
		// checks if an url is set and assign it to $url or assign null
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		// trims the slashes at the end of an url 
		$url = rtrim($url, '/');
		// sanitize function
		$url = filter_var($url, FILTER_SANITIZE_URL);
		// explode url into an array
		$url = explode( '/' , $url );
		//this is not very efficient, it's just clearer:
		$this->_url = $url;
	}

	private function _loadDefaultController()
	{
		// takes care of the situations in which index.php is not specified in the url.
		require $this->_controllerPath . $this->_defaultFile;
		$this->_controller = new Index();
		$this->_controller->index();
	}

	private function _loadExistingController()
	{
		// the first argument will allways be the controller
		$file = $this->_controllerPath . $this->_url[0] . '.php';
		if (file_exists($file)){
			require $file;
			// automatic model loader
			$this->_controller = new $this->_url[0];
			$this->_controller->loadModel($this->_url[0], $this->_modelPath);
		}else{
			$this->_error();
			return false;
		}
	}


	/**
	 * localhost/controller/method/[param]/[param]/[param]
	 * url[0] = Controller
	 * url[1] = Method
	 * url[2] = Param
	 * 
	 * **/
	private function _callControllerMethods()
	{
		$length = count($this->_url);

		// Make sure that the method we are calling exists
		if ($length > 1) {
			// I just throw an error if the method does not exist
			if ( !method_exists( $this->_controller, $this->_url[1] ) ) {
				$this->_error();
			}
		}

		// Determine what to load
		switch ($length) {
			case 5:
				// Controller->Method( Param1, Param2, Param3 )
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;
			case 4:
				// Controller->Method( Param1, Param2 )
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;
			case 3:
				// Controller->Method( Param1 )
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;
			case 2:
				// Controller->Method( )
				$this->_controller->{$this->_url[1]}();
				break;
			
			default:
				// Uncomment this to debug
				// print_r($this->_controller);
				// print_r($this->_url);

				$this->_controller->index();

				// die('Please check your Bootstrap, something went haywire with the parameters');
				break;
		}
	}

	private function _error() {
		//require 'controllers/error.php';
		require $this->_controllerPath . $this->_errorFile;
		$this->_controller = new Error();
		$this->_controller->index();
		exit;
	}

}