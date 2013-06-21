<link rel="stylesheet" type="text/css" href="http://192.168.1.12/uploadapp/assets/dropdown/doc/smoothness-1.8.13/jquery-ui-1.8.13.custom.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.12/uploadapp/assets/dropdown/src/ui.dropdownchecklist.themeroller.css">
    <!--  <link rel="stylesheet" type="text/css" href="../src/ui.dropdownchecklist.standalone.css">  -->
    <style>
table td { vertical-align: top }
dd { padding-bottom: 15px }
    </style>
    
    <!-- Include the basic JQuery support (core and ui) -->
    <script type="text/javascript" src="http://192.168.1.12/uploadapp/assets/dropdown/src/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="http://192.168.1.12/uploadapp/assets/dropdown/src/jquery-ui-1.8.13.custom.min.js"></script>
    
    <!-- Include the DropDownCheckList supoprt -->
    <!-- <script type="text/javascript" src="ui.dropdownchecklist.js"></script> -->
    <script type="text/javascript" src="http://192.168.1.12/uploadapp/assets/dropdown/doc/ui.dropdownchecklist-1.4-min.js"></script>
    
    <!-- Apply dropdown check list to the selected items  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#s1").dropdownchecklist();
            $("#s2").dropdownchecklist( {icon: {}, width: 150 } );
            $("#s3").dropdownchecklist( { width: 150 } );
            $("#s4").dropdownchecklist( { maxDropHeight: 150 } );
            $("#s5").dropdownchecklist( { firstItemChecksAll: true, explicitClose: '...close' } );
             $("#subbasicworksheetid").dropdownchecklist({ width: 150 });
            $("#s7").dropdownchecklist();
            $("#s8").dropdownchecklist( { emptyText: "Please Select...", width: 150 } );
            $("#s6").dropdownchecklist( { textFormatFunction: function(options) {
                var selectedOptions = options.filter(":selected");
                var countOfSelected = selectedOptions.size();
                switch(countOfSelected) {
                    case 0: return "<i>Nobody<i>";
                    case 1: return selectedOptions.text();
                    case options.size(): return "<b>Everybody</b>";
                    default: return countOfSelected + " People";
                }
            } });
            $("#s10").dropdownchecklist( { forceMultiple: true
, onComplete: function(selector) {
	var values = "";
  	for( i=0; i < selector.options.length; i++ ) {
    	if (selector.options[i].selected && (selector.options[i].value != "")) {
      		if ( values != "" ) values += ";";
      		values += selector.options[i].value;
    	}
  	}
  	alert( values );
} 
, onItemClick: function(checkbox, selector){
	var justChecked = checkbox.prop("checked");
	var checkCount = (justChecked) ? 1 : -1;
	for( i = 0; i < selector.options.length; i++ ){
		if ( selector.options[i].selected ) checkCount += 1;
	}
    if ( checkCount > 3 ) {
		alert( "Limit is 3" );
		throw "too many";
	}
}
            });
        });
    </script>
	<div id="basicworksheettopull" style="width:190px;float:left;">Part of Basic Worksheet<br/>

   	<?php
    	echo form_multiselect("basicworksheet_id[]",$option_basicworksheettopull,"","id='subbasicworksheetpid', style='width:180px; height:150px; background-color:#CCCCCC'");
    ?>
	</div>


	   <div id="basicworksheettopull" style="float:left; "><b>Basic Worksheet</b><br/>

   	<?php
    	foreach($basicworksheettopull as $opt)
	  {
	   echo "<tr>\n";
	   echo "<td>".form_checkbox('worksheet[]',$opt->id,FALSE).$opt->worksheet_name;
	   echo "</td></tr>";
	  }
    ?>
	</div>
	<div id="subbasicworksheettopull">
     
    </div>
	 	
 <script type="text/javascript">
	  	$("#subbasicworksheetpid").click(function(){
	    		 if( $('#subbasicworksheetpid :selected').length > 0){
        //build an array of selected values
        var subbasicworksheetpid= $("#subbasicworksheetpid").val();

        $('#subbasicworksheetpid :selected').each(function(i, selected) {
            subbasicworksheetpid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_subbasicworksheettopull1')?>",
							data: {'subbasicworksheetpid':subbasicworksheetpid},
							success: function(msg){
								$('#subbasicworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
	