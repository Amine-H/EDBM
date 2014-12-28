<div class="container-fluid" >
	<div class="row">
	  <div class="col-md-12 text-center">Esay DAtabase Manager</div>
	</div>
	<div class="row">
	  <div class="col-md-4">
		<div class="row">
			table
		</div>
		<div class="row">
		<?php
			//select all content from table 
			// don't forget to put use database
			$queryTable = "show tables;";
			$resultTable =mysql_query($queryTable);
			$rows =mysql_fetch_assoc($resultTable);
			
			for($i= 0;$i < sizeof($rows);$i++)
			{
				?>
				
				<?php
			}
		?>
		</div>
	  </div>
	  <div class="col-md-4">
		procedure  
	  </div>
	  <div class="col-md-4">
		Fonction 
	  </div>
	</div>
</div>



