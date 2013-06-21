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


<h2>New CallData</h2>

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
<?php echo form_open('metrices/admin/newcalldata'); ?>
<?php $quarter = ceil(date('m')/3); ?>
<div><b>Month :</b><input name="month" type="text" /><b>Quarter :</b><input name='quarter' type='text' size='3' value="<?php echo $quarter; ?>" /><b>Year :</b><input name='year' type='text' size='6' value="<?php echo date('Y'); ?>" /></div>
<br/>
<?php if (count($users)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Name</th>\n";
	echo "<th><div align='center'>Minutes</div></th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($users as $row){
 
  echo "<tr valign='top'>\n";
 echo    "<td><input type='hidden' name='user[]' value='$row->id'>$row->username</td>";
 echo    "<td><div align='center'><input name='minutes[]' type='text' size='6' /></div></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<p>&nbsp;</p>
<div align="right"><input name='submit' type='submit' value='Enter'/></div>
