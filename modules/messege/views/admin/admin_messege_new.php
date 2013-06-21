<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/style.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery.js"></script>
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
<?php echo form_open('messege/admin/newMsg'); ?>

<table width="100%">
  <tr>
    <th width="41%" scope="col"><div align="left" class="style1">Messege Type </div></th>
    <th width="5%" scope="col">::</th>
    <th width="54%" scope="col"><div align="left">
      <select name="type" id="tagtype" style="width:100px; background:#CCCCCC">
	  <option value="indi">Individual</option>
        <option value="news">News</option>
              </select>
    </div></th>
  </tr>
  <tr>
    <th height="35" scope="col"><div align="left" class="style1">Title</div></th>
    <th scope="col">::</th>
    <th scope="col"><div align="left">
      <input name="title" type="text" size="50" style="background:#CCCCCC">
    </div></th>
  </tr>
  <tr>
   <th scope="col"><div align="left" class="style1">Send To </div></th>
    <th scope="col">::</th>
    <th scope="col"><div align="left" id="users">
	<?php echo form_multiselect('user[]',$users,"", "id='user'"); ?>
          
    </div>
     </th>
  </tr>
  <tr>
    <th scope="col"><div align="left" class="style1">Messege  </div></th>
    <th scope="col">::</th>
    <th rowspan="2" scope="col"><div align="left">
      <textarea name="msg" cols="50" rows="5" style="background:#CCCCCC"></textarea>
    </div></th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th scope="col"><div align="left"></div></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><div align="right">
      <input type="submit" class="btn btn-primary" name="Submit" value="Send">
    </div></th>
  </tr>
</table>
