<?php
class Admin extends Admin_Controller {

function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('Usage');
			// Load models and language
			$this->load->module_model('auth','User_model');
			$this->load->model('MWorksheet');
			$this->load->model('MUsage');
			$this->load->language('customer');
			$this->load->module_model('candidates', 'MCandidate');
			// Set breadcrumb
			$this->bep_site->set_crumb('Miscellaneous','list/admin');
			$this->load->helper('date');
			// Load the validation library
		    $this->load->library('validation');
			log_message('debug','BackendPro : Members class loaded');
	}
	// This gets all the candidates in alpha order.
	function index()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		if($this->input->post('from'))
		{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$today = date("Y-m-d");
		
		redirect('usage/admin/findresult/'.$from.'/'.$to,'refresh');
		}
		else
		{
		$from = date('Y-m-d');
		$to = date('Y-m-d');
		$today = date("Y-m-d");
		$data['added'] = $this->MUsage->countAdded($from,$to);
		$data['edited'] = $this->MUsage->countEdited($from,$to);
		$data['deleted'] = $this->MUsage->countdeleted($from,$to);
		$data['total'] = ($data['added']+$data['edited']+$data['deleted']);
	
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_home";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
	}
	}
	//
	function find()
	  {
	   // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		if($this->input->post('from'))
		{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$today = date("Y-m-d");
		
		redirect('usage/admin/findresult/'.$from.'/'.$to,'refresh');
		}
		else
		{
		 $from = $this->input->post('from');
		$to = $this->input->post('to');
		$today = date("Y-m-d");
		 $data['users']= $this->MUsage->getUsers();
		$data['added1'] = $this->MUsage->getByConsultant($from,$to);
		$data['added2'] = $this->MUsage->getByConsultant1($from,$to);
		$data['added3'] = $this->MUsage->getByConsultant2($from,$to);
		$data['added'] = $this->MUsage->countAdded($from,$to);
		$data['edited'] = $this->MUsage->countEdited($from,$to);
		$data['deleted'] = $this->MUsage->countdeleted($from,$to);
		$data['total'] = ($data['added']+$data['edited']+$data['deleted']);
		$data['imported'] = $this->MUsage->countImported($from,$to);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_consultant_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);	
		 }	
	  }
	  
	  function findresult()
	  {
	   // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		
		$from = $this->uri->segment(4);
		$to = $this->uri->segment(5);
		$today = date("Y-m-d");
		$data['users']= $this->MUsage->getUsers();
		$data['added1'] = $this->MUsage->getByConsultant($from,$to);
		$data['added2'] = $this->MUsage->getByConsultant1($from,$to);
		$data['added3'] = $this->MUsage->getByConsultant2($from,$to);
		$data['added'] = $this->MUsage->countAdded($from,$to);
		$data['edited'] = $this->MUsage->countEdited($from,$to);
		$data['deleted'] = $this->MUsage->countdeleted($from,$to);
		$data['total'] = ($data['added']+$data['edited']+$data['deleted']);
		$data['imported'] = $this->MUsage->countImported($from,$to);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_consultant_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);		
	  }
	  
	  function userAction()
	  {
	   // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$today = date("Y-m-d");
		$data['user']= $this->uri->segment(4);
		$data['added1'] = $this->MUsage->getByConsultant($today);
		$data['added'] = $this->MUsage->countAddedbySingleUser($from,$to,$user);
		$data['edited'] = $this->MUsage->countEditedbySingleUser($from,$to,$user);
		$data['deleted'] = $this->MUsage->countDeletedbySingleUser($from,$to,$user);
		$data['total'] = ($data['added']+$data['edited']+$data['deleted']);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_consultant_action";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);		
	  }
	  
	  
	function addedToday()
	 {
	  // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$today = date("Y-m-d");
		$data['results'] = $this->MUsage->getTodayAdded($today);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);		
	 
	 }
	 
	 function editedToday()
	 {
	  // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$today = date("Y-m-d");
		$data['results'] = $this->MUsage->getTodayEdited($today);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);		
	 
	 }
	 
	  function deletedToday()
	 {
	  // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$today = date("Y-m-d");
		$data['results'] = $this->MUsage->getTodayDeleted($today);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);		
	 
	 }
	 
	 function addedTotal()
	 {
	  // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$from = $this->uri->segment(4);
		$to = $this->uri->segment(5);
		$data['results'] = $this->MUsage->getTotalAdded($from,$to);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);		
	 
	 }
	// gets the list of candidates entered by a user
	function addedbyUser()
	  {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions2();
		$data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'index.php/usage/admin/addedbyUser/'.$user.'/'.$from.'/'.$to.'/';
		$config['total_rows'] = $this->MUsage->countAddedbySingleUser($from,$to,$user);
		$config['per_page'] = 20;
		$config['uri_segment'] = 7;		//$choice = $config['total_rows']/$config['per_page'];
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

		$limit = ($this->uri->segment(7))? $this->uri->segment(7) : 0;
        $data['total'] = $config['total_rows'];
		$data['results'] = $this->MUsage->getAddedByUser($from,$to,$user,$limit);
		$data['links'] = $this->pagination->create_links();
		
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);	
		 }
		 	
	  //
	  
	  // gets the list of candidates deleted by a user
	function deletedbyUser()
	  {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$data['results'] = $this->MUsage->getDeletedByUser($from,$to,$user);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);
		 }		
	  //
	
	  // gets the list of candidates entered by a user
	function editedbyUser()
	  {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'index.php/usage/admin/editedbyUser/'.$user.'/'.$from.'/'.$to.'/';
		$config['total_rows'] = $this->MUsage->countEditedbySingleUser($from,$to,$user);
		$config['per_page'] = 20;
		$config['uri_segment'] = 7;		//$choice = $config['total_rows']/$config['per_page'];
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

		$limit = ($this->uri->segment(7))? $this->uri->segment(7) : 0;
        $data['total'] = $config['total_rows'];
		$data['results'] = $this->MUsage->getEditedByUser($from,$to,$user,$limit);
		$data['links'] = $this->pagination->create_links();
		
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);	
		 }
		 	
	  //
	  	    // gets the list of candidates total actioned by a user
	function totalbyUser()
	  {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$data['results'] = $this->MUsage->getTotalByUser($from,$to,$user);
		 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_list";
	     $data['module'] = 'usage';
	     $this->load->view($this->_container,$data);
		 }		
	  //
	// This gets all the candidates in alpha order.
	function index2()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		$username = $this->session->userdata('id');
		
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/usage/admin/index/';
		$config['total_rows'] = $this->MCandidate->record_count();
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

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->fetch_candidates($config['per_page'],$page);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_home";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
	}
	
	
	 // count candidates who are not sent to any worksheet and whose cv is not attached
	 function countAllNot()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		// count candidates not added to worksheet
		$data['worksheet'] = $this->MUsage->countWorksheetNot();
		// count consulidated data
		$data['total_cand'] = $this->MUsage->countAllCand();
		$data['consolWork'] = $this->MUsage->countConsolWork();
		$data['consolCV'] = $this->MUsage->countConsolCV();
		 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_count_page";
                 $data['module'] = 'usage';
                 $this->load->view($this->_container,$data);
				 //
	   }
	 // 
	 function noWork()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		// get the username
		$user  = $this->uri->segment(4);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$username = $this->session->userdata('id');
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['usernames']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/noWork/'.$user;
		$config['total_rows'] = $this->MUsage->count_notWork($user);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;		$config['num_links'] = 19;
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
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MUsage->fetch_candidates_notWork($user,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_notWork";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		//
		 // 
	 function noWorkSort()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		// get the username
		$user  = $this->uri->segment(4);
		$username = $this->session->userdata('id');
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['usernames']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$column = $this->MUsage->searchterm_handler_column($this->input->get_post('column', TRUE));
		$order = $this->MUsage->searchterm_handler_order($this->input->get_post('order', TRUE));
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/noWorkSort/'.$user;
		$config['total_rows'] = $this->MUsage->count_notWork($user);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;		$config['num_links'] = 19;
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
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MUsage->fetch_candidates_notWorkSort($user,$column,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_notWork";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		//
		// 
	 function noCV()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		// get the username
		$user  = $this->uri->segment(4);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$username = $this->session->userdata('id');
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['usernames']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/noCV/'.$user;
		$config['total_rows'] = $this->MUsage->count_noCV($user);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;		$config['num_links'] = 19;
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
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MUsage->fetch_candidates_noCV($user,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_noCV";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		 //
			 // 
	 function noCVSort()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		// get the username
		$user  = $this->uri->segment(4);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$username = $this->session->userdata('id');
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['usernames']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$column = $this->MUsage->searchterm_handler_column($this->input->get_post('column', TRUE));
		$order = $this->MUsage->searchterm_handler_order($this->input->get_post('order', TRUE));
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/noCVSort/'.$user;
		$config['total_rows'] = $this->MUsage->count_noCV($user);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;		$config['num_links'] = 19;
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
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MUsage->fetch_candidates_noCVSort($user,$column,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_noCV";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		//
	 function consolWork()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/consolWork/';
		$config['total_rows'] = $this->MUsage->countConsolWork();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		$config['num_links'] = 19;
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
		$data['results'] = $this->MUsage->fetch_candidates_consolWork($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_consolWork";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		 //
	 	//
	 function consolWorkSort()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		$column = $this->MUsage->searchterm_handler_column($this->input->get_post('column', TRUE));
		$order = $this->MUsage->searchterm_handler_order($this->input->get_post('order', TRUE));
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/consolWorkSort/';
		$config['total_rows'] = $this->MUsage->countConsolWork();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		$config['num_links'] = 19;
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
		$data['results'] = $this->MUsage->fetch_candidates_consolWorkSort($column,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_consolWork";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		 //
	function consolCV()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/consolCV/';
		$config['total_rows'] = $this->MUsage->countConsolCV();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		$config['num_links'] = 19;
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
		$data['results'] = $this->MUsage->fetch_candidates_consolCV($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_consolCV";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		 //
	function consolCVSort()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Usage";
		$column = $this->MUsage->searchterm_handler_column($this->input->get_post('column', TRUE));
		$order = $this->MUsage->searchterm_handler_order($this->input->get_post('order', TRUE));
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/consolCVSort/';
		$config['total_rows'] = $this->MUsage->countConsolCV();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		$config['num_links'] = 19;
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
		$data['results'] = $this->MUsage->fetch_candidates_consolCVSort($column,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_consolCV";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
		
	     }
		 //

	// This enters a new worksheet
      function foldera()
	  {
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Worksheet Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Worksheet Manager";
            $username = $this->session->userdata('id');
             $user = $this->session->userdata('username');
	         $page = $this->uri->segment(4);  
			  $consul = $this->uri->segment(5);
             $from = $this->uri->segment(6);
             $to = $this->uri->segment(7);  
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
	         redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
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
	          redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
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
	         redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
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
	          redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
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
	          redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
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
					 redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
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
					 redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
					}
	    // send to positions
	   	if($this->input->post('pofid')){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid'];
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
	          redirect('usage/admin/'.$page.'/'.$consul.'/'.$from.'/'.$to,'refresh');
		   }
		   //
	} 
	
	 function unResume()
	   {
	    // Title.
	    $data['title'] = "Unattached Resumes";
		// Header
		$data['header'] = "Unatached Resumes";
		// gets all the unattached resumes
		// load pagination library
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/usage/admin/unResume/';
		$config['total_rows'] = $this->MUsage->countUnresumes();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;		$config['num_links'] = 19;
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
		$data['results'] = $this->MUsage->getUnresumes($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_unresumes";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);		
	   }
	   
	  // This imports candidate list from excel sheet	
    function viewcv(){
	       // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Candidate CV";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Candidate CV";
            // get the file id
		  $id = $this->uri->segment(4);
		  $data['cv'] = $this->MUsage->getResume($id);
	          // This is how Mirus-HRMS loads views
            
              $this->load->view('admin/admin_candidate_cv',$data);
           }
	 function delFile()
	  {
	   $fileid = $this->uri->segment(4);
	   $this->MUsage->delCandFile($fileid);
	   redirect('usage/admin/unResume/','refresh');
	  }
	/////Delivery Reports////////
	function consDelivery()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Consultant Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Consultant Delivery";
		   $data['t'] = $this->MUsage->countSentCvThisWeekCT();
		    $data['t1'] = $this->MUsage->countSentCvThisWeekCT1();
			 $data['t2'] = $this->MUsage->countSentCvThisWeekCT2();
			 $data['t3'] = $this->MUsage->countSentCvThisWeekCT3();
			 $data['t4'] = $this->MUsage->countSentCvThisWeekCT4();
			 $data['t5'] = $this->MUsage->countSentCvThisWeekCT5();
			 $data['t6'] = $this->MUsage->countSentCvThisWeekCT6();
		   $data['thisweeksent'] = $this->MUsage->countSentCvThisWeek($from,$to);
		   $data['lastweeksent'] = $this->MUsage->countSentCvLastWeek($from,$to);
		   $data['results'] = $this->MUsage->getConsDelivery();
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_consdelivery";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
	   }
	   
	   function posDeliveryDaily()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Position Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Position Delivery";
		   $data['results'] = $this->MUsage->getPosDeliveryDaily();
		     if($this->input->post('from'))
		     {
			  $from = $this->input->post('from');
			  redirect('usage/admin/filterposDelivery/'.$from,'refresh');
			 }
			 else{
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_posdeliverydaily";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
		   }
	   }
	   function filterposDelivery()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Position Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Position Delivery";
		  	  $from = $this->uri->segment(4);
			   $data['results'] = $this->MUsage->filterPosDelivery($from);
			 
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_filterposdelivery";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
		   
	   }
	   
	   /////Delivery Reports Research ?Assocaite////////
	function RADelivery()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Research Associate Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Research Associate Delivery";
		   $data['t'] = $this->MUsage->countDatabankThisWeekCT();
		    $data['t1'] = $this->MUsage->countDatabankThisWeekCT1();
			 $data['t2'] = $this->MUsage->countDatabankThisWeekCT2();
			 $data['t3'] = $this->MUsage->countDatabankThisWeekCT3();
			 $data['t4'] = $this->MUsage->countDatabankThisWeekCT4();
			 $data['t5'] = $this->MUsage->countDatabankThisWeekCT5();
			 $data['t6'] = $this->MUsage->countDatabankThisWeekCT6();
		   $data['thisweekdatabank'] = $this->MUsage->countDatabankThisWeek($from,$to);
		   $data['lastweekdatabank'] = $this->MUsage->countDatabankLastWeek($from,$to);
		   $data['results'] = $this->MUsage->getRADelivery();
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_radelivery";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
	   }
	   function poswisecountra()
	      {
		    // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Research Associate Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Research Associate Delivery";
		   
		   $date = $this->uri->segment(4);
		   $ra = $this->uri->segment(5);
		    $data['results'] = $this->MUsage->getRADeliveryposwise($ra,$date);
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_radeliveryposwise";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
		  }
	   function posDeliveryActive()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Position Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Position Delivery";
		   $data['t'] = $this->MUsage->countSentCvThisWeekPAT();
		    $data['t1'] = $this->MUsage->countSentCvThisWeekPAT1();
			 $data['t2'] = $this->MUsage->countSentCvThisWeekPAT2();
			 $data['t3'] = $this->MUsage->countSentCvThisWeekPAT3();
			 $data['t4'] = $this->MUsage->countSentCvThisWeekPAT4();
			 $data['t5'] = $this->MUsage->countSentCvThisWeekPAT5();
			 $data['t6'] = $this->MUsage->countSentCvThisWeekPAT6();
		   $data['results'] = $this->MUsage->getPosDeliveryActive();
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_posdeliveryactive";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
	   }
	   
	   function conspos()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Position Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Position Delivery";
		   $consid = $this->uri->segment(4);
		   $data['results'] = $this->MUsage->getConsPosDelivery($consid);
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_posdelivery";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
	   }
	   
	   function consposactive()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Position Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Position Delivery";
		   $consid = $this->uri->segment(4); 
		   $data['user'] = $this->MUsage->getUsername($consid);
		   $data['results'] = $this->MUsage->getConsPosDeliveryactive($consid);
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_consposdelivery";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
	   }
	   
	   function poscons()
	   {
	      // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Consultant Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Consultant Delivery";
		   
		   $pofid = $this->uri->segment(4);
		   $data['results'] = $this->MUsage->getPosConsDelivery($pofid);
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_usage_consdelivery";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
	   }
	   
	   function consdelcvsent()
	     {
		 
		  // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Consultant Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Consultant Delivery";
		   
		   $date = $this->uri->segment(4);
		   $consultant = $this->uri->segment(5);
		    $data['results'] = $this->MUsage->generateVRS($date,$consultant);
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_VRS";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
		 }
		 function posdelcvsent()
	     {
		 
		  // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Consultant Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Consultant Delivery";
		   
		   $date = $this->uri->segment(4);
		   $client = $this->uri->segment(5);
		    $data['results'] = $this->MUsage->generateVRSClient($date,$client);
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_VRS";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
		 }
		 
		 function thisweek()
	     {
		 
		  // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Consultant Delivery";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Consultant Delivery";
		   
		   $from = $this->uri->segment(4);
		   $to = $this->uri->segment(5);
		   $consultant = $this->uri->segment(6);
		    $data['results'] = $this->MUsage->generateVRSthisweek($from,$to,$consultant);
		    $data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_VRS";
	       $data['module'] = 'usage';
	       $this->load->view($this->_container,$data);	
		 }
		 
	  function sortposdel()
	     {
		   $sort = $this->input->post('sort');
		    if($sort=='client')
			  {
			   redirect('usage/admin/pageclient','refresh');
			  }
			 if($sort=='consultant')
			   {
			    redirect('usage/admin/pageconsultant','refresh');
			   }
			  if($sort=='date_of_receipt')
			   {
			    redirect('usage/admin/pagedor','refresh');
			   }
		 }
	 function pageclient()
	    {
		    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Client List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Client List';
       		// gets the companylist
	     $cid = $this->uri->segment(4);
		/////////////////////
		$this->load->library('pagination');
		//////for client transaction//////////
		$config2['base_url'] = base_url() . 'index.php/usage/admin/pageclient/'.$cid.'/';
		$config2['total_rows'] = $this->MUsage->count_clienttans($cid);
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['totalpos'] = $config2['total_rows'];
		$data['resultspos'] = $this->MUsage->getClientTrans($limit);
		$data['poslinks'] = $this->pagination->create_links();
		
         // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
		
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_page";
	    $data['module'] = 'usage';
	    $this->load->view($this->_container,$data);
		}
		
	function pageconsultant()
	    {
		    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Client List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Client List';
       		// gets the companylist
	     $cid = $this->uri->segment(4);
		/////////////////////
		$this->load->library('pagination');
		//////for client transaction//////////
		$config2['base_url'] = base_url() . 'index.php/usage/admin/pageconsultant/'.$cid.'/';
		$config2['total_rows'] = $this->MUsage->count_consults($cid);
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['totalpos'] = $config2['total_rows'];
		$data['resultspos'] = $this->MUsage->getConsults($limit);
		$data['poslinks'] = $this->pagination->create_links();
		
         // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
		
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_consultant_page";
	    $data['module'] = 'usage';
	    $this->load->view($this->_container,$data);
		}
		
	function pagedor()
	    {
		    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Client List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Client List';
       		// gets the companylist
	     $cid = $this->uri->segment(4);
		/////////////////////
		$this->load->library('pagination');
		//////for client transaction//////////
		$config2['base_url'] = base_url() . 'index.php/usage/admin/pagedor/'.$cid.'/';
		$config2['total_rows'] = $this->MUsage->count_dor($cid);
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['totalpos'] = $config2['total_rows'];
		$data['resultspos'] = $this->MUsage->getDOR($limit);
		$data['poslinks'] = $this->pagination->create_links();
		
         // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
		
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_dor_page";
	    $data['module'] = 'usage';
	    $this->load->view($this->_container,$data);
		}
		
		
}
?>