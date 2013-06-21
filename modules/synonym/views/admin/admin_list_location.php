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
    #listtype{
	margin-top: -20px;
	padding-bottom: 20px;
	}
	#manageps{
	margin-top: -30px;

	}
	#all{
	color: #FFFFFF;
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
<p align="right"><?php echo anchor('synonym/admin/cleanedLocList','Location - Cleaned Synonym Group List'); ?> </p>
</div>
</div>
<?php echo form_close(); ?>	
<h2>Location - Pending Synonym Group List</h2>
<div align="right"><div align="right"><span id="updated"><?php echo anchor('synonym/admin/listview', '<span id="updated">Candidatewise View</span>'); ?> </span><div align="right" style="margin-right:150px; margin-top:-17px;"><span id="notupdated">Location  - Pending Synonym Group :: <?php echo $total; ?></span></div></div></div>
<div align="left" style="margin-top:-15px;"><div align="left"><div align="left" style="margin-top:-18px;"><?php echo anchor('synonym/admin/senttosynonymloc', '<span>Location  - Cleaned Synonym List</span>'); ?></div><div align="left" style="margin-left:250px; margin-top:-18px;"><?php echo anchor('synonym/admin/noncore', '<span>Non-Core</span>'); ?></div></div></div>	
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
echo form_open('synonym/admin/filtercomp/'.$page);
 echo "<tr>\n";
 echo "<th>".anchor('synonym/admin/index/','<span>All</span>',array('id'=>'all'))."</th>\n";
	echo "<th><input type='text' name='compf' size='50'/><input type='submit' name='Submit' value='Filter' /></th>\n";
	 echo "<th></th>\n";
	  echo "<th><div align='left'><input id='selectalll' type='checkbox'>All</div></th>\n";
	  echo "<th><div align='left'><input id='selectallll' type='checkbox'>All</div></th>\n";
	echo "</tr>\n";
		echo form_close();
 echo form_open('synonym/admin/sendtoloc/'.$page);
 	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='left'><input id='selectall' type='checkbox'></div></th>\n";
			echo "<th><div align='left'>Location</div></th>\n";
		    echo "<th  width='30%'><div align='left'>No.</div></th>\n";
			echo "<th  width='30%'>Send to NotUpdated</th>\n";
			echo "<th  width='30%'>Send to Non-Core</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 $c = $row->current_location;
	$a = htmlentities($c);
    $b = html_entity_decode($a);
echo "<tr valign='top'>\n";
	echo '<input type="hidden" name="type" value="2"/>';
  echo    '<td><input class="case" name="synonym[]" value="'.$b.'" type="checkbox"></td>';
  echo    "<td>".$b."</td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
  echo    "<td>".anchor_popup('candidates/admin/synonymcand/'.$row->current_location,$row->countloc,$atts)."</td>";
  echo    '<td><input type="hidden" value="'.$row->id.'" /><input type="hidden" name="comps[]" value="'.$b.'" /><input class="casee" type="checkbox" name="cleaned[]" value="'.$b.'" /></td>';
   echo    '<td><input type="hidden" value="'.$row->id.'" /><input type="hidden" name="comps[]" value="'.$b.'" /><input class="caseee" type="checkbox" name="noncore[]" value="'.$b.'" /></td>';
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

 <?php echo $links; ?><div align="left" style="position:relative">Jump to page no.<input type="text" name="jumper" size="6" /><input type="submit" class="btn btn-primary" name="jump" value="GO" /></div>
 <br/>
 <br/>
 <table width="754">
  <tr>
    <td height="38">New Parent</td>
    <td><input name="newcompany" id="newcompany" type="text" size="20" style="background:#CCCCCC"/></td>
    <td><input name="gonewcompany" type="submit" class="btn btn-primary" id="submit" value="Send To New Parent" /></td>
    <td>&nbsp;</td>
   </tr>
  <tr>
    <td width="225" height="26">Send to Existing Parent</td>
    <td width="166">&nbsp;</td>
    <td width="298"><input name="goexistingcompany" type="submit" class="btn btn-primary" id="goexistingcompany" value="Send To Ex. Parent" /></td>
    <td width="392">&nbsp;</td>
   </tr>
  <tr>
    <td height="26" colspan="2"><div id="country" style="width:200px;float:left;">Existing Parents <br/>
           <?php
		   echo form_multiselect("existingcompany",$parentlist,"","id='existingcompany', style='width:180px; height:350px; background-color:#CCCCCC'");
    	 ?>
        </div>      
	 <div id="masterworksheetsend">Existing Synonyms<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Existing Synonyms'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
    <script type="text/javascript">
	  	$("#existingcompany").click(function(){
	    		 if( $('#existingcompany :selected').length > 0){
        //build an array of selected values
        var existingcompany= $("#existingcompany").val();

        $('#existingcompany :selected').each(function(i, selected) {
            existingcompany[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('synonym/admin/existingsynonym')?>",
							data: {'existingcompany':existingcompany},
							success: function(msg){
								$('#masterworksheetsend').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
    <td height="26" colspan="4"></td></td>
  </tr>
</table>
