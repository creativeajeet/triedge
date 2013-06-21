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
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}
	#consol
	{
	font-size: 18px;
	color: #FFFFFF;
	}
	#red
	{
	color: #FF0000;
	}

	</style>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Research Associate Delivery
								</h3>
							</div>
							</div>


<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	    echo "<th><div align='center'></div></th>\n";
		echo "<th>Position</th>\n";
		echo "<th><div align='center'>Databank</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
 echo    "<td><div align='center'></div></td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td><div align='center'>".anchor('pof/admin/posPage/'.$row->pofid,$row->count1,array('target'=>'_blank'))."</div></td>";
   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
