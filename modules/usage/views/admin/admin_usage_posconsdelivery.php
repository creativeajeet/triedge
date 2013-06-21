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

	</style>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Consultants Delivery
								</h3>
							</div>
							</div>
<?php 
$date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		
		$day = date('D');
		$day1 = date('D',strtotime('-1 days'));
		$day2 = date('D',strtotime('-2 days'));
		$day3 = date('D',strtotime('-3 days'));
		$day4 = date('D',strtotime('-4 days'));
		$day5 = date('D',strtotime('-5 days'));
		$day6 = date('D',strtotime('-6 days'));
?>

<?php if (count($results)){ 
echo "<table>\n";
echo "<thead>\n";
echo "<tr>\n";
echo "<th scope='col' width='10%'>Consultant </th>\n";
echo "<th scope='col' width='5%'><div align='center'>No. of Open Pos.</div></th>\n";
echo "<th scope='col' colspan='7'><div align='center'>CVSent</div</th>\n";
echo  "<th scope='col'><div align='center'>Avg. Week</div</th>\n";
echo  "<th scope='col'><div align='center'>Avg. Month</div</th></tr>\n";
echo "<tr>\n";
echo "<th width='10%'></th>\n";
echo "<th width='5%'><div align='center'></div></th>\n";
echo "<th><div align='center'><p>T</p><p>".$date."</p><p>".$day."</p></div</th>\n";
echo "<th><div align='center'><p>T-1</p><p>".$date1."</p><p>".$day1."</p></div</th>\n";
echo  "<th><div align='center'><p>T-2</p><p>".$date2."</p><p>".$day2."</p></div</th>\n";
echo  "<th><div align='center'><p>T-3</p><p>".$date3."</p><p>".$day3."</p></div</th>\n";
echo  "<th><div align='center'><p>T-4</p><p>".$date4."</p><p>".$day4."</p></div</th>\n";
echo  "<th><div align='center'><p>T-5</p><p>".$date5."</p><p>".$day5."</p></div</th>\n";
echo  "<th><div align='center'><p>T-6</p><p>".$date6."</p><p>".$day6."</p></div</th>\n";
echo  "<th><div align='center'></div</th>\n";
echo  "<th><div align='center'></div</th>\n";
echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
     echo "<td scope='col'><b>".$row->username."<b></td>\n";
    echo "<td scope='col'><div align='center'>".anchor('usage/admin/conspos/'.$row->id,$row->countt)."</div></td>\n";
	 echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count1)."</div></td>\n";
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count2)."</div></td>\n";
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count3)."</div></td>\n";
	    echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count4)."</div></td>\n";
		 echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count5)."</div></td>\n";
		  echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count6)."</div></td>\n";
		   echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count7)."</div></td>\n";
   echo "<td scope='col'><div align='center'><b><b></div></td>\n";
   echo "<td scope='col'><div align='center'><b><b></div></td>\n";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>

