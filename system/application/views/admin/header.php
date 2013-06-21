<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php print $header.' | '.$this->preference->item('site_name');?></title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/datepicker/datepicker.css">
<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assets/js/jjquery.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Touch enable for jquery UI -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<!-- vmap -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.sampledata.js"></script>
	<!-- Bootbox -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Flot -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
	<!-- imagesLoaded -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- PageGuide -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/pageguide/jquery.pageguide.js"></script>
	<!-- FullCalendar -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
	
	
	<!-- Theme framework -->
	<script src="<?php echo base_url(); ?>assets/js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="<?php echo base_url(); ?>assets/js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="<?php echo base_url(); ?>assets/js/demonstration.min.js"></script>
<body>

<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class='retina-ready' width="120" height="100"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li>
					<?php print anchor('admin',$this->lang->line('backendpro_dashboard'),array('class'=>'nav-top-item no-submenu'))?>   
				</li>
				<?php if(check('Candidate',NULL,FALSE)):?>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Candidates</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php if(check('Candidates',NULL,FALSE)):?><li><?php print anchor('candidates/admin/admin','Candidate Search')?></li><?php echo "\n"; endif;?>
			<?php if(check('Cand Map Sheet',NULL,FALSE)):?><li><?php print anchor('candidates/admin/candSheet','Candidate Sheet')?></li><?php echo "\n"; endif;?>
						
					</ul>
				</li>
				<?php endif;?>
				<?php if(check('Company',NULL,FALSE)):?>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-th-large"></i>
						<span>Company</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php if(check('Companies',NULL,FALSE)):?><li><?php print anchor('companies/admin/admin','Company List')?></li><?php echo "\n"; endif;?>
			<?php if(check('Clients',NULL,FALSE)):?><li><?php print anchor('companies/admin/clientlist','Client List')?></li><?php echo "\n"; endif;?>
			<?php if(check('Client Manager List',NULL,FALSE)):?><li><?php print anchor('companies/admin/clientManagers', 'Client Manager List')?></li><?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if(check('Position',NULL,FALSE)):?>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-table"></i>
						<span>Position</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php if(check('New Pof',NULL,FALSE)):?><li><?php print anchor('pof/admin/newpof','New Position')?></li><?php echo "\n"; endif;?>
		 
		    <?php if(check('Pof list',NULL,FALSE)):?><li><?php print anchor('pof/admin/admin','Position List')?></li><?php echo "\n"; endif;?>
						
					</ul>
				</li>
				<?php endif;?>
				<?php if(check('MIS',NULL,FALSE)):?>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-th-large"></i>
						<span>MIS</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php if(check('Usage',NULL,FALSE)):?><li><?php print anchor('usage/admin/admin','Software Usage')?></li><?php echo "\n"; endif;?>
			   <?php if(check('Unattach',NULL,FALSE)):?><li><?php print anchor('usage/admin/countAllNot','Unattached MIS')?></li><?php echo "\n"; endif;?>
			 <?php if(check('VRS',NULL,FALSE)):?><li><?php print anchor('pof/admin/createVRS','VRS')?></li><?php echo "\n"; endif;?>      
			 <?php if(check('Offer',NULL,FALSE)):?><li><?php print anchor('pof/admin/getCandOffer','Closure MIS')?></li><?php echo "\n"; endif;?>      
			 <?php if(check('Consultant Delivery',NULL,FALSE)):?><li><?php print anchor('usage/admin/consDelivery','Consultant Delivery')?></li><?php echo "\n"; endif;?> 
			  <?php if(check('RA Delivery',NULL,FALSE)):?><li><?php print anchor('usage/admin/RADelivery','RA Delivery')?></li><?php echo "\n"; endif;?> 
			 <?php if(check('Position Delivery',NULL,FALSE)):?><li><?php print anchor('pof/admin/posDelivery','Position Delivery')?></li><?php echo "\n"; endif;?> 
			 <?php if(check('Daily Position Delivery',NULL,FALSE)):?><li><?php print anchor('usage/admin/posDeliveryDaily','Daily Position Delivery')?></li><?php echo "\n"; endif;?> 
					</ul>
				</li>
				<?php endif;?>
				<?php if(check('Tools',NULL,FALSE)):?>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-th"></i>
						<span>Tools</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php if(check('Pref Worksheet',NULL,FALSE)):?><li><?php print anchor('worksheet/admin/prefWorksheet','My Preferred Worksheet')?></li><?php echo "\n"; endif;?>    
		  <?php if(check('Messege',NULL,FALSE)):?><li><?php $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

print anchor_popup('messege/admin/newMsg/','Send Messege')?></li><?php echo "\n"; endif;?> 
<?php if(check('Dup Manager',NULL,FALSE)):?><li><?php print anchor('candidates/admin/dupManager','Duplication Manager')?></li><?php echo "\n"; endif;?> 
 

<?php if(check('Unattached Resume',NULL,FALSE)):?><li><?php print anchor('usage/admin/unResume','Unattached Resumes')?></li><?php echo "\n"; endif;?> 

<?php if(check('Metrices',NULL,FALSE)):?><li><?php print anchor('metrices/admin/admin','Metrices entry')?></li><?php echo "\n"; endif;?>
<?php if(check('Manage Company',NULL,FALSE)):?><li><?php print anchor('synonym/admin/','Manage Lists')?></li><?php echo "\n"; endif;?>
<?php if(check('Company Updater',NULL,FALSE)):?><li><?php print anchor('synonym/admin/companyupdate','Lists Updater')?></li><?php echo "\n"; endif;?>   

<?php if(check('Tags',NULL,FALSE)):?><li><?php print anchor('segment/admin/tagmanager','Tag Manager')?></li><?php echo "\n"; endif;?>  
					</ul>
				</li>
				<?php endif;?>
				<?php if(check('Internal',NULL,FALSE)):?>
						<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-th"></i>
						<span>Internal</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						 <?php if(check('Messege',NULL,FALSE)):?><li><?php $atts = array(
              'width'      => '700',
              'height'     => '560',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );

print anchor_popup('metrices/admin/leaveApplication','Leave Application',$atts)?></li><?php echo "\n"; endif;?> 
<?php if(check('App Format',NULL,FALSE)):?><li><?php print anchor('pof/admin/myAppraisal','Appraisal Format')?></li><?php echo "\n"; endif;?>  
						
					</ul>
				</li>
				<?php endif;?>
																	
				   <?php if(check('System',NULL,FALSE)):?>
						<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-th"></i>
						<span>Admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php if(check('Candidate New',NULL,FALSE)):?><li><?php print anchor('candidates/admin/import_candidate','Import Manager')?></li><?php echo "\n"; endif;?>
			
			<?php if(check('Candidate Delete',NULL,FALSE)):?><li><?php print anchor('candidates/admin/candToDelete','Candidates for Deletion')?></li><?php echo "\n"; endif;?>
			
			<?php if(check('Segment',NULL,FALSE)):?><li><?php print anchor('segment/admin','List Manager')?></li><?php echo "\n"; endif;?>
			 <?php if(check('Worksheet Manager',NULL,FALSE)):?><li><?php print anchor('worksheet/admin','Worksheet Manager')?></li><?php echo "\n"; endif;?>
		
			 <?php if(check('Task',NULL,FALSE)):?><li><?php print anchor('projects/admin/admin','Task Manager')?></li><?php echo "\n"; endif;?>
			 <?php if(check('Client Management',NULL,FALSE)):?><li><?php print anchor('companies/admin/clientManagement', 'Client Admin')?></li><?php endif;?>
			 <?php if(check('Members',NULL,FALSE)):?><li><?php print anchor('auth/admin/members',$this->lang->line('backendpro_members'))?></li><?php endif;?>
			 <?php if(check('Data Metrices',NULL,FALSE)):?><li><?php print anchor('metrices/admin/getConsuls','Data Metrices')?></li><?php endif;?>
			 <?php if(check('Appraisals',NULL,FALSE)):?><li><?php print anchor('pof/admin/allConsApp','All Appraisals')?></li><?php endif;?>
			 
            <?php if(check('Access Control',NULL,FALSE)):?><li><?php print anchor('auth/admin/access_control',$this->lang->line('backendpro_access_control'))?></li><?php endif;?>
			
			<?php if(check('Backup',NULL,FALSE)):?><li><?php print anchor('candidates/admin/backup','Database Backup')?></li><?php echo "\n"; endif;?>
					</ul>
				</li>
				<?php endif;?>
			</ul>
			<div class="user">
				<div class="dropdown">
					<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="icon-user"></i> <?php echo "<b>".$this->session->userdata('username')."</b>"; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<?php print anchor('auth/logout',$this->lang->line('userlib_logout'))?>
						</li>
					</ul>
				</div>
			</div>
			<a href="#" class='toggle-mobile'><i class="icon-reorder"></i></a>
		</div>
</div>
<div class="container-fluid" id="content">
		