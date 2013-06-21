<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
   <script type="text/javascript">
      $(function() {
         $('a#faq').click(function() {
            $('div#hidden').toggle();
            return false;
         });
      });   
   </script>
    <script type="text/javascript">
      $(function() {
         $('a#choice').click(function() {
            $('div#choices').slideToggle("slow");

            return false;
         });
      });   
   </script>
    <script type="text/javascript">
      $(function() {
         $('a#entry').click(function() {
            $('div#entry').slideToggle("slow");

            return false;
         });
      });   
   </script>
    <script type="text/javascript">
      $(function() {
         $('a#worksheet').click(function() {
            $('div#worksheet').slideToggle("slow");

            return false;
         });
      });   
   </script>
    <script type="text/javascript">
      $(function() {
         $('a#folder').click(function() {
            $('div#folder').slideToggle("slow");

            return false;
         });
      });   
   </script>
    <script type="text/javascript">
      $(function() {
         $('a#refer').click(function() {
            $('div#refer').slideToggle("slow");

            return false;
         });
      });   
   </script>
<style type="text/css">
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
	min-height: 50px;
	
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
  </head>


<body>
  <div><a href="#" id="choice" class='green-button pcb'><span>Advanced Search</span></a></div>
			<div id="choices" style="display:none">
<?php print form_open('candidates/admin/advanced_search/');?>
<table width="858">
  
  <tr>
    <td width="113" height="24">Candidate Name </td>
    <td width="153"><input type="text" name="candidatename" id="candidatename" value="<?php echo $candidatename; ?>" /></td>
    <td width="124">Current Location </td>
    <td width="144"><input type="text" name="currentlocation" id="currentlocation" value="<?php echo  $currentlocation; ?>" /></td>
    <td width="132">Region</td>
    <td width="164"><input type="text" name="region" id="region" value="<?php echo $region; ?>" /></td>
  </tr>
  <tr>
    <td height="24">Current Company </td>
    <td><input type="text" name="currentcompany" id="currentcompany" value="<?php echo $currentcompany; ?>" /></td>
    <td>Industry </td>
    <td><input type="text" name="industry" id="industry" value="<?php echo $industry; ?>" /></td>
    <td>Sub-Industry</td>
    <td><input type="text" name="subindustry" id="subindustry" value="<?php echo $subindustry; ?>" /></td>
  </tr>
  <tr>
    <td height="24">Function</td>
    <td><input type="text" name="indfunction" id="indfunction" value="<?php echo $indfunction; ?>" /></td>
    <td>Sub-Function </td>
    <td><input type="text" name="subfunction" id="subfunction" value="<?php echo $subfunction; ?>" /></td>
    <td>Department</td>
    <td><input type="text" name="department" id="department" value="<?php echo $department; ?>" /></td>
  </tr>
  <tr>
    <td height="24">Job Title </td>
    <td colspan="5"><input name="jobtitle" type="text" id="jobtitle" size="71"  value="<?php echo $jobtitle; ?>"/></td>
  </tr>
  <tr>
    <td height="24">Designation</td>
    <td><input type="text" name="designation" id="designation" value="<?php echo $designation; ?>" /></td>
    <td>Grade</td>
    <td><input type="text" name="grade" id="grade" value="<?php echo $grade; ?>" /></td>
    <td>Level</td>
    <td><input type="text" name="level" id="level" value="<?php echo $level; ?>" /></td>
  </tr>
  <tr>
    <td height="24">Course</td>
    <td><input type="text" name="course" id="course" value="<?php echo $course; ?>" /></td>
    <td>Institute</td>
    <td><input type="text" name="institute" id="institute" value="<?php echo $institute; ?>" /></td>
    <td>Passing Year </td>
    <td><input type="text" name="passingyear" id="passingyear" value="<?php echo $paasingyear; ?>" /></td>
  </tr>
  <tr>
    <td height="26" colspan="5">&nbsp;</td>
    <td><input name="search" type="submit" class="btn btn-primary" id="submit" value="Search" /></td>
  </tr>
</table>
</div>
<?php print form_close(); ?>
<div><a href="#" id="entry" class='green-button pcb'><span>Simple Search</span></a></div>
			<div id="entry" style="display:none">
<?php print form_open('candidates/admin/search/');?>
		<table width="898">

  <tr>
    <td width="111">Column Search </td>
    <td width="152"><select name="heading" id="heading">
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
    <td width="122">Keyword</td>
    <td width="282" colspan="2"><input name="keyword" type="text" id="keyword" size="60" /></td>
    <td width="76"><input name="submit" type="submit" class="btn btn-primary" id="submit" value="Search" /></td>
  </tr>
</table>
</div>

<?php print form_close(); ?>
<div><a href="#" id="folder" class='green-button pcb'><span>Open folder</span></a></div>
			<div id="folder" style="display:none">
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
<div><a href="#" id="worksheet" class='green-button pcb'><span>Open Worksheet</span></a></div>
			<div id="worksheet" style="display:none">
<?php print form_open('candidates/admin/open_worksheet/');?>
<table width="1237">
  
  

 <tr>
    <td colspan="8"><div id="country" style="width:270px;float:left;">Segment Type<br/>
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

<h2></h2>
<?php print form_close(); ?>
<?php  
echo form_open('candidates/admin/columnSort/');
$atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/newCandidate/', img('http://software.triedge.in/assets/icons/cand.png'), $atts)."</td>";
echo    "<div style='margin-top:-20px; margin-bottom:10px; margin-right:360px;' align='right'><strong>Sort By ::</strong></div>";
echo    "<div style='margin-top:-30px; margin-bottom:10px; margin-right:220px;' align='right'><select name='column_name'>
  <option value='worksheet1'>Worksheet</option>
  <option value='candidate_name'>Candidate Name</option>
  <option value='current_company'>Current Comapny</option>
  <option value='current_location'>Location</option>
  <option value='institute'>Institute</option>
  <option value='year_of_passing'>Passing Year</option>
  <option value='last_updated'>Last Updated</option>
</select></div>";
echo    "<div style='margin-top:-30px; margin-bottom:10px; margin-right:150px;' align='right'><strong> in Order</strong></div>";
echo    "<div style='margin-top:-25px; margin-bottom:10px; margin-right:40px;' align='right'><select name='order'>
  <option value='ASC'>Ascending</option>
  <option value='DESC'>Descending</option>
  </select></div>";

echo    "<div style='margin-top:-30px; margin-bottom:10px;' align='right'><input type='submit' name='Submit' value='Go' /></div>";
?>
<?php print form_close(); ?>
<?php echo form_open_multipart('candidates/admin/home'); ?><div class="row-fluid">
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
 if(!$row->filepath)
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
    </div>

<table width="754">
  <tr>
    <td width="196" height="26">Send to Mapping Sheet</td>
    <td width="252"><select name="folder_name" id="folder_name" style="background:#CCCCCC; width:143px;">
	<option value=""></option>
     <?php
	

             foreach ($folder as $key => $list) {

                echo "<option value='".$list['p_id']."'>" . $list['p_id'] . "</option>". "\n";

              }
			 
            ?>
    </select></td>
    <td width="143">or New Mapping Sheet</td>
    <td width="364"><input name="newfolder" id="newfolder" type="text" size="20" style="background:#CCCCCC"/></td>
    <td width="321"><input type="submit" class="btn btn-primary" value="Go" id="submit" />    </td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="196" height="26">Send To Position</td>
    <td width="766"><?php echo form_dropdown("pofid",$positions,"","id='id', style='width:450px; background-color:#CCCCCC'");?> </td>
    <td width="322"><input type="submit" class="btn btn-primary" value="Go" id="submit" />
   </td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="196" height="26">Refer To </td>
    <td width="766"><?php echo form_dropdown("userid",$user,"","id='id', style='width:250px; background-color:#CCCCCC'");?> </td>
    <td width="322"><input type="submit" class="btn btn-primary" value="Go" id="submit" />
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
    <td>&nbsp;</td>
    <td colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
  <tr>
    <td width="87%">&nbsp;</td>
    <td width="13%" colspan="-5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>


</body>
</html>
