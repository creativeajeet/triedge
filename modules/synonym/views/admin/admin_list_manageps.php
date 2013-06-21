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
	
	}
	#manageps{
	margin-top: -30px;

	}
	#all{
	color: #FFFFFF;
	}
	</style>
	
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
 
</div>

<?php echo form_close(); ?>
	<h2>Edit Parent - Synonym</h2>
<?php echo form_open('synonym/admin/managesynonym'); ?>	
 <table width="754">
  
  
  <tr>
    <td height="26" colspan="6"><div id="country" style="width:270px;float:left;">Existing Parents <br/>
           <?php
		   echo form_multiselect("existingcompany",$parentlist,"","id='existingcompany', style='width:260px; height:350px; background-color:#CCCCCC'");
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
	   </script>    </td>
  </tr>
  <tr>
    <td width="225" height="33" colspan="4">&nbsp;</td>
   </tr>
  <tr>
    <td width="225" height="38"><p>Rename Parent :: </p>
    <p>
      <input name="newparent" type="text" size="20" style="background:#CCCCCC"/>
      <input name="rename" type="submit" class="btn btn-primary" id="rename" value="Rename" />
    </p></td>
    <td width="225">&nbsp;</td>
    <td width="298">&nbsp;</td>
    <td width="392">&nbsp;</td>
   </tr>
   <tr>
    <td width="225" height="38"><p>
      <input name="removeparent" type="submit" class="btn btn-primary" id="removeparent" value="Remove Parent" /></p>
    </td>
    <td width="225"><input name="removesynonym" type="submit" class="btn btn-primary" id="submit" value="Remove Synonym" /></td>
    <td width="298">&nbsp;</td>
    <td width="392">&nbsp;</td>
   </tr>
</table>
