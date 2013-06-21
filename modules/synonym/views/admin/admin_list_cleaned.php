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
            			"<li>"+ ui.item.value + "</li>"
            		);           		
         		},		
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
	#synonym{
	color: #00CC00;
	}
	#parent{
	color: #FF0000;
	}
	</style>

<?php $page = $this->uri->segment(3); ?>
<?php $ppage = $this->uri->segment(5); ?>
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
  <div align="right" id="manageps" style="margin-right:200px; margin-bottom:-35px;">
   <p align="right"><?php echo anchor('synonym/admin/managesynonym','Edit Parent-Synonyms'); ?> </p>
</div>
<p align="right"><?php echo anchor('synonym/admin/index','Company - Cleaned Synonym List'); ?> </p>
</div>
</div>
<?php echo form_close(); ?>	
<h2>Company - Cleaned Synonym List</h2>
<div align="right"><div align="right"><span id="updated">:: </span><div align="right" style="margin-right:10px; margin-top:-17px;"><span id="notupdated">Company Groups Sent to synonym :: <?php echo $total; ?></span></div></div></div>
<div align="left" style="margin-top:-15px;"><div align="left"><div align="left" style=" margin-top:-18px;"><?php echo anchor('synonym/admin/', '<span>Company - Pending Synonym List</span>'); ?></div><div align="left" style="margin-left:200px; margin-top:-18px;"><?php echo anchor('synonym/admin/noncore', '<span>Non-Core</span>'); ?></div></div></div>
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

 echo "<tr>\n";
 echo "<th>".anchor('synonym/admin/cleanedCompList/','<span>All</span>',array('id'=>'all'))."</th>\n";
 echo "<th></th>";
 echo form_open('synonym/admin/filtercleanedcompps/'.$page);
	echo "<th><select name='psf'>
	 <option value='1'>Parent</option>
  <option value='0'>Synonym</option>
</select><input type='submit' name='fps' value='Filter' />";
echo form_close();
echo form_open('synonym/admin/filtercleanedcomp/'.$page);
	echo "<th><select name='cpages'>
	 <option value='1'>Yes</option>
  <option value=' '>No</option>
</select><input type='submit' name='scomp' value='Filter' /></th>\n";
	echo "</tr>\n";
	echo form_close();	
		echo form_open('synonym/admin/sendtoparent/'.$page.'/'.$ppage);
 	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='left'><input id='selectall' type='checkbox'></div></th>\n";
			echo "<th><div align='left'>Company Name</div></th>\n";
			echo "<th><div align='left'>Parent/Synonym</div></th>\n";
			echo "<th><div align='left'>Company Page</div></th>\n";
		
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
	echo '<input type="hidden" name="type" value="company"/>';
  echo    "<td><input class='case' name='synonym[]' value='".$row->synonym."' type='checkbox'></td>";
  echo    "<td>$row->synonym</td>";
  if(!$row->is_parent)
    {
	  echo    "<td><span id='synonym'>Synonym</span></td>";
	  
	}
	else{
	 echo    "<td><span id='parent'>Parent</span></td>";
	}
	if($row->is_parent)
      {
	  if(!$row->companypage)
	  {
	   echo    "<td><input class='case' name='cpage[]' type='checkbox' value='".$row->s_id."'></td>";
	  }
	  else{
	  echo    "<td><input class='case' name='cpage[]' type='checkbox' checked='checked'></td>";
	  }
	  }
	  else
	  {
	  echo    "<td></td>";
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

 <?php echo $links; ?><div align="right" style="position:relative; margin-top:-60px; margin-bottom:20px;"><input type="submit" class="btn btn-primary" name="savechanges" value="Save Changes" /></div>
 <br/>
 <br/>
 <table width="754">
  <tr>
    <td height="38">New Parent</td>
    <td><input name="newcompany" id="provinsi_id" type="text" size="20" style="background:#CCCCCC"/></td>
    <td width="169">Make Company Page </td>
    <td colspan="2"><input type="checkbox" name="companypage" value="1" /></td>
    <td width="243"><input name="gonewcompany" type="submit" class="btn btn-primary" id="submit" value="Send To New Parent" /></td>
  </tr>
  <tr>
    <td width="180" height="26">Send to Existing Parent</td>
    <td width="274">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td><input name="goexistingcompany" type="submit" class="btn btn-primary" id="goexistingcompany" value="Send To Ex. Parent" /></td>
  </tr>
  <tr>
    <td height="26" colspan="9">   <div id="country" style="width:200px;float:left;">Existing Parents <br/>
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
	   </script>  </td>    </tr>
</table>
