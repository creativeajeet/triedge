<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
  </head>


<body>
<?php $id = $this->uri->segment(4); ?>

<div style="height:600px;">
  <?php print form_open('worksheet/admin/delmyworksheet/'.$id);?>
<table width="100%">
  
   <tr>
    <td colspan="2"><h2>Edit Preferred Worksheet List</h2> </td>
   </tr>
  
</table>

<?php
    	foreach($myworksheet as $opt)
	  {
	   echo "<tr>\n";
	   echo "<td>".form_checkbox('worksheet[]',$opt->pid,FALSE).$opt->worksheet_name;
	   echo "</td></tr>";
	  }
    ?>
<table width="100%">
	<tr>
    <td width="94%">&nbsp;</td>
    <td width="6%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Delete" /></td>
  </tr>
  </table>
 <?php echo form_close(); ?>
  <table width="100%">
	 <tr>
    <td colspan="2"><h2>Create "Preferred Worksheet List"</h2> </td>
   </tr>
  </table>
  <?php print form_open('worksheet/admin/prefWorksheet/'.$id);?>
<table width="710">
  
  
   <tr>
    <td colspan="2"><div id="country" style="width:125px;float:left;">Segment Type<br/>
             <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypepid', style='width:120px; height:150px; background-color:#CCCCCC'");
    ?>
      </div>
        <div id="masterworksheettopull">Part of Master Worksheet<br/>
            <?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:180px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div>
      <script type="text/javascript">
	  	$("#segmenttypepid").click(function(){
	    		 if( $('#segmenttypepid :selected').length > 0){
        //build an array of selected values
        var segmenttypepid= $("#segmenttypepid").val();

        $('#segmenttypepid :selected').each(function(i, selected) {
            segmenttypepid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_masterworksheettopull1')?>",
							data: {'segmenttypepid':segmenttypepid},
							success: function(msg){
								$('#masterworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script>  </td>
  </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="-5">&nbsp;</td>
   </tr>
   <tr>
    <td width="94%">&nbsp;</td>
    <td width="6%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
</table>
</div>

</body>
</html>
