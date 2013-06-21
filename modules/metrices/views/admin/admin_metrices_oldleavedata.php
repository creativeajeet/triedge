
	<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
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


<h2>Old leave Data</h2>
<?php echo anchor('metrices/admin/enteroldleave','Enter Old Leave Data'); ?>
<br/>
<?php if (count($oldleavedata)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Quarter</th>\n";
	echo "<th></th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($oldleavedata as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td><b>Month ".$row->month."</b> - <b>Quarter ".$row->quarter."</b>  - Year ".$row->year."</td>";
  echo "<td>".anchor('metrices/admin/editLeaves/'.$row->quarter,'edit')."</td>";
   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 ?>
