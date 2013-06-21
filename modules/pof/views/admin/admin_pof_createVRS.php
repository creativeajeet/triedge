<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	#data table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	#data tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
	#data th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	#data td, #data th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}
	</style>

<div align="center" >
<div class="box" align="center" >
<?php echo form_open('pof/admin/VRS/'); ?>
<table width="1018" align="center">
  <tr>
    <td colspan="13"><div align="center"><h2>Generate VRS </h2></div></td>
  </tr>
  <tr class="style2">
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr class="style2">
    <td width="30">&nbsp;</td>
    <td width="78"><div align="center" class="style3">From</div></td>
    <td width="1">&nbsp;</td>
    <td width="104">
     
    <input name="from" type="text" size="15" class="input-medium datepick">    </td>
    <td width="53"><div align="center">To</div></td>
    <td width="109"><input name="to" type="text" size="15" class="input-medium datepick"></td>
    <td width="100"><div align="center">Consultant</div></td>
    <td colspan="2"><?php echo form_dropdown('consultant', array('0'=>'All')+$consultant,'','style="width:120px;"'); ?></td>
    <td width="75"><div align="center">Client</div></td>
    <td width="144"><?php echo form_dropdown('client', array('0'=>'All')+$clients,'','style="width:120px;"'); ?></td>
    <td width="111">
      <input name="generate" type="submit" class="btn btn-primary" value="Generate VRS" />   </td>
    <td width="29">&nbsp;</td>
  </tr>
  <tr class="style2">
    <td colspan="13">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<?php echo form_close(); ?>
</div>
<div align="left"></div></div>
<h2>CVs sent Today </h2> 
<div align="right"><div style="margin-right:20px">Total CVs sent Today ::</div><div style="color:#FF0000; margin-top:-18px; font-size:14px"><b><?php echo $total; ?></b></div></div>
<div id="show">
<?php
 if (count($results)){ 
 echo "<table id='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	echo "<th><div align='center'>Client</div></th>\n";
	echo "<th><div align='center'>Pof No.</div></th>\n";
	echo "<th><div align='center'>Pos. Name</div></th>\n";
	echo "<th><div align='center'>Pos. Loc</div></th>\n";
		echo "<th><div align='center'>Cand Name</div></th>\n";
		echo "<th><div align='center'>Current Co.</div></th>\n";
		echo "<th><div align='center'>Designation</div></th>\n";
		echo "<th><div align='center'>Current Loc.</div></th>\n";
		echo "<th><div align='center'>Consultant</div></th>\n";
		echo "<th>Pos. Taken On</th>\n";
		echo "<th>CV Sent On</th>\n";
		echo "<th><div align='center'>CV</div></th>\n";
		echo "<th><div align='center'></div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>".form_checkbox('c_id[]',$row->cand_id,FALSE)."</td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->cand_id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";
 echo    "<td>$row->compa</td>";
  echo    "<td>$row->pof_no</td>";
  echo    "<td>$row->jobtitle</td>";
  echo    "<td>$row->segment_name</td>";
 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->designation</td>";
  echo    "<td>$row->loca</td>";
  echo    "<td>$row->username</td>";
 echo    "<td>$row->pos_taken_on</td>";
  echo    "<td>$row->date</td>";

$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$row->filepath)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/viewcv/'.$row->id, img($cv_image), $atts)."</div></td>";
  } 
  echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pos.png'))."</td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>


 <h2></h2>
 <?php echo $links; ?>

 </div>
</body>
</html>
