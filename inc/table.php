<?php if(!isset($isIndex))die('');
require_once('/inc/table.class.php');

$t=array();$ta=array();
$t = Table::champ($params[0],$link);
$ta = $t[0];
print_r($t);
?>

	 	<table class="table table-striped">
	 	<tr>
		<?php
		$ke=array_keys($ta);//compt des nbr de arry
		print_r($ke);
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
		$m = sizeof($t);//compt des nbr de arry
		for($i=0;$i<$m;$i++){?>
		</tr>
		<tr>
			<?php
			for($j=0;$j<$size;$j++){?>
			<th>
				<?php
				echo $ta["{$ke[$j]}"];
				?>
			</th>
			<?php
			}
			?>
		</tr>
		<?php
		}
		?>
	 	</table>
		<table 	class="table table-striped">
			<tr>
	 			<td ><a href="/table/tableAdd"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td ><a href="/table/tableUpdate"><span class="glyphicon glyphicon-plus"></span>Modifier</a></td>
	 			<td ><a href="/table/tableDEl"><span class="glyphicon glyphicon-plus"></span>supprimer</a></td>
	 		</tr>
		</table>