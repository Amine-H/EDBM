<script type="text/javascript">
public  function AddRow(){		
		var param ='<tr class="param" id="param_'+count+'">
			<th>
				<input type="text" class="form-control  input-lg" id="field'+count+'" name="field'+count+'">
			</th>
			<th>
				<select name="type'+count+'" id="type'+count+'" class="form-control">
				  <option value="int" selected>Int</option>
				  <option value="varchr">Varchar</option>
				  <option value="text" >Text</option>
				  <option value="date">Date</option>
				  <option value="boolean">Boolean</option>
				</select>
			</th>
			<th >
				<input type="number" class="form-control" id="taille'+count+'" name="taille'+count+'"  min="1" max="2000">
			</th>
			<th >
				<input type="checkbox" class="form-control" id="null'+count+'" name="null'+count+'" >
			</th>
			<th >
				<input type="text" class="form-control" id="default'+count+'" name="default'+count+'" >
			</th>
			<th>
				<select name="type'+count+'" id="type'+count+'" class="form-control">
				  <option value="none" selected>---</option>
				  <option value="primary key">PRIMARY KEY</option>
				  <option value="index">INDEX</option>
				  <option value="unique" >UNIQUE</option>
				</select>
			</th>
			<th >
				<input type="checkbox'+count+'" class="form-control" id="auto_increment" name="auto_increment" >
			</th>
			<th><button type="button" class="btn btn-danger btn-lg" onclick="javascript:removeParam('+params_count+');"><span class="glyphicon glyphicon-remove"></span></button></th>
		</tr>';
		$('#button').before(param);
	 	$('#param_'+params_count).hide().fadeIn('normal');
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