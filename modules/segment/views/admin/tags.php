<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/style.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery.js"></script>
<script type="text/javascript">
$(function(){

	$("#tags").multiselect({
		selectedList: 4
	});
	
});
</script>
Tags<br/>
   	<?php
    	echo form_multiselect("tag_name[]",$option_tags,'',"id='tags', style='width:250px; height:150px; background-color:#CCCCCC'","id='id'");
    ?>
