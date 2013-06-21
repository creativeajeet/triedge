<div id="submasterworksheetpull" style="width:230px;float:left;">Part of Sub-Master Worksheet<br/>
   	<?php
    	echo form_multiselect("submaster_id[]",$option_submasterworksheettopull,"","id='submasterworksheetpid', style='width:230px; height:150px; background-color:#CCCCCC'");
    ?>
	</div>
<div id="basicworksheettopull"> Part of Basic Worksheet <br/>
          <?php
    	echo form_dropdown("id",array('Select'=>'Select Constituents'),'',"style='width:180px;  background-color:#CCCCCC'",'disabled');
    ?>
    </div>
	 	
 <script type="text/javascript">
	  	$("#submasterworksheetpid").click(function(){
	    		 if( $('#submasterworksheetpid :selected').length > 0){
        //build an array of selected values
        var submasterworksheetpid= $("#submasterworksheetpid").val();

        $('#submasterworksheetpid :selected').each(function(i, selected) {
            submasterworksheetpid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_basicworksheettopull')?>",
							data: {'submasterworksheetpid':submasterworksheetpid},
							success: function(msg){
								$('#basicworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script>