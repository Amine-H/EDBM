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
			$link = @mysql_connect(EDBM_SERVER,$_SESSION['user'], $_SESSION['password']);
			$charset = DB::getCharset($link);
			@mysql_set_charset($charset);
			return $link;
		}
		return NULL;
	}
	public static function getCharset($link)
	{
		$db_name = DB::getSelectedDB();
		$query = mysql_query("SELECT default_character_set_name FROM information_schema.SCHEMATA WHERE schema_name = '".$db_name."';",$link);
		$row=mysql_fetch_array($query);
		return $row[0];
	}
	public static function end($link)
	{
		mysql_close($link);
	}
	public static function selectDB($input)
	{
		return $_SESSION['database']=$input;;
	}
	public static function getSelectedDB()
	{
		return (isset($_SESSION['database']))?$_SESSION['database']:'';
	}
	public static function exists($input)
	{
		return in_array($input['name'],DB::listDBs($input['link']));
	}
	public static function listDBs($link)
	{
		$list=array();
		$query=mysql_query("SHOW DATABASES",$link);//i gauss it well raise an error in this point -_-
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
