<?php
require_once(base_url().'/inc/table.class.php');

$nameit = $params[0];// i dont know but somehow i can't give it $params[0] for the moment
		$query  ="INSERT INTO ".$nameit." ";
		$queryA ="( ";
		$queryB ="";
		//parameter 

		$name=array();
		
		$name= Table::columnlist($db,$nameit,$link);
		$size = sizeof($name);
		for($j=0;$j<$size;$j++){
			$queryA .= $name[$j];
			if(($size) != ($j+1))
				$queryA .=" , ";
		}
		$queryA .=" ) ";
		for($i=0;isset($_POST["line".$i."col0"]);$i++){
			$queryB .="( ";

			for($j=0;$j<$size;$j++){
				$queryB .="'".$_POST["line".$i."col".$j]."' ";
				if(($size) != ($j+1))
					$queryB .=" , ";
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

$result = Table::INSERT($query);
if($result){
	echo "<h1>le tableau a ete Remplier </h1>";
	//timedRedirect('/tableAdd');
}else{
	echo "<h1>le tableau n'a pas ete Remplier </h1>\n".mysql_error(); 
	//timedRedirect("tableAdd");
}
?>