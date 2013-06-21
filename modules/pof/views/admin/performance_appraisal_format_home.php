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
	<div align="left" style="color:#FFFFFF; font-size:18px"><?php echo anchor('pof/admin/appraisal/', 'New Entry'); ?></div>
	<table width="100%">
  
  
  <tr>
    <td><?php
 if (count($results)){ 
 echo "<table>\n";
echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Performance Appraisal for the period </th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($results as $row){
	 echo "<tr>\n";
	 $link = $row->app_period;
	 if($row->submit==1)
	  {
	 echo    "<td><b>$row->cons_name</b> - $row->app_period ".anchor('pof/admin/editAppraisalDraft/'.$row->id, 'Re-submit')."</td>";
	 }
	 else{
	 echo    "<td><b>$row->cons_name</b> - $row->app_period ".anchor('pof/admin/editAppraisal/'.$row->id, 'Open Draft')."</td>";
	 }
	  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?></td>
  </tr>
</table>
