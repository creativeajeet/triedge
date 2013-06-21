<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
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
		
		
		font-weight: bold; 
	}
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>


    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
  </head>


<body>
<?php echo form_open('companies/admin/newcompany'); ?>
<table width="600">
  <tr>
    <th colspan="6" scope="col"><div align="left">Company/Client Details </div></th>
  </tr>
  <tr>
    <td width="136">Company Name </td>
    <td colspan="3">
      <input name="comp" type="text" size="50" />    </td>
    <td width="140">Industry</td>
    <td width="332"><?php echo form_dropdown('industry', $industry); ?></td>
  </tr>
  <tr>
    <td height="25">Client</td>
    <td width="173">
    <input type="checkbox" name="client" value="1" />    </td>
    <td width="133">Agreement With </td>
    <td width="167"><select name="agmwith" style="width:145px;">
	  <option value=""></option>
      <option>Resouce Angle</option>
      <option>Mirus</option>
    </select></td>
    <td>&nbsp;</td>
    <td width="332">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="6" scope="col"><div align="left">Client Terms </div></th>
  </tr>
  <tr>
    <td>Start Date      </td>
    <td><input type="text" name="start" /></td>
    <td>End Date </td>
    <td><input type="text" name="end" /></td>
    <td>Agreement Received </td>
    <td><input type="checkbox" name="agmrcvd" value="1" /></td>
  </tr>
  <tr>
    <td colspan="4">Agreement Status </td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><textarea name="agmstatus" cols="60" rows="2" wrap="hard" ></textarea></td>
    <td colspan="2"><textarea name="additional" cols="60" rows="2" wrap="hard" ></textarea></td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="6"><li class="submit"> <?php print form_hidden('id','')?>
            <div class="buttons">
              <button type="submit" class="btn btn-primary" class="positive" name="submit" value="submit"> <?php print  $this->bep_assets->icon('disk');?> <?php print $this->lang->line('general_save')?> </button>
            </div>
    </li></td>
  </tr>
</table>
</body>
</html>
