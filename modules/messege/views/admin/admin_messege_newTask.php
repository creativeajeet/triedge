<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/style.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datepick.pack.js" ></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker/jquery.ui.all.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url()?>assets/css/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-sliderAccess.js"></script><script type="text/javascript">
			$(document).ready(function(){
				
				//	-- Datepicker
				$(".datepicker").datetimepicker({
					dateFormat: 'yy-mm-dd',
					showButtonPanel: true
				});					
				
			
			});
		</script>

<script type="text/javascript">
$(function(){
	$("#user").multiselect();
});
</script>
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<script type="text/javascript">
jQuery(document).ready(function() {
   jQuery("#tagtype").change(function() {
      if(jQuery(this).find("option:selected").val() == "news") {
         jQuery("#users").hide();
      }
	  else{
	  jQuery("#users").show();
	  }
   });
});
</script>
<?php echo form_open('messege/admin/newTask'); ?>

<table width="89%">
  <tr>
    <th width="13%" scope="col"><div align="left">To Whom </div></th>
    <th width="14%" scope="col"><div align="left" id="users">
	<?php echo form_multiselect('user[]',$users,"", "id='user'"); ?>
          
    </div>    </th>
    <th width="17%" scope="col"><div align="left">Allocation Date </div></th>
    <th width="16%" scope="col"><div align="left">
      <input name="title2" type="text" size="20" style="background:#CCCCCC" value="<?php echo date('Y-m-d H:m'); ?>" />
    </div></th>
    <th width="23%" scope="col"><div align="left">To be Completed by </div></th>
    <th width="17%" scope="col"><div align="left">
      <div align="left">
        <input name="title3" type="text" size="20" class="input-medium datepick">
      </div>
    </div></th>
  </tr>
  
  <tr>
    <th colspan="6" scope="col"><div align="left" class="style1">Messege  </div></th>
  </tr>
  <tr>
    <th colspan="6" scope="col"><div align="left">
      <textarea name="msg" cols="50" rows="5" style="background:#CCCCCC"></textarea>
    </div></th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><div align="left"></div></th>
    <th scope="col"><div align="right">
      <input type="submit" class="btn btn-primary" name="Submit" value="Send">
    </div></th>
  </tr>
</table>
