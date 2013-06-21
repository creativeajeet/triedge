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
		$today = date("Y-m-d");
		$data['added'] = $this->MUsage->countTodayAdded($today);
		$data['edited'] = $this->MUsage->countTodayEdited($today);
		$data['deleted'] = $this->MUsage->countTodaydeleted($today);
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
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$data['results'] = $this->MUsage->getAddedByUser($from,$to,$user);
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
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$data['results'] = $this->MUsage->getEditedByUser($from,$to,$user);
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
	
	// This gets all the list category, list values, their synonyms etc in last updated order.
	function lastupdated()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$username = $this->session->userdata('id');
		$column = $this->input->post('column_name');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/index/';
		$config['total_rows'] = $this->MCandidate->record_count();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		//$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->fetch_candidates_lastupdated($config['per_page'],$page);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_home";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);		
	}
	
	function columnSort()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$username = $this->session->userdata('id');
		$column = $this->input->post('column_name');
		$order = $this->input->post('order');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/index/';
		$config['total_rows'] = $this->MCandidate->record_count();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		//$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->fetch_candidates_bycolumn($config['per_page'],$page,$column,$order);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_home";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);		
	}
	 function select_constituent_open(){
            if('IS_AJAX') {
        	$data['option_constituent_open'] = $this->MWorksheet->getConstituentopen();		
		$this->load->view('admin/constituent_open',$data);
            }
		
	}
	 function select_constituent(){
            if('IS_AJAX') {
        	$data['option_constituent'] = $this->MWorksheet->getConstituent();		
		$this->load->view('admin/constituent',$data);
            }
		
	}
	function select_otherconstituent(){
            if('IS_AJAX') {
        	$data['option_constituent_other'] = $this->MWorksheet->getConstituentOther();		
		$this->load->view('admin/otherconstituent',$data);
            }
		
	}
	function search()
	    {
	   // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
	   // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Candidate List';
		// Set breadcrumb(navigation). This tells where you are.
	     $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		 $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$heading = $this->MCandidate->searchterm_handler_simple_heading($this->input->get_post('heading', TRUE));
		$keyword = $this->MCandidate->searchterm_handler_simple($this->input->get_post('keyword', TRUE));
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		if($heading==1)
		{
		redirect('candidates/admin/searchAll/');
		}
		else
		{
		$config['base_url'] = base_url() . 'index.php/candidates/admin/search/';
		$config['total_rows'] = $this->MCandidate->search_record_count_simple($heading,$keyword);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->search_simple($heading,$keyword,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['heading'] = $heading;
		$data['keyword'] = $keyword;
		}
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_simple";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	
	function advanced_search()
	{
	 // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
	// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Candidate List';
        $id = $this->uri->segment(4);
	      $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		  $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$candidatename = $this->MCandidate->searchterm_handler_simple_candname($this->input->get_post('candidatename', TRUE));
		$currentloc = $this->MCandidate->searchterm_handler_curloc($this->input->get_post('currentlocation', TRUE));
		$region = $this->MCandidate->searchterm_handler_region($this->input->get_post('region', TRUE));
		$currentcomp = $this->MCandidate->searchterm_handler_curcomp($this->input->get_post('currentcompany', TRUE));
		$industry = $this->MCandidate->searchterm_handler_ind($this->input->get_post('industry', TRUE));
		$subindustry = $this->MCandidate->searchterm_handler_subind($this->input->get_post('subindustry', TRUE));
		$indfunction = $this->MCandidate->searchterm_handler_indfunc($this->input->get_post('indfunction', TRUE));
		$subfunction = $this->MCandidate->searchterm_handler_subfunc($this->input->get_post('subfunction', TRUE));
		$department = $this->MCandidate->searchterm_handler_department($this->input->get_post('department', TRUE));
		$jobtitle = $this->MCandidate->searchterm_handler_jobtitle($this->input->get_post('jobtitle', TRUE));
		$designation = $this->MCandidate->searchterm_handler_designation($this->input->get_post('designation', TRUE));
		$grade = $this->MCandidate->searchterm_handler_grade($this->input->get_post('grade', TRUE));
		$level = $this->MCandidate->searchterm_handler_level($this->input->get_post('level', TRUE));
		$course = $this->MCandidate->searchterm_handler_course($this->input->get_post('course', TRUE));
		$institute = $this->MCandidate->searchterm_handler_ins($this->input->get_post('institute', TRUE));
		$passingyear = $this->MCandidate->searchterm_handler_pass($this->input->get_post('passingyear', TRUE));
		
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/advanced_search/';
		$config['total_rows'] = $this->MCandidate->search_record_count($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$designation,$grade,$level,$course,$institute,$passingyear);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		//$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->search($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$designation,$grade,$level,$course,$institute,$passingyear,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['candidatename'] = $candidatename;
		$data['currentlocation'] = $currentloc;
		$data['region'] = $region;
		$data['currentcompany'] = $currentcomp;
		$data['industry'] = $industry;
		$data['subindustry'] = $subindustry;
		$data['indfunction'] = $indfunction;
		$data['subfunction'] = $subfunction;
		$data['department'] = $department;
		$data['jobtitle'] = $jobtitle;
		$data['designation'] = $designation;
		$data['grade'] = $grade;
		$data['level'] = $level;
		$data['course'] = $course;
		$data['institute'] = $institute;
		$data['paasingyear'] = $passingyear;
		// Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		 $data['page'] = $this->config->item('backendpro_template_admin') . "search_result";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);
		
	}
	function searchAll()
	    {
	   // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
	   // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Candidate List';
		// Set breadcrumb(navigation). This tells where you are.
	     $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		 $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$keyword = $this->MCandidate->searchterm_handler_all($this->input->get_post('keyword', TRUE));
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		$config['base_url'] = base_url() . 'index.php/candidates/admin/searchAll/';
		$config['total_rows'] = $this->MCandidate->search_record_count_all($keyword);
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
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->search_all($keyword,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['keyword'] = $keyword;
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_simple";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	
	function open_folder()
	{
	 // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
	// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Candidate List';
		// Set breadcrumb(navigation). This tells where you are.
	     $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		 $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		 if($this->input->post('folder_name')==1)
		 {
		 redirect('candidates/admin/refered','refresh');
		 }
		 else{
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$folder_name = $this->MCandidate->searchterm_handler_simple_folder_name($this->input->get_post('folder_name', TRUE));
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		$config['base_url'] = base_url() . 'index.php/candidates/admin/open_folder/';
		$config['total_rows'] = $this->MCandidate->search_record_count_folder($folder_name,$username);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_folder($folder_name,$username,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['folder_name'] = $folder_name;
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_folder";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		}
	  }
	
	function open_worksheet()
	    {
	 // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
	// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Candidate List';
		// Set breadcrumb(navigation). This tells where you are.
	     $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$masterworksheet = $this->MCandidate->searchterm_handler_simple_masterworksheet($this->input->get_post('master_worksheet', TRUE));
		$basicworksheet = $this->MCandidate->searchterm_handler_simple_basicworksheet($this->input->get_post('constituent', TRUE));
		
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/open_worksheet/';
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet($masterworksheet,$basicworksheet);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet($masterworksheet,$basicworksheet,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['master_worksheet'] = $masterworksheet;
		$data['constituent'] = $basicworksheet;
	
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_worksheet";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	function upload()
	{
	if ($this->input->post('upload')) {
	
	$file =  $_SERVER['DOCUMENT_ROOT']."/public/candidate/" ;
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|doc|xls|docx|pdf',
			'upload_path' => $file,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		$this->load->database();
	
	 $c_id=$_POST['c_id'];
	     $count = count($_POST['c_id']);
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
	 
			         'cand'   =>$c_id[$i],
					 'filename'  => $image_data['file_name'],
		             'filepath'  => $image_data['full_path']
			);
				
			$this->MCandidate->do_upload($cand_details);
			
		}
		redirect('candidates/admin/search','refresh');
			
	}
	}
		
	  // This imports candidate list from excel sheet	
    function import_candidate(){
	       // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Candidate Import";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Candidate Import";
           // Set breadcrumb(navigation). This tells where you are while accessing this software.
           $this->bep_site->set_crumb('Candidate Import','candidates/admin/candidateimport');
          
	          // This is how Mirus-HRMS loads views
              $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_import";
              $data['module'] = 'candidates';
              $this->load->view($this->_container,$data,array('error' => ' ' ));
           }
       // This imports candidate list from excel sheet	
    function viewcv(){
	       // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Candidate CV";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Candidate CV";
           // Set breadcrumb(navigation). This tells where you are while accessing this software.
           $this->bep_site->set_crumb('Candidate Cv','candidates/admin/candidateviewcv');
          // get the candidadte id
		  $id = $this->uri->segment(4);
		  $data['cv'] = $this->MCandidate->getCv($id);
	          // This is how Mirus-HRMS loads views
            
              $this->load->view('admin/admin_candidate_cv',$data);
           }
     
	 	function do_upload()
	    {
		
		$file =  $_SERVER['DOCUMENT_ROOT']."/public/candidate/" ;

		$config['upload_path'] = $file;
		$config['allowed_types'] = 'xls';
		$config['max_size']	= '1000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			echo $error ;
		}	
		else
		{
			$upload_data = $this->upload->data();
			
			echo "<h3>Your file was successfully uploaded!</h3>" ;

			echo "<ul>" ;
			foreach($upload_data as $item => $value) {
				echo '<li>',$item,' : ',$value,'</li>';
			}
			echo "</ul>" ;
			
			echo "<p>== Data read file excel ==================================== //</p>" ;

			// Load the spreadsheet reader library
			$this->load->library('excel_reader');

			// Set output Encoding.
			$this->excel_reader->setOutputEncoding('CP1251');

			$file =  $file.$upload_data['file_name'] ;

			$this->excel_reader->read($file);

			error_reporting(E_ALL ^ E_NOTICE);

			// Sheet 1
			$data = $this->excel_reader->sheets[0] ;
			$startColumn = $this->input->post('fromC');
			$endColumn = $this->input->post('toC');
			$startRow = $this->input->post('fromR');
			$endRow = $this->input->post('toR');
			$module = $this->input->post('module');
	
$sql = "INSERT INTO `candidates` (";
for ($j = $startColumn; $j <= $endColumn; $j++)
{
	$sql .= "`" . mysql_escape_string($data['cells'][$startColumn][$j]) . "`,";
}
$sql = substr($sql, 0, -1) . ") VALUES\r\n";
//cells
for ($i = $startRow; $i <= $endRow; $i++)
{
	$sql .= "(";
	for ($j = $startColumn; $j <= $endColumn; $j++)
	{
		$sql .= "'" . mysql_escape_string($data['cells'][$i][$j]) . "',";
	}
	$sql = substr($sql, 0, -1) . "),\r\n";
}
$sql =  substr($sql, 0, -3) . ";";

echo '<pre>';
echo $sql;	
$this->MCandidate->import($sql);


		}
	}
	
  		 
 // This edits the company inputs into the database.
    function editCandidate(){
	    // This gets the company id.
	    $id = $this->uri->segment(4);
		// This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Edit Candidate";
        // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Edit Candidate";
	    $username = $this->session->userdata('id');
		$user = $this->session->userdata('username');
		$data['sfolder'] =  $this->MCandidate->getFolder($username);
		if ($this->input->post('candidate_name')){
           $id = $this->uri->segment(4);
	        $this->MCandidate->updateCandidate($user,$id);  
			if ($this->input->post('folder_name')){
			$cand_details = array(
			          'p_id' =>$this->input->post('folder_name'),
			         'c_id'   =>$id,
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
				}
	if ($this->input->post('worksheet1') && $this->input->post('worksheet2')){
		$worksheet1= $this->input->post('worksheet1');
		   $worksheet1_details = array(
			         'c_id'   =>  $id,
					 'worksheet1'  =>$worksheet1,
					);
					$this->MCandidate->addtoworksheet1($worksheet1_details);
					}
	if ($this->input->post('chk')){
	   $file_id = $this->input->post('chk');
		
					$this->MCandidate->updateFile($file_id,$id);
				}
					
	if ($this->input->post('industry') && $this->input->post('sub_industry') ){
		$industry= $this->input->post('industry');
		      $indus_details = array(
			         'c_id'   =>  $id,
					 'industry'  =>$industry,
					);
					$this->MCandidate->addtoindus($indus_details);
					}
	 if ($this->input->post('sub_industry')){
		$sub_industry= $this->input->post('sub_industry');
		      $sub_indus_details = array(
			         'c_id'   =>  $id,
					 'sub_industry'  =>$sub_industry,
					);
					$this->MCandidate->addtosubindus($sub_indus_details);
					}
	if ($this->input->post('indfunction') && $this->input->post('sub_function') ){
		$indfunction= $this->input->post('indfunction');
		      $indfunc_details = array(
			         'c_id'   =>  $id,
					 'indfunction'  =>$indfunction,
					);
					$this->MCandidate->addtofunc($indfunc_details);
					}
	 if ($this->input->post('sub_function')){
		$sub_function= $this->input->post('sub_function');
		      $sub_func_details = array(
			         'c_id'   =>  $id,
					 'sub_function'  =>$sub_function,
					);
					$this->MCandidate->addtosubfunc($sub_func_details);
					}
	  if ($this->input->post('status')){
		$status= $this->input->post('status');
		      $status_details = array(
			         'c_id'   =>  $id,
					 'status' =>  $status,
					 'user'  =>  $username,
					);
					$this->MCandidate->addtostatus($status_details);
					}
		
	if ($this->input->post('upload') && ($this->input->post('file_type')=='cv'))
	{
	  $file =  $_SERVER['DOCUMENT_ROOT']."/public/candidate/" ;
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			'upload_path' => $file,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		// rename($image_data['full_path'],$image_data['file_path'].$name."_".$type.$image_data['file_ext']);
		$this->load->database();
	
	 $c_id=$this->uri->segment(4);
	     $count = count($this->uri->segment(4));
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
	 
			         'cand'   => $id,
					 'filename'  => $image_data['file_name'],
		             'filepath'  => $image_data['full_path']
			);
				
			$this->MCandidate->do_upload($cand_details);
			
		}
		$file_id = $this->db->insert_id();
		$this->MCandidate->updateFile($file_id,$id);
	} 
	elseif ($this->input->post('upload'))
	{
	
	$file =  $_SERVER['DOCUMENT_ROOT']."/public/candidate/" ;
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			'upload_path' => $file,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		// rename($image_data['full_path'],$image_data['file_path'].$name."_".$type.$image_data['file_ext']);
		$this->load->database();
	
	 $c_id=$this->uri->segment(4);
	     $count = count($this->uri->segment(4));
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
	 
			         'cand'   => $id,
					 'filename'  => $image_data['file_name'],
		             'filepath'  => $image_data['full_path']
			);
				
			$this->MCandidate->do_upload($cand_details);
			
		}
		
		}
	
	                  // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Candidate has been updated successfully.');
					   redirect('candidates/admin/editCandidate/'.$id,'refresh');
	              
	          }
			else{
			   // To retrive a single company detail.
			    $data['candidate'] =  $this->MCandidate->getSingleCandidate($id);
				// To retrive a candidate status detail.
			    $data['status'] =  $this->MCandidate->getCandidateStatus($id,$username);
				// To retrive a single candidate folder detail.
			    $data['fol'] =  $this->MCandidate->getSingleCandidatefolder($id);
				// To retrive a single candidate worksheet detail.
			    $data['submaster_worksheet'] =  $this->MCandidate->getSingleCandidateSubMasterWorksheet($id);
				// To retrive a single candidate worksheet detail.
			    $data['master_worksheet'] =  $this->MCandidate->getSingleCandidateMasterWorksheet($id);
				// To retrive a single candidate worksheet detail.
			    $data['basic_direct'] =  $this->MCandidate->getSingleCandidateBasicDirect($id);
				// To retrive a single candidate worksheet detail.
			    $data['basic_indirect'] =  $this->MCandidate->getSingleCandidateBasicIndirect($id);
				// To retrive a single candidate indus detail.
			    $data['indus'] =  $this->MCandidate->getSingleCandidateindus($id);
				// To retrive a single candidate indus detail.
			    $data['subindus'] =  $this->MCandidate->getSingleCandidatesubindus($id);
				// To retrive a single candidate indus detail.
			    $data['indfunc'] =  $this->MCandidate->getSingleCandidatefunc($id);
				// To retrive a single candidate indus detail.
			    $data['subfunc'] =  $this->MCandidate->getSingleCandidatesubfunc($id);
				// To retrive the attachment list.
			    $data['attachment'] =  $this->MCandidate->getAttachmentList($id);
				// To retrive a single company detail.
			    $data['filetoview'] =  $this->MCandidate->getSinglefile($id);
				
				
			    // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_edit";
                $data['module'] = 'candidates';
                $this->load->view('admin/admin_candidate_edit',$data);
           }
         }
		 // This enters new candidate.
    function newCandidate(){
	    // This gets the company id.
	    $id = $this->uri->segment(4);
		// This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Edit Candidate";
        // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Edit Candidate";
	    $username = $this->session->userdata('id');
		$data['sfolder'] =  $this->MCandidate->getFolder($username);
		if ($this->input->post('candidate_name')){
            $id = $this->uri->segment(4);
	        $this->MCandidate->save();
			$id = $this->db->insert_id();  
			if ($this->input->post('folder_name')){
			$cand_details = array(
			          'p_id' =>$this->input->post('folder_name'),
			         'c_id'   =>$id,
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
				}
	if ($this->input->post('worksheet1') && $this->input->post('worksheet2')){
		$worksheet1= $this->input->post('worksheet1');
		   $worksheet1_details = array(
			         'c_id'   =>  $id,
					 'worksheet1'  =>$worksheet1,
					);
					$this->MCandidate->addtoworksheet1($worksheet1_details);
					}
	if ($this->input->post('worksheet2')){
		$worksheet2= $this->input->post('worksheet2');
		   $worksheet2_details = array(
			         'c_id'   =>  $id,
					 'worksheet2'  =>$worksheet2,
					);
					$this->MCandidate->addtoworksheet2($worksheet2_details);
					}
	if ($this->input->post('industry') && $this->input->post('sub_industry') ){
		$industry= $this->input->post('industry');
		      $indus_details = array(
			         'c_id'   =>  $id,
					 'industry'  =>$industry,
					);
					$this->MCandidate->addtoindus($indus_details);
					}
	 if ($this->input->post('sub_industry')){
		$sub_industry= $this->input->post('sub_industry');
		      $sub_indus_details = array(
			         'c_id'   =>  $id,
					 'sub_industry'  =>$sub_industry,
					);
					$this->MCandidate->addtosubindus($sub_indus_details);
					}
	if ($this->input->post('indfunction') && $this->input->post('sub_function') ){
		$indfunction= $this->input->post('indfunction');
		      $indfunc_details = array(
			         'c_id'   =>  $id,
					 'indfunction'  =>$indfunction,
					);
					$this->MCandidate->addtofunc($indfunc_details);
					}
	 if ($this->input->post('sub_function')){
		$sub_function= $this->input->post('sub_function');
		      $sub_func_details = array(
			         'c_id'   =>  $id,
					 'sub_function'  =>$sub_function,
					);
					$this->MCandidate->addtosubfunc($sub_func_details);
					}
	  if ($this->input->post('status')){
		$status= $this->input->post('status');
		      $status_details = array(
			         'c_id'   =>  $id,
					 'status' =>  $status,
					 'user'  =>  $username,
					);
					$this->MCandidate->addtostatus($status_details);
					}
		
	if ($this->input->post('upload')) {
	$name = $this->input->post('candidate_name');
	$type = $this->input->post('file_type');
	
	
	$file =  $_SERVER['DOCUMENT_ROOT']."/public/candidate/" ;
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			'upload_path' => $file,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		 //rename($image_data['full_path'],$image_data['file_path'].$name."_".$type.$image_data['file_ext']);
		$this->load->database();
	
	 $c_id=$this->uri->segment(4);
	     $count = count($this->uri->segment(4));
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
	 
			         'cand'   =>$c_id[$i],
					 'filename'  => $image_data['file_name'],
		             'filepath'  => $image_data['full_path']
			);
				
			$this->MCandidate->do_upload($cand_details);
		  }
		}
	              // This flags the messege about that a new company has been created successfully.		
	              flashMsg('success','Candidate has been updated successfully.');
				   redirect('candidates/admin/editCandidate/'.$id,'refresh');
		   
	          }
			else{
		   	  // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_new";
                $data['module'] = 'candidates';
                $this->load->view('admin/admin_candidate_new',$data);
           }
         }
		 

		 
   function deletesubind($id = NULL){
	        $cand_id = $this->uri->segment(4);
            $id = $this->uri->segment(5);
           $this->MCandidate->deletesubind($id);
         redirect('candidates/admin/editCandidate/'.$id,'refresh');
      }
	  
	  
   function ajax_deletesubind($id){
     if($id){
          $this->MCandidate->deletesubind($id);
       }
     }

   	    // This loads all the candidates's record
    function refered(){
	 // This shows the module name user is accessing, as a tiltle in the browser. 
		    $data['title'] = "Candidate List";
		    // This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = 'Candidate List';
            $id = $this->uri->segment(4);
		 $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		 if($this->input->post('folder_name')==1)
		 {
		 redirect('candidates/admin/refered','refresh');
		 }
		 else{	 
	    $username = $this->session->userdata('id');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/refered/';
		$config['total_rows'] = $this->MCandidate->record_count_refered($username);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		//$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
         $data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->fetch_reference($config['per_page'],$page,$username);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_refered";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);
       }
	   }
	   
	  // This enters a new worksheet
      function home()
	  {
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Worksheet Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Worksheet Manager";
            $username = $this->session->userdata('id');
            $user = $this->session->userdata('username');
	           
				if($this->input->post('constituent')){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
	               $constituent=$_POST['constituent'];
	                $count = count($_POST['c_id']);
					 $countcons = count($_POST['constituent']);
                         for($i=0; $i<$count; $i++) {
						      for($j=0; $j<$countcons; $j++) {
						 
	                            $worksheet_details=array(
											'c_id' 	=> $cid[$i],
											'constituent_id'        => $constituent[$j],
									               );
	                            $this->MCandidate->addtoWorksheet($worksheet_details);
						}
					 }
				  
				
				
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	          redirect('candidates/admin/admin','refresh');
	   }
	   
	   			if($this->input->post('delete')){
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
	          redirect('candidates/admin/admin','refresh');
	   }
	   
	   
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
					
					  redirect('candidates/admin/admin','refresh');
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
					
					  redirect('candidates/admin/admin','refresh');
					}
		
	elseif ($this->input->post('upload')) {
	if(! $this->input->post('c_id'))
			{
			echo "<b><h1>Please select candidate first</h1></b>";
			}
			else
			{
	
	$file =  $_SERVER['DOCUMENT_ROOT']."/public/candidate/" ;
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			'upload_path' => $file,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		$this->load->database();
	
	 $c_id=$_POST['c_id'];
	     $count = count($_POST['c_id']);
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
	 
			         'cand'   =>$c_id[$i],
					 'filename'  => $image_data['file_name'],
		             'filepath'  => $image_data['full_path']
			);
				
			$this->MCandidate->do_upload($cand_details);
			
		}
		}
		redirect('candidates/admin/admin','refresh');
			
	}else{
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_home";
                 $data['module'] = 'candidates';
                 $this->load->view($this->_container,$data);
				 //
            }
       }
 

	  function files()
	  {
	  $data['files']=$this->MCandidate->fetch_files();
	  foreach ($data['files'] as $row){
	  $sql = "UPDATE candidates SET file_to_view='".$row->file_id."' WHERE id='".$row->cand."'";
	  echo $sql;
	  $this->MCandidate->importfiles($sql);
	  }
	  
	  
	  }
	  
	
	//This deletes the candidates from the database.
	function delCand()
	 {
	   // This deletes the candidate records
	   		if($this->input->post('delete')){
				 $cid=$_POST['c_id'];
			       $count = count($_POST['c_id']);
				         
						      for($j=0; $j<$count; $j++) {
						 
	                           $candidateid = $cid[$j];
	                            $this->MCandidate->delCandDB($candidateid);
						}
					
				    }
			  if($this->input->post('reject')){
				 $cid=$_POST['c_id'];
			       $count = count($_POST['c_id']);
				        
						      for($j=0; $j<$count; $j++) {
						 
	                           $candidateid = $cid[$j];
	                            $this->MCandidate->RejCandDB($candidateid);
						}
					 }
			 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Candidates has been deleted successfully.');
	          redirect('candidates/admin/candToDelete','refresh');
	 
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
						}
							 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	          redirect('usage/admin/'.$page,'refresh');
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
	          redirect('usage/admin/'.$page,'refresh');
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
	          redirect('usage/admin/'.$page,'refresh');
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
	          redirect('usage/admin/'.$page,'refresh');
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
	          redirect('usage/admin/'.$page,'refresh');
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
					  redirect('usage/admin/'.$page,'refresh');
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
					  redirect('usage/admin/'.$page,'refresh');
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
	          redirect('usage/admin/'.$page,'refresh');
		   }
		   //
	
	} 

	
}
?>