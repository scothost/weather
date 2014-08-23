<?php

class Val
{
	public function __construct()
	{

	}

	public function minlength($data, $arg)
	{
		if (strlen($data) < $arg)
			return "Your string must be at least $arg characters long";
	}

	public function maxlength($data, $arg)
	{
		if (strlen($data) > $arg)
			return "Your string must be maximum $arg characters long";
	}

	public function digit($data)
	{
		//this parses the string and returns true if there are only digits
		if (!ctype_digit($data))
			return "Your string must be made out only of digits";
	}

	public function __call($name, $arguments)
	{
		throw new Exception("$name does not existi inside of: " . __CLASS__);
	}
}