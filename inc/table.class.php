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
		    	$query .="NOT NULL ";
			}
		    else{
		    	$query .="";
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
	public static function INSERT($db,$post) //INSERT INTO the table for $db database 
	{
		$query  ="INSERT INTO ".$post["Tname"]." ";
		$queryA="";
		$queryB="";
		//parameter 
		for($i=0;$i < sizeof($post["TIname"]);$i++){
			if(isset($post["TIname".$i])){
				$queryA .=$post["TIname".$i]." ";
				$queryB .=$post["TIcontent".$i]." ";
			}else{
				$queryA .=$post["TIname".$i]." ";
				$queryB .="NULL ";
			}
			$queryA .=" , ";
			$queryB .=" , ";
		}
		$query .="( ";
		$query .=$queryA." ";
		$query .=") ";
		$query .="VALUES ";
		$query .="( ";
		$query .=$queryB." ";
		$query .=") ";
		$query .=" ;";
		$result = mysql_real_escape_string($query);
		$result = mysqli_query($db,$result);
		return $result;
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
public static function champ($table,$link) //Update the table for $db database 
	{
		$query  ="select * from ".$table." ;";
		$query = mysql_real_escape_string($query);
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
}	
?>