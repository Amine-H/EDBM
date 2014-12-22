<<<<<<< HEAD
<?php
//first step to glory :D
//a nother step
?>
=======
<!DOCTYPE html>
<?php
	$isIndex=true;
	session_start();
	require_once('inc/vars.php');
	require_once('inc/functions.php');
	require_once('inc/db.php');
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>EDBM</title>
		<link rel="stylesheet" type="text/css" href="<?php echo TK_HOME;?>css/style.css">
		<script src="<?php echo TK_HOME;?>js/script.js"></script>
		<!--
			<link rel="stylesheet" type="text/css" href="/css/style.css">
			<script src="/js/script.js"></script>
		-->
</head>
<body>
		<div id='content_wrapper'>
			<div id='content'>
			<?php

			$routes = array('main',
							'signin',
							'signin_',
							'signup',
							'signup_',
							'signout',
							'u',
							'u_panel',
							'u_panel_',
							'error',
							'maintenance');
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
				$action = "main";
			}

			if(in_array($action,$routes))
			{
				if(isset($dbParams['isLive']) && $dbParams['isLive']==1)
					require_once("./inc/".$action.".php");
				else
					require_once("./inc/maintenance.php");
			}
			else
			{
				require_once("./inc/error.php");
			}
			?>

			</div>
		</div>
	</body>
</html>
>>>>>>> c76a5aa8c5d03cdbd689945455f7e685ec693b0c
