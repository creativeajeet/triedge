<?php
class Admin extends Admin_Controller {

function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('List Manager');
			// Load models and language
			$this->load->module_model('auth','User_model');
			$this->load->model('MWorksheet');
			$this->load->model('MCandidate');
			$this->load->language('customer');
			$this->load->module_model('messege','MMessege');
					// Set breadcrumb
			$this->bep_site->set_crumb('Miscellaneous','list/admin');
			$this->load->helper('date');
			// Load the validation library
		    $this->load->library('validation');
			log_message('debug','BackendPro : Members class loaded');
	}
	function index2()
	  {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidates ";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidates";
		$username = $this->session->userdata('id');
		
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_index";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);	
	  }
	// This gets all the list category, list values, their synonyms etc in alpha order.
	function index()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/index/';
		$config['total_rows'] = 50;
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
		$data['results'] = $this->MCandidate->fetch_candidates($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_index";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);		
	}
	//
	//
	
	function getGrade(){
            if('IS_AJAX') {
			$check = $this->MCandidate->checkGradeList();
			  if($check==TRUE)
			   {
        	$data['option_gradeid'] = $this->MCandidate->getGradeList();		
		    $this->load->view('admin/gradelist',$data);
			   }
			   else{
			      $this->load->view('admin/gradeinput');
			   }
            }
			
	}
	
	function getLevel(){
            if('IS_AJAX') {
			 $check = $this->MCandidate->checkLevelList();
			  if($check==TRUE)
			   {
        	$data['option_levelid'] = $this->MCandidate->getLevelList();		
		    $this->load->view('admin/levellist',$data);
			  }
			  else{
			  $data['levellist']= $this->MCandidate->getAllLevelList();
			  $this->load->view('admin/levelinput',$data);
			  }
            }
		}
	
	function getSubIndus(){
            if('IS_AJAX') {
			 $data['option_subindustry'] = $this->MCandidate->getSubIndus();		
		    $this->load->view('admin/subindus',$data);
			  }
			}
			
	 function getSubFunc(){
            if('IS_AJAX') {
			 $data['option_subfunction'] = $this->MCandidate->getSubFunc();		
		    $this->load->view('admin/subfunc',$data);
			  }
			}
		
	function lookup(){
		// process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MCandidate->lookup($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->s_id,
                                        'value' => $row->parentname,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('admin/admin_candidate_new',$data); //Load html view of search results
        }
	}
	
	// look for location
	function lookuplocation(){
		// process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MCandidate->lookuplocation($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->s_id,
                                        'value' => $row->parentname,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('admin/admin_candidate_new',$data); //Load html view of search results
        }
	}
	
	// look for location
	function lookupindustry(){
		// process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MCandidate->lookupindustry($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'value' => $row->segment_name,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('admin/admin_candidate_new',$data); //Load html view of search results
        }
	}
	function lookupindfunc(){
		// process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MCandidate->lookupindfunc($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'value' => $row->segment_name,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('admin/admin_candidate_new',$data); //Load html view of search results
        }
	}
	function lookupgrade(){
		// process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MCandidate->lookupgrade($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'value' => $row->segment_name,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('admin/admin_candidate_new',$data); //Load html view of search results
        }
	}
	
	
	function mycandidate()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$user = $this->session->userdata('username');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['username']= $this->session->userdata('username');
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions2();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/mycandidate/';
		$config['total_rows'] = $this->MCandidate->record_count_mycandidate($user);
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
		$data['results'] = $this->MCandidate->fetch_mycandidates($user,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		 
			 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_mycandidate";
			
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);		
	}
	//
	// candidates whose cv is to be attached
	function notAttach()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
		 $data['header'] = "Candidate List";
		 $username = $this->session->userdata('id');
		 $data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['news'] = $this->MMessege->getNews();
		$userid = $this->session->userdata('id');
		$user = $this->session->userdata('username');
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/notAttach/';
		$config['total_rows'] = $this->MCandidate->record_count_notattach($user);
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
		$data['results'] = $this->MCandidate->getAttachNot($user,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']=$column_name;
		$data['order']=$order;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "search_result_simple";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);		
	   }
	   //
	// This gets all the list category, list values, their synonyms etc in last updated order.
	function lastupdated()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$column = $this->input->post('column_name');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/lastupdated/';
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
		$order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/columnSort/';
		$config['total_rows'] = $this->MCandidate->record_count_column($column_name,$order);
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
		$data['results'] = $this->MCandidate->fetch_candidates_bycolumn($column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		
		$data['column_name'] = $column_name;
		$data['order'] = $order;
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
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$heading = $this->MCandidate->searchterm_handler_simple_heading($this->input->get_post('heading', TRUE));
		$keyword = $this->MCandidate->searchterm_handler_simple($this->input->get_post('keyword', TRUE));
		$alpha = $this->MCandidate->searchterm_handler_simple($this->input->get_post('alpha', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		if($heading==1)
		{
		redirect('candidates/admin/searchAll/');
		}
		elseif($this->input->post('alphain'))
		  {
		 redirect('candidates/admin/alpha/'.$heading.'/'.$alpha);
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
		$data['results'] = $this->MCandidate->search_simple($heading,$keyword,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['heading'] = $heading;
		$data['keyword'] = $keyword;
		$data['column_name']=$column_name;
		$data['order']=$order;
		}
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_simple";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	
	function new_advanced_search()
	  {
	   if ($this->input->post('new_search'))
		 {
		$candidatename = $this->MCandidate->searchterm_handler_simple_candname1($this->input->get_post('candidatename', TRUE));
		$currentloc = $this->MCandidate->searchterm_handler_curloc1($this->input->get_post('currentlocation', TRUE));
		$region = $this->MCandidate->searchterm_handler_region1($this->input->get_post('region', TRUE));
		$currentcomp = $this->MCandidate->searchterm_handler_curcomp1($this->input->get_post('currentcompany', TRUE));
		$industry = $this->MCandidate->searchterm_handler_ind1($this->input->get_post('industry', TRUE));
		$subindustry = $this->MCandidate->searchterm_handler_subind1($this->input->get_post('subindustry', TRUE));
		$indfunction = $this->MCandidate->searchterm_handler_indfunc1($this->input->get_post('indfunction', TRUE));
		$subfunction = $this->MCandidate->searchterm_handler_subfunc1($this->input->get_post('subfunction', TRUE));
		$department = $this->MCandidate->searchterm_handler_department1($this->input->get_post('department', TRUE));
		$jobtitle = $this->MCandidate->searchterm_handler_jobtitle1($this->input->get_post('jobtitle', TRUE));
		$worksheet = $this->MCandidate->searchterm_handler_worksheet1($this->input->get_post('worksheet', TRUE));
		$designation = $this->MCandidate->searchterm_handler_designation1($this->input->get_post('designation', TRUE));
		$enteredby = $this->MCandidate->searchterm_handler_enteredby1($this->input->get_post('enteredby', TRUE));
		$grade = $this->MCandidate->searchterm_handler_grade1($this->input->get_post('grade', TRUE));
		$level = $this->MCandidate->searchterm_handler_level1($this->input->get_post('level', TRUE));
		$course = $this->MCandidate->searchterm_handler_course1($this->input->get_post('course', TRUE));
		$institute = $this->MCandidate->searchterm_handler_ins1($this->input->get_post('institute', TRUE));
		$passingyear = $this->MCandidate->searchterm_handler_pass1($this->input->get_post('passingyear', TRUE));
		 redirect('candidates/admin/','refresh');
		 }
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
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$this->load->library('pagination');
				
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		if($this->input->post('search'))
		 {
		 $candidatename = $this->MCandidate->searchterm_handler_simple_candname11($this->input->get_post('candidatename', TRUE));
		$currentloc = $this->MCandidate->searchterm_handler_curloc11($this->input->get_post('currentlocation', TRUE));
		$region = $this->MCandidate->searchterm_handler_region11($this->input->get_post('region', TRUE));
		$currentcomp = $this->MCandidate->searchterm_handler_curcomp11($this->input->get_post('currentcompany', TRUE));
		$industry = $this->MCandidate->searchterm_handler_ind11($this->input->get_post('industry', TRUE));
		$subindustry = $this->MCandidate->searchterm_handler_subind11($this->input->get_post('subindustry', TRUE));
		$indfunction = $this->MCandidate->searchterm_handler_indfunc11($this->input->get_post('indfunction', TRUE));
		$subfunction = $this->MCandidate->searchterm_handler_subfunc11($this->input->get_post('subfunction', TRUE));
		$department = $this->MCandidate->searchterm_handler_department11($this->input->get_post('department', TRUE));
		$jobtitle = $this->MCandidate->searchterm_handler_jobtitle11($this->input->get_post('jobtitle', TRUE));
		$worksheet = $this->MCandidate->searchterm_handler_worksheet11($this->input->get_post('worksheet', TRUE));
		$enteredby = $this->MCandidate->searchterm_handler_enteredby11($this->input->get_post('enteredby', TRUE));
		$designation = $this->MCandidate->searchterm_handler_designation11($this->input->get_post('designation', TRUE));
		$grade = $this->MCandidate->searchterm_handler_grade11($this->input->get_post('grade', TRUE));
		$level = $this->MCandidate->searchterm_handler_level11($this->input->get_post('level', TRUE));
		$course = $this->MCandidate->searchterm_handler_course11($this->input->get_post('course', TRUE));
		$institute = $this->MCandidate->searchterm_handler_ins11($this->input->get_post('institute', TRUE));
		$passingyear = $this->MCandidate->searchterm_handler_pass11($this->input->get_post('passingyear', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/advanced_search/';
		$config['total_rows'] = $this->MCandidate->search_record_count($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$worksheet,$enteredby,$designation,$grade,$level,$course,$institute,$passingyear);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		//$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->search($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$worksheet,$enteredby,$designation,$grade,$level,$course,$institute,$passingyear,$column_name,$order,$limit);
		 redirect('candidates/admin/advanced_search','refresh');
		 }
		 else{
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
		$worksheet = $this->MCandidate->searchterm_handler_worksheet($this->input->get_post('worksheet', TRUE));
		$enteredby = $this->MCandidate->searchterm_handler_enteredby($this->input->get_post('enteredby', TRUE));
		$designation = $this->MCandidate->searchterm_handler_designation($this->input->get_post('designation', TRUE));
		$grade = $this->MCandidate->searchterm_handler_grade($this->input->get_post('grade', TRUE));
		$level = $this->MCandidate->searchterm_handler_level($this->input->get_post('level', TRUE));
		$course = $this->MCandidate->searchterm_handler_course($this->input->get_post('course', TRUE));
		$institute = $this->MCandidate->searchterm_handler_ins($this->input->get_post('institute', TRUE));
		$passingyear = $this->MCandidate->searchterm_handler_pass($this->input->get_post('passingyear', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		}
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/advanced_search/';
		$config['total_rows'] = $this->MCandidate->search_record_count($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$worksheet,$enteredby,$designation,$grade,$level,$course,$institute,$passingyear);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		//$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->search($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$worksheet,$enteredby,$designation,$grade,$level,$course,$institute,$passingyear,$column_name,$order,$limit);
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
		$data['worksheet'] = $worksheet;
		$data['enteredby'] = $enteredby;
		$data['designation'] = $designation;
		$data['grade'] = $grade;
		$data['level'] = $level;
		$data['course'] = $course;
		$data['institute'] = $institute;
		$data['paasingyear'] = $passingyear;
		$data['column_name']=$column_name;
		$data['order']=$order;
		$username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
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
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$keyword = $this->MCandidate->searchterm_handler_all($this->input->get_post('keyword', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
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
		$data['results'] = $this->MCandidate->search_all($keyword,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['keyword'] = $keyword;
		$data['column_name']=$column_name;
		$data['order']=$order;
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_simple";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	//
	function alpha()
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		 $data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$heading = $this->uri->segment(4);
		$alpha = $this->uri->segment(5);
		$limit = ($this->uri->segment(6) > 0)?$this->uri->segment(6):0;
		if($heading==1)
		{
		redirect('candidates/admin/searchAll/');
		}
		
		else
		{
		$config['base_url'] = base_url() . 'index.php/candidates/admin/alpha/'.$heading.'/'.$alpha;
		$config['total_rows'] = $this->MCandidate->search_record_count_simple_alpha($heading,$alpha);
		$config['per_page'] = 20;
		$config['uri_segment'] = 6;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 20;		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->search_simple_alpha($heading,$alpha,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['heading'] = $heading;
		$data['alpha'] = $alpha;
		}
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_simple";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	//
	
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
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		 if($this->input->post('folder_name')==1)
		 {
		 redirect('candidates/admin/refered','refresh');
		 }
		 else{
		$this->load->library('pagination');
		$this->session->unset_userdata('searchterm');
	    $username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['folderall'] =  $this->MCandidate->getFolderAll($username);
		$data['sharefolder'] =  $this->MCandidate->getFolderShare($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['sheetopt'] = $this->MCandidate->getSheetOpt();
		$folder_name = $this->MCandidate->searchterm_handler_simple_folder_name($this->input->get_post('folder_name', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		$limit = ($this->uri->segment(4) > 0)?$this->uri->segment(4):0;
		$config['base_url'] = base_url() . 'index.php/candidates/admin/open_folder/';
		$config['total_rows'] = $this->MCandidate->search_record_count_folder($folder_name,$username);
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_folder($folder_name,$username,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['folder_name'] = $folder_name;
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_folder";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		}
	  }
	 //
	 function open_myworksheet()
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['folderall'] =  $this->MCandidate->getFolderAll($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['sheetopt'] = $this->MCandidate->getSheetOpt();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$data['myworksheet'] = $this->input->post('myworksheet');
		$basicworksheet = $this->MCandidate->searchterm_handler_myworksheet($this->input->get_post('myworksheet', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(5) > 0)?$this->uri->segment(5):0;
		$data['worksheetname'] = $this->MCandidate->getWorksheetName($basicworksheet);
		$config['base_url'] = base_url() . 'index.php/candidates/admin/open_myworksheet/'.$basicworksheet.'/';
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet($basicworksheet);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;
		$config['num_links'] = 20;		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet($basicworksheet,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['openedworksheet']=$basicworksheet;
		$data['myworksheet'] = $basicworksheet;
		$data['column_name']= $column_name;
		$data['order']= $order;
	     $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($basicworksheet);
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_openworksheet";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	//
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['folderall'] =  $this->MCandidate->getFolderAll($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['sheetopt'] = $this->MCandidate->getSheetOpt();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$basicworksheet1 = $this->MCandidate->searchterm_handler_basicworksheet1($this->input->get_post('constituentpull', TRUE));
		$basicworksheet2 = $this->MCandidate->searchterm_handler_basicworksheet2($this->input->get_post('basicworksheet_id', TRUE));
		$count = count($basicworksheet1);
		$count2 = count($basicworksheet2);
		if($this->input->post('constituentpull'))
		 {
		for($i=0; $i<$count; $i++)
		  {
		   $basicworksheet=$basicworksheet1[0];
		  }
		  $data['constituentpull'] = $basicworksheet;
		  $data['myworksheet'] = $basicworksheet1;
		 }
		 elseif($this->input->post('basicworksheet_id'))
		 {
		for($i=0; $i<$count2; $i++)
		  {
		   $basicworksheet=$basicworksheet2[0];
		  }
		  $data['basicworksheet_id'] = $basicworksheet;
		  $data['myworksheet'] = $basicworksheet2;
		 } 
		 else{
		  $basicworksheet = $this->uri->segment(4);
		   $data['myworksheet'] = $basicworksheet;
		 }
		 $column_name = $this->MCandidate->searchterm_handler_column_sort($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(5) > 0)?$this->uri->segment(5):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/open_worksheet/'.$basicworksheet.'/';
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet($basicworksheet);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;
		$config['num_links'] = 20;			
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet($basicworksheet,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['openedworksheet']=$basicworksheet;
	    $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($basicworksheet);
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_openworksheet";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	//
	//
function sort_worksheet()
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['folderall'] =  $this->MCandidate->getFolderAll($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['sheetopt'] = $this->MCandidate->getSheetOpt();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$basicworksheet = $this->MCandidate->searchterm_handler_worksheett($this->input->get_post('worksheett', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column_sort($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(5) > 0)?$this->uri->segment(5):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/sort_worksheet/'.$basicworksheet.'/';
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet($basicworksheet);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;
		$config['num_links'] = 20;		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet($basicworksheet,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['openedworksheet']=$basicworksheet;
	     $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($basicworksheet);
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_openworksheet";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	//
	//counts candidates companywise for a opened worksheet
	function countcompanywise()
	    {
		 // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Company List";
	    // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Company List";
		$worksheet = $this->uri->segment(4);
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $config['base_url'] = base_url() . 'index.php/candidates/admin/countcompanywise/'.$worksheet.'/';
		$config['total_rows'] = $this->MCandidate->countCompany($worksheet);
		$config['per_page'] = 15;
		$config['uri_segment'] = 5;
		$data['total'] = $config['total_rows'];		//$choice = $config['total_rows']/$config['per_page'];
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

		$data['results'] = $this->MCandidate->getCompanyCount($worksheet,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_companycount";
	    $data['module'] = 'candidates';
		$this->load->view('admin/admin_candidate_companycount',$data);
		}
		
		//counts candidates companywise for a opened worksheet
	function countcompanywisefilter()
	    {
		 // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Company List";
	    // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Company List";
		$worksheet = $this->uri->segment(4);
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$currentcomp = $this->MCandidate->searchterm_handler_curcomp11($this->input->get_post('currentcompany', TRUE));
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $config['base_url'] = base_url() . 'index.php/candidates/admin/countcompanywisefilter/'.$worksheet.'/';
		$config['total_rows'] = $this->MCandidate->countCompanyFil($worksheet,$currentcomp);
		$config['per_page'] = 15;
		$config['uri_segment'] = 5;
		$data['total'] = $config['total_rows'];		//$choice = $config['total_rows']/$config['per_page'];
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

		$data['results'] = $this->MCandidate->getCompanyCountFil($worksheet,$currentcomp,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_companycountfilter";
	    $data['module'] = 'candidates';
		$this->load->view('admin/admin_candidate_companycountfilter',$data);
		}
		
		
		//
function worksheetedit()
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$basicworksheet = $this->uri->segment(5);
		$column_name = $this->MCandidate->searchterm_handler_column_sort($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(6) > 0)?$this->uri->segment(6):0;
		$page = $this->uri->segment(4);
		$config['base_url'] = base_url() . 'index.php/candidates/admin/worksheetedit/'.$page.'/'.$basicworksheet.'/';
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet($basicworksheet);
		$config['per_page'] = 20;
		$config['uri_segment'] = 6;
		$config['num_links'] = 20;		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet($basicworksheet,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['openedworksheet']=$basicworksheet;
	     $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($basicworksheet);
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_openworksheet";
	    $data['module'] = 'candidates';
	   $this->load->view('admin/search_result_worksheetedit',$data);	 
		
	}
		//
function openwcw()
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$basicworksheet = $this->uri->segment(4);
		$comp = $this->uri->segment(5);
		$column_name = $this->MCandidate->searchterm_handler_column_sort($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(6) > 0)?$this->uri->segment(6):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/openwcw/'.$basicworksheet.'/'.$comp;
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet_comp($basicworksheet,$comp);
		$config['per_page'] = 20;
		$config['uri_segment'] = 6;
		$config['num_links'] = 20;		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet_comp($basicworksheet,$comp,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['openedworksheet']=$basicworksheet;
	     $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($basicworksheet);
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_openworksheetcompwise";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	
	//
function openwlw()
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$basicworksheet = $this->uri->segment(4);
		$comp = $this->uri->segment(5);
		$column_name = $this->MCandidate->searchterm_handler_column_sort($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(6) > 0)?$this->uri->segment(6):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/openwlw/'.$basicworksheet.'/'.$comp;
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet_loc($basicworksheet,$comp);
		$config['per_page'] = 20;
		$config['uri_segment'] = 6;
		$config['num_links'] = 20;		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet_loc($basicworksheet,$comp,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['openedworksheet']=$basicworksheet;
	     $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($basicworksheet);
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_openworksheetcompwise";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	//candidates to be added to worksheet
	function cand_to_worksheet()
	  {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
	// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Candidate List';
		$username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$user = $this->session->userdata('username');
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		//
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/cand_to_worksheet/';
		$config['total_rows'] = $this->MCandidate->record_count_worksheet($user);
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
		$data['results'] = $this->MCandidate->fetch_candidates_worksheet($user,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_simple";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
	  }
	  //
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
		   $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		   $data['segmenttype'] = $this->MWorksheet->getSegmentType();
		   $data['positions2'] = $this->MCandidate->getAllPostitions2();
		   $data['users']= $this->MCandidate->getConsulDropdown();
		   $username = $this->session->userdata('id');
		  $data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
           // Set breadcrumb(navigation). This tells where you are while accessing this software.
           $this->bep_site->set_crumb('Candidate Import','candidates/admin/candidateimport');
          
	          // This is how Mirus-HRMS loads views
              $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_import";
              $data['module'] = 'candidates';
              $this->load->view($this->_container,$data,array('error' => ' ' ));
           }//
		   //
	// This imports candidate list from excel sheet	generated from naukri.com
    function importNaukri(){
	       // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Candidate Import";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Candidate Import";
		   $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		   $data['segmenttype'] = $this->MWorksheet->getSegmentType();
		   $username = $this->session->userdata('id');
		  $data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
           // Set breadcrumb(navigation). This tells where you are while accessing this software.
           $this->bep_site->set_crumb('Candidate Import','candidates/admin/candidateimport');
          
	          // This is how Mirus-HRMS loads views
              $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_importnaukri";
              $data['module'] = 'candidates';
              $this->load->view($this->_container,$data,array('error' => ' ' ));
           }
		   //
		   // This imports candidate list from excel sheet	generated from naukri.com
    function importMonster(){
	       // This shows the module name user is accessing, as a tiltle in the browser. 
           $data['title'] = "Candidate Import";
           // This shows the module name you are accessing, as a header(tab name) in the browser. 
           $data['header'] = "Candidate Import";
		   $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		   $data['segmenttype'] = $this->MWorksheet->getSegmentType();
		   $username = $this->session->userdata('id');
		  $data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
           // Set breadcrumb(navigation). This tells where you are while accessing this software.
           $this->bep_site->set_crumb('Candidate Import','candidates/admin/candidateimport');
          
	          // This is how Mirus-HRMS loads views
              $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_importmonster";
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
     
	  // attchment pop up
	
	  function viewattachment()
	    {
		  $id = $this->uri->segment(4);
		  $data['cv'] = $this->MCandidate->getAttach($id);
		  $this->load->view('admin/admin_candidate_cv',$data);
		 }
	 //     
	 //upload attachments
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
			$module = $this->input->post('table_name');
			$entered_on = date('Y-m-d');
	
$sql = "INSERT INTO `".$module."` (";
for ($j = $startColumn; $j <= $endColumn; $j++)
{
	$sql .= "`" . mysql_escape_string($data['cells'][$startColumn][$j]) . "`,";
}
$sql = substr($sql, 0, -1) . ",`entered_on`) VALUES\r\n";
//cells
for ($i = $startRow; $i <= $endRow; $i++)
{
	$sql .= "(";
	for ($j = $startColumn; $j <= $endColumn; $j++)
	{
		$sql .= "'" . mysql_escape_string($data['cells'][$i][$j]) . "',";
	}
	$sql = substr($sql, 0, -1) . ",'".$entered_on."'),\r\n";
}
$sql =  substr($sql, 0, -3) . ";";

echo '<pre>';
echo $sql;	
$this->MCandidate->import($sql);
$lastinsertid = $this->db->insert_id();
echo $lastinsertid;
$lastpid = $lastinsertid-1;
$data['allimportids'] = $this->MCandidate->getAllImportId($lastpid);

    $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		   $data['segmenttype'] = $this->MWorksheet->getSegmentType();
		   $username = $this->session->userdata('id');
		  $data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
		  $data['positions2'] = $this->MCandidate->getAllPostitions2();
		   $data['users']= $this->MCandidate->getConsulsDropdown();
 // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_imp";
                $data['module'] = 'candidates';
                $this->load->view('admin/admin_candidate_imp',$data);
 
		}
	}
	
	//upload naukri excel sheet
	//upload attachments
	 	function do_uploadNaukri()
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
			$module = $this->input->post('table_name');
			$entered_on = date('Y-m-d');
	
$sql = "INSERT INTO `candidates` (`candidate_name`,`telephone`,`year_of_birth`,`email`,`comment`,`profile_brief`,`current_location`,`current_company`,`designation`,`salary`,`course`,`entered_on`,`entered_by`,`is_imported`) VALUES\r\n";
//cells
for ($i = $startRow; $i <= $endRow; $i++)
{
	$sql .= "(";
	for ($j = $startColumn; $j <= $endColumn; $j++)
	{
		$sql .= "'" . mysql_escape_string($data['cells'][$i][$j]) . "',";
	}
	$sql = substr($sql, 0, -1) . ",'".$entered_on."','Naukri.com','1'),\r\n";
}
$sql =  substr($sql, 0, -3) . ";";
echo '<pre>';
echo $sql;	
$this->MCandidate->import($sql);
$lastinsertid = $this->db->insert_id();
echo $lastinsertid;
$lastpid = $lastinsertid-1;
$data['allimportids'] = $this->MCandidate->getAllImportId($lastpid);

    $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		   $data['segmenttype'] = $this->MWorksheet->getSegmentType();
		   $username = $this->session->userdata('id');
		  $data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
 // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_imp";
                $data['module'] = 'candidates';
                $this->load->view('admin/admin_candidate_imp',$data);
 
		}
	}
	//
	//upload monster excel sheet
	//upload attachments
	 	function do_uploadMonster()
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
			$module = $this->input->post('table_name');
			$entered_on = date('Y-m-d');
	
$sql = "INSERT INTO `candidates` (`candidate_name`,`year_of_birth`,`profile_brief`,`course`,`comment`,`current_company`,`current_location`,`current_role`,`industry`,`email`,`telephone`,`salary`,`entered_on`,`entered_by`,`is_imported`) VALUES\r\n";
//cells
for ($i = $startRow; $i <= $endRow; $i++)
{
	$sql .= "(";
	for ($j = $startColumn; $j <= $endColumn; $j++)
	{
		$sql .= "'" . mysql_escape_string($data['cells'][$i][$j]) . "',";
	}
	$sql = substr($sql, 0, -1) . ",'".$entered_on."','Monster.com','1'),\r\n";
}
$sql =  substr($sql, 0, -3) . ";";

echo '<pre>';
echo $sql;	
$this->MCandidate->import($sql);
$lastinsertid = $this->db->insert_id();
echo $lastinsertid;
$lastpid = $lastinsertid-1;
$data['allimportids'] = $this->MCandidate->getAllImportId($lastpid);

    $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		   $data['segmenttype'] = $this->MWorksheet->getSegmentType();
		   $username = $this->session->userdata('id');
		  $data['myworksheet']= $this->MCandidate->getUserWorksheet($username);
 // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_imp";
                $data['module'] = 'candidates';
                $this->load->view('admin/admin_candidate_imp',$data);
 
		}
	}
	//
   function impinwork()
     {
	   
		    
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
	          redirect('candidates/admin/import_candidate','refresh');
						}
		elseif($this->input->post('submaster_id')){	
		$basicworksheet1 = $this->MCandidate->searchterm_handler_basicworksheet1($this->input->get_post('constituentpull', TRUE));
		$basicworksheet2 = $this->MCandidate->searchterm_handler_basicworksheet2($this->input->get_post('basicworksheet_id', TRUE));
		$count = count($basicworksheet1);
		$count2 = count($basicworksheet2);			
		if($this->input->post('constituentpull'))
		 {
		for($i=0; $i<$count; $i++)
		  {
		   $basicworksheet=$basicworksheet1[0];
		  }
		  $data['constituentpull'] = $basicworksheet;
		  $data['myworksheet'] = $basicworksheet1;
		 }
		 elseif($this->input->post('basicworksheet_id'))
		 {
		for($i=0; $i<$count2; $i++)
		  {
		   $basicworksheet=$basicworksheet2[0];
		  }
		  $data['basicworksheet_id'] = $basicworksheet;
		  $data['myworksheet'] = $basicworksheet2;
		 } 
		 else{
		  $basicworksheet = $this->uri->segment(4);
		   $data['myworksheet'] = $basicworksheet;
		 }
		 
		 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
	               $worksheet=$basicworksheet;
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
	          redirect('candidates/admin/import_candidate','refresh');
		}
		if($this->input->post('position')){
		    $raid=$this->session->userdata('id');
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
	               $position=$_POST['position'];
				   
					  $date = date('Y-m-d');
	                $count = count($_POST['c_id']);
					          for($i=0; $i<$count; $i++) {
					              $position_details=array(
											'cand_id' 	=> $cid[$i],
											'pofid'        => $position,
											'user_id'    => $raid,
											'stage'  =>'283',
											'date' => $date,
											'databankdate' => $date,
											'ra_id'        => $raid,
											'rastage'  =>'283',
									               );
	                            $this->MCandidate->addtoPof($position_details);
																
						}
									 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	          redirect('candidates/admin/import_candidate','refresh');
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$user = $this->session->userdata('username');
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['indusdropdown'] = $this->MCandidate->getIndusDropDown();
		$data['funcdropdown'] = $this->MCandidate->getFuncDropDown();
		$data['sfolder'] =  $this->MCandidate->getFolder($username);
		if ($this->input->post('candidate_name')){
           $id = $this->uri->segment(4);
	        $this->MCandidate->updateCandidate($user,$id); 
			if($this->input->post('current_company'))
			 {
			$company = $_POST['current_company'];
			$comp = $this->MCandidate->getCand($company);
			if($company==$comp['parentname'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			  elseif($company==$comp['synonym'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			  else{
			   $data = array(
			   'sent_to_synonym' =>'0',
			      );
			   $this->MCandidate->senttosyn($id,$data); 
			  }
			 }
			if ($this->input->post('folder_name')){
			$cand_details = array(
			          'p_id' =>$this->input->post('folder_name'),
			         'c_id'   =>$id,
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
				}
				
				elseif ($this->input->post('newfolder')){
		$cand_details = array(
			          'p_id' =>$this->input->post('newfolder'),
			         'c_id'   =>$id,
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
				}
			 // send to positions
	   	if($this->input->post('pofid')){
				 
			     // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid'];
	                 $date = date('Y-m-d');
					              $selection_details=array(
								            'pofid' =>$positionid,
											'cand_id' 	=> $id,
											'user_id'   => $username,
											'stage'  =>'283',
											'databankdate' => $date,
											'ra_id'        => $username,
											'rastage'  =>'283',
									               );
												 
	                            $this->MCandidate->addtoposition($selection_details);
						
														
						}
						//
						// send to positions
	   	if($this->input->post('pofid2')){
				 
			     // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid2'];
	               $date = date('Y-m-d');
					              $selection_details=array(
								            'pofid' =>$positionid,
											'cand_id' 	=> $id,
											'user_id'   => $username,
											'stage'  =>'283',
											'databankdate' => $date,
											'ra_id'        => $username,
											'rastage'  =>'283',
									               );
												 
	                            $this->MCandidate->addtoposition($selection_details);
						
														
						}
						//				
	if ($this->input->post('myworksheet')){
			$worksheet_details = array(
			             'c_id'   =>$id,
					 'constituent_id' => $this->input->post('myworksheet'),
					);
					$this->MCandidate->addtoWorksheet($worksheet_details);
								$cand = $id;
							$this->MCandidate->addCandtoWorksheet($cand);
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
	
	 $id=$this->uri->segment(4);
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
				// candidate's history
				$data['history'] = $this->MCandidate->getCandHistory($id);
				
				
				
			    // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_edit";
				$data['gradelist']= $this->MCandidate->getAllGradeList();
				$data['levellist']= $this->MCandidate->getAllLevelList();
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['usernames'] = $this->MCandidate->getConsulDropdown2();
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['indusdropdown'] = $this->MCandidate->getIndusDropDown();
		$data['funcdropdown'] = $this->MCandidate->getFuncDropDown();
		$data['sfolder'] =  $this->MCandidate->getFolder($username);
		$data['last'] = $this->MCandidate->last_cand();
		if ($this->input->post('candidate_name')){
            $id = $this->uri->segment(4);
	        $this->MCandidate->save();
			$id = $this->db->insert_id(); 
			$this->MCandidate->addtostatuslist($id);  
			
		if($this->input->post('current_company'))
			 {
			$company = $_POST['current_company'];
			$comp = $this->MCandidate->getCand($company);
			if($company==$comp['parentname'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			  elseif($company==$comp['synonym'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			  else{
			   $data = array(
			   'sent_to_synonym' =>'0',
			   'is_company_updated' =>'0',
			   );
			   $this->MCandidate->senttosyn($id,$data); 
			  }
			 }
			 
			if($this->input->post('current_location'))
			 {
			$loc = $_POST['current_location'];
			$comp = $this->MCandidate->getCandLoc($loc);
			if($loc==$comp['parentname'])
			  {
			   $pid = $comp['s_id'];
			   $data = array(
			   'loc_to_synonym' =>1,
			   'locid' => $pid,
			   'is_location_updated' =>1,
			   );
			   $this->MCandidate->addParentidStatus($id,$data); 
			  }
			 elseif($loc==$comp['synonym'])
			  {
			   $pid = $comp['s_id'];
			   $data = array(
			    'loc_to_synonym' =>1,
			   'locid' => $pid,
			   'is_location_updated' =>1,
			   );
			   $this->MCandidate->addParentidStatus($id,$data); 
			  }
			  else{
			   $data = array(
			   'location' => $loc,
			   'loc_to_synonym' =>'0',
			   'is_location_updated' =>'0',
			   );
			   $this->MCandidate->senttosynstatus($id,$data); 
			  }
			 }
			 
			if ($this->input->post('folder_name')){
			$cand_details = array(
			          'p_id' =>$this->input->post('folder_name'),
			         'c_id'   =>$id,
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
				}
			
		elseif ($this->input->post('newfolder')){
		$cand_details = array(
			          'p_id' =>$this->input->post('newfolder'),
			         'c_id'   =>$id,
					 'user'  =>$username,
					);
					$this->MCandidate->addtofolder($cand_details);
				}
					
		 // send to positions
	   	if($this->input->post('pofid')){
				 
			     // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid'];
	               $date = date('Y-m-d');
					              $selection_details=array(
								            'pofid' =>$positionid,
											'cand_id' 	=> $id,
											'user_id'   => $username,
											'stage'  =>'283',
											'date' => $date,
											'databankdate' => $date,
											'ra_id'        => $username,
											'rastage'  =>'283',
									               );
												 
	                            $this->MCandidate->addtoposition($selection_details);
						
														
						}
						//
						// send to positions
	   	if($this->input->post('pofid2')){
				 
			     // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid2'];
	               $date = date('Y-m-d');
					              $selection_details=array(
								            'pofid' =>$positionid,
											'cand_id' 	=> $id,
											'user_id'   => $username,
											'stage'  =>'283',
											'date' => $date,
											'databankdate' => $date,
											'ra_id'        => $username,
											'rastage'  =>'283',
									               );
												 
	                            $this->MCandidate->addtoposition($selection_details);
						
														
						}
						//					
	 if ($this->input->post('myworksheet')){
	        $worktoadd = $_POST['myworksheet'];
			 $count = count($worktoadd);
			  for($i=0; $i<$count; $i++)
			    {
				 $worksheet_details = array(
			             'c_id'   =>$id,
					   'constituent_id' =>  $worktoadd[$i],
					);
					$this->MCandidate->addtoWorksheet($worksheet_details);
				}
							$cand = $id;
							$this->MCandidate->addCandtoWorksheet($cand);
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
	
	 $id=$this->uri->segment(4);
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
		   	  // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_new";
				$data['gradelist']= $this->MCandidate->getAllGradeList();
				$data['levellist']= $this->MCandidate->getAllLevelList();
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
		$data['news'] = $this->MMessege->getNews();
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
		$data['datesent'] = $timestamp['sent_on'];
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		 if($this->input->post('folder_name')==1)
		 {
		 redirect('candidates/admin/refered','refresh');
		 }
		 else{	 
	   $username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		 $data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$column_name = $this->MCandidate->searchterm_handler_column($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
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
		$data['results'] = $this->MCandidate->fetch_reference($config['per_page'],$page,$username,$column_name,$order);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
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
	        $page = $this->uri->segment(3); 
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
	          redirect('candidates/admin/'.$page,'refresh');
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
	   
	   // This gets all the list category, list values, their synonyms etc in alpha order.
	function excel()
	{
	   
		$basicworksheet = $this->input->post('openedworksheet');
		    	$data['results'] = $this->MCandidate->get_worksheet($basicworksheet);
			    $this->load->view('admin/excel_worksheet',$data);	
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
		    $data['userpos'] = $this->MCandidate->getUserDetails($username);
             $user = $this->session->userdata('username');
	         $page = $this->uri->segment(4); 
			  if($this->input->post('worksheet_excel'))
		      {
		       $basicworksheet = $this->input->post('openedworksheet');
		    	$data['results'] = $this->MCandidate->get_worksheet($basicworksheet);
			    $this->load->view('admin/excel_worksheet',$data);
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
	          redirect('candidates/admin/'.$page,'refresh');
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
	          redirect('candidates/admin/'.$page,'refresh');
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
	          redirect('candidates/admin/'.$page,'refresh');
						}
						
						
			if(($this->input->post('myworksheet'))&& ($this->input->post('move'))){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
				  $sworksheet = $_POST['openedworksheet'];
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
	          redirect('candidates/admin/'.$page.'/'.$sworksheet,'refresh');
		   }
		   
		   // This deletes the candidate records
	   		if($this->input->post('delete')){
			 $page = $this->uri->segment(4); 
			 $pagew = $this->uri->segment(5);
			 $pageno = $this->uri->segment(6);
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
	          redirect('candidates/admin/'.$page.'/'.$pagew.'/'.$pageno,'refresh');
	   }
	    // This remove the candidate records
	   		if($this->input->post('worksheet_remove')){
			 $page = $this->uri->segment(4); 
			 $pagew = $this->uri->segment(5);
			 $pageno = $this->uri->segment(6);
				 $cid=$_POST['c_id'];
				  $worktorem = $_POST['openedworksheet'];
			       $count = count($_POST['c_id']);
				         for($i=0; $i<$count; $i++) {
						      for($j=0; $j<$count; $j++) {
						 
	                           $candidateid = $cid[$j];
	                            $this->MCandidate->removeCandidatework($candidateid,$worktorem,$user);
						}
					 }
				  
			 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Candidates has been removed from worksheet successfully.');
	          redirect('candidates/admin/'.$page.'/'.$worktorem.'/'.$pageno,'refresh');
	   }
	     // This sends the candidates to a folder
	   if ($this->input->post('folder_name')){
		$id = $this->input->post('id');
		$p_id= $this->input->post('folder_name');
		$sopt = $this->input->post('sheetopt');
		//For Candidate
	   $c_id=$_POST['c_id'];
	     $count = count($_POST['c_id']);
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
			          'p_id' =>$p_id,
			         'c_id'   =>$c_id[$i],
					 'user'  =>$username,
					 'option' => $sopt,
					);
					$this->MCandidate->addtofolder($cand_details);
					}
					flashMsg('success','Candidates has been sent to folder successfully.');
					  redirect('candidates/admin/'.$page,'refresh');
					}
	elseif ($this->input->post('newfolder')){
		$id = $this->input->post('id');
		$p_id= $this->input->post('newfolder');
		$sopt = $this->input->post('sheetopt');
		//For Candidate
	   $c_id=$_POST['c_id'];
	     $count = count($_POST['c_id']);
	       for($i=0; $i<$count; $i++){
		      $cand_details = array(
			          'p_id' =>$p_id,
			         'c_id'   =>$c_id[$i],
					 'user'  =>$username,
					  'option' => $sopt,
					);
					$this->MCandidate->addtofolder($cand_details);
					}
					flashMsg('success','Candidates has been sent to folder successfully.');
					  redirect('candidates/admin/'.$page,'refresh');
					}
	    // send to positions
	   	if($this->input->post('pofid')){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid'];
				  $date = date('Y-m-d');
	                $count = count($_POST['c_id']);
					          for($i=0; $i<$count; $i++) {
					              $selection_details=array(
								            'pofid' =>$positionid,
											'cand_id' 	=> $cid[$i],
											'user_id'        => $username,
											'stage'  =>'283',
											'date' => $date,
											'databankdate' => $date,
											'ra_id'        => $username,
											'rastage'  =>'283',
									               );
												 
	                            $this->MCandidate->addtoposition($selection_details);
						
														
						}
					    	
						
							 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	          redirect('candidates/admin/'.$page,'refresh');
		   }
		   
		   // send to positions
	   	if($this->input->post('pofid2')){
				 $cid=$_POST['c_id'];
			     // This enters the multiple basic worksheets.
				  $positionid=$_POST['pofid2'];
				  $date = date('Y-m-d');
	                $count = count($_POST['c_id']);
					          for($i=0; $i<$count; $i++) {
					              $selection_details=array(
								            'pofid' =>$positionid,
											'cand_id' 	=> $cid[$i],
											'user_id'        => $username,
											'stage'  =>'283',
											'date' => $date,
											'databankdate' => $date,
											'ra_id'        => $username,
											'rastage'  =>'283',
									               );
												 
	                            $this->MCandidate->addtoposition($selection_details);
						
														
						}
					    	
						
							 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet has been entered.');
	          redirect('candidates/admin/'.$page,'refresh');
		   }
		   //
		 if ($this->input->post('userid')){
		$usertosend= $this->input->post('userid');
		
		//For Candidate
	   $c_id=$_POST['c_id'];
	     $count = count($_POST['c_id']);
	       for($i=0; $i<$count; $i++){
		      $user_details = array(
			         'c_id'   =>$c_id[$i],
					 'userid'  =>$usertosend,
					
					);
					$this->MCandidate->addtorefer($user_details);
					}
					
				 flashMsg('success','Candidate has been refered successfully.');
	          redirect('candidates/admin/'.$page,'refresh');
					}
	  
		

	} 
	// This enters a new worksheet
      function addtoworkCandidate()
	  { 
	       $id= $this->uri->segment(4);
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Worksheet Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Worksheet Manager";
           
	           
				if($this->input->post('constituentpull')){
				$id= $this->uri->segment(4);
			     // This enters the multiple basic worksheets.
	               $constituent=$_POST['constituentpull'];
	             	 $countcons = count($_POST['constituentpull']);
                      		      for($j=0; $j<$countcons; $j++) {
						 
	                            $worksheet_details=array(
											'c_id' 	=> $id,
											'constituent_id'        => $constituent[$j],
									               );
	                            $this->MCandidate->addtoWorksheet($worksheet_details);
						}
					$cand = $id;
								$this->MCandidate->addCandtoWorksheet($cand);
				  
				
				
				echo "<div align='center' style='color:#006600'>Candidate has been added to worksheet successfully.</div>";
	   }
	  
		if($this->input->post('basicworksheet_id')){
				$id= $this->uri->segment(4);
			     // This enters the multiple basic worksheets.
	               $constituent=$_POST['basicworksheet_id'];
	             	 $countcons = count($_POST['basicworksheet_id']);
                      		      for($j=0; $j<$countcons; $j++) {
						 
	                            $worksheet_details=array(
											'c_id' 	=> $id,
											'constituent_id'        => $constituent[$j],
									               );
	                            $this->MCandidate->addtoWorksheet($worksheet_details);
						}
					$cand = $id;
								$this->MCandidate->addCandtoWorksheet($cand);
				  
				
				
				echo "<div align='center' style='color:#006600'>Candidate has been added to worksheet successfully.</div>";
	   }	
	  
			
	else{
	             
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
                 // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_worksheet";
                 $data['module'] = 'candidates';
                 $this->load->view('admin/admin_candidate_worksheet',$data);
				 //
            }
       }
	   
	   //
	  function candidates()
	  {
	  $data['cands']=$this->MCandidate->fetch_cands();
	  foreach ($data['cands'] as $row){
	  $sql = "UPDATE filesLumen SET cand='".$row->id."' WHERE candidate_c='".$row->candidate_code."';";
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	  }
	 		  }
	  //
	  
	  function files()
	  {
	  $data['files']=$this->MCandidate->fetch_files();
	  foreach ($data['files'] as $row){
	  $sql = "UPDATE candidates SET file_to_view='".$row->file_id."' WHERE id='".$row->cand."'";
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	   
	  }
	 	  
	  }
	  
	  function works()
	  {
	  $data['worksheets']=$this->MCandidate->fetch_worksheet();
	  foreach ($data['worksheets'] as $row){
	  $sql = "UPDATE candidates SET put_in_worksheet='1' WHERE id='".$row->c_id."'";
	  echo $sql;
	  $this->MCandidate->importworks($sql);
	  }
	  
	  
	  }
	  
	  
	    //
	  function candidatespa()
	  {
	  $data['cands']=$this->MCandidate->fetch_candspa();
	  foreach ($data['cands'] as $row){
	  $sql = 'UPDATE synonym SET cand2="'.$row->id.'" WHERE synonym COLLATE Latin1_General_CS = "'.$row->company.'";';
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	  }
	 		  }
	  //
	  
	  function filespa()
	  {
	  $data['files']=$this->MCandidate->fetch_filespaa();
	  foreach ($data['files'] as $row){
	  $sql = 'UPDATE dupcand SET parentid="'.$row->s_id.'" WHERE compa = "'.$row->synonym.'";';
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	   
	  }
	 	  
	  }
	  
	  function filespaa()
	  {
	  $data['files']=$this->MCandidate->fetch_filespa();
	  foreach ($data['files'] as $row){
	 $sql = 'UPDATE candidates SET prid="'.$row->parentid.'", sent_to_synonym="1", is_company_updated="1" WHERE id="'.$row->cdid.'" AND is_company_updated="0" AND noncore="0" AND prid="0" AND sent_to_synonym="0";';
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	   
	  }
	   	  
	  }
	  
	  function filespaaa()
	  {
	 
	
	 
	   $data['results']=$this->MCandidate->importfiless();
	 foreach ($data['results'] as $row){
	 $sql = 'INSERT INTO dupcand VALUES ('.$row->id.', "'.$row->company.'");';
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	   
	  }
	   	  
	  }
	  
	  function loca()
	  {
		 
	   $data['results']=$this->MCandidate->importloc();
	 foreach ($data['results'] as $row){
	 $sql = 'INSERT INTO synonym VALUES ("", "'.$row->segment_name.'", "'.$row->segment_name.'", 2, "", 1, '.$row->id.');';
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	   
	  }
	   	  }
		  
	  function canda()
	  {
	 
	
	 
	   $data['results']=$this->MCandidate->importcand();
	 foreach ($data['results'] as $row){
	 $sql = 'INSERT INTO candstatus VALUES ('.$row->id.', "'.$row->current_location.'", "'.$row->designation.'", "'.$row->institute.'", "'.$row->course.'", "'.$row->industry.'", "'.$row->indfunction.'", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);';
	  echo $sql;
	   $this->MCandidate->importfiles($sql);
	   
	  }
	   	  }
	  // This gets all the candidates who are sent for deletion.
	function candToDelete()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List for Deletion";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List for Deletion";
		$username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/candToDelete/';
		$config['total_rows'] = $this->MCandidate->record_count_cand_to_del();
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
		$data['results'] = $this->MCandidate->fetch_candidates_to_del($config['per_page'],$page);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_delete";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);		
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
								$this->MCandidate->delCandDBW($candidateid);
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
	 
	// database backup
	function backup()
	  {
	  
	   // Load the DB utility class
        $this->load->dbutil();

       // Backup your entire database and assign it to a variable
        $backup =& $this->dbutil->backup();
        // date
        $date = date('Y-m-d');
        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/path/to/triedgebackup-'.$date.'.zip', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
         force_download('triedgebackup-'.$date.'.zip', $backup); 
	   
	  }
   //duplication manager
	 function dupManager()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$username = $this->session->userdata('id');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/dupManager/';
		$config['total_rows'] = $this->MCandidate->record_count_dup();
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
		$data['results'] = $this->MCandidate->fetch_candidates_dup($limit);
		$data['links'] = $this->pagination->create_links();
		// Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "search_result_duplicate";
	       $data['module'] = 'candidates';
	      $this->load->view($this->_container,$data);		
	   }
	   
	   //duplication Remover
	   //duplication remover
		function dupRemover()
		  {
		   $pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
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
				$this->MCandidate->upCandidate($id,$data); 
				 
					}
							
					
				}
			   if($this->input->post('cdel_id'))
			   {
			     $cdelid=$_POST['cdel_id'];
			     $count = count($_POST['cdel_id']);
				  for($i=0; $i<$count; $i++)
				   {
				    $candidateid = $cdelid[$i];
	                $this->MCandidate->delCandDB($candidateid);
					$this->MCandidate->delCandDBW($candidateid);
				   }
			   }
			 if($this->input->post('crem_id'))
			   {
			     $cremid=$_POST['crem_id'];
			     $count = count($_POST['crem_id']);
				  for($k=0; $k<$count; $k++)
				   {
				    $candidateid = $cremid[$k];
	                $this->MCandidate->remCandDB($candidateid);
				   }
			   }
				// This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Database has been updated successfully.');
					   redirect('candidates/admin/dupManager/'.$pageno,'refresh');
			 }
			 // jump to page
			 if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jump');
				$pageno = ($page*20)-1;
				redirect('candidates/admin/dupManager/'.$pageno,'refresh');
				
			   }
		 }
		 
	function worksheetscribble()
	   {
	   $worksheetid = $this->uri->segment(4);
	   $data['worksheetcomments'] = $this->MCandidate->getWorksheetComments($worksheetid);
	   $sent_by = $this->session->userdata('id');
	   $sent_on = date('Y-m-d h:i:s');
	   if($this->input->post('comment'))
	   {
	    $this->MCandidate->enterWorkScribble($worksheetid);
		redirect('candidates/admin/worksheetscribble/'.$worksheetid,'refresh');
	  
	   }
	   
	   else
	   {
	   $this->load->view('admin/admin_worksheet_scribble',$data);
	   }
	  }
	  
	  function worksheetattachment()
	    {
		 $worksheetid = $this->uri->segment(4);
		    $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($worksheetid);
		  if(isset($_POST['go']))
					 {
					  $file =  $_SERVER['DOCUMENT_ROOT']."/public/Others/" ;
					   $config = array(
					   'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			            'upload_path' => $file,
			             'max_size' => 2000
		                  );
					$this->load->library('upload', $config);
					 $this->upload->do_upload();
					 $work_attachment_data = $this->upload->data();
					  $this->load->database();
					   $attachemnt_details = array(
					    'work_id' => $worksheetid,
						'filename' => $work_attachment_data['file_name'],
						'filepath' => $work_attachment_data['full_path']
						);
					  $this->MCandidate->do_upload_worksheet($attachemnt_details);
					 flashMsg('success','Attached successfully.');
	                redirect('candidates/admin/worksheetattachment/'.$worksheetid,'refresh');
					 }
					else{
					$this->load->view('admin/admin_worksheet_attachment',$data);
					}
		}
		
		 function viewworkattachment()
	    {
		  $id = $this->uri->segment(4);
		  $data['worksheetattach'] = $this->MCandidate->getWorkAttach($id);
		  $this->load->view('admin/admin_worksheet_viewattach',$data);
		 }
		 
		 function worksheetposition()
		   {
		   
		     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Position List";
	    // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Position List";
		$worksheet = $this->uri->segment(4);
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $config['base_url'] = base_url() . 'index.php/candidates/admin/worksheetposition/'.$worksheet.'/';
		$config['total_rows'] = $this->MCandidate->countPosition($worksheet);
		$config['per_page'] = 15;
		$config['uri_segment'] = 5;
		$data['total'] = $config['total_rows'];		//$choice = $config['total_rows']/$config['per_page'];
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

		$data['results'] = $this->MCandidate->getPositionCount($worksheet,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_positioncount";
	    $data['module'] = 'candidates';
		$this->load->view('admin/admin_candidate_positioncount',$data);
		   }
		   
		   //counts candidates companywise for a opened worksheet
	function countlocationwise()
	    {
		 // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Company List";
	    // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Company List";
		$worksheet = $this->uri->segment(4);
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $config['base_url'] = base_url() . 'index.php/candidates/admin/countlocationwise/'.$worksheet.'/';
		$config['total_rows'] = $this->MCandidate->countLocation($worksheet);
		$config['per_page'] = 15;
		$config['uri_segment'] = 5;
		$data['total'] = $config['total_rows'];		//$choice = $config['total_rows']/$config['per_page'];
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

		$data['results'] = $this->MCandidate->getLocationCount($worksheet,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_locationcount";
	    $data['module'] = 'candidates';
		$this->load->view('admin/admin_candidate_locationcount',$data);
		}
		
		  //counts candidates companywise for a opened worksheet
	function countlocationwisefilter()
	    {
		 // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Company List";
	    // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Company List";
		$worksheet = $this->uri->segment(4);
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$currentloc = $this->MCandidate->searchterm_handler_curloc($this->input->get_post('currentlocation', TRUE));
		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $config['base_url'] = base_url() . 'index.php/candidates/admin/countlocationwisefilter/'.$worksheet.'/';
		$config['total_rows'] = $this->MCandidate->countLocationFil($worksheet,$currentloc);
		$config['per_page'] = 15;
		$config['uri_segment'] = 5;
		$data['total'] = $config['total_rows'];		//$choice = $config['total_rows']/$config['per_page'];
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

		$data['results'] = $this->MCandidate->getLocationCountfil($worksheet,$currentloc,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_locationcount";
	    $data['module'] = 'candidates';
		$this->load->view('admin/admin_candidate_locationcountfil',$data);
		}
		
	//tags
	function listTags(){
	 $worksheet = $this->uri->segment(4);
	 $this->load->library('pagination');
	 $config['bae_url'] = base_url().'index.php/candidates/admin/listTags'.$worksheet;
	 $config['total_rows'] = $this->MCandidate->countCurrentTags($worksheet);
	 $config['per_page'] = 10;
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
	 $data['currenttags'] = $this->MCandidate->getCurrentTags($worksheet);
	 $data['currenttaglinks']=$this->pagination->create_links();
	 
	 $config1['bae_url'] = base_url().'index.php/candidates/admin/listTags'.$worksheet;
	 $config1['total_rows'] = $this->MCandidate->countSuggestedTags($worksheet);
	 $config1['per_page'] = 10;
	 $config1['uri_segment'] = 5;
	 $config1['num_links'] = 19;
	 
	 $this->pagination->initialize($config1);
	 $limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
	 
	 $data['total'] = $config1['total_rows'];
	 $data['suggestedtags'] = $this->MCandidate->getSuggestedTags($worksheet);
	 $data['suggestedtagslinks']=$this->pagination->create_links();
	 $this->load->view('admin/admin_candidate_counttags',$data);
	}
	// create tags
	function createTags()
	  {
	   $worksheet = $this->uri->segment(4);
	   if(($this->input->post('addTags')) && ($this->input->post('suggestedtags')))
	     {
		 $worksheet = $this->uri->segment(4);
		  $tags = $this->input->post('suggestedtags');
		  $count = count($tags);
		    for($i=0; $i<$count; $i++)
			  {
			   $tag_data = array(
			   'tagw_id' => $tags[$i],
			   'worksheet_id' => $worksheet,
			   );
			   $this->MCandidate->addTags($tag_data);
			  }
			 redirect('candidates/admin/listTags/'.$worksheet,'refresh');
		  
		 }
		 else{
		 redirect('candidates/admin/listTags/'.$worksheet,'refresh');
		 }
		if(($this->input->post('createtag')) && ($this->input->post('newtag')))
		 {
		    $this->MCandidate->newTag();
		  $newtag = $this->db->insert_id();
		   $worksheet = $this->uri->segment(4);
		   $tag_data = array(
			   'tagw_id' => $newtag,
			   'worksheet_id' => $worksheet,
			   );
			   $this->MCandidate->addTags($tag_data);
			   redirect('candidates/admin/listTags/'.$worksheet,'refresh');
		 }
		 else{
		 redirect('candidates/admin/listTags/'.$worksheet,'refresh');
		 }
	  }
	  
	  //tag summary
	  function tagsummary()
	    {
		 $this->load->library('pagination');
		 $config['base_url'] = base_url().'index.php/candidates/admin/tagsummary/';
		 $config['total_rows'] = $this->MCandidate->countAllTags();
		 $config['per_page'] = 10;
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
	     $data['alltags'] = $this->MCandidate->getAllTags($limit);
	     $data['alllinks']=$this->pagination->create_links();
		 $this->load->view('admin/admin_candidate_tagsummary',$data);
		}
	function candSheet()
	    {
		  $data['header'] = "Candidate Sheet";
		  $data['Title'] = "Candidate Sheet";
		  $username = $this->session->userdata('id');
		  $user = $this->session->userdata('username');
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['folderall'] =  $this->MCandidate->getFolderAll($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['sheetopt'] = $this->MCandidate->getSheetOpt();
	    $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/candSheet/';
		$config['total_rows'] = $this->MCandidate->record_count_mycandidate($user);
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
		$data['results'] = $this->MCandidate->fetch_mycandidates($user,$limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_candsheet";
	       $data['module'] = 'candidates';
	       $this->load->view($this->_container,$data);
		}
		
	function newinput()
	     {
		   $data['header'] = "Mapping";
		   $data['title'] = "Mapping";
		   $username = $this->session->userdata('id');
		
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		  if(($this->input->post('candidate_name')) && ($this->input->post('save')))
		     {
			  $enteredby = $this->session->userdata('username');
			  $date = date('Y-m-d');
			  $sheetname = $this->input->post('sheetname');
			  $worksheetid = $this->input->post('myworksheet');
			  $candidate_name = $this->input->post('candidate_name');
			 $telephone = $this->input->post('telephone');
			 $email= $this->input->post('email');
			 $current_location = $this->input->post('current_location');
			 $region = $this->input->post('region');
			 $current_company = $this->input->post('current_company');
			 $job_title = $this->input->post('job_title');
			 $department = $this->input->post('department');
			 $designation = $this->input->post('designation');
			 $grade = $this->input->post('grade');
			 $level = $this->input->post('level');
			 $salary = $this->input->post('salary');
	 		 $in_current_company_since = $this->input->post('in_current_company_since');
			 $reports_to = $this->input->post('reports_to');
			 $current_role = $this->input->post('current_role');
			 $previous_company = $this->input->post('previous_company');
			 $course = $this->input->post('course');
			 $institute = $this->input->post('institute');
			 $year_of_passing =  $this->input->post('year_of_passing');
			 $year_of_birth = $this->input->post('year_of_birth');
			 $company = $this->input->post('current_company');
			 $candmgmt = $this->input->post('cand_mgmt');
			   $count = count($candidate_name);
			    for($i=0; $i<$count; $i++)
				  {
				   $data = array(
				   'candidate_name' => $candidate_name[$i],
			       'telephone' => $telephone[$i],
			       'email' => $email[$i],
			       'current_location' => $current_location[$i],
			       'current_company' => $current_company[$i],
			       'job_title' => $job_title[$i],
			       'designation' => $designation[$i],
		           'course' => $course[$i],
			       'institute' => $institute[$i],
			       'year_of_passing' => $year_of_passing[$i],
			       'company' => $current_company[$i],
				   'entered_by' => $enteredby,
				   'entered_on' => $date,
				   'sheetname' => $sheetname,
				   'cand_mgmt' => $candmgmt[$i],
				   );
				   $this->MCandidate->saveMapping($data);
				   $id = $this->db->insert_id(); 
				   $company = $current_company[$i];
			if($this->input->post('current_company'))
			 {
				   $comp = $this->MCandidate->getCand($company);
			if($company==$comp['parentname'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			 if($company==$comp['synonym'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			  else{
			   $data = array(
			   'sent_to_synonym' =>'0',
			   'is_company_updated' =>'0',
			   );
			   $this->MCandidate->senttosyn($id,$data); 
			  }
				  } 
				  if($this->input->post('myworksheet'))
				   {
				   $worksheet1_details = array(
				  'c_id' => $id,
				  'constituent_id' => $worksheetid[$i],
				  );
				  $this->MCandidate->addtoworksheet1($worksheet1_details);
				  }
				  }
				flashMsg('success','Candidates has been entered successfully.');
				redirect('candidates/admin/candSheet/','refresh');  
			 }
			 else{
			  $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_candsheet";
	       $data['module'] = 'candidates';
	        $this->load->view($this->_container,$data);
			 }
		 }
		 
		 function newmapping()
	     {
		   $data['header'] = "Mapping";
		   $data['title'] = "Mapping";
		   $username = $this->session->userdata('id');
		
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		  if(($this->input->post('candidate_name')) && ($this->input->post('save')))
		     {
			  $enteredby = $this->session->userdata('username');
			  $date = date('Y-m-d');
			  $sheetname = $this->input->post('sheetname');
			  $sopt = $this->input->post('sheetopt');
			  $worksheetid = $this->input->post('myworksheet');
			  $candidate_name = $this->input->post('candidate_name');
			 $telephone = $this->input->post('telephone');
			 $email= $this->input->post('email');
			 $current_location = $this->input->post('current_location');
			 $region = $this->input->post('region');
			 $current_company = $this->input->post('current_company');
			 $job_title = $this->input->post('job_title');
			 $department = $this->input->post('department');
			 $designation = $this->input->post('designation');
			 $grade = $this->input->post('grade');
			 $level = $this->input->post('level');
			 $salary = $this->input->post('salary');
	 		 $in_current_company_since = $this->input->post('in_current_company_since');
			 $reports_to = $this->input->post('reports_to');
			 $current_role = $this->input->post('current_role');
			 $previous_company = $this->input->post('previous_company');
			 $course = $this->input->post('course');
			 $institute = $this->input->post('institute');
			 $year_of_passing =  $this->input->post('year_of_passing');
			 $year_of_birth = $this->input->post('year_of_birth');
			 $company = $this->input->post('current_company');
			 $candmgmt = $this->input->post('cand_mgmt');
			   $count = count($candidate_name);
			    for($i=0; $i<$count; $i++)
				  {
				   $data = array(
				   'candidate_name' => $candidate_name[$i],
			       'telephone' => $telephone[$i],
			       'email' => $email[$i],
			       'current_location' => $current_location[$i],
			       'current_company' => $current_company[$i],
			       'job_title' => $job_title[$i],
			       'designation' => $designation[$i],
		           'course' => $course[$i],
			       'institute' => $institute[$i],
			       'year_of_passing' => $year_of_passing[$i],
			       'company' => $current_company[$i],
				   'entered_by' => $enteredby,
				   'entered_on' => $date,
				   'sheetname' => $sheetname,
				   'cand_mgmt' => $candmgmt[$i],
				   );
				   $this->MCandidate->saveMapping($data);
				   $id = $this->db->insert_id(); 
				   $company = $current_company[$i];
			if($this->input->post('current_company'))
			 {
				   $comp = $this->MCandidate->getCand($company);
			if($company==$comp['parentname'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			 if($company==$comp['synonym'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			  else{
			   $data = array(
			   'sent_to_synonym' =>'0',
			   'is_company_updated' =>'0',
			   );
			   $this->MCandidate->senttosyn($id,$data); 
			  }
			} 
				 $cand_details = array(
				  'c_id' => $id,
				  'p_id' => $sheetname,
				  'user' => $this->session->userdata('id'),
				   'option' => $sopt,
				  );
				  $this->MCandidate->addtofolder($cand_details);
				  
				 if($this->input->post('myworksheet'))
				   {
				   $worksheet1_details = array(
				  'c_id' => $id,
				   'constituent_id' => $worksheetid[$i],
				  );
				  $this->MCandidate->addtoworksheet1($worksheet1_details);
				  }
				  }
				  flashMsg('success','Candidates has been entered successfully.');
				redirect('candidates/admin/candSheet/','refresh');  
			 }
			 else{
			  $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_candsheet";
	       $data['module'] = 'candidates';
	        $this->load->view($this->_container,$data);
			 }
		 }
		 // my recent sheet name
		 function myrecentsheet()
		   {
		    $data['header'] = "My Mapping Sheet";
			$data['title'] = "My Mappning Sheet";
			$user = $this->session->userdata('username');
			$sheetname = $this->uri->segment(4);
			$data['results'] = $this->MCandidate->getMyRecentSheet($user,$sheetname);
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_myrecentsheet";
	       $data['module'] = 'candidates';
	        $this->load->view($this->_container,$data);
		   }
		 function newmapping2()
	     {
		   $data['header'] = "Mapping";
		   $data['title'] = "Mapping";
		  if(($this->input->post('candidate_name')) && ($this->input->post('save')))
		     {
			  $candidate_name = $this->input->post('candidate_name');
			 $telephone = $this->input->post('telephone');
			 $email= $this->input->post('email');
			 $current_location = $this->input->post('current_location');
			 $region = $this->input->post('region');
			 $current_company = $this->input->post('current_company');
			 $job_title = $this->input->post('job_title');
			 $department = $this->input->post('department');
			 $designation = $this->input->post('designation');
			 $grade = $this->input->post('grade');
			 $level = $this->input->post('level');
			 $salary = $this->input->post('salary');
	 		 $in_current_company_since = $this->input->post('in_current_company_since');
			 $reports_to = $this->input->post('reports_to');
			 $current_role = $this->input->post('current_role');
			 $previous_company = $this->input->post('previous_company');
			 $course = $this->input->post('course');
			 $institute = $this->input->post('institute');
			 $year_of_passing =  $this->input->post('year_of_passing');
			 $year_of_birth = $this->input->post('year_of_birth');
			 $company = $this->input->post('current_company');
			   $count = count($candidate_name);
			    for($i=0; $i<$count; $i++)
				  {
				   $data = array(
				   'candidate_name' => $candidate_name[$i],
			       'telephone' => $telephone[$i],
			       'email' => $email[$i],
			       'current_location' => $current_location[$i],
			       'region' => $region[$i],
			       'current_company' => $current_company[$i],
			       'job_title' => $job_title[$i],
			       'department' => $department[$i],
			       'designation' => $designation[$i],
		           'grade' => $grade[$i],
			       'level' => $level[$i],
			       'salary' => $salary[$i],
	 		       'in_current_company_since' => $in_current_company_since[$i],
			       'reports_to' => $reports_to[$i],
			       'current_role' => $current_role[$i],
			       'previous_company' => $previous_company[$i],
			       'course' => $course[$i],
			       'institute' => $institute[$i],
			       'year_of_passing' => $year_of_passing[$i],
			       'year_of_birth' => $year_of_birth[$i],
				   'company' => $current_company[$i],
				   );
				   $this->MCandidate->saveMapping($data);
				   $id = $this->db->insert_id(); 
				   $company = $current_company[$i];
			if($this->input->post('current_company'))
			 {
				   $comp = $this->MCandidate->getCand($company);
			if($company==$comp['parentname'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			 elseif($company==$comp['synonym'])
			  {
			   $prid = $comp['s_id'];
			   $data = array(
			   'sent_to_synonym' =>1,
			   'prid' => $prid,
			   'is_company_updated' =>1,
			   );
			   $this->MCandidate->addParentid($id,$data); 
			  }
			  else{
			   $data = array(
			   'sent_to_synonym' =>'0',
			   'is_company_updated' =>'0',
			   );
			   $this->MCandidate->senttosyn($id,$data); 
			  }
			  }
				  } 
			 }
			 else{
			  $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_newmapping";
	       $data['module'] = 'candidates';
	        $this->load->view($this->_container,$data);
			 }
		 }
		 
		 function mymapsheets()
		    {
			 $user = $this->session->userdata('username');
			 $data['results'] = $this->MCandidate->getMyAllSheets($user);
			 $this->load->view('admin/admin_candidate_myallsheets',$data);
			}
			
	 function export()
	   {
	   
		$user = $this->session->userdata('username');
			$sheetname = $this->uri->segment(4);
			$data['results'] = $this->MCandidate->getMyRecentSheet($user,$sheetname);
			    $this->load->view('admin/excel_sheet',$data);	
	     }
		 
	function sharefolder()
	  {
	   if (($this->input->post('folder_name')) && ($this->input->post('sharefolder'))){
	    $sheetname = $this->input->post('sheetname');
		$username = $this->input->post('userid');
		$p_id= $this->input->post('folder_name');
		
		//For Candidate
	   $c_id=$this->MCandidate->getCandFol($p_id);
	     foreach ($c_id as $row){
	            $cand_details = array(
			          'p_id' =>$p_id,
			         'c_id'   =>$row['c_id'],
					 'user'  =>$username,
					 'option' => '405',
					);
					$this->MCandidate->addtofolder($cand_details);
					}
					flashMsg('success','Mapping Sheet has been shared successfully.');
					  redirect('candidates/admin/open_folder/'.$sheetname,'refresh');
					}
	  }
	  
	  /////////////////////////////////Filter Worksheet/////////////////////////////////////////
	  function filterworksheet()
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
		$data['userpos'] = $this->MCandidate->getUserDetails($username);
		$data['candmgmt'] = $this->MCandidate->getCandMgmtDropdown();
		$data['folder'] =  $this->MCandidate->getFolder($username);
		$data['folderall'] =  $this->MCandidate->getFolderAll($username);
		$data['user']= $this->MCandidate->getConsulName();
		$data['users']= $this->MCandidate->getConsulDropdown();
		$data['positions'] = $this->MCandidate->getAllPostitions();
		$data['positions2'] = $this->MCandidate->getAllPostitions2();
		$data['worksheet']= $this->MCandidate->getUserWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['sheetopt'] = $this->MCandidate->getSheetOpt();
		$worksheettype1 = $this->input->post('type');
		$worksheettype = implode(',',$worksheettype1);
		$basicworksheet = $this->MCandidate->searchterm_handler_worksheett($this->input->get_post('worksheett', TRUE));
		$column_name = $this->MCandidate->searchterm_handler_column_sort($this->input->get_post('column_name', TRUE));
	    $order = $this->MCandidate->searchterm_handler_order($this->input->get_post('order', TRUE));
		
		$limit = ($this->uri->segment(5) > 0)?$this->uri->segment(5):0;
		
		$config['base_url'] = base_url() . 'index.php/candidates/admin/sort_worksheet/'.$basicworksheet.'/';
		$config['total_rows'] = $this->MCandidate->search_record_count_worksheet_filter($basicworksheet,$worksheettype);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;
		$config['num_links'] = 20;		
		$this->pagination->initialize($config);
		$data['total'] = $config['total_rows'];
		$data['results'] = $this->MCandidate->open_worksheet_filter($basicworksheet,$worksheettype,$column_name,$order,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['column_name']= $column_name;
		$data['order']= $order;
		$data['openedworksheet']=$basicworksheet;
	     $data['attachment'] =  $this->MCandidate->getWorksheetAttachmentList($basicworksheet);
		$data['page'] = $this->config->item('backendpro_template_admin') . "search_result_openworksheet";
	    $data['module'] = 'candidates';
	    $this->load->view($this->_container,$data);
		
	}
	
}
?>