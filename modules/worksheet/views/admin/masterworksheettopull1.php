<div id="masterworksheettopull" style="width:180px;float:left;">Part of Master Worksheet<br/>
   	<?php
    	echo form_multiselect("segment_id[]",$option_masterworksheettopull,"","id='masterworksheettopullid', style='width:180px; height:150px; background-color:#CCCCCC'");
    ?>
	</div>
<div id="submasterworksheettopull">Part of Sub-Master Worksheet  <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Sub-MasterWorksheet'),'',"style='width:200px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 <script type="text/javascript">
	  	$("#masterworksheettopullid").click(function(){
	    		 if( $('#masterworksheettopullid :selected').length > 0){
        //build an array of selected values
        var masterworksheettopullid= $("#masterworksheettopullid").val();

        $('#masterworksheettopullid :selected').each(function(i, selected) {
            masterworksheettopullid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_submasterworksheettopull1')?>",
							data: {'masterworksheettopullid':masterworksheettopullid},
							success: function(msg){
								$('#submasterworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script>