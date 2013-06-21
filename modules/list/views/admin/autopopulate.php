<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>
<base href="<?php echo substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>" />
	
	<script src="assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.autopopulatebox.js" type="text/javascript"></script>

 
	    
	    <script type="text/javascript">
	
	    $(this).ready( function() {
    		$("#list_id").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/list/admin/lookup",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            		$("#result").append(
            			"<li>"+ ui.item.value + "</li>"
            		);           		
         		},		
    		});
	    });
		
	    </script>
		  <script type="text/javascript">
	
	    $(this).ready( function() {
    		$("#cons_id").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/list/admin/lookup",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            		$("#result").append(
            			"<li>"+ ui.item.value + "</li>"
            		);           		
         		},		
    		});
	    });
		
	    </script>
    <meta charset="UTF-8">
</head>

<body>
<?php echo validation_errors(); ?>
<table width="649" height="114" border="1">
<?php print form_open('list/admin/addlist/'); ?>
		<input type="hidden" value='' id="id" name="id">
  <tr>
    <td width="143"><div align="center">Type</div></td>
    <td colspan="2"><div align="center">Parent</div></td>
    <td colspan="3"><div align="center">Child</div></td>
  </tr>
  
  <tr>
    <td><div align="center">
      <select id="tests2" name="test2" multiple="multiple" style="width:143px; height:200px; background-color:#CCCCCC">
        <?php foreach ($tests as $key => $test): ?>
        <option value="<?php echo $key; ?>"> <?php echo $test; ?> </option>
        <?php endforeach; ?>
      </select>
    </div></td>
    <td colspan="2"><div align="center">
      <select id="categories2" name="category" multiple="multiple" style="width:240px; height:200px; background-color:#CCCCCC">
      </select>
    </div></td>
    <td colspan="3">
      <div align="left">
        <select id="contents2" name="content" multiple="multiple" style="width:240px; height:200px; background-color:#CCCCCC">
        </select>
      </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td width="75">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td width="221">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">
      <?php
			echo form_input('name','','id="list_id"');
		?>
    </div>
        <div align="center"></div></td>
    <td><p>
        <button id="list_entry">Add New </button>
    </p></td>
    <td colspan="2"><div align="center">
      <?php
			echo form_input('name1','','id="cons_id"');
		?>
    </div></td>
    <td><p>
        <button id="cons_entry">Add New </button>
    </p></td>
  </tr>
 
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
</table>
<script>
	jQuery(function($) {
		$('#tests2').autoPopulateBox({
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',
			change: 'category2',
			
			category2: {
				target: '#categories2',
				change: 'content2'
			},
			content2: {
				target: '#contents2'
			}
		});
	});
</script>
<script>
	jQuery(function($) {
		$('#tests2').autoPopulateBox({
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',

			
			category2: {
				target: '#categories2',
				change: 'content3'
			},
			content3: {
				target: '#contents3'
			}
		});
	});
</script>
<script>
	jQuery(function($) {
		$('#tests2').autoPopulateBox({
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',
		
			
			category2: {
				target: '#categories2',
				change: 'content4'
			},
			content4: {
				target: '#contents4'
			}
		});
	});
</script>

<script>
	jQuery(function($) {
		$('#tests2').autoPopulateBox({
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',
			change: 'content2',
			
			content2: {
				target: '#contents2',
				change: 'cons7'
			},
			cons7: {
				target: '#cons7'
			}
		});
	});
</script>

</body>
</html>
