<script type="text/javascript" src="<?php echo base_url()?>modules/pof/js/addremove.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Work Allocation Sheet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<script src='<?php echo base_url()?>assets/gantt/codebase/dhtmlxscheduler.js' type="text/javascript" charset="utf-8"></script>
	<script src='<?php echo base_url()?>assets/gantt/codebase/ext/dhtmlxscheduler_timeline.js' type="text/javascript" charset="utf-8"></script>
	
	
<link rel='stylesheet' type='text/css' href='<?php echo base_url()?>assets/gantt/codebase/dhtmlxscheduler.css'>
	
 <style type="text/css" media="screen">
        html, body{
            margin:0;
            padding:0;
            height:100%;
            overflow:hidden;
        }
    </style>

<script type="text/javascript" charset="utf-8">
        function init() {

            scheduler.locale.labels.timeline_tab = "Week";
            scheduler.locale.labels.section_custom="Section";
            scheduler.config.details_on_create=false;
            scheduler.config.xml_date="%Y-%m-%d %H:%i";

            //===============
            //Configuration
            //===============
			 var sections=[
			 <?php 	
              if (count($usr)){
	          foreach ($usr as $key => $list){
                echo "{key:".$list['id'].", label:".'"'.$list['username'].'"'."},";
		          }
				 }
              ?>	
            ];
			
			
           scheduler.createTimelineView({
			name:	"timeline",
			x_unit:	"day",
			x_date:	"%D, %d %M",
			x_step:	  1,
			x_size:   7,
			x_start:  0,
			x_length: 7,
			y_unit:	sections,
			y_property:	"section_id",
			render:"bar",
			
			
		});
            //===============
            //Data loading
         

		scheduler.init('scheduler_here',new Date(<?php echo date('Y,m-1,d', strtotime('Last Monday', time())); ?>),"timeline");
		scheduler.load("<?php echo base_url()?>assets/gantt/php/events_tree_db.php");
		
		var dp = new dataProcessor("<?php echo base_url()?>assets/gantt/php/events_tree_db.php");
		dp.init(scheduler);
	}
	
</script>

<body onLoad="init();">
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
		<div class="dhx_cal_navline">
		
			<div class="dhx_cal_date" style="left:250px;"></div>
			
			
			<div class="dhx_cal_tab" name="timeline_tab" style="left:700px;"></div>
			
				<div class="dhx_cal_prev_button" style="left:665px;">&nbsp;</div>
			<div class="dhx_cal_next_button" style="left:770px;">&nbsp;</div>
			<div class="dhx_cal_today_button" style="left:470px;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>	
			
	</div>
</body>