<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>



    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
</head>


<body>
<h2>List Manager</h2>
<p><?php echo form_open('segment/admin/addSegment'); ?></p>
<table width="1000">
  <tr>
    <td height="66" colspan="5"><div id="country" style="width:260px;float:left;"> Type <br/>
	
    <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypeid', style='width:250px; height:150px; background-color:#CCCCCC'");
    ?>
	
</div>
    <div id="kota">Parent Name<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Segment'),'',"style='width:250px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
   
    <script type="text/javascript">
	  	$("#segmenttypeid").click(function(){
	    		 if( $('#segmenttypeid :selected').length > 0){
        //build an array of selected values
        var segmenttypeid= $("#segmenttypeid").val();

        $('#segmenttypeid :selected').each(function(i, selected) {
            segmenttypeid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('segment/admin/select_segment')?>",
							data: {'segmenttypeid':segmenttypeid},
							success: function(msg){
								$('#kota').html(msg);
							}
				  	});
	    		}
	    });
	   </script>	    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="text" name="segment_type_name" /></td>
    <td>&nbsp;</td>
    <td><input type="text" name="segment" /></td>
    <td><input type="text" name="childname" /></td>
  </tr>
  <tr>
    <td width="124">Is this a segment? </td>
    <td width="45"><input type="checkbox" name="is_segment" value="1" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" class="btn btn-primary" name="submit2" value="Add" /></td>
    <td width="87">&nbsp;</td>
    <td width="257"><input type="submit" class="btn btn-primary" name="submit" value="Add" /></td>
    <td width="463"><input type="submit" class="btn btn-primary" name="addchild" value="Add" /></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>
<label></label>
<label></label>
<p>&nbsp; </p>

<?php echo form_close(); ?>

</body>
</html>
