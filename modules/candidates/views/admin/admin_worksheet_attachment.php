<div align="left" style="margin-right:50px; margin-top:17px;">
<strong>Attachments</strong>
<?php 
if (count($attachment)){ 
foreach ($attachment as $key => $test): ?>
  <input type="checkbox" name="chk" id="<?php echo $test['file_id'];?>" value="<?php echo $test['file_id'];?>" onClick="SingleSelect('chk',this);" />    <?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			echo $test['filename'].anchor_popup('candidates/admin/viewworkattachment/'.$test['file_id'], 'view', $atts); ?>
          <?php endforeach;
		  }
		  else{
		  echo "No Attachments found";
  }
   ?>
  
</div>
<?php $worksheetid = $this->uri->segment(4); ?>
 <?php echo form_open_multipart('candidates/admin/worksheetattachment/'.$worksheetid.'/');?>
	</div><div id="tabs-3"><input name="userfile" type="file" /><input name="go" type="submit" class="btn btn-primary" value="Upload" /></div></div>
	