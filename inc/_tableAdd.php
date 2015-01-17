<pre>
<?php
require_once(base_url().'/inc/table.class.php');
$result = Table::Create($db,$_POST);
if($result){
	echo "le tableau a ete cree ";
	timedRedirect('/tableAdd');
}else{
	echo "le tableau n'a pas ete cree \n".mysql_error(); 
	//timedRedirect("tableAdd");
}

print_r($_POST);
echo count($_POST);
?>
</pre>