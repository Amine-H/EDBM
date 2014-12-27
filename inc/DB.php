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
	public static function listDBs($link)
	{
		$list=array();
		$query=mysql_query("SHOW DATABASES",$link);
		$n=mysql_num_rows($query);
		for($i=0;$i<$n;$i++)
		{
			$tmp=mysql_fetch_assoc($query);
			$list[$i]=$tmp['Database'];
		}
		return $list;
	}
}

?>