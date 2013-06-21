<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 300px; 
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
<?php if (count($users)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<td width='15%'>".anchor('metrices/admin/metricewise/','Metricewise View')."</td>\n";
	echo "<td width='15%'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td width='15%'>&nbsp;</td>\n";
	echo "<td width='15%'>&nbsp;</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<th width='15%'>Name</th>\n";
	echo "<th width='15%'></th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($users as $row){
 
  echo "<tr valign='top'>\n";
 echo    "<td><input type='hidden' name='user[]' value='$row->id'>$row->username</td>";
 echo    "<td><div align='left'>".anchor('metrices/admin/singlemetric/'.$row->id."/".$row->username,'view')."</div></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<p>&nbsp;</p>



