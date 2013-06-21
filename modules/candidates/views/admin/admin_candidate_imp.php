<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<?php echo form_open('candidates/admin/impinwork'); ?>
<?php foreach($allimportids as $row)
 {
   echo form_hidden('c_id[]',$row->id);
   echo '<br/>';
 
 }
 ?><table width="754">
  <tr>
    <td width="196" height="26">Send to My Worksheet </td>
    <td width="766"><?php echo form_dropdown("myworksheet",array('0'=>'')+$myworksheet,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
    <td width="322"><input name="add" type="submit" class="btn btn-primary" id="submit" value="Add" /></td>
  </tr>
</table>
<table width="1237">
  <tr>
    <td colspan="2"><strong>Add to Worksheet </strong></td>
  </tr>
  <tr>
    <td colspan="2"><div id="country" style="width:155px;float:left;">Segment Type<br/>
             <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypepid', style='width:150px; height:150px; background-color:#CCCCCC'");
    ?>
      </div>
        <div id="masterworksheettopull">Part of Master Worksheet<br/>
            <?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
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
							url : "<?php echo site_url('worksheet/admin/select_masterworksheettopull')?>",
							data: {'segmenttypepid':segmenttypepid},
							success: function(msg){
								$('#masterworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script> 
    </td>
  </tr>
  <tr>
    <td width="87%">&nbsp;</td>
    <td width="13%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
</table>
<table width="754">
  <tr>
    <td width="196" height="26">Send to Position </td>
    <td width="766"><?php echo form_dropdown("position",array(''=>'')+$positions2,"","id='id', style='width:250px; background-color:#CCCCCC'");?></td>
    <td width="322"></td>
  </tr>
</table>

<table width="754">
 <tr>
    <td width="87%">&nbsp;</td>
    <td width="13%" colspan="-5"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
</table>
<p>&nbsp;</p>
