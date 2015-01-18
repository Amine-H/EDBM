<?php
if(!isset($isIndex))die('');
else
{
require_once(base_url().'/inc/procedure.class.php');
?>
<script type="text/javascript">
	params_count=0;
	function addParam()
	{
		var param='<tr class="param" id="param_'+params_count+'">'+
	 			'<td>'+
					'<select name="param_dir['+params_count+']" id="param_dir_'+params_count+'">'+
	                    '<option>IN</option>'+
	                    '<option>OUT</option>'+
	                    '<option>INOUT</option>'+
                	'</select>'+
	 			'</td>'+
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
<form class="form-horizontal" action="/_procedure" method="POST">
<fieldset style="width:500px;display:block;">
<legend><?php echo Lang::translate('create_procedure');?></legend>

<!-- Text input-->
<div class="control-group">
	<label class="control-label" for="name"><?php echo Lang::translate('procedure_name');?></label>
	<div class="controls">
	 	<input id="name" name="name" type="text" placeholder="<?php echo Lang::translate('procedure_name');?>" class="input-xlarge" required="">
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label"><?php echo Lang::translate('parameters');?></label>
	<div class="controls">
	 	<table class="table table-striped table-nonfluid" id="params_table">
	 		<tr>
	 			<th><?php echo Lang::translate('direction');?></th>
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
	$procedure = Procedure::getProcedure(array('link'=>$link,'name'=>$params[0]));
	if($procedure)
	{//we got the data we should use javascript to fill the table with it
		?>
		<script type="text/javascript">
			var procedure = <?php echo json_encode($procedure); ?>;
			$('#btn_submit').html('<?php echo Lang::translate("update"); ?>');
			$('#btn_submit').after($('<a>',{class:'btn btn-danger',html:'<?php echo Lang::translate("delete"); ?>',href:'/_rm_procedure/<?php echo $params[0];?>'}));
			$('#name').val(procedure.name);
			var params=procedure.params;
			for(var i=0;i<params.length;i++)
			{
				addParam();
				$('#param_dir_'+i).val(params[i][0]);
				$('#param_name_'+i).val(params[i][1]);
				$('#param_type_'+i).val(params[i][2]);
				$('#param_length_'+i).val(params[i][3]);
			}
			$('#code').val(procedure.code);
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
