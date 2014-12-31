<?php if(!isset($isIndex))die('');
require_once('/inc/procedure.class.php');
require_once('/inc/table.class.php');
if(!isset($params[0]) || empty($params[0])){header('Location: /');}
else if(!DB::exists(array('name'=>$params[0],'link'=>$link)))
{
	echo "Base de données inexistant!";
	timedRedirect('/');
}
else
{
	if(DB::getSelectedDB() != $params[0])
	{
		if(DB::selectDB($params[0]))
		{
			header('Location: /database/'.$params[0]);
		}
		else
		{//something is up.. let's show an error message then redirect
			echo "impossible de selectionner la base de données!";
			timedRedirect('/');
		}

	}
	else
	{
?>
	<div class="alert alert-info">Base de données:<?php echo DB::getSelectedDB();?></div>
	 	<table class="table table-striped">
	 		<tr>
	 			<th>Tables</th>
	 			<th>Fonctions</th>
	 			<th>Procedures</th>
	 		</tr>
	 		<tr>
	 			<td><a href="/table"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td><a href="/fonction"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td><a href="/procedure"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 		</tr>
<?php
$tables=Table::tablelist();$nt=sizeof($tables);
$fonctions=array();$nf=sizeof($fonctions);
$procedures=Procedure::listProcedures(array('database'=>DB::getSelectedDB(),'link'=>$link));$np=sizeof($procedures);
$n = max($nt,$nf,$np);
for($i=0;$i<$n;$i++)
{?>
			<tr>
				<?php
				if(isset($tables[$i]))
				{ ?>
				<td><a href="/table/<?php echo $tables[$i];?>"><?php echo $tables[$i];?></a>
					<a href="/tableUpdate"><img src="/img/update.png"></a>
					<a href="/tableDEl" ><img src="/img/delete.png"></a>
					<a href="/tableUpdate"><img src="/img/update.png"></a>
				</td>
				<?php }
				else
				{ ?>
				<td></td>
				<?php }
				?>
				<?php
				if(isset($fonctions[$i]))
				{ ?>
				<td><a href="/fonction/<?php echo $fonctions[$i];?>"><?php echo $fonctions[$i];?></a></td>
				<?php }
				else
				{ ?>
				<td></td>
				<?php }
				?>
				<?php
				if(isset($procedures[$i]))
				{ ?>
				<td><a href="/procedure/<?php echo $procedures[$i];?>"><?php echo $procedures[$i];?></a></td>
				<?php }
				else
				{ ?>
				<td></td>
				<?php }
				?>
			</tr>
<?php }
?>
	 	</table>
<?php
	}
}
?>