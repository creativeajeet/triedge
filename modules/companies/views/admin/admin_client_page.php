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
	#employee{
	color: white;
	font-weight: bold;
	background-color: #3366CC;
	}
	tr,td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>
	<style type="text/css">
<!--
#cvsent {
	color: #990000;
	font-weight: bold;
}

.tab_container_can {
	border: 1px solid #999;
	border-top: none;
	clear: both;
	float: none;
	width: 100%px;
	font-size:14px;
	color:#243953;
	background-color:#fafafa;
	border: 1px solid #a9a9a9;
	-moz-border-radius: 5px;
    -webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	text-align:left;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	height: 100%;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	padding-top: 2px;
	padding-right: 5px;
	padding-bottom: 2px;
	padding-left: 5px;	
}
-->
</style>
	<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
.data table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
.data tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
.data th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
.data tr, .data td, .data th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>
	

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
			$(document).ready(function(){
				
				//	-- Datepicker
				$(".datepicker").datepicker({
					dateFormat: 'yy-mm-dd',
					showButtonPanel: true
				});					
				
				// -- Clone table rows
				$(".cloneTableRows").live('click', function(){

					// this tables id
					var thisTableId = $(this).parents("table").attr("id");
				
					// lastRow
					var lastRow = $('#'+thisTableId + " tr:last");
					
					// clone last row
					var newRow = lastRow.clone(true);

					// append row to this table
					$('#'+thisTableId).append(newRow);
					
					// make the delete image visible
					$('#'+thisTableId + " tr:last td:first img").css("visibility", "visible");
					
					// clear the inputs (Optional)
					$('#'+thisTableId + " tr:last td :input").val('');
					
					// new rows datepicker need to be re-initialized
					$(newRow).find("input").each(function(){
						if($(this).hasClass("hasDatepicker")){ // if the current input has the hasDatpicker class
							var this_id = $(this).attr("id"); // current inputs id
							var new_id = this_id +1; // a new id
							$(this).attr("id", new_id); // change to new id
							$(this).removeClass('hasDatepicker'); // remove hasDatepicker class
							 // re-init datepicker
							$(this).datepicker({
								dateFormat: 'yy-mm-dd',
								showButtonPanel: true
							});
						}
					});					
					
					return false;
				});
				
				// Delete a table row
				$("img.delRow").click(function(){
					$(this).parents("tr").remove();
					return false;
				});
			
			});
		</script>

<script type="text/javascript">
$(document).ready(function() {
 $(".nextbutton").attr("disabled", "disabled");
    $('.dropdown').change(function() {
        if ($('.dropdown').val() == 393) {
             $(".nextbutton").attr("disabled", "");
        } else {
            $(".nextbutton").attr("disabled", "disabled");
        }
    });

});
</script>


<script>
	$(function() {
		$( "#tab" ).tabs({selected: 0}); 
	});
	</script>
	<script>
	$(function() {
		$( "#tabs" ).tabs(); 
	});
	</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}

-->
</style>
<?php 
	$class = $this->uri->segment(3);
	$compid = $this->uri->segment(4);
	$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
		  ?>
<?php  
$atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('companies/admin/newCandidate/'.$compid, img('http://software.triedge.in/assets/icons/cand.png'), $atts)."</td>";?>
	
	

<div class="tab_container_can">
<?php echo $detail['parentname']; ?> <br/>
<?php echo $detail['parentname']; ?> <br/>
<?php echo $detail['parentname']; ?> <br/>

</div>
<div id="tab">
<ul>
		<li><a href="#tab-1">Company Info</a></li>
		<li><a href="#tab-2">Employee DB</a></li>
		<li><a href="#tab-3">HR DB</a></li>
		<li><a href="#tab-4">Client Transaction</a></li>
		<li><a href="#tab-5">Client Terms</a></li>
</ul>
	<div id="tab-1">
	  <h2>Company Info</h2>
<?php print form_open('companies/admin/entercompany/'.$compid);?>
	   <?php $grid = array(
              'width'      => '700',
              'height'     => '300',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
			?>
	  <table width="764" border="1" bordercolor="#ECE9D8">

  <tr>
    <td width="125" height="38">Company/Institute Name </td>
    <td colspan="8"><?php echo form_dropdown('client_id', array('0' => '')+$clients, set_value('client_id', $compid), "style='width:250px;  background-color:#CCCCCC'"); ?></td>
    <td width="145">Organisation Type</td>
    <td colspan="2"><?php echo form_dropdown('comptype', array(''=>'')+$comptype,set_value('comptype', $compdetail['comptype']), "style='width:150px;  background-color:#CCCCCC'"); ?></td>
    </tr>
  <tr>
    <td height="37">Relationship Type</td>
    <td colspan="3">
   
 <?php echo form_dropdown('client', array('0'=>'')+$relationtype,set_value('client', $compdetail['is_client']), "style='width:150px;  background-color:#CCCCCC'"); ?> </td>
    <td colspan="2">Agreement With </td>
    <td colspan="3"><?php echo form_dropdown('agmwith', array(''=>'')+$firm,set_value('agmwith', $compdetail['agmwith']), "style='width:150px;  background-color:#CCCCCC'"); ?></td>
    <td>Target Company </td>
    <td colspan="2"><input type="checkbox" name="checkbox4" value="checkbox" /></td>
  </tr>
  <tr>
    <td height="48">Group Name</td>
    <td colspan="8"><input id="provinsi_id" name="groupname" type="text" size="50" /></td>
    <td>Industry</td>
    <td colspan="2"><?php echo form_dropdown('industry', array(''=>'')+$industry,set_value('industry', $compdetail['industry'])); ?></td>
  </tr>
  <tr>
    <td height="38">Web Link </td>
    <td colspan="8"><input name="weblink" type="text" size="50"/></td>
    <td><input type="submit" class="btn btn-primary" name="Submit34" value="+" disabled="disabled"/></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="38" colspan="9"><h6>Head Office Location </h6> </td>
    <td><?php        echo anchor_popup('companies/admin/addAttachment/'.$compid,'Add Attachment',$grid); ?>  </td>
    <td width="153"></td>
    <td width="235"></td>
  </tr>
  <tr>
    <td height="37">Global</td>
    <td colspan="3"><?php echo form_dropdown('globalloc', array(''=>'')+$location,set_value('globalloc', $compdetail['globalloc']), "style='width:100px;  background-color:#CCCCCC'"); ?></td>
    <td colspan="2">India</td>
    <td colspan="3"><?php echo form_dropdown('indialoc', array(''=>'')+$location,set_value('indialoc', $compdetail['indialoc']), "style='width:100px;  background-color:#CCCCCC'"); ?></td>
    <td colspan="3"><?php foreach ($attachment as $key => $test): ?>
	 <?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			echo $test['filename'].anchor_popup('companies/admin/viewattachment/'.$test['id'], 'view', $atts); ?>   <?php endforeach; ?></td>
    </tr>
 
  
  <tr>
    <td>Synopsis</td>
    <td colspan="11"><textarea name="synopsis" cols="75"></textarea></td>
    </tr>
	<tr>
    <td colspan="9"><h2>Rating Grid</h2>
	 <div align="center" style="margin-top:-40px; margin-bottom:10px;"><?php if($checkrating==FALSE){
		               echo anchor_popup('companies/admin/addRatingGrid/'.$compid,'Rating Grid',$grid);
					   }
					   else{
					   echo anchor_popup('companies/admin/editRatingGrid/'.$compid,'Rating Grid',$grid);
					   } 
					   ?></div>
		<?php if (count($ratinggrid)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Rating</th>\n";
		echo "<th>Narration</th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($ratinggrid as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->rating</td>";
 echo    "<td>$row->narration</td>";
   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No rating found'; 
 } 
 ?></td>
    <td colspan="3"><h2>Grade Structure</h2>
	<div align="center" style="margin-top:-40px; margin-bottom:10px;"><?php if($checkgrade==FALSE){
	                            echo anchor_popup('companies/admin/addGradeStruc/'.$compid,'Grade Structure',$grid);
								}
								else{
								  echo anchor_popup('companies/admin/editGradeStruc/'.$compid,'Grade Structure',$grid);
								}
								 ?></div>
		<?php if (count($gradestruct)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Grade</th>\n";
		echo "<th>Equi. Designation</th>\n";
		echo "<th>Level</th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($gradestruct as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->grade</td>";
   echo    "<td>$row->equi_desig</td>";
 echo    "<td>$row->segment_name</td>";
   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No grade structure found'; 
 } 
 ?></td>
    </tr>
	<tr height="10">
    <td colspan="12" height="10"><h2>Scribbles</h2>
	<?php $scribble_image = "http://software.triedge.in/assets/icons/scribble.png"; ?>
	 <div align="left" style="margin-top:-50px; margin-bottom:10px; margin-left:150px;"><?php echo anchor_popup('companies/admin/addScribble/'.$compid, img($scribble_image), ''); ?>	 </div>
	<div style="height:auto">
	 <?php
 if (count($compcomments)){ 
 echo "<table class='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Scribbles</th>\n";
	
		echo "<th>On</th>\n";
			echo "<th>By</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($compcomments as $row){
 
echo "<tr valign='top'>\n";

 echo    "<td>$row->comment</td>";
 echo    "<td>$row->date</td>";
 echo    "<td>$row->username</td>";
 echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No comments found'; 
 } 
 ?>
 </div>		</td>
    </tr>
  <tr>
     <td colspan="12"><?php print form_hidden('id','')?>
          <div align="right"><div class="buttons">
              <button type="submit" class="btn btn-primary" class="positive" name="submit" value="submit"> <?php print  $this->bep_assets->icon('disk');?> <?php print $this->lang->line('general_save')?> </button>
              </div>
            </div>    </td>
    </tr>
</table>
<?php echo form_close(); ?>
	</div> 
	<div id="tab-2">
	<div align="right">Total Employees found :: <b><?php echo $total; ?></b></div>
        <h2>Employee DB</h2>
		<table width="898">

 
  <tr>
    <td width="242">Column Search </td>
    <td width="350"><select name="heading" id="heading">
	  <option value=1>All</option>
      <option value="worksheet1">Worksheet1</option>
      <option value="worksheet2">Worksheet2</option>
      <option value="candidate_name">Candidate Name</option>
      <option value="telephone">Telephone</option>
      <option value="email">Email ID</option>
      <option value="current_location">Current Location</option>
      <option value="region">Region</option>
      <option value="current_company">Current Company</option>
      <option value="job_title">Job Title</option>
      <option value="department">Department</option>
      <option value="designation">Designation</option>
      <option value="grade">Grade</option>
      <option value="level">Level</option>
      <option value="reports_to">Reports To</option>
      <option value="current_role">Current Role</option>
      <option value="industry">Industry</option>
      <option value="sub_industry">Sub Industry</option>
      <option value="function">Function</option>
      <option value="sub_function">Sub Function</option>
      <option value="previous_company">Previous Company</option>
      <option value="course">Course</option>
      <option value="institute">Institute/University</option>
      <option value="year_of_passing">Year Of Passing</option>
    </select>    </td>
    <td width="266">Keyword</td>
    <td colspan="2"><input name="keyword" type="text" id="keyword" size="60" /></td>
    <td width="68"><div align="right">
      <input name="submit22" type="submit" class="btn btn-primary" id="submit22" value="Search" />
    </div></td>
  </tr>
  </table>
  <h2></h2>
		<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='left'><input id='selectall' type='checkbox'></div></th>\n";
	echo "<th></th>\n";
	echo "<th>Worksheet</th>\n";

		echo "<th>Name</th>\n";
		echo "<th>Current Co.</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Email</th>\n";
		echo "<th>Designation</th>\n";
		echo "<th><div align='center'>Telephone</div></th>\n";
		echo "<th>Current Loc.</th>\n";
		echo "<th>Course</th>\n";
	    echo "<th><div align='center'>Passing Year</div></th>\n";
		echo "<th>Institute</th>\n";
		echo "<th><div align='center'>CV</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td><input class='case' name='c_id[]' value='".$row->id."' type='checkbox'></td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 echo    "<td>$row->worksheet1</td>";
 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->job_title</td>";
 echo    "<td>$row->email</td>";
 echo    "<td>$row->designation</td>";
 echo    "<td><div align='center'>$row->telephone</div></td>";
 echo    "<td>$row->current_location</td>";
 echo    "<td>$row->course</td>";
 echo    "<td><div align='center'>$row->year_of_passing</div></td>";
 echo    "<td>$row->institute</td>";
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
 if(!$row->file_to_view)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/viewcv/'.$row->id, img($cv_image), $atts)."</div></td>";
  } 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>
  <?php echo $links; ?>
	</div>
	<div id="tab-3">
        <h2>HR DB</h2>
		<?php if (count($resultshr)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='left'><input id='selectall' type='checkbox'></div></th>\n";
	echo "<th></th>\n";
	echo "<th>Worksheet</th>\n";

		echo "<th>Name</th>\n";
		echo "<th>Current Co.</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Email</th>\n";
		echo "<th>Designation</th>\n";
		echo "<th><div align='center'>Telephone</div></th>\n";
		echo "<th>Current Loc.</th>\n";
		echo "<th>Course</th>\n";
	    echo "<th><div align='center'>Passing Year</div></th>\n";
		echo "<th>Institute</th>\n";
		echo "<th>Pri. Client MGR</th>\n";
		echo "<th>Backup Client MGR</th>\n";
		echo "<th><div align='center'>CV</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($resultshr as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td><input class='case' name='c_id[]' value='".$row->can."' type='checkbox'></td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->can, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 echo    "<td>$row->worksheet1</td>";
 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->job_title</td>";
 echo    "<td>$row->email</td>";
 echo    "<td>$row->designation</td>";
 echo    "<td><div align='center'>$row->telephone</div></td>";
 echo    "<td>$row->current_location</td>";
 echo    "<td>$row->course</td>";
 echo    "<td><div align='center'>$row->year_of_passing</div></td>";
 echo    "<td>$row->institute</td>";
 echo    "<td>$row->priclientmgr</td>";
 echo    "<td>$row->secclientmgr</td>";
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
 if(!$row->file_to_view)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/viewcv/'.$row->id, img($cv_image), $atts)."</div></td>";
  } 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $totalhr; ?></b></p>
  <?php echo $hrlinks; ?>
    </div>
	<div id="tab-4">
			<h2>Client Transaction</h2>
			
	<?php
 if (count($resultspos)){ 
 echo "<table>\n";
		echo form_open('pof/admin/changeStatus/'.$page);	
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	echo "<th>Discussed On</th>\n";
	echo "<th>POF No.</th>\n";
    echo "<th>Date of Receipt</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Company</th>\n";
		echo "<th>No. of Pos</th>\n";
		echo "<th>Location</th>\n";
		echo "<th>Grade</th>\n";
		echo "<th>Max. Salary</th>\n";
		echo "<th>Pos Status</th>\n";
		echo "<th>Response Status</th>\n";
		echo "<th>Consultant</th>\n";
		echo "<th></th>\n";
		echo "<th>JD</th>\n";
		//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
  $hrmanager = '';
 foreach ($resultspos as $row){
 echo '<script type="text/javascript">                                         
$(document).ready(function() {
  $("tr#cat'.$row->hiring_manager.'.child").hide();
        $("tr#cat'.$row->hiring_manager.'.header").show();

   $("tr#cat'.$row->hiring_manager.'.header").click(function () { 
      $("tr#cat'.$row->hiring_manager.'.child").each(function() {
         $(this).slideToggle("fast");
      });
   });


});

</script>   ';
 if(($row->hiring_manager) != $hrmanager)
				   {
				    echo "<tr id='cat".$row->hiring_manager."' class='header'><th colspan='17' id='employee'>".anchor_popup('candidates/admin/editCandidate/'.$row->hiring_manager, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)." ".$row->candidate_name."<div align='left' style='margin-top:-10px; margin-bottom:-30px; margin-left:1040px;'><b>Client Manager :</b>".$row->username."</div><div align='right' style='margin-top:-10px; margin-bottom:10px;'>".anchor_popup('companies/admin/addScribble/'.$compid.'/'.$row->hiring_manager, img($scribble_image), $atts)."</div></th></tr>";
					$hrmanager = $row->hiring_manager;
				   }
				   
 
if(($row->talked_on)==date('Y-m-d'))
  {
   echo "<tr valign='top' bgcolor='#FFFFCC' id='cat".$row->hiring_manager."' class='child'>\n";
  }
  else{
 if(($row->manager)==19)
 {
echo "<tr valign='top' bgcolor='#FFCCCC' id='cat".$row->hiring_manager."' class='child'>\n";
}
elseif(($row->manager)==37)
 {
echo "<tr valign='top' bgcolor='#66FF99' id='cat".$row->hiring_manager."' class='child'>\n";
}
else
{
echo "<tr valign='top' bgcolor='#eee' id='cat".$row->hiring_manager."' class='child'>\n";

}
}
 if($user['group']==2)
 {
  echo    "<td><input name='manager' type='hidden' value=".$this->session->userdata('id')."/><input id='pofid' name='pofid[]' value='".$row->pof_id."' type='checkbox'  /></td>";
  }
  else
  {
    echo "<td></td>";
  }
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
 echo    "<td><div align='center'>$row->pos_taken_on</div></td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
 echo    "<td><div align='center'>$row->no_of_pos</div></td>";
 echo    "<td>$row->segment_name</td>";
 echo    "<td>$row->grade</td>";
 echo    "<td><div align='center'>$row->sal_t</div></div></td>";
 $array = array(''=>'','wip_urgent'=>'WIP Urgent','wip_active'=>'WIP Active','wip_hold'=>'WIP Hold','client_hold'=>'Client Hold','mirus_drop'=>'Mirus Drop','client_drop'=>'Client Drop','lost_compt'=>'Lost Competition','lost_int'=>'Lost Internal','closed'=>'Closed');
 echo    "<td>".form_hidden("pof_id[]",$row->pof_id).form_dropdown('pos_status[]',$array, set_value('pos_status',$row->pos_status))."</td>";
echo   "<td><div align='center'>".$row->count2." <b>/</b> ".(($row->sum1)+($row->sum2)+($row->sum3)+($row->sum4))." <b>/</b> ".$row->sum3."<div></td>";
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
$scribble_image = "http://software.triedge.in/assets/icons/scribble.png";
 if($user['group']==2)
 {
 if(!$row->is_allocated)
 {
   
   echo "<td></td>";
 
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('pof/admin/scribble/'.$row->pof_id.'/', img($scribble_image), $atts)."</div></td>";
  }
  }
  else{
   echo  "<td></td>";
  }

 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$row->file_to_view)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('pof/admin/viewJD/'.$row->pof_id, img($cv_image), $atts)."</div></td>";
  } 
 

  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <?php echo form_close(); ?>
 <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $totalpos; ?></b></p>
 
     </div>
	<div id="tab-5">
	<?php echo form_open('companies/admin/clientterms/'.$compid);	?>
        <h2>Client Terms</h2>
		<table width="100%" border="1">
  <tr>
    <td width="10%">Contract Type </td>
    <td width="10%"><?php echo form_dropdown('contracttype', array('0'=>'')+$contracttype,set_value('contracttype', $compdetail['contract_type']), "class='dropdown', style='width:150px;  background-color:#CCCCCC'"); ?></td>
    <td width="14%">Contract Date Start </td>
    <td width="15%"><input type="text" name="startdate" class="input-medium datepick" value="<?php echo $compdetail['start_date']; ?>"/></td>
    <td width="12%">Contract Date End </td>
    <td width="15%"><input type="text" name="enddate" class="input-medium datepick" value="<?php echo $compdetail['end_date']; ?>"/></td>
    <td width="10%">Signed WIth </td>
    <td width="14%"><?php echo form_dropdown('agmwith', array('0'=>'')+$agreement,set_value('agmwith', $compdetail['agmwith']), "style='width:150px;  background-color:#CCCCCC'"); ?></td>
  </tr>
  <tr>
    <td>Contract Assurance </td>
    <td colspan="3"><p>&nbsp;</p>
      <p><div style="margin-top:-40px;">
        <textarea name="contractassurance" cols="50" class="nextbutton"><?php echo $compdetail['contract_assurance']; ?></textarea>
		</div>
      </p></td>
    <td>RFP Process </td>
    <td><input type="checkbox" name="rpf" /></td>
    <td>RFP Tentative Date </td>
    <td><input type="text" name="tentativedate" class="input-medium datepick" value="<?php echo $compdetail['tentative_date']; ?>"/></td>
  </tr>
  <tr>
    <td>Remarks</td>
    <td colspan="3"><p>&nbsp;</p>
        <p></p>
      <div style="margin-top:-40px;">
          <textarea name="remarks" cols="70"><?php echo $compdetail['remarks']; ?></textarea>
        </div>
      </p></td>
    <td colspan="4">
	<p>&nbsp;</p>
	<p></p>	<div style="margin-top:-40px;"></div></td>
    </tr>
  <tr>
 
    <td colspan="8"><?php if (count($gradestruct)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th colspan='3'><div align='center'>Grade Structure</div></th>\n";
	echo "<th><div align='center'>Fee Type</div></th>\n";
		echo "<th><div align='center'>Fees</div></th>\n";
		echo "<th><div align='center'>Candidate Guarantee Period</div></th>\n";
		echo "<th><div align='center'>Candidate Exclude Period</div></th>\n";
			echo "</tr>\n";
	echo "<tr>\n";
	echo "<th>Grade</th>\n";
		echo "<th>Equi. Designation</th>\n";
		echo "<th>Level</th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($gradestruct as $row){
echo '<script type="text/javascript">  
     $(document).ready(function() {                                       
        $("#name'.$row->gid.'").live("change", function() {
          $("#firstname'.$row->gid.'").val($(this).find("option:selected").attr("value"));
        });
     });                                     
</script>';
echo "<tr valign='top'>\n";
  echo    "<td> <input type='hidden' name='gradeid[]' value='".$row->gid."' />$row->grade</td>";
   echo    "<td>$row->grade</td>";
 echo    "<td>$row->segment_name</td>";
 echo    '<td> <div align="center"><select id="name'.$row->gid.'" name="feetype[]"> 
<option value=""></option> 
<option value="%">Percentage</option> 
<option value="Lacs">Flat</option> 
</select></div>
</td>';
  echo    '<td><div align="center"><input type="text" id="firstname'.$row->gid.'" name="fees[]" value="'.$row->fees.'" ></div></td>';
  echo    "<td><div align='center'>".form_dropdown('cgp[]', array('0'=>'')+$period,set_value('cgp',$row->cgp), "style='width:150px;  background-color:#CCCCCC'")."</div></td>";
  echo    "<td><div align='center'>".form_dropdown('cep[]', array('0'=>'')+$period,set_value('cep',$row->cep), "style='width:150px;  background-color:#CCCCCC'")."</div></td>";
   
   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No grade structure found'; 
 } 
 ?></td>
    </tr>
	<tr>
    <td>Other Terms</td>
    <td colspan="3"><p>&nbsp;</p>
        <p></p>
      <div style="margin-top:-40px;">
          <textarea name="otherterms" cols="70"><?php echo $compdetail['otherterms']; ?></textarea>
        </div>
      </p></td>
    <td colspan="4">
	<p>&nbsp;</p>
	<p></p>	<div style="margin-top:-40px;"></div></td>
    </tr>
  </table>
<h2>Contract Coordinaters</h2>
<table width="1076" id="table4">
      <tr bgcolor="#000033">
        <th width="30" bgcolor="#000000"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows" /></div></th>
        <th width="88" height="3" bgcolor="#000000"><div align="center" class="style1">Name</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Current Comp. </div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Jobtitle</div></th>
        <th width="208" bgcolor="#000000"><div align="center" class="style1">
          <div align="center">Email Id. </div>
        </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Mobile No. </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Current Loc. </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Course</div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Passing Year </div></th>
        <th width="1003" bgcolor="#000000"><div align="center" class="style1">Institute</div></th>
      </tr>
      
      <tr height="20">
        <td style="padding-top:5px;">&nbsp;</td>
        <td style="padding-top:5px;"><div align="center">
          <input type="hidden" name="candmagmt[]" value="331" /> <input name="candidate_name[]" type="text" size="15" />
        </div></td>
        <td width="101"><div align="center">
          <input name="current_company[]" type="text" size="15" id="companyid2" />
        </div></td>
        <td width="88"><div align="center">
            <input name="job_title[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="email[]" type="text" size="35" />
        </div></td>
        <td><div align="center">
          <input name="telephone[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="designation[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="current_location[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="course[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="year_of_passing[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="institute[]" type="text" size="15" />
        </div></td>
      </tr>
    </table>
	<h2></h2>
	
<h2>Contract Signatories</h2>
<table width="1076" id="table4">
      <tr bgcolor="#000033">
        <th width="30" bgcolor="#000000"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows12" /></div></th>
        <th width="88" height="3" bgcolor="#000000"><div align="center" class="style1">Name</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Current Comp. </div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Jobtitle</div></th>
        <th width="208" bgcolor="#000000"><div align="center" class="style1">
          <div align="center">Email Id. </div>
        </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Mobile No. </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Current Loc. </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Course</div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Passing Year </div></th>
        <th width="1003" bgcolor="#000000"><div align="center" class="style1">Institute</div></th>
      </tr>
      
      <tr height="20">
        <td style="padding-top:5px;">&nbsp;</td>
        <td style="padding-top:5px;"><div align="center">
          <input type="hidden" name="candmagmt" value="330" /><input name="signator_name" type="text" size="15" />
        </div></td>
        <td width="101"><div align="center">
          <input name="current_company" type="text" size="15" id="companyid2" />
        </div></td>
        <td width="88"><div align="center">
            <input name="job_title" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="email" type="text" size="35" />
        </div></td>
        <td><div align="center">
          <input name="telephone" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="designation" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="current_location" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="course" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="year_of_passing" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="institute" type="text" size="15" />
        </div></td>
      </tr>
   
	<?php if (count($signatories)){ 
	 
 foreach ($signatories as $row){
 
echo "<tr valign='top'>\n";
 
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 
 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->job_title</td>";
 echo    "<td>$row->email</td>";
 echo    "<td><div align='center'>$row->telephone</div></td>";
 echo    "<td>$row->designation</td>";

 echo    "<td>$row->current_location</td>";
 echo    "<td>$row->course</td>";
 echo    "<td><div align='center'>$row->year_of_passing</div></td>";
 echo    "<td>$row->institute</td>";
 echo    "<td>$row->priclientmgr</td>";
 echo    "<td>$row->secclientmgr</td>";
   echo  "</tr>";
 }
 
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
  </table>
	<h2></h2>
	<h2>Compensation Components for Billing</h2>   
<h2>Bill Process</h2>
<table width="100%" border="1">
  <tr>
    <td width="14%">To be Sent To </td>
    <td width="28%"><?php echo form_dropdown('billsentto', array('0'=>'')+$sentto,set_value('billsentto', $compdetail['bill_sent_to']), "class='dropdown', style='width:150px;  background-color:#CCCCCC'"); ?></td>
    <td width="23%">Send By </td>
    <td width="35%" colspan="5"><?php echo form_dropdown('billsendby', array('0'=>'')+$sendby,set_value('billsendby', $compdetail['bill_send_by']), "style='width:150px;  background-color:#CCCCCC'"); ?></td>
    </tr>
  <tr>
    <td>Instructions</td>
    <td colspan="7"><p>&nbsp;</p>
        <p></p>
      <div style="margin-top:-40px;">
          <textarea name="instruction" cols="70"><?php echo $compdetail['bill_instruc']; ?></textarea>
        </div>
      </p></td>
    </tr>
</table>
<h2>Attachment</h2>
<table width="100%" border="1">
  <tr>
    <td width="14%" height="12"><?php        echo anchor_popup('companies/admin/addAttachment/'.$compid,'Add Attachment',$grid); ?></td>
    </tr>
  <tr>
    <td width="14%"><?php foreach ($attachment as $key => $test): ?>
	 <?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			echo $test['filename'].anchor_popup('companies/admin/viewattachment/'.$test['id'], 'view', $atts); ?>   <?php endforeach; ?></td>
    </tr>
</table>
<table width="774" id="table3">
      

      <tr height="20">
        <td width="139" style="padding-top:5px;"><input type="submit" class="btn btn-primary" name="save" value="Save" />          <div align="right"></div>          <div align="center"></div></td>
      </tr>
    </table>
    </div>