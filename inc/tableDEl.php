<?php
require_once(base_url().'/inc/table.class.php');

$result = Table::drop($params[0]);
if($result){
	echo "<h1>le tableau a ete Supprime </h1>";
	timedRedirect("/");
}else{
	echo "le tableau n'a pas ete Supprime \n".mysql_error(); 
	timedRedirect("/");
}

?>