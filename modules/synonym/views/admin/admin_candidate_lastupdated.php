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
<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 200px; 
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
	#updated{
	color: #00CC00;
	}
	#notupdated{
	color: #FF0000;
	}

	</style>
<h2></h2>
<h2>Company names updated</h2>

<?php $page = $this->uri->segment(4); ?>
<?php echo form_open('synonym/admin/lastupdated/'); ?><div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Candidate List
								</h3>
							</div>
							<div class="box-content nopadding">
<?php if (count($lastupdated)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='left'><input id='selectall' type='checkbox'></div></th>\n";
		echo "<th>Name</th>\n";
		echo "<th>Old Company</th>\n";
		echo "<th>Current Company</th>\n";
		echo "<th>Status</th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($lastupdated as $row){
 
echo "<tr valign='top'>\n";
 echo    "<td><input class='case' name='c_id[]' value='".$row->id."' type='checkbox'></td>";
 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td><input class='case' name='cand_id[]' value='".$row->id."' type='hidden'><input type='text' name='companyname[]' size=50 value='".$row->company."' /></td>";
 if(($row->is_company_updated)==1)
   {
      echo    "<td><span id='updated'>Updated</span></td>";
   }
  else{
   echo    "<td><span id='notupdated'>Not Updated</span></td>";
  }
   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>


 <h2></h2>
 

 </div>

<div align="right" style="position:relative; margin-top:-10px; margin-bottom:20px;"><input type="submit" class="btn btn-primary" name="update" value="Update" /></div>
    </div>
	