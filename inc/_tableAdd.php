	<tr >
			<th>
				<input type="text" class="form-control  input-lg" id="field<?php echo $i?>" name="field<?php echo $i?>">
			</th>
			<th>
				<select name="type<?php echo $i?>" id="type<?php echo $i?>" class="form-control">
				  <option value="int" selected>Int</option>
				  <option value="varchr">Varchar</option>
				  <option value="text" >Text</option>
				  <option value="date">Date</option>
				  <option value="boolean">Boolean</option>
				</select>
			</th>
			<th >
				<input type="number" class="form-control" id="taille<?php echo $i?>" name="taille<?php echo $i?>"  min="1" max="2000">
			</th>
			<th >
				<input type="checkbox" class="form-control" id="null<?php echo $i?>" name="null<?php echo $i?>" >
			</th>
			<th >
				<input type="text" class="form-control" id="default<?php echo $i?>" name="default<?php echo $i?>" >
			</th>
			<th>
				<select name="type<?php echo $i?>" id="type<?php echo $i?>" class="form-control">
				  <option value="none" selected>---</option>
				  <option value="primary key">PRIMARY KEY</option>
				  <option value="index">INDEX</option>
				  <option value="unique" >UNIQUE</option>
				</select>
			</th>
			<th >
				<input type="checkbox<?php echo $i?>" class="form-control" id="auto_increment" name="auto_increment" >
			</th>
			

		</tr>