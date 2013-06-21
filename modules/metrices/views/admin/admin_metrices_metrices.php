
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
	tr, td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>


<h2>Data Metrices</h2>
<?php $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
$monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
$yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d');
	   ?>
<div align="left"><b>WTD - </b>From <?php echo $weekdate; ?> To <?php echo $currentdate; ?></div>
<div align="left"><b>MTD - </b>From <?php echo $monthdate; ?> To <?php echo $currentdate; ?></div>
<div align="left"><b>YTD - </b><?php echo $yeardate; ?> To <?php echo $currentdate; ?></div>
<div id="metrices" align="left" style="width:600px;">
<table width="122%">
  <tr>
    <th width="52%" scope="col">&nbsp;</th>
    <th width="13%" scope="col">&nbsp;</th>
    </tr>
  <tr>
    <td><strong>Work MIS</strong></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Total Leaves Taken</td>
    <td><div align="center"><?php echo anchor('metrices/admin/totalleavetaken','view'); ?></div></td>
    </tr>
  <tr>
    <td>Avg. Working Hours in Office </td>
   <td><div align="center"><?php echo anchor('metrices/admin/avgworkhour','view'); ?></div></td>
    </tr>
  <tr>
    <td>Avg. Call Time</td>
   <td><div align="center"><?php echo anchor('metrices/admin/avgcall','view'); ?></div></td>
    </tr>
  <tr>
    <td><strong>Database Management</strong></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>New Enteries</td>
   <td><div align="center"><?php echo anchor('metrices/admin/newentries','view'); ?></div></td>
    </tr>
  <tr>
    <td>No. of Edits</td>
   <td><div align="center"><?php echo anchor('metrices/admin/totaledits','view'); ?></div></td>
    </tr>
  <tr>
    <td>Avg. DB assigned to Worksheets per day</td>
   <td><div align="center"><?php echo anchor('metrices/admin/avgdb','view'); ?></div></td>
    </tr>
  <tr>
    <td><strong>Position Response</strong></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>No. of Positions Allocated</td>
    <td><div align="center"><?php echo anchor('metrices/admin/posalloc','view'); ?></div></td>
   </tr>
  <tr>
    <td>Value of Positions Allocated</td>
    <td><div align="center"><?php echo anchor('metrices/admin/valuepos','view'); ?></div></td>
    </tr>
  <tr>
    <td>No. of CVs sent</td>
   <td><div align="center"><?php echo anchor('metrices/admin/totalcvsent','view'); ?></div></td>
    </tr>
  <tr>
    <td>CVs sent/Positions Allocated</td>
   <td><div align="center"><?php echo anchor('metrices/admin/totalleavetaken','view'); ?></div></td>
    </td>
  </tr>
  <tr>
    <td>CVs SL/Total Cvs where feedback received (SL, R, D)</td>
   <td><div align="center"><?php echo anchor('metrices/admin/totalfeedback','view'); ?></div></td>
    </tr>
</table>
</div>
<p>&nbsp;</p>
