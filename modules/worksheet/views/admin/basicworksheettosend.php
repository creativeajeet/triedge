<div id="basicworksheettosend" style="width:270px;float:left;">Part of Basic Worksheet<br/>

   	<?php
    	echo form_multiselect("basicworksheet_id[]",$option_basicworksheettosend,"","id='subbasicworksheetsid', style='width:250px; height:150px; background-color:#CCCCCC'");
    ?>
</div>
<div id="subbasicworksheettosend"> Part of Sub-Basic Worksheet <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Constituents'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 	
 <script type="text/javascript">
	  	$("#subbasicworksheetsid").click(function(){
	    		 if( $('#subbasicworksheetsid :selected').length > 0){
        //build an array of selected values
        var subbasicworksheetsid= $("#subbasicworksheetsid").val();

        $('#subbasicworksheetsid :selected').each(function(i, selected) {
            subbasicworksheetsid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_subbasicworksheettosend')?>",
							data: {'subbasicworksheetsid':subbasicworksheetsid},
							success: function(msg){
								$('#subbasicworksheettosend').html(msg);
							}
				  	});
	    		}
	    });
	   </script>