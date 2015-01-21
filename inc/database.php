<?php if(!isset($isIndex))die('');
require_once(base_url().'/inc/fonction.class.php');
require_once(base_url().'/inc/procedure.class.php');
require_once(base_url().'/inc/table.class.php');
if(!isset($params[0]) || empty($params[0])){header('Location: /');}
else if(!DB::exists(array('name'=>$params[0],'link'=>$link)))
{
	echo "Base de données inexistant!";
	timedRedirect(EDBM_ROOT.'/');
}
else
{
	if(DB::getSelectedDB() != $params[0])
	{
		if(DB::selectDB($params[0]))
		{
			header('Location: '.EDBM_ROOT.'/database/'.$params[0]);
		}
		else
		{//something is up.. let's show an error message then redirect
			echo "impossible de selectionner la base de données!";
			timedRedirect(EDBM_ROOT.'/');
		}

	}
	else
	{
?>
<div class="alert alert-info"><?php echo Lang::translate('database'); ?>:<?php echo DB::getSelectedDB();?></div>
<a class="btn btn-primary" href="<?php echo EDBM_ROOT; ?>/console"><?php echo Lang::translate('execute_code'); ?></a>
	 	<table class="table table-striped">
	 		<tr>
	 			<th><?php echo Lang::translate('tables'); ?></th>
	 			<th><?php echo Lang::translate('functions'); ?></th>
	 			<th><?php echo Lang::translate('procedures'); ?></th>
	 		</tr>
	 		<tr>
	 			<td><a href="<?php echo EDBM_ROOT; ?>/tableAdd"><span class="glyphicon glyphicon-plus"></span><?php echo Lang::translate('add_new'); ?></a></td>
	 			<td><a href="<?php echo EDBM_ROOT; ?>/fonction"><span class="glyphicon glyphicon-plus"></span><?php echo Lang::translate('add_new'); ?></a></td>
	 			<td><a href="<?php echo EDBM_ROOT; ?>/procedure"><span class="glyphicon glyphicon-plus"></span><?php echo Lang::translate('add_new'); ?></a></td>
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
				<td><a href="<?php echo EDBM_ROOT; ?>/table/<?php echo $tables[$i];?>"><?php echo $tables[$i];?></a>
					<a href="<?php echo EDBM_ROOT; ?>/tableInsert/<?php echo $tables[$i];?>"><span style="color:black;" class="glyphicon glyphicon-pencil"></span></a>
					<!--<a href="/tableUpdate/><span style="color:green;" class="glyphicon glyphicon-wrench"></span></a>-->
					<a href="<?php echo EDBM_ROOT; ?>/tableDel/<?php echo $tables[$i];?>"><span style="color:red;" class="glyphicon glyphicon-trash"></span></a>
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
				<td><a href="<?php echo EDBM_ROOT; ?>/fonction/<?php echo $fonctions[$i];?>"><?php echo $fonctions[$i];?></a></td>
				<?php }
				else
				{ ?>
				<td></td>
				<?php }
				?>
				<?php
				if(isset($procedures[$i]))
				{ ?>
				<td><a href="<?php echo EDBM_ROOT; ?>/procedure/<?php echo $procedures[$i];?>"><?php echo $procedures[$i];?></a></td>
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
<script>
	 
function alerteEffacement(){
//On definit la question
var question = 'Etes-vous sur de vouloir supprimer la base de donner '+ <?php echo $params[0]?> ;
var confirmation = confirm(question) ;
	//La question est validee
	if(confirmation = true){

	}
});
</script>
	 <div style="position: absolute; bottom: -50px; right: 0px;">
	 	<form action ="<?php echo EDBM_ROOT; ?>/_dropdatabase/<?php echo $params[0]?>" method="POST">
		<input class='btn btn-danger btn-xs' name="removeDB" type="submit" value="<?php echo Lang::translate('delete_database'); ?>"/>
	</div>
<?php
	}
}
?>
