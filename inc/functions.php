<?php

function timedRedirect($location)
{
	echo "<script type='text/javascript'>setTimeout(function(){window.location='".EDBM_ROOT.$location."';},1000);</script>";
	echo "<a href='".EDBM_ROOT.$location."'><p>si vous etes pas rediriger cliquer ici</p></a>";
}

function base_url(){
	return $_SERVER['DOCUMENT_ROOT'].EDBM_ROOT;
}

function redirectToLast(){
	echo "<script type='text/javascript'>history.back();</script>";
	echo "<a href='".EDBM_ROOT."/'><p>si vous etes pas rediriger cliquer ici</p></a>";
}

?>
