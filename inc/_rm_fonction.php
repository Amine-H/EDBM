<?php
if(!isset($isIndex))die('');
else if(!isset($params[0]))die('');
else
{
require_once('/inc/DB.class.php');
require_once('/inc/fonction.class.php');
	if(Fonction::delete(array('name'=>$params[0],'link'=>$link)))
	{
		echo "<div class='alert alert-success'>Fonction $params[0] supprimé!</div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>erreur, Fonction $params[0] n'est pas supprimé!</div>";
	}
	timedRedirect("/database/".DB::getSelectedDB());
}
?>