<div id="masterworksheetsend" style="width:250px;float:left;">Part of Master Worksheet<br/>
   	<?php
    	echo form_multiselect("segment_id[]",$option_masterworksheettosend,"","id='masterworksheettosendid', style='width:235px; height:150px; background-color:#CCCCCC'");
    ?>
	</div>
<div id="submasterworksheettosend">Part of Sub-Master Worksheet <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Sub-MasterWorksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 <script type="text/javascript">
	  	$("#masterworksheettosendid").click(function(){
	    		 if( $('#masterworksheettosendid :selected').length > 0){
        //build an array of selected values
        var masterworksheettosendid= $("#masterworksheettosendid").val();

        $('#masterworksheettosendid :selected').each(function(i, selected) {
            masterworksheettosendid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_submasterworksheettosend')?>",
							data: {'masterworksheettosendid':masterworksheettosendid},
							success: function(msg){
								$('#submasterworksheettosend').html(msg);
							}
				  	});
	    		}
	    });
	   </script>