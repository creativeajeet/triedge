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
<style type="text/css">
<!--
#cvsent {
	color: #990000;
	font-weight: bold;
}

.tab_container_can {
	border: 1px solid #999;
	border-top: none;
	clear: both;
	float: none;
	width: 100%px;
	font-size:14px;
	color:#243953;
	background-color:#fafafa;
	border: 1px solid #a9a9a9;
	-moz-border-radius: 5px;
    -webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	text-align:left;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	height: 100%;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	padding-top: 2px;
	padding-right: 5px;
	padding-bottom: 2px;
	padding-left: 5px;	
}
-->
</style>
	<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
.data table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
.data tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
.data th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
.data tr, .data td, .data th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/buttons.css" />
			<script type="text/javascript">
    var intTextLnki=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addLinkagesi() {
        intTextLnki = intTextLnki + 1;
       
        var contentID = document.getElementById("content-lnki");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","lnkText"+intTextLnki);
        newTBDiv.innerHTML = + intTextLnki + "<input type='text' id='linki[]" + intTextLnki + "' name='linki[]" + intTextLnki + "' style='width:300px; margin-left:5px;'><input type='button' onclick='removeLinkagesi()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeLinkagesi() {
        if(intTextLnki != 1&&current) {
            var contentID = document.getElementById("content-lnki");
            contentID.removeChild(current);
            intTextLnki = intTextLnki-1;
           
        }
    }
</script>
<script type="text/javascript">
    var intTextLnke=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addLinkagese() {
        intTextLnke = intTextLnke + 1;
       
        var contentID = document.getElementById("content-lnke");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","lnkText"+intTextLnke);
        newTBDiv.innerHTML = + intTextLnke + "<input type='text' id='linke[]" + intTextLnke + "' name='linke[]" + intTextLnke + "' style='width:280px; margin-left:5px;'><input type='button' onclick='removeLinkagese()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeLinkagese() {
        if(intTextLnke != 1&&current) {
            var contentID = document.getElementById("content-lnke");
            contentID.removeChild(current);
            intTextLnke = intTextLnke-1;
           
        }
    }
</script>
<script type="text/javascript">
    var intTextKey=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addElementKey() {
        intTextKey = intTextKey + 1;
       
        var contentID = document.getElementById("content-key");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","strText"+intTextKey);
        newTBDiv.innerHTML = + intTextKey + "<input type='text' id='keysell[]" + intTextKey + "' name='keysell[]" + intTextKey + "' style='width:300px; margin-left:5px;'><input type='button' onclick='removeElementKey()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeElementKey() {
        if(intTextKey != 1&&current) {
            var contentID = document.getElementById("content-key");
            contentID.removeChild(current);
            intTextKey = intTextKey-1;
           
        }
    }
</script>
<script type="text/javascript">
    var intTextCheck=1;
  
       var current;

    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addElementCheck() {
        intTextCheck = intTextCheck + 1;
       
        var contentID = document.getElementById("content-check");
        var newTBDiv = document.createElement("div");
        newTBDiv.onclick=function(){ current=this; }
        newTBDiv.setAttribute("id","strText"+intTextCheck);
        newTBDiv.innerHTML = + intTextCheck + "<input type='text' id='keyeva[]" + intTextCheck + "' name='keyeva[]" + intTextCheck + "' style='width:300px; margin-left:5px;'><input type='button' onclick='removeElementCheck()' value='X'><br/>";
        contentID.appendChild(newTBDiv);
    }

    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeElementCheck() {
        if(intTextCheck != 1&&current) {
            var contentID = document.getElementById("content-check");
            contentID.removeChild(current);
            intTextCheck = intTextCheck-1;
           
        }
    }
</script>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>




    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
		<script type="text/javascript">
$('.datepicker').datepicker();
</script>
<script type="text/javascript">
			$(document).ready(function(){
				
				//	-- Datepicker
				$(".datepickeqr").datepicker({
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

<script>
	$(function() {
		$( "#tab" ).tabs({selected: 0}); 
	});
	</script>
	<script>
	$(function() {
		$( "#tabs" ).tabs(); 
	});
	</script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/checkboxdrop/jquery.multiselect.filter.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/checkboxdrop/jquery.multiselect.filter.js"></script>
<script type="text/javascript">
$(function(){
	$("#worksheetcomp").multiselect().multiselectfilter();
});
</script>
<script type="text/javascript">
$(function(){
	$("#othercomp").multiselect().multiselectfilter();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#worksheetcomp").change(function(){
 
        if ($(this).val() == "0" ) {
 
            $("#hide1").slideDown("fast"); //Slide Down Effect
 
        } else {
 
            $("#hide1").slideUp("fast");    //Slide Up Effect
 
        }
    });
 
    $("#othercomp").change(function(){
 
        if ($(this).val() == "0" ) {
 
            $("#hide2").slideDown("fast"); //Slide Down Effect
 
        } else {
 
            $("#hide2").slideUp("fast");    //Slide Up Effect
 
        }
    });
});
</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.hide {
    display:none;
}

-->
</style>
	<?php 
	$class = $this->uri->segment(3);
	$pid = $this->uri->segment(4);
	$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
		  ?>
	

<div class="tab_container_can">
<?php echo $detail['pof_no']; ?> | <b><?php echo $detail['jobtitle']; ?></b> | <b>Grade</b>- <?php echo $detail['grade']; ?> | <b>Designation</b>- <?php echo $detail['designation']; ?> | <b>Compensation Band</b>- <?php echo $detail['sal_f']." - ".$detail['sal_t']; ?> <br/>
<b>Allocated To </b>- <?php echo $detail['consuls']; ?> | <b>Hiring Manager</b> - <?php echo $detail['hrmanager']; ?> | <b>Client Manager</b> - <?php echo $detail['username']; ?> 

</div>
<div id="tab">
<ul>
		<li><a href="#tab-1">Position Page</a></li>
		<li><a href="#tab-2">Pof</a></li>
		<li class="defaulttab"><a href="#tab-3">VC</a></li>
		<li><a href="#tab-4">Search Strategy</a></li>
</ul>
	<div id="tab-1">
	<h2>Position Page</h2>
	<div style="margin-top:-50px;"><?php $atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$detail['file_to_view'])
 {
  echo "";
   }
 else
  {
  echo    "<div align='right'>".anchor_popup('pof/admin/viewJD/'.$pid, img($cv_image), $atts).anchor_popup('pof/admin/viewJD/'.$pid, 'Show JD', $atts)."</div>";
  } ?>
  <?php if($user['group']==2) { echo '<div align="right" style="margin-right:80px; margin-top:-18px; margin-bottom:20px;">'.anchor_popup('pof/admin/allocation_history/'.$pid,'Allocation History',array('class'=>'icon_alloc')).'</div></td>'; } else { echo ""; } ?> 
  </div> 
	<table width="1295">
  <tr>
    <td width="700" scope="col">	
	<div align="left"><a href="<?php echo base_url().'index.php/pof/admin/posPage/'.$pid; ?>" class='green-button pcb'><span>Pos Databank</span></a><div align="center" style="width:80px;"><?php echo anchor('pof/admin/posPage/'.$pid, $master); ?></div></div><div align="left" style="margin-left:120px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/conShort/'.$pid; ?>" class='green-button pcb'><span>Consultant SL</span></a><div align="center" style="width:100px;"><?php echo anchor('pof/admin/conShort/'.$pid, $shortlisted); ?></div><div align="left" style="margin-left:120px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/conHold/'.$pid; ?>" class='green-button pcb'><span>Consultant Hold </span></a><div align="center" style="width:100px;"><?php echo anchor('pof/admin/conHold/'.$pid, $onhold); ?></div><div align="left" style="margin-left:135px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/conRej/'.$pid; ?>" class='green-button pcb'><span>Consultant Rej </span></a><div align="center" style="width:100px;"><?php echo anchor('pof/admin/conRej/'.$pid, $rejected); ?></div><div align="left" style="margin-left:125px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/refPool/'.$pid; ?>" class='green-button pcb'><span>Ref. Pool </span></a><div align="center" style="width:70px;"><?php echo anchor('pof/admin/refPool/'.$pid, $refpool); ?></div></div></div></div></div>
	<br/>
	
	<div align="left"><a href="<?php echo base_url().'index.php/pof/admin/cvSent/'.$pid; ?>" class='green-button pcb'><span>CV sent </span></a><div align="center" style="width:60px;"><?php echo anchor('pof/admin/cvSent/'.$pid, $cvsent); ?></div></div><div align="left" style="margin-left:80px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/clientRej/'.$pid; ?>" class='green-button pcb'><span>Client CV Reject </span></a><div align="center" style="width:110px;"><?php echo anchor('pof/admin/clientRej/'.$pid, $clientrejected); ?></div><div align="left" style="margin-left:135px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/cvduplicate/'.$pid; ?>" class='green-button pcb'><span>Duplicate </span></a><div align="center" style="width:60px;"><?php echo anchor('pof/admin/cvduplicate/'.$pid, $cvduplicate); ?></div><div align="left" style="margin-left:90px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/clientShort/'.$pid; ?>" class='green-button pcb'><span>Client Interview Shortlist </span></a><div align="center" style="width:160px;"><?php echo anchor('pof/admin/clientShort/'.$pid, $clientshortlisted); ?></div></div></div></div>
	<br/>
	<div align="left">
	<div id="shorlisted" align="left"><a href="<?php echo base_url().'index.php/pof/admin/finalround/'.$pid; ?>" class='green-button pcb'><span>Final Round</span></a><div align="center" style="width:80px;"><?php echo anchor('pof/admin/finalround/'.$pid, $finalround); ?></div></div>
	
	<div align="left" style="margin-left:110px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/candOffer/'.$pid; ?>" class='green-button pcb'><span>Candidate Offer </span></a><div align="center" style="width:100px;"><?php echo anchor('pof/admin/candOffer/'.$pid, $candoffer); ?></div> <div align="left" style="margin-left:135px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/posclosed/'.$pid; ?>" class='green-button pcb'><span>Closed</span></a><div align="center" style="width:50px;"><?php echo anchor('pof/admin/posclosed/'.$pid, $posclosed); ?></div><div align="left" style="margin-left:80px; margin-top:-42px;"><a href="<?php echo base_url().'index.php/pof/admin/candjoined/'.$pid; ?>" class='green-button pcb'><span>Joined</span></a><div align="center" style="width:50px;"><?php echo anchor('pof/admin/candjoined/'.$pid, $candjoined); ?></div></div></div></div>
	</div>
	</td>
    <td scope="col"><?php
 if (count($poscomments)){ 
 echo "<table class='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Comments</th>\n";
	
		echo "<th>On</th>\n";
			echo "<th>By</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($poscomments as $row){
 
echo "<tr valign='top'>\n";

 echo    "<td>$row->msg</td>";
 echo    "<td>$row->date</td>";
 echo    "<td>$row->username</td>";
 echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No comments found'; 
 } 
 ?></td>
  </tr>
</table>
	<br/>
	<h2>Candidates from Position Databank</h2>
	<?php echo form_open('pof/admin/excel/'.$pid); ?>
	 <div align="right">
	 <div  class="btn" align="right"><i class="icon-edit"></i>                
	<?php echo anchor('pof/admin/posPageEdit/'.$pid.'/'.$page, 'Edit'); ?>
</div>
      <input type="submit" class="btn btn-primary" name="change" value="Export Excel" />
    </div>
	<?php echo form_close(); ?>
	<div id="show">
	<?php echo form_open('pof/admin/foldera/'.$class.'/'.$pid.'/'.$page); ?>
<?php
 if (count($position_databank)){ 
 echo "<table class='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th></th>\n";
	

		echo "<th>Name</th>\n";
		echo "<th>Current Co.</th>\n";
		echo "<th>Job Title</th>\n";
		echo "<th>Email</th>\n";
		echo "<th>Designation</th>\n";
		echo "<th><div align='center'>Telephone</div></th>\n";
		echo "<th>Current Loc.</th>\n";
		echo "<th>Course</th>\n";
		echo "<th>Institute</th>\n";
	    echo "<th><div align='center'>Passing Year</div></th>\n";
		echo "<th>Change Stage</th>\n";
		echo "<th><div align='center'>CV</div></th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($position_databank as $row){
 
echo "<tr valign='top'>\n";
  echo    "<td><input class='case' name='c_id[]' value='".$row->cid."' type='checkbox'></td>";
  $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->cid, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 echo    "<td>$row->candidate_name</td>";
 echo    "<td>$row->current_company</td>";
 echo    "<td>$row->job_title</td>";
 echo    "<td>$row->email</td>";
 echo    "<td>$row->designation</td>";
 echo    "<td><div align='center'>$row->telephone</div></td>";
 echo    "<td>$row->current_location</td>";
 echo    "<td>$row->course</td>";
  echo    "<td>$row->institute</td>";
 echo    "<td><div align='center'>$row->year_of_passing</div></td>";
 $array = array('databank'=>'Pos Databank','short'=>'Shortlist','hold'=>'On Hold','reject'=>'Reject','pool'=>'Ref Pool','cvsent'=>'CV Sent');
 $array1 = array('cvsent'=>'CV Sent','client_reject'=>'Client CV Reject','interview_shortlist'=>'Client Interview Shortlist','offer'=>'Candidate Offer');
if($row->segment_type_id=='5')
   {
    echo '<td bgcolor="#CCCCFF">'.$row->segment_name.'</td>';
   }
   else
   {
 echo    '<td>'.form_hidden("s_id[]",$row->s_id).form_dropdown('stage[]',$candstagespre+array('288'=>'CV Sent'), set_value('stage',$row->stage)).'</td>';
 }
$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$row->file_to_view)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/viewcv/'.$row->cid, img($cv_image), $atts)."</div></td>";
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
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $master; ?></b></p>

</div>
 <?php echo $links; ?>
    <div align="right">
	<?php if(($this->session->userdata('id'))==39): ?>
	<input type="submit" class="btn btn-small btn-inverse" name="deletepos" value="Delete" />
	<?php endif; ?>
      <input type="submit" class="btn btn-primary" name="change" value="Save Changes" />
    </div>
	<div>					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered green">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									
								</h3>
							</div>
						  <div class="box-content nopadding">
							  <table width="100%" class="data">
  <tr>
    <td width="16%">Send to Mapping Sheet</td>
    <td width="12%"><select name="folder_name" id="folder_name" style="width:143px;">
	<option value=""></option>
     <?php
	

             foreach ($folder as $key => $list) {

                echo "<option value='".$list['p_id']."'>" . $list['p_id'] . "</option>". "\n";

              }
			 
            ?>
    </select></td>
    <td width="9%"><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
    <td width="19%">or New Mapping Sheet</td>
    <td width="17%"><input name="newfolder" id="newfolder" type="text" size="20"/></td>
    <td width="12%">Sheet Option</td>
    <td width="11%"><select name="sheetopt" id="select3" style="width:150px;">
      <option value="0"></option>
      <option value="405">Personal</option>
      <option value="406">All</option>
    </select></td>
    <td width="4%"><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td>Send To Position</td>
    <td colspan="6"><?php 
	                if($userpos['group']!=3)
                      {
					  echo form_dropdown("pofid",$positions2,"","id='id', style='width:450px;'");
					  }
					  else{
					   echo form_dropdown("pofid",$positions,"","id='id', style='width:450px;'");
					  }
					  ?></td>
    <td><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td>Refer To </td>
    <td colspan="6"><?php echo form_dropdown("userid",$user,"","id='id', style='width:250px;'");?></td>
    <td><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td>Send to My Worksheet </td>
    <td colspan="6"><?php echo form_dropdown("myworksheet",array('0'=>'')+$worksheet,"","id='id', style='width:250px;'");?></td>
    <td><button type="submit" class="btn btn-primary" class="btn btn-primary">Go</button></td>
  </tr>
  <tr>
    <td colspan="8"><strong>Add to Worksheet </strong></td>
    </tr>
  <tr>
    <td colspan="8"><div id="country" style="width:200px;float:left;">Segment Type<br/>
           <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypesid', style='width:180px; height:150px;'");
    ?>
        </div>      
	 <div id="masterworksheetsend">Part of Master Worksheet<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px; '",'disabled');
    ?> 
    </div>
  
   
    <script type="text/javascript">
	  	$("#segmenttypesid").click(function(){
	    		 if( $('#segmenttypesid :selected').length > 0){
        //build an array of selected values
        var segmenttypesid= $("#segmenttypesid").val();

        $('#segmenttypesid :selected').each(function(i, selected) {
            segmenttypesid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_masterworksheettosend')?>",
							data: {'segmenttypesid':segmenttypesid},
							success: function(msg){
								$('#masterworksheetsend').html(msg);
							}
				  	});
	    		}
	    });
	   </script>	 </td>
    </tr>
	<tr>
    <td colspan="7">&nbsp;</td>
    <td><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
  </tr>
</table>
						  </div>
						</div>
					</div>
				</div>
</div>
<?php echo form_close(); ?>
	</div> 
	<div id="tab-2">
	<?php $page = $this->uri->segment(3); ?>
	<?php print form_open_multipart('pof/admin/editPof/'.$pid.'/'.$page);?>
<table width="1237">
  <tr>
  <td colspan="14" scope="col"><h2 align="left">Position Order Form</h2><div style="margin-top:-50px;"><?php $atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 if(!$detail['file_to_view'])
 {
  echo "";
   }
 else
  {
  echo    "<div align='right'>".anchor_popup('pof/admin/viewJD/'.$pid, img($cv_image), $atts).anchor_popup('pof/admin/viewJD/'.$pid, 'Show JD', $atts)."</div>";
  } ?>
  <?php if($user['group']==2) { echo '<div align="right" style="margin-right:80px; margin-top:-18px; margin-bottom:20px;">'.anchor_popup('pof/admin/allocation_history/'.$pid,'Allocation History',array('class'=>'icon_alloc')).'</div></td>'; } else { echo ""; } ?> 
  </div> </tr>
  
  
  <tr>
    <td width="48" height="40">Client</td>
    <td colspan="3"><?php echo form_dropdown('client_id', array('0' => '')+$clients, set_value('id', $detail['client_id'])); ?></td>
    <td width="62">Job TItle </td>
    <td width="208"><input name="jobtitle" type="text" size="25" value="<?php echo $detail['jobtitle']; ?>"/></td>
    <td width="74">Department</td>
    <td width="281"><input name="department" type="text" size="15" value="<?php echo $detail['department']; ?>"/></td>
    <td width="281"></td>
  </tr>
  <tr>
    <td height="34">TL</td>
    <td width="29"><div align="left">
      <input type="checkbox" name="tl" value="1" <?php if($detail['tl']==1){ echo 'checked="checked"'; }?>/>
    </div></td>
    <td width="87">Generic Role </td>
    <td width="133"><input name="generic_role" type="text" size="15" value="<?php echo $detail['generic_role']; ?>"/></td>
    <td>Job Type</td>
    <td colspan="4"><select name="job_type">
      <option value="full" <?php if($detail['job_type']=='full'){ echo 'selected="selected"'; }?>>Full Time</option>
      <option value="part" <?php if($detail['job_type']=='part'){ echo 'selected="selected"'; }?>>Part Time</option>
	  <option value="flexi" <?php if($detail['job_type']=='flexi'){ echo 'selected="selected"'; }?>>Flexi</option>
      <option value="consultant" <?php if($detail['job_type']=='consultant'){ echo 'selected="selected"'; }?>>Consultant</option>
    </select></td>
    <td width="1">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="14">Worksheet Grid 
	<h2></h2><table width="1237">
  
  

 <tr>
    <td colspan="8"><div id="country" style="width:160px;float:left;">Segment Type<br/>
             <?php
    	echo form_multiselect("segment_type[]",$segmenttype,"","id='segmenttypepid', style='width:150px; height:150px; background-color:#CCCCCC'");
    ?>
      </div>
        <div id="masterworksheettopull">Part of Master Worksheet<br/>
            <?php
    	echo form_dropdown("id",array('Select'=>'Select Master Worksheet'),'',"style='width:235px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div>
      <script type="text/javascript">
	  	$("#segmenttypepid").click(function(){
	    		 if( $('#segmenttypepid :selected').length > 0){
        //build an array of selected values
        var segmenttypepid= $("#segmenttypepid").val();

        $('#segmenttypepid :selected').each(function(i, selected) {
            segmenttypepid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('worksheet/admin/select_masterworksheettopull')?>",
							data: {'segmenttypepid':segmenttypepid},
							success: function(msg){
								$('#masterworksheettopull').html(msg);
							}
				  	});
	    		}
	    });
	   </script> </td>
	   </tr>
	   <tr>
	   <td colspan="8"><strong>
      <?php   foreach ($worksheet as $row){ echo $row->worksheet_name.anchor('pof/admin/deleteworksheet/'.$row->pof_id."/".$row->w_id,'delete')."&nbsp"."&nbsp"; } ?>
    </strong></td>
  </tr>
   
  
</table>
<h2></h2></td>
  </tr>
  
  <tr>
    <td colspan="14">
	<table width="1000" id="table2">
      <tr bgcolor="#000033">
        <th width="150" height="3" rowspan="2" bgcolor="#000000"><div align="center" class="style1"> Location </div></th>
        <th width="71" rowspan="2" bgcolor="#000000"><div align="center" class="style1">No. of Pos </div></th>
        <th width="71" rowspan="2" bgcolor="#000000"><div align="center" class="style1"> Grade </div></th>
        <th width="132" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        <th width="60" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Level</div></th>
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Exp. Range </div></th>
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Salary Range </div></th>
        <th width="134" bgcolor="#000000"><div align="center" class="style1">Reports To </div></th>
        <th width="80" bgcolor="#000000"><div align="center" class="style1">Reports To </div></th>
        <td width="49" rowspan="2" bgcolor="#FFFFFF"><div align="center"><!--<img src="/*?php echo base_url()?>assets/icons/add.png" class="cloneTableRows" />--></div></td>
      </tr>
      <tr bgcolor="#000033">
        <th width="43" bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th width="45" bgcolor="#000000"><div align="center" class="style1">to</div></th>
        <th width="47" bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th width="42" bgcolor="#000000"><div align="center" class="style1">to</div></th>
        <th width="134" bgcolor="#000000"><div align="center" class="style1">(Name)</div></th>
        <th width="80" bgcolor="#000000"><div align="center" class="style1">(Level)</div></th>
      </tr>
      <tr height="20">
        <td style="padding-top:5px;"><div align="center"><?php echo form_dropdown('location', array('0' => '')+$locations, set_value('id', $detail['location']),"style='width:150px;'"); ?></div></td>
        <td><div align="center">
          <input name="no_of_pos" type="text" size="5" value="<?php echo $detail['no_of_pos']; ?>" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <?php
    	echo form_dropdown("grade",array(''=>'')+$grade,set_value('grade', $detail['grade']),"id='grade', style='width:100px;  background-color:#CCCCCC'",'disabled');
    ?>
        </div></td>
        <td><div align="center">
          <input name="designation" type="text" size="15" value="<?php echo $detail['designation']; ?>" style="width:100px;"/>
        </div></td>
        <td> <div align="center">
           <?php
    	echo form_dropdown("level",array(''=>'')+$level,set_value('level', $detail['level']),"id='level', style='width:150px;  background-color:#CCCCCC'",'disabled');
    ?>
</div></td>
        <td><div align="center">
           <select name="exp_f" style="width:50px;">
		   <option value=""></option>
           <option value="0">0</option>
           <option value="1" <?php if($detail['exp_f']==1){ echo 'selected="selected"'; }?>>1</option>
           <option value="2" <?php if($detail['exp_f']==2){ echo 'selected="selected"'; }?>>2</option>
           <option value="3" <?php if($detail['exp_f']==3){ echo 'selected="selected"'; }?>>3</option>
           <option value="4" <?php if($detail['exp_f']==4){ echo 'selected="selected"'; }?>>4</option>
           <option value="5" <?php if($detail['exp_f']==5){ echo 'selected="selected"'; }?>>5</option>
           <option value="6" <?php if($detail['exp_f']==6){ echo 'selected="selected"'; }?>>6</option>
           <option value="7" <?php if($detail['exp_f']==7){ echo 'selected="selected"'; }?>>7</option>
           <option value="8" <?php if($detail['exp_f']==8){ echo 'selected="selected"'; }?>>8</option>
           <option value="9" <?php if($detail['exp_f']==9){ echo 'selected="selected"'; }?>>9</option>
           <option value="10" <?php if($detail['exp_f']==10){ echo 'selected="selected"'; }?>>10</option>
           <option value="11" <?php if($detail['exp_f']==11){ echo 'selected="selected"'; }?>>11</option>
           <option value="12" <?php if($detail['exp_f']==12){ echo 'selected="selected"'; }?>>12</option>
           <option value="13" <?php if($detail['exp_f']==13){ echo 'selected="selected"'; }?>>13</option>
           <option value="14" <?php if($detail['exp_f']==14){ echo 'selected="selected"'; }?>>14</option>
           <option value="15" <?php if($detail['exp_f']==15){ echo 'selected="selected"'; }?>>15</option>
           <option value="16" <?php if($detail['exp_f']==16){ echo 'selected="selected"'; }?>>16</option>
           <option value="17" <?php if($detail['exp_f']==17){ echo 'selected="selected"'; }?>>17</option>
           <option value="18" <?php if($detail['exp_f']==18){ echo 'selected="selected"'; }?>>18</option>
           <option value="19" <?php if($detail['exp_f']==19){ echo 'selected="selected"'; }?>>19</option>
           <option value="20" <?php if($detail['exp_f']==20){ echo 'selected="selected"'; }?>>20</option>
           <option value="21" <?php if($detail['exp_f']==21){ echo 'selected="selected"'; }?>>21</option>
           <option value="22" <?php if($detail['exp_f']==22){ echo 'selected="selected"'; }?>>22</option>
           <option value="23" <?php if($detail['exp_f']==23){ echo 'selected="selected"'; }?>>23</option>
           <option value="24" <?php if($detail['exp_f']==24){ echo 'selected="selected"'; }?>>24</option>
           <option value="25" <?php if($detail['exp_f']==25){ echo 'selected="selected"'; }?>>25</option>
           </select>
        </div></td>
        <td><div align="center">
          <select name="exp_t" style="width:50px;">
		  <option value=""></option>
           <option value="0">0</option>
           <option value="1" <?php if($detail['exp_t']==1){ echo 'selected="selected"'; }?>>1</option>
           <option value="2" <?php if($detail['exp_t']==2){ echo 'selected="selected"'; }?>>2</option>
           <option value="3" <?php if($detail['exp_t']==3){ echo 'selected="selected"'; }?>>3</option>
           <option value="4" <?php if($detail['exp_t']==4){ echo 'selected="selected"'; }?>>4</option>
           <option value="5" <?php if($detail['exp_t']==5){ echo 'selected="selected"'; }?>>5</option>
           <option value="6" <?php if($detail['exp_t']==6){ echo 'selected="selected"'; }?>>6</option>
           <option value="7" <?php if($detail['exp_t']==7){ echo 'selected="selected"'; }?>>7</option>
           <option value="8" <?php if($detail['exp_t']==8){ echo 'selected="selected"'; }?>>8</option>
           <option value="9" <?php if($detail['exp_t']==9){ echo 'selected="selected"'; }?>>9</option>
           <option value="10" <?php if($detail['exp_t']==10){ echo 'selected="selected"'; }?>>10</option>
           <option value="11" <?php if($detail['exp_t']==11){ echo 'selected="selected"'; }?>>11</option>
           <option value="12" <?php if($detail['exp_t']==12){ echo 'selected="selected"'; }?>>12</option>
           <option value="13" <?php if($detail['exp_t']==13){ echo 'selected="selected"'; }?>>13</option>
           <option value="14" <?php if($detail['exp_t']==14){ echo 'selected="selected"'; }?>>14</option>
           <option value="15" <?php if($detail['exp_t']==15){ echo 'selected="selected"'; }?>>15</option>
           <option value="16" <?php if($detail['exp_t']==16){ echo 'selected="selected"'; }?>>16</option>
           <option value="17" <?php if($detail['exp_t']==17){ echo 'selected="selected"'; }?>>17</option>
           <option value="18" <?php if($detail['exp_t']==18){ echo 'selected="selected"'; }?>>18</option>
           <option value="19" <?php if($detail['exp_t']==19){ echo 'selected="selected"'; }?>>19</option>
           <option value="20" <?php if($detail['exp_t']==20){ echo 'selected="selected"'; }?>>20</option>
           <option value="21" <?php if($detail['exp_t']==21){ echo 'selected="selected"'; }?>>21</option>
           <option value="22" <?php if($detail['exp_t']==22){ echo 'selected="selected"'; }?>>22</option>
           <option value="23" <?php if($detail['exp_t']==23){ echo 'selected="selected"'; }?>>23</option>
           <option value="24" <?php if($detail['exp_t']==24){ echo 'selected="selected"'; }?>>24</option>
           <option value="25" <?php if($detail['exp_t']==25){ echo 'selected="selected"'; }?>>25</option>
           </select>
        </div></td>
        <td><div align="center">
          <input name="sal_f" type="text" size="2" value="<?php echo $detail['sal_f']; ?>" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <input name="sal_t" type="text" size="2" value="<?php echo $detail['sal_t']; ?>" style="width:50px;"/>
        </div></td>
        <td><div align="center">
          <input name="reports_to_name" type="text" size="15" value="<?php echo $detail['reports_to_name']; ?>"/>
        </div></td>
        <td><div align="center">
          <input name="reports_to_level" type="text" size="5" value="<?php echo $detail['reports_to_level']; ?>"/>
        </div></td>
        <td></td>
      </tr>
    </table>
	<h2></h2></td>
  </tr>
  <tr>
    <td colspan="14"><table width="774" id="table3">
      <tr bgcolor="#000033">
        <th width="143" height="3" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Edu Level </div></th>
        <th colspan="2" bgcolor="#000000"><div align="center" class="style1">Batch</div></th>
        <th rowspan="2" bgcolor="#000000"><div align="center" class="style1">Degree/Course</div></th>
        <th width="137" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Subject</div></th>
        <th width="142" rowspan="2" bgcolor="#000000"><div align="center" class="style1">Institute Pref.  </div></th>
        <td width="53" rowspan="2" bgcolor="#FFFFFF"><div align="center"><!--<img src="?php echo base_url()?>assets/icons/add.png" class="cloneTableRows" />--></div></td>
      </tr>
      <tr bgcolor="#000033">
        <th bgcolor="#000000"><div align="center" class="style1">from</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">to</div></th>
      </tr>
      
      <tr height="20">
        <td style="padding-top:5px;"><div align="center">
          <select name="edu_level" style="width:100px;">
      <option value=""></option>
     <option value="pg" <?php if($detail['edu_level']=="pg"){ echo 'selected="selected"'; }?>>PG</option>
	 <option value="ug" <?php if($detail['edu_level']=="ug"){ echo 'selected="selected"'; }?>>UG</option>
	    </select>
        </div></td>
        <td width="69"><div align="center">
          <select name="batch_f">
            <option value=""></option>
            <option value="2012" <?php if($detail['batch_f']==2012){ echo 'selected="selected"'; }?>>2012</option>
            <option value="2011" <?php if($detail['batch_f']==2011){ echo 'selected="selected"'; }?>>2011</option>
            <option value="2010" <?php if($detail['batch_f']==2010){ echo 'selected="selected"'; }?>>2010</option>
            <option value="2009" <?php if($detail['batch_f']==2009){ echo 'selected="selected"'; }?>>2009</option>
            <option value="2008" <?php if($detail['batch_f']==2008){ echo 'selected="selected"'; }?>>2008</option>
            <option value="2007" <?php if($detail['batch_f']==2007){ echo 'selected="selected"'; }?>>2007</option>
            <option value="2006" <?php if($detail['batch_f']==2006){ echo 'selected="selected"'; }?>>2006</option>
            <option value="2005" <?php if($detail['batch_f']==2005){ echo 'selected="selected"'; }?>>2005</option>

            <option value="2004" <?php if($detail['batch_f']==2004){ echo 'selected="selected"'; }?>>2004</option>
            <option value="2003" <?php if($detail['batch_f']==2003){ echo 'selected="selected"'; }?>>2003</option>
            <option value="2002" <?php if($detail['batch_f']==2002){ echo 'selected="selected"'; }?>>2002</option>
            <option value="2001" <?php if($detail['batch_f']==2001){ echo 'selected="selected"'; }?>>2001</option>
            <option value="2000" <?php if($detail['batch_f']==2000){ echo 'selected="selected"'; }?>>2000</option>
            <option value="1999" <?php if($detail['batch_f']==1999){ echo 'selected="selected"'; }?>>1999</option>
            <option value="1998" <?php if($detail['batch_f']==1998){ echo 'selected="selected"'; }?>>1998</option>
            <option value="1997" <?php if($detail['batch_f']==1997){ echo 'selected="selected"'; }?>>1997</option>
            <option value="1996" <?php if($detail['batch_f']==1996){ echo 'selected="selected"'; }?>>1996</option>
            <option value="1995" <?php if($detail['batch_f']==1995){ echo 'selected="selected"'; }?>>1995</option>
            <option value="1994" <?php if($detail['batch_f']==1994){ echo 'selected="selected"'; }?>>1994</option>
            <option value="1993" <?php if($detail['batch_f']==1993){ echo 'selected="selected"'; }?>>1993</option>
            <option value="1992" <?php if($detail['batch_f']==1992){ echo 'selected="selected"'; }?>>1992</option>
            <option value="1991" <?php if($detail['batch_f']==1991){ echo 'selected="selected"'; }?>>1991</option>
            <option value="1990" <?php if($detail['batch_f']==1990){ echo 'selected="selected"'; }?>>1990</option>
            <option value="1989" <?php if($detail['batch_f']==1989){ echo 'selected="selected"'; }?>>1989</option>
            <option value="1988" <?php if($detail['batch_f']==1988){ echo 'selected="selected"'; }?>>1988</option>
            <option value="1987" <?php if($detail['batch_f']==1987){ echo 'selected="selected"'; }?>>1987</option>
            <option value="1986" <?php if($detail['batch_f']==1986){ echo 'selected="selected"'; }?>>1986</option>
            <option value="1985" <?php if($detail['batch_f']==1985){ echo 'selected="selected"'; }?>>1985</option>
          </select>
        </div></td>
        <td width="68"><div align="center">
          <select name="batch_t">
		    <option value=""></option>
            <option value="2012" <?php if($detail['batch_t']==2012){ echo 'selected="selected"'; }?>>2012</option>
            <option value="2011" <?php if($detail['batch_t']==2011){ echo 'selected="selected"'; }?>>2011</option>
            <option value="2010" <?php if($detail['batch_t']==2010){ echo 'selected="selected"'; }?>>2010</option>
            <option value="2009" <?php if($detail['batch_t']==2009){ echo 'selected="selected"'; }?>>2009</option>
            <option value="2008" <?php if($detail['batch_t']==2008){ echo 'selected="selected"'; }?>>2008</option>
            <option value="2007" <?php if($detail['batch_t']==2007){ echo 'selected="selected"'; }?>>2007</option>
            <option value="2006" <?php if($detail['batch_t']==2006){ echo 'selected="selected"'; }?>>2006</option>
            <option value="2005" <?php if($detail['batch_t']==2005){ echo 'selected="selected"'; }?>>2005</option>
            <option value="2004" <?php if($detail['batch_t']==2004){ echo 'selected="selected"'; }?>>2004</option>
            <option value="2003" <?php if($detail['batch_t']==2003){ echo 'selected="selected"'; }?>>2003</option>
            <option value="2002" <?php if($detail['batch_t']==2002){ echo 'selected="selected"'; }?>>2002</option>
            <option value="2001" <?php if($detail['batch_t']==2001){ echo 'selected="selected"'; }?>>2001</option>
            <option value="2000" <?php if($detail['batch_t']==2000){ echo 'selected="selected"'; }?>>2000</option>
            <option value="1999" <?php if($detail['batch_t']==1999){ echo 'selected="selected"'; }?>>1999</option>
            <option value="1998" <?php if($detail['batch_t']==1998){ echo 'selected="selected"'; }?>>1998</option>
            <option value="1997" <?php if($detail['batch_t']==1997){ echo 'selected="selected"'; }?>>1997</option>
            <option value="1996" <?php if($detail['batch_t']==1996){ echo 'selected="selected"'; }?>>1996</option>
            <option value="1995" <?php if($detail['batch_t']==1995){ echo 'selected="selected"'; }?>>1995</option>
            <option value="1994" <?php if($detail['batch_t']==1994){ echo 'selected="selected"'; }?>>1994</option>
            <option value="1993" <?php if($detail['batch_t']==1993){ echo 'selected="selected"'; }?>>1993</option>
            <option value="1992" <?php if($detail['batch_t']==1992){ echo 'selected="selected"'; }?>>1992</option>
            <option value="1991" <?php if($detail['batch_t']==1991){ echo 'selected="selected"'; }?>>1991</option>
            <option value="1990" <?php if($detail['batch_t']==1990){ echo 'selected="selected"'; }?>>1990</option>
            <option value="1989" <?php if($detail['batch_t']==1989){ echo 'selected="selected"'; }?>>1989</option>
            <option value="1988" <?php if($detail['batch_t']==1988){ echo 'selected="selected"'; }?>>1988</option>
            <option value="1987" <?php if($detail['batch_t']==1987){ echo 'selected="selected"'; }?>>1987</option>
            <option value="1986" <?php if($detail['batch_t']==1986){ echo 'selected="selected"'; }?>>1986</option>
            <option value="1985" <?php if($detail['batch_t']==1985){ echo 'selected="selected"'; }?>>1985</option>
          </select>
        </div></td>
        <td width="130"><div align="center">
          <input name="degree" type="text" size="15" value="<?php echo $detail['degree']; ?>"/>
        </div></td>
        <td><div align="center">
            <input name="subject" type="text" size="15" value="<?php echo $detail['subject']; ?>"/>
        </div></td>
        <td><div align="center">
            <input name="institute_pref" type="text" size="15" value="<?php echo $detail['institute_pref']; ?>" />
        </div></td>
        <td></td>
      </tr>
    </table>
    <h2></h2></td>
  </tr>
  <tr>
    <td colspan="14"><table width="774"><tr><td><div id="tabs">
<ul>
		<li><a href="#tabs-1">Job Description</a></li>
		<li><a href="#tabs-2">Candidate Specification</a></li>
		<li><a href="#tabs-3">Attachments</a></li>
	</ul>

			<div id="tabs-1"><textarea name="jd" cols="100"><?php echo $detail['jd']; ?></textarea>
			</div><div id="tabs-2">
			  <textarea name="candidate_specs" cols="100"><?php echo $detail['candidate_specs']; ?></textarea>
	</div><div id="tabs-3"><input name="userfile" type="file" /><input name="go" type="submit" class="btn btn-primary" value="Upload" /><table width="100%">
  <tr>
    <td colspan="2" scope="col"><?php foreach ($attachment as $key => $test): ?><input type="checkbox" name="chk" id="<?php echo $test['id'];?>" value="<?php echo $test['id'];?>" onClick="SingleSelect('chk',this);" />     <?php $atts = array(
              'width'      => '800',
              'height'     => '450',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			echo $test['filename'].anchor_popup('pof/admin/viewattachment/'.$test['id'], 'view', $atts); ?>   <?php endforeach; ?></td>
			<td><input type="submit" class="btn btn-primary" name="delJD" value="Delete" /></td>
  </tr>
  <tr>  </tr>
</table></div></div></td></tr></table></td>
  </tr>
</table>
<h2>Admin Details</h2>
<table width="847">
  <tr>
    <td width="151" height="36" scope="col">Position Taken By </td>
    <td width="157" scope="col"><?php echo form_dropdown("pos_taken_by",array('0' => '')+$users,set_value('id', $detail['pos_taken_by']),"id='id', style='width:150px; background-color:#CCCCCC'");?></td>
    <td width="151"scope="col"><strong>Hiring Manager </strong></td>
    <td width="135" scope="col"><div id="hiringmanager">
   	<?php
    	echo form_dropdown("hiring_mgr",array('0' => '')+$hiringmanager,"","id='hrmanagerid', style='width:143px; background-color:#CCCCCC'");
    ?>
	</div></td>
    <td width="151" scope="col">Client Manager </td>
    <td width="139" scope="col"><div id="clientmanager">
   	<?php
    	echo form_dropdown("client_mgr",array('0' => 'Unallocated'),"","id='id', style='width:143px; background-color:#CCCCCC'");
    ?>
	</div>
	
	<script type="text/javascript">
	  	$("#hrmanagerid").click(function(){
	    		
        //build an array of selected values
        var hrmanagerid= $("#hrmanagerid").val();

      	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pof/admin/getClientManager')?>",
							data: {'hrmanagerid':hrmanagerid},
							success: function(msg){
								$('#clientmanager').html(msg);
							}
				  	});
	    		
	    });
	   </script></td>
  </tr>
  <tr>
    <td height="46">Position Sharing Method </td>
    <td><select name="pos_sharing_method" style="width:100px;">
	<option value=""></option>
      <option value="telephonic" <?php if($detail['pos_sharing_method']=='telephonic'){ echo 'selected="selected"'; }?>>Telephonic</option>
      <option value="email" <?php if($detail['pos_sharing_method']=='email'){ echo 'selected="selected"'; }?>>Email</option>
      <option value="client_web" <?php if($detail['pos_sharing_method']=='client_web'){ echo 'selected="selected"'; }?>>Client Web</option>
    </select></td>
    <td>Transaction Type </td>
    <td><select name="transaction_type" style="width:100px;">
      <option value=""></option>
     <option value="retained" <?php if($detail['transaction_type']=='retained'){ echo 'selected="selected"'; }?>>Retained</option>
	   <option value="exclusive" <?php if($detail['transaction_type']=='exclusive'){ echo 'selected="selected"'; }?>>Exclusive</option>
	   <option value="exclusive" <?php if($detail['transaction_type']=='st_exclusive'){ echo 'selected="selected"'; }?>>ST Exclusive</option>
      <option value="contingent" <?php if($detail['transaction_type']=='contingent'){ echo 'selected="selected"'; }?>>Contingent</option>
	  <option value="contingent" <?php if($detail['transaction_type']=='contingent_late'){ echo 'selected="selected"'; }?>>Contingent Late</option>
    </select></td>
    <td>Postition Taken On</td>
    <td><input name="pos_taken_on" type="text" size="15" class="input-medium datepick" value="<?php echo $detail['pos_taken_on']; ?>"/></td>
  </tr>
  <tr>
    <td height="41">Positon Given By</td>
    <td><input name="pos_given_by" type="text" size="15" value="<?php echo $detail['pos_given_by']; ?>"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="38" colspan="6">
	
	<table width="831" id="table41">
      <tr bgcolor="#000033">
        <th width="122" height="3" bgcolor="#000000"><div align="center" class="style1">Name</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Designation</div></th>
        <th bgcolor="#000000"><div align="center" class="style1">Telephone No. </div></th>
        <th width="143" bgcolor="#000000"><div align="center" class="style1">Mobile No. </div></th>
        <th width="232" bgcolor="#000000"><div align="center" class="style1">Email Id. </div></th>
        <td width="40" bgcolor="#FFFFFF"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows" /></div></td>
      </tr>
      <?php foreach($hiring_mgr as $key =>$row) {
     echo '<tr height="20">
        <td style="padding-top:5px;"><div align="center">
          <input name="h_name[]" type="text" size="15" value="'.$row['name'].'" />
        </div></td>
        <td width="127"><div align="center">
          <input name="h_designation[]" type="text" size="15" value="'.$row['designation'].'" />
        </div></td>
        <td width="139"><div align="center">
            <input name="h_telephone[]" type="text" size="15" value="'.$row['telephone'].'" />
        </div></td>
        <td><div align="center">
            <input name="h_mobile[]" type="text" size="15" value="'.$row['mobile'].'" />
        </div></td>
        <td><div align="center">
            <input name="h_email[]" type="text" size="35" value="'.$row['email'].'" />
        </div></td>
        <td></td>
      </tr>';
	  } ?>
    </table>	</td>
  </tr>
  <tr>
    <td colspan="6"><strong>Commitment made to Client:: </strong></td>
  </tr>
   <tr>
     <td height="38" colspan="6"><table width="591" id="table5">
       <tr bgcolor="#000033">
         <th width="396" height="3" bgcolor="#000000"><div align="center" class="style1">Comment</div></th>
         <th width="132" bgcolor="#000000" ><div align="center" class="style1">Date</div></th>
         <td width="47" bgcolor="#FFFFFF"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows"></div></td>
       </tr>
	    <?php foreach($commitment as $key =>$row) {
       echo '<tr height="20">
         <td style="padding-top:5px;"><input name="commit_comment[]" type="text" size="66" value="'.$row['comment'].'" /></td>
         <td><div align="center">
             <input name="commit_date[]" type="text" size="15" class="input-medium datepick" value="'.$row['date'].'" />
         </div></td>
         <td></td>
       </tr>';
	    } ?>
     </table></td>
   </tr>
   <tr>
     <td height="25">VC</td>
     <td><input type="checkbox" name="vc" value="1" <?php if ($detail['vc'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Group Posting </td>
     <td><input type="checkbox" name="group_posting" value="1" <?php if ($detail['group_posting'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Assesment Sheet </td>
     <td><input type="checkbox" name="assesment_sheet" <?php if ($detail['assesment_sheet'] == '1') { echo 'checked="checked" ';}?>/></td>
   </tr>
   <tr>
     <td height="25">Tracker</td>
     <td><input type="checkbox" name="tracker" value="1" <?php if ($detail['tracker'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Mirus Website </td>
     <td><input type="checkbox" name="mirus_web" value="1" <?php if ($detail['mirus_web'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>Client Web Loading </td>
     <td><input type="checkbox" name="client_web" value="1" <?php if ($detail['client_web'] == '1') { echo 'checked="checked" ';}?>/></td>
   </tr>
   <tr>
     <td height="25">Client Confidentiality </td>
     <td><input type="checkbox" name="client_confi" value="1" <?php if ($detail['client_confi'] == '1') { echo 'checked="checked" ';}?>/></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
</table>
 <h2></h2>
 <input name="submit" type="submit" class="btn btn-primary" value="Save">
<?php echo form_close(); ?>
	</div>
	

			<div id="tab-3">
              <p><?php echo form_open('pof/admin/enterVC/'.$pid); ?></p>
              <p>&nbsp;              </p>
              <table width="800">
  <tr>
    <td colspan="13"><h2>Position Understanding </h2></td>
  </tr>
  <tr>
    <td height="26" colspan="4"><h6>Critical KRA (Key Resonsibilities)</h6></td>
    <td colspan="4"><h6>Job is critical because</h6></td>
  </tr>
  <tr>
    <td height="26" colspan="4"><div>
      <textarea name="kra" cols="36" ></textarea>
    </div></td>
    <td colspan="4"><textarea name="jobcri" cols="34" ></textarea></td>
    </tr>
  
  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13"></td>
  </tr>
  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13"><h6>Linkages</h6></td>
  </tr>
  <tr>
    <td height="46" colspan="4"><div align="left">Internal</div></td>
    <td colspan="2"><div align="left">External</div></td>
    <td width="24%" colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="26" colspan="4"><div id="content-lnki" >1
          <input type='text' id='linki[]' name='linki[]' style='width:300px;' />
      <br/>
    </div></td>
    <td colspan="4"><div id="content-lnke" >1
          <input type='text' id='linke[]' name='linke[]' style='width:280px;' />
    </div></td>
    </tr>
  <tr>
    <td height="28" colspan="4"><input type="button" name="Input2" value="Add More" onClick="addLinkagesi();" /></td>
    <td height="28" colspan="4"><input type="button" name="Input3" value="Add More" onClick="addLinkagese();" /></td>
    </tr>
  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13"><h6>Tags</h6></td>
  </tr>
  <tr>
    <td height="22" colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="22" colspan="3"><div align="left">Industry  </div></td>
    <td colspan="2"><div align="left">Function </div></td>
    <td colspan="3"><div align="left">Personality</div></td>
    </tr>
  <tr>
    <td height="22" colspan="3"><?php echo form_multiselect('indus_tag[]',$industries, "", "style='background-color:#CCCCCC'");?></td>
    <td colspan="2"><?php echo form_multiselect('func_tag[]',$functions, "", "style='background-color:#CCCCCC'");?></td>
    <td colspan="3"><?php echo form_multiselect();?></td>
  </tr>
  <tr>
    <td width="2%" height="42">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td width="24%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" colspan="3"><div align="left">Geography Span</div></td>
    <td colspan="2"><div align="left">Customer Sagment      </div></td>
    <td rowspan="2">&nbsp;</td>
    <td colspan="2" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" colspan="3"><?php echo form_multiselect('geog_span_tag[]',$locations, "", "style='background-color:#CCCCCC'");?></td>
    <td colspan="2"><?php echo form_multiselect(
	);?></td>
  </tr>
  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13"><h2>Tags</h2></td>
  </tr>
  <tr>
    <td colspan="13"><strong>Current Tags::</strong>
	<?php
 if (count($alltags)){ 
 
 
 foreach ($alltags as $row){
 
echo $row->tag_name.", ";
 }
 }
 else{
  echo 'No tags found'; 
 } 
 ?></td>
  </tr>
  <tr>
    <td colspan="13"><h2></h2></td>
  </tr>
  <tr>
    <td colspan="13"><div id="country" style="width:350px;float:left;"> Tag Type <br/>
	
    <?php
    	echo form_multiselect("segment_type[]",$tagtype,"","id='tagtypeid', style='width:250px; height:150px; background-color:#CCCCCC'");
    ?>
	
</div>
    <div id="kota">Tags<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Segment'),'',"id='tags', style='width:250px;  background-color:#CCCCCC'",'disabled');
    ?> 
    </div>
  
   
   
    <script type="text/javascript">
	  	$("#tagtypeid").click(function(){
	    		 if( $('#tagtypeid :selected').length > 0){
        //build an array of selected values
        var tagtypeid= $("#tagtypeid").val();

        $('#tagtypeid :selected').each(function(i, selected) {
            tagtypeid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('segment/admin/select_tag')?>",
							data: {'tagtypeid':tagtypeid},
							success: function(msg){
								$('#kota').html(msg);
							}
				  	});
	    		}
	    });
	   </script>   </td>
  </tr>
  <tr>
    <td colspan="13"><h2>&nbsp;</h2></td>
  </tr>
   <tr>
    <td colspan="13">
  <input name="submit" type="submit" class="btn btn-primary" value="Save">  </td>
  </tr>
  </table>
<?php echo form_close(); ?> </div>
			<div id="tab-4">
<?php echo form_open('pof/admin/posStrategy/'.$pid); ?>			
  <table width="738">
    <tr>
    <td colspan="10"><h2>Position Search Strategy</h2></td>
  </tr>
    <tr>
      <td height="26" colspan="5"><?php
 if (count($poscomments)){ 
 echo "<table class='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Comments</th>\n";
	
		echo "<th>On</th>\n";
			echo "<th>By</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($poscomments as $row){
 
echo "<tr valign='top'>\n";

 echo    "<td>$row->msg</td>";
 echo    "<td>$row->date</td>";
 echo    "<td>$row->username</td>";
 echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No comments found'; 
 } 
 ?></td>
    </tr>
    <tr>
      <td height="26">&nbsp;</td>
      <td width="355">&nbsp;</td>
    </tr>
    <tr>
    <td width="371" height="26"><h6>Key Selling Propositions </h6></td>
    <td><h6>Key Evaluation Points </h6></td>
    </tr>
  
  
  <tr>
    <td height="26"><div id="content-key" >1
          <input type='text' id='keysell[]' name='keysell[]' style='width:300px;' />
     
    </div></td>
    <td><div id="content-check" >1
          <input type='text' id='keyeva[]' name='keyeva[]' style='width:300px;' />
      
    </div></td>
    </tr>
  <tr>
    <td height="28"><input type="button" name="Input5" value="Add More" onClick="addElementKey();" /></td>
    <td height="28"><input type="button" name="Input6" value="Add More" onClick="addElementCheck();" /></td>
    </tr>
  <tr>
    <td colspan="10">&nbsp;</td>
  </tr>
  
  
  
  
  
  <tr>
    <td colspan="10"><h6>Target Companies </h6></td>
  </tr>
  <tr>
    <td height="26"><h6>Industry</h6></td>
    <td><h6>Worksheet Companies </h6></td>
    </tr>
  <tr>
    <td height="26"><?php
    	echo form_dropdown();
    ?></td>
    <td><div align="left" id="users">
	<?php echo form_multiselect('user[]',$worksheetcomp,"", "id='worksheetcomp'"); ?>
          
    </div>
	<br/>
	
            <div class="input select">
                <h6>Other Companies </h6>
                 <div align="left" id="users">
	<?php echo form_multiselect('user[]',$worksheetcomp,"", "id='othercomp'"); ?>
          
    </div>
            </div>
       
		<br/>
		 
            <div class="input select">
                <h6>OR </h6>
               <?php echo anchor_popup('synonym/admin/createComp','New Company', $atts); ?>
            </div>
        </td>
    </tr>
  <tr>
    <td height="27" colspan="10">       </td>
  </tr>
 
  <tr>
    <td colspan="10">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="10"><h6>Excluded Companies </h6></td>
  </tr>
  <tr>
    <td colspan="10"><div id="country" style="width:350px;float:left;">
    Industry : <br/>
	
    <?php
    	echo form_multiselect();
    ?>
	
    </div>
    <div id="kotaa">
    Company :<br/>
   	<?php
    	echo form_dropdown("id",array('Select'=>'Select Companies'),'',"style='width:250px'",'disabled');
    ?>
    </div>
  
   
   
    <script type="text/javascript">
	  	$("#countrryid").click(function(){
	    		 if( $('#countrryid :selected').length > 0){
        //build an array of selected values
        var countrryid= $("#countrryid").val();

        $('#countrryid :selected').each(function(i, selected) {
            countrryid[i] = $(selected).val();
        });

	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pof/admin/select_company_excluded')?>",
							data: {'countrryid':countrryid},
							success: function(msg){
								$('#kotaa').html(msg);
							}
				  	});
	    		}
	    });
	   </script></td>
  </tr>
  <tr>
    <td colspan="10">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="10"><table width="591" id="table4">
      <tr bgcolor="#000033">
        <th width="396" height="3" bgcolor="#000000"><div align="center" class="style1">Linkedin Group Link </div></th>
        <th width="132" bgcolor="#000000" ><div align="center" class="style1">Group Name </div></th>
        <td width="47" bgcolor="#FFFFFF"><div align="center"><img src="http://software.triedge.in/assets/icons/add.png" class="cloneTableRows" /></div></td>
      </tr>
      <?php foreach($commitment as $key =>$row) {
       echo '<tr height="20">
         <td style="padding-top:5px;"><input name="linkedin_link[]" type="text" size="66" value="'.$row['comment'].'" /></td>
         <td><div align="center">
             <input name="group_name[]" type="text" size="15" value="" />
         </div></td>
         <td></td>
       </tr>';
	    } ?>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="10"> <input name="submit" type="submit" class="btn btn-primary" value="Save"></td>
  </tr>
  </table>
  </div>