<div id="masterworksheet" style="width:250px;float:left;">Part of Master Worksheet<br/>
   	<?php
    	echo form_multiselect("masterworksheet_id[]",$option_masterworksheet,"","id='masterworksheetid', style='width:235px; height:150px; background-color:#CCCCCC'");
    ?>
	</div>
<div id="submasterworksheet">Part of Sub-Master Worksheet <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Sub Masterworksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 <script type="text/javascript">
	  	$("#masterworksheetid").click(function(){
	    		 if( $('#masterworksheetid :selected').length > 0){
        //build an array of selected values
        var masterworksheetid= $("#masterworksheetid").val();

        $('#masterworksheetid :selected').each(function(i, selected) {
            masterworksheetid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_submasterworksheet')?>",
							data: {'masterworksheetid':masterworksheetid},
							success: function(msg){
								$('#submasterworksheet').html(msg);
							}
				  	});
	    		}
	    });
	   </script>