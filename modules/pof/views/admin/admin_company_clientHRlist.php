
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
	<h2>Client Management - All</h2>
<table width="100%">
  
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="21%"><div align="center"><?php print anchor('companies/admin/clientManagement','All',array('class'=>'icon_user','id'=>'current'))?></div>   </td>
    <td width="14%"><div align="center"><?php print anchor('companies/admin/clientManagementapp','Appointed',array('class'=>'icon_user'))?></div>    </td>
    <td width="15%"><div align="center"><?php print anchor('companies/admin/clientManagementpen','Pending',array('class'=>'icon_user'))?></div></td>
  </tr>
</table>
<?php if (count($results)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='left'><input id='selectall' type='checkbox'></div></th>\n";
	echo "<th></th>\n";
			echo "<th>Name</th>\n";
		echo "<th>Current Co.</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Designation</th>\n";
		echo "<th>Current Loc.</th>\n";
		echo "<th>Pri. Client Mgr</th>\n";
		echo "<th>Appointed On</th>\n";
		echo "<th>Sec. Client Mgr</th>\n";
		echo "<th>Appointed On</th>\n";
		echo "<th></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
		echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
			echo "<th>/th>\n";
		echo "<th>Current Co.</th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th>Current Loc.</th>\n";
		echo "<th>Pri. Client Mgr</th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "<th></th>\n";
		echo "</tr>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td><input class='case' name='c_id[]' value='".$row->id."' type='checkbox'></td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->job_title</td>";
 echo    "<td>$row->desig</td>";
 echo    "<td>$row->current_location</td>";
 echo    "<td>".form_dropdown('clientmgr',array('0'=>'')+$user,set_value('clientmgr',$row->manager),'stylestyle="width:100px; height:150px; background-color:#CCCCCC"')."</td>";
  echo    "<td>$row->pappdate</td>";
  echo    "<td>".form_dropdown('secclientmgr',array('0'=>'')+$user,set_value('secclientmgr',$row->sec_manager),'stylestyle="width:100px; height:150px; background-color:#CCCCCC"')."</td>";
   echo    "<td>$row->sappdate</td>";
  echo    "<td><div align='center'>".anchor_popup('companies/admin/addScribble/'.$compid, img('http://software.triedge.in/assets/icons/scribble.png'), '')."</div></td>";

  
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>


 <h2></h2>
 <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>

 </div>

 <?php echo $links; ?>
 <div align="right">
      <input type="submit" class="btn btn-primary" name="change" value="Save Changes" />
</div>