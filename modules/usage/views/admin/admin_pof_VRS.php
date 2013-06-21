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


							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Consolidated VRS
								</h3>
							</div>
						
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
		echo "<th><div align='center'>Delay</div></th>\n";
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
  echo    "<td>$row->current_location</td>";
  echo    "<td>$row->username</td>";
 echo    "<td>$row->pos_taken_on</td>";
  echo    "<td>$row->date</td>";
  if(!$row->shared_on)
  {
  echo "<td><div align='center'><span style='color:#FF0000'>Not marked</span></div></td>";
   }
 else
  {
  $date1 = strtotime($row->date);
 $date2 = strtotime($row->shared_on);
 $days_between = ceil(abs($date1 - $date2) / 86400);
 echo    "<td><div align='center'>".$days_between ." days</div></td>";
  } 
 
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
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/viewcv/'.$row->cand_id, img($cv_image), $atts)."</div></td>";
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

