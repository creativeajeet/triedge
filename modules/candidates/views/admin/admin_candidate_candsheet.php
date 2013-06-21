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
        <li><a href="#tabs-1">My Candidates</a></li>
		<li><a href="#tabs-2">Input Sheet</a></li>
		<li><a href="#tabs-3">Mapping Sheet</a></li>
		<li><a href="#tabs-4">Worksheet</a></li>
	</ul>
	
	  <div id="tabs-1">
	  <?php $page = $this->uri->segment(3); ?>
<?php echo form_open('candidates/admin/foldera/'.$page); ?><div class="row-fluid">
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
   <?php echo $links; ?>					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered green">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									
								</h3>
							</div>
						  <div class="box-content nopadding">
							  <table width="100%">
  <tr>
    <td width="16%">Send to Mapping Sheet</td>
    <td width="12%"><select name="folder_name" id="folder_name" style="width:143px;">
	<option value=""></option>
     <?php
	

             foreach ($folder as $key => $list) {

                echo "<option value='".$list['p_id']."'>" . $list['p_id'] . "</option>". "\n";

              }
			 
            ?>
    </select></td>
    <td width="9%"><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
    <td width="19%">or New Mapping Sheet</td>
    <td width="17%"><input name="newfolder" id="newfolder" type="text" size="20"/></td>
    <td width="12%">Sheet Option</td>
    <td width="11%"><select name="sheetopt" id="select3" style="width:150px;">
      <option value="0"></option>
      <option value="405">Personal</option>
      <option value="406">All</option>
    </select></td>
    <td width="4%"><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td>Send To Position</td>
    <td colspan="6"><?php 
	                if($userpos['group']!=3)
                      {
					  echo form_dropdown("pofid",$positions2,"","id='id', style='width:450px;'");
					  }
					  else{
					   echo form_dropdown("pofid",$positions,"","id='id', style='width:450px;'");
					  }
					  ?></td>
    <td><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td>Refer To </td>
    <td colspan="6"><?php echo form_dropdown("userid",$user,"","id='id', style='width:250px;'");?></td>
    <td><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td>Send to My Worksheet </td>
    <td colspan="6"><?php echo form_dropdown("myworksheet",array('0'=>'')+$worksheet,"","id='id', style='width:250px;'");?></td>
    <td><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td colspan="8"><strong>Add to Worksheet </strong></td>
    </tr>
  <tr>
    <td colspan="8"><div id="country" style="width:200px;float:left;">Segment Type<br/>
           <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypesid', style='width:180px; height:150px;'");
    ?>
        </div>      
	 <div id="masterworksheetsend">Part of Master Worksheet<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px; '",'disabled');
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
	   </script>	 </td>
    </tr>
	<tr>
    <td colspan="7">&nbsp;</td>
    <td><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
</table>
						  </div>
						</div>
					</div>
				</div>



<?php print form_close(); ?>
	  </div>
  <div id="tabs-2">
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
  <div id="tabs-3">
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
        <td width="86"><div align="right">Sheet Name </div></td>
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
  <div id="tabs-4">
  <?php print form_open('candidates/admin/open_myworksheet/');?>
<table width="1237">
 <tr>
   <td width="12%">Open My Worksheet </td>
   <td width="48%"><?php echo form_dropdown("myworksheet",array(''=>'')+$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
   <td width="40%" colspan="7"><input type="submit" class="btn btn-primary" name="submit" value="Open" /></td>
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
    <td width="60%">&nbsp;</td>
    <td width="40%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
  <h2></h2>
</table>
 <?php print form_close(); ?>  
  </div>
   </div>

       </div>
	
</body>
</html>