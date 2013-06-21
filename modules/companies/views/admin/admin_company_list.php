<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>media/css/demo_table.css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url()?>media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url()?>media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
(function($) {
			
			$.fn.dataTableExt.oApi.fnGetColumnData = function ( oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty ) {
				// check that we have a column id
				if ( typeof iColumn == "undefined" ) return new Array();
				
				// by default we only wany unique data
				if ( typeof bUnique == "undefined" ) bUnique = true;
				
				// by default we do want to only look at filtered data
				if ( typeof bFiltered == "undefined" ) bFiltered = true;
				
				// by default we do not wany to include empty values
				if ( typeof bIgnoreEmpty == "undefined" ) bIgnoreEmpty = true;
				
				// list of rows which we're going to loop through
				var aiRows;
				
				// use only filtered rows
				if (bFiltered == true) aiRows = oSettings.aiDisplay; 
				// use all rows
				else aiRows = oSettings.aiDisplayMaster; // all row numbers
			
				// set up data array	
				var asResultData = new Array();
				
				for (var i=0,c=aiRows.length; i<c; i++) {
					iRow = aiRows[i];
					var aData = this.fnGetData(iRow);
					var sValue = aData[iColumn];
					
					// ignore empty values?
					if (bIgnoreEmpty == true && sValue.length == 0) continue;
			
					// ignore unique values?
					else if (bUnique == true && jQuery.inArray(sValue, asResultData) > -1) continue;
					
					// else push the value onto the result data array
					else asResultData.push(sValue);
				}
				
				return asResultData;
			}}(jQuery));
			
			
			function fnCreateSelect( aData )
			{
				var r='<select><option value=""></option>', i, iLen=aData.length;
				for ( i=0 ; i<iLen ; i++ )
				{
					r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
				}
				return r+'</select>';
			}
						
			$(document).ready(function() {
				/* Initialise the DataTable */
				var oTable = $('#example').dataTable( {
					"oLanguage": {
						"sSearch": "Search all columns:"
					}
				} );
				
				/* Add a select menu for each TH element in the table footer */
				$("tfoot th").each( function ( i ) {
					this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i) );
					$('select', this).change( function () {
						oTable.fnFilter( $(this).val(), i );
					} );
				} );
			} );
		</script>
		<script type="text/javascript" charset="utf-8">
			
			
			function fnShowHide( iCol )
			{
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#example').dataTable();
				
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			}
		</script>

   <script type="text/javascript">
      $(function() {
         $('a#faq').click(function() {
            $('div#hidden').toggle();
            return false;
         });
      });   
   </script>
    <script type="text/javascript">
      $(function() {
         $('a#choice').click(function() {
            $('div#choices').slideToggle("slow");

            return false;
         });
      });   
   </script>
</head>

<body>
<h2><?php print $header?></h2>
<?php


$id = $this->uri->segment(4);
echo "<div id='green-button' class='float-left'><h3><a href=\"../admin/newcompany/".$id."\"class='green-button pcb'><span>Enter New Company</span></a></h3></div>";
?>
<div><a href="#" id="choice" class='green-button pcb'><span>Table Column Choices</span></a></div>
			<div id="choices" style="display:none"><table width="643" border="1" bordercolor="#333333">
  <tr>
    <td height="32" colspan="6"><div align="left" style="color:#FF0000">( Note :: Please check the column name that column you want to hide in the datagrid.) </div></td>
  </tr>
  <tr>
    <td width="162"><input type="checkbox" onclick="fnShowHide(0);"/>Company/Client Name </td>
    <td width="121"> <input type="checkbox" onclick="fnShowHide(1);" />Agreement with</td>
    <td width="100"> <input type="checkbox" onclick="fnShowHide(2);"/>Expiry Date</td>
    <td width="67"><input type="checkbox" onclick="fnShowHide(3);" />Signed</td>
    <td width="96"><input type="checkbox" onclick="fnShowHide(4);" />Status</td>
	<td width="57">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
</table></div><?php 
 if (count($companies)){ 
	echo "<table id='example' class='display' border='1' cellspacing='0' cellpadding='3' width='200px'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>Client Name</th>\n";
		echo "<th>Agreement With</th>\n";
		echo "<th>Expiry Date</th>\n";
		echo "<th>Signed</th>\n";
		echo "<th>Status</th>\n";
		echo "<th></th>\n";
	
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($companies as $key => $list){
		// print_r ($total);
		echo "<tr valign='top'>\n";
		echo "<td><strong>".$list['comp']."</strong></td>\n";
			echo "<td>".$list['agmwith']."</td>\n";
			echo "<td>".$list['end']."</td>\n";
			echo "<td>".$list['agmrcvd']."</td>\n";
			echo "<td>".$list['agmstatus']."</td>\n";
			echo "<td>".anchor('companies/admin/editcompany/'.$list['id'],'view')."/".anchor('companies/admin/editcompany/'.$list['id'],'edit')."</td>\n";
			echo "</tr>\n";
	}
	echo "</tbody>\n</table>";

}

else{
 echo 'There is no List entered. Please create List'; 
 } 
?>
<script language="javascript" type="text/javascript">
//<![CDATA[
	var table2_Props = 	{
							col_0: "select",
							col_1: "select",
							col_2: "select",
							col_3: "select",
							col_4: "select",
							col_5: "none",
							
							display_all_text: " [ Show all ] ",
							sort_select: true 
						};
	setFilterGrid( "example",table2_Props );
//]]>
</script>
</body>
</html>

