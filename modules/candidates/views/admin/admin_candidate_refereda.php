<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<base href="<?php echo substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>" />
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.autopopulatebox.js" type="text/javascript"></script>

<script type="text/javascript">
	
	    $(this).ready( function() {
    		$("#list_id").autocomplete({
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
    		$("#cons_id").autocomplete({
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
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}
	
	
	</style>
  </head>

  <body>
  <div><a href="#" id="choice" class='green-button pcb'><span>Advanced Search</span></a></div>
			<div id="choices" style="display:none">
<?php print form_open('candidates/admin/advanced_search/');?>
<table width="858">
  
  <tr>
    <td width="113" height="24">Candidate Name </td>
    <td width="153"><input type="text" name="candidatename" id="candidatename" /></td>
    <td width="124">Current Location </td>
    <td width="144"><input type="text" name="currentlocation" id="currentlocation" /></td>
    <td width="132">Region</td>
    <td width="164"><input type="text" name="region" id="region" /></td>
  </tr>
  <tr>
    <td height="24">Current Company </td>
    <td><input type="text" name="currentcompany" id="currentcompany" /></td>
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
    <td colspan="5"><input name="jobtitle" type="text" id="jobtitle" size="71" /></td>
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
      <option value="year_of_passing">Year Of Passing</option><option value="entered_by">Entered By</option>
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
		<table width="758" border="1">
		<input type="hidden" value='' id="id" name="id">
  <tr>
    <td width="75" height="28"><div align="left">Worksheet1</div></td>
    <td width="143">
      <div align="left">
        <select id="worksheet1_search" name="worksheet1_search"  style="width:143px; background-color:#CCCCCC">
        <?php foreach ($tests_worksheet_search as $key => $test): ?>
        <option value="<?php echo $key; ?>"> <?php echo $test; ?> </option>
        <?php endforeach; ?>
      </select>
      </div></td>
    <td width="108"><div align="left">Worksheet2</div></td>
    <td width="213">
      <div align="left">
        <select id="worksheet2_search" name="worksheet2_search"  style="width:143px;  background-color:#CCCCCC">
      </select>
      </div></td>
    <td width="185">
          <input type="submit" class="btn btn-primary" value="Go" id="submit" />
           
    </li></td>
  </tr>
</table>
<script>
	jQuery(function($) {
		$('#worksheet1_search').autoPopulateBox({
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',
			change: 'worksheet2',
			
			worksheet2: {
				target: '#worksheet2_search',
				change: 'content2'
			},
			content2: {
				target: '#contents2'
			}
		});
	});
</script>

</div>
<h2></h2>
<?php print form_close(); ?>
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

	<?php echo validation_errors(); ?>
  <?php print form_open_multipart('candidates/admin/home/');?>	
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
<?php
 if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
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
  echo    "<td>".form_checkbox('c_id[]',$row->id,FALSE)."</td>";
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

 <?php echo $links; ?>
    </div>

		
		
		
		
		
		<table width="754">
  <tr>
    <td colspan="3"><strong>Attachment</strong></td>
    </tr>
  <tr>
    <td width="134">File</td>
    <td width="425"><?php echo form_upload('userfile'); ?></td>
    <td width="179"><?php echo form_submit('upload', 'Upload'); ?></td>
  </tr>
</table>	
  
		<table width="754" height="34" border="1">
		<input type="hidden" value='' id="id" name="id">
  
  <tr>
    <td width="135" height="28"><div align="left">Send to Worksheet1</div></td>
    <td width="143">
      <div align="left">
        <select id="worksheet1_send" name="worksheet1_send"  style="width:143px; background-color:#CCCCCC">
          <?php foreach ($tests_worksheet_send as $key => $test): ?>
          <option value="<?php echo $key; ?>"> <?php echo $test; ?> </option>
          <?php endforeach; ?>
        </select>
    </div></td>
    <td width="92"><div align="left">Worksheet2</div></td>
    <td width="169">
      <div align="left">
        <select id="worksheet2_send" name="worksheet2_send"  style="width:143px;  background-color:#CCCCCC">
        </select>
    </div></td>
    <td width="181">
          <input type="submit" class="btn btn-primary" value="Go" id="submit" />
           

    </li></td>
  </tr>
</table>
<script>
	jQuery(function($) {
		$('#worksheet1_send').autoPopulateBox({
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',
			change: 'worksheet2',
			
			worksheet2: {
				target: '#worksheet2_send',
				change: 'content2'
			},
			content2: {
				target: '#contents2'
			}
		});
	});
</script>

<table width="754">
  <tr>
    <td width="137" height="26">Send to Mapping Sheet</td>
    <td width="144"><select name="folder_name" id="folder_name" style="background:#CCCCCC; width:143px;">
	<option value=""></option>
     <?php
	

             foreach ($folder as $key => $list) {

                echo "<option value='".$list['p_id']."'>" . $list['p_id'] . "</option>". "\n";

              }
			 
            ?>
    </select></td>
    <td width="93">or New Mapping Sheet</td>
    <td width="173"><input name="newfolder" id="newfolder" type="text" size="20" style="background:#CCCCCC"/></td>
    <td width="183"><input type="submit" class="btn btn-primary" value="Go" id="submit" />    </td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="133" height="26">Refer To </td>
    <td width="425"><?php echo form_dropdown("userid",$user,"","id='id', style='width:250px; background-color:#CCCCCC'");?> </td>
    <td width="180"><input type="submit" class="btn btn-primary" value="Go" id="submit" />
   </td>
  </tr>
</table>

</body>
</html>
