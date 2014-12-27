<?php

/**
* class:Procedure class
* for:creating,updating and deleting procedures
*/
class Procedure
{
	private static function formatParams($input)
	{
		return $input;
	}
	public static function create($input)
	{
		$link = $input['link'];
		$name = $input['name'];
		$params = $input['params'];
		$def = $input['def'];
		$query = mysql_query("DELIMITER //\n CREATE PROCEDURE '$name' (".Procedure::formatParams($params).")\nBEGIN\n$def\nEND//\nDELIMITER;",$link);
		return $query;
	}
	public static function getProcedure($input)
	{
		$link = $input['link'];
		$name = $input['name'];
		$query = mysql_query("show create procedure $name",$link);
		if($row=mysql_fetch_array($query))
		{
			$formated=array();
			$result=$row[2];

			$formated['name']=$name;
			$formated['params']=explode(' ',substr($result,strpos($result,'(')+1,strlen($result)-(strpos($result,'BEGIN')+8)));
			$formated['code']=substr($result,strpos($result,'BEGIN'),strpos($result,'END'));
			return $formated;
		}
		else
			return NULL;
	}
	public static function delete($input)
	{
		$link = $input['link'];
		$name = $input['name'];
	}
}

?>