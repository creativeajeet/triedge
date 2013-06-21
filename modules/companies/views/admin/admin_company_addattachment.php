<h2>Attachment</h2>
<br/>
<?php $compid = $this->uri->segment(4); ?>
<?php print form_open_multipart('companies/admin/addAttachment/'.$compid);?>
<input name="userfile" type="file" /><input name="go" type="submit" class="btn btn-primary" value="Upload" />