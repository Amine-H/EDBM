<?php
	echo "this page should create database ".$_POST['name'];
	
	$resulte = database::Create(array('link'=>$link,'name'=>$_POST['name']));
	
	if (!$resulte) {
		echo "Database my_db created successfully\n";
	} else {
		echo 'Error creating database: ' . mysql_error() . "\n";
	}
	echo "this page should create database ".$_POST['name'];
?>