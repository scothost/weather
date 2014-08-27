<?php

require 'config.php';
require 'util/Auth.php';


//spl_autoload_register - might want to check out this as well

//in this scenario $class needs to be the same as the filenames and with capital letters
function __autoload($class){
    require LIBS . $class . '.php';
}

// Loads the bootstrap!
$bootstrap = new Bootstrap();

// These are the default values, uncomment and modify if needed
// $bootstrap->setControllerPath('controllers');
// $bootstrap->setModelPath('models');
// $bootstrap->setErrorFile('error.php');
// $bootstrap->setDefaultFile('index.php');

$bootstrap->init();

