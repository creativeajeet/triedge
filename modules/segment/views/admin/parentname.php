<div id="parentname" style="width:260px;float:left;">Parent Name<br/>
   	<?php
    	echo form_multiselect("segment_name[]",$option_segment,'',"id='parentnameid', style='width:250px; height:150px; background-color:#CCCCCC'","id='id'");
    ?>
</div>
 <div id="currentchild">Current Child<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Segment'),'',"style='width:250px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
   
    <script type="text/javascript">
	  	$("#parentnameid").click(function(){
	    		 if( $('#parentnameid :selected').length > 0){
        //build an array of selected values
        var parentnameid= $("#parentnameid").val();

        $('#parentnameid :selected').each(function(i, selected) {
            parentnameid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('segment/admin/currentchild')?>",
							data: {'parentnameid':parentnameid},
							success: function(msg){
								$('#currentchild').html(msg);
							}
				  	});
	    		}
	    });
	   </script>	