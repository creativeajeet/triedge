<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.6.1.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js" ></script>


<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker/jquery.ui.all.css" />


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
$compid=$this->uri->segment(4);
echo form_open('companies/admin/editGradeStruc/'.$compid); ?>

<table width="52%"> 

   <tr bgcolor="#000033">
   <th width="48"></th>
     <th width="100"><div align="center" class="style1">Grade</div></th>
	<th width="50"><div align="center" class="style1">Order</div></th>
	 <th width="50"><div align="center" class="style1">Equi Designation</div></th>
	 <th width="100"><div align="center" class="style1">Level</div></th>
	
	    
    <th width="88"></th>
   </tr>
   
   <?php if (count($gradestruc)){ 
     foreach ($gradestruc as $row){
        echo   '<tr height="20">';
		echo	'<td><input name="gid[]" value="'.$row->gid.'" type="hidden"/></td>';
		echo	'<td><div align="center">';
		echo	  '<input name="oldgrade[]" value="'.$row->grade.'" type="text" size="15" style="background:#CCCCCC"/>';
		echo	  '</div></td>';
		echo	  '<td><div align="center">';
		$array=array('0'=>'', '1'=>'1','2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7','8'=>'8','9'=>'9', '10'=>'10', '11'=>'11', '12'=>'12', '13'=>'13', '14'=>'14', '15'=>'15', '16'=>'16', '17'=>'17', '18'=>'18', '19'=>'19', '20'=>'20');
		echo	  form_dropdown('oldstatus[]',$array,set_value('oldstatus',$row->status),'style="background:#CCCCCC"');
		echo	  '</div></td>';
		echo  '<td><div align="center">';
         echo     '<input name="oldequidesig[]" value="'.$row->equi_desig.'" type="text" size="15" style="background:#CCCCCC"/>';
         echo   '</div></td>';
		echo  '<td><div align="center">';
       echo	  form_dropdown('oldlevel[]',array('0'=>'')+$leveldrop,set_value('oldlevel',$row->level),'style="background:#CCCCCC"');
         echo   '</div></td>';
		echo	'<td></td>';
		  echo '</tr>';
		}
		}
		?>
	
 
</table> 
<div align="right">
  <input name="update" type="submit" class="btn btn-primary" value="Update" />
</div>
<table width="52%" id="table2"> 

    <tr bgcolor="#000033">
   <td width="48"></td>
     <td width="100"></td>
	<td width="50"></td>
	<td width="50"></td>
	 <td width="100"></td>
	
	    
    <td width="88"><div align="center"><img src="<?php echo base_url()?>assets/icons/add.png" class="cloneTableRows"></th>
   </tr>
    <tr height="20">
			<td><img src="<?php echo base_url()?>assets/icons/del.png" alt="" class="delRow" style="visibility: hidden;"></td>
			<td><div align="center">
			  <input name="grade[]" type="text" size="15" style="background:#CCCCCC"/>
			  </div></td>
			  <td><div align="center">
			  <input name="status[]" type="text" size="2" style="background:#CCCCCC"/>
			  </div></td>
			  <td><div align="center">
              <input name="equidesig[]" type="text" size="15" style="background:#CCCCCC"/>
            </div></td>
			  <td><div align="center">
             <?php echo form_dropdown('level[]',array('0'=>'')+$leveldrop,'','style="background:#CCCCCC"'); ?>
            </div></td>
			<td></td>
			
			
  </tr>
</table> 



<div align="right">
  <input name="add" type="submit" class="btn btn-primary" value="Add" />
</div>
</body>
</html>