<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"><head>
<title><?php echo $candidate['candidate_name']; ?></title>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
	<script language="javascript">
function SingleSelect(regex,current)
{
re = new RegExp(regex);

for(i = 0; i < document.forms[0].elements.length; i++) {

elm = document.forms[0].elements[i];

if (elm.type == 'checkbox') {

if (re.test(elm.name)) {

elm.checked = false;

}
}
}

current.checked = true;

}
</script>
	
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
	
table, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	
	vertical-align: baseline;
}


#tabs {
font-size: 90%;
margin: 2px 0;
}
#tabs ul {
float: left;

width: 600px;

}
#tabs li {

margin-bottom: -20px;
list-style: none;
}
* html #tabs li {
	display: inline; /* ie6 double float margin bug */
	margin-top: -20px;
}
#tabs li,
#tabs li a {
float: left;
}
#tabs ul li a {
text-decoration: none;
padding: 5px;
color: #0073BF;
font-weight: bold;
}
#tabs ul li.active {
background: #CEE1EF url(img/nav-right.gif) no-repeat right top;
}
#tabs ul li.active a {
background: url(img/nav-left.gif) no-repeat left top;
color: #333333;
}
#tabs div {
	background: #CEE1EF;
	clear: both;
	padding: 5px;
	min-height: 100px;
	
}
#tabs div h3 {
text-transform: uppercase;

letter-spacing: 1px;

#tabs div p {
line-height: 150%;
}
-->
</style>
<script type="text/javascript">
$(document).ready(function(){
$('#tabs div').hide(); // Hide all divs
$('#tabs div:first').show(); // Show the first div
$('#tabs ul li:first').addClass('active'); // Set the class of the first link to active
$('#tabs ul li a').click(function(){ //When any link is clicked
$('#tabs ul li').removeClass('active'); // Remove active class from all links
$(this).parent().addClass('active'); //Set clicked link class to active
var currentTab = $(this).attr('href'); // Set variable currentTab to value of href attribute of clicked link
$('#tabs div').hide(); // Hide all divs
$(currentTab).show(); // Show div with id equal to variable currentTab
return false;
});
});
</script>
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
	    <meta charset="UTF-8">
	    
	    <style>
	    	/* Autocomplete
			----------------------------------*/
			.ui-autocomplete { position: absolute; cursor: default; }	
			.ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/

			/* workarounds */
			* html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */

			/* Menu
			----------------------------------*/
			.ui-menu {
				list-style:none;
				padding: 2px;
				margin: 0;
				display:block;
			}
			.ui-menu .ui-menu {
				margin-top: -3px;
			}
			.ui-menu .ui-menu-item {
				margin:0;
				padding: 0;
				zoom: 1;
				float: left;
				clear: left;
				width: 100%;
				font-size:80%;
			}
			.ui-menu .ui-menu-item a {
				text-decoration:none;
				display:block;
				padding:.2em .4em;
				line-height:1.5;
				zoom:1;
			}
			.ui-menu .ui-menu-item a.ui-state-hover,
			.ui-menu .ui-menu-item a.ui-state-active {
				font-weight: normal;
				margin: -1px;
			}
	    </style>
	    
	    <script type="text/javascript">
	    $(this).ready( function() {
    		$("#provinsi_id").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/candidates/admin/lookup",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            		$("#result").append(
            			"<li>"+ ui.item.value + "</li>"
            		);           		
         		},		
    		});
	    });
	    </script>
</head>
<body>
 <?php $id = $this->uri->segment(4); ?>
<?php print form_open_multipart('candidates/admin/editCandidate/'.$id);?>
<table width="641">
    <tr>
      <td>Cand. Mgmt. </td>
      <td><?php echo form_dropdown('cand_mgmt', array('0'=>'')+$candmgmt,set_value('cand_mgmt', $candidate['cand_mgmt']),"style='width:120px; background-color:#CCCCCC'"); ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php $atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$candidate['file_to_view'])
 {
  echo "";
   }
 else
  {
  echo    anchor_popup('candidates/admin/viewcv/'.$candidate['id'], img($cv_image),'view', $atts).anchor_popup('candidates/admin/viewcv/'.$candidate['id'], 'view', $atts); }?></td>
    </tr>
    <tr>
      <td>Entered By </td>
      <td><strong><?php echo $candidate['entered_by']; ?></strong></td>
      <?php if($candidate['last_updated']=='0000-00-00')
	   {
	  echo  '  <td>Entered On </td>
      <td><strong>'.$candidate['entered_on'].'</strong></td>';
	  }
	  else
	   {
	   echo  '  <td>Last Updated On </td>
      <td><strong>'.$candidate['last_updated'].'</strong></td>';
	   }
	   ?>
      <td>Updated By </td>
      <td colspan="2"><strong><?php echo $candidate['last_updated_by']; ?></strong></td>
    </tr>
    <tr>
      <td width="80" height="19">Cand Name</td>
      <td width="149">   <input name="candidate_name" id="candidate_name" type="text" size="20" style="background:#CCCCCC" value="<?php echo $candidate['candidate_name']; ?>"/></td>
      <td width="104">Current Loc.</td>
      <td width="129"><input name="current_location" id="current_location" type="text" size="15" style="background:#CCCCCC" value="<?php echo $candidate['current_location']; ?>"/></td>
      <td width="83">DOB</td>
      <td colspan="2"><input name="year_of_birth" id="year_of_birth" type="text" size="13" style="background:#CCCCCC" value="<?php echo $candidate['year_of_birth']; ?>"/></td>
    </tr>
    <tr>
      <td>Email </td>
      <td><input name="email" id="email" type="text" size="20" style="background:#CCCCCC" value="<?php echo $candidate['email']; ?>"/></td>
      <td>Telephone</td>
      <td><input name="telephone" id="telephone" type="text" size="15" style="background:#CCCCCC" value="<?php echo $candidate['telephone']; ?>"/></td>
      <td>Region</td>
      <td colspan="2"><input name="region" id="region" type="text" size="13" style="background:#CCCCCC" value="<?php echo $candidate['region']; ?>"/></td>
    </tr>
    <tr>
      <td colspan="2"><strong>Work Experiance </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="19">Current Co.</td>
      <td><input name="current_company" id="provinsi_id" type="text" size="20" style="background:#CCCCCC" value="<?php echo $candidate['company']; ?>"/></td>
      <td>Job Title </td>
      <td colspan="2"><input name="job_title" id="job_title" type="text" size="30" style="background:#CCCCCC" value="<?php echo $candidate['job_title']; ?>"/></td>
      <td width="43">Joined</td>
      <td width="29"><input name="in_current_company_since" id="in_current_company_since" type="text" size="5" style="background:#CCCCCC" value="<?php echo $candidate['in_current_company_since']; ?>"/></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><input name="department" id="department" type="text" size="20" style="background:#CCCCCC" value="<?php echo $candidate['department']; ?>"/></td>
      <td>Reports To</td>
      <td colspan="2"><input name="reports_to" id="reports_to" type="text" size="30" style="background:#CCCCCC" value="<?php echo $candidate['reports_to']; ?>"/></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="19">Designation</td>
      <td><input name="designation" id="designation" type="text" size="20" style="background:#CCCCCC" value="<?php echo $candidate['designation']; ?>"/></td>
      <td>Grade</td>
     <td><div id="gradelist">
            <?php
    	echo form_dropdown("grade",array(''=>'')+$gradelist,set_value('grade',$candidate['grade']),"id='segmenttypepid', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div></td>
      <td>Level</td>
      <td colspan="2"><div id="levellist">
            <?php
    	echo form_dropdown("level",array(''=>'')+$levellist,set_value('level',$candidate['level']),"id='segmenttypepid', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div></td>
    </tr>
    
    <tr>
      <td>Prev. Co. </td>
      <td><input name="previous_company" id="previous_company" type="text" size="20" style="background:#CCCCCC" value="<?php echo $candidate['previous_company']; ?>"/></td>
      <td>Salary(p.a.)</td>
      <td><input name="salary" id="salary" type="text" size="15" style="background:#CCCCCC" value="<?php echo $candidate['salary']; ?>"/></td>
      <td>Lakhs</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><strong>Academics</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="19">Course</td>
      <td><input name="course" id="course" type="text" size="20" style="background:#CCCCCC" value="<?php echo $candidate['course']; ?>"/></td>
      <td>Institute </td>
      <td><input name="institute" id="institute" type="text" size="15" style="background:#CCCCCC" value="<?php echo $candidate['institute']; ?>"/></td>
      <td>Passing Year </td>
      <td colspan="2"><input name="year_of_passing" id="year_of_passing" type="text" size="13" style="background:#CCCCCC" value="<?php echo $candidate['year_of_passing']; ?>"/></td>
    </tr>
    
    <tr>
      <td colspan="2"><strong>Send To </strong></td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
	<tr>
      <td height="22">My Pos</td>
      <td colspan="6"><?php echo form_dropdown("pofid",array('0'=>'')+$positions,"","id='id', style='width:450px; background-color:#CCCCCC'");?></td>
    </tr>
	<tr>
      <td height="22">All Pos</td>
      <td colspan="6"><?php echo form_dropdown("pofid2",array('0'=>'')+$positions2,"","id='id', style='width:450px; background-color:#CCCCCC'");?></td>
    </tr>
    <tr>
      <td>Industry</td>
      <td><?php echo form_dropdown("industry",array('0'=>'Select Industry')+$indusdropdown,set_value('industry',$candidate['industry']),"id='industryid', style='width:143px; background-color:#CCCCCC'");?></td>
      <td>Sub-industry</td>
      <td><div id="subindustry">
   	<?php
    	echo form_dropdown("sub_industry",array('0'=>'Sub Industry'),'',"style='width:143px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
   
   <script type="text/javascript">
	  	$("#industryid").click(function(){
	    		
        //build an array of selected values
        var industryid= $("#industryid").val();

      

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('candidates/admin/getSubIndus')?>",
							data: {'industryid':industryid},
							success: function(msg){
								$('#subindustry').html(msg);
							}
				  	});
	    		
	    });
	   </script></td>
      <td colspan="3">Add to my Worksheet </td>
    </tr>
	<tr>
      <td height="19">Function</td>
      <td><?php echo form_dropdown("indfunction",array('0'=>'Select Function')+$funcdropdown,set_value('indfunction',$candidate['indfunction']),"id='indfuncid', style='width:143px; background-color:#CCCCCC'");?></td>
      <td>Sub-function</td>
      <td><div id="subfunction">
   	<?php
    	echo form_dropdown("sub_function",array('0'=>'Sub Function'),'',"style='width:143px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
   
   <script type="text/javascript">
	  	$("#indfuncid").click(function(){
	    		
        //build an array of selected values
        var indfuncid= $("#indfuncid").val();

      

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('candidates/admin/getSubFunc')?>",
							data: {'indfuncid':indfuncid},
							success: function(msg){
								$('#subfunction').html(msg);
							}
				  	});
	    		
	    });
	   </script></td>
      <td colspan="3"><?php echo form_dropdown("myworksheet",array('0'=>'')+$worksheet,"","id='id', style='width:140px; background-color:#CCCCCC'");?></td>
    </tr>
	  
	    
     <tr>
             <td>Folder</td>
       <td><select name="folder_name" style="background:#CCCCCC; width:143px;">
           <option value=""></option>
           <?php
	
 if (count($sfolder)){ 
             foreach ($sfolder as $key => $list) {

                echo "<option>" . $list['p_id'] . "</option>". "\n";

              }
			  }

            ?>
       </select></td>
       <td>or New Mapping Sheet</td>
       <td><input name="newfolder" id="newfolder" type="text" size="20" style="background:#CCCCCC"/></td>
       <td colspan="2"><div align="right">
           <?php  $atts = array(
              'width'      => '1010',
              'height'     => '300',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '150',
              'screeny'    => '100'
            ); 
			echo anchor_popup('candidates/admin/addtoworkCandidate/'.$id, 'Add to Worksheet', $atts); ?>
       </div></td>
     </tr>
    <tr>
      <td colspan="7"><div id="tabs">
<ul>
<li><a href="#tab-1">Current Role</a></li>
<li><a href="#tab-2">Profile Brief</a></li>
<li><a href="#tab-3">Commment</a></li>
<li><a href="#tab-4">Status</a></li>
<li><a href="#tab-5">Folder</a></li>
<li><a href="#tab-6">Worksheet</a></li>
<li><a href="#tab-7">Industry</a></li>
<li><a href="#tab-8">Attachment</a></li>
<li><a href="#tab-9">History</a></li>
</ul>
<div id="tab-1">
<textarea name="current_role" id="current_role" cols="75" rows="6" style="background:#CCCCCC"><?php echo $candidate['current_role']; ?></textarea>
</div>
<div id="tab-2">
<textarea name="profile_brief" id="profile_brief" cols="75" rows="6" style="background:#CCCCCC"><?php echo $candidate['profile_brief']; ?></textarea>
</div>
<div id="tab-3">
<textarea name="comment" id="comment" cols="75" rows="6" style="background:#CCCCCC"><?php if(isset($candidate['comment']))
{
echo $candidate['comment'];
}
else
{
echo "enter comment";
} ?></textarea>
</div>
<div id="tab-4">
<textarea name="status" id="status" cols="75" rows="6" maxlength="255" style="background:#CCCCCC"><?php if(isset($status['status']))
{
echo $status['status'];
}
else
{
echo "";
} ?></textarea>
</div>
<div id="tab-5">
<table >
<tr >
 <th>Folder</th>
  <th></th>
 </tr>

 <?php

 foreach ($fol as $row){
 
 echo "<tr class=\"record\">";

 echo    "<td>$row->p_id</td>";

 echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table>
</div>
<div id="tab-6">
<table width="100%">
  <tr>
    <td><table >
<tr >
 <th>Master Worksheet</th>
  <th></th>
 </tr>
 <?php

 foreach ($master_worksheet as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->worksheet_name</td>";
  echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table></td>
<td><table >
<tr >
 <th>Sub-Master Worksheet</th>
  <th></th>
 </tr>
 <?php

 foreach ($submaster_worksheet as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->worksheet_name</td>";
  echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table></td>
    <td><table >
<tr >
 <th>Basic Direct</th>
  <th></th>
 </tr>
 <?php

 foreach ($basic_direct as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->worksheet_name</td>";
 echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table></td>
 <td><table >
<tr >
 <th>Basic Indirect</th>
  <th></th>
 </tr>
 <?php

 foreach ($basic_indirect as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->worksheet_name</td>";
 echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table></td>
  </tr>
</table>
<div id="dialog-confirm" title="Delete Item ?"> 
	<p>
		<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
		<input type="hidden" value='' id="del_id" name="del_id">
		Are you sure?</p> 
</div> 
</div>

<div id="tab-7">
<table width="100%">
  <tr>
    <td><table >
<tr >
 <th>Industry</th>
  <th></th>
 </tr>
 <?php

 foreach ($indus as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->name</td>";
 echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table></td>
    <td><table >
<tr >
 <th>Sub Industry</th>
  <th></th>
 </tr>
 <?php

 foreach ($subindus as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->name</td>";
 echo    anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X');
 echo  "</tr>";
 }
 ?>
</table></td>
<td><table >
<tr >
 <th>Function</th>
  <th></th>
 </tr>
 <?php

 foreach ($indfunc as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->name</td>";
  echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table></td>
<td><table >
<tr >
 <th>Sub Function</th>
  <th></th>
 </tr>
 <?php

 foreach ($subfunc as $row){
 
 echo "<tr class=\"record\">";
echo    "<td>$row->name</td>";
 echo    "<td>". anchor('candidates/admin/deletesubind/'.$row->c_id."/".$row->id,'X')."</td>";
 echo  "</tr>";
 }
 ?>
</table></td>
  </tr>
</table>
<div id="dialog-confirm" title="Delete Item ?"> 
	<p>
		<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
		<input type="hidden" value='' id="del_id" name="del_id">
		Are you sure?</p> 
</div>
</div>
<div id="tab-8">
  <table width="100%">
    <tr>
      <td colspan="5"><strong>Attachmen</strong>t</td>
    </tr>
    <tr>
      <td width="108">File</td>
      <td width="161"><?php echo form_upload('userfile'); ?></td>
      <td width="63">File Type </td>
      <td width="132"><select name="file_type">
          <option value="cv">CV</option>
          <option value="ppt">Presentation</option>
          <option value="profile">Profile</option>
        </select>      </td>
		
      <td width="145"><?php echo form_submit('upload', 'Upload'); ?></td>
    </tr>
	<tr>
	
      <td colspan="5">File name showing with candidate : : <strong><?php echo $filetoview['filename']; ?></strong></td>
    </tr>
  </table>
 <?php foreach ($attachment as $key => $test): ?>
  <input type="checkbox" name="chk" id="<?php echo $test['file_id'];?>" value="<?php echo $test['file_id'];?>" onClick="SingleSelect('chk',this);" />    <?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			echo $test['filename'].anchor_popup('candidates/admin/viewattachment/'.$test['file_id'], 'view', $atts); ?>
          <?php endforeach; ?>
</div>
<div id="tab-9">

<?php if (count($history)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Pof No.</th>\n";
		echo "<th>Client</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Consultant</th>\n";
		echo "<th>Status</th>\n";
		echo "<th>Date</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($history as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->pof_no</td>";
   echo    "<td>$row->comp</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->username</td>";
 echo    "<td>$row->stage</td>";
 echo    "<td>$row->date</td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
</div>
</div></td>
    </tr>
	<tr><td><li class="submit"> <?php print form_hidden('id','')?>
            <div class="buttons">
              <button type="submit" class="btn btn-primary" class="positive" name="submit" value="submit"> <?php print  $this->bep_assets->icon('disk');?> <?php print $this->lang->line('general_save')?> </button>
            </div>
    </li></td></tr>
</table>
 
 <script type="text/javascript">
	  	$("#companyid").keyup(function(){
	    		
        //build an array of selected values
        var companyid= $("#companyid").val();

      

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('candidates/admin/getGrade')?>",
							data: {'companyid':companyid},
							success: function(msg){
								$('#gradelist').html(msg);
							}
				  	});
	    		
	    });
	   </script> 
	   
	   <script type="text/javascript">
	  	$("#companyid").keyup(function(){
	    		
        //build an array of selected values
        var companyid= $("#companyid").val();

      

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('candidates/admin/getLevel')?>",
							data: {'companyid':companyid},
							success: function(msg){
								$('#levellist').html(msg);
							}
				  	});
	    		
	    });
	   </script> 
</body>
</html>