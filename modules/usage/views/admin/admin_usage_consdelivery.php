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
	#red
	{
	color: #FF0000;
	}
#blue
	{
	color: #009900;
	font-size: 24px;
	font-weight: bold;
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
		
		$day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
?>

<?php if (count($results)){ 
echo "<table>\n";
echo "<thead>\n";
echo "<tr>\n";
echo "<th scope='col' width='10%'>Consultant </th>\n";
echo "<th scope='col' width='5%'><div align='center'>No. of Open Pos.</div></th>\n";
echo "<th scope='col' width='5%'><div align='center'>No. of Active Pos.</div></th>\n";
echo "<th scope='col' colspan='7'><div align='center'>CVSent</div</th>\n";
echo  "<th scope='col'><div align='center'><p>CVsent</p><p>This Week</p></div</th>\n";
echo  "<th scope='col'><div align='center'><p>CVsent</p><p>Last Week</p></div</th>\n";
echo  "<th scope='col'><div align='center'><p>CVsent</p><p>Last Month</p></div</th></tr>\n";
echo "<tr>\n";
echo "<th width='10%'></th>\n";
echo "<th width='5%'><div align='center'></div></th>\n";
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
echo  "<th><div align='center'></div</th>\n";
echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
     echo "<td scope='col'><b>".$row->username."<b></td>\n";
    echo "<td scope='col'><div align='center'>".anchor('usage/admin/conspos/'.$row->id,$row->countt,array('target'=>'_blank'))."</div></td>\n";
	echo "<td scope='col'><div align='center'>".anchor('usage/admin/consposactive/'.$row->id,$row->allurgent+$row->allactive,array('target'=>'_blank'))."</div></td>\n";
	if($row->count1==0)
	  {
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date.'/'.$row->id,'<span id="red">'.$row->count1.'</span>',array('target'=>'_blank'))."</div></td>\n";
	 }
	 else{
	 echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date.'/'.$row->id,'<span id="blue">'.$row->count1.'</span>',array('target'=>'_blank'))."</div></td>\n";
	 }
	 if($row->count2==0)
	 {
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date1.'/'.$row->id,'<span id="red">'.$row->count2.'</span>',array('target'=>'_blank'))."</div></td>\n";
	 }
	 else{
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date1.'/'.$row->id,'<span id="blue">'.$row->count2.'</span>',array('target'=>'_blank'))."</div></td>\n";
	  }
	  if($row->count3==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date2.'/'.$row->id,'<span id="red">'.$row->count3.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date2.'/'.$row->id,'<span id="blue">'.$row->count3.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   
	   if($row->count4==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date3.'/'.$row->id,'<span id="red">'.$row->count4.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date3.'/'.$row->id,'<span id="blue">'.$row->count4.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   if($row->count5==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date4.'/'.$row->id,'<span id="red">'.$row->count5.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date4.'/'.$row->id,'<span id="blue">'.$row->count5.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   if($row->count6==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date5.'/'.$row->id,'<span id="red">'.$row->count6.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date5.'/'.$row->id,'<span id="blue">'.$row->count6.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   if($row->count7==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date6.'/'.$row->id,'<span id="red">'.$row->count7.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date6.'/'.$row->id,'<span id="blue">'.$row->count7.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   
		   $thisweek = $row->count1+$row->count2+$row->count3+$row->count4+$row->count5+$row->count6+$row->count7;
   echo "<td scope='col'><div align='center'><b>".anchor('usage/admin/thisweek/'.$date6.'/'.$date.'/'.$row->id,'<span id="blue">'.$thisweek.'</span>',array('target'=>'_blank'))."<b></div></td>\n";
  echo "<td scope='col'><div align='center'><b>".anchor('usage/admin/thisweek/'.$from.'/'.$to.'/'.$row->id,'<span id="blue">'.$row->countlast.'</span>',array('target'=>'_blank'))."<b></div></td>\n";
    echo "<td scope='col'><div align='center'><b><b></div></td>\n";
  echo  "</tr>";
 }
 echo "</tbody><thead>\n";

echo "<tr>\n";
echo "<th scope='col'><div align='center'>Total</div></th>\n";
echo "<th width='5%'><div align='center'></div></th>\n";
echo "<th width='5%'><div align='center'></div></th>\n";
echo  "<th scope='col'><div align='center'>".$t."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$t1."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$t2."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$t3."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$t4."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$t5."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$t6."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$thisweeksent."</div></th>\n";
echo  "<th scope='col'><div align='center'>".$lastweeksent."</div></th>\n";
echo  "<th><div align='center'></div</th>\n";
echo "</tr>\n";


 echo "</thead>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>

