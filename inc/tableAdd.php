<?php if(!isset($isIndex))die('');
require_once(base_url().'/inc/table.class.php');
//require_once('/inc/_tableAdd.php');
?>
<script type="text/javascript">
	var count=0;
	function AddRow(){		
		var param ='<tr class="param" id="param_'+count+'">'+
			'<th>'+
				'<input type="text" class="form-control  input-lg" id="field'+count+'" name="field'+count+'">'+
			'</th>'+
			'<th>'+
				'<select name="type'+count+'" id="type'+count+'" class="form-control">'+
				  '<option value="int" selected>Int</option>'+
				  '<option value="varchar">Varchar</option>'+
				  '<option value="text" >Text</option>'+
				  '<option value="date">Date</option>'+
				  '<option value="boolean">Boolean</option>'+
				'</select>'+
			'</th>'+
			'<th >'+
				'<input type="number" class="form-control" id="taille'+count+'" name="taille'+count+'"  min="1" max="2000">'+
			'</th>'+
			'<th >'+
				'<input type="checkbox" class="form-control" id="null'+count+'" name="null'+count+'" value="nul">'+
			'</th>'+
			'<th >'+
				'<input type="text" class="form-control" id="default'+count+'" name="default'+count+'" >'+
			'</th>'+
			'<th>'+
				'<select name="extra'+count+'" id="extra'+count+'" class="form-control">'+
				  '<option value="" selected>---</option>'+
				  '<option value="PRIMARY KEY">PRIMARY KEY</option>'+
				  '<option value="INDEX">INDEX</option>'+
				  '<option value="UNIQUE" >UNIQUE</option>'+
				'</select>'+
			'</th>'+
			'<th >'+
				'<input type="checkbox" class="form-control" id="auto_increment'+count+'" name="auto_increment'+count+'" value="AUTO_INCREMENT">'+
			'</th>'+
			'<th><button type="button" class="btn btn-danger btn-lg" onclick="javascript:removeParam('+count+');"><span class="glyphicon glyphicon-remove"></span></button></th>'+
		'</tr>';

		$('#button').before(param);
	 	$('#param_'+count).hide().fadeIn('normal');
	 	count++;
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
<form class="form-horizontal" action="<?php echo EDBM_ROOT; ?>/_tableAdd" method="POST">
<div class="">
	 <table class="table table-striped table-bordered table-nonfluid" name="TC" id="TC">
	 	<tr class="danger">
			<th colspan="8">
				<div class="form-group">
				    <label for="Tname" class="col-md-3 control-label">Nom Du Tableau :</label>
				    <div class="col-md-9">
				      <input type="text" class="form-control" id="Tname" name="Tname" placeholder="Nom">
				    </div>
				</div>
			</th>
		</tr>
	 	<tr class="danger input-lg">
			<th class="" >Field</th>
			<th class="">Type</th>
			<th class="">Tail/Val</th>
			<th class="">Null</th>
			<th class="">Default</th>
			<th class="">Extra</th>
			<th class="">A_I</th>
			<th class=""></th>
		</tr>
		<tr id="button" class="success">
	 		<td colspan="5"><button type="button" class="btn btn-default" onclick="javascript:AddRow();">Ajouter une colonne</button></td>
	 		<td colspan="3" ><button type="submit" class="btn btn-default">Cree tableau</button></td>
	 	</tr>
	 </table>
</div>
</form>
