<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.6.1.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datepick.pack.js" ></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker/jquery.ui.all.css" />
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>

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

	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
	
	

	<style type="text/css">
	
table, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	
	vertical-align: baseline;
}


#tabs {
font-size: 90%;
margin: 2px 0;
}
#tabs ul {
float: left;

width: 600px;

}
#tabs li {

margin-bottom: -20px;
list-style: none;
}
* html #tabs li {
	display: inline; /* ie6 double float margin bug */
	margin-top: -20px;
}
#tabs li,
#tabs li a {
float: left;
}
#tabs ul li a {
text-decoration: none;
padding: 5px;
color: #0073BF;
font-weight: bold;
}
#tabs ul li.active {
background: #CEE1EF url(img/nav-right.gif) no-repeat right top;
}
#tabs ul li.active a {
background: url(img/nav-left.gif) no-repeat left top;
color: #333333;
}
#tabs div {
	background: #CEE1EF;
	clear: both;
	padding: 5px;
	min-height: 100px;
	
}
#tabs div h3 {
text-transform: uppercase;

letter-spacing: 1px;

#tabs div p {
line-height: 150%;
}
-->
</style>
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

 
</head>
<body>
<table width="590">
  <tr>
    <td width="78" scope="col"><div align="left">Pof No. </div></td>
    <td width="79" scope="col"><b><?php echo $row->pof_id; ?></b></td>
    <td width="172" scope="col"><div align="left">Allocation Date </div></td>
    <td width="631" scope="col"><b><?php echo $allocation['fad']; ?></b></td>
  </tr>
</table>
<h2>Edit Allocation </h2>
<?php echo form_open('pof/admin/editAllocation/'.$id); ?>
<table width="72%" id="table2"> 

   <tr bgcolor="#000033">
      <th width="191"><div align="center" class="style1">
     Consultant
    </div></th>
    <th width="133"><div align="center" class="style1">
      Credit
    %</div></th>
    <th width="200"><div align="center" class="style1">
     D/O/A</div></th>
	<th width="156"><div align="center" class="style1">Block Names </div></th>
	<th width="156"><div align="center" class="style1">Target End Date </div></th>
	    
      </tr>
   <tr height="10"></tr>
   <?php foreach($event_details as $list) { ?>
   <?php echo '<tr height="20">
			
			<td> <input name="event_id" type="hidden" value='.$list->event_id.'><div align="center">'.form_dropdown("consul",array('0'=>'')+$consultant, set_value('id', $list->section_id),"style='width:143px; background-color:#CCCCCC'").'</div></td>
			<td><div align="center">
			  <input name="credit" type="text" size="8" style="background:#CCCCCC"  value='.$list->credit.'>
			  </div></td>
			<td><div align="center">
			  <input name="doa" type="text" size="15" class="input-medium datepick" style="background:#CCCCCC"  value='.$list->start_date.'>
			  </div></td>
			  <td><div align="center">
			  <input name="block_names" type="text" size="15" style="background:#CCCCCC"  value='.$list->block_names.'>
			  </div></td>
			<td><div align="center">
			  <input name="end_date" type="text" size="15" class="input-medium datepick" style="background:#CCCCCC"  value='.$list->end_date.'>
			  </div></td>
			
		</tr>'; ?>
		 <?php } ?>
		 <tr>
		  <td colspan="5"><div align="right">
		    <input name="submit" type="submit" class="btn btn-primary" value="Update" />
	       </div></td>
		 </tr>
 </table>
<h2>Previously Allocated To</h2>
 <?php
 if (count($unallocated)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	    echo "<th>Consultant</th>\n";
		echo "<th>Credit</th>\n";
		echo " <th>D/O/A</th>\n";
		echo "<th>Target End date</th>\n";
		echo "<th>Blocked Names</th>\n";
		echo "<th>Instructions</th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($unallocated as $row){

echo "<tr valign='top'>\n";
  echo    "<td>$row->username</td>";
   echo    "<td>$row->credit</td>";
  echo    "<td>$row->start_date</td>";
 echo    "<td>$row->end_date</td>";
  echo    "<td>$row->block_names</td>";
 echo    "<td>$row->instruction</td>";
 echo    "<td>".anchor('pof/admin/editAllocation/'.$row->pof_id.'/'.$row->event_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";
  }
  echo  "</tr>";
  echo "</tbody>\n</table>";
echo '<h2></h2>';
/* echo '<table width="590">
  <tr>
    <td width="78" scope="col"><div align="left">Instructions </div></td>
  </tr>
  <tr>
    <td scope="col">'.$row->instruction.'</td>
  </tr>
</table>'; */
 
 }
 
 ?>
 <h2></h2>
<!--<table width="590">
  <tr>
    <td width="78" scope="col"><div align="left">Instructions </div></td>
  </tr>
  <tr>
    <td scope="col"><?php echo $allocation['instruction']; ?></td>
  </tr>
</table> -->
<h2>Currently Allocated To</h2>
 <?php
 if (count($allocated)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	    echo "<th>Consultant</th>\n";
		echo "<th>Credit</th>\n";
		echo " <th>D/O/A</th>\n";
		echo "<th>Target End date</th>\n";
		echo "<th>Blocked Names</th>\n";
		echo "<th>Instructions</th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($allocated as $row){

echo "<tr valign='top'>\n";
 
  echo    "<td>$row->username</td>";
   echo    "<td>$row->credit</td>";
  echo    "<td>$row->start_date</td>";
 echo    "<td>$row->end_date</td>";
 echo    "<td>$row->block_names</td>";
 echo    "<td>$row->instruction</td>";
  echo    "<td>".anchor('pof/admin/editAllocation/'.$row->pof_id.'/'.$row->event_id, img('http://software.triedge.in/assets/icons/pencil.png'))."</td>";
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 ?>
</body>
</html>