
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>	
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>

<script type="text/javascript">
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
<?php print form_open_multipart('pof/admin/newpof/'.$pid);?>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Position Order Form</h3>
							</div>
							<div class="box-content nopadding">
							<div class="inputform">
<table width="1237">
<?php 
   foreach($admins as $row)
    {
	 echo "<input name='admins[]' type='hidden' value='$row->id'/>";
	}
	?>
  <tr>
    <td colspan="13" scope="col"><h2 align="left">Position Order Form</h2></td>
  </tr>
  
  
  <tr>
    <td width="48" height="40">Client</td>
    <td colspan="3"><?php echo form_dropdown('client_id', array('0' => '')+$clients, '', "id='companyid', style='width:250px;  background-color:#CCCCCC'"); ?></td>
    <td width="62">Job TItle </td>
    <td width="208"><input name="jobtitle" type="text" size="25" /></td>
    <td width="74">Department</td>
    <td width="564"><input name="department" type="text" size="15" /></td>
  </tr>
  <tr>
    <td height="34">TL</td>
    <td width="29"><div align="left">
      <input type="checkbox" name="tl" value="1" />
    </div></td>
    <td width="87">Generic Role </td>
    <td width="133"><input name="department2" type="text" size="15" /></td>
    <td>Job Type</td>
    <td colspan="3"><select name="job_type">
      <option value="full">Full Time</option>
      <option value="part">Part Time</option>
	  <option value="flexi">Flexi</option>
      <option value="consultant">Consultant</option>
    </select></td>
    <td width="1">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="29" colspan="3">Attach to My Worksheet </td>
    <td colspan="5"><?php echo form_dropdown("myworksheet",array('0'=>'')+$worksheet,"","id='id', style='width:140px; background-color:#CCCCCC'");?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13">Worksheet Grid 
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
   
  
</table>
<h2></h2></td>
  </tr>
  
  <tr>
    <td colspan="13">
	<table width="1000" id="table2">
      <tr bgcolor="#000033">
        <th width="151" height="3" rowspan="2" bgcolor="#000000"><div align="center" class="style1"> Location </div></th>
        <th width="71" rowspan="2" bgcolor="#000000"><div align="center" class="style1">No. of Pos </div></th>
        <th width="136" rowspan="2" bgcolor="#000000"><div align="center" class="style1"> Grade </div></th>
		<th width="38" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Level</div></th>
        <th width="90" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Exp. Range </div></th>
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Salary Range </div></th>
        <th width="135" bgcolor="#000000"><div align="center" class="style1">Reports To </div></th>
        <th width="80" bgcolor="#000000"><div align="center" class="style1">Reports To </div></th>
        <td width="54" rowspan="2" bgcolor="#FFFFFF"><div align="center"><!--<img src="/*?php echo base_url()?>assets/icons/add.png" class="cloneTableRows" />--></div></td>
      </tr>
      <tr bgcolor="#000033">
        <th width="52" bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th width="52" bgcolor="#000000"><div align="center" class="style1">to</div></th>
        <th width="47" bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th width="42" bgcolor="#000000"><div align="center" class="style1">to</div></th>
        <th width="135" bgcolor="#000000"><div align="center" class="style1">(Name)</div></th>
        <th width="80" bgcolor="#000000"><div align="center" class="style1">(Level)</div></th>
      </tr>
      <tr height="20">
        <td style="padding-top:5px;"><div align="center"><?php echo form_dropdown('location', array('0' => '')+$locations, "","style='width:150px;'"); ?></div></td>
        <td><div align="center">
          <input name="no_of_pos" type="text" style="width:50px;"/>
        </div></td>
        <td colspan="2"><div align="center" id="gradelist">
         <?php
    	echo form_dropdown("grade",array(''=>''),'',"id='gradeid', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
	
        </div>
		
		<script type="text/javascript">
	  	$("#companyid").click(function(){
	    		
        //build an array of selected values
        var companyid= $("#companyid").val();

      

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pof/admin/getGrade')?>",
							data: {'companyid':companyid},
							success: function(msg){
								$('#gradelist').html(msg);
							}
				  	});
	    		
	    });
	   </script>		</td>
        
        <td><div align="center">
          <input name="designation" type="text" size="15" />
        </div></td>
        <td><div align="center">
           <select name="exp_f" style="width:50px;">
		   <option value=""></option>
           <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
            <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="18">18</option>
           <option value="19">19</option>
           <option value="20">20</option>
           <option value="21">21</option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
           <option value="25">25</option>
           </select>
        </div></td>
        <td><div align="center">
          <select name="exp_t" style="width:50px;">
		  <option value=""></option>
           <option value="0">0</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="18">18</option>
           <option value="19">19</option>
           <option value="20">20</option>
           <option value="21">21</option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
           <option value="25">25</option>
           </select>
        </div></td>
        <td><div align="center">
          <input name="sal_f" type="text" size="2" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <input name="sal_t" type="text" size="2" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <input name="reports_to_name" type="text" size="15" />
        </div></td>
        <td><div align="center">
          <input name="reports_to_level" type="text" size="5"/>
        </div></td>
        <td></td>
      </tr>
    </table>
	<h2></h2></td>
  </tr>
  <tr>
    <td colspan="13"><table width="774" id="table3">
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
     <option value="pg">PG</option>
	 <option value="ug">UG</option>
	    </select>
        </div></td>
        <td width="69"><div align="center">
          <select name="batch_f">
            <option value=""></option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
          </select>
        </div></td>
        <td width="68"><div align="center">
          <select name="batch_t">
		    <option value=""></option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
          </select>
        </div></td>
        <td width="130"><div align="center">
          <input name="degree" type="text" size="15" />
        </div></td>
        <td><div align="center">
            <input name="subject" type="text" size="15" />
        </div></td>
        <td><div align="center">
            <input name="institute_pref" type="text" size="15" />
        </div></td>
        <td></td>
      </tr>
    </table>
    <h2></h2></td>
  </tr>
  <tr>
    <td colspan="13"><table width="774"><tr><td><div id="tabs">
<ul>
		<li><a href="#tabs-1">Job Description</a></li>
		<li><a href="#tabs-2">Candidate Specification</a></li>
		<li><a href="#tabs-3">Attachments</a></li>
	</ul>

			<div id="tabs-1"><textarea name="jd" cols="100"></textarea>
			</div><div id="tabs-2">
			  <textarea name="candidate_specs" cols="100"></textarea>
	</div><div id="tabs-3"><input name="userfile" type="file" /><input name="go" type="submit" class="btn btn-primary" value="Upload" /></div></div></td></tr></table></td>
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
    <td width="151" height="36" scope="col">Position Taken By </td>
    <td width="157" scope="col"><?php echo form_dropdown("pos_taken_by",array('0' => '')+$user,"","id='id', style='width:150px; background-color:#CCCCCC'");?></td>
    <td width="151"scope="col"><strong>Hiring Manager  </strong></td>
    <td width="135" colspan="3" scope="col"><div id="hiringmanager"><?php
    	echo form_dropdown("hiring_mgr",array('0' => ''),"","id='hiringmanager', style='width:143px; background-color:#CCCCCC'",'disabled');
    ?>
        </div>
		<script type="text/javascript">
	  	$("#companyid").click(function(){
	    		
        //build an array of selected values
        var companyid= $("#companyid").val();

      

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pof/admin/getHiringManager')?>",
							data: {'companyid':companyid},
							success: function(msg){
								$('#hiringmanager').html(msg);
							}
				  	});
	    		
	    });
	   </script> </td>
  </tr>
  <tr>
    <td height="46">Position Sharing Method </td>
    <td><select name="pos_sharing_method" style="width:100px;">
	<option value=""></option>
      <option value="telephonic">Telephonic</option>
      <option value="email">Email</option>
      <option value="client_web">Client Web</option>
    </select></td>
    <td>Transaction Type </td>
    <td width="135"><select name="transaction_type" style="width:100px;">
      <option value=""></option>
	  <option value="retained">Retained</option>
	  <option value="exclusive">Exclusive</option>
	  <option value="st_exclusive">ST Exclusive</option>
      <option value="contingent">Contingent</option>
      <option value="contingent_late">Contingent Late</option>
     </select></td>
    <td width="151">Postition Taken On </td>
    <td width="139"><input name="pos_taken_on" type="text" size="15" class="input-medium datepick" /></td>
  </tr>
  <tr>
    <td>Entered By </td>
    <td><input name="entered_by" type="text" size="15" value="<?php echo $this->session->userdata('username'); ?>"/></td>
    <td>Entered On </td>
    <td><input name="entered_on" type="text" size="15" value="<?php echo date('Y-m-d'); ?>"/></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
  
    <td height="41"></td>
    <td><input name="pos_given_by" type="hidden" size="15" /><div id="hiringmanager">         	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
       <tr height="20">
         <td style="padding-top:5px;"><input name="commit_comment[]" type="text" size="66" /></td>
         <td><div align="center">
             <input name="commit_date[]" type="text" size="15" class="input-medium datepick"/>
         </div></td>
         <td></td>
       </tr>
     </table></td>
   </tr>
   <tr>
     <td height="25">VC</td>
     <td><input type="checkbox" name="vc" value="1"></td>
     <td>Group Posting </td>
     <td><input type="checkbox" name="group_posting" value="1"></td>
     <td>Assesment Sheet </td>
     <td><input type="checkbox" name="assesment_sheet" value="1"></td>
   </tr>
   <tr>
     <td height="25">Tracker</td>
     <td><input type="checkbox" name="tracker" value="1"></td>
     <td>Mirus Website </td>
     <td><input type="checkbox" name="mirus_web" value="1"></td>
     <td>Client Web Loading </td>
     <td><input type="checkbox" name="client_web" value="1"></td>
   </tr>
   <tr>
     <td height="25">Client Confidentiality </td>
     <td><input type="checkbox" name="client_confi" value="1"></td>
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