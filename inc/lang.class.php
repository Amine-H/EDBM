<?php

/**
*class: Ling
*for  : multilingual support
**/

class Lang{
	public static function init(){
		$lang = Lang::get();
		if($lang == 'en'){
			Lang::$dictionary = array('EDBM_welcome'=>'hello,welcome to Easy Database Manager!',
								'database'=>'Database',
								'create_database'=>'Create a database',
								'database_name'=>'Database name',
								'tables'=>'Tables',
								'functions'=>'Functions',
								'procedures'=>'Procedures',
								'execute_code'=>'Execute SQL code',
								'add'=>'Add',
								'insert'=>'Insert',
								'update'=>'Update',
								'delete'=>'Delete',
								'add_new'=>'Add new',
								'delete_database'=>'Delete Database',
								'add_parameter'=>'Add parameter',
								'function_name'=>'Function name',//fonction.php
								'create_function'=>'Create function',
								'parameters'=>'Parameters',
								'return_type'=>'Return type',
								'procedure_name'=>'Procedure name',//procedure.php
								'create_procedure'=>'Create procedure',
								'direction'=>'Direction',
								'size'=>'Size',
								'code'=>'Code',
								'name'=>'Name',
								'type'=>'Type',
								'connection'=>'Connection',//login.php
								'user'=>'User',
								'password'=>'Password',
								'connect'=>'Connect',
								'add_data'=>'Add data',//table.php
								'no_data'=>'Still empty',
								'logout'=>'Logout',
								'home'=>'Home',
								'console'=>'Console',
								'execute'=>'Execute',
								'insert_code'=>'Write your code',
								'code_executed'=>'Code executed successfully',
								'add_row'=>'Add row');//tableInsert.php
		}
		else if($lang == 'fr'){
			Lang::$dictionary = array('EDBM_welcome'=>'soyer le bienvenu!',
								'database'=>'Base de données',
								'create_database'=>'Créer une Base de données',
								'database_name'=>'NOM de la Base de données',
								'tables'=>'Tables',
								'functions'=>'Fonctions',
								'procedures'=>'Procedures',
								'execute_code'=>'Executer code SQL',
								'add'=>'Ajouter',
								'insert'=>'Inserer',
								'update'=>'Modifier',
								'delete'=>'Supprimer',
								'add_new'=>'Ajouter nouveau',
								'delete_database'=>'Supprimer la base de données',
								'add_parameter'=>'Ajouter un paramètre',
								'function_name'=>'Nom de la fonction',//fonction.php
								'create_function'=>'Créer fonction',
								'parameters'=>'Paramètres',
								'return_type'=>'Type de retour',
								'procedure_name'=>'Nom de la procédure',//procedure.php
								'create_procedure'=>'Créer procédure',
								'direction'=>'Direction',
								'size'=>'Taille',
								'code'=>'Code',
								'name'=>'Nom',
								'type'=>'Type',
								'connection'=>'Connection',//login.php
								'user'=>'Utilisateur',
								'password'=>'Mot de passe',
								'connect'=>'Connecter',
								'add_data'=>'Inserer des champs',//table.php
								'no_data'=>'Table vide',
								'logout'=>'Se deconnecter',
								'home'=>'Acceuil',
								'console'=>'Console',
								'execute'=>'Executer',
								'insert_code'=>'Tapez votre code',
								'code_executed'=>'Code executé avec succès',
								'add_row'=>'Ajouter une colonne');//tableInsert.php
		}
		else if($lang == 'ar'){
			Lang::$dictionary = array('EDBM_welcome'=>'mar7aban bikom!',
								'database'=>'قاعدة بيانات',
								'create_database'=>'إنشاء قاعدة بيانات',
								'database_name'=>'اسم قاعدة البيانات',
								'tables'=>'الجداول',
								'functions'=>'الوظائف',
								'procedures'=>'الإجراءات',
								'execute_code'=>'تنفيذ التعليمات البرمجية SQL',
								'add'=>'Add',
								'insert'=>'Insert',
								'update'=>'Update',
								'delete'=>'Delete',
								'add_new'=>'Add new',
								'delete_database'=>'Delete Database',
								'add_parameter'=>'Add parameter',
								'function_name'=>'Function name',//fonction.php
								'create_function'=>'Create function',
								'parameters'=>'Parameters',
								'return_type'=>'Return type',
								'procedure_name'=>'Procedure name',//procedure.php
								'create_procedure'=>'Create procedure',
								'direction'=>'Direction',
								'size'=>'Size',
								'code'=>'Code',
								'name'=>'Name',
								'type'=>'Type',
								'connection'=>'Connection',//login.php
								'user'=>'User',
								'password'=>'Password',
								'connect'=>'Connect',
								'add_data'=>'Add data',//table.php
								'no_data'=>'Still empty',
								'logout'=>'Logout',
								'home'=>'Home',
								'console'=>'Console',
								'execute'=>'Execute',
								'insert_code'=>'Write your code',
								'code_executed'=>'Code executed successfully',
								'add_row'=>'Add row');//tableInsert.php
       	}
	}
	public static function set($input){
		if($input != 'fr' && $input != 'en' && $input != 'ar'){
       		return;
       	}
       	else{
			$_SESSION['lang']=$input;
       	}
    }
    public static function get(){
		return (isset($_SESSION['lang']))?$_SESSION['lang']:'fr';
    }
    public static function translate($input){
        return Lang::$dictionary[$input];
    }
    private static $dictionary=array();
}

?>