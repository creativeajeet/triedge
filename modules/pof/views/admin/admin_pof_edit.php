
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>	
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
<script language="javascript">
function SingleSelect(regex,current)
{
re = new RegExp(regex);

for(i = 0; i < document.forms[0].elements.length; i++) {

elm = document.forms[0].elements[i];

if (elm.type == 'checkbox') {

if (re.test(elm.name)) {

elm.checked = false;

}
}
}

current.checked = true;

}
</script><script type="text/javascript">
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
 

<style type="text/css">
<!--
.style1 {color: #FFFFFF}

-->
</style>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Position Order Form</h3>
							</div>
							<div class="box-content nopadding">
							<div class="inputform">
<?php print form_open_multipart('pof/admin/editPof/'.$pid.'/editPof');?>
<table width="1237">
  <tr>
  <td colspan="14" scope="col"><h2 align="left">Position Order Form</h2><?php if($user['group']==2) { echo '<div align="right">'.anchor_popup('pof/admin/allocation_history/'.$pid,'Allocation History',array('class'=>'icon_alloc')).'</div></td>'; } else { echo ""; } ?>  </tr>
  
  
  <tr>
    <td width="48" height="40">Client</td>
    <td colspan="3"><?php echo form_dropdown('client_id', array('0' => '')+$clients, set_value('id', $detail['client_id'])); ?></td>
    <td width="62">Job TItle </td>
    <td width="208"><input name="jobtitle" type="text" size="25" value="<?php echo $detail['jobtitle']; ?>"/></td>
    <td width="74">Department</td>
    <td width="281"><input name="department" type="text" size="15" value="<?php echo $detail['department']; ?>"/></td>
    <td width="281"><?php $atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$detail['file_to_view'])
 {
  echo "";
   }
 else
  {
  echo    anchor_popup('pof/admin/viewJD/'.$pid, img($cv_image), $atts).anchor_popup('pof/admin/viewJD/'.$pid, 'view', $atts);
  } ?></td>
  </tr>
  <tr>
    <td height="34">TL</td>
    <td width="29"><div align="left">
      <input type="checkbox" name="tl" value="1" <?php if($detail['tl']==1){ echo 'checked="checked"'; }?>/>
    </div></td>
    <td width="87">Generic Role </td>
    <td width="133"><input name="generic_role" type="text" size="15" value="<?php echo $detail['generic_role']; ?>"/></td>
    <td>Job Type</td>
    <td colspan="4"><select name="job_type">
      <option value="full" <?php if($detail['job_type']=='full'){ echo 'selected="selected"'; }?>>Full Time</option>
      <option value="part" <?php if($detail['job_type']=='part'){ echo 'selected="selected"'; }?>>Part Time</option>
	  <option value="flexi" <?php if($detail['job_type']=='flexi'){ echo 'selected="selected"'; }?>>Flexi</option>
      <option value="consultant" <?php if($detail['job_type']=='consultant'){ echo 'selected="selected"'; }?>>Consultant</option>
    </select></td>
    <td width="1">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="14">Worksheet Grid 
	<h2></h2><table width="1237">
  
  

 <tr>
    <td colspan="8"><div id="country" style="width:160px;float:left;">Segment Type<br/>
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
	   <td colspan="8"><strong>
      <?php   foreach ($worksheet as $row){ echo $row->worksheet_name.anchor('pof/admin/deleteworksheet/'.$row->pof_id."/".$row->w_id,'delete')."&nbsp"."&nbsp"; } ?>
    </strong></td>
  </tr>
   
  
</table>
<h2></h2></td>
  </tr>
  
  <tr>
    <td colspan="14">
	<table width="1000" id="table2">
      <tr bgcolor="#000033">
        <th width="150" height="3" rowspan="2" bgcolor="#000000"><div align="center" class="style1"> Location </div></th>
        <th width="71" rowspan="2" bgcolor="#000000"><div align="center" class="style1">No. of Pos </div></th>
        <th width="71" rowspan="2" bgcolor="#000000"><div align="center" class="style1"> Grade </div></th>
        <th width="132" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        <th width="60" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Level</div></th>
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Exp. Range </div></th>
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Salary Range </div></th>
        <th width="134" bgcolor="#000000"><div align="center" class="style1">Reports To </div></th>
        <th width="80" bgcolor="#000000"><div align="center" class="style1">Reports To </div></th>
        <td width="49" rowspan="2" bgcolor="#FFFFFF"><div align="center"><!--<img src="/*?php echo base_url()?>assets/icons/add.png" class="cloneTableRows" />--></div></td>
      </tr>
      <tr bgcolor="#000033">
        <th width="43" bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th width="45" bgcolor="#000000"><div align="center" class="style1">to</div></th>
        <th width="47" bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th width="42" bgcolor="#000000"><div align="center" class="style1">to</div></th>
        <th width="134" bgcolor="#000000"><div align="center" class="style1">(Name)</div></th>
        <th width="80" bgcolor="#000000"><div align="center" class="style1">(Level)</div></th>
      </tr>
      <tr height="20">
        <td style="padding-top:5px;"><div align="center"><?php echo form_dropdown('location', array('0' => '')+$locations, set_value('id', $detail['location']),"style='width:150px;'"); ?></div></td>
        <td><div align="center">
          <input name="no_of_pos" type="text" size="5" value="<?php echo $detail['no_of_pos']; ?>" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <?php
    	echo form_dropdown("grade",array(''=>'')+$grade,set_value('grade', $detail['grade']),"id='grade', style='width:100px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div></td>
        <td><div align="center">
          <input name="designation" type="text" size="15" value="<?php echo $detail['designation']; ?>" style="width:100px;"/>
        </div></td>
        <td> <div align="center">
           <?php
    	echo form_dropdown("level",array(''=>'')+$level,set_value('level', $detail['level']),"id='level', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
</div></td>
        <td><div align="center">
           <select name="exp_f" style="width:50px;">
		   <option value=""></option>
           <option value="0">0</option>
           <option value="1" <?php if($detail['exp_f']==1){ echo 'selected="selected"'; }?>>1</option>
           <option value="2" <?php if($detail['exp_f']==2){ echo 'selected="selected"'; }?>>2</option>
           <option value="3" <?php if($detail['exp_f']==3){ echo 'selected="selected"'; }?>>3</option>
           <option value="4" <?php if($detail['exp_f']==4){ echo 'selected="selected"'; }?>>4</option>
           <option value="5" <?php if($detail['exp_f']==5){ echo 'selected="selected"'; }?>>5</option>
           <option value="6" <?php if($detail['exp_f']==6){ echo 'selected="selected"'; }?>>6</option>
           <option value="7" <?php if($detail['exp_f']==7){ echo 'selected="selected"'; }?>>7</option>
           <option value="8" <?php if($detail['exp_f']==8){ echo 'selected="selected"'; }?>>8</option>
           <option value="9" <?php if($detail['exp_f']==9){ echo 'selected="selected"'; }?>>9</option>
           <option value="10" <?php if($detail['exp_f']==10){ echo 'selected="selected"'; }?>>10</option>
           <option value="11" <?php if($detail['exp_f']==11){ echo 'selected="selected"'; }?>>11</option>
           <option value="12" <?php if($detail['exp_f']==12){ echo 'selected="selected"'; }?>>12</option>
           <option value="13" <?php if($detail['exp_f']==13){ echo 'selected="selected"'; }?>>13</option>
           <option value="14" <?php if($detail['exp_f']==14){ echo 'selected="selected"'; }?>>14</option>
           <option value="15" <?php if($detail['exp_f']==15){ echo 'selected="selected"'; }?>>15</option>
           <option value="16" <?php if($detail['exp_f']==16){ echo 'selected="selected"'; }?>>16</option>
           <option value="17" <?php if($detail['exp_f']==17){ echo 'selected="selected"'; }?>>17</option>
           <option value="18" <?php if($detail['exp_f']==18){ echo 'selected="selected"'; }?>>18</option>
           <option value="19" <?php if($detail['exp_f']==19){ echo 'selected="selected"'; }?>>19</option>
           <option value="20" <?php if($detail['exp_f']==20){ echo 'selected="selected"'; }?>>20</option>
           <option value="21" <?php if($detail['exp_f']==21){ echo 'selected="selected"'; }?>>21</option>
           <option value="22" <?php if($detail['exp_f']==22){ echo 'selected="selected"'; }?>>22</option>
           <option value="23" <?php if($detail['exp_f']==23){ echo 'selected="selected"'; }?>>23</option>
           <option value="24" <?php if($detail['exp_f']==24){ echo 'selected="selected"'; }?>>24</option>
           <option value="25" <?php if($detail['exp_f']==25){ echo 'selected="selected"'; }?>>25</option>
           </select>
        </div></td>
        <td><div align="center">
          <select name="exp_t" style="width:50px;">
		  <option value=""></option>
           <option value="0">0</option>
           <option value="1" <?php if($detail['exp_t']==1){ echo 'selected="selected"'; }?>>1</option>
           <option value="2" <?php if($detail['exp_t']==2){ echo 'selected="selected"'; }?>>2</option>
           <option value="3" <?php if($detail['exp_t']==3){ echo 'selected="selected"'; }?>>3</option>
           <option value="4" <?php if($detail['exp_t']==4){ echo 'selected="selected"'; }?>>4</option>
           <option value="5" <?php if($detail['exp_t']==5){ echo 'selected="selected"'; }?>>5</option>
           <option value="6" <?php if($detail['exp_t']==6){ echo 'selected="selected"'; }?>>6</option>
           <option value="7" <?php if($detail['exp_t']==7){ echo 'selected="selected"'; }?>>7</option>
           <option value="8" <?php if($detail['exp_t']==8){ echo 'selected="selected"'; }?>>8</option>
           <option value="9" <?php if($detail['exp_t']==9){ echo 'selected="selected"'; }?>>9</option>
           <option value="10" <?php if($detail['exp_t']==10){ echo 'selected="selected"'; }?>>10</option>
           <option value="11" <?php if($detail['exp_t']==11){ echo 'selected="selected"'; }?>>11</option>
           <option value="12" <?php if($detail['exp_t']==12){ echo 'selected="selected"'; }?>>12</option>
           <option value="13" <?php if($detail['exp_t']==13){ echo 'selected="selected"'; }?>>13</option>
           <option value="14" <?php if($detail['exp_t']==14){ echo 'selected="selected"'; }?>>14</option>
           <option value="15" <?php if($detail['exp_t']==15){ echo 'selected="selected"'; }?>>15</option>
           <option value="16" <?php if($detail['exp_t']==16){ echo 'selected="selected"'; }?>>16</option>
           <option value="17" <?php if($detail['exp_t']==17){ echo 'selected="selected"'; }?>>17</option>
           <option value="18" <?php if($detail['exp_t']==18){ echo 'selected="selected"'; }?>>18</option>
           <option value="19" <?php if($detail['exp_t']==19){ echo 'selected="selected"'; }?>>19</option>
           <option value="20" <?php if($detail['exp_t']==20){ echo 'selected="selected"'; }?>>20</option>
           <option value="21" <?php if($detail['exp_t']==21){ echo 'selected="selected"'; }?>>21</option>
           <option value="22" <?php if($detail['exp_t']==22){ echo 'selected="selected"'; }?>>22</option>
           <option value="23" <?php if($detail['exp_t']==23){ echo 'selected="selected"'; }?>>23</option>
           <option value="24" <?php if($detail['exp_t']==24){ echo 'selected="selected"'; }?>>24</option>
           <option value="25" <?php if($detail['exp_t']==25){ echo 'selected="selected"'; }?>>25</option>
           </select>
        </div></td>
        <td><div align="center">
          <input name="sal_f" type="text" size="2" value="<?php echo $detail['sal_f']; ?>" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <input name="sal_t" type="text" size="2" value="<?php echo $detail['sal_t']; ?>" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <input name="reports_to_name" type="text" size="15" value="<?php echo $detail['reports_to_name']; ?>"/>
        </div></td>
        <td><div align="center">
          <input name="reports_to_level" type="text" size="5" value="<?php echo $detail['reports_to_level']; ?>"/>
        </div></td>
        <td></td>
      </tr>
    </table>
	<h2></h2></td>
  </tr>
  <tr>
    <td colspan="14"><table width="774" id="table3">
      <tr bgcolor="#000033">
        <th width="143" height="3" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Edu Level </div></th>
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Batch</div></th>
        <th rowspan="2" bgcolor="#000000"><div align="center" class="style1">Degree/Course</div></th>
        <th width="137" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Subject</div></th>
        <th width="142" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Institute Pref.  </div></th>
        <td width="53" rowspan="2" bgcolor="#FFFFFF"><div align="center"><!--<img src="?php echo base_url()?>assets/icons/add.png" class="cloneTableRows" />--></div></td>
      </tr>
      <tr bgcolor="#000033">
        <th bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">to</div></th>
      </tr>
      
      <tr height="20">
        <td style="padding-top:5px;"><div align="center">
          <select name="edu_level" style="width:100px;">
      <option value=""></option>
     <option value="pg" <?php if($detail['edu_level']=="pg"){ echo 'selected="selected"'; }?>>PG</option>
	 <option value="ug" <?php if($detail['edu_level']=="ug"){ echo 'selected="selected"'; }?>>UG</option>
	    </select>
        </div></td>
        <td width="69"><div align="center">
          <select name="batch_f">
            <option value=""></option>
            <option value="2012" <?php if($detail['batch_f']==2012){ echo 'selected="selected"'; }?>>2012</option>
            <option value="2011" <?php if($detail['batch_f']==2011){ echo 'selected="selected"'; }?>>2011</option>
            <option value="2010" <?php if($detail['batch_f']==2010){ echo 'selected="selected"'; }?>>2010</option>
            <option value="2009" <?php if($detail['batch_f']==2009){ echo 'selected="selected"'; }?>>2009</option>
            <option value="2008" <?php if($detail['batch_f']==2008){ echo 'selected="selected"'; }?>>2008</option>
            <option value="2007" <?php if($detail['batch_f']==2007){ echo 'selected="selected"'; }?>>2007</option>
            <option value="2006" <?php if($detail['batch_f']==2006){ echo 'selected="selected"'; }?>>2006</option>
            <option value="2005" <?php if($detail['batch_f']==2005){ echo 'selected="selected"'; }?>>2005</option>
            <option value="2004" <?php if($detail['batch_f']==2004){ echo 'selected="selected"'; }?>>2004</option>
            <option value="2003" <?php if($detail['batch_f']==2003){ echo 'selected="selected"'; }?>>2003</option>
            <option value="2002" <?php if($detail['batch_f']==2002){ echo 'selected="selected"'; }?>>2002</option>
            <option value="2001" <?php if($detail['batch_f']==2001){ echo 'selected="selected"'; }?>>2001</option>
            <option value="2000" <?php if($detail['batch_f']==2000){ echo 'selected="selected"'; }?>>2000</option>
            <option value="1999" <?php if($detail['batch_f']==1999){ echo 'selected="selected"'; }?>>1999</option>
            <option value="1998" <?php if($detail['batch_f']==1998){ echo 'selected="selected"'; }?>>1998</option>
            <option value="1997" <?php if($detail['batch_f']==1997){ echo 'selected="selected"'; }?>>1997</option>
            <option value="1996" <?php if($detail['batch_f']==1996){ echo 'selected="selected"'; }?>>1996</option>
            <option value="1995" <?php if($detail['batch_f']==1995){ echo 'selected="selected"'; }?>>1995</option>
            <option value="1994" <?php if($detail['batch_f']==1994){ echo 'selected="selected"'; }?>>1994</option>
            <option value="1993" <?php if($detail['batch_f']==1993){ echo 'selected="selected"'; }?>>1993</option>
            <option value="1992" <?php if($detail['batch_f']==1992){ echo 'selected="selected"'; }?>>1992</option>
            <option value="1991" <?php if($detail['batch_f']==1991){ echo 'selected="selected"'; }?>>1991</option>
            <option value="1990" <?php if($detail['batch_f']==1990){ echo 'selected="selected"'; }?>>1990</option>
            <option value="1989" <?php if($detail['batch_f']==1989){ echo 'selected="selected"'; }?>>1989</option>
            <option value="1988" <?php if($detail['batch_f']==1988){ echo 'selected="selected"'; }?>>1988</option>
            <option value="1987" <?php if($detail['batch_f']==1987){ echo 'selected="selected"'; }?>>1987</option>
            <option value="1986" <?php if($detail['batch_f']==1986){ echo 'selected="selected"'; }?>>1986</option>
            <option value="1985" <?php if($detail['batch_f']==1985){ echo 'selected="selected"'; }?>>1985</option>
          </select>
        </div></td>
        <td width="68"><div align="center">
          <select name="batch_t">
		    <option value=""></option>
            <option value="2012" <?php if($detail['batch_t']==2012){ echo 'selected="selected"'; }?>>2012</option>
            <option value="2011" <?php if($detail['batch_t']==2011){ echo 'selected="selected"'; }?>>2011</option>
            <option value="2010" <?php if($detail['batch_t']==2010){ echo 'selected="selected"'; }?>>2010</option>
            <option value="2009" <?php if($detail['batch_t']==2009){ echo 'selected="selected"'; }?>>2009</option>
            <option value="2008" <?php if($detail['batch_t']==2008){ echo 'selected="selected"'; }?>>2008</option>
            <option value="2007" <?php if($detail['batch_t']==2007){ echo 'selected="selected"'; }?>>2007</option>
            <option value="2006" <?php if($detail['batch_t']==2006){ echo 'selected="selected"'; }?>>2006</option>
            <option value="2005" <?php if($detail['batch_t']==2005){ echo 'selected="selected"'; }?>>2005</option>
            <option value="2004" <?php if($detail['batch_t']==2004){ echo 'selected="selected"'; }?>>2004</option>
            <option value="2003" <?php if($detail['batch_t']==2003){ echo 'selected="selected"'; }?>>2003</option>
            <option value="2002" <?php if($detail['batch_t']==2002){ echo 'selected="selected"'; }?>>2002</option>
            <option value="2001" <?php if($detail['batch_t']==2001){ echo 'selected="selected"'; }?>>2001</option>
            <option value="2000" <?php if($detail['batch_t']==2000){ echo 'selected="selected"'; }?>>2000</option>
            <option value="1999" <?php if($detail['batch_t']==1999){ echo 'selected="selected"'; }?>>1999</option>
            <option value="1998" <?php if($detail['batch_t']==1998){ echo 'selected="selected"'; }?>>1998</option>
            <option value="1997" <?php if($detail['batch_t']==1997){ echo 'selected="selected"'; }?>>1997</option>
            <option value="1996" <?php if($detail['batch_t']==1996){ echo 'selected="selected"'; }?>>1996</option>
            <option value="1995" <?php if($detail['batch_t']==1995){ echo 'selected="selected"'; }?>>1995</option>
            <option value="1994" <?php if($detail['batch_t']==1994){ echo 'selected="selected"'; }?>>1994</option>
            <option value="1993" <?php if($detail['batch_t']==1993){ echo 'selected="selected"'; }?>>1993</option>
            <option value="1992" <?php if($detail['batch_t']==1992){ echo 'selected="selected"'; }?>>1992</option>
            <option value="1991" <?php if($detail['batch_t']==1991){ echo 'selected="selected"'; }?>>1991</option>
            <option value="1990" <?php if($detail['batch_t']==1990){ echo 'selected="selected"'; }?>>1990</option>
            <option value="1989" <?php if($detail['batch_t']==1989){ echo 'selected="selected"'; }?>>1989</option>
            <option value="1988" <?php if($detail['batch_t']==1988){ echo 'selected="selected"'; }?>>1988</option>
            <option value="1987" <?php if($detail['batch_t']==1987){ echo 'selected="selected"'; }?>>1987</option>
            <option value="1986" <?php if($detail['batch_t']==1986){ echo 'selected="selected"'; }?>>1986</option>
            <option value="1985" <?php if($detail['batch_t']==1985){ echo 'selected="selected"'; }?>>1985</option>
          </select>
        </div></td>
        <td width="130"><div align="center">
          <input name="degree" type="text" size="15" value="<?php echo $detail['degree']; ?>"/>
        </div></td>
        <td><div align="center">
            <input name="subject" type="text" size="15" value="<?php echo $detail['subject']; ?>"/>
        </div></td>
        <td><div align="center">
            <input name="institute_pref" type="text" size="15" value="<?php echo $detail['institute_pref']; ?>" />
        </div></td>
        <td></td>
      </tr>
    </table>
    <h2></h2></td>
  </tr>
  <tr>
    <td colspan="14"><table width="774"><tr><td><div id="tabs">
<ul>
		<li><a href="#tabs-1">Job Description</a></li>
		<li><a href="#tabs-2">Candidate Specification</a></li>
		<li><a href="#tabs-3">Attachments</a></li>
	</ul>

			<div id="tabs-1"><textarea name="jd" cols="100"><?php echo $detail['jd']; ?></textarea>
			</div><div id="tabs-2">
			  <textarea name="candidate_specs" cols="100"><?php echo $detail['candidate_specs']; ?></textarea>
	</div><div id="tabs-3"><input name="userfile" type="file" /><input name="go" type="submit" class="btn btn-primary" value="Upload" /><table width="100%">
  <tr>
    <td colspan="2" scope="col"><?php foreach ($attachment as $key => $test): ?><input type="checkbox" name="chk" id="<?php echo $test['id'];?>" value="<?php echo $test['id'];?>" onClick="SingleSelect('chk',this);" />     <?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			echo $test['filename'].anchor_popup('pof/admin/viewattachment/'.$test['id'], 'view', $atts); ?>   <?php endforeach; ?></td>
			<td><input type="submit" class="btn btn-primary" name="delJD" value="Delete" /></td>
  </tr>
  <tr>  </tr>
</table></div></div></td></tr></table></td>
  </tr>
</table>
</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid" id="workex">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Admin Details</h3>
							</div>
							<div class="box-content nopadding">
							<div class="inputform">

<table width="847">
  <tr>
    <td height="36" scope="col">Positition Entered By </td>
    <td scope="col"><b><?php echo $detail['entered_by']; ?></b></td>
    <td scope="col">Position Entered On </td>
    <td colspan="3" scope="col"><b><?php echo $detail['entered_on']; ?></b></td>
  </tr>
  <tr>
    <td height="36" scope="col">Last Updated By </td>
    <td scope="col"><b><?php echo $detail['updated_by']; ?></b></td>
    <td scope="col">Last Updated On </td>
    <td colspan="3" scope="col"><b><?php echo $detail['updated_on']; ?></b></td>
  </tr>
  <tr>
    <td width="151" height="36" scope="col">Position Taken By </td>
    <td width="157" scope="col"><?php echo form_dropdown("pos_taken_by",array('0' => '')+$users,set_value('id', $detail['pos_taken_by']),"id='id', style='width:150px; background-color:#CCCCCC'");?></td>
    <td width="151"scope="col">Positon Given By </td>
    <td width="135" scope="col"><input name="pos_given_by" type="text" size="15" value="<?php echo $detail['pos_given_by']; ?>"/></td>
    <td width="151" scope="col">Postition Taken On </td>
    <td width="139" scope="col"><input name="pos_taken_on" type="text" size="15" class="input-medium datepick" value="<?php echo $detail['pos_taken_on']; ?>"/></td>
  </tr>
  <tr>
    <td height="46">Position Sharing Method </td>
    <td><select name="pos_sharing_method" style="width:100px;">
	<option value=""></option>
      <option value="telephonic" <?php if($detail['pos_sharing_method']=='telephonic'){ echo 'selected="selected"'; }?>>Telephonic</option>
      <option value="email" <?php if($detail['pos_sharing_method']=='email'){ echo 'selected="selected"'; }?>>Email</option>
      <option value="client_web" <?php if($detail['pos_sharing_method']=='client_web'){ echo 'selected="selected"'; }?>>Client Web</option>
    </select></td>
    <td>Transaction Type </td>
    <td><select name="transaction_type" style="width:100px;">
      <option value=""></option>
	   <option value="retained" <?php if($detail['transaction_type']=='retained'){ echo 'selected="selected"'; }?>>Retained</option>
	   <option value="exclusive" <?php if($detail['transaction_type']=='exclusive'){ echo 'selected="selected"'; }?>>Exclusive</option>
	   <option value="exclusive" <?php if($detail['transaction_type']=='st_exclusive'){ echo 'selected="selected"'; }?>>ST Exclusive</option>
      <option value="contingent" <?php if($detail['transaction_type']=='contingent'){ echo 'selected="selected"'; }?>>Contingent</option>
	  <option value="contingent" <?php if($detail['transaction_type']=='contingent_late'){ echo 'selected="selected"'; }?>>Contingent Late</option>
    </select></td>
    <td>Client Manager</td>
    <td><?php echo form_dropdown("client_mgr",array('0' => '')+$users,set_value('id', $detail['client_mgr']),"id='id', style='width:110px; background-color:#CCCCCC'");?></td>
  </tr>
  <tr>
    <td>Updated By </td>
    <td><input name="updated_by" type="text" size="15" value="<?php echo $this->session->userdata('username'); ?>"/></td>
    <td>Updated On </td>
    <td><input name="updated_on" type="text" size="15" value="<?php echo date('Y-m-d'); ?>"/></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="41"><strong>Hiring Manager </strong></td>
    <td><?php echo form_dropdown("hiring_mgr",array('0' => '')+$hiringmanager,"","id='id', style='width:143px; background-color:#CCCCCC'");?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="38" colspan="6">
	
	<table width="831" id="table4">
      <tr bgcolor="#000033">
        <th width="122" height="3" bgcolor="#000000"><div align="center" class="style1">Name</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Telephone No. </div></th>
        <th width="143" bgcolor="#000000"><div align="center" class="style1">Mobile No. </div></th>
        <th width="232" bgcolor="#000000"><div align="center" class="style1">Email Id. </div></th>
        <td width="40" bgcolor="#FFFFFF"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows" /></div></td>
      </tr>
      <?php foreach($hiring_mgr as $key =>$row) {
     echo '<tr height="20">
        <td style="padding-top:5px;"><div align="center">
          <input name="h_name[]" type="text" size="15" value="'.$row['name'].'" />
        </div></td>
        <td width="127"><div align="center">
          <input name="h_designation[]" type="text" size="15" value="'.$row['designation'].'" />
        </div></td>
        <td width="139"><div align="center">
            <input name="h_telephone[]" type="text" size="15" value="'.$row['telephone'].'" />
        </div></td>
        <td><div align="center">
            <input name="h_mobile[]" type="text" size="15" value="'.$row['mobile'].'" />
        </div></td>
        <td><div align="center">
            <input name="h_email[]" type="text" size="35" value="'.$row['email'].'" />
        </div></td>
        <td></td>
      </tr>';
	  } ?>
    </table>	</td>
  </tr>
  <tr>
    <td colspan="6"><strong>Commitment made to Client:: </strong></td>
  </tr>
   <tr>
     <td height="38" colspan="6"><table width="591" id="table5">
       <tr bgcolor="#000033">
         <th width="396" height="3" bgcolor="#000000"><div align="center" class="style1">Comment</div></th>
         <th width="132" bgcolor="#000000" ><div align="center" class="style1">Date</div></th>
         <td width="47" bgcolor="#FFFFFF"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows"></div></td>
       </tr>
	    <?php foreach($commitment as $key =>$row) {
       echo '<tr height="20">
         <td style="padding-top:5px;"><input name="commit_comment[]" type="text" size="66" value="'.$row['comment'].'" /></td>
         <td><div align="center">
             <input name="commit_date[]" type="text" size="15" class="input-medium datepick" value="'.$row['date'].'" />
         </div></td>
         <td></td>
       </tr>';
	    } ?>
     </table></td>
   </tr>
   <tr>
     <td height="25">VC</td>
     <td><input type="checkbox" name="vc" value="1" <?php if ($detail['vc'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Group Posting </td>
     <td><input type="checkbox" name="group_posting" value="1" <?php if ($detail['group_posting'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Assesment Sheet </td>
     <td><input type="checkbox" name="assesment_sheet" <?php if ($detail['assesment_sheet'] == '1') { echo 'checked="checked" ';}?>/></td>
   </tr>
   <tr>
     <td height="25">Tracker</td>
     <td><input type="checkbox" name="tracker" value="1" <?php if ($detail['tracker'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Mirus Website </td>
     <td><input type="checkbox" name="mirus_web" value="1" <?php if ($detail['mirus_web'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Client Web Loading </td>
     <td><input type="checkbox" name="client_web" value="1" <?php if ($detail['client_web'] == '1') { echo 'checked="checked" ';}?>/></td>
   </tr>
   <tr>
     <td height="25">Client Confidentiality </td>
     <td><input type="checkbox" name="client_confi" value="1" <?php if ($detail['client_confi'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
</table>
  </div>
							</div>
						</div>
					</div>
				</div>
								
	<div class="form-actions">
										<button type="submit" class="btn btn-primary" class="btn btn-primary">Save</button>
										
		  </div>
									
									
				
		</div></div>