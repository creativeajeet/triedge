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
 echo    "<td>$row->pof_no</td>";
 echo    "<td>$row->jobtitle</td>";
 echo    "<td>$row->comp</td>";
  echo    "<td>$row->pos_taken_on</td>";
 echo    "<td>$row->username</td>";
 echo    "<td></td>";
  echo  "</tr>";

 echo "</tbody>\n</table>";

 
 ?>
 <h2>Scribble</h2>
 <?php
 if (count($poscomments)){ 
 echo "<table class='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Scribbles</th>\n";
	
		echo "<th>On</th>\n";
			echo "<th>By</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($poscomments as $row){
 
echo "<tr valign='top'>\n";

 echo    "<td>$row->msg</td>";
 echo    "<td>$row->date</td>";
 echo    "<td>$row->username</td>";
 echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No comments found'; 
 } 
 ?>
 <?php echo form_open('pof/admin/scribble/'.$pid.'/');?>
 <?php
 if (count($allocated)){ 
 foreach ($allocated as $row){

 
  echo    "<input name='consuls[]' type='hidden' value='".$row->section_id."'/>";
  
 }

 }
 
 ?>
<table width="100%">
  
	<tr>
      <td height="19"><textarea name="msg" cols="90" rows="5" style="background:#CCCCCC"></textarea></td>
    </tr>
	<tr>
      <td width="793">
        <div align="left">
          <input name="submit" type="submit" class="btn btn-primary" value="Save" />
        </div></td>
	</tr>
</table>
 
</body>
</html>