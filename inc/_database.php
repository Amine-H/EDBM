<?php
require_once('/inc/database.class.php');

if(isset($_POST["name"])){
if(database::Create($_POST["name"])){
	?>
	yop you just create database 
	<?php
}else{
?>
	problem est servenu 
	<?php
}
}
?>