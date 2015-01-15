<?php
	require_once(base_url().'/inc/database.class.php');
	
	$resulte = database::Create(array('link'=>$link,'name'=>$_POST['name']));
	
	if ($resulte) {
		echo "Database ".$_POST['name']."created successfully\n";
	} else {
		echo "Error creating database \n";
	}
	timedRedirect("home");
?>