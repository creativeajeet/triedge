
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
$atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('messege/admin/newMsg/', img('http://localhost/uploadapp/assets/icons/msg1.png'), $atts)."</td>";
?>
<h2>My Messages</h2>
<table width="100%">
  <tr>
    <td width="78%" scope="col">&nbsp;</td>
    <td width="10%" scope="col"><?php echo anchor('messege/admin/seeAll','All'); ?></td>
    <td width="12%" scope="col"><?php echo anchor('messege/admin/sent','Sent'); ?></td>
  </tr>
</table>
<?php $page = $this->uri->segment(3); ?>
<?php echo form_open('candidates/admin/foldera/'.$page); ?>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Candidate List
								</h3>
							</div>
							<div class="box-content nopadding">
<?php
 if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th>Title</th>\n";
	echo "<th>Messege</th>\n";
     echo "<th>Messege Type</th>\n";
		echo "<th>Posted On</th>\n";
		echo "<th>Posted By</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
   $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('messege/admin/news/'.$row->msg_id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";
echo    "<td>$row->title</td>";
 echo    "<td>$row->msg</td>";
 echo    "<td>$row->type</td>";
 echo    "<td>$row->sent_on</td>";
 echo    "<td>$row->username</td>";
 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>



 <h2></h2>


</div>

    
