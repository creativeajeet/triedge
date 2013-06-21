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

	<?php if (count($alltags)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Tags</th>\n";
		echo "<th><div align='center'>In Worksheet</div></th>\n";
		echo "<th><div align='center'>In Pos</div></th>\n";
		echo "<th><div align='center'>In cand</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($alltags as $row){
 
echo "<tr valign='top'>\n";
 echo    "<td>$row->tag_name</td>";
 echo    "<td><div align='center'>".anchor_popup('candidates/admin/openwcw/',$row->worksheet,'')."</div></td>";
 echo    "<td><div align='center'>".anchor_popup('candidates/admin/openwcw/',$row->position,'')."</div></td>";
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/openwcw/',$row->candidate,'')."</div></td>";

  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <h2></h2>
 <?php echo $alllinks; ?>