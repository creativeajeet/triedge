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
	<script type="text/javascript">
    var intTextLnki=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addLinkagesi() {
        intTextLnki = intTextLnki + 1;
       
        var contentID = document.getElementById("content-lnki");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","lnkText"+intTextLnki);
        newTBDiv.innerHTML = + intTextLnki + "<input type='text' id='linki[]" + intTextLnki + "' name='linki[]" + intTextLnki + "' style='width:300px; margin-left:5px;'><input type='button' onclick='removeLinkagesi()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeLinkagesi() {
        if(intTextLnki != 1&&current) {
            var contentID = document.getElementById("content-lnki");
            contentID.removeChild(current);
            intTextLnki = intTextLnki-1;
           
        }
    }
</script>
<script type="text/javascript">
    var intTextLnke=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addLinkagese() {
        intTextLnke = intTextLnke + 1;
       
        var contentID = document.getElementById("content-lnke");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","lnkText"+intTextLnke);
        newTBDiv.innerHTML = + intTextLnke + "<input type='text' id='linke[]" + intTextLnke + "' name='linke[]" + intTextLnke + "' style='width:280px; margin-left:5px;'><input type='button' onclick='removeLinkagese()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeLinkagese() {
        if(intTextLnke != 1&&current) {
            var contentID = document.getElementById("content-lnke");
            contentID.removeChild(current);
            intTextLnke = intTextLnke-1;
           
        }
    }
</script>
<script type="text/javascript">
    var intTextKey=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addElementKey() {
        intTextKey = intTextKey + 1;
       
        var contentID = document.getElementById("content-key");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","strText"+intTextKey);
        newTBDiv.innerHTML = + intTextKey + "<input type='text' id='keysell[]" + intTextKey + "' name='keysell[]" + intTextKey + "' style='width:300px; margin-left:5px;'><input type='button' onclick='removeElementKey()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeElementKey() {
        if(intTextKey != 1&&current) {
            var contentID = document.getElementById("content-key");
            contentID.removeChild(current);
            intTextKey = intTextKey-1;
           
        }
    }
</script>
<script type="text/javascript">
    var intTextCheck=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addElementCheck() {
        intTextCheck = intTextCheck + 1;
       
        var contentID = document.getElementById("content-check");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","strText"+intTextCheck);
        newTBDiv.innerHTML = + intTextCheck + "<input type='text' id='keyeva[]" + intTextCheck + "' name='keyeva[]" + intTextCheck + "' style='width:300px; margin-left:5px;'><input type='button' onclick='removeElementCheck()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeElementCheck() {
        if(intTextCheck != 1&&current) {
            var contentID = document.getElementById("content-check");
            contentID.removeChild(current);
            intTextCheck = intTextCheck-1;
           
        }
    }
</script>





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
    <td colspan="8"><input name="textfield22232" type="text" size="50"/></td>
    <td><input type="submit" class="btn btn-primary" name="Submit34" value="+" disabled="disabled"/></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="38" colspan="9"><h6>Head Office Location </h6> </td>
    <td>
          </td>
    <td width="153"></td>
    <td width="235"></td>
  </tr>
  <tr>
    <td height="37">Global</td>
    <td colspan="3"><?php echo form_dropdown('globalloc', array(''=>'')+$location,set_value('globalloc', $compdetail['globalloc']), "style='width:100px;  background-color:#CCCCCC'"); ?></td>
    <td colspan="2">India</td>
    <td colspan="3"><?php echo form_dropdown('indialoc', array(''=>'')+$location,set_value('indialoc', $compdetail['indialoc']), "style='width:100px;  background-color:#CCCCCC'"); ?></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
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
	<div align="left" style="margin-top:-50px; margin-bottom:10px; margin-left:150px;"> <?php echo anchor_popup('companies/admin/addScribble/'.$compid, img($scribble_image), ''); ?>
	</div>
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
 </div>
		</td>
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
		echo "<th><div align='center'>CV</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($resultshr as $row){
 
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
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $totalhr; ?></b></p>
  <?php echo $hrlinks; ?>
    </div>