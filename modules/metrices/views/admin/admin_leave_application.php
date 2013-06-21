
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
	
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

 <?php $id = $this->uri->segment(4); ?>
<?php print form_open('metrices/admin/leaveApplication/');?>
<table width="641">
    <tr>
      <td colspan="6"><div align="center"><strong>Leave Application Form </strong></div></td>
    </tr>
    <tr>
      <td height="19" colspan="2">Date(Applied On) </td>
      <td colspan="2"><input name="date_apply" id="date_apply" type="text" size="20" style="background:#CCCCCC" value="<?php echo date('Y-m-d'); ?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="19" colspan="2">Employee Name</td>
      <td colspan="2"><input name="emp_name" id="emp_name" type="hidden" size="20" style="background:#CCCCCC" value="<?php echo $this->session->userdata('id'); ?>"/><input name="name" id="name" type="text" size="20" style="background:#CCCCCC" value="<?php echo $this->session->userdata('username'); ?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="196">Request Leave </td>
      <td width="47">From</td>
      <td width="102"><input name="l_from" id="l_from" type="text" size="15" class="input-medium datepick"></td>
      <td width="34"><div align="center">To</div></td>
      <td width="262"><input name="l_to" id="l_to" type="text" size="15" class="input-medium datepick"></td>
      <td width="440">(Both Days Inclusive).</td>
    </tr>
    
    <tr>
      <td height="19" colspan="4">Leaves applied(no. of working days) </td>
      <td height="19"><input name="no_of_leaves" id="no_of_leaves" type="text" size="4" style="background:#CCCCCC"/></td>
      <td height="19">&nbsp;</td>
    </tr>
    <tr>
      <td height="19" colspan="4">The Reason for leave is </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="4"><textarea name="l_reason" id="l_reason" cols="40" rows="2" style="background:#CCCCCC"></textarea></td>
    </tr>
    
    <tr>
      <td height="19" colspan="2">Will join back work on </td>
      <td height="19" colspan="2"><input name="l_join" id="l_join" type="text" size="20" class="input-medium datepick"></td>
      <td colspan="2">&nbsp;</td>
    </tr>
	   
     <tr>
       <td colspan="6"><h2></h2></td>
     </tr>
     <tr>
       <td colspan="2">Current Leave Balance (YTD) </td>
       <td><input name="l_balance" id="l_balance" type="text" size="4" style="background:#CCCCCC"/></td>
       <td colspan="2">Total Leaves taken till date (YTD) </td>
       <td><input name="total_leave" id="total_leave" type="text" size="4" style="background:#CCCCCC"/></td>
     </tr>
	 <tr>
       <td colspan="6">&nbsp;</td>
     </tr>
	 
	 <tr>
       <td colspan="6"><div align="right">
         <input type="submit" class="btn btn-primary" name="apply" value="Apply" />
       </div></td>
     </tr>
</table>
 

