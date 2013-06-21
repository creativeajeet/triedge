<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

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
	tr, td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}
 td.content
	{
	background-color:#CCCCCC;
	position:relative;
	width:250px;
	}
	</style>
	<style type="text/css">

	.tableBoxOuter {
		width:100%;
		height:1300px; 
		background: #FFFFFF;
	}

	.scrolltable td, th {
		font-size: 12px;
		font-family: verdana, arial, sans-serif;
		margin:0em;
		padding-top: 4px;
		padding-bottom: 4px;
		padding-right: 4px;
		padding-left: 4px;
		table-layout: automatic;
		white-space: nowrap;
	}

</style>


</head>


<body>

<h2></h2>

<?php $pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0; ?>
<?php echo form_open('candidates/admin/dupRemover/'.$pageno); ?>
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
 echo "<table id='mainTable' class='scrolltable'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='center'>Del</div></th>\n";
		echo "<th><div align='center'>Up</div></th>\n";
		echo "<th>Candidate Name</th>\n";
		echo "<th>CV</th>\n";
		echo "<th>Entered On</th>\n";
		echo "<th>Current Co.</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Email</th>\n";
		echo "<th><div align='center'>Telephone</div></th>\n";
		echo "<th>Current Loc.</th>\n";
		echo "<th>Designation</th>\n";
		echo "<th>Department</th>\n";
		echo "<th>Grade</th>\n";
		echo "<th>Level</th>\n";
		echo "<th>Salary</th>\n";
		echo "<th>Since</th>\n";
		echo "<th>Reports To</th>\n";
		echo "<th>Current Role</th>\n";
		echo "<th>Industry</th>\n";
		echo "<th>Subindustry</th>\n";
		echo "<th>Function</th>\n";
		echo "<th>SubFunction</th>\n";
		echo "<th>Prev.Company</th>\n";
		
		echo "<th>Course</th>\n";
	    echo "<th><div align='center'>Passing Year</div></th>\n";
		echo "<th>Institute</th>\n";
		echo "<th>Birth Year</th>\n";
		echo "<th>Profile Brief</th>\n";
		echo "<th>Comment</th>\n";
		echo "<th>Name</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
 echo    "<th><input class='case' name='cdel_id[]' value='".$row->id."' type='checkbox'>D</th>";
 echo    "<th><input class='case' name='cup_id[]' value='".$row->id."' type='hidden'><input class='case' value='".$row->id."' type='checkbox'>U</th>";
 echo    "<th class='content'>$row->candidate_name</th>";
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
echo    "<th>$row->entered_on</th>";

 echo    "<td><input type='text' name='current_company[]' id='current_company' value='$row->current_company' size='8'/></td>";
  echo    "<td><input type='text' name='job_title[]' id='job_title' value='$row->job_title'/></td>";
 echo    "<td><input type='text' name='email[]' id='email' value='$row->email'/></td>";
  echo    "<td><input type='text' name='telephone[]' value='$row->telephone' size='12'/></td>";
   echo    "<td><input type='text' name='current_location[]' id='current_location' value='$row->current_location' size='8'/></td>";
echo    "<td><input type='text' name='designation[]' id='designation' value='$row->designation'/></td>";
echo    "<td><input type='text' name='department[]' id='department' value='$row->department' size='15'/></td>";
echo    "<td><input type='text' name='grade[]' id='grade' value='$row->grade' size='8'/></td>";
echo    "<td><input type='text' name='level[]' id='level' value='$row->level' size='5'/></td>";
echo    "<td><input type='text' name='salary[]' id='salary' value='$row->salary' size='4'/></td>";
 echo    "<td><input type='text' name='in_current_company_since[]' id='in_current_company_since' value='$row->in_current_company_since' size='4'/></td>";
  echo    "<td><input type='text' name='reports_to[]' id='reports_to' value='$row->reports_to' size='12'/></td>";
   echo    "<td><input type='text' name='current_role[]' id='current_role' value='$row->current_role' size='12'/></td>";
    echo    "<td><input type='text' name='industry[]' id='industry' value='$row->industry' size='12'/></td>";
	 echo    "<td><input type='text' name='sub_industry[]' id='sub_industry' value='$row->sub_industry' size='12'/></td>";
	  echo    "<td><input type='text' name='indfunction[]' id='indfunction' value='$row->indfunction' size='12'/></td>";
	   echo    "<td><input type='text' name='sub_function[]' id='sub_function' value='$row->sub_function' size='12'/></td>";
	    echo    "<td><input type='text' name='previous_company[]' id='previous_company' value='$row->previous_company' size='12'/></td>";

 echo    "<td><input type='text' name='course[]' id='course' value='$row->course'/></td>";
  echo    "<td><input type='text' name='year_of_passing[]' id='year_of_passing' value='$row->year_of_passing' size='5'/></td>";
echo    "<td><input type='text' name='institute[]' id='institute' value='$row->institute'/></td>";
echo    "<td><input type='text' name='year_of_birth[]' id='year_of_birth' value='$row->year_of_birth' size='10'/></td>";
echo    "<td><textarea name='profile_brief[]'>$row->profile_brief</textarea></td>";
echo    "<td><textarea name='comment[]'>$row->comment</textarea></td>";
echo    "<td class='content'>$row->candidate_name</td>";
 
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

 <?php echo $links; ?><div align="right" style="position:relative"><input type="submit" class="btn btn-primary" name="save" value="Save" /></div>
    
<script type="text/javascript">
if(typeof tableScroll == 'function'){tableScroll('mainTable');}
</script>

</body>
</html>
