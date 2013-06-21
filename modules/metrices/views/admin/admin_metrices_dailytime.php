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
<?php echo form_open('metrices/admin/dailyHours'); ?>
<div><b>Date :</b><input name='date' type='text' size='15' class='input-medium datepick' /></div>
<br/>
<?php if (count($users)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th width='50%'>Name</th>\n";
	echo "<th colspan='3'><div align='center'>In</div></th>\n";
	echo "<th colspan='3'><div align='center'>Out</div></th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($users as $row){
 
  echo "<tr valign='top'>\n";
 echo    "<td><input type='hidden' name='user[]' value='$row->id'>$row->username</td>";
 echo    "<td><div align='center'><input name='inhour[]' type='text' size='5' /></div></td>";
   echo    "<td><div align='center'><b>:</b></div></td>";
   echo    "<td><div align='center'><input name='inmin[]' type='text' size='5'/></div></td>";
 echo    "<td><div align='center'><input name='outhour[]' type='text' size='5'/></div></td>";
 echo    "<td><div align='center'><b>:</b></div></td>";
  echo    "<td><div align='center'><input name='outmin[]' type='text' size='5'/></div></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<p>&nbsp;</p>
<div align="right"><input name='submit' type='submit' value='Enter'/></div>

