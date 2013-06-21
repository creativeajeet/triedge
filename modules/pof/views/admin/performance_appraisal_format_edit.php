<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.6.1.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datepick.pack.js" ></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker/jquery.ui.all.css" />
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

<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
		border-collapse: collapse; 
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

	.style1 {font-size: 18px}
</style>
<?php $id = $this->uri->segment(4); ?>
<?php echo form_open('pof/admin/editAppraisal/'.$id); ?>
<table width="100%">
  <tr>
    <th colspan="3" scope="col"><div align="center" class="style1">SELF ASSESMENT PERFORMANCE APPRAISAL FORMAT (PA1)</div></th>
  </tr>
  <tr>
    <td width="43%" height="20">Name of Consultant </td>
    <td colspan="2"><input type="text" name="cons_name" value="<?php echo $app['cons_name']; ?>" /></td>
  </tr>
  <tr>
    <td height="20">Date of Joining </td>
    <td height="20" colspan="2"><input type="text" name="join_date" class="input-medium datepick" value="<?php echo $app['join_date']; ?>"/></td>
  </tr>
  <tr>
    <td height="20">Performance Appraisal for the period </td>
    <td height="20" colspan="2"><input type="text" name="app_period" value="<?php echo $app['app_period']; ?>"/></td>
  </tr>
  <tr>
    <th colspan="3"><div align="center">I Role As A Consultant </div></th>
  </tr>
  <tr>
    <th colspan="3"><div align="left">1. Operational Excellence </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Database Management - (since software activation) </td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20"> i) Total Record </td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20"> a- No. of new records added till date to s/w  </td>
    <td height="20" colspan="2"><input type="text" name="total_added" value="<?php echo $app['total_added']; ?>"/></td>
  </tr>
  <tr>
    <td height="20">b- % not sent to worksheet </td>
    <td height="20" colspan="2"><input type="text" name="no_work" value="<?php echo $app['no_work']; ?>"/></td>
  </tr>
  <tr>
    <td height="20">c- % cv not attached </td>
    <td height="20" colspan="2"><input type="text" name="no_cv" value="<?php echo $app['no_cv']; ?>"/></td>
  </tr>
  <tr>
    <td>ii) No. of unattached CVs on VRS </td>
    <td colspan="2"><input type="text" name="no_cv_vrs" value="<?php echo $app['no_cv_vrs']; ?>"/></td>
  </tr>
  <tr>
    <td colspan="3"><strong>B.</strong> Transaction Process Management (Please state instances of both exceptional management &amp; non adherence) </td>
  </tr>
  <tr>
    <td height="20">i) <strong>Client  Mgmt</strong> &ndash; Success in  interview scheduling</td>
    <td height="20" colspan="2"><textarea name="client_mgmt" cols="40"><?php echo $app['client_mgmt']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">ii) <strong>Facilitating Joining</strong> - % of drop outs across stages</td>
    <td height="20" colspan="2"><textarea name="facilitating" cols="40"><?php echo $app['facilitating']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="left">2. Number Delivery </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Total Closure Value (Jan  to July)</td>
    <td height="20" colspan="2"><input type="text" name="total_closure" value="<?php echo $app['total_closure']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>B.</strong> Average Closure Value per month (as a % of  Cost)</td>
    <td height="20" colspan="2"><input type="text" name="avg_closure" value="<?php echo $app['avg_closure']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>C.</strong> Ratio ( No of Closures to Total No of Deals  Allocated)</td>
    <td height="20" colspan="2"><input type="text" name="ratio" value="<?php echo $app['ratio']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>D. </strong>Highest Value of  Transaction worked on &amp; closed (state both)</td>
    <td height="20" colspan="2"><input type="text" name="highest_value" value="<?php echo $app['highest_value']; ?>"/></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="left">3. Existing Level as a consultant </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Time taken to comprehend  the position (mention time)</td>
    <td height="20" colspan="2"><textarea name="time_taken" cols="40"><?php echo $app['time_taken']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>B. </strong>Speed of Execution (Average  no of days worked on a position) &ndash;data since software execution</td>
    <td height="20" colspan="2"><input type="text" name="exec_speed" value="<?php echo $app['exec_speed']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>C</strong>. Average calling time per  day</td>
    <td height="20" colspan="2"><input type="text" name="avg_calling" value="<?php echo $app['avg_calling']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>D. </strong>Referencing and Mapping  capacity (how many give reference out of every 10 calls)</td>
    <td height="20" colspan="2"><textarea name="referencing" cols="40"><?php echo $app['referencing']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>E.</strong> Average day of first response on a transaction  from time of allocation-data since software execution</td>
    <td height="20" colspan="2"><input type="text" name="avg_day" value="<?php echo $app['avg_day']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>F</strong>. Average No. of CVs sent per position allocated</td>
    <td height="20" colspan="2"><input type="text" name="avg_cv_sent" value="<?php echo $app['avg_cv_sent']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>G.</strong> % of resumes rejected internally / client</td>
    <td height="20" colspan="2"><textarea name="resumes_reject" cols="40"><?php echo $app['resumes_reject']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="left">4. Potential as a consultant </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Ability to handle pressure</td>
    <td height="20" colspan="2"><textarea name="handle_pres" cols="40"><?php echo $app['handle_pres']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>B.</strong> Scalability (ability to  serve across function, level, industry &amp; client) &ndash; Different types of  positions handled</td>
    <td height="20" colspan="2"><textarea name="scalability" cols="40"><?php echo $app['scalability']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>C. </strong>Ability to multi task</td>
    <td height="20" colspan="2"><textarea name="multi_task" cols="40"><?php echo $app['multi_task']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="center">II Level of Professinalism </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Commitment to Excel (state if you are in Top 5,  Top 10, Below Top 10)</td>
    <td height="20" colspan="2"><textarea name="commit_excel" cols="40"><?php echo $app['commit_excel']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>B.</strong> Total Holidays Taken  /Unscheduled Holidays&nbsp; /Shorts / Lates</td>
    <td height="20" colspan="2"><input type="text" name="total_holidays" value="<?php echo $app['total_holidays']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>C.</strong> Ability to work without supervision</td>
    <td height="20" colspan="2"><textarea name="without_supervision" cols="40"><?php echo $app['without_supervision']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>D.</strong> Ability to meet commitments on delivery</td>
    <td height="20" colspan="2"><textarea name="meet_commit" cols="40"><?php echo $app['meet_commit']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="center">III Relationaship Management </div></th>
  </tr>
  <tr>
    <th colspan="3"><div align="left">1.Candidate relationship management </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A. </strong>Number of high value  relationships (Rs. 50 Lacs and above)</td>
    <td height="20" colspan="2"><textarea name="high_value" cols="40"><?php echo $app['high_value']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>B.</strong> Number of mid value  relationships (Rs. 20 Lacs to Rs. 50 Lacs)</td>
    <td height="20" colspan="2"><textarea name="mid_value" cols="40"><?php echo $app['mid_value']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><p><strong>C.</strong> Ability to leverage  relationships (state instances):</p></td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">i) Referencing Support </td>
    <td height="20" colspan="2"><textarea name="ref_support" cols="40"><?php echo $app['ref_support']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">ii) Business Development Opportunities Introduced </td>
    <td height="20" colspan="2"><textarea name="business_dev" cols="40"><?php echo $app['business_dev']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">iii) Others </td>
    <td height="20" colspan="2"><textarea name="others" cols="40"><?php echo $app['others']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="left">2.Client relationship management </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Relationship with Clients </td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">i) Feedback on Candidates/Quality of work </td>
    <td height="20" colspan="2"><textarea name="feedback_cand" cols="40"><?php echo $app['feedback_cand']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">ii) Transaction Flow </td>
    <td height="20" colspan="2"><textarea name="trans_flow" cols="40"><?php echo $app['trans_flow']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="left">3.Peer relationship management </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Relationship with Peers</td>
    <td height="20" colspan="2"><textarea name="rel_peers" cols="40"><?php echo $app['rel_peers']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>B</strong>. Knowledge sharing with  Peers</td>
    <td height="20" colspan="2"><textarea name="sharing_peers" cols="40"><?php echo $app['sharing_peers']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="center">IV Process Owner and Initiative </div></th>
  </tr>
  <tr>
    <th colspan="3"><div align="left">1. Initiative </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> Ability to take initiative  in making suggestions for process improvement &amp; employee welfare</td>
    <td height="20" colspan="2"><textarea name="take_initiative" cols="40"><?php echo $app['take_initiative']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>B.</strong> Self Initiated  Improvisation / Going over and above assigned task</td>
    <td height="20" colspan="2"><textarea name="self_initiative" cols="40"><?php echo $app['self_initiative']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="left">2. Process Owner </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A. </strong>Managing the process end-  to &ndash;end</td>
    <td height="20" colspan="2"><textarea name="manage_process" cols="40"><?php echo $app['manage_process']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3"><div align="center">V Leadership Capacity </div></th>
  </tr>
  <tr>
    <td height="20"><strong>A.</strong> &nbsp;Total  Team Closure as a % of cost</td>
    <td height="20" colspan="2"><input type="text" name="total_team_closure" value="<?php echo $app['total_team_closure']; ?>"/></td>
  </tr>
  <tr>
    <td height="20"><strong>B. Ability  to Build Team &ndash; </strong></td>
    <td height="20" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">i) Turn around new team members </td>
    <td height="20" colspan="2"><textarea name="new_team" cols="40"><?php echo $app['new_team']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20">ii) Retain team members </td>
    <td height="20" colspan="2"><textarea name="retain_team" cols="40"><?php echo $app['retain_team']; ?></textarea></td>
  </tr>
  <tr>
    <td height="20"><strong>C.</strong> &nbsp;&nbsp;Leadership  skills &ndash; state instances which exhibit the above trait</td>
    <td height="20" colspan="2"><textarea name="leadership" cols="40"><?php echo $app['leadership']; ?></textarea></td>
  </tr>
   <tr>
    <td height="20" colspan="2"><div align="right">
        <input type="submit" class="btn btn-primary" name="draft" value="Save As Draft" />
        </div></td>
    <td width="15%"><div align="right">
<input type="submit" class="btn btn-primary" name="submit" value="Submit" />';
	
    </div></td>
  </tr>
</table>

