<?php
require_once(base_url().'/inc/table.class.php');


		//$query  ="INSERT INTO ".$params[0]." ";
		$queryA ="( ";
		$queryB ="";
		//parameter 

		$t=array();
		$t = Table::columnlist($db,$params[0],$link);
		$size = sizeof($t);
		for($j=0;$j<$size;$j++){
			$queryA .=$t[$j];
			if(($size+1) != $j)
				$queryA .=" , ";
		}
		$queryA .=" ) ";
		for($i=0;isset($_POST["line".$i."col0"]);$i++){
			$queryB .="( ";

			for($j=0;$j<$size;$j++){
				$queryB .=$_POST["line".$i."col".$j];
				if(($size+1) != $j)
					$queryA .=" , ";
			}
			$queryB .=" ) ";
			if(isset($_POST["line".($i+1)."col0"]))
				$queryB .=" ,";
		}
		
		$query .=$queryA;
		$query .=" VALUES ";
		$query .=$queryB." ";
		$query .=" ;";

echo $query ; 

//$result = Table::INSERT($db,$_POST,$params[0],$link);
if($result){
	echo "<h1>le tableau a ete Remplier </h1>";
	//timedRedirect('/tableAdd');
}else{
	echo "<h1>le tableau n'a pas ete Remplier </h1>\n".mysql_error(); 
	//timedRedirect("tableAdd");
}
?>