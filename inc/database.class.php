<?php
class database{
	public static function Create($db,$link) //Create database 
	{
		$query = "CREATE DATABASE ".$db." ;";
		$result = mysql_real_escape_string($query);
		$result = mysqli_query($db,$query);
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