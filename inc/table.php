<?php

/**
* this is a class to edit and creat table for database for all user connected.
*/
class Table{
	public static function Create($db) //Create the table for $db database 
	{
		$query  ="CREATE TABLE ";
		$query .=$_POST["Tname"];
		$query .=" ("
		//to submit to all demand in creation of the table :D 
		for($i=0;$i < sizeof($_POST["TC"]);$i++){//for now i don' now how to regroup this 
			for($j=0;$j < sizeof($_POST["TC".$i]);$j++){
				$query .=$_POST["Cname".$i]." ";
				$query .=$_POST["Ctype".$i]."(".$_POST["CtypeLength".$i].") ";
				$query .=$_POST["CtypeOption".$i]." ";
				$query .=$_POST["Cnull".$i]." ";
				$query .=$_POST["Cdefault".$i]." ";
				$query .=$_POST["CINC".$i]." ";
				$query .=$_POST["CPRIMARYKEY".$i]." ";
			}
			if($i+1 < sizeof($_POST["TC"]) )
			$query .=" , ";
		}
		$query .=" );"
		$result = mysql_real_escape_string($query);
		$result = mysqli_query($db,$query);
		return $result;
	}
//***********************************************************************
	public static function Update($db) //Update the table for $db database 
	{
		$query  ="UPDATE "._POST["Tname"]." ";
		$query .="SET "//not finish yet i need to think deeply fot this one 
		$query .=" ;"
		$result = mysql_real_escape_string($query);
		$result = mysqli_query($db,$query);
		return $result;
	}
//***********************************************************************
	public static function INSERT($db) //INSERT INTO the table for $db database 
	{
		$query  ="INSERT INTO "._POST["Tname"]." ";
		$queryA="";
		$queryB=""
		//parameter 
		for($i=0;$i < sizeof($_POST["TIname"]);$i++){
			if(isset($_POST["TIname".$i])){
				$queryA .=$_POST["TIname".$i]." ";
				$queryB .=$_POST["TIcontent".$i]." ";
			}else{
				$queryA .=$_POST["TIname".$i]." ";
				$queryB .="NULL ";
			}
			$queryA .=" , ";
			$queryB .=" , ";
		}
		$query .="( "
		$query .=$queryA." ";
		$query .=") "
		$query .="VALUES "
		$query .="( "
		$query .=$queryB." ";
		$query .=") "
		$query .=" ;"
		$result = mysql_real_escape_string($query);
		$result = mysqli_query($db,$query);
		return $result;
	}
?>