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
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
-->
</style>
<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
	th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	tr,td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>


<table width="300">
  
  <tr>
    <td height="35" bgcolor="#006666" scope="col"><div align="left" class="style1">Title</div></td>
    <td width="81%" scope="col"><div align="left">
      <?php echo $news->title; ?>
    </div></td>
  </tr>
  <tr>
   <td scope="col" bgcolor="#006666"><div align="left" class="style1">Sent By </div></td>
    <td scope="col"><div align="left">
	<?php echo $news->username; ?>
          
    </div>     </td>
  </tr>
  <tr>
    <td scope="col" bgcolor="#006666"><div align="left" class="style1">Messege  </div></td>
    <td rowspan="2" scope="col"><div align="left">
      <?php echo $news->msg; ?>
    </div></td>
  </tr>
 <tr>
    <td width="13%" bgcolor="#006666" scope="col">&nbsp;</td>
  </tr>
</table>
