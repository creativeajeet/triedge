<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 50%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
	th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	tr, td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>


<h2>Daily In-Out Time Entry</h2>
<?php echo form_open('metrices/admin/holidays'); ?>
<?php if (count($users)){ 
 echo "<table>\n";
	
 foreach ($users as $row){
 
  echo "<tr valign='top'>\n";
 echo    "<td><input type='hidden' name='user[]' value='$row->id'></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 

 ?>
<div><b>Date :</b><input name='date' type='text' size='15' class='input-medium datepick' /><b> Holiday :</b><input name='holiday' type='text' size='15' /></div>


<p>&nbsp;</p>
<div align="right"><input name='submit' type='submit' value='Enter'/></div>

<?php if (count($holidays)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th width='50%'>Holiday</th>\n";
	echo "<th colspan='3'>Date</th>\n";
	echo "<th colspan='3'><div align='center'>Out</div></th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($holidays as $row){
 
  echo "<tr valign='top'>\n";
 echo    "<td>$row->status</td>";
 echo    "<td>$row->date</div></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>

