<?php

/**
*class: Ling
*for  : multilingual support
**/

class Ling{
    public static function set($input){
        $_SESSION['lang']=$input;
    }
    public static function get(){
        return (isset($_SESSION['lang']))?$_SESSION['lang']:'fr';
    }
    public static function translate($input){
        return Ling::$dictionary[Ling::get()][$input];
    }
    private static $dictionary=array('en'=>array('database'=>'Database'),
                                     'fr'=>array('database'=>'Base de données'),
                                     'ar'=>array('database'=>'قاعدة البيانات'));
}

?>