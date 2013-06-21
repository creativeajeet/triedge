
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


<h2>All Leave Applications</h2>

		
<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th width='15%'>Name</th>\n";
	echo "<th width='15%'><div align='center'>Leaves<div></th>\n";
	echo "<th width='15%'><div align='center'>Applied On<div></th>\n";
	echo "<th width='15%'><div align='center'>Status<div></th>\n";
	echo "<th width='15%'></th>\n";
	echo "<th width='15%'></th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
  echo "<tr valign='top'>\n";
 echo    "<td><input type='hidden' name='user' value='$row->id'>$row->username</td>";
 echo    "<td><div align='center'><b>From</b> $row->l_from <b>To</b> $row->l_to</div></td>";
 echo    "<td><div align='center'>$row->applied_on</div></td>";
 $atts = array(
              'width'      => '750',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
  if($row->is_pending==1)
    {
	 echo    "<td><div align='center' id='pending'>Pending</div></td>";
	 echo    "<td><div align='center'>".anchor_popup('metrices/admin/fulldetails/'.$row->emp.'/'.$row->leave_id, 'view full details',$atts)."</div></td>";
	}
   elseif($row->is_approve==1)
    {
	  echo    "<td><div align='center' id='approve'>Approved</div></td>";
	  echo    "<td></td>";
	}
  elseif($row->is_approve==0)
    {
	  echo    "<td><div align='center' id='disapprove'>Denied</div></td>";
	  echo    "<td></td>";
	}
 echo    "<td></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<p>&nbsp;</p>



