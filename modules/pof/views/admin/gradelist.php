<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.6.1.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datepick.pack.js" ></script>

	

<table width="88">
  <tr>
    <td width="34"><div id="gradelist">
   	<?php
    	echo form_dropdown("grade",array('0'=>'')+$option_gradeid,"","id='gradeid', style='width:150px;  background-color:#CCCCCC'");
    ?>
	</div></td>
    <td width="42"><div id="levellist" align="center">
            <?php
    	echo form_dropdown("level",array(''=>''),'',"id='segmenttypepid', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div>
	<script type="text/javascript">
	  	$("#gradeid").click(function(){
	    		
        //build an array of selected values
        var gradeid= $("#gradeid").val();

      	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pof/admin/getLevel')?>",
							data: {'gradeid':gradeid},
							success: function(msg){
								$('#levellist').html(msg);
							}
				  	});
	    		
	    });
	   </script>;</td>
  </tr>
</table>