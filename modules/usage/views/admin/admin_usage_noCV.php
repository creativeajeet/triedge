 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script> <script>
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

<h2>CVs not attached</h2>
<?php $user = $this->uri->segment(4); ?>
<?php echo form_open('usage/admin/noCVSort/'.$user); ?>
<table width="100%">
  <tr>
    <th scope="col">Sort </th>
    <th scope="col"><select name="column" style="width:150px">
	<option value="candidate_name">Candidate Name</option>
	<option value="current_company">Company</option>
	<option value="job_title">Job Title</option>
      <option value="worksheet1">Worksheet</option>
	  
    </select>
    </th>
    <th scope="col">in Order </th>
    <th scope="col"><select name="order" style="width:150px">
      <option value="ASC">Ascending</option>
	   <option value="DESC">Descending</option>
    </select></th>
    <th scope="col"><input type="submit" class="btn btn-primary" name="Submit" value="Sort" /></th>
  </tr>
</table>
<?php print form_close(); ?>
<?php $page = $this->uri->segment(3); ?>
<?php echo form_open('usage/admin/foldera/'.$page.'/'.$user); ?>
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
	echo "<th><div align='left'><input id='selectall' type='checkbox'></div></th>\n";
	echo "<th></th>\n";
	echo "<th>Worksheet1</th>\n";
     echo "<th>Worksheet2</th>\n";
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
 echo    "<td>$row->worksheet2</td>";
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
  <table width="754">
  <tr>
    <td width="196" height="26">Send to Folder</td>
    <td width="252"><select name="folder_name" id="folder_name" style="background:#CCCCCC; width:143px;">
	<option value=""></option>
     <?php
	

             foreach ($folder as $key => $list) {

                echo "<option value='".$list['p_id']."'>" . $list['p_id'] . "</option>". "\n";

              }
			 
            ?>
    </select></td>
    <td width="143">or New Folder </td>
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
    <td width="766"><?php echo form_dropdown("userid",$usernames,"","id='id', style='width:250px; background-color:#CCCCCC'");?> </td>
    <td width="322"><input type="submit" class="btn btn-primary" value="Go" id="submit" />
   </td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="196" height="26">Send to My Worksheet </td>
    <td width="766"><?php echo form_dropdown("myworksheet",array('0'=>'')+$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
    <td width="322"><input type="submit" class="btn btn-primary" name="add" value="Go" id="submit" />
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

