<?php
	require_once(base_url().'/inc/database.class.php');
	
	$resulte = database::drop($db);
	
	if ($resulte) {
		echo "Database ".$_POST['name']."Deleted successfully\n";
	} else {
		echo "Error Deleting database \n";
	}*/
	timedRedirect("home");
?>