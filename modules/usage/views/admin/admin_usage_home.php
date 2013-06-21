
<style type="text/css">
<!--
.box {
	border-top-style: groove;
	border-right-style: groove;
	border-bottom-style: groove;
	border-left-style: groove;
	width: 650px;
	
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	background-color: #006666;
	color: #FFFFFF;
}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>

<div align="center" >
<div align="center" >
<?php echo form_open('usage/admin/find/'); ?>
<table width="600" align="center">
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center" class="style3">From</div></td>
    <td>&nbsp;</td>
    <td colspan="2">
      <div align="left">
        <input name="from" type="text" size="15" class="input-medium datepick">
        </div></td><td><div align="center" class="style3">To</div></td>
    <td colspan="3">
      <div align="center">
        <input name="to" type="text" size="15" class="input-medium datepick">
        </div></td>
    <td>&nbsp;</td>
    <td><div align="center">
      <input name="submit" type="submit" class="btn btn-primary" id="submit" value="Get" />
    </div></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="12">&nbsp;</td>
  </tr>
  <tr>
    <td width="30">&nbsp;</td>
    <td width="78"><div align="center" class="style2">Added</div></td>
    <td width="31">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="81"><div align="center" class="style2">Edited</div></td>
    <td width="26">&nbsp;</td>
    <td width="24">&nbsp;</td>
    <td width="85"><div align="center" class="style2">Deleted</div></td>
    <td width="21">&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="78"><div align="center" class="style2">Total</div></td>
    <td width="25">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('usage/admin/addedToday/',$added); ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('usage/admin/editedToday/',$edited); ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('usage/admin/deletedToday/',$deleted); ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('usage/admin/actionsToday/',$total); ?></div></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>
</div>
<div align="left"></div></div>

