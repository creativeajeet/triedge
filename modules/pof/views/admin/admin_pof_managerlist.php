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

	</style><br/>
<div id="show">
<h2>Manager's List</h2><p align="right"><?php print anchor('pof/admin/managerlist',"Manager's List",array('class'=>'icon_group'))?></p><div align="left"><?php print anchor_popup('pof/admin/was','Work Allocation Viewer',array('class'=>'icon_alloc'))?></div><div align="right" style="margin-bottom:20px;"><?php print anchor('pof/admin/not_pursuing','Not Pursuing',array('class'=>'icon_pos'))?><div align="right" style="margin-right:130px; margin-top:-20px;"><?php print anchor('pof/admin/unallocated','Unallocated',array('class'=>'icon_pos'))?><div align="right" style="margin-right:130px; margin-top:-20px;"><?php print anchor('pof/admin/allocated','Allocated',array('class'=>'icon_pos'))?><div align="right" style="margin-right:130px; margin-top:-18px;"><?php print anchor('pof/admin/admin','All',array('class'=>'icon_pos'))?></div></div></div></div>

<?php $page = $this->uri->segment(3); ?>
<?php echo form_open('pof/admin/sortmanagerlist/'); ?>
<table width="100%">
  <tr>
    <th scope="col">Sort </th>
    <th scope="col"><select name="column_name" style="width:150px">
	<option value="jobtitle">Job Title</option>
      <option value="comp">Company</option>
	  <option value="location">Location</option>
	  <option value="grade">Grade</option>
	  <option value="sal_t">Salary</option>
	  <option value="consuls">Consultant</option>
    </select>
    </th>
    <th scope="col">in Order </th>
    <th scope="col"><select name="order" style="width:150px">
      <option value="ASC">Ascending</option>
	   <option value="DESC">Descending</option>
    </select></th>
    <th scope="col"><input type="submit" class="btn btn-primary" name="Submit" value="Sort" /></th>
  </tr>
</table>
<?php
 if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	echo "<th>Discussed On</th>\n";
	echo "<th>POF No.</th>\n";
    echo "<th>Date of Receipt</th>\n";
	echo "<th>Days since Allocation</th>\n";
	echo "<th>End Date</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Company</th>\n";
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
 
 if(($row->talked_on)==date('Y-m-d'))
  {
   echo "<tr valign='top' bgcolor='#FFFFCC'>\n";
  }
  else{
 if(($row->manager)==19)
 {
echo "<tr valign='top' bgcolor='#FFCCCC'>\n";
}
elseif(($row->manager)==37)
 {
echo "<tr valign='top' bgcolor='#66FF99'>\n";
}
else
{
echo "<tr valign='top' bgcolor='#eee'>\n";

}
}
 echo    "<td><input name='manager' type='hidden' value=".$this->session->userdata('id')."/><input id='pof_id' name='pof_id' value='".$row->pof_id."' type='checkbox' onclick='document.forms[0].submit()' /></td>";
 if(!$row->is_allocated)
   {
echo    "<td>".anchor('pof/admin/editPof/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";}
else
{
 echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";

}
 if(($row->talked_on)==date('Y-m-d'))
   {
    echo    "<td>Discussed today</td>";
   }
  elseif(($row->talked_on)=='0000-00-00')
   {
    echo    "<td>Not Discussed</td>";
   }
   else{
     $datetalk = strtotime($row->talked_on);
 $datetoday = date('Y-m-d');
 $datef = strtotime($datetoday);
 $days_between_talk = ceil(abs($datef - $datetalk) / 86400);
 echo    "<td><div align='center'>".$days_between_talk ." days ago</div></td>";

   }

 echo    "<td>$row->pof_no</td>";
 echo    "<td>$row->pos_taken_on</td>";
  $date1 = strtotime($row->fad);
 $date = date('Y-m-d');
 $date2 = strtotime($date);
 $days_between = ceil(abs($date2 - $date1) / 86400);
 
echo    "<td><div align='center'>".$days_between ."</div></td>";
echo    "<td>$row->end_date</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
 echo    "<td>$row->no_of_pos</td>";
 echo    "<td>$row->segment_name</td>";
 echo    "<td>$row->grade</td>";
 echo    "<td>$row->sal_t</td>";
 echo    "<td></td>";
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
 if(!$row->is_allocated)
 {
  echo "<td><div align='center'>".anchor_popup('pof/admin/allocation/'.$row->pof_id.'/', 'Allocate', $atts)."</div></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('pof/admin/re_allocation/'.$row->pof_id.'/', 'Re-allocate', $atts)."</div></td>";
  }
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

