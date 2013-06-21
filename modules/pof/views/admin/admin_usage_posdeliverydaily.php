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
   #red
	{
	color: #FF0000;
	}
	#blue
	{
	color: #009900;
	font-size: 12px;
	}
	    </style>
<h2>Daily Position Delivery</h2>
<?php echo form_open('usage/admin/posDelivery/'); ?>
<table width="300" align="center">
<tr>
    <td width="85"><div align="center" class="style3">From</div></td>
    <td width="148">
      <div align="left">
        <input name="from" type="text" size="15" class="input-medium datepick">
    </div></td>
    <td width="79"><div align="center" class="style3">To</div></td>
    <td width="128">
      <div align="center">
        <input name="to" type="text" size="15" class="input-medium datepick">
    </div></td>
    <td width="645">
      <div align="left">
        <input name="submit" type="submit" class="btn btn-primary" id="submit" value="Get" />
     (Please choose dates for 7 days ONLY)  </div></td>
  </tr>
</table>
<?php echo form_close(); ?>
<?php echo form_open('usage/admin/sortposdel/'); ?>
<table width="300" align="center">
<tr>
    <td width="85"><div align="center" class="style3">Sort</div></td>
    <td width="148">
      <div align="left">
        <select name="sort">
   <option value=""></option>
  <option value="client">Client</option>
  <option value="consultant">Consultant</option>
  <option value="date_of_receipt">Date of Receipt</option>
</select>
    </div></td>
    <td width="79"><div align="center" class="style3">in Order </div></td>
    <td width="128">
      <div align="center">
        <select name="select">
   <option value=""></option>
  <option value="asc">Ascending</option>
  <option value="desc">Descending</option>
  </select>
    </div></td>
    <td width="645">
      <div align="left">
        <input name="submit" type="submit" class="btn btn-primary" id="submit" value="Sort" />
      </div></td>
  </tr>
</table>
<?php echo form_close(); ?>
<div align="right"><?php echo anchor('usage/admin/posDelivery/', 'All Allocated'); ?> | <?php echo anchor('usage/admin/posDeliveryActive/', 'Active Positions'); ?></div>
<?php 
$date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		
		$day = date('D');
		$day1 = date('D',strtotime('-1 days'));
		$day2 = date('D',strtotime('-2 days'));
		$day3 = date('D',strtotime('-3 days'));
		$day4 = date('D',strtotime('-4 days'));
		$day5 = date('D',strtotime('-5 days'));
		$day6 = date('D',strtotime('-6 days'));
?>

<?php if (count($results)){ 
echo "<table>\n";
echo "<thead>\n";
echo "<tr>\n";
echo "<th width='2%'></th>\n";
echo "<th width='5%'>Pof No.</th>\n";
echo "<th width='10%'>Position </th>\n";
echo "<th width='7%'>Client </th>\n";
echo "<th width='5%'><div align='center'>Consultants</div></th>\n";
echo "<th colspan='7'><div align='center'>CVSent</div</th>\n";
echo  "<th><div align='center'>Total CVSent</div</th>\n";
echo  "<th><div align='center'></div</th></tr>\n";
echo "<tr>\n";
echo "<th width='2%'></th>\n";
echo "<th width='5%'></th>\n";
echo "<th width='10%'></th>\n";
echo "<th width='7%'></th>\n";
echo "<th width='5%'><div align='center'></div></th>\n";
echo "<th><div align='center'><p>T</p><p>".$date."</p><p>".$day."</p></div</th>\n";
echo "<th><div align='center'><p>T-1</p><p>".$date1."</p><p>".$day1."</p></div</th>\n";
echo  "<th><div align='center'><p>T-2</p><p>".$date2."</p><p>".$day2."</p></div</th>\n";
echo  "<th><div align='center'><p>T-3</p><p>".$date3."</p><p>".$day3."</p></div</th>\n";
echo  "<th><div align='center'><p>T-4</p><p>".$date4."</p><p>".$day4."</p></div</th>\n";
echo  "<th><div align='center'><p>T-5</p><p>".$date5."</p><p>".$day5."</p></div</th>\n";
echo  "<th><div align='center'><p>T-6</p><p>".$date6."</p><p>".$day6."</p></div</th>\n";
echo  "<th><div align='center'></div</th>\n";
echo  "<th><div align='center'></div</th>\n";
echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
echo    "<td>".anchor('pof/admin/posPage/'.$row->posi, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";
 echo "<td><b>".$row->pof_no."<b></td>";
  echo "<td><b>".$row->jobtitle."<b></td>";
    echo "<td><b>".$row->parentname."<b></td>";
 echo "<td><div align='center'>".anchor('usage/admin/poscons/'.$row->posi,$row->countt,array('target'=>'_blank'))."</div></td>";
  if($row->count1==0)
    {
 echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date.'/'.$row->c_id,'<span id="red">'.$row->count1.'</span>',array('target'=>'_blank'))."</div></td>\n";
   }
   else{
     echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date.'/'.$row->c_id,'<span id="blue">'.$row->count1.'</span>')."</div></td>";
   }
   
   if($row->count2==0)
    {
 echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date1.'/'.$row->c_id,'<span id="red">'.$row->count2.'</span>',array('target'=>'_blank'))."</div></td>\n";
   }
   else{
     echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date1.'/'.$row->c_id,'<span id="blue">'.$row->count2.'</span>')."</div></td>";
   }
   
   if($row->count3==0)
    {
 echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date2.'/'.$row->c_id,'<span id="red">'.$row->count3.'</span>',array('target'=>'_blank'))."</div></td>\n";
   }
   else{
     echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date2.'/'.$row->c_id,'<span id="blue">'.$row->count3.'</span>')."</div></td>";
   }
   
   if($row->count4==0)
    {
 echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date3.'/'.$row->c_id,'<span id="red">'.$row->count4.'</span>',array('target'=>'_blank'))."</div></td>\n";
   }
   else{
     echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date3.'/'.$row->c_id,'<span id="blue">'.$row->count4.'</span>')."</div></td>";
   }
   
   if($row->count5==0)
    {
 echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date4.'/'.$row->c_id,'<span id="red">'.$row->count5.'</span>',array('target'=>'_blank'))."</div></td>\n";
   }
   else{
     echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date4.'/'.$row->c_id,'<span id="blue">'.$row->count5.'</span>')."</div></td>";
   }
   
   if($row->count6==0)
    {
 echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date5.'/'.$row->c_id,'<span id="red">'.$row->count6.'</span>',array('target'=>'_blank'))."</div></td>\n";
   }
   else{
     echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date5.'/'.$row->c_id,'<span id="blue">'.$row->count6.'</span>')."</div></td>";
   }
   
   if($row->count7==0)
    {
 echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date6.'/'.$row->c_id,'<span id="red">'.$row->count7.'</span>',array('target'=>'_blank'))."</div></td>\n";
   }
   else{
     echo "<td><div align='center'>".anchor('usage/admin/posdelcvsent/'.$date6.'/'.$row->c_id,'<span id="blue">'.$row->count7.'</span>')."</div></td>";
   }
	 
		   $totalcvsent = (($row->totalcvsent1)+($row->totalcvsent2)+($row->totalcvsent3)+($row->totalcvsent4));
  echo "<td><div align='center'><b>".anchor('pof/admin/cvSent/'.$row->pofid,'<span id="blue">'.$totalcvsent.'</span>',array('target'=>'_blank'))."</b></div></td>";
  $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
$scribble_image = "http://software.triedge.in/assets/icons/scribble.png";
   echo    "<td><div align='center'>".anchor_popup('pof/admin/scribble/'.$row->posi.'/', img($scribble_image), $atts)."</div></td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>

