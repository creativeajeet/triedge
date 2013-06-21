
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
	
	#pending{
	color: #0000FF;
	}
	
	#approve{
	color: #006633;
	}
	#disapprove{
	color: #FF0000;
	}

	</style>


<h2>All New Positions</h2>

		
<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th width='15%'>Position</th>\n";
	echo "<th width='15%'>Client</th>\n";
	echo "<th width='15%'><div align='center'>Uploaded On<div></th>\n";
	echo "<th width='15%'><div align='center'>Uploaded By<div></th>\n";
	echo "<th width='15%'></th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
  echo "<tr valign='top'>\n";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
 echo    "<td><div align='center'>$row->entered_on</div></td>";
 echo    "<td><div align='center'>$row->entered_by</div></td>";
if(!$row->is_allocated)
   {
echo    "<td>".anchor('pof/admin/editPof/'.$row->pof_id, 'view full details')."</td>";}
else
{
 echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, 'view full details')."</td>";

}
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<p>&nbsp;</p>



