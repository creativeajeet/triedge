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
</head>

<body>
<?php $user = $this->uri->segment(4); ?>
<?php $from = $this->uri->segment(5); ?>
<?php $to = $this->uri->segment(6); ?>
<?php echo form_open('usage/admin/findresult/'); ?>
<div align="center" >
<div class="box" align="center" >
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
        <input name="newfolder" type="text" size="15" class="input-medium datepick">
        </div></td><td><div align="center" class="style3">To</div></td>
    <td colspan="3">
      <div align="center">
        <input name="newfolder3" type="text" size="15" class="input-medium datepick">
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
    <td><div align="center"><?php echo anchor('usage/admin/addedbyUser/'.$user.'/'.$from.'/'.$to,$added); ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('usage/admin/editedbyUser/'.$user.'/'.$from.'/'.$to,$edited); ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('usage/admin/deletedbyUser/'.$user.'/'.$from.'/'.$to,$deleted); ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('usage/admin/totalbyUser/'.$user.'/'.$from.'/'.$to,$total); ?></div></td>
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
<h2></h2>
<?php 

	echo "<table id='example' class='display' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th></th>\n";
	echo "<th>Consultant Name</th>\n";
		echo "<th><div align='center'>Added</div></th>\n";
		echo "<th><div align='center'>Edited</div></th>\n";
		echo "<th><div align='center'>Deleted</div></th>\n";
		echo "<th><div align='center'>Total</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
	
		// print_r ($total);
		echo "<tr valign='top'>\n";
		echo "<td></td>\n";
		echo "<td><strong>".$user."</strong></td>\n";
		echo "<td><div align='center'>".anchor('usage/admin/addedbyUser/'.$user.'/'.$from.'/'.$to,$added)."</div></td>\n";
		echo "<td><div align='center'>".anchor('usage/admin/editedbyUser/'.$user.'/'.$from.'/'.$to,$edited)."</div></td>\n";
		echo "<td><div align='center'>".anchor('usage/admin/deletedbyUser/'.$user.'/'.$from.'/'.$to,$deleted)."</div></td>\n";
		echo "<td><div align='center'>".anchor('usage/admin/totalbyUser/'.$user.'/'.$from.'/'.$to,$total)."</div></td>\n";
	    echo "</tr>\n";
	
	echo "</tbody>\n</table>";




?>
</body>
</html>
