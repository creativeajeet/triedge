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
	<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Position</th>\n";
		echo "<th><div align='center'></div></th>\n";
		
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td><div align='center'>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'),array('target'=>'_blank'))."</div></td>";
 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <h2></h2>
 <?php echo $links; ?>