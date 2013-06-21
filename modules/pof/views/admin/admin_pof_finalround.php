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

</head>

<body>

<div align="center" >
  <div align="left"></div></div>
<h2>Candidates at Final Round Stage </h2> 
<div align="right">
  <div style="margin-right:20px">Total Candidates at Final Round::</div>
  <div style="color:#FF0000; margin-top:-18px; font-size:14px"><b><?php echo $total; ?></b></div></div>
  
<div align="left" style="margin-top:-15px;"><div align="left"><?php echo anchor('pof/admin/getCandOffer', '<span id="updated">Candidates at Offer Stage</span>'); ?><div align="left" style="margin-left:200px; margin-top:-18px;"><?php echo anchor('pof/admin/CandClosed', '<span id="notupdated">Closed</span>'); ?></div><div align="left" style="margin-left:310px; margin-top:-18px;"><?php echo anchor('pof/admin/CandJ', '<span>Joined</span>'); ?></div></div></div>
<div id="show">
<?php
 if (count($results)){ 
 echo "<table id='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
		echo "<th><div align='center'>Name</div></th>\n";
		echo "<th><div align='center'>Current Co.</div></th>\n";
		echo "<th><div align='center'>Designation</div></th>\n";
		echo "<th><div align='center'>Current Loc.</div></th>\n";
		echo "<th>Pos. Taken On</th>\n";
		echo "<th><div align='center'>Pos. Name</div></th>\n";
		echo "<th><div align='center'>Client</div></th>\n";
		echo "<th><div align='center'>Consultant</div></th>\n";
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

 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->designation</td>";
  echo    "<td>$row->current_location</td>";
 echo    "<td>$row->pos_taken_on</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
 echo    "<td>$row->username</td>";
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
