<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <style>
		body { font-size: 75%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		a{text-decoration:none;}
		{font-size:60%};
	</style>
	<script>
	$(function() {
	
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		$( "#dialog-confirm" ).dialog({
			autoOpen: true,
			resizable: false,
			height:180,
			modal: true,
			hide: 'Slide',
			buttons: {
				"Read": function() {
					var is_read = {msg_id : $("#is_read").attr('value')};
					$.ajax({
						type: "POST",
						url : "<?php echo site_url('admin/home/readMsg/')?>",
						data: is_read,
						success: function(msg){
							$('#show').html(msg);
							$('#dialog-confirm' ).dialog( "close" );
						}
				  	});

					},
				"Read Later": function() {
					$( this ).dialog( "close" );
				}
			}
		});
		
		
 	});
	</script>	

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datepick.pack.js" ></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker/jquery.ui.all.css" />
<script type="text/javascript">
			$(document).ready(function(){
				
				//	-- Datepicker
				$(".datepicker").datepicker({
					dateFormat: 'yy-mm-dd',
					showButtonPanel: true
				});					
				
			
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
<style type="text/css">
<!--
#news
{
	padding-bottom: 10px;
	
}

.newslink {
	color: #FFFFFF;
	text-decoration: none;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	padding-left: 5px;
}
.newslink:hover {
	color: #FFFFFF;
	text-decoration: none;
}
.newsby {
	color: #CC6633;
	text-decoration: none;
	padding-right: 10px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
}
.box {
	border-top-style: groove;
	border-right-style: groove;
	border-bottom-style: groove;
	border-left-style: groove;
	width: 650px;
	
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	background-color: #006666;
	color: #FFFFFF;
}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
#myvrs {
	color: #FF0000;
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
<br/>
				<div class="page-header">
					<div class="pull-left">
						<h1><?php echo $this->session->userdata('username'); ?></h1>
					</div>
					<div class="pull-right">
						<?php  
$atts = array(
              'width'      => '750',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
			?>
						
						<ul class="tiles">
						<li class="red">
						<?php 
  if($userd['group']!=2)
    {
   echo anchor_popup('pof/admin/myVRS/', '<span><i class="icon-briefcase"></i></span><span class="name">My VRS</span>', $atts);
  }
 
  ?>
								
							</li>
						<li class="lime">
								<?php echo anchor_popup('candidates/admin/mymapsheets/', '<span><i class="icon-th-list"></i></span><span class="name">My Mapping sheet</span>', $atts); ?>
						<li class="brown">
								<?php echo anchor_popup('messege/admin/task/', '<span><i class="icon-tasks"></i></span><span class="name">Allocate Tasks</span>', $atts); ?>
							</li>
						<li class="blue">
								<?php echo anchor_popup('candidates/admin/newCandidate/', '<span><i class="icon-user"></i></span><span class="name">New Candidate</span>', $atts); ?>
							</li>
							<li class="green">
								
								<?php echo anchor_popup('messege/admin/newMsg/', '<span><i class="icon-envelope"></i></span><span class="name">Message</span>', $atts); ?>
							</li>
						<li class="orange long">
								<a href="#"><span class="big"><?php $this->load->view('admin/totaldb'); ?></span><span class='name'><i class="icon-cloud-upload"></i>Total Records in DB</span></a>
							</li>
							
						</ul>
					</div>
				</div>

<br/>

    
  
<?php echo form_open('admin/home/find/'); ?>
<table width="600" align="center">
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><div align="center" class="style3">From</div></td>
    <td width="81">
      <div align="left">
        <input name="from" type="text" size="15" style="background:#CCCCCC" class="datepicker"/>
      </div></td><td width="81"><div align="center" class="style3">To</div></td>
    <td>
      <div align="center">
        <input name="to" type="text" size="15" style="background:#CCCCCC" class="datepicker"/>
      </div></td>
    <td><div align="center">
      <button type="submit" class="btn btn-primary" name="submit">Get</button>
    </div></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td width="78"><div align="center" class="style2">Added</div></td>
    <td width="81" colspan="2"><div align="center" class="style2">Edited</div></td>
    <td width="85"><div align="center" class="style2">Deleted</div></td>
    <td width="78"><div align="center" class="style2">Total</div></td>
  </tr>
  <tr>
    <td><div align="center"><?php echo anchor('usage/admin/addedbyUser/'.$user.'/'.$from.'/'.$to,$added); ?></div></td>
    <td colspan="2"><div align="center"><?php echo anchor('usage/admin/editedbyUser/'.$user.'/'.$from.'/'.$to,$edited); ?></div></td>
    <td width="85"><div align="center"><?php echo anchor('usage/admin/deletedbyUser/'.$user.'/'.$from.'/'.$to,$deleted); ?></div></td>
    <td><div align="center"><?php echo anchor('usage/admin/actionsToday/',$total); ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<?php 
 if($userd['group']==2)
 {
  echo "<h2>Acknowledgement for VRS for last week</h2>";
   echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Name</th>\n";
	echo "<th>Is Read?</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($vrsread as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
   if($row->is_read==1)
    {
 echo    "<td><span style='color:#009900'>Yes</span></td>";
 }
 else{
 echo    "<td><span style='color:#FF0000'>No</span></td>";
 }
   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 echo "<br/>";
  echo "<h2>No CV sent in last week</h2>";
   echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Name</th>\n";
	echo "<th>CV sent?</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($novrs as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
   
 echo    "<td><span style='color:#FF0000'>No CV sent </span></td>";

   echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 ?>
 
 <h2>Consultants Delivery</h2>
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
		
		$day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
?>

<?php if (count($posdel)){ 
echo "<table>\n";
echo "<thead>\n";
echo "<tr>\n";
echo "<th scope='col' width='10%'>Consultant </th>\n";
echo "<th scope='col' width='5%'><div align='center'>No. of Open Pos.</div></th>\n";
echo "<th scope='col' width='5%'><div align='center'>No. of Active Pos.</div></th>\n";
echo "<th scope='col' colspan='7'><div align='center'>CVSent</div</th>\n";
echo  "<th scope='col'><div align='center'>This Week</div</th>\n";
echo  "<th scope='col'><div align='center'>Last Week</div</th>\n";
echo  "<th scope='col'><div align='center'>Last Month</div</th></tr>\n";
echo "<tr>\n";
echo "<th width='10%'></th>\n";
echo "<th width='5%'><div align='center'></div></th>\n";
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
echo  "<th><div align='center'></div</th>\n";
echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($posdel as $row){
 
echo "<tr valign='top'>\n";
     echo "<td scope='col'><b>".$row->username."<b></td>\n";
    echo "<td scope='col'><div align='center'>".anchor('usage/admin/conspos/'.$row->id,$row->countt,array('target'=>'_blank'))."</div></td>\n";
	echo "<td scope='col'><div align='center'>".anchor('usage/admin/consposactive/'.$row->id,$row->allurgent+$row->allactive,array('target'=>'_blank'))."</div></td>\n";
	if($row->count1==0)
	  {
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date.'/'.$row->id,'<span id="red">'.$row->count1.'</span>',array('target'=>'_blank'))."</div></td>\n";
	 }
	 else{
	 echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date.'/'.$row->id,$row->count1,array('target'=>'_blank'))."</div></td>\n";
	 }
	 if($row->count2==0)
	 {
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date1.'/'.$row->id,'<span id="red">'.$row->count2.'</span>',array('target'=>'_blank'))."</div></td>\n";
	 }
	 else{
	  echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date1.'/'.$row->id,$row->count2,array('target'=>'_blank'))."</div></td>\n";
	  }
	  if($row->count3==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date2.'/'.$row->id,'<span id="red">'.$row->count3.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date2.'/'.$row->id,$row->count3,array('target'=>'_blank'))."</div></td>\n";
	   }
	   
	   if($row->count4==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date3.'/'.$row->id,'<span id="red">'.$row->count4.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date3.'/'.$row->id,$row->count4,array('target'=>'_blank'))."</div></td>\n";
	   }
	   if($row->count5==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date4.'/'.$row->id,'<span id="red">'.$row->count5.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date4.'/'.$row->id,$row->count5,array('target'=>'_blank'))."</div></td>\n";
	   }
	   if($row->count6==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date5.'/'.$row->id,'<span id="red">'.$row->count6.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date5.'/'.$row->id,$row->count6,array('target'=>'_blank'))."</div></td>\n";
	   }
	   if($row->count7==0)
	   {
	     echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date6.'/'.$row->id,'<span id="red">'.$row->count7.'</span>',array('target'=>'_blank'))."</div></td>\n";
	   }
	   else
	   {
	   echo "<td scope='col'><div align='center'>".anchor('usage/admin/consdelcvsent/'.$date6.'/'.$row->id,$row->count7,array('target'=>'_blank'))."</div></td>\n";
	   }
	   
		   $thisweek = $row->count1+$row->count2+$row->count3+$row->count4+$row->count5+$row->count6+$row->count7;
   echo "<td scope='col'><div align='center'><b>".anchor('usage/admin/thisweek/'.$date6.'/'.$date.'/'.$row->id,$thisweek,array('target'=>'_blank'))."<b></div></td>\n";
  echo "<td scope='col'><div align='center'><b>".anchor('usage/admin/thisweek/'.$from.'/'.$to.'/'.$row->id,$row->countlast,array('target'=>'_blank'))."<b></div></td>\n";
    echo "<td scope='col'><div align='center'><b><b></div></td>\n";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>


<h2>Positions Allocated to Me</h2>
<p>
  <?php
 if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	echo "<th>POF No.</th>\n";
    echo "<th>Date of Allocation</th>\n";
	echo "<th><div align='center'>Days since Allocation</div></th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Company</th>\n";
		echo "<th>No. of Pos</th>\n";
		echo "<th>Location</th>\n";
		echo "<th>Grade</th>\n";
		echo "<th>Max. Salary</th>\n";
		echo "<th>Pos Status</th>\n";
		echo "<th>% Share</th>\n";
		echo "<th>Consultant</th>\n";
		echo "<th></th>\n";
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>".form_checkbox('c_id[]',$row->pof_id,FALSE)."</td>";
 
echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";

 echo    "<td>$row->pof_no</td>";
 echo    "<td>$row->fad</td>";
 $date1 = strtotime($row->fad);
 $date = date('Y-m-d');
 $date2 = strtotime($date);
 $days_between = ceil(abs($date2 - $date1) / 86400);
 echo    "<td><div align='center'>".$days_between ."</div></td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
 echo    "<td>$row->no_of_pos</td>";
 echo    "<td>$row->segment_name</td>";
 echo    "<td>$row->grade</td>";
 echo    "<td>$row->sal_t</td>";
 echo    "<td></td>";
  echo    "<td>$row->credit</td>";
  echo    "<td>$row->consuls</td>";
  echo    "<td>".anchor('pof/admin/enterVC/'.$row->pof_id,'enter VC')."</td>";
 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No Positions found'; 
 } 
 ?>
</p>

<table id="right" width="100%">
  <tr>
    <td width="75%" rowspan="8" scope="col">&nbsp;</td>
    <th width="25%" scope="col"><div align="center">My Links </div></th>
  </tr>
 <tr bgcolor="#CCCCFF">
    <td scope="col"><?php echo anchor('candidates/admin/mycandidate','My Candidates'); ?></td>
  </tr>
  <tr>
    <td scope="col"><?php echo anchor('candidates/admin/cand_to_worksheet','My Unattached Worksheet List'); ?></td>
  </tr>
  <tr bgcolor="#CCCCFF">
    <td scope="col"><?php echo anchor('messege/admin/seeAll','My Messages'); ?></td>
  </tr>
  <?php 
  if($userd['group']==2)
    {
 echo "<tr>
    <td scope='col'> - ".anchor('metrices/admin/allLeaveApplications','Leave Applications')."</td>
  </tr>
  <tr>
    <td scope='col'> - ".anchor('metrices/admin/allNewPositions','Position Uploaded')."</td>
  </tr>";
  }
  else{
   echo "<tr>
     <td scope='col'> - ".anchor('metrices/admin/myLeaveApplications/'.$userid,'My Leave Application')."</td>
  </tr>";
  }
  ?>
  <tr>
    <td scope="col"><?php echo anchor('candidates/admin/notAttach','My Unattached CV List'); ?></td>
  </tr>
  <tr>
    <td scope="col"><?php echo anchor('pof/admin/getCandFinalRound','Offer MIS', array('target'=>'_blank')); ?></td>
  </tr>
</table>

<p>&nbsp;</p>

<div align="left"></div></div>
<?php if($message=='0')
{
 echo " ";
}
else
{
  print  '<div id="dialog-confirm" title="'.$title.'"> 
	<p>
		
		<input type="hidden" value="'.$id.'" id="is_read" name="is_read">'.$message.'<br/>'.'- '.$sentby.'-'.$datesent.'</p> 
</div> ';
}
?>
