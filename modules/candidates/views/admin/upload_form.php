<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<html>
<head>
<title>Upload Form</title>
<script src="<?php echo base_url(); ?>js/jquery-1.3.2.min.js" type="text/javascript" language="javascript"></script> 
<script src="<?php echo base_url(); ?>js/jquery.MultiFile.min.js" type="text/javascript" language="javascript"></script> 
</head>
<body>

<?php if (isset($error)) echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>
<input type="file" name="userfile[]" size="20" class="multi" />
<br /><br />

<input type="submit" class="btn btn-primary" value="upload" />

</form>

</body>
</html>

