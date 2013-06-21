<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	#data table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	#data tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
	#data th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	#data td, #data th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}
	</style>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
</head>

<body>
<br/>
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#pane1" data-toggle="tab">Candidates at Offer Stage</a></li>
    <li><a href="#pane2" data-toggle="tab">Positions at Offer Stage</a></li>
	 <li><a href="#pane3" data-toggle="tab">Postions Targeted for Closure</a></li>
    <li><a href="#pane4" data-toggle="tab">Position Focus List</a></li>
   </ul>
   
  <div class="tab-content">
    <div id="pane1" class="tab-pane active">

<h2>Candidates at Offer Stage </h2> 
<div align="right">
  <div style="margin-right:20px">Total Candidates at offer Stage::</div>
  <div style="color:#FF0000; margin-top:-18px; font-size:14px"><b><?php echo $total; ?></b></div></div>
  <div align="left" style="margin-top:-15px;"><div align="left"><?php echo anchor('pof/admin/getCandFinalRound', '<span id="updated">Candidates at Final Round Stage</span>'); ?><div align="left" style="margin-left:250px; margin-top:-18px;"><?php echo anchor('pof/admin/CandClosed', '<span id="notupdated">Closed</span>'); ?></div><div align="left" style="margin-left:315px; margin-top:-18px;"><?php echo anchor('pof/admin/CandJ', '<span>Joined</span>'); ?></div></div></div>
<div id="show">
<?php
 if (count($results)){ 
 echo "<table id='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
		echo "<th><div align='center'>Name</div></th>\n";
		echo "<th><div align='center'>Current Co.</div></th>\n";
		echo "<th><div align='center'>Designation</div></th>\n";
		echo "<th><div align='center'>Current Loc.</div></th>\n";
		echo "<th>Pos. Taken On</th>\n";
		echo "<th><div align='center'>Pos. Name</div></th>\n";
		echo "<th><div align='center'>Client</div></th>\n";
		echo "<th><div align='center'>Consultant</div></th>\n";
		echo "<th>CV Sent On</th>\n";
		
		echo "<th><div align='center'>CV</div></th>\n";
		echo "<th><div align='center'></div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>".form_checkbox('c_id[]',$row->cand_id,FALSE)."</td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->cand_id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->designation</td>";
  echo    "<td>$row->current_location</td>";
 echo    "<td>$row->pos_taken_on</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
 echo    "<td>$row->username</td>";
  echo    "<td>$row->date</td>";

$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$row->filepath)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/viewcv/'.$row->id, img($cv_image), $atts)."</div></td>";
  } 
  echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pos.png'))."</td>";
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

 </div>
 </div>
  <div id="pane2" class="tab-pane">

 </div>
  <div id="pane3" class="tab-pane">
<div id="show"> 
  <?php
 if (count($resultsclosure)){ 
 echo "<table id='data'>\n";
	
	echo "<thead>\n";
	echo "<tr>\n";
	 echo "<th></th>\n";
	echo "<th>POF No.</th>\n";
   		echo "<th>Position Name</th>\n";
		echo "<th>Client</th>\n";
		echo "<th>Location</th>\n";
		echo "<th>Consultant</th>\n";
		echo "<th>P. Focus</th>\n";
		echo "<th>Marked for Closure</th>\n";
		echo "<th>Date of Alloc.</th>\n";
		echo "<th>Pos DB</th>\n";
		echo "<th>CV Sent</th>\n";
		echo "<th>CV SL</th>\n";
		echo "<th>CV Reject</th>\n";
		echo "<th>Last CV Sent On</th>\n";
		echo "<th>Pos Status</th>\n";
		echo "<th></th>\n";
		
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($resultsclosure as $row){
 if(($row->focus)==1)
 {
echo "<tr valign='top' bgcolor='#66FF99'>\n";
}
else
{
echo "<tr>\n";

}
  echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'),array('target'=>'_blank'))."</td>";
 echo    "<td>$row->pof_no</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->compa</td>";
  echo    "<td>$row->loca</td>";
  echo    "<td>$row->consuls</td>";
  echo    "<td><input class='case' name='focus[]' value='".$row->pof_id."' type='checkbox'";
  if(($row->focus)==1){ echo 'checked="checked"'; }
  echo "></td>";

  echo    "<td><input class='case' name='closure[]' value='".$row->pof_id."' type='checkbox'";
  if(($row->closure)==1){ echo 'checked="checked"'; }
  echo "></td>";
 echo    "<td><div align='center'>$row->fad</div></div></td>";
 $pre = $row->sum6+$row->sum7+$row->sum8+$row->sum9+$row->sum10+$row->sum11+$row->sum12+$row->sum13;
echo    "<td><div align='center'>".$row->count2."</div></td>";
  echo    "<td><div align='center'>".$pre."</div></td>";
   echo    "<td><div align='center'>$row->sum9</div></td>";
 echo    "<td><div align='center'>$row->sum7</div></td>";
  echo    "<td><div align='center'>$row->cvsenton</div></td>";
 $array = array(''=>'','wip_urgent'=>'WIP Urgent','wip_active'=>'WIP Active','wip_hold'=>'WIP Hold','client_hold'=>'Client Hold','mirus_drop'=>'Mirus Drop','client_drop'=>'Client Drop','lost_compt'=>'Lost Competition','lost_int'=>'Lost Internal','closed'=>'Closed');
 echo    "<td>".form_hidden("pof_id[]",$row->pof_id).form_dropdown('pos_status[]',$array, set_value('pos_status',$row->pos_status))."</td>";

 $atts = array(
              'width'      => '800',
              'height'     => '500',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
$scribble_image = "http://software.triedge.in/assets/icons/scribble.png";
 
  echo    "<td><div align='center'>".anchor_popup('pof/admin/scribble/'.$row->pof_id.'/', img($scribble_image), $atts)."</div></td>";
 
  
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <h2></h2>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $totalclosure; ?></b></p>

 <?php echo $clinks; ?>
 </div>

 </div>
 <div id="pane4" class="tab-pane">
 
 <div id="show"> 
  <?php
 if (count($resultsfocus)){ 
 echo "<table id='data'>\n";
	
	echo "<thead>\n";
	echo "<tr>\n";
	 echo "<th></th>\n";
	echo "<th>POF No.</th>\n";
   		echo "<th>Position Name</th>\n";
		echo "<th>Client</th>\n";
		echo "<th>Location</th>\n";
		echo "<th>Consultant</th>\n";
		echo "<th>P. Focus</th>\n";
		echo "<th>Marked for Closure</th>\n";
		echo "<th>Date of Alloc.</th>\n";
		echo "<th>Pos DB</th>\n";
		echo "<th>CV Sent</th>\n";
		echo "<th>CV SL</th>\n";
		echo "<th>CV Reject</th>\n";
		echo "<th>Last CV Sent On</th>\n";
		echo "<th>Pos Status</th>\n";
		echo "<th></th>\n";
		
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($resultsfocus as $row){
 if(($row->focus)==1)
 {
echo "<tr valign='top' bgcolor='#66FF99'>\n";
}
else
{
echo "<tr>\n";

}
  echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'),array('target'=>'_blank'))."</td>";
 echo    "<td>$row->pof_no</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->compa</td>";
  echo    "<td>$row->loca</td>";
  echo    "<td>$row->consuls</td>";
  echo    "<td><input class='case' name='focus[]' value='".$row->pof_id."' type='checkbox'";
  if(($row->focus)==1){ echo 'checked="checked"'; }
  echo "></td>";

  echo    "<td><input class='case' name='closure[]' value='".$row->pof_id."' type='checkbox'";
  if(($row->closure)==1){ echo 'checked="checked"'; }
  echo "></td>";
 echo    "<td><div align='center'>$row->fad</div></div></td>";
 $pre = $row->sum6+$row->sum7+$row->sum8+$row->sum9+$row->sum10+$row->sum11+$row->sum12+$row->sum13;
echo    "<td><div align='center'>".$row->count2."</div></td>";
  echo    "<td><div align='center'>".$pre."</div></td>";
   echo    "<td><div align='center'>$row->sum9</div></td>";
 echo    "<td><div align='center'>$row->sum7</div></td>";
  echo    "<td><div align='center'>$row->cvsenton</div></td>";
 $array = array(''=>'','wip_urgent'=>'WIP Urgent','wip_active'=>'WIP Active','wip_hold'=>'WIP Hold','client_hold'=>'Client Hold','mirus_drop'=>'Mirus Drop','client_drop'=>'Client Drop','lost_compt'=>'Lost Competition','lost_int'=>'Lost Internal','closed'=>'Closed');
 echo    "<td>".form_hidden("pof_id[]",$row->pof_id).form_dropdown('pos_status[]',$array, set_value('pos_status',$row->pos_status))."</td>";

 $atts = array(
              'width'      => '800',
              'height'     => '500',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
$scribble_image = "http://software.triedge.in/assets/icons/scribble.png";
 
  echo    "<td><div align='center'>".anchor_popup('pof/admin/scribble/'.$row->pof_id.'/', img($scribble_image), $atts)."</div></td>";
 
  
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <h2></h2>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $totalclosure; ?></b></p>

 <?php echo $clinks; ?>
 </div>

 </div>
</body>
</html>
