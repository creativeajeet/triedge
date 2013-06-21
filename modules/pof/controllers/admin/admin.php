<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
    function Admin(){
   	parent::Admin_Controller();
		    // Check for access permission
			check('Pof');
			// Load models and language
			$this->load->model('MPof');
			$this->load->module_model('auth','User_model');
			$this->load->module_model('companies', 'MCompany');
			$this->load->module_model('worksheet', 'MWorksheet');
			$this->load->module_model('candidates', 'MCandidate');
			$this->load->module_model('messege','MMessege');
			$this->load->module_model('segment', 'MSegment');

			$this->load->model('dropdown_model');
			$this->load->model('MChain');
			$this->load->language('customer');
			// Set breadcrumb(navigation). This tells where you are while accessing this software.
			$this->bep_site->set_crumb('Pof','pof/admin');
			$this->load->helper('date');
	}
	
    // This loads all the POF's record
	function index(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
			
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	    $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/pof/admin/index/';
		$config['total_rows'] = $this->MPof->record_count();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 19;
$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		// Loads all the POF's record
            $data['results'] =  $this->MPof->getAllRecord($limit,$column_name,$order);
			$data['links'] = $this->pagination->create_links();
			$data['column_name']=$column_name;
		$data['order']=$order;
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_home";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
    //
	function getGrade(){
            if('IS_AJAX') {
			  	$data['option_gradeid'] = $this->MPof->getGradeList();		
		    $this->load->view('admin/gradelist',$data);
			      }
			
	}
	
	function getLevel(){
            if('IS_AJAX') {
			  	$data['option_levelid'] = $this->MPof->getLevelList();		
		    $this->load->view('admin/levellist',$data);
			      }
			
	}
	
	function getHiringManager(){
            if('IS_AJAX') {
			  	$data['hiringmanager'] = $this->MPof->getHiringManagerList();		
		    $this->load->view('admin/hiringmanager',$data);
			      }
			
	}
	
	function getClientManager(){
            if('IS_AJAX') {
			  	$data['clientmanager'] = $this->MPof->getClientManagerList();		
		    $this->load->view('admin/clientmanager',$data);
			      }
			
	}
	// This loads all the POF's record
	function filterpos(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		
		$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	    $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
		$pofno = $this->input->post('pofno');
		$dor = $this->input->post('dor');
		$jobtitle = $this->MPof->searchterm_handler_jobtitle($this->input->get_post('jobtitle',TRUE));
		$company = $this->MPof->searchterm_handler_company($this->input->get_post('company',TRUE));
		$location = $this->MPof->searchterm_handler_location($this->input->get_post('location',TRUE));
		$grade = $this->MPof->searchterm_handler_grade($this->input->get_post('grade',TRUE));
		$salary = $this->MPof->searchterm_handler_salary($this->input->get_post('salary',TRUE));
		$posstatus = $this->MPof->searchterm_handler_posstatus($this->input->get_post('posstatus',TRUE));
		$consul = $this->MPof->searchterm_handler_consul($this->input->get_post('consul',TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/pof/admin/filterpos/';
		$config['total_rows'] = $this->MPof->record_count();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 19;
$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		// Loads all the POF's record
            $data['results'] =  $this->MPof->getFilterRecord($limit,$pofno,$dor,$column_name,$order,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul);
			$data['links'] = $this->pagination->create_links();
			$data['column_name']=$column_name;
		$data['order']=$order;
		$data['pofno'] = $pofno;
		$data['dor'] = $dor;
		$data['jobtitle'] = $jobtitle;
		$data['company'] = $company;
		$data['location'] = $location;
		$data['grade'] = $grade;
		$data['salary'] = $salary;
		$data['posstatus'] = $posstatus;
		$data['consul'] = $consul;
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_filterpos";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
    //
	
	// This loads all the POF's record
	function filterposunalloc(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		
		$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	    $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
		$pofno = $this->input->post('pofno');
		$dor = $this->input->post('dor');
		$jobtitle = $this->MPof->searchterm_handler_jobtitle($this->input->get_post('jobtitle',TRUE));
		$company = $this->MPof->searchterm_handler_company($this->input->get_post('company',TRUE));
		$location = $this->MPof->searchterm_handler_location($this->input->get_post('location',TRUE));
		$grade = $this->MPof->searchterm_handler_grade($this->input->get_post('grade',TRUE));
		$salary = $this->MPof->searchterm_handler_salary($this->input->get_post('salary',TRUE));
		$posstatus = $this->MPof->searchterm_handler_posstatus($this->input->get_post('posstatus',TRUE));
		$consul = $this->MPof->searchterm_handler_consul($this->input->get_post('consul',TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/pof/admin/filterpos/';
		$config['total_rows'] = $this->MPof->record_count();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 19;
$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		// Loads all the POF's record
            $data['results'] =  $this->MPof->getFilterRecordUn($limit,$pofno,$dor,$column_name,$order,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul);
			$data['links'] = $this->pagination->create_links();
			$data['column_name']=$column_name;
		$data['order']=$order;
		$data['pofno'] = $pofno;
		$data['dor'] = $dor;
		$data['jobtitle'] = $jobtitle;
		$data['company'] = $company;
		$data['location'] = $location;
		$data['grade'] = $grade;
		$data['salary'] = $salary;
		$data['posstatus'] = $posstatus;
		$data['consul'] = $consul;
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_filterposunalloc";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
    //
	
	// This loads all the POF's record which are filtered by date
	function filterbyDate(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	// Loads all the POF's record
			$from = $this->input->post('from');
			$to = $this->input->post('to');
			$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	        $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
            $data['results'] =  $this->MPof->getAllPofbtDate($from,$to,$column_name,$order);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_home";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }//
	//
	   
	   function changeStatus()
	    {
		  
		  $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		  if(($this->input->post('change')))
		   {
		    if(($this->input->post('pos_status'))) 
		   {
		    $p_id = $_POST['pof_id'];
			$sta = $_POST['pos_status'];
			$count = count($p_id);
			  for($i=0; $i<$count; $i++)
			   {
			    $pid= $p_id[$i];
			    $posstatus = $sta[$i];
				$this->MPof->updateStatus($pid,$posstatus);
			   }
			  
		   }
		   if(($this->input->post('focus'))) 
		   {
		    $p_id = $_POST['pof_fo'];
			$foc = $_POST['focus'];
			$count = count($foc);
			  for($i=0; $i<$count; $i++)
			   {
			    $pid= $p_id[$i];
			    $focus = $foc[$i];
				$this->MPof->updateFocus($pid,$focus);
			   }
			  
		   }
		   if(($this->input->post('closure'))) 
		   {
		    $p_id = $_POST['pof_cl'];
			$clo = $_POST['closure'];
			$count = count($clo );
			  for($i=0; $i<$count; $i++)
			   {
			    $pid= $p_id[$i];
			    $closure = $clo[$i];
				$this->MPof->updateClosure($pid,$closure);
			   }
			  
		   }
		   if($this->input->post('pofid'))
			 {
			 
			  $pofid = $this->input->post('pofid');
		      $count = count($pofid);
			   for($i=0; $i<$count; $i++)
			    {
				$pof_id = $pofid[$i];
		     $this->MPof->enterTalk($pof_id);	
			  }
			 }
			 
			 redirect('pof/admin/'.$page,'refresh');
		  }
		}
		//
	//column sorting
	function columnSort()
	{
	     // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
			
		$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$column = $this->input->post('column_name');
		$order = $this->input->post('order');
		$data['results'] =  $this->MPof->sortColumn($column,$order);
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_home";
	       $data['module'] = 'pof';
	       $this->load->view($this->_container,$data);		
	}
	
	// column sort allocated
	//column sorting
	function columnSortAllocated()
	{
	     // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
			
		$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$column = $this->input->post('column_name_pof');
		$order = $this->input->post('order_pof');
		$data['results'] =  $this->MPof->sortColumnAllocated($column,$order);
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_allocated";
	       $data['module'] = 'pof';
	       $this->load->view($this->_container,$data);		
	}
	//
	 // This loads all the POF's record which are allocated 
	function managerlist(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	// Loads all the POF's record
			// Loads all the POF's record
			if($this->input->post('pof_id'))
			 {
			 
			  $pofid = $this->input->post('pof_id');
		
		     $this->MPof->enterTalk($pofid);	
			 }
            $column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	        $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
            $data['results'] =  $this->MPof->getAllRecordAllocated($column_name,$order);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_managerlist";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }//
	  // This loads all the POF's record which are allocated 
	function sortmanagerlist(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	// Loads all the POF's record
			// Loads all the POF's record
			if($this->input->post('pof_id'))
			 {
			 
			  $pofid = $this->input->post('pof_id');
		
		     $this->MPof->enterTalk($pofid);	
			 }
		$column_name = $this->input->get_post('column_name');
	    $order = $this->input->get_post('order');
            $data['results'] =  $this->MPof->getManagerList($column_name,$order);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_managerlist";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }//
	 // This loads all the POF's record which are allocated 
	function allocated(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	// Loads all the POF's record
			$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	        $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
			$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/pof/admin/allocated/';
		$config['total_rows'] = $this->MPof->record_count_allocated();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 19;
$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
            $data['results'] =  $this->MPof->getAllRecordAllocated($limit,$column_name,$order);
			$data['links'] = $this->pagination->create_links();
			$data['column_name']=$column_name;
		   $data['order']=$order;
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_allocated";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }//
	   // This loads all the POF's record which are unallocated 
	function unallocated(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	// Loads all the POF's record
			$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	        $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
            $data['results'] =  $this->MPof->getAllRecordUnAlloc($column_name,$order);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_unalloc";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
	  //
	   // This loads all the POF's record which are active
	function allActive(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	// Loads all the POF's record
			$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	        $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
            $data['results'] =  $this->MPof->getAllActiveRecord($column_name,$order);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_allactive";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }//
	  
	  
	  // This loads all the POF's record
	function filterActive(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MPof->searchterm_handler_order($this->input->get_post('order', TRUE));
		$pofno = $this->input->post('pofno');
		$dor = $this->input->post('dor');
		$jobtitle = $this->MPof->searchterm_handler_jobtitle($this->input->get_post('jobtitle',TRUE));
		$company = $this->MPof->searchterm_handler_company($this->input->get_post('company',TRUE));
		$location = $this->MPof->searchterm_handler_location($this->input->get_post('location',TRUE));
		$grade = $this->MPof->searchterm_handler_grade($this->input->get_post('grade',TRUE));
		$salary = $this->MPof->searchterm_handler_salary($this->input->get_post('salary',TRUE));
		$posstatus = $this->MPof->searchterm_handler_posstatus($this->input->get_post('posstatus',TRUE));
		$consul = $this->MPof->searchterm_handler_consul($this->input->get_post('consul',TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/pof/admin/index/';
		$config['total_rows'] = $this->MPof->record_count();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 19;
$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		// Loads all the POF's record
            $data['results'] =  $this->MPof->getFilterRecordActive($config['per_page'],$limit,$pofno,$dor,$column_name,$order,$jobtitle,$company,$location,         $grade,$salary,$posstatus,$consul);
			$data['links'] = $this->pagination->create_links();
			$data['column_name']=$column_name;
		$data['order']=$order;
		$data['pofno'] = $pofno;
		$data['dor'] = $dor;
		$data['jobtitle'] = $jobtitle;
		$data['company'] = $company;
		$data['location'] = $location;
		$data['grade'] = $grade;
		$data['salary'] = $salary;
		$data['posstatus'] = $posstatus;
		$data['consul'] = $consul;
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_allactive";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
    //
	  // This loads all the POF's record which are unallocated 
	function not_pursuing(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Pof List";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Pof List';
          	// Loads all the POF's record
            $data['results'] =  $this->MPof->getAllRecordNotPursue();
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_notpursue";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
	  //
    // attchment pop up
	
	  function viewJD()
	    {
		  $id = $this->uri->segment(4);
		  $data['jd'] = $this->MPof->getJD($id);
		  $this->load->view('admin/admin_pof_jd',$data);
		 }
	 //        
	 // This creates a new pof.
     function newpof(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
            $data['title'] = "Enter New Project";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter New Project";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter New Project','pof/admin/enter_newpof');
			// This gets the pof id for newly created pof.
	        $data['clients'] = $this->MPof->getClientDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MPof->getConsulName();
			$data['hiringmanager'] = $this->MPof->getHRManager();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$username = $this->session->userdata('id');
		    $data['worksheet']= $this->MPof->getUserWorksheet($username);
			$data['admins'] = $this->MPof->getAdminClientMgr();
			$lastpid = $this->MPof->getLastPofId();  
			$pid = $lastpid+1;
			$data['pid'] = $lastpid+1;
            if ($this->input->post('client_id')){
            $id = $this->input->post('pof_id');
			 $admins = $_POST['admins'];
			 $jobtitle = $_POST['jobtitle'];
			 $enterby = $this->session->userdata('id');
			 $count = count($admins);
			   for($i=0; $i<$count; $i++)
				    {
					  $data = array(
					  'type' => 'position_uploaded',
					  'title' => 'New Position Uploaded',
					  'send_to' => $admins[$i],
					  'msg' => 'Position - '.$jobtitle.' has been uploaded.',
					  'sent_by' => $enterby,
					  'sent_on' => date('Y-m-d H:i:s'),
					  );
					$this->MPof->sendMsg($data);			  
				 }
			 $this->MPof->enterNewPof($pid);
		    $pof_id=$this->db->insert_id(); 
			// add to my worksheet
			if ($this->input->post('myworksheet')){
			  $worksheet_details = array(
				'pof_id' => $pof_id,
				'worksheet_id'=>$this->input->post('myworksheet'),
				);
			    $this->MPof->addworksheet($worksheet_details); 
			   }
			 
	        //			
			// for multiple worksheets
			if ($this->input->post('constituentpull')){
			 $constituent = $_POST['constituentpull'];
			  $count_w = count($_POST['constituentpull']);
			   for($j=0; $j<$count_w; $j++)
			   {
			    $worksheet_details = array(
				'pof_id' => $pof_id,
				'worksheet_id'=>$constituent[$j],
				);
			    $this->MPof->addworksheet($worksheet_details); 
			   }
			  }
	        //			 
		    // for Hiring Manager Detils
			if($this->input->post('h_name'))
			 {
			 $name = $_POST['h_name'];
			 $designation = $_POST['h_designation'];
			 $telephone = $_POST['h_telephone'];
			 $mobile = $_POST['h_mobile'];
			 $email = $_POST['h_email'];
			  $count_hiring_mgr = count($_POST['h_name']);
			    for($i=0; $i<$count_hiring_mgr; $i++)
				 {
				   $hiring_mgr_details = array(
				   'pof_id' => $pof_id,
				   'name' => $name[$i],
				   'designation' => $designation[$i],
				   'telephone' => $telephone[$i],
				   'mobile' => $mobile[$i],
				   'email' => $email[$i],
				   );
				  $this->MPof->addHiringMgr($hiring_mgr_details);
				 }
				}
				//
				// for commitments
				if($this->input->post('commit_comment'))
				{
				 $commitment_comment = $_POST['commit_comment'];
				  $commitment_date = $_POST['commit_date'];
				   $count_commit = count($_POST['commit_comment']);
				    for($k=0; $k<$count_commit; $k++)
					{
					 $commitment = array(
					 'pof_id' => $pof_id,
					 'comment' => $commitment_comment[$k],
					 'date' => $commitment_date[$k],
					 );
					$this->MPof->addCommitment($commitment);
					}
				 }
			 if(isset($_POST['go']))
					 {
					  $file =  $_SERVER['DOCUMENT_ROOT']."/public/JD/" ;
					   $config = array(
					   'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			            'upload_path' => $file,
			             'max_size' => 2000
		                  );
					$this->load->library('upload', $config);
					 $this->upload->do_upload();
					 $pof_attachment_data = $this->upload->data();
					  $this->load->database();
					   $attachemnt_details = array(
					    'pof_id' => $pid,
						'filename' => $pof_attachment_data['file_name'],
						'filepath' => $pof_attachment_data['full_path']
						);
					  $this->MPof->do_upload($attachemnt_details);
					 $fileid = $this->db->insert_id();
					 $this->MPof->updateFileView($pid,$fileid);
					 flashMsg('success','Attached successfully.');
	                redirect('pof/admin/editPof/'.$pid,'refresh');
					 }
		        // This flags the messege about that a new pof has been created successfully.				  
		      flashMsg('success','New pof created.');
	        redirect('pof/admin/'.$id,'refresh');
          }
	 
	   else{
	             // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_create";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data );
				 //
           }
       }
	  // This updates a pof.
	  function editPof(){
	        // This shows the module name user is accessing, as a title in browser.
			$data['title'] = "Edit Pof";
			// This shows the module name user is accessing, as a header(tab name) in the browser.
			$data['header'] = "Edit Pof";
			// This gets the pof id ,user wants to edit.
			$page = $this->uri->segment(5);
			$pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
	        $data['clients'] = $this->MCompany->getClientDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['hiringmanager'] = $this->MPof->getHRManager();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$data['grade'] = $this->MPof->getGrades($pid);
			$data['level'] = $this->MPof->getLevels($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MPof->getConsulName();
			$username = $this->session->userdata('id');
		    $data['worksheet']= $this->MPof->getUserWorksheet($username);
			if ($this->input->post('client_id')){
            $pid = $this->uri->segment(4);
			$this->MPof->updatePof($pid);
			if(isset($_POST['go']))
					 {
					  $file =  $_SERVER['DOCUMENT_ROOT']."/public/JD/" ;
					   $config = array(
					   'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			            'upload_path' => $file,
			             'max_size' => 2000
		                  );
					$this->load->library('upload', $config);
					 $this->upload->do_upload();
					 $pof_attachment_data = $this->upload->data();
					  $this->load->database();
					   $attachemnt_details = array(
					    'pof_id' => $pid,
						'filename' => $pof_attachment_data['file_name'],
						'filepath' => $pof_attachment_data['full_path']
						);
					  $this->MPof->do_upload($attachemnt_details);
					 $fileid = $this->db->insert_id();
					 $this->MPof->updateFileViewe($pid,$fileid);
					 flashMsg('success','Attached successfully.');
	        redirect('pof/admin/'.$page.'/'.$pid,'refresh');
					 }
			// adds worksheets
			// for multiple worksheets
			if ($this->input->post('constituentpull')){
			 $constituent = $_POST['constituentpull'];
			  $count_w = count($_POST['constituentpull']);
			   for($j=0; $j<$count_w; $j++)
			   {
			    $worksheet_details = array(
				'pof_id' => $pid,
				'worksheet_id'=>$constituent[$j],
				);
			    $this->MPof->addworksheet($worksheet_details); 
			   }
			   }
			   // for Hiring Manager Detils
			if($this->input->post('h_name'))
			 {
			 $name = $_POST['h_name'];
			 $designation = $_POST['h_designation'];
			 $telephone = $_POST['h_telephone'];
			 $mobile = $_POST['h_mobile'];
			 $email = $_POST['h_email'];
			  $count_hiring_mgr = count($_POST['h_name']);
			    for($i=0; $i<$count_hiring_mgr; $i++)
				 {
				   $hiring_mgr_details = array(
				   'pof_id' => $pid,
				   'name' => $name[$i],
				   'designation' => $designation[$i],
				   'telephone' => $telephone[$i],
				   'mobile' => $mobile[$i],
				   'email' => $email[$i],
				   );
				  $this->MPof->editHiringMgr($hiring_mgr_details,$pid);
				 }
				}
				//
				// for commitments
				if($this->input->post('commit_comment'))
				{
				 $commitment_comment = $_POST['commit_comment'];
				  $commitment_date = $_POST['commit_date'];
				   $count_commit = count($_POST['commit_comment']);
				    for($k=0; $k<$count_commit; $k++)
					{
					 $commitment = array(
					 'pof_id' => $pid,
					 'comment' => $commitment_comment[$k],
					 'date' => $commitment_date[$k],
					 );
					$this->MPof->editCommitment($commitment,$pid);
					}
				 }
				 
	        //	
			// delete Jds
			  if($this->input->post('delJD'))	
			    {
				 $jd = $this->input->post('chk');
				 $this->MPof->delJD($jd);
				}	
			 // This flags the messege about that a new pof has been created successfully.				  
		      flashMsg('success','Pof has been updated.');
	        redirect('pof/admin/'.$page.'/'.$pid,'refresh');
			
			}
			
			else{
			     // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
			     // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_edit";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
			}
		  }
		 //
	 // attchment pop up
	
	  function viewattachment()
	    {
		  $id = $this->uri->segment(4);
		  $data['jd'] = $this->MPof->getAttach($id);
		  $this->load->view('admin/admin_pof_jd',$data);
		 }
	 //     
	 // this deletes worksheet from pof
	  function deleteworksheet()
	    {
		 $p_id = $this->uri->segment(4);
		 $id = $this->uri->segment(5);
		 $this->MPof->deleteworksheet($id);
		 $this->session->set_flashdata('message','Worksheet has been deleted.');
		 redirect('pof/admin/editPof/'.$p_id,'refresh');
		}
      // This enters a new VC
      function enterVC(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			////
			 // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
			// This gets the pof id for newly created pof.
	       $data['clients'] = $this->MCompany->getClientDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MPof->getConsulName();
			
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			  if($this->input->post('kra'))
			   {
	            $this->MPof->enterNewvc($pid);
				}
				if($this->input->post('linki'))
				  {
				  // This enters the multiple linkages(internal) for a particular VC.
	             $linki=$_POST['linki'];
	                $count = count($_POST['linki']);
                         for($i=0; $i<$count; $i++) {
	                            $linki_details=array(
											'pofid' 	=> $pid,
											'linki'     => $linki[$i],
									               );
	                            $this->MPof->addLinki($linki_details);
						 }
				  }
				  //
				  if($this->input->post('linke'))
				  {
				 // This enters the multiple linkages(external) for a particular VC.
	             $linke=$_POST['linke'];
	                $count = count($_POST['linke']);
	                     for($i=0; $i<$count; $i++) {
	                            $linke_details=array(
											'pofid' 	=> $pid,
											'linke'       => $linke[$i],
													);
	                            $this->MPof->addLinke($linke_details);
						 }
						}
				 //
				  if($this->input->post('indus_tag'))
				  {
				 // This enters the multiple industry tags for a particular VC.		 
	             $indus_tag=$_POST['indus_tag'];
	                $count = count($_POST['indus_tag']);
	                     for($i=0; $i<$count; $i++){
				                 $indus_tag_details = array(
						                     'pofid' 	=> $pid,
									         'indus_tag'  => $indus_tag[$i],
									   );
						          $this->MPof->addIndusTag($indus_tag_details);
						 }
						 }
				  //
				   if($this->input->post('func_tag'))
				  {
				  // This enters the multiple function tags for a particular VC.		 		 
	              $func_tag=$_POST['func_tag'];
	                  $count = count($_POST['func_tag']);
	                      for($i=0; $i<$count; $i++){
				                  $func_tag_details = array(
						                      'pofid' 	=> $pid,
									          'func_tag'  => $func_tag[$i],
									   );
						          $this->MPof->addFuncTag($func_tag_details);
						 }
						 }
				   //
				    if($this->input->post('personality_tag'))
				  {
				   // This enters the multiple personality tags for a particular VC.		 	 
	              $personality_tag=$_POST['personality_tag'];
	                  $count = count($_POST['personality_tag']);
	                       for($i=0; $i<$count; $i++){
				                   $personality_tag_details = array(
						                      'pofid' 	=> $pid,
									          'personality_tag' => $personality_tag[$i],
									   );
						          $this->MPof->addPersonalityTag($personality_tag_details);
						 }
						 }				 
					//
					 if($this->input->post('geog_span_tag'))
				  {
					// This enters the multiple geography tags for a particular VC.		 
	               $geog_span_tag=$_POST['geog_span_tag'];
	                   $count = count($_POST['geog_span_tag']);
	                        for($i=0; $i<$count; $i++){
				                   $geog_span_tag_details = array(
						                       'pofid' 	=> $pid,
									           'geog_span_tag' => $geog_span_tag[$i],
									   );
						           $this->MPof->addGeogSpanTag($geog_span_tag_details);
						 }
						 }
				    //
					
		 if($this->input->post('tag_name'))
		    {
			  $tagname = $_POST['tag_name'];
			 $count = count($tagname);
			   for($i=0; $i<$count; $i++)
			     {
				  $tagdata = array(
				   'tagv_id' => $tagname[$i],
				   'pof_id' => $pid,
				  );
				  $this->MPof->addTagVC($tagdata);
				 }
			   //
		       
			
	   }
	    
			   flashMsg('success','New Tag has been created successfully.');
	          redirect('pof/admin/posPage/'.$pid,'refresh');
       }
 // 

 // 
 // enters search strategy
      function posStrategy()
	     {
		    $pofid = $this->uri->segment(4);
		    if($this->input->post('keysell'))	
			   {
		   // This enters the multiple key selling propositions for a particular VC.
		          if($this->input->post('keysell'))	
				   {	 	 					 
	               $keysell=$_POST['keysell'];
	                    $count = count($_POST['keysell']);
	                        for($i=0; $i<$count; $i++) {
	                                $sell_details=array(
											    'pofid'    => $pofid,
											    'keysell'  => $keysell[$i],
									   );
	                                $this->MPof->addKeysell($sell_details);
						 }
						}
					//
					// This enters the multiple key evaluation points for a particular VC.	
				 if($this->input->post('keyeva'))	
				     {	  
	                $keyeva=$_POST['keyeva'];
	                     $count = count($_POST['keyeva']);
                             for($i=0; $i<$count; $i++) {
	                                 $eva_details=array(
											     'pofid'    => $pofid,
											     'keyeva'   => $keyeva[$i],
				     					);
	                                 $this->MPof->addKeyeva($eva_details);
						 }
					  }
				    //
				    // This enters the multiple target companies for a particular VC.	
					elseif($this->input->post('target_comp'))	
				     {	 
				    $tcomp=$_POST['target_comp'];
	                      $count = count($_POST['target_comp']);
                              for($i=0; $i<$count; $i++) {
	                                  $tcomp_details=array(
											     'pofid' 	 => $pofid,
											     'target_comp'   =>$tcomp[$i],
										);
	                                  $this->MPof->addTargetComp($tcomp_details);
						 }	
						}
					//
					// This enters the multiple excluded companies for a particular VC.	
				  elseif($this->input->post('exclude_comp'))	
				   {
				    $ecomp=$_POST['exclude_comp'];
	                       $count = count($_POST['exclude_comp']);
           	                   for($i=0; $i<$count; $i++) {
	                                   $ecomp_details=array(
											      'pofid' 	  => $pofid,
											      'exclude_comp'=> $ecomp[$i],
										);
	                                   $this->MPof->addExcludeComp($ecomp_details);
						 }						 				 
						} 
					//
					
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
		 }
		 }
      function posPage(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
		$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManagerEdit($pid);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		
	       $data['clients'] = $this->MCompany->getClientDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$data['grade'] = $this->MPof->getGrades($pid);
			$data['level'] = $this->MPof->getLevels($pid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			$data['tagtype'] = $this->MSegment->getTagType();
			$data['tags'] =  $this->MPof->getAllTags($pid);
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['tags'] =  $this->MPof->getAllTags($pid);
			$data['worksheetcomp'] =  $this->MPof->getWorksheetComp();
			// This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
			 // get the no. of candidates added to position
			 // load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/posPage/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countCand($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
	             $data['master'] = $this->MPof->countCand($pid);
				 $data['candstagespre'] = $this->MPof->getCandStagesPre();
				 // get the list of candidates added to position
				 $data['position_databank'] = $this->MPof->getPosDatabank($pid,$limit);
			$data['links'] = $this->pagination->create_links();
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				 // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
				 // get all tags
				 $data['alltags'] = $this->MPof->getAllTags($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_position_page";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   function posPageEdit(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
		$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManagerEdit($pid);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		
	       $data['clients'] = $this->MCompany->getClientDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$data['grade'] = $this->MPof->getGrades($pid);
			$data['level'] = $this->MPof->getLevels($pid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			$data['tagtype'] = $this->MSegment->getTagType();
			$data['tags'] =  $this->MPof->getAllTags($pid);
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['tags'] =  $this->MPof->getAllTags($pid);
			$data['worksheetcomp'] =  $this->MPof->getWorksheetComp();
			// This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
			 // get the no. of candidates added to position
			 // load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/posPageEdit/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countCand($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

			 $this->pagination->initialize($config);
	             $data['master'] = $this->MPof->countCand($pid);
				 $data['candstagespre'] = $this->MPof->getCandStagesPre();
				 // get the list of candidates added to position
				 $data['position_databank'] = $this->MPof->getPosDatabank($pid,$limit);
			$data['links'] = $this->pagination->create_links();
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				 // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
				 // get all tags
				 $data['alltags'] = $this->MPof->getAllTags($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "search_result_duplicate";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   ////////duplication Remover////////////
	   
	   	function dupRemover()
		  {
		   $pofno = $this->uri->segment(4);
		   $pageno = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
		      if($this->input->post('save'))
			   {
			   if($this->input->post('cup_id'))
			    {
				  $user = $this->session->userdata('username');
				  $cupid = $_POST['cup_id'];
				 $candidate_nameu = $this->input->post('candidate_name');
			$telephoneu = $_POST['telephone'];
			$emailu = $this->input->post('email');
			$current_locationu = $this->input->post('current_location');
			$regionu = $this->input->post('region');
			$current_companyu = $this->input->post('current_company');
			$job_titleu = $this->input->post('job_title');
			$departmentu = $this->input->post('department');
			$designationu = $this->input->post('designation');
			$gradeu = $this->input->post('grade');
			$levelu = $this->input->post('level');
			$salaryu = $this->input->post('salary');
	 		$in_current_company_sinceu = $this->input->post('in_current_company_since');
			$reports_tou = $this->input->post('reports_to');
			$current_roleu = $this->input->post('current_role')."- By- ".$user."-".date('Y-m-d H:i:s');
			$previous_companyu = $this->input->post('previous_company');
			$courseu = $this->input->post('course');
			$instituteu = $this->input->post('institute');
			$year_of_passingu = $this->input->post('year_of_passing');
			$year_of_birthu = $this->input->post('year_of_birth');
			$profile_briefu = $this->input->post('profile_brief');
			$commentu = $this->input->post('comment');
			$industryu = $this->input->post('industry');
			$subindustryu = $this->input->post('sub_industry');
			$indfunctionu = $this->input->post('indfunction');
			$subfunctionu = $this->input->post('sub_function');
				  $countu = count($_POST['cup_id']);
				    for($j=0; $j<$countu; $j++)
					{
					 $id = $cupid[$j];
					 $data = array( 
		    'id' => $id,
			
			'telephone' => $telephoneu[$j],
			'email' => $emailu[$j],
			'current_location' => $current_locationu[$j],
			'region' => $regionu[$j],
			'current_company' => $current_companyu[$j],
			'job_title' => $job_titleu[$j],
			'department' => $departmentu[$j],
			'designation' => $designationu[$j],
			'grade' => $gradeu[$j],
			'level' => $levelu[$j],
			'salary' => $salaryu[$j],
	 		'in_current_company_since' => $in_current_company_sinceu[$j],
			'reports_to' => $reports_tou[$j],
			'current_role' => $current_roleu[$j],
			'previous_company' => $previous_companyu[$j],
			'course' => $courseu[$j],
			'institute' => $instituteu[$j],
			'year_of_passing' => $year_of_passingu[$j],
			'year_of_birth' => $year_of_birthu[$j],
			'profile_brief' => $profile_briefu[$j],
			'industry' => $industryu[$j],
			'sub_industry' => $subindustryu[$j],
			'indfunction' => $indfunctionu[$j],
			'sub_function' => $subfunctionu[$j],
			'comment' => $commentu[$j],
			'last_updated' => date('Y-m-d H:i:s'),
			'last_updated_by' => $user,
			);
				$this->MPof->upCandidate($id,$data); 
				 
					}
							
					
				}
			   if($this->input->post('cdel_id'))
			   {
			     $cdelid=$_POST['cdel_id'];
			     $count = count($_POST['cdel_id']);
				  for($i=0; $i<$count; $i++)
				   {
				    $candidateid = $cdelid[$i];
	                $this->MPof->delCandDB($candidateid);
					$this->MPof->deletefrompos($candidateid,$pofno);
					$this->MPof->delCandDBW($candidateid);
				   }
			   }
			 if($this->input->post('crem_id'))
			   {
			     $cremid=$_POST['crem_id'];
			     $count = count($_POST['crem_id']);
				  for($k=0; $k<$count; $k++)
				   {
				    $candidateid = $cremid[$k];
	               $this->MPof->deletefrompos($candidateid,$pofno);
				   }
			   }
				// This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Database has been updated successfully.');
					   redirect('pof/admin/posPageEdit/'.$pofno.'/'.$pageno,'refresh');
			 }
			 // jump to page
			 if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jump');
				$pageno = ($page*20)-1;
				redirect('pof/admin/posPageEdit/'.$pofno.'/'.$pageno,'refresh');
				
			   }
		 }
    // for candidates shortlisted by consultant
	 function conShort(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			 $data['candstagespre'] = $this->MPof->getCandStagesPre();
			// load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/conShort/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countShort($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the list of candidates added to position
				 $data['shortlisted_databank'] = $this->MPof->getShortlistedDatabank($pid,$limit);
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
	             //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				 
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_cand_short";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   
	    // for candidates shortlisted by consultant
	 function clientShort(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespost'] = $this->MPof->getCandStagesPost();
			// load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/conShort/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countClientShort($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the list of candidates added to position
				 $data['clientshortlisted_databank'] = $this->MPof->getClientShortlistedDatabank($pid,$limit);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
	             //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_short";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   
	    // for candidates shortlisted by consultant
	 function finalround(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespost'] = $this->MPof->getCandStagesPost();
			// load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/finalround/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countFinalRound($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the list of candidates added to position
				 $data['finalround_databank'] = $this->MPof->getFinalRoundDatabank($pid,$limit);
				 // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
	             //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				  // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_finalround";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   
	     // for candidates shortlisted by consultant
	 function posclosed(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespost'] = $this->MPof->getCandStagesPost();
			// load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/posclosed/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countPosClosed($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the list of candidates added to position
				 $data['posclosed_databank'] = $this->MPof->getPosClosedDatabank($pid,$limit);
				 // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
	             //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				  // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_posclosed";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   
	   // for candidates shortlisted by consultant
	 function candjoined(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespost'] = $this->MPof->getCandStagesPost();
			// load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/candjoined/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countCandJoined($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the list of candidates added to position
				 $data['candjoined_databank'] = $this->MPof->getCandJoinedDatabank($pid,$limit);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	             //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				  // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_candjoined";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   
	      // for candidates shortlisted by consultant
	 function candOffer(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			// load the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/conShort/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countCandOffer($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the list of candidates added to position
				 $data['candoffer_databank'] = $this->MPof->getCandOfferDatabank($pid,$limit);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
	             //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_cand_offer";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	  
		
	     function clientChange()
	    {
		  
		  $class = $this->uri->segment(4);
		  $pid = $this->uri->segment(5);
		  $page = ($this->uri->segment(6))? $this->uri->segment(6) : 0;
		  if(($this->input->post('stage')))
		   {
		    $s_id = $_POST['s_id'];
			$sta = $_POST['stage'];
			$count = count($s_id);
			  for($i=0; $i<$count; $i++)
			   {
			    $sid= $s_id[$i];
			    $stage = $sta[$i];
				$this->MPof->clientChange($sid,$stage);
			   }
			  redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
		   }
		  
		}
		// for cvsent client changes
		function clientChangeCVsent()
	    {
		  
		  $class = $this->uri->segment(4);
		  $pid = $this->uri->segment(5);
		  $page = ($this->uri->segment(6))? $this->uri->segment(6) : 0;
		  if(($this->input->post('stage')))
		   {
		    $s_id = $_POST['s_id'];
			$sta = $_POST['stage'];
			$sharedont = $_POST['sharedon'];
			$count = count($s_id);
			  for($i=0; $i<$count; $i++)
			   {
			    $sid= $s_id[$i];
			    $stage = $sta[$i];
				$sharedon = $sharedont[$i];
				$this->MPof->clientChangeCvsent($sid,$stage,$sharedon);
			   }
			  redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
		   }
		  
		}
	   //for candidates on hold by consultant
	   function conHold(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespre'] = $this->MPof->getCandStagesPre();
			//loads the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/conHold/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countOnhold($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the list of candidates added to position
				 $data['onhold_databank'] = $this->MPof->getOnholdDatabank($pid,$limit);
				  //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_cand_hold";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   // for candidates rejected by consultant
	   function conRej(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespre'] = $this->MPof->getCandStagesPre();
			//loads the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/conRej/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countReject($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			// get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				 // get the list of candidates added to position
				 $data['rejected_databank'] = $this->MPof->getRejectedDatabank($pid,$limit);
				  //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
			
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	             // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_cand_rej";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   // for candidates rejected by client
	   function clientRej(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespost'] = $this->MPof->getCandStagesPost();
			//loads the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/clientRej/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countClientReject($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			// get the no. of candidates added to reject
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the list of candidates added to position
				 $data['clientrejected_databank'] = $this->MPof->getClientRejectedDatabank($pid,$limit);
				  //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
			
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	             // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_rej";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	    // for candidates duplicate
	   function cvduplicate(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespost'] = $this->MPof->getCandStagesPost();
			//loads the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/cvduplicate/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countCVDuplicate($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			     // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the list of candidates added to position
				 $data['cvduplicate_databank'] = $this->MPof->getClientDuplicateDatabank($pid,$limit);
				  //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
			
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	             // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				  // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_cvduplicate";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   //for ref pool
	   function refPool(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespre'] = $this->MPof->getCandStagesPre();
			//loads the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/refPool/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countRefPool($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				 // get the list of candidates added to position
				 $data['refpool_databank'] = $this->MPof->getRefpoolDatabank($pid,$limit);
				  //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
			
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	            // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				 // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no of candidates added to cvsent
				 $data['cvsent'] = $this->MPof->countCvsent($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_cand_refpool";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
	   //for cv sent
	   function cvSent(){
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Enter VC";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Enter VC";
            // Set breadcrumb(navigation). This tells where you are while accessing this software.
            $this->bep_site->set_crumb('Enter VC','pof/admin/enter_newVC');
		   $pid = $this->uri->segment(4);
			$data['pid'] = $this->uri->segment(4);
			// This gets the pof id for newly created pof.
			$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['mworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['hiringmanager'] = $this->MPof->getHRManager();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
	        $data['clients'] = $this->MPof->getClientsDropdown();
			$data['industries'] = $this->MCompany->getIndustryList();
			$data['functions'] = $this->MCompany->getFunctionList();
			$data['locations'] = $this->MCompany->getLocationList();
			$data['user']= $this->MCandidate->getConsulName();
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
			$data['poscomments'] = $this->MPof->getPosComments($pid);
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['users']= $this->MCandidate->getConsulsDropdown();
			
			// This gets the detail about the pof which user is entering VC for.
            $data['detail'] =  $this->MPof->getSinglePof($pid);
			$data['candstagespost'] = $this->MPof->getCandStagesPost();
			//loads the pagination library
			 $this->load->library('pagination');
			 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
			 $config['base_url']=base_url().'index.php/pof/admin/cvSent/'.$pid.'/';
			 $config['total_rows'] = $this->MPof->countCvsent($pid);
			 $config['per_page']=20;
			 $config['num_links']=19;
			 $config['uri_segment']=5;
			 $this->pagination->initialize($config);
			 // get the no of candidates added to cvsent
				 $data['cvsent'] = $config['total_rows'];
				 // get the list of candidates added to position
				 $data['cvsent_databank'] = $this->MPof->getCvsentDatabank($pid,$limit);
				  //creates links for pagination
				 $data['links'] = $this->pagination->create_links();
			
	      
            if ($this->input->post('jobcri')){
		       
					 //
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','VC has been entered.');
	          redirect('pof/admin/','refresh');
	   }else{    
	             // get the no. of candidates added to position
	             $data['master'] = $this->MPof->countCand($pid);
				 
				 // get the no. of candidates added to shorlist.
				 $data['shortlisted'] = $this->MPof->countShort($pid);
				 // get the no. of candidates added to shorlist.
				 $data['clientshortlisted'] = $this->MPof->countClientShort($pid);
				 // get the no. of candidates added to onhold
				 $data['onhold'] = $this->MPof->countOnhold($pid);
				 // get the no. of candidates added to reject
				 $data['rejected'] = $this->MPof->countReject($pid);
				  // get the no. of candidates rejected by client
				 $data['clientrejected'] = $this->MPof->countClientReject($pid);
				 // get the no. of candidates added to refpool
				 $data['refpool'] = $this->MPof->countRefPool($pid);
				  // get the no. of candidates duplicate
				 $data['cvduplicate'] = $this->MPof->countCVDuplicate($pid);
				 // get the no. of candidates added to offer.
				 $data['candoffer'] = $this->MPof->countCandOffer($pid);
				  // get the no. of candidates added to shorlist.
				 $data['finalround'] = $this->MPof->countFinalRound($pid);
				  // get the no. of candidates added to shorlist.
				 $data['posclosed'] = $this->MPof->countPosClosed($pid);
				 // get the no. of candidates added to shorlist.
				 $data['candjoined'] = $this->MPof->countCandJoined($pid);
	            // This gets the detail about the pof which user is editing..
                 $data['detail'] =  $this->MPof->getSinglePof($pid);
				 // This gets the hiring manager details
				 $data['hiring_mgr'] =  $this->MPof->getPofHiringMgr($pid);
				 // This gets the commitment made to client in POF
				 $data['commitment'] =  $this->MPof->getPofCommitment($pid);
				 // This gets the worksheets
				 $data['worksheet'] =  $this->MPof->getWorksheet($pid);
				  // This gets the worksheets
				 $data['attachment'] =  $this->MPof->getAttachment($pid);
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_cand_cvsent";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
	   //
    /*
      This is for ajax based multi-select dropdowns. 
	 When a user selects industry in target companies, then it gets the list of companies according to the industry selected by user.    
     */
	  function select_company(){
                if('IS_AJAX') {
        	    $data['option_company'] = $this->MPof->getCompanyList();		
		        $this->load->view('admin/company',$data);
             }
   	    }
	  // It gets the list of companies according to the industry selected by user.
	  function select_company_excluded(){
                if('IS_AJAX') {
        	    $data['option_company_ex'] = $this->MPof->getCompanyListEx();		
		        $this->load->view('admin/company_ex',$data);
             }
    	}
	//allocation
	function allocation()
	  {
	   $id = $this->uri->segment(4);
	   $pid = $this->uri->segment(4);
	   $data['commitment'] =  $this->MPof->getPofCommitment($pid);
	   $job_title = $this->uri->segment(5);
	   $data['row'] = $this->MPof->getPos($id);
	   $data['consultant'] = $this->MPof->getUsersDropDown();
	   $data['transimp'] = $this->MPof->getTransDropDown();
	   $data['allocation_details'] = $this->MPof->getAllocDetails($id);
	   $data['pid'] = $this->uri->segment(4);
	   $data['job_title'] = $this->uri->segment(5);
	   if($this->input->post('not_pursuing'))
	   {
	    $pid = $this->uri->segment(4);
	    $this->MPof->upPursue($pid); 
	   flashMsg('success', 'Position is not pursuing.');
			  redirect('pof/admin/allocation/'.$id.'/','refersh');
	   }
	   if($this->input->post('consul'))
	   {
	    $pid = $this->uri->segment(4);
	   $this->MPof->enterAlloc($pid);
	   $alloc_id= $this->db->insert_id();
	    
		$job_title = $_POST['jobtitle'];
			 $consul = $_POST['consul'];
		 $tranctype = $_POST['transaction_type'];
		// $consul1 = $this->MPof->getAllRecordCon($consul);
		 $consul1 = $this->MPof->getAllRecordCon($consul);
		
		 $consuls = implode(",", $consul1);
		  $credit = $_POST['credit'];
		   $start_date = $_POST['doa'];
		    $end_date = $_POST['end_date'];
			 $block_names = $_POST['block_names'];
			 $count = count($_POST['consul']);
			  for($i=0; $i<$count; $i++)
			   {
			   		 $allocation_details=array(
				                            'pof_id' => $pid,
								            'alloc_id' => $alloc_id,
											'event_name' => $job_title,
											'start_date' => $start_date[$i],
											'end_date' => $end_date[$i],
											'block_names' => $block_names[$i],
											'section_id'  => $consul[$i],
											'credit'       =>$credit[$i],
											'is_alloc'       =>1,
												);
	                  $this->MPof->addAllocation($allocation_details);
					  $this->MPof->updatePofAlloc($pid);
					  
			   }
			 $this->MPof->addPosCons($pid,$consuls);
			 $this->MPof->upPofStatus($pid,$tranctype); 
		   	   flashMsg('success', 'Position has been allocated.');
			  redirect('pof/admin/re_allocation/'.$id.'/','refersh');
	   }
	   else
	   {
	   $this->load->view('admin/admin_pof_allocate',$data);
	   }
	  }
	
	// Re-allocation
	//allocation
	function re_allocation()
	  {
	   $id = $this->uri->segment(4);
	   $pid = $this->uri->segment(4);
	   $data['commitment'] =  $this->MPof->getPofCommitment($pid);
	   $data['row'] = $this->MPof->getPos($id);
	   $data['consultant'] = $this->MPof->getUsersDropDown();
	    $data['transimp'] = $this->MPof->getTransDropDown();
	   $data['allocation_details'] = $this->MPof->getAllocDetails($id);
	   $data['allocation'] = $this->MPof->getAllocDetail($id);
	   $data['pid'] = $this->uri->segment(4);
	   $data['job_title'] = $this->uri->segment(5);
	   if($this->input->post('fad'))
	   {
	    $pid = $this->uri->segment(4);
	   $this->MPof->enterAlloc($pid);
	   $alloc_id= $this->db->insert_id();
//	    if($this->input->post('consul')&&$this->input->post('credit')&&$this->input->post('doa'))
        if($this->input->post('consul'))
		 {
		$job_title = $_POST['jobtitle1'];
	 	 $consul = $_POST['consul'];
		 $tranctype = $_POST['transaction_type'];
		// $consul1 = $this->MPof->getAllRecordCon($consul);
		 $consul1 = $this->MPof->getAllRecordCon($consul);
		
		 $consuls = implode(", ", $consul1);
		  $credit = $_POST['credit'];
		   $start_date = $_POST['doa'];
		    $end_date = $_POST['end_date'];
			 $block_names = $_POST['block_names'];
			 $count = count($_POST['consul']);
			  for($i=0; $i<$count; $i++)
			   {
			   		 $allocation_details=array(
				                            'pof_id' => $pid,
								            'alloc_id' => $alloc_id,
											'event_name' => $job_title,
											'start_date' => $start_date[$i],
											'end_date' => $end_date[$i],
											'block_names' => $block_names[$i],
											'section_id'  => $consul[$i],
											'credit'       =>$credit[$i],
											'is_alloc'       =>1,
												);
	                  $this->MPof->addAllocation($allocation_details);
					  $this->MPof->updatePofAlloc($pid);
			   }
			 $this->MPof->upPosCons($pid,$consuls); 
			 $this->MPof->upPofStatus($pid,$tranctype); 
		    $event_id = $_POST['event_id'];
			 $count = count($_POST['event_id']);
			  for($j=0; $j<$count; $j++)
			   {
			   		$e_details=$event_id[$j];
											
	                 
					  $this->MPof->updatePofEvent($e_details);
			   }
			}
			   flashMsg('success', 'Position has been allocated.');
			  redirect('pof/admin/re_allocation/'.$id.'/','refersh');
	   }
	   else
	   {
	   $this->load->view('admin/admin_pof_reallocate',$data);
	   }
	  }
	
	 function was(){
			$data['title'] = "Work Allocation Sheet";
            $data['header'] = 'Work Allocation Sheet';
			$this->bep_site->set_crumb('Work Allocation Sheet','was/admin/poflist');
            $id = $this->uri->segment(4);
            $data['pofs'] =  $this->MPof->getAllAllocation();
		    $data['usr'] = $this->MPof->getUsers();
            
            $this->load->view('admin/admin_pof_was',$data );
           }
		   
	 function allocation_history()
	  {
	   $id = $this->uri->segment(4);
	   $data['row'] = $this->MPof->getPos($id);
	   $data['consultant'] = $this->MPof->getUsersDropDown();
	   $data['results'] = $this->MPof->getAllocDetails($id);
	   $data['allocation'] = $this->MPof->getAllocDetail($id);
	   $data['allocated'] = $this->MPof->getAllocated($id);
	   $data['unallocated'] = $this->MPof->getUnAllocated($id);
	   $data['pofcon'] = $this->MPof->getPofCon($id);
	   if($this->input->post('target_resume'))
	     {
		  $allocid = $this->input->post('alloc_id');
		  $this->MPof->updateAllocTR($allocid);
		  redirect('pof/admin/allocation_history/'.$id.'/','refersh');
		 }
		if($this->input->post('addmore'))
		 {
		 $pid = $this->uri->segment(4);
		$job_title = $_POST['jobtitle1'];
	 	 $consul = $_POST['consul'];
		 $cons = $_POST['cons'];
		 $alloc_id = $_POST['allocid'];
		// $consul1 = $this->MPof->getAllRecordCon($consul);
		 $consul1 = $this->MPof->getAllRecordCon($consul);
		
		 $consulss = implode(", ", $consul1);
		  $consuls = $consulss.", ".$cons;
		  $credit = $_POST['credit'];
		   $start_date = $_POST['doa'];
		    $end_date = $_POST['end_date'];
			 $block_names = $_POST['block_names'];
			 $count = count($_POST['consul']);
			  for($i=0; $i<$count; $i++)
			   {
			   		 $allocation_details=array(
				                            'pof_id' => $pid,
								            'alloc_id' => $alloc_id,
											'event_name' => $job_title,
											'start_date' => $start_date[$i],
											'end_date' => $end_date[$i],
											'block_names' => $block_names[$i],
											'section_id'  => $consul[$i],
											'credit'       =>$credit[$i],
											'is_alloc'       =>1,
												);
	                  $this->MPof->addAllocation($allocation_details);
				   }
			 $this->MPof->upPosCons($pid,$consuls); 
			   redirect('pof/admin/allocation_history/'.$id.'/','refersh');
			}
		
		 else{
	   $this->load->view('admin/admin_pof_history',$data );
	   }
	   }
	  
	  function editAllocation()
	    {
		$id = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(4);
		$event_id = $this->uri->segment(5);
	   $data['row'] = $this->MPof->getPos($id);
	   $data['consultant'] = $this->MPof->getUsersDropDown();
	   $data['results'] = $this->MPof->getAllocDetails($id);
	   $data['allocation'] = $this->MPof->getAllocDetail($id);
	   $data['allocated'] = $this->MPof->getAllocated($id);
	   $data['unallocated'] = $this->MPof->getUnAllocated($id);
	   $data['event_details'] = $this->MPof->getEventDetails($event_id);
	   if($this->input->post('consul'))
	    {
		 $event = $this->input->post('event_id');
		 $this->MPof->updateAlloc($event);
		 redirect('pof/admin/allocation_history/'.$id, 'refresh');
		}
	   $this->load->view('admin/admin_pof_history_edit',$data );
		}
	  //
	  // this generates VRS
	  function createVRS()
		 {
		  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "VRS";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "VRS";
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			    $from = date('Y-m-d');
				$to = date('Y-m-d');
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/createVRS/';
				$config['total_rows'] = $this->MPof->countSentCvs($from,$to);
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->getVRS($from,$to,$limit);
			    $data['links'] = $this->pagination->create_links();
				// load consultant list
			$data['consultant'] = $this->MPof->getConDropDown();
			//loads clients list
			$data['clients'] = $this->MPof->getCompNameF();
		        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_createVRS";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
		 }
		function VRS()
		  {
		     // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "VRS";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "VRS";
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		$userid = $this->session->userdata('id');
		$timestamp = $this->MMessege->getTimestamp($userid);
		if(count($timestamp)>0)
		{
		$date=explode(" ",$timestamp['sent_on']);
		$time = explode(":",$date[1]);
		$data['hour'] = $time[0];
		$data['min']= $time[1]+2;
		$data['id'] = $timestamp['msg_id'];
		$data['title'] = $timestamp['title'];
		$data['message'] = $timestamp['msg'];
		$data['sentby'] = $timestamp['username'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
			   if($this->input->post('generate'))
			     {
				  $from = $this->MPof->searchtermhanderfrom1($this->input->get_post('from', TRUE));
				$to = $this->MPof->searchtermhandlerto1($this->input->post('to', TRUE));
				$consultant = $this->MPof->searchtermhandlerconsultant1($this->input->post('consultant', TRUE));
				$client = $this->MPof->searchtermhandlerclient1($this->input->post('client', TRUE));
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/VRS/';
				$config['total_rows'] = $this->MPof->countSentCv($from,$to,$consultant,$client);
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->generateVRS($from,$to,$consultant,$client,$limit);
					$data['nocv'] = $this->MPof->noCvSentVRS($from,$to,$consultant,$client);
					$data['nomark'] = $this->MPof->noMarkVRS($from,$to,$consultant,$client);
				 }
				 else{
			    $from = $this->MPof->searchtermhanderfrom($this->input->get_post('from', TRUE));
				$to = $this->MPof->searchtermhandlerto($this->input->post('to', TRUE));
				$consultant = $this->MPof->searchtermhandlerconsultant($this->input->post('consultant', TRUE));
				$client = $this->MPof->searchtermhandlerclient($this->input->post('client', TRUE));
				}
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/VRS/';
				$config['total_rows'] = $this->MPof->countSentCv($from,$to,$consultant,$client);
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->generateVRS($from,$to,$consultant,$client,$limit);
			    $data['links'] = $this->pagination->create_links();
				// load consultant list
			$data['consultant'] = $this->MPof->getConDropDown();
			//loads clients list
			$data['clients'] = $this->MPof->getCompNameF();
			$data['nocv'] = $this->MPof->noCvSentVRS($from,$to,$consultant,$client);
			$data['nomark'] = $this->MPof->noMarkVRS($from,$to,$consultant,$client);
			$data['from'] = $from;
			$data['to'] = $to;
			$data['consul'] = $consultant;
			$data['client']= $client;
		        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_VRS";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
				
		  }
		  // my vrs
		  function myVRS()
		  {
		     // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "VRS";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "VRS";
		     $date = date('Y-m-d');
            $day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
			 $consultant = $this->session->userdata('username');
			 $client = ' ';
			 
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/myVRS/';
				$config['total_rows'] = $this->MPof->countMySentCv($from,$to,$consultant,$client);
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->generateMyVRS($from,$to,$consultant,$client,$limit);
			    $data['links'] = $this->pagination->create_links();
				$data['from'] = $from;
			    $data['to'] = $to;
		        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_VRS";
                $data['module'] = 'pof';
                $this->load->view('admin/admin_pof_myVRS',$data);
				
		  }
		  // vrs status -read or not
	   function VRSRead()
	       {
		    if($this->input->post('read'))
			  {
			   $from = $this->input->post('from');
			   $to = $this->input->post('to');
			   $userid = $this->session->userdata('id');
			   $this->MPof->vrsRead($from,$to,$userid);
			   redirect('pof/admin/myVRS/','refersh');
			  }
						
		   }
		   
		 	  // this generates VRS for Fial round
	  function getCandFinalRound()
		 {
		  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Candidate Final Round MIS";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Candidate Final Round MIS";
			$data['hiringmanager'] = $this->MPof->getHRManager();
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
	       		   
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/getCandFinalRound/';
				$config['total_rows'] = $this->MPof->countCandFinalRound();
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->getCandFinalRound($limit);
			    $data['links'] = $this->pagination->create_links();
				// load consultant list
			$data['consultant'] = $this->MPof->getConDropDown();
			//loads clients list
			$data['clients'] = $this->MPof->getClientsDropdown();
		        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_finalround";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
		 }
			  // this generates VRS
	  function getCandOffer()
		 {
		  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Candidate Offer MIS";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Candidate Offer MIS";
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
			$data['hiringmanager'] = $this->MPof->getHRManager();		   
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/getCandOffer/';
				$config['total_rows'] = $this->MPof->countCandtoOffer();
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->getCandtoOffer($limit);
			    $data['links'] = $this->pagination->create_links();
				// positions at offer stage
				$config1['base_url'] = base_url() . 'index.php/pof/admin/getCandOffer/';
		        $config1['total_rows'] = $this->MPof->record_count_posatclosure();
		        $config1['per_page'] = 20;
		        $config1['uri_segment'] = 4;
		       //$choice = $config['total_rows']/$config['per_page'];
		        $config1['num_links'] = 19;		
		        $this->pagination->initialize($config1);

		        $limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
               $data['totalclosure'] = $config1['total_rows'];
		// Loads all the POF's record
            $data['resultsclosure'] =  $this->MPof->getAllPosatclosure($limit);
			$data['clinks'] = $this->pagination->create_links();
			//
			// positions at at focus
				$config2['base_url'] = base_url() . 'index.php/pof/admin/getCandOffer/';
		        $config2['total_rows'] = $this->MPof->record_count_posatfocus();
		        $config2['per_page'] = 20;
		        $config2['uri_segment'] = 4;
		       //$choice = $config['total_rows']/$config['per_page'];
		        $config2['num_links'] = 19;		
		        $this->pagination->initialize($config2);

		        $limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
               $data['totalclosure'] = $config2['total_rows'];
		// Loads all the POF's record
            $data['resultsfocus'] =  $this->MPof->getAllPosatfocus($limit);
			$data['flinks'] = $this->pagination->create_links();
			//
				// load consultant list
			$data['consultant'] = $this->MPof->getConDropDown();
			//loads clients list
			$data['clients'] = $this->MPof->getClientsDropdown();
		        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_candoffer";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
		 }
		 
		 // this generates VRS for closed
	  function CandClosed()
		 {
		  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Candidate Final Round MIS";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Candidate Final Round MIS";
			$data['hiringmanager'] = $this->MPof->getHRManager();
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
	       		   
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/CandClosed/';
				$config['total_rows'] = $this->MPof->countCandClosed();
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->getCandClosed($limit);
			    $data['links'] = $this->pagination->create_links();
				// load consultant list
			$data['consultant'] = $this->MPof->getConDropDown();
			//loads clients list
			$data['clients'] = $this->MPof->getClientsDropdown();
		        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_closed";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
		 }
	   	 
		  // this generates VRS for closed
	  function CandJ()
		 {
		  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Candidate Final Round MIS";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Candidate Final Round MIS";
			$data['hiringmanager'] = $this->MPof->getHRManager();
			$data['companyF'] = $this->MPof->getCompNameF();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
	       		   
				$this->load->library('pagination');
				$limit = ($this->uri->segment(4))? $this->uri->segment(4):0;
				$config['base_url']= base_url().'index.php/pof/admin/CandJ/';
				$config['total_rows'] = $this->MPof->countCandJ();
				$config['per_page']=20;
				$config['num_links']=19;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['total']=$config['total_rows'];
				$data['results'] = $this->MPof->getCandJ($limit);
			    $data['links'] = $this->pagination->create_links();
				// load consultant list
			$data['consultant'] = $this->MPof->getConDropDown();
			//loads clients list
			$data['clients'] = $this->MPof->getClientsDropdown();
		        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_joined";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data);
		 }
		 
	  function scribble()
	  {
	   $id = $this->uri->segment(4);
	    $pid = $this->uri->segment(4);
	   $data['row'] = $this->MPof->getPos($id);
	   $data['consultant'] = $this->MPof->getUsersDropDown();
	   $data['allocated'] = $this->MPof->getCurAlloc($id);
	   $data['pid'] = $this->uri->segment(4);
	   $data['poscomments'] = $this->MPof->getPosComments($pid);
	   $sent_by = $this->session->userdata('id');
	   $sent_on = date('Y-m-d h:i:s');
	   if($this->input->post('msg'))
	   {
	    $this->MPof->enterScribble($pid,$sent_by,$sent_on);
	    $type = "indi";
		$title = "Position Discussion";
	    
		$user = $_POST['consuls'];
		   $count = count($user);
		   for($i=0; $i<$count; $i++)
		   {
		    $msg_details = array(
			'type' =>$type,
			'title' => $title,
			'send_to' =>$user[$i],
			'msg' => $this->input->post('msg'),
			'sent_by' => $sent_by,
			'sent_on' => $sent_on,
			);
			$this->MMessege->sendMsg($msg_details);
		   }
		   	echo "<div align='center' style='color:#006600'>Message has been sent successfully.</div>";
	   }
	   
	   else
	   {
	   $this->load->view('admin/admin_pof_scribble',$data);
	   }
	  }
	
	// This enters a new worksheet
      function foldera()
	  {
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Worksheet Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Worksheet Manager";
            $username = $this->session->userdata('id');
             $user = $this->session->userdata('username');
	        $class = $this->uri->segment(4);
		    $pid = $this->uri->segment(5);
		    $page = ($this->uri->segment(6))? $this->uri->segment(6) : 0;
			
		// send to positions
	   	if($this->input->post('position')){
				    // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid'];
				   $cid=$_POST['c_id'];
	                $count = count($_POST['c_id']);
					          for($i=0; $i<$count; $i++) {
					              $selection_details=array(
								            'pofid' =>$positionid,
											'cand_id' 	=> $cid[$i],
											'user_id'        => $username,
											'stage'  =>'databank',
									               );
												 
	                            $this->MCandidate->addtoposition($selection_details);
																	
						}
					    	
						
							 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	          redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
		   }
		   //
		   
			if($this->input->post('stage'))
		     {
		    $s_id = $_POST['s_id'];
			$sta = $_POST['stage'];
			$count = count($s_id);
			  for($i=0; $i<$count; $i++)
			   {
			    $sid= $s_id[$i];
			    $stage = $sta[$i];
				$this->MPof->updateChange($sid,$stage);
			   }
			  redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
		   }
		   
			  if($this->input->post('constituent')){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
	               $constituent=$_POST['constituent'];
	                $count = count($_POST['c_id']);
					$countw = count($_POST['constituent']);
                         for($i=0; $i<$count; $i++) {
						   
						 for($j=0; $j<$countw; $j++) {
	                            $worksheet_details=array(
											'c_id' 	=> $cid[$i],
											'constituent_id'        => $constituent[$j],
									               );
	                            $this->MCandidate->addtoWorksheet($worksheet_details);
						}
						$cand = $cid[$i];
								$this->MCandidate->addCandtoWorksheet($cand);
						}
					$basic=$_POST['basicworksheet_id'];
	                $countb = count($_POST['c_id']);
					$countbw = count($_POST['basicworksheet_id']);
                         for($k=0; $k<$countb; $k++) {
						   
						 for($l=0; $l<$countbw; $l++) {
	                            $worksheet_details=array(
											'c_id' 	=> $cid[$k],
											'constituent_id'        => $basic[$l],
									               );
	                            $this->MCandidate->addtoWorksheet($worksheet_details);
						}
						}
							 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	         redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
		   }
		    //
		   if($this->input->post('basicworksheet_id')){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
	               $constituent=$_POST['basicworksheet_id'];
	                $count = count($_POST['c_id']);
					$countw = count($_POST['basicworksheet_id']);
                         for($i=0; $i<$count; $i++) {
						   
						 for($j=0; $j<$countw; $j++) {
	                            $worksheet_details=array(
											'c_id' 	=> $cid[$i],
											'constituent_id'        => $constituent[$j],
									               );
	                            $this->MCandidate->addtoWorksheet($worksheet_details);
								
						}
					    	$cand = $cid[$i];
								$this->MCandidate->addCandtoWorksheet($cand);
						}
							 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	         redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
		   }
		   
            if(($this->input->post('myworksheet'))&& ($this->input->post('add'))){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
	               $worksheet=$_POST['myworksheet'];
	                $count = count($_POST['c_id']);
					          for($i=0; $i<$count; $i++) {
					              $worksheet_details=array(
											'c_id' 	=> $cid[$i],
											'constituent_id'        => $worksheet,
									               );
	                            $this->MCandidate->addtoWorksheet($worksheet_details);
								$cand = $cid[$i];
							$this->MCandidate->addCandtoWorksheet($cand);
								
						}
									 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	         redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
						}
						
						
			if(($this->input->post('myworksheet'))&& ($this->input->post('move'))){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
				  $sworksheet = $_POST['searchedworksheet'];
	               $worksheet=$_POST['myworksheet'];
	                $count = count($_POST['c_id']);
					          for($i=0; $i<$count; $i++) {
					              $worksheet_details=array(
											'c_id' 	=> $cid[$i],
											'constituent_id'        => $worksheet,
									               );
												   $cand = $cid[$i];
	                            $this->MCandidate->movetoWorksheet($worksheet_details,$cand,$sworksheet);
						
														
						}
					    	
						
							 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	         redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
		   }
		   
		   // This deletes the candidate records
	   		if($this->input->post('delete')){
			 $page = $this->uri->segment(4); 
				 $cid=$_POST['c_id'];
			       $count = count($_POST['c_id']);
				         for($i=0; $i<$count; $i++) {
						      for($j=0; $j<$count; $j++) {
						 
	                           $candidateid = $cid[$j];
	                            $this->MCandidate->deleteCandidate($candidateid,$user);
						}
					 }
				  
			 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Candidates has been deleted successfully.');
	         redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
	   }
	     // This sends the candidates to a folder
	   if ($this->input->post('folder_name')){
		$id = $this->input->post('id');
		$p_id= $this->input->post('folder_name');
		//For Candidate
	   $c_id=$_POST['c_id'];
	     $count = count($_POST['c_id']);
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
			          'p_id' =>$p_id,
			         'c_id'   =>$c_id[$i],
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
					}
					flashMsg('success','Candidates has been sent to folder successfully.');
					  redirect('pof/admin/'.$class.'/'.$pid.'/'.$page,'refresh');
					}
	elseif ($this->input->post('newfolder')){
		$id = $this->input->post('id');
		$p_id= $this->input->post('newfolder');
		//For Candidate
	   $c_id=$_POST['c_id'];
	     $count = count($_POST['c_id']);
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
			          'p_id' =>$p_id,
			         'c_id'   =>$c_id[$i],
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
					}
					flashMsg('success','Candidates has been sent to folder successfully.');
					  redirect('candidates/admin/'.$page,'refresh');
					}
	    // send to positions
	   	 
	  
  } 
  
 function myAppraisal()
	     {
		    $data['title'] = "Appraisal";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Appraisal";
			//get useranme
			$username = $this->session->userdata('username');
			$data['results'] = $this->MPof->myApp($username);
			        // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "performance_appraisal_format_home";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data );
				 //
				
		 }
	  	 // This creates a new pof.
     function appraisal(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
            $data['title'] = "Appraisal";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Appraisal";
			 if(($this->input->post('cons_name')) && ($this->input->post('submit')))
			  {
			   $this->MPof->submitAppraisal();
			   $id = $this->db->insert_id();
			   flashMsg('success', 'Your ASSESMENT PERFORMANCE APPRAISAL has been allocated.');
			   redirect('pof/admin/myAppraisal/','refresh');
			  }
			 if(($this->input->post('cons_name')) && ($this->input->post('draft')))
			  {
			   $this->MPof->newAppraisal();
			   $id = $this->db->insert_id();
			   flashMsg('success', 'Your ASSESMENT PERFORMANCE APPRAISAL has been allocated.');
			   redirect('pof/admin/myAppraisal/','refresh');
			  }
			  else
			  {
           	             // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "performance_appraisal_format";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data );
				 //
				 }
           }
		 // This creates a new pof.
     function editAppraisal(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
            $data['title'] = "Appraisal";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Appraisal";
			$id = $this->uri->segment(4);
			$data['app'] = $this->MPof->getAppDetails($id);
			 if(($this->input->post('cons_name')) && ($this->input->post('submit')))
			  {
			   $this->MPof->submitAppraisalDraft($id);
			    flashMsg('success', 'Your ASSESMENT PERFORMANCE APPRAISAL has been iupdated.');
			   redirect('pof/admin/myAppraisal/','refresh');
			  }
			 if(($this->input->post('cons_name')) && ($this->input->post('draft')))
			  {
			    $this->MPof->editAppraisal($id);
			    flashMsg('success', 'Your ASSESMENT PERFORMANCE APPRAISAL has been updated.');
			    redirect('pof/admin/myAppraisal/','refresh');
			  }
			  else
			  {
           	             // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "performance_appraisal_format_edit";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data );
				 //
				 }
           }
		 // This creates a new pof.
     function editAppraisalDraft(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
            $data['title'] = "Appraisal";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Appraisal";
			$id = $this->uri->segment(4);
			$data['app'] = $this->MPof->getAppDetails($id);
			 if(($this->input->post('cons_name')) && ($this->input->post('submit')))
			  {
			   $this->MPof->resubmitAppraisal();
			    flashMsg('success', 'Your ASSESMENT PERFORMANCE APPRAISAL has been iupdated.');
			   redirect('pof/admin/myAppraisal/','refresh');
			  }
			 if(($this->input->post('cons_name')) && ($this->input->post('draft')))
			  {
			    $this->MPof->editAppraisalDraft($id);
			    flashMsg('success', 'Your ASSESMENT PERFORMANCE APPRAISAL has been updated.');
			    redirect('pof/admin/myAppraisal/','refresh');
			  }
			  else
			  {
           	             // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "performance_appraisal_format_edit_draft";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data );
				 //
				 }
           }
		  //
		  function allConsApp()
	    {
		   $data['title'] = "Appraisal";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Appraisal";
			//get useranme
				$data['results'] = $this->MPof->allCands();
			        // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "performance_appraisal_admin";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data );
		} 
	  // This creates a new pof.
     function viewAppraisal(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
            $data['title'] = "Appraisal";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Appraisal";
			$username = $this->uri->segment(4);
			$data['app'] = $this->MPof->viewAppDetails($username);
			 if($this->input->post('submit'))
			  {
			   $this->MPof->submitComments($username);
			    flashMsg('success', 'Your comments have been entered.');
			   redirect('pof/admin/allConsApp/','refresh');
			  }
			else
			  {
           	             // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "performance_appraisal_admin_view";
                 $data['module'] = 'pof';
                 $this->load->view($this->_container,$data );
				 //
				 }
           }
		   
   function excel()
	   {
	   
		$pid = $this->uri->segment(4);
		    	$data['results'] = $this->MPof->get_posdatabank($pid);
			    $this->load->view('admin/excel_worksheet',$data);	
	     }
		 
	  // position delivery//
	  // This loads all the POF's record
	function posDelivery(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Position Delivery";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Position Delivery";
          	
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
			
		$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	    $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
		$pofno = $this->input->post('pofno');
		$dor = $this->input->post('dor');
		$jobtitle = $this->MPof->searchterm_handler_jobtitle($this->input->get_post('jobtitle',TRUE));
		$company = $this->MPof->searchterm_handler_company($this->input->get_post('company',TRUE));
		$focus = $this->input->post('focus');
		$closure = $this->input->post('closure');
		$location = $this->MPof->searchterm_handler_location($this->input->get_post('location',TRUE));
		$grade = $this->MPof->searchterm_handler_grade($this->input->get_post('grade',TRUE));
		$salary = $this->MPof->searchterm_handler_salary($this->input->get_post('salary',TRUE));
		$posstatus = $this->MPof->searchterm_handler_posstatus($this->input->get_post('posstatus',TRUE));
		$consul = $this->MPof->searchterm_handler_consul($this->input->get_post('consul',TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/pof/admin/posDelivery/';
		$config['total_rows'] = $this->MPof->record_count_posdelivery();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 19;
$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		// Loads all the POF's record
            $data['results'] =  $this->MPof->getAllPosDelivery($limit,$column_name,$order);
			$data['links'] = $this->pagination->create_links();
			$data['column_name']=$column_name;
		$data['order']=$order;
		$data['pofno'] = $pofno;
		$data['dor'] = $dor;
		$data['jobtitle'] = $jobtitle;
		$data['company'] = $company;
		$data['location'] = $location;
		$data['grade'] = $grade;
		$data['salary'] = $salary;
		$data['posstatus'] = $posstatus;
		$data['consul'] = $consul;
		
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_posdelivery";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
    //
	
	// This loads all the POF's record
	function filterposdel(){
	        // This shows the module name you are accessing, as a tiltle in the browser. 
			$data['title'] = "Position Delivery";
			 // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Position Delivery";
          	
			$userid = $this->session->userdata('id');
			$data['user'] = $this->MPof->getUserDetails($userid);
			$data['news'] = $this->MMessege->getNews();
			$data['companyF'] = $this->MPof->getCompNameF2();
			$data['locationF'] = $this->MPof->getLocNameF();
			$data['consulF'] = $this->MPof->getConsulNameF();
		
		$column_name = $this->MPof->searchterm_handler_column($this->input->get_post('column_name_pof', TRUE));
	    $order = $this->MPof->searchterm_handler_order($this->input->get_post('order_pof', TRUE));
		$pofno = $this->input->post('pofno');
		$dor = $this->input->post('dor');
		$jobtitle = $this->MPof->searchterm_handler_jobtitle($this->input->get_post('jobtitle',TRUE));
		$company = $this->MPof->searchterm_handler_companyfilterpos($this->input->post('companyfilterpos'));
		$focus = $this->input->post('focus');
		$closure = $this->input->post('closure');
		$location = $this->MPof->searchterm_handler_location($this->input->get_post('location',TRUE));
		$grade = $this->MPof->searchterm_handler_grade($this->input->get_post('grade',TRUE));
		$salary = $this->MPof->searchterm_handler_salary($this->input->get_post('salary',TRUE));
		$posstatus = $this->MPof->searchterm_handler_posstatus($this->input->get_post('posstatus',TRUE));
		$consul = $this->MPof->searchterm_handler_consul($this->input->get_post('consul',TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/pof/admin/filterposdel/';
		$config['total_rows'] = $this->MPof->record_count_posdelivery_filer($company,$location,$grade,$salary,$posstatus,$consul,$focus,$closure);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 19;
$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		// Loads all the POF's record
            $data['results'] =  $this->MPof->getFilterDelRecord($limit,$pofno,$dor,$column_name,$order,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul,$focus,$closure);
			$data['links'] = $this->pagination->create_links();
			$data['column_name']=$column_name;
		$data['order']=$order;
		$data['pofno'] = $pofno;
		$data['dor'] = $dor;
		$data['jobtitle'] = $jobtitle;
		$data['company'] = $company;
		$data['location'] = $location;
		$data['grade'] = $grade;
		$data['salary'] = $salary;
		$data['posstatus'] = $posstatus;
		$data['consul'] = $consul;
			//$data['result'] =  $this->MPof->getAllRecordCon();
           // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Pof List','pof/admin/poflist');
            // Load the view file
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_posdeliveryfilter";
	        $data['module'] = 'pof';
	        $this->load->view($this->_container,$data);
			//
	  }
    //
   }
?>
