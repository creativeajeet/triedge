<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
        <style type="text/css">
<!--
.style1 {font-size: 14px}
.style2 {font-size: 18px}
-->
        </style>
</head>

<body>
<?php $id = $this->uri->segment(4); ?>
<?php echo form_open('worksheet/admin/edit/'.$id); ?>
<table width="1288">
  <tr>
    <td colspan="3"><h2 class="style2">Edit Basic  Worksheet </h2></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo anchor('worksheet/admin/', 'Go to Worksheet Manager');?></div></td>
     <td width="260"><?php echo anchor('worksheet/admin/goedit', 'edit worksheet');?> | <?php echo anchor('worksheet/admin/godeletework', 'delete worksheet');?></td>
  </tr>
  <tr>
    <td width="108">Worksheet Name </td>
    <td width="154"><input type="text" name="worksheet_name" value="<?php echo $worksheetdetails['worksheet_name']; ?>"/></td>
    <td width="92">Worksheet Type </td>
    <td width="144"><select name="worksheet_type" style="width:140px; background-color:#CCCCCC">
      <option value="2">Master</option>
	  <option value="3">Sub-Master</option>
      <option value="4">Basic</option>
	  <option value="5" selected="selected">Sub-Basic</option>
    </select></td>
    <td width="189">Master Worksheet Segment Type </td>
    <td width="159"><?php
    	echo form_dropdown("segment_type_id",$segmenttype,"",'disabled');
    ?></td>
    <td colspan="2"><div id="kota">Name of Segment
   		<?php
    	echo form_dropdown("id",array('Select'=>'Segment'),'','disabled');
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
							url : "<?php echo site_url('worksheet/admin/select_segment')?>",
							data: {'segmenttypeid':segmenttypeid},
							success: function(msg){
								$('#kota').html(msg);
							}
				  	});
	    		}
	    });
	   </script>	 	</td>
  </tr>
  
  <tr>
    <td colspan="8">
    <h2 class="style1">Link Master Worksheet</h2></td>
  </tr>
  <tr>
    <td colspan="8"><div id="country" style="width:180px;float:left;">Segment Type<br/>
          <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypemid', style='width:150px; height:150px; background-color:#CCCCCC'");
    ?>
        </div>      
	  <div id="masterworksheet">Part of Master Worksheet<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
     <script type="text/javascript">
	  	$("#segmenttypemid").click(function(){
	    		 if( $('#segmenttypemid :selected').length > 0){
        //build an array of selected values
        var segmenttypemid= $("#segmenttypemid").val();

        $('#segmenttypemid :selected').each(function(i, selected) {
            segmenttypemid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_masterworksheet')?>",
							data: {'segmenttypemid':segmenttypemid},
							success: function(msg){
								$('#masterworksheet').html(msg);
							}
				  	});
	    		}
	    });
	   </script>	   </td>
  </tr>
  <tr>
    <td colspan="7">Part of Basic Worksheet::</td>
    <td width="137">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8"><strong>
      <?php   foreach ($subbasicworkdetails as $row){ echo $row->worksheet_name.anchor('worksheet/admin/deletepartbasic/'.$row->id."/".$id,'delete')."&nbsp"."&nbsp"; } ?>
    </strong></td>
  </tr>
  <tr>
    <td colspan="8"><h2 class="style1">Link worksheet to send to </h2></td>
  </tr>
  <tr>
    <td colspan="8"><div id="country" style="width:180px;float:left;">Segment Type<br/>
           <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypesid', style='width:150px; height:150px; background-color:#CCCCCC'");
    ?>
        </div>      
	 <div id="masterworksheetsend">Part of Master Worksheet<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
    <script type="text/javascript">
	  	$("#segmenttypesid").click(function(){
	    		 if( $('#segmenttypesid :selected').length > 0){
        //build an array of selected values
        var segmenttypesid= $("#segmenttypesid").val();

        $('#segmenttypesid :selected').each(function(i, selected) {
            segmenttypesid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_masterworksheettosend')?>",
							data: {'segmenttypesid':segmenttypesid},
							success: function(msg){
								$('#masterworksheetsend').html(msg);
							}
				  	});
	    		}
	    });
	   </script>	   </td>
  </tr>
  <tr>
    <td colspan="7">Sent to Basic Worksheet ::</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8"><strong>
      <?php   foreach ($sentbasicworkdetails as $row){ echo $row->worksheet_name.anchor('worksheet/admin/deletesent/'.$row->id."/".$id,'delete')."&nbsp"."&nbsp"; } ?>
    </strong></td>
  </tr>
  <tr>
    <td colspan="8"><h2 class="style1">Link worksheet to pull from </h2></td>
  </tr>
  <tr>
    <td colspan="8"><div id="country" style="width:180px;float:left;">Segment Type<br/>
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
	   </script> </td>
  </tr>
  <tr>
    <td colspan="7">Pulled from  Basic Worksheet ::</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8"><strong>
      <?php   foreach ($pullbasicworkdetails as $row){ echo $row->worksheet_name.anchor('worksheet/admin/deletepull/'.$row->id."/".$id,'delete')."&nbsp"."&nbsp"; } ?>
    </strong></td>
  </tr>
  <tr>
    <td colspan="8"><h2></h2></td>
    </tr>
  <tr>
    <td colspan="4">Worksheet Objective<br/>
      <textarea name="worksheet_obj" cols="55"></textarea>    </td>
    <td colspan="4">Worksheet Scribbles<br/>
      <textarea name="worksheet_scribbles" cols="55"></textarea></td>
  </tr>
  <tr>
    <td colspan="8"><h2 class="style1">&nbsp;</h2></td>
  </tr>
   <tr>
    <td colspan="8"><div align="right">
      
      <input type="submit" class="btn btn-primary" name="submit" value="Save" />
      
    </div></td>
  </tr>
</table>
</body>
</html>
