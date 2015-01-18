<?php
	require_once(base_url().'/inc/database.class.php');
	
	$resulte = database::drop($params[0]);
	
	if ($resulte) {
		echo "<H1>Database ".$params[0]."  Deleted successfully </H1>";
	} else {
		echo "Error Deleting database ".$params[0]."\n";
	}
	timedRedirect("/");
?>