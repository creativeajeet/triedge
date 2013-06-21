<div id="submasterworksheet" style="width:270px;float:left;">Part of Sub-Master Worksheet<br/>
   	<?php
    	echo form_multiselect("basicworksheet[]",$option_submasterworksheet,"","id='submasterworksheetid', style='width:250px; height:150px; background-color:#CCCCCC'");
    ?>
</div>	
	<div id="basicworksheet"> Part of Basic Worksheet <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Constituents'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 	
 <script type="text/javascript">
	  	$("#submasterworksheetid").click(function(){
	    		 if( $('#submasterworksheetid :selected').length > 0){
        //build an array of selected values
        var submasterworksheetid= $("#submasterworksheetid").val();

        $('#submasterworksheetid :selected').each(function(i, selected) {
            submasterworksheetid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_basicworksheet')?>",
							data: {'submasterworksheetid':submasterworksheetid},
							success: function(msg){
								$('#basicworksheet').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
