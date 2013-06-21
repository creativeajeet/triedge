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
<?php
 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	    echo "<th>POF No.</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Company</th>\n";
		echo "<th>Date of Receipt</th>\n";
		echo "<th>Client Manager</th>\n";
		echo "<th>Pos Status</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 
 
echo "<tr valign='top'>\n";
 echo    "<td>$row->pof_id</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
  echo    "<td>$row->pos_taken_on</td>";
 echo    "<td>$row->username</td>";
 echo    "<td></td>";
  echo  "</tr>";

 echo "</tbody>\n</table>";

 
 ?>
 <h2>Commitment Made to Client</h2>
<table width="591" id="table5">
       <tr bgcolor="#000033">
         <th width="396" height="3" bgcolor="#000000"><div align="center" class="style1">Comment</div></th>
         <th width="132" bgcolor="#000000" ><div align="center" class="style1">Date</div></th>
         <td width="47" bgcolor="#FFFFFF"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows"></div></td>
       </tr>
	    <?php foreach($commitment as $key =>$row) {
       echo '<tr height="20">
         <td style="padding-top:5px;"><input name="commit_comment[]" type="text" size="66" value="'.$row['comment'].'" /></td>
         <td><div align="center">
             <input name="commit_date[]" type="text" size="15" class="datepicker" value="'.$row['date'].'" />
         </div></td>
         <td></td>
       </tr>';
	    } ?>
</table>
 <h2>Allocate to</h2>
<?php echo form_open('pof/admin/re_allocation/'.$pid);?>
<?php foreach($allocation_details as $list) { ?>
   <?php echo '<tr height="20">
			
			<input name="event_id[]" type="hidden" size="8" style="background:#CCCCCC"  value='.$list->event_id.'>
		<input name="jobtitle[]" type="hidden" value="'.$list->event_name.'"></tr>'; ?>
		 <?php } ?>
<table>
<input name="jobtitle1" type="hidden" value="<?php echo $list->event_name; ?>"  />
<tr>
      <td height="19" colspan="2"><div align="right"><?php print anchor_popup('pof/admin/allocation_history/'.$pid,'Allocation History',array('class'=>'icon_alloc'))?></div></td>
      <td height="19"><div align="right"><?php print anchor_popup('pof/admin/was','Work Allocation Viewer',array('class'=>'icon_alloc'))?></div></td>
  </tr>
</table>

<table width="72%" id="table2"> 

   <tr bgcolor="#000033">
   <th width="48"></th>
      <th width="384"><div align="center" class="style1">
     Consultant
    </div></th>
    <th width="154"><div align="center" class="style1">
      Credit
    %</div></th>
    <th width="226"><div align="center" class="style1">Start date </div></th>
	<th width="179"><div align="center" class="style1">Target End Date </div></th>
	 <th width="156"><div align="center" class="style1">Block Names </div></th>
	
	    
    <td width="88"><div align="center"><img src="<?php echo base_url()?>assets/icons/add.png" class="cloneTableRows"></div></td>
   </tr>
   <tr height="10"></tr>
   <tr height="20">
			<td><img src="<?php echo base_url()?>assets/icons/del.png" alt="" class="delRow" style="visibility: hidden;"></td>
			<td> <div align="center"><?php echo form_dropdown("consul[]",array('0'=>'')+$consultant,"","id='id', style='width:143px; background-color:#CCCCCC'");?></div></td>
			<td><div align="center">
			  <input name="credit[]" type="text" size="8" style="background:#CCCCCC" />
			  </div></td>
			<td><div align="center">
			  <input name="doa[]" type="text" size="15" class="datepicker" style="background:#CCCCCC"/>
			  </div></td>
			  <td><div align="center">
			  <input name="end_date[]" type="text" size="15" class="datepicker" style="background:#CCCCCC"/>
			  </div></td>
			  <td><div align="center">
              <input name="block_names[]" type="text" size="15" style="background:#CCCCCC"/>
            </div></td>
			
			
  </tr>
</table> 
 <h2></h2>
<table width="2371">
    <input name="jobtitle" type="hidden" value="<?php echo $job_title; ?>"/>
    
   
	<tr>
	  <td height="19"><div align="left">Transac. Type </div></td>
	  <td height="19"><select name="transaction_type" style="width:100px; background-color:#CCCCCC">
        <option value=""></option>
        <option value="retained" <?php if($row->transaction_type=='retained'){ echo 'selected="selected"'; }?>>Retained</option>
        <option value="exclusive" <?php if($row->transaction_type=='exclusive'){ echo 'selected="selected"'; }?>>Exclusive</option>
        <option value="exclusive" <?php if($row->transaction_type=='st_exclusive'){ echo 'selected="selected"'; }?>>ST Exclusive</option>
        <option value="contingent" <?php if($row->transaction_type=='contingent'){ echo 'selected="selected"'; }?>>Contingent</option>
        <option value="contingent" <?php if($row->transaction_type=='contingent_late'){ echo 'selected="selected"'; }?>>Contingent Late</option>
      </select></td>
	  <td><div align="left">Transac. Imp. </div></td>
	  <td><select name="transaction_imp" style="width:100px; background-color:#CCCCCC">
        <option value=""></option>
        <option value="lead">Lead Priority</option>
        <option value="high">High Priority</option>
        <option value="mid">Mid Priority</option>
        <option value="low">Low Priority</option>
        <option value="servicing">Servicing</option>
      </select></td>
	  <td colspan="2"><div align="left">Target Resumes </div></td>
	  <td><select name="target_resume" style="width:100px; background-color:#CCCCCC">
        <option value=""></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
      </select></td>
  </tr>
	<tr>
      <td width="151" height="19"><div align="left">Allocation date </div></td>
      <td width="211" height="19"><input name="fad" class="datepicker" type="text" size="10" style="background:#CCCCCC" value="<?php echo date('Y-m-d'); ?>"/></td>
	 
      <td width="190"><div align="left">Allocated By </div></td>
      <td width="170"><input name="allocated_by" type="text" size="10" style="background:#CCCCCC" value="<?php echo $this->session->userdata('username'); ?>"/></td>
      <td width="181" colspan="2">&nbsp;</td>
      <td width="178">Instruction</td>
	</tr>
	<tr>
      <td width="151" height="19"><div align="left">Supervise By </div></td>
      <td width="211" height="19"><?php echo form_dropdown("superviser",array('0'=>'')+$consultant,"","id='id', style='width:143px; background-color:#CCCCCC'");?></td>
      <td width="190">&nbsp;</td>
      <td width="170">&nbsp;</td>
      <td width="181" colspan="2">&nbsp;</td>
      <td width="178" height="19"><textarea name="instruction" cols="20" style="background:#CCCCCC"/><?php echo $allocation['instruction']; ?></textarea></td>
	</tr>
	<tr>
      <td width="151" height="19" colspan="3">&nbsp;</td>
      <td width="170">&nbsp;</td>
      <td width="89"><div align="left">P. Focus </div></td>
      <td width="90"><input id='pofid' name='pofid[]' type='checkbox' /></td>
      <td width="178" height="19"></textarea>
        <input name="submit" type="submit" class="btn btn-primary" value="Re-allocate" />      </td>
	</tr>
</table>

</body>
</html>