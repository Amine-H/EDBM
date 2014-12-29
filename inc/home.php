<?php if(!isset($isIndex)){die('');} // need to cheek this out 
if($action == 'home'){DB::selectDB('');}
else if(DB::getSelectedDB()!=''){header('Location: /database/'.DB::getSelectedDB());}?>
hello,welcome to Easy Database Manager!<br>

this is a hint of how this should look like,for now all of these infos are fake,we should find out how to fetch the real data<br>
here we will be displaying server related informations, for example<br>

Serveur : 127.0.0.1 via TCP/IP<br>
Type de serveur : MySQL<br>
Version du serveur : 5.6.16 - MySQL Community Server (GPL)<br>
Version du protocole : 10<br>
Utilisateur : root@localhost<br>
Jeu de caractères du serveur : UTF-8 Unicode (utf8)<br>
Apache/2.4.9 (Win32) OpenSSL/1.0.1g PHP/5.5.11<br>
Version du client de base de données : libmysql - mysqlnd 5.0.11-dev - 20120503 - $Id: bf9ad53b11c9a57efdb1057292d73b928b8c5c77 $<br>
Extension PHP : mysqli<br>

create a database

<form class="form-vertical" action="/_database" method="POST">
<fieldset style="width:500px;display:block;">
<legend>Créer Procédure</legend>
	<div class="control-group">
		<label class="control-label" for="name">Base de données</label>
		<div class="controls">
		 	<input class="form-control" rows="5"name="name" id="name">
		</div>
	</div>
	<input type="submit" class="btn btn-primary" value="Ajouter">
</fieldset>
</form>