<?php
require_once(base_url().'/inc/table.class.php');
$result = Table::Create($db,$_POST);
if($result){
	echo "<h1>le tableau a ete cree </h1>";
	timedRedirect('/tableAdd');
}else{
	echo "<h1>le tableau n'a pas ete cree </h1>\n".mysql_error(); 
	timedRedirect("database");
}
?>