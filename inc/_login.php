<?php if(!isset($isIndex))die('');
if(User::isConnected())header('Location: /');
//we'lll retreive the POST vars and try to connect..
$user = ($_POST['user']);//need to clean this data, for security reasons
$password = ($_POST['password']);

$link = @mysql_connect(EDBM_SERVER,$user,$password);

if($link !== false)
{
	echo "connection etablit!";
	User::login(array('user'=>$user,'password'=>$password));
	header('Location: /home');
}
else
{
	echo "erreur, connection non etablit.";
	timedRedirect('/login');
}

?>
