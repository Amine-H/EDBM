<?php
	session_start();
	$isIndex=true;
	define('EDBM_ROOT',substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')));
	require_once('./inc/functions.php');
	require_once('./inc/config.php');
	require_once('./inc/user.class.php');
	require_once('./inc/DB.class.php');
	require_once('./inc/lang.class.php');
	$routes = array('home',
					'login',
					'_login',
					'table',
					'_dropdatabase',
					'tableAdd',
					'tableInsert',
					'_tableInsert',
					'_rowdelete',
					'_tableAdd',
					'tableUpdate',
					'tableDel',
					'_table',
					'fonction',
					'_fonction',
					'_rm_fonction',
					'procedure',
					'_procedure',
					'_rm_procedure',
					'database',
					'_database',
					'console',
                    'lang',
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
		<script type="text/javascript" src="<?php echo EDBM_ROOT; ?>/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo EDBM_ROOT; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        	$(document).ready(function(){
		    $('#langs').change(function(){
		        window.location='<?php echo EDBM_ROOT; ?>/lang/'+$('#langs').val();
		    });
		});
        </script>
		<link rel="stylesheet" type="text/css" href="<?php echo EDBM_ROOT; ?>/css/bootstrap.min.css">
		<link rel="icon" type="image/png" href="<?php echo EDBM_ROOT; ?>/img/icon.png">
		<?php 
		if(!User::isConnected())
		{?>
		<link rel="stylesheet" type="text/css" href="<?php echo EDBM_ROOT; ?>/css/signin.css">
		<?php }?>
		<link rel="stylesheet" type="text/css" href="<?php echo EDBM_ROOT; ?>/css/style.css">
                <?php
                if(Lang::get()=='ar'){ ?>
                <link rel="stylesheet" type="text/css" href="<?php echo EDBM_ROOT; ?>/css/arabic_style.css">
                <?php } ?>
</head>
<body>
		<?php
		if(in_array($action,$routes))
		{
			Lang::init();
			if(!User::isConnected() && $action!='_login')
			{
				require_once("./inc/login.php");
			}
			else if($action == '_login')
			{
				require_once("./inc/_login.php");
			}
			else
			{
				$link=DB::start();
				if($db=DB::getSelectedDB())
					mysql_query("USE $db",$link);
				require_once("./inc/theme_header.php");
				require_once("./inc/".$action.".php");
				require_once("./inc/theme_footer.php");
				DB::end($link);
			}
		}
		else
		{
			require_once("./inc/error.php");
		}
		?>
	</body>
</html>
