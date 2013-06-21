
<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>

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
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
		<script>
     $(function(){

	// add multiple select / deselect functionality
	$("#selectall").click(function () {
		  $('.case').attr('checked', this.checked);
	});

	// if all checkbox are selected, check the selectall checkbox
	// and viceversa
	$(".case").click(function(){

		if($(".case").length == $(".case:checked").length) {
			$("#selectall").attr("checked", "checked");
		} else {
			$("#selectall").removeAttr("checked");
		}

	});
});
</script>
		<script>
     $(function(){

	// add multiple select / deselect functionality
	$("#selectall").click(function () {
		  $('.case').attr('checked', this.checked);
	});

	// if all checkbox are selected, check the selectall checkbox
	// and viceversa
	$(".case").click(function(){

		if($(".case").length == $(".case:checked").length) {
			$("#selectall").attr("checked", "checked");
		} else {
			$("#selectall").removeAttr("checked");
		}

	});
});
</script>

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
            			"<li>"+ ui.item.id + "</li>"
            		);           		
         		},		
    		});
	    });
	    </script>
		<script type="text/javascript">
	    $(this).ready( function() {
    		$("#location").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/candidates/admin/lookuplocation",
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
            			"<li>"+ ui.item.id + "</li>"
            		);           		
         		},		
    		});
	    });
	    </script>
  
<br/>
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
<div  class="btn"><i class="icon-user"></i>                
	<?php echo anchor_popup('candidates/admin/newCandidate/', 'New Candidate', $atts); ?>
</div>

<h2></h2>
<div id="tabs">
<ul>
		<li><a href="#tabs-1">Simple Search</a></li>
		<li><a href="#tabs-2">Advanced Search</a></li>
		<li><a href="#tabs-3">Folder Search</a></li>
		<li><a href="#tabs-4">Worksheet Search</a></li>
  </ul>

			<div id="tabs-1">
<?php print form_open('candidates/admin/search/');?>
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
   <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
	 <tr>
    <td colspan="6">
	<?php echo form_open('candidates/admin/alpha'); ?>
	<table width="100%">
  <tr>
    <td scope="col"><div align="center">A</div></td>
    <td scope="col"><div align="center">B</div></td>
    <td scope="col"><div align="center">C</div></td>
    <td scope="col"><div align="center">D</div></td>
    <td scope="col"><div align="center">E</div></td>
    <td scope="col"><div align="center">F</div></td>
    <td scope="col"><div align="center">G</div></td>
    <td scope="col"><div align="center">H</div></td>
    <td scope="col"><div align="center">I</div></td>
    <td scope="col"><div align="center">J</div></td>
    <td scope="col"><div align="center">K</div></td>
    <td scope="col"><div align="center">L</div></td>
    <td scope="col"><div align="center">M</div></td>
    <td scope="col"><div align="center">N</div></td>
    <td scope="col"><div align="center">O</div></td>
    <td scope="col"><div align="center">P</div></td>
    <td scope="col"><div align="center">Q</div></td>
    <td scope="col"><div align="center">R</div></td>
    <td scope="col"><div align="center">S</div></td>
    <td scope="col"><div align="center">T</div></td>
    <td scope="col"><div align="center">U</div></td>
    <td scope="col"><div align="center">V</div></td>
    <td scope="col"><div align="center">W</div></td>
    <td scope="col"><div align="center">X</div></td>
    <td scope="col"><div align="center">Y</div></td>
    <td scope="col"><div align="center">Z</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <input name="alpha" type="radio" value="a" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="b" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="c" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="d" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="e" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="f" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="g" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="h" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="i" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="j" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="k" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="l" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="m" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="n" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="o" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="p" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="q" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="r" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="s" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="t" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="u" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="v" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="w" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="x" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="y" />
    </div></td>
    <td><div align="center">
      <input name="alpha" type="radio" value="z" />
    </div></td>
  </tr>
   <tr>
     <td colspan="26"><div align="right">
      <input name="alphain" type="submit" class="btn btn-primary" id="submit2" value="Search" />
    </div></td>
     </tr>
</table>
<?php echo form_close(); ?>
</td>
    </tr>
	 <tr>
	   <td colspan="6">&nbsp;</td>
	   </tr>
	 <tr>
       <td colspan="6">&nbsp;</td>
	 </tr>
</table>
</div>


<?php print form_close(); ?>
  			<div id="tabs-2">
			<?php print form_open('candidates/admin/new_advanced_search/');?>

		<table width="858">
  
  <tr>
    <td width="679" height="24">&nbsp;</td>
    <td width="167"><input name="new_search" type="submit" class="btn btn-primary" id="search" value="New Search" /></td>
  </tr>
</table>
<?php print form_close(); ?>
<?php print form_open('candidates/admin/advanced_search/');?>
<table width="858">
  
  <tr>
    <td width="113" height="24">Candidate Name </td>
    <td width="153"><input type="text" name="candidatename" id="candidatename" /></td>
    <td width="124">Current Location </td>
    <td width="144"><input type="text" name="currentlocation" id="location" /></td>
    <td width="132">Region</td>
    <td width="164"><input type="text" name="region" id="region" /></td>
  </tr>
  <tr>
    <td height="24">Current Company </td>
    <td><input type="text" name="currentcompany" id="provinsi_id" /></td>
    <td>Industry </td>
    <td><input type="text" name="industry" id="industry" /></td>
    <td>Sub-Industry</td>
    <td><input type="text" name="subindustry" id="subindustry" /></td>
  </tr>
  <tr>
    <td height="24">Function</td>
    <td><input type="text" name="indfunction" id="indfunction" /></td>
    <td>Sub-Function </td>
    <td><input type="text" name="subfunction" id="subfunction" /></td>
    <td>Department</td>
    <td><input type="text" name="department" id="department" /></td>
  </tr>
  <tr>
    <td height="24">Job Title </td>
    <td><input name="jobtitle" type="text" id="jobtitle" /></td>
    <td>Worksheet</td>
    <td><input type="text" name="worksheet" id="worksheet" /></td>
    <td>Entered By </td>
    <td><?php echo form_dropdown("enteredby",array('0' => '')+$users,"","id='id', style='width:170px; background-color:#CCCCCC'");?></td>
  </tr>
  <tr>
    <td height="24">Designation</td>
    <td><input type="text" name="designation" id="designation" /></td>
    <td>Grade</td>
    <td><input type="text" name="grade" id="grade" /></td>
    <td>Level</td>
    <td><input type="text" name="level" id="level" /></td>
  </tr>
  <tr>
    <td height="24">Course</td>
    <td><input type="text" name="course" id="course" /></td>
    <td>Institute</td>
    <td><input type="text" name="institute" id="institute" /></td>
    <td>Passing Year </td>
    <td><input type="text" name="passingyear" id="passingyear" /></td>
  </tr>
  <tr>
    <td height="26" colspan="5">&nbsp;</td>
    <td><input name="submit" type="submit" class="btn btn-primary" id="submit" value="Search" /></td>
  </tr>
</table>
</div>
<?php print form_close(); ?>

		<div id="tabs-3">
<?php print form_open('candidates/admin/open_folder/');?>
<table width="771">

  <tr>
    <td width="111">Open Folder </td>
    <td width="152"><select name="folder_name" style="background:#CCCCCC; width:143px;">
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
    <td width="122"></td>
    <td width="358" colspan="3"><input name="submit" type="submit" class="btn btn-primary" id="submit" value="Open" /></td>
  </tr>
</table>
</div>

<?php print form_close(); ?>
			<div id="tabs-4">
			<?php print form_open('candidates/admin/open_myworksheet/');?>
<table width="1237">
 <tr>
   <td width="12%">Open My Worksheet </td>
   <td width="69%"><?php echo form_dropdown("myworksheet",$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
   <td colspan="7"><input type="submit" class="btn btn-primary" name="submit" value="Open" /></td>
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
    <td width="94%">&nbsp;</td>
    <td width="6%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
  <h2></h2>
</table>

</div>
</div>
<h2></h2>
<?php print form_close(); ?>
<?php $page = $this->uri->segment(3); ?>
<?php echo form_open('candidates/admin/foldera/'.$page); ?>
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

 <?php echo $links; ?><div align="right"><input type="submit" class="btn btn-primary" name="delete" value="Delete" /></div>
    

					<div class="row-fluid">
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




</body>
</html>
