<table width="204">
  <tr>
    <td width="29"><div id="hiringmanager">
   	<?php
    	echo form_dropdown("hiring_mgr",array('0' => '')+$hiringmanager,"","id='hrmanagerid', style='width:143px; background-color:#CCCCCC'");
    ?>
	</div>
	</td>
	<td width="103">
	Client Manager	</td>
    <td width="56">

<div id="clientmanager">
   	<?php
    	echo form_dropdown("client_mgr",array('0' => 'Unallocated'),"","id='id', style='width:143px; background-color:#CCCCCC'");
    ?>
	</div>
	
	<script type="text/javascript">
	  	$("#hrmanagerid").click(function(){
	    		
        //build an array of selected values
        var hrmanagerid= $("#hrmanagerid").val();

      	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pof/admin/getClientManager')?>",
							data: {'hrmanagerid':hrmanagerid},
							success: function(msg){
								$('#clientmanager').html(msg);
							}
				  	});
	    		
	    });
	   </script></td>
  </tr>
</table>