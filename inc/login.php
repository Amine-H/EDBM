<?php
if(!isset($isIndex))die('');
if(User::isConnected())header('Location: /');?>
<div class="container">
      <form class="form-signin" role="form" action="<?php echo EDBM_ROOT; ?>/_login" method="POST">
        <div><img src="<?php echo EDBM_ROOT; ?>/img/logo.png"></div>
        <h2 class="form-signin-heading" style="text-align:center;"><?php echo Lang::translate('connection'); ?></h2>
        <label for="user" class="sr-only"><?php echo Lang::translate('user'); ?></label>
        <span class="input-group-addon glyphicon glyphicon-user"></span>
        <input style="width:100%;" type="text" name="user" id="user" class="form-control" placeholder="<?php echo Lang::translate('user'); ?>" required autofocus>
        <label for="password" class="sr-only"><?php echo Lang::translate('password'); ?></label>
        <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
        <input style="width:100%;" type="password" name="password" id="password" class="form-control" placeholder="<?php echo Lang::translate('password'); ?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo Lang::translate('connect'); ?></button>
      </form>
</div> <!-- /container -->