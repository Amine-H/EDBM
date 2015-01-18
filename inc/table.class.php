<?php

/**
* this is a class to edit and create table for database for all user connected.
*/
class Table{
	public static function Create($db,$post) //Create the table for $db database 
	{
		$query  ="CREATE TABLE ";
		$query .=$post["Tname"];
		$query .=" (";
		//to submit to all demand in creation of the table :D 
		for($i=0;isset($post["field".$i]);$i++){
			$query .=$post["field".$i]." ";
			$query .=$post["type".$i]."(".$post["taille".$i].") ";
			if($post["default".$i]!= "")
			$query .="DEFAULT "."'".$post["default".$i]."'"." ";
		    if(isset($post["null".$i])){
		    	$query .="";
			}
		    else{
		    	$query .="NOT NULL ";
		    }
			$query .=$post["extra".$i]." ";
			if(isset($post["auto_increment".$i])){
		    	$query .=$post["auto_increment".$i]." ";
			}
			if(isset($post["field".($i+1)]))
				$query .=" , ";
			//ici il faut prender on compte le dernier element 
			}
		$query .=" );";
		$re = mysql_real_escape_string($query);
		$result = mysql_query($re);
		return $result;
	}
//***********************************************************************
	public static function Update($db,$post) //Update the table for $db database 
	{
		$query  ="UPDATE ".$post["Tname"]." ";
		$query .="SET ";//not finish yet i need to think deeply for this one 
		$query .=$post["TUpadatSet"]." ";
		$query .="where ";
		$query .=$post["TUpadatCondition"]." ";
		$query .=";";
		$result = mysql_real_escape_string($query);
		$result = mysqli_query($db,$result);
		return $result;
	}
//***********************************************************************
	public static function INSERT($query) //INSERT INTO the table for $db database 
	{
		/*$query  ="INSERT INTO ".$name." ";
		$queryA ="( ";
		$queryB ="";
		//parameter 

		$t=array();
		$t = Table::columnlist($db,$name,$link);
		$size = sizeof($t);
		for($j=0;$j<$size;$j++){
			$queryA .=$t[$j];
			if(($size+1) != $j)
				$queryA .=" , ";
		}
		$queryA .=" ) ";
		for($i=0;isset($post["line".$i."col0"]);$i++){
			$queryB .="( ";

			for($j=0;$j<$size;$j++){
				$queryB .=$post["line".$i."col".$j];
				if(($size+1) != $j)
					$queryA .=" , ";
			}
			$queryB .=" ) ";
			if(isset($post["line".($i+1)."col0"]))
				$queryB .=" ,";
		}
		
		$query .=$queryA;
		$query .=" VALUES ";
		$query .=$queryB." ";
		$query .=" ;";*/
		$result = ($query);
		$re = mysql_query($result);
		return $re;
	}
//***********************************************************************
public static function tablelist() //Update the table for $db database 
	{
		$list=array();
		$query = mysql_query("SHOW TABLES;");//i gauss it well raise an error in this point -_-
		$n=mysql_num_rows($query);
		for($i=0;$i<$n;$i++)
		{
			$tmp=mysql_fetch_array($query);
			$list[$i]=$tmp[0];
		}
		return $list;
	}
//***********************************************************************
public static function columnlist($db,$name,$link) //Update the table for $db database 
	{
		$list=array();
		$fields = mysql_list_fields($db,$name,$link);//i gauss it well raise an error in this point -_-
		
		$columns = mysql_num_fields($fields);

		for ($i = 0; $i < $columns; $i++) {
		  $list[$i] = mysql_field_name($fields, $i);
		}	
		return $list;
	}
//***********************************************************************
public static function champ($table,$link) //Update the table for $db database 
	{
		$query  ="select * from ".$table." ;";
		$query = mysql_real_escape_string($query);//i am thinking of switching to mysqli it's more fluid
		$result = mysql_query($query,$link);
		$n=mysql_num_rows($result);
		$list=array();
		for($i=0;$i<$n;$i++)
		{
			$tmp=mysql_fetch_assoc($result);
			$list[$i]=$tmp;
		}
		return $list;
	}
/*****************************************************************************/
	public static function drop($name) //Update the table for $db database 
	{
		$query = mysql_query("DROP TABLE ".$name." ;");
		return $query;
	}
}	
?>