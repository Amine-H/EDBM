<?php
if(!isset($isIndex))die('');
 /*
 * this is the controller that will change session lang..
 * basically it sets _SESSION['lang'] to param[0]
 * 
 */
if(isset($params[0])){
    Lang::set($params[0]);
    redirectToLast();
}


?>