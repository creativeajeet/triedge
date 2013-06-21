<script language="JavaScript">
<!--
function refreshParent() {
  window.opener.location.href = window.opener.location.href;

  if (window.opener.progressWindow)
		
 {
    window.opener.progressWindow.close()
  }
  window.close();
}
//-->
</script>
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
<?php $worksheet = $this->uri->segment(4); ?>	

	<?php print form_open('candidates/admin/countlocationwisefilter/'.$worksheet);?>
	<table width="100%" border="1">
   <tr>
     <td width="51%"><input name="currentlocation" id="companyid" type="text" size="10" style="background:#CCCCCC" /></td>
     <td width="49%"><input type="submit" class="btn btn-primary" name="submit" value="Filter" /></td>
   </tr>
 </table>
	<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Location</th>\n";
		echo "<th><div align='center'>Total in Worksheet</div></th>\n";
		
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
 echo    "<td>$row->current_location</td>";
 echo    "<td><div align='center'>".anchor_popup('candidates/admin/openwlw/'.$worksheet.'/'.$row->current_location,$row->cnt1,array())."</div></td>";
 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <h2></h2>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>
 <?php echo $links; ?>