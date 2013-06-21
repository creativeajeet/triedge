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
</style><br/>
<div id="show">
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Unallocated Positions List
								</h3>
							</div>
							</div>


<?php echo form_open('pof/admin/filterbyDate/'); ?>
<table width="100%">
  <tr>
    <td colspan="3" scope="col"><div align="left"><?php print anchor_popup('pof/admin/was','Work Allocation Viewer',array('class'=>'icon_alloc'))?></div></td>
    <td colspan="7" scope="col"><div align="left"><?php print anchor('usage/admin/posDelivery','Position Delivery')?></div></td>
  </tr>
  <tr>
    <td width="7%"><div align="center"><strong>From</strong></div></td>
    <td width="7%"><div align="center">
      <input name="from" type="text" size="10" class="input-medium datepick" />
    </div></td>
    <td width="3%"><div align="center"><strong>To</strong></div></td>
    <td width="7%"><div align="center">
      <input name="to" type="text" size="10" class="input-medium datepick" />
    </div></td>
    <td width="32%"><input type="submit" class="btn btn-primary" name="Submit2" value="Get" /></td>
    <td width="7%"><div align="center"><?php print anchor('pof/admin/admin','All',array('class'=>'icon_pos'))?></div>
   </td>
    <td width="9%"><div align="center"><?php print anchor('pof/admin/allocated','Allocated',array('class'=>'icon_pos'))?></div>
    </td>
    <td width="9%"><div align="center"><?php print anchor('pof/admin/unallocated','Unallocated',array('class'=>'icon_pos','id'=>'current'))?></div></td>
    <td width="10%"><div align="center"><?php print anchor('pof/admin/allActive','All Active',array('class'=>'icon_pos'))?></div></td>
    <td width="9%"><div align="center"><?php print anchor('pof/admin/not_pursuing','Not Pursuing',array('class'=>'icon_pos'))?></div></td>
  </tr>
</table>
<?php echo form_close(); ?>
<?php $page = $this->uri->segment(3); ?>
<?php echo form_open('pof/admin/'.$page); ?>
<table width="100%">
  <tr>
    <th scope="col">Sort </th>
    <th scope="col"><select name="column_name_pof" style="width:150px">
	<option value="jobtitle">Job Title</option>
      <option value="comp">Company</option>
	  <option value="location">Location</option>
	  <option value="grade">Grade</option>
	  <option value="sal_t">Salary</option>
	  <option value="consuls">Consultant</option>
    </select>
    </th>
    <th scope="col">in Order </th>
    <th scope="col"><select name="order_pof" style="width:150px">
      <option value="ASC">Ascending</option>
	   <option value="DESC">Descending</option>
    </select></th>
    <th scope="col"><input type="submit" class="btn btn-primary" name="Submit" value="Sort" /></th>
  </tr>
</table>
<?php echo form_close(); ?>
<?php
 if (count($results)){ 
 echo "<table>\n";
 echo form_open('pof/admin/filterposunalloc/');
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	 echo "<th></th>\n";
	   echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th><input type='text' name='jobtitle' size='20' value='".$jobtitle."'/></th>\n";
				echo "<th>".form_dropdown('company',array(''=>'')+$companyF,set_value('company',$company),"style='width:135px;'")."</th>\n";
		echo "<th></th>\n";
	echo "<th>".form_dropdown('location',array(''=>'')+$locationF,set_value('location',$location),"style='width:80px;'")."</th>\n";
		echo "<th><input type='text' name='grade' size='4'/></th>\n";
		echo "<th><input type='text' name='salary' size='4'/></th>\n";
		$array = array(''=>'','wip_urgent'=>'WIP Urgent','wip_active'=>'WIP Active','wip_hold'=>'WIP Hold','client_hold'=>'Client Hold','mirus_drop'=>'Mirus Drop','client_drop'=>'Client Drop','lost_compt'=>'Lost Competition','lost_int'=>'Lost Internal','closed'=>'Closed');
 echo    "<th>".form_dropdown('posstatus',$array)."</th>";
		
		echo "<th></th>\n";
		echo "<th></th>\n";
		
		echo "<th><input type='submit' name='Submit' value='Filter' /></th>\n";
		
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n";
		echo form_close();
		echo form_open('pof/admin/changeStatus/'.$page);
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>P. Focus</th>\n";
	echo "<th></th>\n";
	echo "<th>POF No.</th>\n";
    echo "<th>Date of Receipt</th>\n";
	echo "<th>Allocation Pending(days)</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Client</th>\n";
		echo "<th>No. of Pos</th>\n";
		echo "<th>Location</th>\n";
		echo "<th>Grade</th>\n";
		echo "<th>Max. Salary</th>\n";
		echo "<th>Pos Status</th>\n";
		echo "<th>Consultant</th>\n";
		echo "<th>JD</th>\n";
		echo "<th></th>\n";
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>".form_checkbox('c_id[]',$row->pof_id,FALSE)."</td>";
 if(!$row->is_allocated)
   {
echo    "<td>".anchor('pof/admin/editPof/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";}
else
{
 echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";

}

 echo    "<td>$row->pof_no</td>";
 echo    "<td><div align='center'>$row->pos_taken_on</div></td>";
 $date1 = strtotime($row->pos_taken_on);
 $date = date('Y-m-d');
 $date2 = strtotime($date);
 $days_between = ceil(abs($date2 - $date1) / 86400);
  if(!$row->is_allocated)
   {
echo    "<td><div align='center'>".$days_between ."</div></td>";
}
else
{
 echo    "<td></td>";
}
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->compa</td>";
 echo    "<td>$row->no_of_pos</td>";
echo    "<td>$row->loca</td>";
 echo    "<td>$row->grade</td>";
 echo    "<td>$row->sal_t</td>";
 $array = array(''=>'','wip_urgent'=>'WIP Urgent','wip_active'=>'WIP Active','wip_hold'=>'WIP Hold','mirus_drop'=>'Mirus Drop','client_drop'=>'Client Drop','lost_compt'=>'Lost Competition','lost_int'=>'Lost Internal','closed'=>'Closed');
 echo    "<td>".form_hidden("pof_id[]",$row->pof_id).form_dropdown('pos_status[]',$array, set_value('pos_status',$row->pos_status))."</td>";
 echo    "<td>$row->consuls</td>";
 
$atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$row->file_to_view)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('pof/admin/viewJD/'.$row->pof_id, img($cv_image), $atts)."</div></td>";
  } 
 
 if($user['group']==2)
 {
 
  echo "<td><div align='center'>".anchor_popup('pof/admin/allocation/'.$row->pof_id.'/', 'Allocate', $atts)."</div></td>";
  
 
  }
  else{
   echo  "<td></td>";
  }
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
