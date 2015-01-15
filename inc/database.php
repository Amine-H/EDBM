<?php if(!isset($isIndex))die('');
require_once(base_url().'/inc/fonction.class.php');
require_once(base_url().'/inc/procedure.class.php');
require_once(base_url().'/inc/table.class.php');
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
<div class="alert alert-info"><?php echo Lang::translate('database'); ?>:<?php echo DB::getSelectedDB();?></div>
<a class="btn btn-primary" href="/console"><?php echo Lang::translate('execute_code'); ?></a>
	 	<table class="table table-striped">
	 		<tr>
	 			<th><?php echo Lang::translate('tables'); ?></th>
	 			<th><?php echo Lang::translate('functions'); ?></th>
	 			<th><?php echo Lang::translate('procedures'); ?></th>
	 		</tr>
	 		<tr>
	 			<td><a href="/tableAdd"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td><a href="/fonction"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 			<td><a href="/procedure"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a></td>
	 		</tr>
<?php
$tables=Table::tablelist();$nt=sizeof($tables);
$fonctions=Fonction::listFonctions(array('database'=>DB::getSelectedDB(),'link'=>$link));$nf=sizeof($fonctions);
$procedures=Procedure::listProcedures(array('database'=>DB::getSelectedDB(),'link'=>$link));$np=sizeof($procedures);
$n = max($nt,$nf,$np);
for($i=0;$i<$n;$i++)
{?>
			<tr>
				<?php
				if(isset($tables[$i]))
				{ ?>
				<td><a href="/table/<?php echo $tables[$i];?>"><?php echo $tables[$i];?></a>
					<a href="/tableAdd/<?php echo $tables[$i];?>"><span style="color:black;" class="glyphicon glyphicon-plus"></span></a>
					<a href="/tableUpdate/<?php echo $tables[$i];?>"><span style="color:green;" class="glyphicon glyphicon-pencil "></span></a>
					<a href="/tableDel/<?php echo $tables[$i];?>"><span style="color:red;" class="glyphicon glyphicon-minus"></span></a>
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
