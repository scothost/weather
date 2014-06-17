<?php

// table users
// id, login, password



class Database extends PDO //need to have this enabled in the php.ini file.
{

	public function __construct()
	{
		parent::__construct('mysql:host=localhost;dbname=wwwvighi_weather', 'wwwvighi_dev', '{9oUz?Dbr~5&');
		echo '------------YEEEY-----------';
	}

}