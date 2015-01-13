<?php

/**
* class:Procedure class
* for:creating,updating and deleting procedures
*/
class Procedure
{
	private static function formatParams($input)
	{
		$result = "";$n=sizeof($input['dir']);
		for($i=0;$i<$n;$i++)
		{
			$result.=$input['dir'][$i]." ";
			$result.=$input['name'][$i]." ";
			$result.=$input['type'][$i];
			if(!empty(trim($input['length'][$i])))
				$result.="(".$input['length'][$i].")";
			$result.=",";
		}
		return substr($result,0,strlen($result)-1);
	}
	public static function create($input)
	{
		$link = $input['link'];
		$name = $input['name'];
		$params = $input['params'];
		$code = $input['code'];
		if($query = mysql_query("DROP PROCEDURE IF EXISTS $name;")){
			$query = mysql_query("CREATE PROCEDURE $name (".Procedure::formatParams($params).") BEGIN $code END;",$link);
		}
		return $query;
	}
	public static function getProcedure($input)
	{
		$link = $input['link'];
		$name = $input['name'];
		$query = mysql_query("show create procedure $name",$link);
		if(!$query)
			return NULL;

		if($row=mysql_fetch_array($query))
		{
			$formated=array();
			$result=$row[2];
			$formated['name']=$name;
			$params_str=substr($result,strpos($result,'('),strpos($result,'BEGIN')-strpos($result,'('));
			$params=explode(',',substr($params_str,strpos($params_str,'(')+1,strrpos($params_str,')')-1-strpos($params_str,'(')));
			$n=sizeof($params);
			for($i=0;$i<$n;$i++)
			{
				$formated['params'][$i]=explode(' ',trim($params[$i]));
				if(strpos($formated['params'][$i][2],'('))
				{
					$str = $formated['params'][$i][2];
					$formated['params'][$i][2]=substr($str,0,strpos($str,'('));
					$formated['params'][$i][3]=substr($str,strpos($str,'(')+1,strlen($str)-strpos($str,'(')-2);
				}
				else
				{
					$formated['params'][$i][3]='';
				}
			}
			$formated['code']=substr($result,strpos($result,'BEGIN')+5,strpos($result,'END')-(strpos($result,'BEGIN')+5));
			return $formated;
		}
		else
			return NULL;
	}
	public static function listProcedures($input)
	{
		$database=$input['database'];
		$link=$input['link'];
		$query = mysql_query("SELECT routine_name FROM information_schema.routines WHERE routine_schema = '$database' and ROUTINE_TYPE = 'PROCEDURE'",$link);
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
	public static function delete($input)
	{
		$link = $input['link'];
		$name = $input['name'];
		return mysql_query("DROP PROCEDURE IF EXISTS $name",$link);
	}
}

?>