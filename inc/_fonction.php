<?php
if(!isset($isIndex))die('');
else
{
	require_once('/inc/fonction.class.php');
	$name = $_POST['name'];
	$params = array('dir'=>$_POST['param_dir'],
					'name'=>$_POST['param_name'],
					'type'=>$_POST['param_type'],
					'length'=>$_POST['param_length']);
	$return_type = $_POST['return_type'];
	$return_size = $_POST['return_size'];
	$code = $_POST['code'];
	if(Fonction::create(array('link'=>$link,'name'=>$name,'params'=>$params,
		'return_type'=>$return_type,'return_size'=>$return_size,'code'=>$code)))
	{
		echo "<div class='alert alert-success'>Fonction $name crée!</div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>erreur a la creation de la fonction $name.<br>";
		echo mysql_error()."</div>";
	}
}
?>