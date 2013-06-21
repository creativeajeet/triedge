<div id="basicworksheettopull" style="width:200px;float:left;">Part of Basic Worksheet<br/>

   	<?php
    	echo form_multiselect("basicworksheet_id[]",$option_basicworksheettopull,"","id='subbasicworksheetpid', style='width:200px; height:150px; background-color:#CCCCCC'");
    ?>
	</div>

<div id="subbasicworksheettopull"> Part of Sub-Basic Worksheet <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Constituents'),'',"style='width:200px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 	
 <script type="text/javascript">
	  	$("#subbasicworksheetpid").click(function(){
	    		 if( $('#subbasicworksheetpid :selected').length > 0){
        //build an array of selected values
        var subbasicworksheetpid= $("#subbasicworksheetpid").val();

        $('#subbasicworksheetpid :selected').each(function(i, selected) {
            subbasicworksheetpid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_subbasicworksheettopull')?>",
							data: {'subbasicworksheetpid':subbasicworksheetpid},
							success: function(msg){
								$('#subbasicworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script>