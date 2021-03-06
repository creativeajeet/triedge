
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

<?php
			
			$year = date('Y');
			$mkfirstdate = mktime(0,0,0,1,1,$year);
			$date1 = date('Y-m-d',$mkfirstdate);
            $date2 = date('Y-m-d');

           $diff = abs(strtotime($date2) - strtotime($date1)); 

           $years   = floor($diff / (365*60*60*24)); 
          $nom  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
           ?>

<h2>Data Metrices</h2>
<?php $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
$monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
$yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d');
	   ?>
<div align="left"><b><?php echo $this->uri->segment(5); ?></b></div>
<div id="metrices" align="left" style="width:600px;">
<table width="122%">
  <tr>
    <th width="52%" scope="col"><?php echo date('D'); ?></th>
    <th width="13%" scope="col"><div align="center">
      <p>WTD</p>
      <p>From <?php echo $weekdate; ?> To <?php echo $currentdate; ?></p>
    </div></th>
    <th width="12%" scope="col"><div align="center">
      <p>MTD</p>
      <p>From <?php echo $monthdate; ?> To <?php echo $currentdate; ?></p>
    </div></th>
    <th width="11%" scope="col"><div align="center">
      <p>Prev. QTR </p>
        <p>From <?php echo $firstdate; ?> To <?php echo $lastdate; ?></p>
    </div></th>
    <th width="12%" scope="col"><div align="center">
      <p>YTD</p>
      <p>From <?php echo $yeardate; ?> To <?php echo $currentdate; ?></p>
    </div></th>
  </tr>
  <tr>
    <td><strong>Work MIS</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Total Leaves Taken</td>
    <td><div align="center"><?php echo $leavewtd; ?></div></td>
    <td><div align="center"><?php echo $leavemtd; ?></div></td>
    <td><div align="center"><?php echo $leaveqtd; ?></div></td>
    <td><div align="center"><?php echo $leaveytd; ?></div></td>
  </tr>
  <tr>
    <td>Avg. Working Hours in Office </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
     <td>Avg. Call Time</td>
    <td><div align="center">NA</div></td>
    <td><div align="center"><?php echo number_format(($avgcalldatamtd),2, '.', ' '); ?></div></td>
    <td><div align="center"><?php echo number_format((($avgcalldataqtr)/3),2, '.', ' '); ?></div></td>
     <td><div align="center"><?php echo number_format(($avgcalldataytd/$nom),2, '.', ' '); ?></div></td>
  </tr>
  <tr>
    <td><strong>Database Management</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>New Enteries</td>
    <td><div align="center"><?php echo $enterwtd; ?></div></td>
    <td><div align="center"><?php echo $entermtd; ?></div></td>
    <td><div align="center"><?php echo $enterqtd; ?></div></td>
    <td><div align="center"><?php echo $enterytd; ?></div></td>
  </tr>
  <tr>
    <td>No. of Edits</td>
    <td><div align="center"><?php echo $editwtd; ?></div></td>
    <td><div align="center"><?php echo $editmtd; ?></div></td>
    <td><div align="center"><?php echo $editqtd; ?></div></td>
    <td><div align="center"><?php echo $editytd; ?></div></td>
  </tr>
  <tr>
    <td>Avg. DB assigned to Worksheets per day</td>
    <td><div align="center">
	<?php 
	$avgdbworkwtd=$dbWorkWTD/$workingdaysWTD;
	echo number_format($avgdbworkwtd, 2, '.', ' ')
	 ?></div></td>
    <td><div align="center">
	<?php 
	$avgdbworkmtd=$dbWorkMTD/$workingdaysMTD;
	echo number_format($avgdbworkmtd, 2, '.', ' ')
	 ?></div></td>
    <td><div align="center">
	</div></td>
    <td><div align="center">
	<?php 
	$avgdbworkytd=$dbWorkYTD/$workingdaysYTD;
	echo number_format($avgdbworkytd, 2, '.', ' ')
	 ?></div></td>
  </tr>
  <tr>
    <td><strong>Position Response</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>No. of Positions Allocated</td>
     <td><div align="center"><?php echo $nopw; ?></div></td>
   <td><div align="center"><?php echo $nopm; ?></div></td>
    <td><div align="center"><?php echo $nopq; ?></div></td>
   <td><div align="center"><?php echo $nopy; ?></div></td>
  </tr>
  <tr>
    <td>Value of Positions Allocated</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>No. of CVs sent</td>
    <td><div align="center"><?php echo $cvsentw; ?></div></td>
    <td><div align="center"><?php echo $cvsentm; ?></div></td>
    <td><div align="center"><?php echo $cvsentq; ?></div></td>
    <td><div align="center"><?php echo $cvsenty; ?></div></td>
  </tr>
  <tr>
    <td>CVs sent/Positions Allocated</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td></td>
  </tr>
  <tr>
    <td>CVs SL/Total Cvs where feedback received (SL, R, D)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<p>&nbsp;</p>
