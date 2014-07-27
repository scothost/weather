<?php

// table users
// id, login, password



class Database extends PDO //need to have this enabled in the php.ini file.
{

	public function __construct()
	{
		parent::__construct( DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	}

}