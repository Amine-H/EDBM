<?php

/**
* class:Database
*/
class DB
{
	public static function start()
	{
		if(isset($_SESSION['user']))
		{
			$link = mysql_connect(EDBM_SERVER,$_SESSION['user'], $_SESSION['password']);
			@mysql_set_charset("utf8");
			return $link;
		}
		return NULL;
	}
	public static function end($link)
	{
		mysql_close($link);
	}
}

?>