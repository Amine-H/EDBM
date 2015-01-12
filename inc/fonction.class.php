<?php

class Fonction
{
	private static function formatParams($input)
	{
		$result = "";$n=sizeof($input['name']);
		for($i=0;$i<$n;$i++)
		{
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
		$return_type = $input['return_type'];
		$return_size = $input['return_size'];
		$code = $input['code'];
		if($query = mysql_query("DROP FUNCTION IF EXISTS $name;")){
			$query = mysql_query("CREATE FUNCTION $name (".Fonction::formatParams($params).") RETURNS $return_type($return_size) MODIFIES SQL DATA BEGIN $code END;",$link);
		}
		return $query;
	}
	public static function getFonction($input)
	{
		$link = $input['link'];
		$name = $input['name'];
		$query = mysql_query("show create function $name",$link);
		if(!$query)
			return NULL;

		if($row=mysql_fetch_array($query))
		{
			$formated=array();
			$result=strtolower($row[2]);
			$formated['name']=$name;
			$params_str=substr($result,strpos($result,'('),strpos($result,'returns')-strpos($result,'('));
			preg_match_all('#\((([^()]+|(?R))*)\)#', $params_str, $params);$params_str=$params[0][0];
			$params_str=trim($params_str);$params_str=substr($params_str,1,strlen($params_str)-2);
			$params = explode(',',$params_str);
			$n=sizeof($params);
			for($i=0;$i<$n;$i++)
			{
				$formated['params'][$i]=explode(' ',strtoupper(trim($params[$i])));
				if(strpos($formated['params'][$i][1],'('))
				{
					$str = $formated['params'][$i][1];
					$formated['params'][$i][1]=substr($str,0,strpos($str,'('));
					$formated['params'][$i][2]=substr($str,strpos($str,'(')+1,strlen($str)-strpos($str,'(')-2);
				}
				else
				{
					$formated['params'][$i][2]='';
				}
			}
			preg_match('#returns\s\w+\(\d+\)#',$result,$tmp);$tmp=$tmp[0];
			$formated['return_type']=strtoupper(trim(substr($tmp,7,strpos($tmp,'(')-7)));
			$formated['return_size']=substr($tmp,strpos($tmp,'(')+1,strpos($tmp,')')-strpos($tmp,'(')-1);
			$formated['code']=substr($result,strpos($result,'begin')+5,strpos($result,'end')-strpos($result,'begin')-5);
			return $formated;
		}
		else
			return NULL;
	}
	public static function listFonctions($input)
	{
		$database=$input['database'];
		$link=$input['link'];
		$query = mysql_query("SELECT routine_name FROM information_schema.routines WHERE routine_schema = '$database' and ROUTINE_TYPE ='FUNCTION'",$link);
		if($query)
		{
			$fonctions=array();$n=mysql_num_rows($query);
			for($i=0;$i<$n;$i++)
			{
				$row=mysql_fetch_assoc($query);
				$fonctions[$i]=$row['routine_name'];
			}
			return $fonctions;
		}
		else
			return NULL;
	}
	public static function delete($input)
	{
		$link = $input['link'];
		$name = $input['name'];
		return mysql_query("DROP FUNCTION IF EXISTS $name",$link);
	}
}

?>