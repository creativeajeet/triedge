
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
            $('.terms').click(function() {

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
 <script type="text/javascript">
	    $(this).ready( function() {
    		$("#companyid").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/candidates/admin/lookup",
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

	</style>
	
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Company List
								</h3>
							</div>
							<div class="box-content nopadding">
<?php
 if (count($results)){ 
 echo "<table>\n";
  echo form_open('pof/admin/filterpos/');
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
		echo "<th><input type='text' name='jobtitle' size='20' id='companyid'/></th>\n";
		echo "<th>".form_dropdown('company',array(''=>''),'',"style='width:100px;'")."</th>\n";
		
		echo "<th><div align='center'><input type='text' name='grade' size='4'/></div></th>\n";
		echo "<th></th>\n";
		echo "<th><input type='submit' name='Submit' value='Filter' /></th>\n";
		
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n";
		echo form_close();
		$page = $this->uri->segment(3);
		echo form_open('companies/admin/changeStatus/'.$page);	
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th width='20'></th>\n";
	echo "<th width='20'></th>\n";
	echo "<th>Company Name</th>\n";

		echo "<th>Industry</th>\n";
		echo "<th><div align='center'>Client</div></th>\n";
		echo "<th><div align='center'>BD Target</div></th>\n";
		echo "<th width='20'></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td>".form_checkbox('id[]',$row->compid,FALSE)."</td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
 if(!$row->is_client)
 {
echo    "<td>".anchor('companies/admin/companypage/'.$row->compid, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";
 }
 else{
 echo    "<td>".anchor('companies/admin/companypageclient/'.$row->compid, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";
 }
 echo    "<td>$row->parentname</td>";
 echo    "<td></td>";
 if($user['group']==2)
 {
  if(!$row->is_client)
 {
  echo "<td><div align='center'><input class='case' name='cpage[]' type='checkbox' value='".$row->compid."'></div></td>";
   }
 else
  {
  echo    "<td><div align='center'><input class='case' type='checkbox' checked='checked'></div></td>";
  }
  }
  else
 {
  if(!$row->is_client)
 {
  echo "<td><div align='center'>No</div></td>";
   }
 else
  {
  echo    "<td><div align='center'>Yes</div></td>";
  }
  }
  if($user['group']==2)
 {
  if(!$row->bd_target)
 {
  echo "<td><div align='center'><input class='case' name='badtarget[]' type='checkbox' value='".$row->compid."'></div></td>";
   }
 else
  {
  echo    "<td><div align='center'><input class='case' type='checkbox' checked='checked'></div></td>";
  }
  }
   else
 {
  if(!$row->bd_target)
 {
  echo "<td><div align='center'><input class='case' name='badtarget[]' type='checkbox' value='".$row->compid."' disabled='disabled'></div></td>";
   }
 else
  {
  echo    "<td><div align='center'><input class='case' type='checkbox' checked='checked' disabled='disabled'></div></td>";
  }
  }
  echo "<td></td>\n";
  
  
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>

</div>
						</div>
					</div>
				</div>

 <?php echo $links; ?>
 <div align="right" style="position:relative; margin-top:20px; margin-bottom:20px;">
 <?php
  if($user['group']==2)
   {
  echo '<input type="submit" class="btn btn-primary" name="change" value="Save Changes" /></div>';
  }
  ?>