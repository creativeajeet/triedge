<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
	
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
<?php print form_open_multipart('companies/admin/newCandidate/'.$id);?>
<table width="641">
    <tr>
      <td height="27">Cand. Mgmt.</td>
      <td height="27"><?php echo form_dropdown('cand_mgmt', array('0'=>'')+$candmgmt,set_value('cand_mgmt','329'),"style='width:120px; background-color:#CCCCCC'"); ?></td>
      <td width="94">Introduced By </td>
      <td width="59"><?php echo form_dropdown('entered_by', $usernames, set_value('entered_by', $this->session->userdata('username')),"style='width:120px; background-color:#CCCCCC'"); ?></td>
      <td width="61">Input By </td>
      <td colspan="2"><input name="input_by" id="input_by" type="text" size="10" style="background:#CCCCCC" value="<?php echo $this->session->userdata('username'); ?>"/></td>
    </tr>
    <tr>
      <td width="80" height="19">Cand Name</td>
      <td width="159">   <input name="candidate_name" id="candidate_name" type="text" size="20" style="background:#CCCCCC"  ?></td>
      <td>Current Loc.</td>
      <td width="122"><input name="current_location" id="current_location" type="text" size="15" style="background:#CCCCCC" /></td>
      <td width="90">DOB</td>
      <td colspan="2"><input name="year_of_birth" id="year_of_birth" type="text" size="13" style="background:#CCCCCC" value="DD/MM/YYYY" /></td>
    </tr>
    <tr>
      <td>Email </td>
      <td><input name="email" id="email" type="text" size="20" style="background:#CCCCCC" /></td>
      <td>Telephone</td>
      <td><input name="telephone" id="telephone" type="text" size="15" style="background:#CCCCCC" /></td>
      <td>Region</td>
      <td colspan="2"><input name="region" id="region" type="text" size="13" style="background:#CCCCCC" /></td>
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
      <td><input name="current_company" id="provinsi_id" type="text" size="20" style="background:#CCCCCC" value="<?php echo $compp['parentname']; ?>" /></td>
      <td>Job Title </td>
      <td colspan="2"><input name="job_title" id="job_title" type="text" size="30" style="background:#CCCCCC" /></td>
      <td width="43">Joined</td>
      <td width="29"><input name="in_current_company_since" id="in_current_company_since" type="text" size="5" value="YYYY" style="background:#CCCCCC" /></td>
    </tr>
    <tr>
      <td height="25">Department</td>
      <td><input name="department" id="department" type="text" size="20" style="background:#CCCCCC"/></td>
      <td>Reports To</td>
      <td colspan="2"><input name="reports_to" id="reports_to" type="text" size="30" style="background:#CCCCCC" /></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="19">Designation</td>
      <td><input name="designation" id="designation" type="text" size="20" style="background:#CCCCCC" /></td>
      <td>Grade</td>
      <td><div id="gradelist">
            <?php
    	echo form_dropdown("grade",array(''=>'')+$gradelist,'',"id='segmenttypepid', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div></td>
      <td>Level</td>
      <td colspan="2"><div id="levellist">
            <?php
    	echo form_dropdown("level",array(''=>'')+$levellist,'',"id='segmenttypepid', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div></td>
    </tr>
    
    <tr>
      <td>Prev. Co. </td>
      <td><input name="previous_company" id="previous_company" type="text" size="20" style="background:#CCCCCC"/></td>
      <td>Salary(p.a.)</td>
      <td><input name="salary" id="salary" type="text" size="15" value="000.00" style="background:#CCCCCC" /></td>
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
      <td><input name="course" id="course" type="text" size="20" style="background:#CCCCCC" /></td>
      <td>Institute </td>
      <td><input name="institute" id="institute" type="text" size="15" style="background:#CCCCCC" /></td>
      <td>Passing Year </td>
      <td colspan="2"><input name="year_of_passing" id="year_of_passing" type="text" size="13" style="background:#CCCCCC" /></td>
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
      <td><?php echo form_dropdown("industry",array('0'=>'Select Industry')+$indusdropdown,"","id='industryid', style='width:143px; background-color:#CCCCCC'");?></td>
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
	   </script>	</td>
      <td colspan="3">Add to my Worksheet </td>
    </tr>
	<tr>
      <td height="19">Function</td>
      <td><?php echo form_dropdown("indfunction",array('0'=>'Select Function')+$funcdropdown,"","id='indfuncid', style='width:143px; background-color:#CCCCCC'");?></td>
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
       <td>or New Folder </td>
       <td><input name="newfolder" id="newfolder" type="text" size="20" style="background:#CCCCCC"/></td>
       <td colspan="3"><div align="right">
         <?php  $atts = array(
              'width'      => '1010',
              'height'     => '240',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '150',
              'screeny'    => '100'
            ); 
			echo anchor_popup('candidates/admin/addtoworkCandidate/'.$cand=$last+1, 'Add to Worksheet', $atts); ?>
       </div></td>
     </tr>
    <tr>
      <td colspan="7"><div id="tabs">
<ul>
<li><a href="#tab-1">Current Role</a></li>
<li><a href="#tab-2">Profile Brief</a></li>
<li><a href="#tab-3">Commment</a></li>
<li><a href="#tab-4">Status</a></li>
<li><a href="#tab-8">Attachment</a></li>
</ul>
<div id="tab-1">
<textarea name="current_role" id="current_role" cols="75" rows="6" style="background:#CCCCCC"></textarea>
</div>
<div id="tab-2">
<textarea name="profile_brief" id="profile_brief" cols="75" rows="6" style="background:#CCCCCC"></textarea>
</div>
<div id="tab-3">
<textarea name="comment" id="comment" cols="75" rows="6" style="background:#CCCCCC"></textarea>
</div>
<div id="tab-4">
<textarea name="status" id="status" cols="75" rows="6" style="background:#CCCCCC"></textarea>
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
          <option>CV</option>
          <option>Presentation</option>
          <option>Profile</option>
        </select>      </td>
     <td width="145"><?php echo form_submit('upload', 'Upload'); ?></td>
    </tr>
  </table>
  <div id="dialog-confirm" title="Delete Item ?"> 
	<p>
		<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
		<input type="hidden" value='' id="del_id" name="del_id">
		Are you sure?</p> 
</div>
</div>
</div></td>
    </tr>
	<tr><td><li class="submit"> <?php print form_hidden('id','')?>
            <div class="buttons">
              <button type="submit" class="btn btn-primary" class="positive" name="submit" value="submit"> <?php print  $this->bep_assets->icon('disk');?> <?php print $this->lang->line('general_save')?> </button>
            </div>
    </li></td></tr>
</table>
 
</body>
</html>