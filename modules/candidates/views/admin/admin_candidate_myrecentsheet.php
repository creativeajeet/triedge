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
  </head>


<body>
<?php $sheetname = $this->uri->segment(4); ?>
 <h2>My Mapping Sheet - <?php echo $sheetname; ?></h2>
<?php $page = $this->uri->segment(3); ?>
<?php echo form_open('candidates/admin/export/'.$sheetname); ?>
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
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
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
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>



 <h2></h2>
 <div align="right"><input type="submit" class="btn btn-primary" name="exportexcel" value="Export Excel Sheet" />

</body>
</html>
