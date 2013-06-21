<div id="submasterworksheetsend" style="width:270px;float:left;">Part of Sub-Master Worksheet<br/>
   	<?php
    	echo form_multiselect("submaster_id[]",$option_submasterworksheettosend,"","id='submasterworksheetsid', style='width:250px; height:150px; background-color:#CCCCCC'");
    ?>
	</div>
<div id="basicworksheettosend"> Part of Basic Worksheet <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Constituents'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 	
 <script type="text/javascript">
	  	$("#submasterworksheetsid").click(function(){
	    		 if( $('#submasterworksheetsid :selected').length > 0){
        //build an array of selected values
        var submasterworksheetsid= $("#submasterworksheetsid").val();

        $('#submasterworksheetsid :selected').each(function(i, selected) {
            submasterworksheetsid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_basicworksheettosend')?>",
							data: {'submasterworksheetsid':submasterworksheetsid},
							success: function(msg){
								$('#basicworksheettosend').html(msg);
							}
				  	});
	    		}
	    });
	   </script>