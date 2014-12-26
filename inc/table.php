<?php

/**
* this is a class to edit and creat table for database for all user connected.
*/
class Table{
	public static function Create($db) //we give database to secure the query
	{//to check if a user is connected or not
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

?>