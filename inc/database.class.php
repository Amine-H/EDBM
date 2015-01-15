<?php
class database{
	public static function Create($db) //Create database 
	{
		$link = $db['link'];
		$name = $db['name'];
		$sql = "CREATE DATABASE ".$name." ;";
		$sql = "CREATE DATABASE ".$name;
		$query = mysql_real_escape_string($sql);
		$result = mysql_query($query,$link);
		return $result;
	}
	
	public static function drop($db) //Create database 
	{
		$query = "DROP DATABASE ".$db." ;";
		$result = mysql_real_escape_string($query);
		$result = mysqli_query($db,$query);
		return $result;
	}
}
?>