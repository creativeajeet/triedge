	<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
		border-collapse: collapse; 
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
<div id="show">
<?php
 if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Consultant Name</th>\n";
		echo "<th>Submitted On</th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
 echo    "<td><strong>$row->username</strong></td>";
 if($row->submit==0)
   {
 echo    "<td><span style='color:#FF0000'>Not submitted yet.</span></td>";
 }
 else
 {
  echo    "<td>$row->date</td>";
 }
 if($row->submit==0)
   {
 echo    "<td><strong>NA</strong></td>";
 }
 else
 {
  echo    "<td>".anchor('pof/admin/viewAppraisal/'.$row->cons_name, 'View')."</td>";
 }


  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 </div>