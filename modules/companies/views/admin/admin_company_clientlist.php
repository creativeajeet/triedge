
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
									Client List
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
		echo "<th><input type='text' name='jobtitle' size='20'/></th>\n";
		echo "<th>".form_dropdown('company',array(''=>''),'',"style='width:100px;'")."</th>\n";
		
		echo "<th><div align='center'><input type='text' name='grade' size='4'/></div></th>\n";
		
		echo "<th><input type='submit' name='Submit' value='Filter' /></th>\n";
		
//	   	echo "<th><div align='center'>JD</div></th>\n";
		echo "</tr>\n";
		echo form_close();
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th width='20'></th>\n";
	echo "<th width='20'></th>\n";
	echo "<th>Company Name</th>\n";

		echo "<th>Industry</th>\n";
		echo "<th><div align='center'>Contract DOE</div></th>\n";
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

echo    "<td>".anchor('companies/admin/companypageclient/'.$row->compid, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 echo    "<td>$row->parentname</td>";
 echo    "<td></td>";
  "<td><div align='center'></div></td>";
 echo"<td><div align='center'></div></td>";
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