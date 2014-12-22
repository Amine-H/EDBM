<!DOCTYPE html>
<?php
	$isIndex=true;
	session_start();/*
	require_once('inc/vars.php');
	require_once('inc/functions.php');
	require_once('inc/db.php');*/
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>EDBM</title>
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/signin.css">
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>
		<?php
		$routes = array('home',
						'login');
		$requestURI = explode('/',$_SERVER['REQUEST_URI']);
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

		for($i= 0;$i < sizeof($scriptName);$i++)
		{
			if($requestURI[$i] == $scriptName[$i])
			{
				unset($requestURI[$i]);
			}
		}
		$requestURI = array_values($requestURI);
		@$action = $requestURI[0];
		$params = array_slice($requestURI,1);

		if(empty($action))
		{
			$action = "home";
		}

		if(in_array($action,$routes))
		{
			require_once("./inc/".$action.".php");
		}
		else
		{
			require_once("./inc/error.php");
		}
		?>
	</body>
</html>