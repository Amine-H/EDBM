<?php
if(!isset($isIndex))die('');
else if(!isset($params[0]))die('');
else
{
require_once(base_url().'/inc/DB.class.php');
require_once(base_url().'/inc/procedure.class.php');
	if(Procedure::delete(array('name'=>$params[0],'link'=>$link)))
	{
		echo "<div class='alert alert-success'>Procedure $params[0] supprimé!</div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>erreur, Procedure $params[0] n'est pas supprimé!</div>";
	}
	timedRedirect("/database/".DB::getSelectedDB());
}
?>
