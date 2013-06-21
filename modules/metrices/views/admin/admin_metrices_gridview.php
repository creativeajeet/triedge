
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


<h2>All Metrices</h2>

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

<?php $quarter = ceil(date('m')/3); ?>
<div><b>Month :</b><input name="month" type="hidden" value="<?php echo date('m'); ?>"/><input type='text' size='3' value="<?php echo date('M'); ?>" /><b>Quarter :</b><input name='quarter' type='text' size='3' value="<?php echo $quarter; ?>" /><b>Year :</b><input name='year' type='text' size='6' value="<?php echo date('Y'); ?>" /></div>
<br/>
<div id="tabs">
<ul>
		<li><a href="#tabs-1">WTD</a></li>
		<li><a href="#tabs-2">MTD</a></li>
		<li><a href="#tabs-3">Prev. QTR</a></li>
		<li><a href="#tabs-4">YTD</a></li>
	</ul>

			<div id="tabs-1">
<?php if (count($WTD)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Consultant</th>\n";
	echo "<th>New Entries</th>\n";
     	echo "<th>No. of Edits</th>\n";
		echo "<th>Avg. DB assigned to worksheet per day</th>\n";
		echo "<th>No. of Positions allocated</th>\n";
		echo "<th>Value of Positions allocated</th>\n";
		echo "<th>No. of CV sent</th>\n";
		echo "<th>CVs SL/Total CVs sent feedback rcvd</th>\n";
		echo "<th>Avg. working hours in office</th>\n";
		echo "<th>Total leaves taken</th>\n";
		
	    echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($WTD as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
 echo    "<td>$row->cnt1</td>";
 echo    "<td></td>";
  echo    "<td></td>";
   echo    "<td></td>";
    echo    "<td></td>";
	 echo    "<td></td>";
	  echo    "<td></td>";
	   echo    "<td></td>";
	    echo    "<td></td>";
		 echo    "<td></td>";
		  echo    "<td></td>";
		   echo    "<td></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
			</div>
			<div id="tabs-2">
			<?php if (count($MTD)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Consultant</th>\n";
	echo "<th>New Entries</th>\n";
     	echo "<th>No. of Edits</th>\n";
		echo "<th>Avg. DB assigned to worksheet per day</th>\n";
		echo "<th>No. of Positions allocated</th>\n";
		echo "<th>Value of Positions allocated</th>\n";
		echo "<th>No. of CV sent</th>\n";
		echo "<th>CVs SL/Total CVs sent feedback rcvd</th>\n";
		echo "<th>Avg. working hours in office</th>\n";
		echo "<th>Total leaves taken</th>\n";
		
	    echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($MTD as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
 echo    "<td>$row->cnt1</td>";
 echo    "<td></td>";
  echo    "<td></td>";
   echo    "<td></td>";
    echo    "<td></td>";
	 echo    "<td></td>";
	  echo    "<td></td>";
	   echo    "<td></td>";
	    echo    "<td></td>";
		 echo    "<td></td>";
		  echo    "<td></td>";
		   echo    "<td></td>";
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
	echo "<th>New Entries</th>\n";
     	echo "<th>No. of Edits</th>\n";
		echo "<th>Avg. DB assigned to worksheet per day</th>\n";
		echo "<th>No. of Positions allocated</th>\n";
		echo "<th>Value of Positions allocated</th>\n";
		echo "<th>No. of CV sent</th>\n";
		echo "<th>CVs SL/Total CVs sent feedback rcvd</th>\n";
		echo "<th>Avg. working hours in office</th>\n";
		echo "<th>Total leaves taken</th>\n";
		
	    echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($QTR as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
 echo    "<td>$row->cnt1</td>";
 echo    "<td></td>";
  echo    "<td></td>";
   echo    "<td></td>";
    echo    "<td></td>";
	 echo    "<td></td>";
	  echo    "<td></td>";
	   echo    "<td></td>";
	    echo    "<td></td>";
		 echo    "<td></td>";
		  echo    "<td></td>";
		   echo    "<td></td>";
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
	echo "<th>New Entries</th>\n";
     	echo "<th>No. of Edits</th>\n";
		echo "<th>Avg. DB assigned to worksheet per day</th>\n";
		echo "<th>No. of Positions allocated</th>\n";
		echo "<th>Value of Positions allocated</th>\n";
		echo "<th>No. of CV sent</th>\n";
		echo "<th>CVs SL/Total CVs sent feedback rcvd</th>\n";
		echo "<th>Avg. working hours in office</th>\n";
		echo "<th>Total leaves taken</th>\n";
		
	    echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($YTD as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
 echo    "<td>$row->cnt1</td>";
 echo    "<td></td>";
  echo    "<td></td>";
   echo    "<td></td>";
    echo    "<td></td>";
	 echo    "<td></td>";
	  echo    "<td></td>";
	   echo    "<td></td>";
	    echo    "<td></td>";
		 echo    "<td></td>";
		  echo    "<td></td>";
		   echo    "<td></td>";
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

