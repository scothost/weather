<?php

require 'config.php';

//spl_autoload_register - might want to check out this as well

//in this scenario $class needs to be the same as the filenames and with capital letters
function __autoload($class){
    require LIBS . $class . '.php';
}

// require 'libs/Bootstrap.php';
// require 'libs/Controller.php';
// require 'libs/Model.php';
// require 'libs/View.php';

// require 'libs/Database.php';
// require 'libs/Session.php';
// require 'libs/Hash.php';



$app = new Bootstrap();

