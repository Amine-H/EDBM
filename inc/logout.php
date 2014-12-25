<?php if(!isset($isIndex)){die('');}

User::logout();
timedRedirect('/login');

?>