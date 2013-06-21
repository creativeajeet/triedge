
<?php if (count($companies)){ ?>
<table class="sortable" width="801" border="1" id="tblSample">
  <tr bgcolor="#CCCCCC">
    <th>&nbsp;</th>
    <th><div align="center">
      <h6 align="left">Client Name </h6>
    </div></th>
    <th><div align="center">
      <h6>Agreement With </h6>
    </div></th>
    <th><div align="center">
      <h6>Expiry Date </h6>
    </div></th>
    <th><div align="center">
      <h6>Signed</h6>
    </div></th>
    <th><div align="center">
      <h6>Status</h6>
    </div></th>
  </tr>
  <?php foreach ($companies as $key => $list){?>
  <tr>
    <td width="14">&nbsp;</td>
    <td width="160">
    <div align="left"><strong><?php echo $list['comp']; ?></strong></div></td>
	<td width="117">
    <div align="center"><?php echo $list['agmwith']; ?></div></td>
	<td width="98">
    <div align="center"><?php echo $list['end']; ?></div></td>
	<td width="98">
    <div align="center"><?php echo $list['agmrcvd']; ?></div></td>
	<td width="274">
    <div align="center"><?php $t=$list['agmstatus']; ?><?php echo wordwrap($t, 40, "<br />\n"); ?></div></td>
  </tr>
  <?php } ?>
</table>
 <?php } ?>
 
