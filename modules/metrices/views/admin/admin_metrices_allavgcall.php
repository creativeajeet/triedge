
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
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


<h2>Avg. Call Data - Data Metrices</h2>

		<?php $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			
			?>
			<?php
			
			$year = date('Y');
			$mkfirstdate = mktime(0,0,0,1,1,$year);
			$date1 = date('Y-m-d',$mkfirstdate);
            $date2 = date('Y-m-d');

           $diff = abs(strtotime($date2) - strtotime($date1)); 

           $years   = floor($diff / (365*60*60*24)); 
          $nom  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
           ?>

<?php $quarter = ceil(date('m')/3); ?>
<div><b>Month :</b><input name="month" type="hidden" value="<?php echo date('m'); ?>"/><input type='text' size='3' value="<?php echo date('M'); ?>" /><b>Quarter :</b><input name='quarter' type='text' size='3' value="<?php echo $quarter; ?>" /><b>Year :</b><input name='year' type='text' size='6' value="<?php echo date('Y'); ?>" /></div>
<br/>
<?php $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
$monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
$yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d');
	   ?>
<div align="left"><b>WTD - </b>From <?php echo $weekdate; ?> To <?php echo $currentdate; ?></div>
<div align="left"><b>MTD - </b>From <?php echo $monthdate; ?> To <?php echo $currentdate; ?></div>
<div align="left"><b>YTD - </b><?php echo $yeardate; ?> To <?php echo $currentdate; ?></div>
<br/>
<table width="100%">
  <tr>
    <td width="30%" scope="col"><div id="tabs">
<ul>
		<li><a href="#tabs-2">Last Month</a></li>
		<li><a href="#tabs-3">Last QTR</a></li>
		<li><a href="#tabs-4">YTD</a></li>
	</ul>

		<div id="tabs-2">
			<?php if (count($MTD)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Consultant</th>\n";
	echo "<th>Avg. Call Data</th>\n";
     		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($MTD as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
 echo    "<td>$row->cnt1</td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
			</div>
			<div id="tabs-3">
			<?php if (count($QTR)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Consultant</th>\n";
	echo "<th>Avg. Call Data</th>\n";
     		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($QTR as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
 echo    "<td>".number_format((($row->cnt1)/3),2, '.', ' ')."</td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
			</div>
			<div id="tabs-4">
			<?php if (count($YTD)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Consultant</th>\n";
	echo "<th>Avg. Call Data</th>\n";
     
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($YTD as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
 echo    "<td>".number_format((($row->cnt1)/$nom),2, '.', ' ')."</td>";
 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
			</div>
	</div>
</td>
    <td width="70%" scope="col"><div id="metrices" align="center" style="width:600px;">
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
</div></td>
  </tr>
</table>

