<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
	<script type="text/javascript">
			$(document).ready(function(){
				
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
			$(document).ready(function(){
				
				// -- Clone table rows
				$(".cloneTableRows2").live('click', function(){

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
		$( "#tabs" ).tabs();
	});
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
<!--
.style1 {color: #FFFFFF}

-->
</style>

<style type="text/css">

#tabs {
	font-size: 90%;
	width: 130%;
	margin-top: 2px;
	margin-right: 0;
	margin-bottom: 2px;
	margin-left: 0;
}

-->
</style>	

 <script type="text/javascript">
 $(document).ready(function(){
 $("#sheetname").keyup(function(){
    $("#sheetname2").val(this.value);
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
    		$("#companyid").autocomplete({
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
		
		<script type="text/javascript">
	    $(this).ready( function() {
    		$("#grade").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/candidates/admin/lookupgrade",
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
			?>
			<br/>
<div  class="btn"><i class="icon-user"></i>                
	<?php echo anchor_popup('candidates/admin/newCandidate/', 'New Candidate', $atts); ?>
</div>

<div id="tabs">
<ul>
		<li><a href="#tabs-1">Input Sheet</a></li>
		<li><a href="#tabs-2">Mapping Sheet</a></li>
		<li><a href="#tabs-3">Worksheet</a></li>
	</ul>
  <div id="tabs-1">
  <h2>New Input Sheet</h2>
  <?php print form_open_multipart('candidates/admin/newinput/');?>
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
		<th width="1003" bgcolor="#000000"><div align="center" class="style1">Cand Mgmt.</div></th>
		<th width="1003" bgcolor="#000000"><div align="center" class="style1">My Position</div></th>
		<th width="1003" bgcolor="#000000"><div align="center" class="style1">Worksheet</div></th>
      </tr>
      
      <tr height="20">
        <td style="padding-top:5px;">&nbsp;</td>
        <td style="padding-top:5px;"><div align="center">
          <input name="candidate_name[]" type="text" size="15" />
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
		<td><div align="center">
          <?php echo form_dropdown('cand_mgmt[]', array('0'=>'')+$candmgmt,'',"style='width:120px; background-color:#CCCCCC'"); ?>
        </div></td>
		<td><div align="center">
          <?php echo form_dropdown("position[]",array(''=>'')+$positions,"","id='id', style='width:250px; background-color:#CCCCCC'");?>
        </div></td>
		<td><div align="center">
          <?php echo form_dropdown("myworksheet[]",array(''=>'')+$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?>
        </div></td>
      </tr>
    </table>
	<h2></h2>
	<table width="774" id="table3">
      

      <tr height="20">
        <td width="139" style="padding-top:5px;"><input type="submit" class="btn btn-primary" name="save" value="Save" /></td>
        <td width="66"><div align="right"></div></td>
        <td width="106"><div align="center"></div></td>
        <td width="107">&nbsp;</td>
        <td width="133">&nbsp;</td>
        <td width="138">&nbsp;</td>
        <td width="53"></td>
      </tr>
    </table>  
	 <?php print form_close(); ?>  
  </div>
  <div id="tabs-2">
  <h2>Open Candidate Mapping Sheet</h2>  
  <?php print form_open('candidates/admin/open_folder/');?> 
	<table width="774" id="table3">
      

      <tr height="20">
        <td width="76" style="padding-top:5px;">Sheet Name </td>
        <td width="121" style="padding-top:5px;"><select name="folder_name" style="background:#CCCCCC; width:143px;">
	<option value=""></option>
	<option value="1">Refered By Others</option>
     <?php
	
 if (count($folder)){ 
             foreach ($folder as $key => $list) {

                echo "<option>" . $list['p_id'] . "</option>". "\n";

              }
			  }

            ?>
    </select></td>
        <td width="148"><div align="right"></div></td>
        <td width="132"><div align="center"></div></td>
        <td width="59"><span style="padding-top:5px;">
          <input type="submit" class="btn btn-primary" name="open" value="Open" />
        </span></td>
        <td width="80">&nbsp;</td>
        <td width="38">&nbsp;</td>
        <td width="84"></td>
      </tr>
    </table>  
	 <?php print form_close(); ?> 
	<h2></h2>
  <h2>New Mapping Sheet</h2>

<?php print form_open_multipart('candidates/admin/newmapping/');?>
Input Name : <input name="sheetname" type="text" size="15" id="sheetname"/>
<table width="1076" id="table5">
      <tr bgcolor="#000033">
        <th width="30" bgcolor="#000000"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows2" /></div></th>
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
		<th width="1003" bgcolor="#000000"><div align="center" class="style1">Cand Mgmt.</div></th>
		<th width="1003" bgcolor="#000000"><div align="center" class="style1">My Position</div></th>
		<th width="1003" bgcolor="#000000"><div align="center" class="style1">Worksheet</div></th>
      </tr>
      
      <tr height="20">
        <td style="padding-top:5px;">&nbsp;</td>
        <td style="padding-top:5px;"><div align="center">
          <input name="candidate_name[]" type="text" size="15" />
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
		<td><div align="center">
          <?php echo form_dropdown('cand_mgmt[]', array('0'=>'')+$candmgmt,'',"style='width:120px; background-color:#CCCCCC'"); ?>
        </div></td>
		<td><div align="center">
          <?php echo form_dropdown("position[]",array(''=>'')+$positions,"","id='id', style='width:250px; background-color:#CCCCCC'");?>
        </div></td>
		<td><div align="center">
          <?php echo form_dropdown("myworksheet[]",array(''=>'')+$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?>
        </div></td>
      </tr>
    </table>
	<h2></h2>
	<table width="774" id="table6">
      

      <tr height="20">
        <td width="120" style="padding-top:5px;"><input type="submit" class="btn btn-primary" name="save" value="Export Excel" /></td>
        <td width="86"><div align="right">Sheet Name  </div></td>
        <td width="139"><div align="center">
          <input name="degree" type="text" size="15" id="sheetname2" />
        </div></td>
        <td width="106">Sheet Option </td>
        <td width="156"><?php echo form_dropdown("sheetopt",array('0'=>'')+$sheetopt,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
        <td width="666"><span style="padding-top:5px;">
          <input type="submit" class="btn btn-primary" name="save" value="Save" />
        </span></td>
        <td width="114"></td>
      </tr>
    </table>
	 <?php print form_close(); ?>  
  </div>
  <div id="tabs-3">
  <?php print form_open('candidates/admin/open_myworksheet/');?>
<table width="1237">
 <tr>
   <td width="12%">Open My Worksheet </td>
   <td width="18%"><?php echo form_dropdown("myworksheet",$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
   <td width="70%" colspan="7"><input type="submit" class="btn btn-primary" name="submit" value="Open" /></td>
   </tr>
   </table>
   <?php print form_close(); ?>
  <?php print form_open('candidates/admin/open_worksheet/');?>
  <table width="1237">
  
  

 <tr>
    <td colspan="8"><div id="country" style="width:155px;float:left;">Segment Type<br/>
             <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypepid', style='width:150px; height:150px; background-color:#CCCCCC'");
    ?>
      </div>
        <div id="masterworksheettopull">Part of Master Worksheet<br/>
            <?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div>
      <script type="text/javascript">
	  	$("#segmenttypepid").click(function(){
	    		 if( $('#segmenttypepid :selected').length > 0){
        //build an array of selected values
        var segmenttypepid= $("#segmenttypepid").val();

        $('#segmenttypepid :selected').each(function(i, selected) {
            segmenttypepid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_masterworksheettopull')?>",
							data: {'segmenttypepid':segmenttypepid},
							success: function(msg){
								$('#masterworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script> </td>
   
  </tr>
   <tr>
    <td width="56%">&nbsp;</td>
    <td width="44%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
  <h2></h2>
</table>
 <?php print form_close(); ?>  
  </div>
   </div>
   
   <h2></h2>
<?php echo "<h3>".$worksheetname." ( Total candidates found :: ".$total." )</h3>"; ?>
<?php $page = $this->uri->segment(3); ?>
<?php $wor = $this->uri->segment(4); ?>
<?php $pagenos = $this->uri->segment(5); ?>

<?php echo form_open('candidates/admin/sort_worksheet/'.$wor); ?>
<input name="worksheett" type="hidden" value="<?php echo $openedworksheet; ?>"/>
<table width="100%">
  <tr>
    <th scope="col">Sort </th>
    <th scope="col"><select name="column_name" style="width:150px">
	<option value="candidate_name">Candidate Name</option>
	<option value="job_title">Job Title</option>
      <option value="current_company">Company</option>
	  <option value="current_location">Location</option>
	  <option value="grade">Grade</option>
	  <option value="salary">Salary</option>
	  <option value="entered_by">Consultant</option>
	  <option value="entered_on">Entered On</option>
    </select>
    </th>
    <th scope="col">in Order </th>
    <th scope="col"><select name="order" style="width:150px">
      <option value="ASC">Ascending</option>
	   <option value="DESC">Descending</option>
    </select></th>
    <th scope="col"><input type="submit" class="btn btn-primary" name="sort" value="Sort" /></th>
  </tr>
</table>
<?php echo form_close(); ?>
<?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
$scribble_image = "http://software.triedge.in/assets/icons/scribble.png";

$atts1 = array(
              'width'      => '300',
              'height'     => '760',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
?>
<div align="right"><div align="right"><?php echo anchor_popup('candidates/admin/worksheetscribble/'.$openedworksheet.'/', img($scribble_image), $atts); ?><div align="right" style="margin-right:50px; margin-top:-17px;"><?php echo anchor_popup('candidates/admin/countcompanywise/'.$openedworksheet, 'Companywise Counts', $atts1); ?><div align="right" style="margin-right:130px; margin-top:-17px;"><?php echo anchor_popup('candidates/admin/countlocationwise/'.$openedworksheet, 'Locationwise Counts', $atts1); ?><div align="right" style="margin-right:130px; margin-top:-17px;"><?php echo anchor_popup('candidates/admin/worksheetposition/'.$openedworksheet.'/', 'Worksheet Positions', $atts1); ?><div align="right" style="margin-right:130px; margin-top:-17px;"><?php echo anchor_popup('candidates/admin/worksheetattachment/'.$openedworksheet.'/', 'Attachments', $atts); ?><div align="right" style="margin-right:100px; margin-top:-17px;"><?php echo anchor('candidates/admin/worksheetedit/'.$page.'/'.$openedworksheet.'/'.$pagenos, 'edit mode', $atts); ?><div align="right" style="margin-right:100px; margin-top:-17px;"><?php echo anchor_popup('candidates/admin/listTags/'.$openedworksheet.'/'.$pagenos, 'Tags', $atts); ?></div></div></div></div></div></div></div></div>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Filter Search Result
								</h3>
							</div>
							<div class="box-content nopadding">
							<?php echo form_open('candidates/admin/filterworksheet'); ?>
									<table width="898">
<tr>
    <td>Type :: </td>
    <td><input type="checkbox" name="type[]" value="1" />
      Directly Input </td>
    <td><input type="checkbox" name="type[]" value="2" />
      Indirectly Input </td>
    <td width="211"><input type="checkbox" name="type[]" value="3" />
      Position</td>
    <td width="176"><input type="checkbox" name="type[]" value="4" />
      Suggested Tags </td>
    <td>&nbsp;</td>
</tr>
 
  <tr>
    <td width="155">Column Search </td>
    <td width="223"><select name="heading" id="heading">
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
    <td width="201">Keyword</td>
    <td colspan="2"><input name="keyword" type="text" id="keyword" size="60" /></td>
    <td width="98"><div align="right">
      <input name="submit22" type="submit" class="btn btn-primary" id="submit22" value="Search" />
    </div></td>
  </tr>
   
	 
	 <tr>
	   <td colspan="6">&nbsp;</td>
	   </tr>
	 <tr>
       <td colspan="6">&nbsp;</td>
	 </tr>
</table>
<?php echo form_close(); ?>
							
							</div>
						</div>
					</div>
				</div>

<?php $page = $this->uri->segment(3); ?>
<?php $pagew = $this->uri->segment(4); ?>
<?php $pageno = $this->uri->segment(5); ?>

<?php 
//echo form_open('candidates/admin/excel/'.$page); 
 echo form_open('candidates/admin/foldera/'.$page.'/'.$pagew.'/'.$pageno);
?>
<input name="openedworksheet" type="hidden" value="<?php echo $openedworksheet; ?>"/>

<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Candidate List
								</h3>
							</div>
							<div class="box-content nopadding">
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



 <h2></h2> <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>

</div>
						</div>
					</div>
				</div>

 <?php echo $links; ?><div align="right"><div id="excel" align="right" style="margin-right:80px;>"><input type="submit" class="btn btn-primary" name="worksheet_remove" value="Remove From Woksheet" /></div><div id="delete" align="right" style="margin-bottom:40px; margin-top:-20px;"><input type="submit" class="btn btn-primary" name="delete" value="Delete" /></div></div>
    

<table width="754">
  <tr>
    <td width="173" height="26">Send to Mapping Sheet</td>
    <td width="185"><select name="folder_name" id="folder_name" style="background:#CCCCCC; width:143px;">
	<option value=""></option>
     <?php
	

             foreach ($folder as $key => $list) {

                echo "<option value='".$list['p_id']."'>" . $list['p_id'] . "</option>". "\n";

              }
			 
            ?>
    </select></td>
    <td width="135">or New Mapping Sheet</td>
    <td width="144"><input name="newfolder" id="newfolder" type="text" size="20" style="background:#CCCCCC"/></td>
    <td width="103">Sheet Option</td>
    <td width="141"><?php echo form_dropdown("sheetopt",array('0'=>'')+$sheetopt,"","id='id', style='width:150px; background-color:#CCCCCC'");?></td>
    <td width="179"><input type="submit" class="btn btn-primary" value="Go" id="submit" />    </td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="177" height="26">Send To Position</td>
    <td width="717"><?php 
	                if($userpos['group']!=3)
                      {
					  echo form_dropdown("pofid",$positions2,"","id='id', style='width:450px; background-color:#CCCCCC'");
					  }
					  else{
					   echo form_dropdown("pofid",$positions,"","id='id', style='width:450px; background-color:#CCCCCC'");
					  }
					  ?> </td>
    <td width="182"><input type="submit" class="btn btn-primary" value="Go" id="submit" />
   </td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="175" height="26">Refer To </td>
    <td width="718"><?php echo form_dropdown("userid",$user,"","id='id', style='width:250px; background-color:#CCCCCC'");?> </td>
    <td width="183"><input type="submit" class="btn btn-primary" value="Go" id="submit" />
   </td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="181" height="26">Send to My Worksheet </td>
    <td width="712"><?php echo form_dropdown("myworksheet",array('0'=>'')+$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
    <td width="183"><input type="submit" class="btn btn-primary" name="add" value="Go" id="submit" />
   </td>
  </tr>
</table>

<table width="1237">
  
  

  <tr>
    <td colspan="2"><strong>Add to Worksheet </strong></td>
  </tr>
  <tr>
    <td colspan="2"><div id="country" style="width:200px;float:left;">Segment Type<br/>
           <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypesid', style='width:180px; height:150px; background-color:#CCCCCC'");
    ?>
        </div>      
	 <div id="masterworksheetsend">Part of Master Worksheet<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
    <script type="text/javascript">
	  	$("#segmenttypesid").click(function(){
	    		 if( $('#segmenttypesid :selected').length > 0){
        //build an array of selected values
        var segmenttypesid= $("#segmenttypesid").val();

        $('#segmenttypesid :selected').each(function(i, selected) {
            segmenttypesid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_masterworksheettosend')?>",
							data: {'segmenttypesid':segmenttypesid},
							success: function(msg){
								$('#masterworksheetsend').html(msg);
							}
				  	});
	    		}
	    });
	   </script>	   </td>
  </tr>
  <tr>
    <td width="87%">&nbsp;</td>
    <td width="13%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
</table>

<?php if($message=='0')
{
 echo " ";
}
else
{
  print  '<div id="dialog-confirm" title="'.$title.'"> 
	<p>
		
		<input type="hidden" value="'.$id.'" id="is_read" name="is_read">'.$message.'<br/>'.'- '.$sentby.'-'.$datesent.'</p> 
</div> ';
}
?>


</body>
</html>
