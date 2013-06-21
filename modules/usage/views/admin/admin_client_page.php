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
	#employee{
	color: white;
	font-weight: bold;
	background-color: #3366CC;
	}
	tr,td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>
	<style type="text/css">
<!--
#cvsent {
	color: #990000;
	font-weight: bold;
}

.tab_container_can {
	border: 1px solid #999;
	border-top: none;
	clear: both;
	float: none;
	width: 100%px;
	font-size:14px;
	color:#243953;
	background-color:#fafafa;
	border: 1px solid #a9a9a9;
	-moz-border-radius: 5px;
    -webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	text-align:left;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	height: 100%;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	padding-top: 2px;
	padding-right: 5px;
	padding-bottom: 2px;
	padding-left: 5px;	
}
-->
</style>
	<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
.data table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
.data tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
.data th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
.data tr, .data td, .data th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>
	

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
			$(document).ready(function(){
				
				//	-- Datepicker
				$(".datepicker").datepicker({
					dateFormat: 'yy-mm-dd',
					showButtonPanel: true
				});					
				
				// -- Clone table rows
				$(".cloneTableRows").live('click', function(){

					// this tables id
					var thisTableId = $(this).parents("table").attr("id");
				
					// lastRow
					var lastRow = $('#'+thisTableId + " tr:last");
					
					// clone last row
					var newRow = lastRow.clone(true);

					// append row to this table
					$('#'+thisTableId).append(newRow);
					
					// make the delete image visible
					$('#'+thisTableId + " tr:last td:first img").css("visibility", "visible");
					
					// clear the inputs (Optional)
					$('#'+thisTableId + " tr:last td :input").val('');
					
					// new rows datepicker need to be re-initialized
					$(newRow).find("input").each(function(){
						if($(this).hasClass("hasDatepicker")){ // if the current input has the hasDatpicker class
							var this_id = $(this).attr("id"); // current inputs id
							var new_id = this_id +1; // a new id
							$(this).attr("id", new_id); // change to new id
							$(this).removeClass('hasDatepicker'); // remove hasDatepicker class
							 // re-init datepicker
							$(this).datepicker({
								dateFormat: 'yy-mm-dd',
								showButtonPanel: true
							});
						}
					});					
					
					return false;
				});
				
				// Delete a table row
				$("img.delRow").click(function(){
					$(this).parents("tr").remove();
					return false;
				});
			
			});
		</script>

<script>
	$(function() {
		$( "#tab" ).tabs({selected: 0}); 
	});
	</script>
	<script>
	$(function() {
		$( "#tabs" ).tabs(); 
	});
	</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}

-->
</style>
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
	<div id="tab-4">
			<h2>Clientwise</h2>
			
	<?php
 if (count($resultspos)){ 
 echo "<table>\n";
		echo form_open('pof/admin/changeStatus/'.$page);	
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	echo "<th>Discussed On</th>\n";
	echo "<th>POF No.</th>\n";
    echo "<th>Date of Receipt</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Company</th>\n";
		echo "<th>No. of Pos</th>\n";
		echo "<th>Location</th>\n";
		echo "<th>Grade</th>\n";
		echo "<th>Max. Salary</th>\n";
		echo "<th>Pos Status</th>\n";
		echo "<th>Response Status</th>\n";
		echo "<th>Consultant</th>\n";
		echo "<th></th>\n";
		echo "<th>JD</th>\n";
		//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
  $client  = '';
 foreach ($resultspos as $row){
 echo '<script type="text/javascript">                                         
$(document).ready(function() {
  $("tr#cat'.$row->client_id.'.child").hide();
        $("tr#cat'.$row->client_id.'.header").show();

   $("tr#cat'.$row->client_id.'.header").click(function () { 
      $("tr#cat'.$row->client_id.'.child").each(function() {
         $(this).slideToggle("fast");
      });
   });


});

</script>   ';
 if(($row->client_id) != $client )
				   {
				    echo "<tr id='cat".$row->client_id."' class='header'><th colspan='17' id='employee'>".anchor_popup('candidates/admin/editCandidate/'.$row->client_id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)." ".$row->compa."<div align='left' style='margin-top:-10px; margin-bottom:-30px; margin-left:1040px;'><b>Client Manager :</b>".$row->username."</div><div align='right' style='margin-top:-10px; margin-bottom:10px;'>".anchor_popup('companies/admin/addScribble/'.$compid.'/'.$row->client_id, img($scribble_image), $atts)."</div></th></tr>";
					$hrmanager = $row->client_id;
				   }
				   
 
if(($row->talked_on)==date('Y-m-d'))
  {
   echo "<tr valign='top' bgcolor='#FFFFCC' id='cat".$row->client_id."' class='child'>\n";
  }
  else{
 if(($row->manager)==19)
 {
echo "<tr valign='top' bgcolor='#FFCCCC' id='cat".$row->client_id."' class='child'>\n";
}
elseif(($row->manager)==37)
 {
echo "<tr valign='top' bgcolor='#66FF99' id='cat".$row->client_id."' class='child'>\n";
}
else
{
echo "<tr valign='top' bgcolor='#eee' id='cat".$row->client_id."' class='child'>\n";

}
}
 if($user['group']==2)
 {
  echo    "<td><input name='manager' type='hidden' value=".$this->session->userdata('id')."/><input id='pofid' name='pofid[]' value='".$row->pof_id."' type='checkbox'  /></td>";
  }
  else
  {
    echo "<td></td>";
  }
 if(!$row->is_allocated)
   {
echo    "<td>".anchor('pof/admin/editPof/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";}
else
{
 echo    "<td>".anchor('pof/admin/posPage/'.$row->pof_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";

}
if(($row->talked_on)==date('Y-m-d'))
   {
    echo    "<td>Discussed today</td>";
   }
  elseif(($row->talked_on)=='0000-00-00')
   {
    echo    "<td>Not Discussed</td>";
   }
   else{
     $datetalk = strtotime($row->talked_on);
 $datetoday = date('Y-m-d');
 $datef = strtotime($datetoday);
 $days_between_talk = ceil(abs($datef - $datetalk) / 86400);
 echo    "<td><div align='center'>".$days_between_talk ." days ago</div></td>";

   }

 echo    "<td>$row->pof_no</td>";
 echo    "<td><div align='center'>$row->pos_taken_on</div></td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->compa</td>";
 echo    "<td><div align='center'>$row->no_of_pos</div></td>";
 echo    "<td>$row->loca</td>";
 echo    "<td>$row->grade</td>";
 echo    "<td><div align='center'>$row->sal_t</div></div></td>";
 $array = array(''=>'','wip_urgent'=>'WIP Urgent','wip_active'=>'WIP Active','wip_hold'=>'WIP Hold','client_hold'=>'Client Hold','mirus_drop'=>'Mirus Drop','client_drop'=>'Client Drop','lost_compt'=>'Lost Competition','lost_int'=>'Lost Internal','closed'=>'Closed');
 echo    "<td>".form_hidden("pof_id[]",$row->pof_id).form_dropdown('pos_status[]',$array, set_value('pos_status',$row->pos_status))."</td>";
echo   "<td><div align='center'>".$row->count2." <b>/</b> ".(($row->sum1)+($row->sum2)+($row->sum3)+($row->sum4))." <b>/</b> ".$row->sum3."<div></td>";
 echo    "<td>$row->consuls</td>";
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
 if($user['group']==2)
 {
 if(!$row->is_allocated)
 {
   
   echo "<td></td>";
 
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('pof/admin/scribble/'.$row->pof_id.'/', img($scribble_image), $atts)."</div></td>";
  }
  }
  else{
   echo  "<td></td>";
  }

 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$row->file_to_view)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('pof/admin/viewJD/'.$row->pof_id, img($cv_image), $atts)."</div></td>";
  } 
 

  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $totalpos; ?></b></p>
 
     </div>
