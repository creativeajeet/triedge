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
	$("#selectalll").click(function () {
		  $('.casee').attr('checked', this.checked);
	});

	// if all checkbox are selected, check the selectalll checkbox
	// and viceversa
	$(".casee").click(function(){

		if($(".casee").length == $(".casee:checked").length) {
			$("#selectalll").attr("checked", "checked");
		} else {
			$("#selectalll").removeAttr("checked");
		}

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
	#updated{
	color: #00CC00;
	}
	#notupdated{
	color: #FF0000;
	}

	</style>
<?php $page = $this->uri->segment(4); ?>
<?php echo form_open('synonym/admin/listtypejump/'); ?>
<div align="left" id="listtype">
  <p>List Type<select name="listtype" style='width:170px; background-color:#CCCCCC'>
  <option value="industry">Industry</option>
  <option value="indfunction">Function</option>
  <option value="location">Location</option>
  <option value="region">Region</option>
  <option value="designation">Designation</option>
  <option value="grade">Grade</option>
  <option value="institute">Institute</option>
  <option value="course">Course</option>
</select> 
    <input name="go" type="submit" class="btn btn-primary" value="GO" />
</p>
  <div align="right" id="manageps">
  <div align="right" id="manageps" style="margin-right:250px; margin-bottom:-35px;">
   <p align="right"><?php echo anchor('synonym/admin/managesynonym','Edit Parent-Synonyms'); ?> </p>
</div>
<p align="right"><?php echo anchor('synonym/admin/cleanedCompList','Company - Cleaned Synonym Group List'); ?> </p>
</div>
</div>
<?php echo form_close(); ?>	
<h2>Company - Cleaned Synonym List</h2>
<div align="right"><div align="right" style="margin-right:10px; margin-top:-17px;"><span id="notupdated">Company - Cleaned Synonym :: <?php echo $total; ?></span></div></div>
<div align="left" style="margin-top:-15px;"><div align="left"><div align="left" style="margin-top:-18px;"><?php echo anchor('synonym/admin/', '<span>Company - Pending Synonym Group List</span>'); ?></div><div align="left" style="margin-left:250px; margin-top:-18px;"><?php echo anchor('synonym/admin/noncore', '<span>Non-Core</span>'); ?></div></div></div>
<?php $category = $this->uri->segment(3); ?>
<?php echo form_open('synonym/admin/updatecomp/'.$category.'/'.$page); ?><div class="row-fluid">
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
		echo "<th width='15%'>Name</th>\n";
		echo "<th width='30%'>Old Company</th>\n";
		echo "<th>Current Company</th>\n";
		
		echo "<th>Status</th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
 echo    "<td><input class='case' name='c_id[]' value='".$row->id."' type='checkbox'></td>";
 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
echo    "<td>$row->company</td>";

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


 <h2></h2> <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>

</div>
						</div>
					</div>
				</div>

 <?php echo $links; ?><div align="left" style="position:relative">Jump to page no.<input type="text" name="jumper" size="6" /><input type="submit" class="btn btn-primary" name="jump" value="GO" /></div><div align="right" style="position:relative; margin-top:-10px; margin-bottom:20px;"><input type="submit" class="btn btn-primary" name="update" value="Update" /></div>
    </div>
	<h2></h2>
<table width="100%">
   <tr>
     <th width="8%" scope="col"><div align="left">Replace</div></th>
     <th width="30%" scope="col"><div align="left">
         <input name="replace" type="text" size="50" style="background:#CCCCCC"/>
     </div></th>
     <th width="10%" scope="col"><div align="center">With</div></th>
     <th width="32%" scope="col"><div align="left">
         <input name="replacewith" type="text" size="50" style="background:#CCCCCC"/>
     </div></th>
     <th width="20%" scope="col"><div align="left">
         <input name="run" type="submit" class="btn btn-primary"  value="Run" />
     </div></th>
   </tr>
</table>	
