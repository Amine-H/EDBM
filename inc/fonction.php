<?php
if(!isset($isIndex))die('');
else
{
require_once(base_url().'/inc/fonction.class.php');
?>
<script type="text/javascript">
	params_count=0;
	function addParam()
	{
		var param='<tr class="param" id="param_'+params_count+'">'+
	 			'<td><input name="param_name['+params_count+']" id="param_name_'+params_count+'" type="text"></td>'+
	 			'<td>'+
					'<select name="param_type['+params_count+']" id="param_type_'+params_count+'">'+
						'<option>INT</option>'+
						'<option>VARCHAR</option>'+
						'<option>DATE</option>'+
					'</select>'+
	 			'</td>'+
	 			'<td><input name="param_length['+params_count+']" id="param_length_'+params_count+'" type="text"></td>'+
	 			'<td><button type="button" class="btn btn-danger btn-lg" onclick="javascript:removeParam('+params_count+');"><span class="glyphicon glyphicon-remove"></span></button></td>'+
	 		'</tr>';
	 	$('#button').before(param);
	 	$('#param_'+params_count).hide().fadeIn('normal');
	 	params_count++;
	}
	function removeParam(input)
	{
		params_count--;
		$('#param_'+input).fadeOut('normal');
		setTimeout(function()
		{
			$('#param_'+input).remove();
		},1000);
	}
</script>
<form class="form-horizontal" action="<?php echo EDBM_ROOT; ?>/_fonction" method="POST">
<fieldset style="width:500px;display:block;">
<legend><?php echo Lang::translate('create_function');?></legend>

<!-- Text input-->
<div class="control-group">
	<label class="control-label" for="name"><?php echo Lang::translate('function_name');?></label>
	<div class="controls">
	 	<input id="name" name="name" type="text" placeholder="<?php echo Lang::translate('function_name');?>" class="input-xlarge" required="">
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label"><?php echo Lang::translate('parameters');?></label>
	<div class="controls">
	 	<table class="table table-striped table-nonfluid" id="params_table">
	 		<tr>
	 			<th><?php echo Lang::translate('name');?></th>
	 			<th><?php echo Lang::translate('type');?></th>
	 			<th><?php echo Lang::translate('size');?></th>
	 			<th></th>
	 		</tr>
	 		<tr id="button">
	 			<td colspan="5"><button type="button" class="btn btn-default" onclick="javascript:addParam();"><?php echo Lang::translate('add_parameter');?></button></td>
	 		</tr>
	 	</table>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="return_type"><?php echo Lang::translate('return_type');?></label>
	<div class="controls">
		<select name="return_type" id="return_type">
			<option>INT</option>
			<option>VARCHAR</option>
			<option>DATE</option>
		</select>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="return_size"><?php echo Lang::translate('size');?></label>
	<div class="controls">
		<input type="text" name="return_size" id="return_size">
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="code"><?php echo Lang::translate('code');?></label>
	<div class="controls">
	 	<textarea class="form-control" rows="8" name="code" id="code"></textarea>
	</div>
</div>
<div class="control-group">
	<div class="controls">
		<button type="submit" id="btn_submit" class="btn btn-primary"><?php echo Lang::translate('add');?></button>
	</div>
</div>
</fieldset>
</form>

<?php

if(isset($params[0]) && !empty($params[0]))
{
	$fonction = Fonction::getFonction(array('link'=>$link,'name'=>$params[0]));
	if($fonction)
	{//we got the data we should use javascript to fill the table with it
		?>
		<script type="text/javascript">
			var fonction = <?php echo json_encode($fonction); ?>;
			$('#btn_submit').html('<?php echo Lang::translate("update"); ?>');
			$('#btn_submit').after($('<a>',{class:'btn btn-danger',html:'<?php echo Lang::translate("delete"); ?>',href:'<?php echo EDBM_ROOT; ?>/_rm_fonction/<?php echo $params[0];?>'}));
			$('#name').val(fonction.name);
			var params=fonction.params;
			for(var i=0;i<params.length;i++)
			{
				if(trim(params[i][0]).length == 0){
					continue;
				}
				addParam();
				$('#param_name_'+i).val(params[i][0]);
				$('#param_type_'+i).val(params[i][1]);
				$('#param_length_'+i).val(params[i][2]);
			}
			$('#return_type').val(fonction.return_type);
			$('#return_size').val(fonction.return_size);
			$('#code').val(fonction.code);
		</script>
		<?php
	}
	else
	{
		echo "<div class='alert alert-danger'>".mysql_error()."</div>";
	}
}
}
?>
