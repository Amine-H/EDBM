<?php if(!isset($isIndex))die('');
require_once(base_url().'/inc/table.class.php');

$t=array();$ta=array();
$t = Table::champ($params[0],$link);

if (empty($t))
	$ta = $t ;
else
$ta = $t[0];
$name= Table::columnlist($db,$params[0],$link);
?>
<!--<div class="table-responsive ">need to think of this deeply next time-->
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
		<?php
		if (!empty($t)){
		$m = sizeof($t);//compt des nbr de arry
		for($i=0;$i<$m;$i++){?>
		</tr>
		<tr>
			<?php
			$ta = $t[$i];
			for($j=0;$j<$size;$j++){?>
			<th>
				<?php
				echo $ta[$name[$j]];
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
		<tr >
			<th colspan="<?php echo $size+1?>" ><p class="text-center">
				<a href="/tableInsert/<?php echo $params[0]?>"><span style="color:green;" class="glyphicon glyphicon-plus"></span>Add Data</a>
			</p>
			</th>
		</tr>
		<?php
		}else{
			?>
		<tr >
			<th colspan="<?php echo $size+1?>" ><p class="text-center">Still empty 
				<a href="/tableInsert/<?php echo $params[0]?>"><span style="color:green;" class="glyphicon glyphicon-plus"></span>Add Data</a>
			</p>
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
