<?php if(!isset($isIndex))die('');
require_once(base_url().'/inc/table.class.php');

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
		<?php
		$m = sizeof($t);//compt des nbr de arry
		for($i=0;$i<$m;$i++){?>
		</tr>
		<tr>
			<?php
			$ta = $t[$i];
			for($j=0;$j<$size;$j++){?>
			<th>
				<?php
				echo $ta[$ke[$j]];
				?>
			</th>
			<?php
			}
			?>
			<th>
				<a href="/_rowdelete"><span style="color:red;" class="glyphicon glyphicon-trash"></span></a>
			</th>
		</tr>
		<?php
		}
		?>
	 	</table>
<!--		<table 	class="table table-striped">
			<tr>
	 			<td ><a href="/tableAdd"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td ><a href="/tableUpdate"><span class="glyphicon glyphicon-plus"></span>Modifier</a></td>
	 			<td ><a href="/tableDEl"><span class="glyphicon glyphicon-plus"></span>supprimer</a></td>
	 		</tr>
		</table>
</div>-->
