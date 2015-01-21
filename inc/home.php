<?php if(!isset($isIndex)){die('');} // need to cheek this out 
if($action == 'home'){DB::selectDB('');}
else if(DB::getSelectedDB()!=''){header('Location: /database/'.DB::getSelectedDB());}?>
<?php echo Lang::translate('EDBM_welcome'); ?><br>
<?php
    echo "server at :".mysql_get_host_info($link)."<br/>";
    echo "OS :".mysql_get_server_info($link)."<br/>";
    echo "PHP version :".phpversion()."<br/>";
?>

<form class="form-vertical" action="<?php echo EDBM_ROOT; ?>/_database" method="POST">
<fieldset style="width:500px;display:block;">
<legend><?php echo Lang::translate('create_database'); ?></legend>
	<div class="control-group">
		<label class="control-label" for="name"><?php echo Lang::translate('database_name'); ?> :</label>
		<div class="controls">
		 	<input class="form-control" rows="5" name="name" id="name">
		</div>
	</div>
	<input type="submit" class="btn btn-primary" value="<?php echo Lang::translate('add'); ?>">
</fieldset>
</form>