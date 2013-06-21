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
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}
	#consol
	{
	font-size: 18px;
	color: #FFFFFF;
	}

	</style>

<?php 
echo "<table width='100%'>\n";
echo "<tr>\n";
echo "<th scope='col'>User Name </th>\n";
echo "<th scope='col'><div align='center'>Total Candidates</div></th>\n";
echo "<th scope='col'><div align='center'>Not sent to Any Worksheet </div</th>\n";
echo "<th scope='col'><div align='center'>Not sent to Any Worksheet(%) </div</th>\n";
echo  "<th scope='col'><div align='center'>CV not attached</div</th>\n";
echo  "<th scope='col'><div align='center'>CV not attached(%)</div</th></tr>\n";
 foreach ($worksheet as $key => $list){ 
  echo "<tr>\n";
   echo "<td scope='col'><b>".$list['username']."<b></td>\n";
   echo "<td scope='col'><div align='center'><b>".$list['count3']."<b></div></td>\n";
   
   if($list['count1']==0)
    {
	 echo "<td scope='col'><div align='center'>NA</div></td>\n";
	}
	else{
    echo "<td scope='col'><div align='center'>".anchor('usage/admin/noWork/'.$list['username'],$list['count1'])."</div></td>\n";
	}
	if($list['count1']==0)
    {
	 echo "<td scope='col'><div align='center'>NA</div></td>\n";
	}
	else
	{
   $worksheet = ($list['count1']/$list['count3'])*100;
   echo "<td scope='col'><div align='center'><b>".number_format($worksheet, 2, '.', ' ')."<b></div></td>\n";
   }
	
	 if($list['count2']==0)
    {
	 echo "<td scope='col'><div align='center'>NA</div></td>\n";
	}
	 else{
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/noCV/'.$list['username'],$list['count2'])."</div></td>\n";
	  }
	  if($list['count2']==0)
    {
	 echo "<td scope='col'><div align='center'>NA</div></td>\n";
	}
	else
	{
	$CV = ($list['count2']/$list['count3'])*100;
   echo "<td scope='col'><div align='center'><b>".number_format($CV, 2, '.', ' ')."<b></div></td>\n";
   }
	}
	
 echo "<tr>\n";
echo "<th scope='col'><div id='consol'>Consolidated</div></th>\n";
echo "<th scope='col'><div align='center' id='consol'><b>".$total_cand."</b></div></th>\n";
echo "<th scope='col'><div align='center'><b>".anchor('usage/admin/consolWork/',$consolWork, array('id'=>'consol'))."</b></div</th>\n";
$work = ($consolWork/$total_cand)*100;
echo "<th scope='col'><div align='center' id='consol'><b>".number_format($work, 2, '.', ' ')."</b></div></th>\n";
echo "<th scope='col'><div align='center'><b>".anchor('usage/admin/consolCV/',$consolCV, array('id'=>'consol'))."</b></div</th>\n";
$CVs = ($consolCV/$total_cand)*100;
echo "<th scope='col'><div align='center' id='consol'><b>".number_format($CVs, 2, '.', ' ')."</b></div></th>\n";

echo "</table>";
?>

