<?php
if(!isset($isIndex))die('');
else
{
require_once('/inc/procedure.class.php');
?>
<script type="text/javascript">
	params_count=0;
	function addParam()
	{
		var params_table = $('#params_table');
	}
	function removeParam(input)
	{

	}
</script>
<form class="form-horizontal" action="/_procedure" method="POST">
<fieldset style="width:500px;display:block;">
<legend>Créer Procédure</legend>

<!-- Text input-->
<div class="control-group">
	<label class="control-label" for="name">Nom de la procédure</label>
	<div class="controls">
	 	<input id="name" name="name" type="text" placeholder="Nom de la procédure" class="input-xlarge" required="">
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label">Paramètres</label>
	<div class="controls">
	 	<table class="table table-striped table-nonfluid" style="display:relative;" id="params_table">
	 		<tr>
	 			<th>Direction</th>
	 			<th>Nom</th>
	 			<th>Type</th>
	 			<th>Taille/Valeurs</th>
	 			<th></th>
	 		</tr>
	 		<tr class="param">
	 			<td>
					<select name="param_dir[0]" id="param_dir_0">
	                    <option>IN</option>
	                    <option>OUT</option>
	                    <option>INOUT</option>
                	</select>
	 			</td>
	 			<td><input name="param_name[0]" id="param_name_0" type="text" value=""></td>
	 			<td>
					<select name="param_type[0]">
						<option>INT</option>
						<option>VARCHAR</option>
						<option>DATE</option>
					</select>
	 			</td>
	 			<td><input name="param_length[0]" id="param_length_0" type="text" value=""></td>
	 			<td><button type="button" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-remove"></span></button>
				</td>
	 		</tr>
	 		<tr>
	 			<td colspan="5"><button type="button" class="btn btn-default" onclick="javascript:addParam();">Ajouter un paramètre</button></td>
	 		</tr>
	 	</table>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Code</label>
	<div class="controls">
	 	<textarea class="form-control" rows="5"name="code" id="code"></textarea>
	</div>
</div>
<div class="control-group">
	<div class="control">
		<button type="button" class="btn btn-primary">Ajouter</button>
	</div>
</div>
</fieldset>
</form>

<?php

if(isset($params[0]))
{
	$procedure = Procedure::getProcedure(array('link'=>$link,'name'=>$params[0]));
	if($procedure)
	{//we got the data we should use javascript to fill the table with it
		?>
		<script type="text/javascript">
		var procedure = <?php echo json_encode($procedure); ?>;
		$('#name').val(procedure.name);
		$('#param_dir_0').val(procedure.params[0]);
		$('#param_name_0').val(procedure.params[1]);
		$('#param_length_0').val(procedure.params[2]);
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