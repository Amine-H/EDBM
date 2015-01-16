
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
$t=array();$ta=array();
$t = Table::champ($params[0],$link);
$ta = $t[0];
?>
<!--<div class="table-responsive ">need to think of this deeply next time-->
	 	<table class="table table-striped table-bordered">
	 	<tr class="danger"><?php $ke=array_keys($ta);//compt des nbr de array
		$size = sizeof($ke);
		$j=0;
		for($j=0;$j<$size;$j++){?>
			<th>
				<?php
				echo $ke[$j];
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
	 		<td colspan="<?php echo intval($size -intval($size/2) +1) ?>"><button type="submit" class="btn btn-default">Valide</button></td>
	 	</tr>
	 	</table>
<!--		<table 	class="table table-striped">
			<tr>
	 			<td ><a href="/tableAdd"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td ><a href="/tableUpdate"><span class="glyphicon glyphicon-plus"></span>Modifier</a></td>
	 			<td ><a href="/tableDEl"><span class="glyphicon glyphicon-plus"></span>supprimer</a></td>
	 		</tr>
		</table>
</div>-->
