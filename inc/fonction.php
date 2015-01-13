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
		$('#param_'+input).fadeOut('normal');
		setTimeout(function()
		{
			$('#param_'+input).remove();
		},1000);
	}
</script>
<form class="form-horizontal" action="/_fonction" method="POST">
<fieldset style="width:500px;display:block;">
<legend>Créer Fonction</legend>

<!-- Text input-->
<div class="control-group">
	<label class="control-label" for="name">Nom de la fonction</label>
	<div class="controls">
	 	<input id="name" name="name" type="text" placeholder="Nom de la procédure" class="input-xlarge" required="">
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label">Paramètres</label>
	<div class="controls">
	 	<table class="table table-striped table-nonfluid" id="params_table">
	 		<tr>
	 			<th>Nom</th>
	 			<th>Type</th>
	 			<th>Taille/Valeurs</th>
	 			<th></th>
	 		</tr>
	 		<tr id="button">
	 			<td colspan="5"><button type="button" class="btn btn-default" onclick="javascript:addParam();">Ajouter un paramètre</button></td>
	 		</tr>
	 	</table>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="return_type">Type retourné</label>
	<div class="controls">
		<select name="return_type" id="return_type">
			<option>INT</option>
			<option>VARCHAR</option>
			<option>DATE</option>
		</select>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="return_size">Taille</label>
	<div class="controls">
		<input type="text" name="return_size" id="return_size">
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="code">Code</label>
	<div class="controls">
	 	<textarea class="form-control" rows="8" name="code" id="code"></textarea>
	</div>
</div>
<div class="control-group">
	<div class="controls">
		<button type="submit" id="btn_submit" class="btn btn-primary">Ajouter</button>
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
			$('#btn_submit').html('Modifier');
			$('#btn_submit').after($('<a>',{class:'btn btn-danger',html:'Supprimer',href:'/_rm_fonction/<?php echo $params[0];?>'}));
			$('#name').val(fonction.name);
			var params=fonction.params;
			for(var i=0;i<params.length;i++)
			{
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
