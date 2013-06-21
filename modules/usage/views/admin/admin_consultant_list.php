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
#edited{
	margin-left: 204px;
	margin-top: -784px;
}

#deleted{
	margin-left: 254px;
	margin-top: -784px;
}
-->
</style>

<?php $from = $this->uri->segment(4); ?>
<?php $to = $this->uri->segment(5); ?>
<?php echo form_open('usage/admin/find/'); ?>
<div align="center" >
<div align="center" >
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
    <td><div align="center"><?php echo $added; ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo $edited; ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo $deleted; ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo $total; ?></div></td>
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
 
	echo "<table id='added' class='display' border='1' cellspacing='0' cellpadding='3' width='200px;'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>User Name</th>\n";
	echo "<th>Added</th>\n";
			
		echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($added1 as $key => $list){
		// print_r ($total);
		echo "<tr valign='top'>\n";
		echo "<td><strong>".$list['username']."</strong></td>\n";
		echo "<td>".anchor('usage/admin/addedbyUser/'.$list['id'].'/'.$from.'/'.$to,$list['COUNT(entered_by)'])."</td>\n";
		
		
	echo "</tr>\n";
		}
	echo "</tbody>\n</table>";
echo "<table id='edited' class='display' border='1' cellspacing='0' cellpadding='3' width='20px;'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	
	echo "<th>Edited</th>\n";
	
		
		echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($added2 as $key => $list){
	// print_r ($total);
		echo "<tr valign='top'>\n";
		echo "<td><div align='center'>".anchor('usage/admin/editedbyUser/'.$list['id'].'/'.$from.'/'.$to,$list['COUNT(last_updated_by)'])."</div></td>\n";
		
	echo "</tr>\n";
		}
	echo "</tbody>\n</table>";
	echo "<table id='deleted' class='display' border='1' cellspacing='0' cellpadding='3' width='80px;'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	
	
	echo "<th><div align='center'>Deleted</div></th>\n";
		
		echo "</tr>\n</thead>\n<tbody>\n";
		foreach ($added3 as $key => $list){
		// print_r ($total);
		echo "<tr valign='top'>\n";
		
		echo "<td><div align='center'>".anchor('usage/admin/deletedbyUser/'.$list['username'].'/'.$from.'/'.$to,$list['COUNT(deleted_by)'])."</div></td>\n";
		echo "</tr>\n";
		}
	echo "</tbody>\n</table>";
	


?>
