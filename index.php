<?php
	session_start();
	$isIndex=true;
	require_once('inc/functions.php');
	require_once('inc/config.php');
	require_once('inc/user.php');
	require_once('inc/DB.php');
	$routes = array('home',
					'login',
					'_login',
					'procedure',
					'_procedure',
					'database',
					'logout');
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
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>Easy Database Manager</title>
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<?php 
		if(!User::isConnected())
		{?>
		<link rel="stylesheet" type="text/css" href="/css/signin.css">
		<?php }?>
		<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
		<?php
		if(in_array($action,$routes))
		{
			if(!User::isConnected() && $action!='_login')
			{
				require_once("/inc/login.php");
			}
			else if($action == '_login')
			{
				require_once("/inc/_login.php");
			}
			else
			{
				$link=DB::start();
				if(isset($_SESSION['database']))
					mysql_query("USE ".$_SESSION['database']);
				require_once("/inc/theme_header.php");
				require_once("/inc/".$action.".php");
				require_once("/inc/theme_footer.php");
				DB::end($link);
			}
		}
		else
		{
			require_once("/inc/error.php");
		}
		?>
	</body>
</html>