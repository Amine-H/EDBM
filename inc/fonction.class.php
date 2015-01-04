<?php

class Fonction
{
	public static function create($input)
	{

	}
	public static function listFonctions($input)
	{
		$database=$input['database'];
		$link=$input['link'];
		$query = mysql_query("SELECT routine_name FROM information_schema.routines WHERE routine_schema = '$database' and ROUTINE_TYPE ='FUNCTION'",$link);
		if($query)
		{
			$procedures=array();$n=mysql_num_rows($query);
			for($i=0;$i<$n;$i++)
			{
				$row=mysql_fetch_assoc($query);
				$procedures[$i]=$row['routine_name'];
			}
			return $procedures;
		}
		else
			return NULL;
	}
}

?>