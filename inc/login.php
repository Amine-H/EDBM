<?php
if(!isset($isIndex))die('');
if(User::isConnected())header('Location: /');?>
<div class="container">
      <form class="form-signin" role="form" action="_login" method="POST">
        <div><img src="/img/logo.png"></div>
        <h2 class="form-signin-heading" style="text-align:center;">Connection</h2>
        <label for="user" class="sr-only">Utilisateur</label>
        <span class="input-group-addon glyphicon glyphicon-user"></span>
        <input style="width:100%;" type="text" name="user" id="user" class="form-control" placeholder="Utilisateur" required autofocus>
        <label for="password" class="sr-only">Mot de passe</label>
        <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
        <input style="width:100%;" type="password" name="password" id="password" class="form-control" placeholder="Mot de passe">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connecter</button>
      </form>
</div> <!-- /container -->