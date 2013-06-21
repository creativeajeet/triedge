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
	tr,td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>
<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Name</th>\n";
		echo "<th>Current Co.</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Email</th>\n";
		echo "<th>Designation</th>\n";
		echo "<th><div align='center'>Telephone</div></th>\n";
		echo "<th>Current Loc.</th>\n";
		echo "<th>Course</th>\n";
	    echo "<th><div align='center'>Passing Year</div></th>\n";
		echo "<th>Institute</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->job_title</td>";
 echo    "<td>$row->email</td>";
 echo    "<td>$row->designation</td>";
 echo    "<td><div align='center'>$row->telephone</div></td>";
 echo    "<td>$row->current_location</td>";
 echo    "<td>$row->course</td>";
 echo    "<td><div align='center'>$row->year_of_passing</div></td>";
 echo    "<td>$row->institute</td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>

 <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=mirus.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


