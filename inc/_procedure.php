<?php
if(!isset($isIndex))die('');
else
{
	require_once(base_url().'/inc/procedure.class.php');
	$name = $_POST['name'];
	$params = array('dir'=>$_POST['param_dir'],
					'name'=>$_POST['param_name'],
					'type'=>$_POST['param_type'],
					'length'=>$_POST['param_length']);
	$code = $_POST['code'];
	if(Procedure::create(array('link'=>$link,'name'=>$name,'params'=>$params,'code'=>$code)))
	{
		echo "<div class='alert alert-success'>Procedure $name crée!</div>";
		timedRedirect('/database');
	}
	else
	{
		echo "<div class='alert alert-danger'>erreur a la creation de la procedure $name.<br>";
		echo mysql_error()."</div>";
	}
}
?>
