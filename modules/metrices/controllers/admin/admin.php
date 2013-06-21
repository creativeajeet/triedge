<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
  function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('Metrices');
			// Load models and language
			$this->load->model('MMetrices');
			$this->load->module_model('auth','User_model');
			$this->load->module_model('usage','MUsage');
			$this->load->language('customer');
			// Set breadcrumb
			$this->bep_site->set_crumb('Project Home','projects/admin');
                        $this->load->helper('date');
	}


    function index(){
        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Metrices";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Metrices";
              // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_home";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
           }
    //for daily in-out entries
	function dailyHours(){
	   // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Metrices";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Metrices";
			// get users
			$data['users'] = $this->MMetrices->getUsers();
			// for in-out entry
			if($this->input->post('date'))
			 {
			   $date=$_POST['date'];
			   $inhour=$_POST['inhour'];
			   $inmin=$_POST['inmin'];
			   $outhour=$_POST['outhour'];
			   $outmin=$_POST['outmin'];
			   $user=$_POST['user'];
			   $count=count($_POST['user']);
			    for($i=0; $i<$count; $i++)
				  {
				    $data = array(
					'user' => $user[$i],
					'intime' => $inhour[$i].":".$inmin[$i],
					'outtime' => $outhour[$i].":".$outmin[$i],
					'date' => $date,
					'in' => $date." ".$inhour[$i].":".$inmin[$i],
					'out' => $date." ".$outhour[$i].":".$outmin[$i],
					'status' => 'Working Day',
					);
				  $this->MMetrices->addTime($data);
				  }
			  // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','In-Out Time has been entered successfully.');
					   redirect('metrices/admin/admin/','refresh');
			 }
			
		   else{
              // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_dailytime";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
           }
	  // Excess leaves entitle settings
	  function settings()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Metrices";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Metrices";
			// get all the leaves entitle settings
			$data['leaves_entitled'] = $this->MMetrices->allLevesEn();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_leavesen";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		  }
	 // new leaves entitlement for new quareter
	 function newleavesen()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "New Leaves Entitlement";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "New Leaves Entitlement";
			// get users
			$data['users'] = $this->MMetrices->getUsers();
			
			if($this->input->post('quarter'))
			 {
			   $quarter=$_POST['quarter'];
			   $year=$_POST['year'];
			   $leavesen=$_POST['leavesen'];
			   $firstday = $_POST['firstdate'];
			   $lastday = $_POST['lastdate'];
			   $user=$_POST['user'];
			   $count=count($_POST['user']);
			    for($i=0; $i<$count; $i++)
				  {
				    $data = array(
					'users' => $user[$i],
					'quarter' => $quarter,
					'year' => $year,
					'leaves_entitled' => $leavesen[$i],
					'date' => date('Y-m-d'),
					'firstday' => $firstday,
					'lastday' => $lastday,
					'is_entered' =>1,
					);
				  $this->MMetrices->addLeavesen($data);
				  }
			  // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Leaves Entitlement has been entered successfully.');
					   redirect('metrices/admin/admin/','refresh');
			 }
		   else{
              // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_newleavesen";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
           }
		   
		   // all call data 
	  function calldata()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "All Call Data";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "All Call Data";
			// get all the leaves entitle settings
			$data['allcalldata'] = $this->MMetrices->allCallData();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_calldata";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		  }
	 // new leaves entitlement for new quareter
	 function newcalldata()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "New Call Data";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "New Call Data";
			// get users
			$data['users'] = $this->MMetrices->getUsers();
			
			if($this->input->post('quarter'))
			 {
			   $month=$_POST['month'];
			   $quarter=$_POST['quarter'];
			   $year=$_POST['year'];
			   $calltime=$_POST['minutes'];
			   $user=$_POST['user'];
			   $count=count($_POST['user']);
			    for($i=0; $i<$count; $i++)
				  {
				    $data = array(
					'users' => $user[$i],
					'month' => $month,
					'quarter' => $quarter,
					'year' => $year,
					'calltime' => $calltime[$i],
					'date' => date('Y-m-d'),
					'is_entered' =>1,
					);
				  $this->MMetrices->addCallData($data);
				  }
			  // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','CallData has been entered successfully.');
					   redirect('metrices/admin/admin/','refresh');
			 }
		   else{
              // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_newcalldata";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
           }
		   // all holidays
		  function holidays()
		    {
			    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Holidays List";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Holidays List";
			// get holidays
			$data['users'] = $this->MMetrices->getUsers();
			// get holidays
			$data['holidays'] = $this->MMetrices->getHolidays();
			// for in-out entry
			if($this->input->post('date'))
			 {
			   $date=$_POST['date'];
			   $holiday = $_POST['holiday'];
			   $user=$_POST['user'];
			   $count=count($_POST['user']);
			    for($i=0; $i<$count; $i++)
				  {
				    $data = array(
					'user' => $user[$i],
					'intime' => 'Holiday',
					'outtime' => 'Holiday',
					'date' => $date,
					'in' => 'Holiday',
					'out' => 'Holiday',
					'status' => $holiday,
					'is_holiday' =>'1',
					);
				  $this->MMetrices->addTime($data);
				  }
			  // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Holiday has been entered successfully.');
					   redirect('metrices/admin/admin/','refresh');
			 }
		   else{
              // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_holiday";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
           }
		  /// get all consultant
		  function getConsuls()
		    {
			  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Consultantwise";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Consultantwise";
			// get users
			$data['users'] = $this->MMetrices->getUsers();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_allconsuls";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
		   /// get all consultant
		  function metricewise()
		    {
			  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Merricewise";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Merricewise";
			// get users
			$data['users'] = $this->MMetrices->getUsers();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_metrices";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
		  
   	     // get single consul metrices
	    function singlemetric()
		     {
			   // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "New Call Data";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "New Call Data";
			$username = $this->uri->segment(4);
			$user = $this->uri->segment(5);
			/// for metricess
		 $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y', strtotime('-1 year'));
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			}
			$firstdate = $data['firstdate'];
			$lastdate = $data['lastdate'];
			$data['avgcalldatamtd'] = $this->MUsage->getAllCallMTD($username);
			$data['avgcalldataqtr'] = $this->MUsage->getAllCallQTR($username);
			$data['avgcalldataytd'] = $this->MUsage->getAllCallYTD($username);
			$data['leavewtd'] = $this->MUsage->countLeaveWTD($username);
			$data['leavemtd'] = $this->MUsage->countLeaveMTD($username);
			$data['leaveqtd'] = $this->MUsage->countLeaveQTD($firstdate,$lastdate,$username);
			$data['leaveytd'] = $this->MUsage->countLeaveYTD($username);
			$data['workingdaysWTD'] = $this->MUsage->countWorkDayWTD($username);
			$data['workingdaysMTD'] = $this->MUsage->countWorkDayMTD($username);
			//$data['workingdaysQTD'] = $this->MUsage->countWorkDayQTD($firstdate,$lastdate,$username);
			$data['workingdaysYTD'] = $this->MUsage->countWorkDayYTD($username);
			$data['workinghoursWTD'] = $this->MUsage->countWorkHourWTD($username);
			$data['workinghoursMTD'] = $this->MUsage->countWorkHourMTD($username);
			//$data['workinghoursQTD'] = $this->MUsage->countWorkHourQTD($firstdate,$lastdate,$username);
			$data['workinghoursYTD'] = $this->MUsage->countWorkHourYTD($username);
			$data['dbWorkWTD'] = $this->MUsage->countWorksheetWTD($user);
			$data['dbWorkMTD'] = $this->MUsage->countWorksheetMTD($user);
			$data['dbWorkQTD'] = $this->MUsage->countWorksheetQTD($firstdate,$lastdate,$user);
			$data['dbWorkYTD'] = $this->MUsage->countWorksheetYTD($user);
		$data['enterwtd'] = $this->MUsage->countEnterWTD($user);
		$data['entermtd'] = $this->MUsage->countEnterMTD($user);
		$data['enterqtd'] = $this->MUsage->countEnterQTD($firstdate,$lastdate,$user);
		$data['enterytd'] = $this->MUsage->countEnterYTD($user);
		$data['editwtd'] = $this->MUsage->countEditWTD($user);
		$data['editmtd'] = $this->MUsage->countEditMTD($user);
		$data['editqtd'] = $this->MUsage->countEditQTD($firstdate,$lastdate,$user);
		$data['editytd'] = $this->MUsage->countEditYTD($user);
		$data['nopw'] = $this->MUsage->countPofAllocatedW($username);
		$data['nopm'] = $this->MUsage->countPofAllocatedM($username);
		$data['nopq'] = $this->MUsage->countPofAllocatedQ($firstdate,$lastdate,$username);
		$data['nopy'] = $this->MUsage->countPofAllocatedY($username);
		$data['cvsentw'] = $this->MUsage->countCVsentW($username);
		$data['cvsentm'] = $this->MUsage->countCVsentM($username);
		$data['cvsentq'] = $this->MUsage->countCVsentQ($firstdate,$lastdate,$username);
		$data['cvsenty'] = $this->MUsage->countCVsentY($username);
		// This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_singleconsul";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			 }
		
		// leave application by consultants
		  function leaveApplication()
		    {
			  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Leave Application";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Leave Application";
			
			if($this->input->post('apply'))
			  {
			    $appliedon = $_POST['date_apply'];
				$emp = $_POST['emp_name'];
				$name = $_POST['name'];
				$leavefrom = $_POST['l_from'];
				$leaveto = $_POST['l_to'];
				$leaves = $_POST['no_of_leaves'];
				$reason = $_POST['l_reason'];
				$joinon = $_POST['l_join'];
				$leavebal = $_POST['l_balance'];
				$totalleaves = $_POST['total_leave'];
				$msg = 'I want leaves from '.$leavefrom.' to '.$leaveto;
				$admin = array(11,19,37,38);
				$count = count($admin);
				  for($i=0; $i<$count; $i++)
				    {
					  $data = array(
					  'type' => 'leave_application',
					  'title' => 'Leave Application By '.$name,
					  'send_to' => $admin[$i],
					  'msg' => $msg,
					  'sent_by' => $emp,
					  'sent_on' => date('Y-m-d H:i:s'),
					  );
					$this->MMetrices->sendApplcation($data);			  
				 }
				 $this->MMetrices->applyLeave();
				echo "<div align='center' style='color:#006600'>Your leave application has been submitted successfully.</div>";
			  }
			 else{
			 $data['module'] = 'metrices';
			 $this->load->view('admin/admin_leave_application');
			 }
			}
		/// get all leave applications
		function allLeaveApplications()
		   {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "All Leave Applications";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "All Leave Applications";
			// get all applications
			$data['results'] = $this->MMetrices->getAllLeaveApplications();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_allleaveapplications";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		   
		// leave application apprival
		  function fulldetails()
		    {
			  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Leave Application";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Leave Application";
			// get full details
			$leaveid = $this->uri->segment(5);
			$user = $this->uri->segment(4);
			$data['fulldetails'] = $this->MMetrices->getfullDetails($leaveid);
			if($this->input->post('approve'))
			  {
			    $this->MMetrices->approveleave($leaveid);
			    $this->MMetrices->sendapprove($user);
				echo "<div align='center' style='color:#006600'>Leave application has been approved successfully.</div>";
			  }
			 elseif($this->input->post('deny'))
			  {
			    $this->MMetrices->denyleave($leaveid);
			    $this->MMetrices->senddeny($user);
				echo "<div align='center' style='color:#006600'>Leave application has been denied successfully.</div>";
			  }
			 else{
			 $data['module'] = 'metrices';
			 $this->load->view('admin/admin_leave_application_details',$data);
			 }
			}
			
		/// get all new positions
		function allNewPositions()
		   {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "All New Positions";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "All New Positions";
			// get all applications
			$data['results'] = $this->MMetrices->getAllNewPositions();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_allnewpositions";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		// get new entries
		 function newentries()
		      {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "All New Positions";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "All New Positions";
			// get all applications
			// get all applications
		    $data['WTD'] = $this->MMetrices->getTotalWTD();
			 $data['MTD'] = $this->MMetrices->getTotalMTD();
			  $data['QTR'] = $this->MMetrices->getTotalQTR();
			   $data['YTD'] = $this->MMetrices->getTotalYTD();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_allnewentry";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		   // get total edits
		 function totaledits()
		      {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "No. of edits";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "No. of edits";
			// get all applications
			// get all applications
		    $data['WTD'] = $this->MMetrices->getTotalWTDedits();
			 $data['MTD'] = $this->MMetrices->getTotalMTDedits();
			  $data['QTR'] = $this->MMetrices->getTotalQTRedits();
			   $data['YTD'] = $this->MMetrices->getTotalYTDedits();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_alledits";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		   // avg DB
		    // get total edits
		 function avgdb()
		      {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Avg DB to worksheet";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Avg DB to worksheet";
			// get all applications
			// get all applications
		    $data['WTD'] = $this->MMetrices->getTotalWTDavgdb();
			 $data['MTD'] = $this->MMetrices->getTotalMTDavgdb();
			  $data['QTR'] = $this->MMetrices->getTotalQTRavgdb();
			   $data['YTD'] = $this->MMetrices->getTotalYTDavgdb();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_avgdb";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		  // avg cal
		  function avgcall() 
		     {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Avg Call Data";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Avg Call Data";
			// get all applications
			// get all applications
		   	 $data['MTD'] = $this->MMetrices->getAllCallMTD();
			  $data['QTR'] = $this->MMetrices->getAllCallQTR();
			   $data['YTD'] = $this->MMetrices->getAllCallYTD();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_allavgcall";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		   // total leaves taken
		    // get total edits
		 function totalleavetaken()
		      {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Total Leaves Taken";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Total Leaves Taken";
			// get all applications
			// get all applications
		    $data['WTD'] = $this->MMetrices->getTotalWTDLeaves();
			 $data['MTD'] = $this->MMetrices->getTotalMTDLeaves();
			  $data['QTR'] = $this->MMetrices->getTotalQTRLeaves();
			   $data['YTD'] = $this->MMetrices->getTotalYTDLeaves();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_totalleaves";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		   // positions alloacted
		 function posalloc()
		      {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "No. of Positions Allcated";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "No. of Positions Allcated";
			// get all applications
		    $data['WTD'] = $this->MMetrices->getWTDPos();
			 $data['MTD'] = $this->MMetrices->getMTDPos();
			  $data['QTR'] = $this->MMetrices->getQTRPos();
			   $data['YTD'] = $this->MMetrices->getYTDPos();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_posallocated";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		   // cvsent
		 function totalcvsent()
		      {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "No. of CV sent";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "No. of CV sent";
			// get all applications
		    $data['WTD'] = $this->MMetrices->getWTDCVsent();
			 $data['MTD'] = $this->MMetrices->getMTDCVsent();
			  $data['QTR'] = $this->MMetrices->getQTRCVsent();
			   $data['YTD'] = $this->MMetrices->getYTDCVsent();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_cvsent";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		  // gets grid view
		 function gridview()
		      {
		      // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Data Metrices";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Data Metrices";
			// get all applications
		    $data['WTD'] = $this->MMetrices->getTotalWTD();
			 $data['MTD'] = $this->MMetrices->getTotalMTD();
			  $data['QTR'] = $this->MMetrices->getTotalQTR();
			   $data['YTD'] = $this->MMetrices->getTotalYTD();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_gridview";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		   }
		   
		 // my metrices
		 function myMetrices()
		     {
			   // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "My Data Metrices";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "My Data Metrices";
			//user
			$username = $this->session->userdata('id');
			$user = $this->session->userdata('username');
			/// for metricess
		$month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y', strtotime('-1 year'));
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $data['firstdate'] = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $data['lastdate'] = date('Y-m-d',$mklast);
			}
			$firstdate = $data['firstdate'];
			$lastdate = $data['lastdate'];
			$data['leavewtd'] = $this->MUsage->countLeaveWTD($username);
			$data['leavemtd'] = $this->MUsage->countLeaveMTD($username);
			$data['leaveqtd'] = $this->MUsage->countLeaveQTD($firstdate,$lastdate,$username);
			$data['leaveytd'] = $this->MUsage->countLeaveYTD($username);
			$data['workingdaysWTD'] = $this->MUsage->countWorkDayWTD($username);
			$data['workingdaysMTD'] = $this->MUsage->countWorkDayMTD($username);
			//$data['workingdaysQTD'] = $this->MUsage->countWorkDayQTD($firstdate,$lastdate,$username);
			$data['workingdaysYTD'] = $this->MUsage->countWorkDayYTD($username);
			$data['workinghoursWTD'] = $this->MUsage->countWorkHourWTD($username);
			$data['workinghoursMTD'] = $this->MUsage->countWorkHourMTD($username);
			//$data['workinghoursQTD'] = $this->MUsage->countWorkHourQTD($firstdate,$lastdate,$username);
			$data['workinghoursYTD'] = $this->MUsage->countWorkHourYTD($username);
			$data['dbWorkWTD'] = $this->MUsage->countWorksheetWTD($user);
			$data['dbWorkMTD'] = $this->MUsage->countWorksheetMTD($user);
			$data['dbWorkQTD'] = $this->MUsage->countWorksheetQTD($firstdate,$lastdate,$user);
			$data['dbWorkYTD'] = $this->MUsage->countWorksheetYTD($user);
			
			
		$data['enterwtd'] = $this->MUsage->countEnterWTD($user);
		$data['entermtd'] = $this->MUsage->countEnterMTD($user);
		$data['enterqtd'] = $this->MUsage->countEnterQTD($firstdate,$lastdate,$user);
		$data['enterytd'] = $this->MUsage->countEnterYTD($user);
		$data['editwtd'] = $this->MUsage->countEditWTD($user);
		$data['editmtd'] = $this->MUsage->countEditMTD($user);
		$data['editqtd'] = $this->MUsage->countEditQTD($firstdate,$lastdate,$user);
		$data['editytd'] = $this->MUsage->countEditYTD($user);
		$data['nopw'] = $this->MUsage->countPofAllocatedW($username);
		$data['nopm'] = $this->MUsage->countPofAllocatedM($username);
		$data['nopq'] = $this->MUsage->countPofAllocatedQ($firstdate,$lastdate,$username);
		$data['nopy'] = $this->MUsage->countPofAllocatedY($username);
		$data['cvsentw'] = $this->MUsage->countCVsentW($username);
		$data['cvsentm'] = $this->MUsage->countCVsentM($username);
		$data['cvsentq'] = $this->MUsage->countCVsentQ($firstdate,$lastdate,$username);
		$data['cvsenty'] = $this->MUsage->countCVsentY($username);
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_mymetrices";
	        $data['module'] = 'metrices';
	        $this->load->view('admin/admin_metrices_mymetrices',$data);
			 }
			 
			 
			 
			 
		//old data entry
		 // leave data 
	  function oldLeaves()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Old Leave Data";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Old Leave Data";
			// get all the leaves entitle settings
			$data['oldleavedata'] = $this->MMetrices->oldLeaveData();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_oldleavedata";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		  }
		  
		// new leaves entitlement for new quareter
	 function enteroldleave()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter Old Leave";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter Old Leave";
			// get users
			$data['users'] = $this->MMetrices->getUsers();
			
			if($this->input->post('quarter'))
			 {
			   $month=$_POST['month'];
			   $quarter=$_POST['quarter'];
			   $year=$_POST['year'];
			   $leave=$_POST['leavetaken'];
			   $user=$_POST['user'];
			   $count=count($_POST['user']);
			    for($i=0; $i<$count; $i++)
				  {
				    $data = array(
					'users' => $user[$i],
					'month' => $month,
					'quarter' => $quarter,
					'year' => $year,
					'leavetaken' => $leave[$i],
					'date' => date('Y-m-d'),
					'is_entered' =>1,
					);
				  $this->MMetrices->addOldleave($data);
				  }
			  // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Data has been entered successfully.');
					   redirect('metrices/admin/admin/','refresh');
			 }
		   else{
              // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_enteroldleave";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
           }
		   // leave data 
	  function oldWorkHour()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Old Work Hour Data";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Old Work Hour Data";
			// get all the leaves entitle settings
			$data['oldworkhourdata'] = $this->MMetrices->oldWorkHourData();
			 // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_oldworkhourdata";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			
		  }
		  
		// new leaves entitlement for new quareter
	 function enteroldworkhour()
	      {
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter Work Hour Data";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter Work Hour Data";
			// get users
			$data['users'] = $this->MMetrices->getUsers();
			
			if($this->input->post('quarter'))
			 {
			   $month=$_POST['month'];
			   $quarter=$_POST['quarter'];
			   $year=$_POST['year'];
			   $workhour=$_POST['workhour'];
			   $user=$_POST['user'];
			   $count=count($_POST['user']);
			    for($i=0; $i<$count; $i++)
				  {
				    $data = array(
					'users' => $user[$i],
					'month' => $month,
					'quarter' => $quarter,
					'year' => $year,
					'workhour' => $workhour[$i],
					'date' => date('Y-m-d'),
					'is_entered' =>1,
					);
				  $this->MMetrices->addOldworkhour($data);
				  }
			  // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Data has been entered successfully.');
					   redirect('metrices/admin/admin/','refresh');
			 }
		   else{
              // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_metrices_enteroldworkhour";
	        $data['module'] = 'metrices';
	        $this->load->view($this->_container,$data);
			}
           }
		
}//end class
?>
