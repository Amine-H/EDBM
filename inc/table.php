<?php if(!isset($isIndex))die('');
require_once('/inc/table.class.php');


$t = Table::champ($params[0],$link);
print_r($t);
?>

	 	<table class="table table-striped">
	 	<?php
		$n=mysql_num_rows($t);//compt des nbr de arry
		for($i=0;$i<$n;$i++){?>
		<tr>
			<?php
			$m=mysql_num_rows($t);//compt des nbr de arry
			for($j=0;$j<$m;$j++){?>
			<th>
				<?php
				$nom//table 
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