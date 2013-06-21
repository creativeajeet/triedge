    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
		<script>
	$(function() {
		$( "#tab" ).tabs({selected: 0}); 
	});
	</script>
	<script>
	$(function() {
		$( "#tabs" ).tabs(); 
	});
	</script>

	<h2>Tag Manager</h2>
	<h2>Manage Tag Type</h2>
<?php echo form_open('segment/admin/createtag'); ?>
<table width="1000">
  <tr>
    <td width="1145" height="66" colspan="5"><div id="country" style="width:350px;float:left;"> Tag Type <br/>
	
    <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypeida', style='width:250px; height:150px; background-color:#CCCCCC'");
    ?>
	
</div>
    <div id="kotaa">Create New Tag TYpe<br/>
   	<input type="text" name="tag_type_name" />
    </div>
	<input type="submit" class="btn btn-primary" name="createtagtype" value="Add" />     </td>
  </tr>
  
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>

<h2>Manage Tags</h2>
	<h2>List Manager</h2>
	
<table width="1000">
  <tr>
    <td height="80" colspan="5"><div id="country" style="width:350px;float:left;"> Tag Type <br/>
	
    <?php
    	echo form_multiselect("tag_type[]",$segmenttype,"","id='tagtypeid', style='width:250px; height:150px; background-color:#CCCCCC'");
    ?>
	
</div>
    <div id="kota">Tags<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Segment'),'',"style='width:250px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
   
    <script type="text/javascript">
	  	$("#tagtypeid").click(function(){
	    		 if( $('#tagtypeid :selected').length > 0){
        //build an array of selected values
        var tagtypeid= $("#tagtypeid").val();

        $('#tagtypeid :selected').each(function(i, selected) {
            tagtypeid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('segment/admin/select_tag')?>",
							data: {'tagtypeid':tagtypeid},
							success: function(msg){
								$('#kota').html(msg);
							}
				  	});
	    		}
	    });
	   </script>    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td><br/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>Create New Tag:
	<br/>
	<input type="text" name="newtag" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="124">&nbsp;</td>
    <td width="45">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td width="171">&nbsp;</td>
    <td width="173"><input type="submit" class="btn btn-primary" name="createnewtag" value="Add" /></td>
    <td width="463">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>
<?php echo form_close(); ?>
