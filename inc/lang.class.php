<?php

/**
*class: Ling
*for  : multilingual support
**/

class Lang{
    public static function set($input){
        $_SESSION['lang']=$input;
    }
    public static function get(){
        return (isset($_SESSION['lang']))?$_SESSION['lang']:'fr';
    }
    public static function translate($input){
        return Lang::$dictionary[Lang::get()][$input];
    }
    private static $dictionary=array('en'=>array('database'=>'Database','create_database'=>'Create a database','database_name'=>'Database name','tables'=>'Tables','functions'=>'Functions','procedures'=>'Procedures','execute_code'=>'Execute SQL code'),
                                     'fr'=>array('database'=>'Base de données','create_database'=>'Créer une Base de données','database_name'=>'NOM de la Base de données','tables'=>'Tables','functions'=>'Fonctions','procedures'=>'Procedures','execute_code'=>'Executer code SQL'),
                                     'ar'=>array('database'=>'قاعدة بيانات','create_database'=>'إنشاء قاعدة بيانات','database_name'=>'اسم قاعدة البيانات','tables'=>'الجداول','functions'=>'الوظائف','procedures'=>'الإجراءات','execute_code'=>'تنفيذ التعليمات البرمجية SQL'));
}

?>