
<div id="subbasicworksheettopull" style="float:left;"><b>Sub-Basic Worksheet</b><br/>
 	<?php
    	foreach($subbasicworksheettopull as $opt)
	  {
	   echo "<tr>\n";
	   echo "<td>".form_checkbox('worksheet[]',$opt->id,FALSE).$opt->worksheet_name;
	   echo "</td></tr>";
	  }
    ?>	</div>
	