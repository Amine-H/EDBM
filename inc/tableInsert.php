
<?php if(!isset($isIndex))die('');
require_once(base_url().'/inc/table.class.php');
?>
<script type="text/javascript">
	var count=0;
	function AddRow(saize){		
		var param ='<tr class="param" id="param_'+count+'">'
		for (var i = 0; i < saize; i++) {
			param +='<th>'+
				'<input type="text" class="form-control  input-lg" id="line'+count+'col'+i+'" name="line'+count+'col'+i+'">'+
			'</th>';
		};
			param +='<th><button type="button" class="btn btn-danger btn-lg" onclick="javascript:removeParam('+count+');"><span class="glyphicon glyphicon-remove"></span></button></th>'+
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
<?php
$name=array();
$name= Table::columnlist($db,$params[0],$link);
?>
<!--<div class="table-responsive ">need to think of this deeply next time-->
<form action="/_tableInsert" method="post">
	 	<table class="table table-striped table-bordered">
	 	<tr class="danger"><?php $size = sizeof($name);
		for($j=0;$j<$size;$j++){?>
			<th>
				<?php
				echo $name[$j];
				?>
			</th>
		<?php
		}
		?>
			<th>
			</th>
		</tr>
		<tr id="button" class="success">
	 		<td colspan="<?php echo intval($size/2) ?>"><button type="button" class="btn btn-default" onclick="javascript:AddRow(<?php echo $size ?>);">Ajouter une colonne</button></td>
	 		<td colspan="<?php echo intval($size -intval($size/2) +1) ?>"><input type="submit" class="btn btn-default" value="Valide"/></td>
	 	</tr>
	 	</table>
</form>
<!--		<table 	class="table table-striped">
			<tr>
	 			<td ><a href="/tableAdd"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td ><a href="/tableUpdate"><span class="glyphicon glyphicon-plus"></span>Modifier</a></td>
	 			<td ><a href="/tableDEl"><span class="glyphicon glyphicon-plus"></span>supprimer</a></td>
	 		</tr>
		</table>
</div>-->
