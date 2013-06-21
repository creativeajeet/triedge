<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
	<script type="text/javascript">
			$(document).ready(function(){
				
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


<style type="text/css">
<!--
.style1 {color: #FFFFFF}

-->
</style>

	

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
<script type="text/javascript">
$(document).ready(function(){
$('#tabs div').hide(); // Hide all divs
$('#tabs div:first').show(); // Show the first div
$('#tabs ul li:first').addClass('active'); // Set the class of the first link to active
$('#tabs ul li a').click(function(){ //When any link is clicked
$('#tabs ul li').removeClass('active'); // Remove active class from all links
$(this).parent().addClass('active'); //Set clicked link class to active
var currentTab = $(this).attr('href'); // Set variable currentTab to value of href attribute of clicked link
$('#tabs div').hide(); // Hide all divs
$(currentTab).show(); // Show div with id equal to variable currentTab
return false;
});
});
</script>
 <script type="text/javascript">
 $(document).ready(function(){
 $("#sheetname").keyup(function(){
    $("#sheetname2").val(this.value);
});
});
</script>
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
	    <meta charset="UTF-8">
	    
	    <style>
	    	/* Autocomplete
			----------------------------------*/
			.ui-autocomplete { position: absolute; cursor: default; }	
			.ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/

			/* workarounds */
			* html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */

			/* Menu
			----------------------------------*/
			.ui-menu {
				list-style:none;
				padding: 2px;
				margin: 0;
				display:block;
			}
			.ui-menu .ui-menu {
				margin-top: -3px;
			}
			.ui-menu .ui-menu-item {
				margin:0;
				padding: 0;
				zoom: 1;
				float: left;
				clear: left;
				width: 100%;
				font-size:80%;
			}
			.ui-menu .ui-menu-item a {
				text-decoration:none;
				display:block;
				padding:.2em .4em;
				line-height:1.5;
				zoom:1;
			}
			.ui-menu .ui-menu-item a.ui-state-hover,
			.ui-menu .ui-menu-item a.ui-state-active {
				font-weight: normal;
				margin: -1px;
			}
	    </style>
	    
	    <script type="text/javascript">
	    $(this).ready( function() {
    		$("#companyid").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/candidates/admin/lookup",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            		$("#result").append(
            			"<li>"+ ui.item.value + "</li>"
            		);           		
         		},		
    		});
	    });
	    </script>
		
		<script type="text/javascript">
	    $(this).ready( function() {
    		$("#grade").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/candidates/admin/lookupgrade",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            		$("#result").append(
            			"<li>"+ ui.item.value + "</li>"
            		);           		
         		},		
    		});
	    });
	    </script>
</head>
<body>
 <h2>Candidate Input Sheet</h2>
 <?php $sheetname = $this->uri->segment(4); ?>
<?php print form_open_multipart('candidates/admin/newinput/');?>

<table width="1076" id="table4">
      <tr bgcolor="#000033">
        <th width="30" bgcolor="#000000"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows" /></div></th>
        <th width="88" height="3" bgcolor="#000000"><div align="center" class="style1">Name</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Current Comp. </div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Jobtitle</div></th>
        <th width="208" bgcolor="#000000"><div align="center" class="style1">
          <div align="center">Email Id. </div>
        </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Mobile No. </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Current Loc. </div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Course</div></th>
        <th width="88" bgcolor="#000000"><div align="center" class="style1">Passing Year </div></th>
        <th width="1003" bgcolor="#000000"><div align="center" class="style1">Institute</div></th>
		<th width="1003" bgcolor="#000000"><div align="center" class="style1">Worksheet</div></th>
      </tr>
      
      <tr height="20">
        <td style="padding-top:5px;">&nbsp;</td>
        <td style="padding-top:5px;"><div align="center">
          <input name="candidate_name[]" type="text" size="15" />
        </div></td>
        <td width="101"><div align="center">
          <input name="current_company[]" type="text" size="15" id="companyid2" />
        </div></td>
        <td width="88"><div align="center">
            <input name="job_title[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="email[]" type="text" size="35" />
        </div></td>
        <td><div align="center">
          <input name="telephone[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="designation[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="current_location[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="course[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="year_of_passing[]" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="institute[]" type="text" size="15" />
        </div></td>
		<td><div align="center">
          <?php echo form_dropdown("myworksheet[]",array(''=>'')+$worksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?>
        </div></td>
      </tr>
    </table>
	<h2></h2>
	<table width="774" id="table3">
      

      <tr height="20">
        <td width="139" style="padding-top:5px;"><input type="submit" class="btn btn-primary" name="save" value="Save" /></td>
        <td width="66"><div align="right"></div></td>
        <td width="106"><div align="center"></div></td>
        <td width="107">&nbsp;</td>
        <td width="133">&nbsp;</td>
        <td width="138">&nbsp;</td>
        <td width="53"></td>
      </tr>
    </table>   
	   
</body>
</html>