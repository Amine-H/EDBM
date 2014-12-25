<?php
if(!isset($isIndex))die('');
if(User::isConnected())header('Location: /');?>
<div class="container">
      <form class="form-signin" role="form" action="_login" method="POST">
        <h2 class="form-signin-heading">Connection</h2>
        <label for="user" class="sr-only">Utilisateur</label>
        <input style="width:100%;" type="text" name="user" id="user" class="form-control" placeholder="Utilisateur" required autofocus>
        <label for="password" class="sr-only">Mot de passe</label>
        <input style="width:100%;" type="password" name="password" id="password" class="form-control" placeholder="Mot de passe">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connecter</button>
      </form>
</div> <!-- /container -->