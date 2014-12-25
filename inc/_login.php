<?php
//we'lll retreive the POST vars and try to connect..
$user = $_POST['user'];//need to clean this data, for security reasons
$password = $_POST['password'];

if(@mysql_connect(EDBM_SERVER,$user,$pass))
{
	echo "connection successfull!";
	@mysql_set_charset("utf8");
	User::login(array('user'=>$user,'password'=>$password));
	timedRedirect('/home');
}
else
{
	echo EDBM_SERVER." ".$user." ".$password;
	echo "error occured while trying to connect!";
	//timedRedirect('/login');
}

?>