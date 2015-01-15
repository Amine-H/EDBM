<?php
if(!isset($isIndex))die('');
 /*
 * this is the controller that will change session lang..
 * basically it sets _SESSION['lang'] to param[0]
 * 
 */
if(isset($params[0])){
    require_once base_url.'/inc/ling.class.php';
    Ling::set($params[0]);
    header('Location: /');
}


?>