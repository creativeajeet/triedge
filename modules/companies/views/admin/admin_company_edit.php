
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script> 
        <script src="http://jqueryui.com/ui/jquery.ui.widget.js"></script>
       <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datepick.pack.js" ></script>
	  <script type="text/javascript">
			$(document).ready(function(){
				
				//	-- Datepicker
				$(".datepicker").datepicker({
					dateFormat: 'yy-mm-dd',
					showButtonPanel: true
				});					
				
			
			});
		</script>


<script type="text/javascript">
      $(document).ready(function() { 
            $('#wizard').tabs({ disabled: [1, 2] });
            $('.terms').each(function() {
            
            var iTab = $(this).data('tabid');                   
            if ($(this).is(':checked')) {

                        $('#wizard').tabs('enable', iTab);

                        $('#wizard').tabs('select', iTab);
            } else {
                        $('#wizard').tabs('disable', iTab);
                        $('#tab' + (iTab + 1) + ' .text').val('');
            }
        }); 
    });
</script>
<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
	th { 
		
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	tr, td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style><div id="news">
<marquee behavior="scroll" align="middle" direction="left" bgcolor="#006666" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()"><font color="#FFFFFF"><?php $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
		 if (count($news)){ 
foreach($news as $row)
 {
  echo '#'.anchor_popup('messege/admin/news/'.$row->msg_id, $row->title, array('class'=>'newslink')+$atts).'<span class="newsby"> - '.$row->username.'</span> ';
 }
 }
 
 else{
  echo 'No new messege'; 
 } 
 ?></font></marquee>
</div>
<br/>
	<?php echo form_open_multipart('companies/admin/editCompany/'.$id); ?>
        <div id="wizard">
                <ul>
                    <li><a href="#wizard-1">Company Details</a></li>
                    <li><a href="#wizard-2">Client Terms</a></li>
                          </ul>

                <div id="wizard-1">
                   <table width="600">
  <tr>
    <td colspan="4" scope="col"><div align="left"><b>Company/Client Details </b></div></td>
  </tr>
  <tr>
    <td width="136">Company Name </td>
    <td width="173">
      <input name="comp" type="text" size="50" value="<?php echo $detail['comp']; ?>" />    </td>
    <td width="140">Industry</td>
    <td width="332"><?php echo form_dropdown('industry', $industry, set_value('industry', $detail['industry'])); ?></td>
  </tr>
  <tr>
    <td height="25">Client</td>
    <td width="173" colspan="3">
    <input type="checkbox" class="terms" data-tabid="1" onClick="" name="client" value="1" <?php if($detail['client']==1){ echo 'checked="checked"'; }?>/>    </td>
    </tr>
  
  
  <tr>
    <td colspan="4"> <?php print form_hidden('id','')?>
            <div class="buttons">
              <button type="submit" class="btn btn-primary" class="positive" name="submit" value="submit"> <?php print  $this->bep_assets->icon('disk');?> <?php print $this->lang->line('general_save')?> </button>
            </div>    </td>
  </tr>
</table>
                </div>

                <div id="wizard-2"> <table width="600">
  <tr>
    <td colspan="8" scope="col"><div align="left"><b>Client Terms </b></div></td>
  </tr>
  <tr>
    <td width="8%">Start Date      </td>
    <td width="15%"><input type="text" name="start" class="input-medium datepick" value="<?php echo $detail_client['start']?>"/></td>
    <td width="7%">End Date </td>
    <td width="16%"><input type="text" name="end" class="input-medium datepick" value="<?php echo $detail_client['end']?>"/></td>
    <td width="13%">Agreement With </td>
    <td width="17%"><select name="agmwith" style="width:145px;">
      <option value=""></option>
      <option value="resource" <?php if($detail_client['agmwith']=="resource") { echo 'selected="selected"'; } ?>>Resouce Angle</option>
      <option value="mirus" <?php if($detail_client['agmwith']=="mirus") { echo 'selected="selected"'; } ?>>Mirus</option>
    </select></td>
    <td width="13%">Agreement Received </td>
    <td width="11%"><input type="checkbox" name="agmrcvd" value="1" <?php if($detail_client['agmrcvd']=="Yes"){ echo 'checked="checked"'; }?> /></td>
  </tr>
  <tr>
    <td colspan="4">Agreement Status<br/><textarea name="agmstatus" cols="60" rows="2" wrap="hard" ><?php echo $detail_client['agmstatus']; ?></textarea> </td>
    <td colspan="4">Additional<br/><textarea name="additional" cols="60" rows="2" wrap="hard" ><?php echo $detail_client['additional']; ?></textarea> </td>
  </tr>
  
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Agreement Attachment </td>
    <td colspan="2"><?php echo form_upload('userfile'); ?></td>
    <td colspan="4"><?php echo form_submit('upload', 'Upload'); ?></td>
    </tr>
  <tr>
    <td colspan="8"> <?php foreach ($attachment as $key => $test): ?>
  <input type="checkbox" name="chk" id="<?php echo $test['id'];?>" value="<?php echo $test['id'];?>" onClick="SingleSelect('chk',this);" />    <?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			echo $test['filename'].anchor_popup('companies/admin/viewattachment/'.$test['id'], 'view', $atts); ?>
          <?php endforeach; ?></td>
  </tr>
  <tr>
    <td colspan="8"><input name="submit" type="submit" class="btn btn-primary" value="Save"></td>
  </tr>
  </table>
                </div>

               
        </div>
<h2>Company/Client List</h2>
<?php
 if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th width='20'></th>\n";
	echo "<th width='20'></th>\n";
	echo "<th>Company Name</th>\n";

		echo "<th>Industry</th>\n";
		echo "<th><div align='center'>Is this client?</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>".form_checkbox('id[]',$row->c_id,FALSE)."</td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor('companies/admin/editCompany/'.$row->c_id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 echo    "<td>$row->comp</td>";
 echo    "<td>$row->segment_name</td>";
  if(!$row->client)
 {
  echo "<td><div align='center'>No</div></td>";
   }
 else
  {
  echo    "<td><div align='center'>Yes</div></td>";
  } 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
<h2></h2>
