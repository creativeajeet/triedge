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
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Position Delivery - <?php echo $user['username']; ?>
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
echo "<th width='2%'></th>\n";
echo "<th width='5%'>Pof No.</th>\n";
echo "<th width='10%'>Position </th>\n";
echo "<th width='7%'>Client </th>\n";
echo "<th width='5%'><div align='center'>Consultants</div></th>\n";
echo "<th colspan='7'><div align='center'>CVSent</div</th>\n";
echo  "<th><div align='center'>Total CVSent</div</th>\n";
echo  "<th><div align='center'></div</th></tr>\n";
echo "<tr>\n";
echo "<th width='2%'></th>\n";
echo "<th width='5%'></th>\n";
echo "<th width='10%'></th>\n";
echo "<th width='7%'></th>\n";
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
echo    "<td>".anchor('pof/admin/posPage/'.$row->posi, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";
 echo "<td><b>".$row->pof_no."<b></td>";
  echo "<td><b>".$row->jobtitle."<b></td>";
    echo "<td><b>".$row->parentname."<b></td>";
 echo "<td><div align='center'>".anchor('usage/admin/poscons/'.$row->posi,$row->countt,array('target'=>'_blank'))."</div></td>";
 echo "<td><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count1)."</div></td>";
	  echo "<td><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count2)."</div></td>";
	   echo "<td><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count3)."</div></td>";
	    echo "<td><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count4)."</div></td>";
		 echo "<td><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count5)."</div></td>";
		  echo "<td><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count6)."</div></td>";
		   echo "<td><div align='center'>".anchor('usage/admin/noWork/'.$row->id,$row->count7)."</div></td>";
		   $totalcvsent = (($row->totalcvsent1)+($row->totalcvsent2)+($row->totalcvsent3)+($row->totalcvsent4));
  echo "<td><div align='center'><b>".anchor('usage/admin/noWork/'.$row->id,$totalcvsent)."</b></div></td>";
  $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
$scribble_image = "http://software.triedge.in/assets/icons/scribble.png";
   echo    "<td><div align='center'>".anchor_popup('pof/admin/scribble/'.$row->posi.'/', img($scribble_image), $atts)."</div></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>

