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
	<style type="text/css">
<!--
#news
{
	padding-bottom: 10px;
	
}

.newslink {
	color: #FFFFFF;
	text-decoration: none;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	padding-left: 5px;
}
.newslink:hover {
	color: #FFFFFF;
	text-decoration: none;
}
.newsby {
	color: #CC6633;
	text-decoration: none;
	padding-right: 10px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
}

.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	background-color: #006666;
	color: #FFFFFF;
}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
#current{
	color: #CC0000;
	font-size:24px
	
}
#allocate{
	color: #0000FF;
}
#notpursue{
	color: #FF6600;
}
#reallocate{
	color: #006600;
}
-->
</style>


<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Position Delivery
								</h3>
							</div>
							</div>
<div align="right"><?php echo anchor('usage/admin/posDeliveryDaily','Daily Position Delivery',array('target'=>'_blank')); ?></div>

<?php
 if (count($results)){ 
 echo "<table>\n";
  echo form_open('pof/admin/filterposdel/');
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	echo "<th>".form_dropdown('companyfilterpos',array('0'=>'')+$companyF,set_value('companyfilterpos',$company),"style='width:135px;'")."</th>\n";
	 echo "<th></th>\n";
	  echo "<th></th>\n";
		echo "<th>".form_dropdown('consul',array(''=>'')+$consulF,set_value('consul',$consul),"style='width:100px;'")."</th>\n";
	echo "<th><input class='case' name='focus' value='1' type='checkbox'></th>\n";
		echo "<th><input class='case' name='closure' value='1' type='checkbox'></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		$array = array(''=>'','wip_urgent'=>'WIP Urgent','wip_active'=>'WIP Active','wip_hold'=>'WIP Hold','client_hold'=>'Client Hold','mirus_drop'=>'Mirus Drop','client_drop'=>'Client Drop','lost_compt'=>'Lost Competition','lost_int'=>'Lost Internal','closed'=>'Closed');
 echo    "<th>".form_dropdown('posstatus',$array, set_value('posstatus',$posstatus))."</th>";
		
		echo "<th><input type='submit' name='Submit' value='Filter' /></th>\n";
		
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n";
		echo form_close();
		$page = $this->uri->segment(3);
		echo form_open('pof/admin/changeStatus/'.$page);	
	echo "<thead>\n";
	echo "<tr>\n";
	 echo "<th></th>\n";
	echo "<th>POF No.</th>\n";
   		echo "<th>Position Name</th>\n";
		echo "<th>Client</th>\n";
		echo "<th>HR Manager</th>\n";
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
 
 foreach ($results as $row){
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
  echo    "<td>$row->candidate_name</td>";
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
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>

 <?php echo $links; ?>

<div align="right">
      <input type="submit" class="btn btn-primary" name="change" value="Save Changes" />
    </div>
	