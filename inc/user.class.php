<?php

/**
* this is a namspace for all user related functions.
*/
class User
{
	public static function isConnected()
	{//to check if a user is connected or not
		return isset($_SESSION['user']);
	}
	public static function login($loginArray)
	{//very basic function to set a session
		foreach ($loginArray as $key => $value)
		{
			$_SESSION[$key]=$value;
		}
	}
	public static function logout()
	{
		$lang=$_SESSION['lang'];
		session_destroy();
		unset($_SESSION);
		session_start();//i want only the lang to stay unchanged
		$_SESSION['lang']=$lang;
	}
}

?>