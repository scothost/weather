<?php

require 'config.php';
require 'util/Auth.php';


//spl_autoload_register - might want to check out this as well

//in this scenario $class needs to be the same as the filenames and with capital letters
function __autoload($class){
    require LIBS . $class . '.php';
}

$app = new Bootstrap();

