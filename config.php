<?php

//The sitewide hashkey, do not change this because it's used for stored passwords!
//This is for general use
define('MY_HASH_GENERAL_KEY','qqOS@__^^G,RP-.s;kWE$j*C8<F%5O|S');

//This is for database passwords only
define('MY_HASH_PASSWORD_KEY','$d]T8Dxp<|kG0!l+cg3 ooxCXX:;0w60');

//Database
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'wwwvighi_weather');
	define('DB_USER', 'wwwvighi_dev');
	define('DB_PASS', '{9oUz?Dbr~5&');
	
	
// 	PATHS

//Allways provide a trailing slash </> after a path
define('URL', 'http://weather.vighiosif.ro/');
//define('URL', 'http://localhost/weather/');
define('LIBS', 'libs/');