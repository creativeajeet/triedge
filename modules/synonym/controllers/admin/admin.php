<?php
class Admin extends Admin_Controller {

function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('List Manager');
			// Load models and language
			$this->load->module_model('auth','User_model');
			$this->load->model('Populate');
			$this->load->model('MAutocomplete');
			$this->load->model('MSynonym');
			$this->load->language('customer');
			// Set breadcrumb
			$this->bep_site->set_crumb('Miscellaneous','list/admin');
			$this->load->helper('date');
			// Load the validation library
		    $this->load->library('validation');
			log_message('debug','BackendPro : Members class loaded');
	}
	
	// This gets all the list category, list values, their synonyms etc.
	function index()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/index/';
		$config['total_rows'] = $this->MSynonym->record_count_company();
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
		$data['results'] = $this->MSynonym->fetch_company($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_home";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	function listview()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/listview/';
		$config['total_rows'] = $this->MSynonym->record_count_company_listview();
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
		$data['results'] = $this->MSynonym->fetch_company_listview($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_listview";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	function senttosynonym()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/senttosynonym/';
		$config['total_rows'] = $this->MSynonym->record_count_company_syn();
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
		$data['results'] = $this->MSynonym->fetch_company_syn($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_senttosyn";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	function filtercomp()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$page = $this->uri->segment(4);
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$comp = $this->MSynonym->searchterm_handler_comp($this->input->get_post('compf', TRUE));
        $config['base_url'] = base_url() . 'index.php/synonym/admin/filtercomp/';
		$config['total_rows'] = $this->MSynonym->record_count_companyf($comp);
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
		$data['results'] = $this->MSynonym->fetch_companyf($comp,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['comp'] = $comp;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_filterhome";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	//fetch synonym
	function existingsynonym(){
            if('IS_AJAX') {
        	$data['existingsynonym'] = $this->MSynonym->getexistingsynonym();		
		$this->load->view('admin/existingsynonym',$data);
            }
		
	}
	// This gets all the list category, list values, their synonyms etc.
	function index1()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$query = $this->Populate->get(null, 'blank');
		$data['tests'] = $this->formatArrayToIdName($query->result_array());
        $data['page'] = $this->config->item('backendpro_template_admin') . "autopopulate";
	    $data['module'] = 'list';
	    $this->load->view($this->_container,$data);			
	}
	// This gets all the list category, list values, their synonyms etc.
	function cleanedCompList()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Cleaned Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Cleaned Company List";
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/cleanedCompList/';
		$config['total_rows'] = $this->MSynonym->record_count_cleanedcompany();
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
		$data['results'] = $this->MSynonym->fetch_cleanedcompany($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_cleaned";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	function filtercleanedcompps()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Cleaned Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Cleaned Company List";
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$comp = $this->input->get_post('psf');
		$compage = $this->MSynonym->searchterm_handler_compage($this->input->get_post('cpages', TRUE));
        $config['base_url'] = base_url() . 'index.php/synonym/admin/filtercleanedcomppss/'.$comp;
		$config['total_rows'] = $this->MSynonym->record_count_cleanedcompany_filters($comp);
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
		$data['results'] = $this->MSynonym->fetch_cleanedcompany_filters($comp,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['comp'] = $comp;
		$data['compage'] = $compage;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_cleaned_filter";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	function filtercleanedcomppss()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Cleaned Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Cleaned Company List";
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$comp = $this->uri->segment(4);
		$compage = $this->MSynonym->searchterm_handler_compage($this->input->get_post('cpages', TRUE));
        $config['base_url'] = base_url() . 'index.php/synonym/admin/filtercleanedcomppss/'.$comp.'/';
		$config['total_rows'] = $this->MSynonym->record_count_cleanedcompany_filters($comp);
		$config['per_page'] = 20;
		$config['uri_segment'] = 5;		//$choice = $config['total_rows']/$config['per_page'];
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

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['total'] = $config['total_rows'];
		$data['results'] = $this->MSynonym->fetch_cleanedcompany_filterss($comp,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['comp'] = $comp;
		$data['compage'] = $compage;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_cleaned_filter";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	function filtercleanedcomp()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Cleaned Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Cleaned Company List";
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$comp = $this->MSynonym->searchterm_handler_psf($this->input->get_post('psf', TRUE));
		$compage = $this->MSynonym->searchterm_handler_compage($this->input->get_post('cpages', TRUE));
        $config['base_url'] = base_url() . 'index.php/synonym/admin/filtercleanedcomp/';
		$config['total_rows'] = $this->MSynonym->record_count_cleanedcompany_filter($compage);
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
		$data['results'] = $this->MSynonym->fetch_cleanedcompany_filter($compage,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['comp'] = $comp;
		$data['compage'] = $compage;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_cleaned_filter";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	function works()
	  {
	  $data['worksheets']=$this->MSynonym->fetch_company_work();
	  foreach ($data['worksheets'] as $row){
	  $sql = "UPDATE candidates SET sent_to_synonym='1' WHERE company='".$row->synonym."'";
	  echo $sql;
	  $this->MSynonym->importworks($sql);
	  }
     }
	// send to parent
	 function sendtoparent()
	    {
		 
		  $page = $this->uri->segment(4);
		  // This sends the companies to a parent
	   if ($this->input->post('goexistingcompany')){
		$parent= $this->input->post('existingcompany');
		$comp = $this->MSynonym->getCand($parent);
		$prid = $comp['s_id'];
		$name = $this->input->post('type');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		    $syn = $synonym[$i];
			$compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		          $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					 'type' => $name,
					 	);
					$this->MSynonym->addtoparent($synonym_details);
					$this->MSynonym->addPrid($prid,$syn);
					}
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/index/'.$page,'refresh');
					}
	elseif ($this->input->post('gonewcompany')){
		$parent= $this->input->post('newcompany');
		$name = $this->input->post('type');
		$companypage = $this->input->post('companypage');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		  $syn = $synonym[$i];
		  $compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		      $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					  'type' => $name,
					   'companypage' =>$companypage,
					 	 	);
					$this->MSynonym->addtoparent($synonym_details);
					}
					$this->MSynonym->addParent($parent,$name,$companypage);
					$comp = $this->MSynonym->getCand($parent);
					$prid = $comp['s_id'];
					$this->MSynonym->addPrid($prid,$syn);
					if($companypage=='1')
					  {
					   $this->MSynonym->addPridComp($prid);
					  }
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/index/'.$page,'refresh');
					}
	    elseif($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*20)-1;
				redirect('synonym/admin/index/'.$pageno,'refresh');
				
			   }
		if(($this->input->post('cpage')) && ($this->input->post('makecompage')))
		   {
		    $cat = $this->uri->segment(4);
			$ppage =$this->uri->segment(5);
		    $cpage = $_POST['cpage'];
			 $count=count($cpage);
			  for($i=0; $i<$count; $i++)
			    {
				 $pname = $cpage[$i];
				 $prid = $cpage[$i];
				 
				}
				$this->MSynonym->addPpage($pname);
				$this->MSynonym->addPridComp($prid);
				flashMsg('success','Company Page has been created successfully.');
				redirect('synonym/admin/'.$cat.'/1/'.$ppage,'refresh');
		   }
		 if($this->input->post('notcleaned'))		
	    {
		 if($this->input->post('cleaned'))
		  {
		 $cleaned=$_POST['cleaned'];
		 $comps = $_POST['comps'];
		 $count = count($cleaned);
		  for($i=0; $i<$count; $i++)
		    {
			 $id = $comps[$i];
			 $clean = $cleaned[$i];
			  $this->MSynonym->upCleaned($clean);
			}
			}
	 if($this->input->post('noncore'))	
	    {
		 $noncore=$_POST['noncore'];
		 $comps = $_POST['comps'];
		 $count = count($noncore);
		  for($i=0; $i<$count; $i++)
		    {
				 $noncoree = $noncore[$i];
			  $this->MSynonym->sendtononcore($noncoree);
			}
			 }
			          flashMsg('success','Sent to Parent successfully.');
					  redirect('synonym/admin/index/'.$page,'refresh');
		  }  	
		  }
		
	function listtypejump()
	     {
		   if($this->input->post('go'))
	       {
		    $listtype = $this->input->post('listtype');
			redirect('synonym/admin/'.$listtype,'refresh');
		   }
		 }
	
	function json() {
		$this->load->model('Populate');
		$id = $this->uri->segment(4);
		$id = explode('-', $id);
		$query = $this->Populate->get(null, $id);
		$data['content'] = $this->formatArrayToIdName($query->result_array());
		$this->load->view('admin/json', $data);
	}
	
	private function formatArrayToIdName($data) {
		$result = array();
		foreach ($data as $row) {
			$result[$row['id']] = $row['name'];
		}
		return $result;
	}
	
	function page_not_found()
	{
		show_404('page');
	}
	
	function addList()
	{
	if ($this->input->post('name')){
        $id = $this->input->post('id');
        $this->Populate->addList();
		redirect('list/admin/');   
	  	}
	else{
		if ($this->input->post('name1')){
        $id = $this->input->post('id');
        $this->Populate->addConstituents();
		redirect('list/admin/');   
	  	}
    else{
	    if ($this->input->post('synonym')){
        $id = $this->input->post('id');
        $this->Populate->makeSynonym();
	    flashMsg('success', 'Synonym has been created successfully.');
	    redirect('list/admin/'); 
	  	}
	else{
       if($this->input->post('other')){
	   $id=$this->input->post('id');
	   $this->Populate->makeSynonymOther();
	   flashMsg('success', 'Synonym has been created successfully.');
	   redirect('list/admin/'); 
	   }  
	  } 
     }   
    }
   }

	
	function lookup(){
		// process posted form data (the requested items like province)
		 $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->MAutocomplete->lookup($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'value' => $row->name,
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
            $this->load->view('admin/index',$data); //Load html view of search results
        }
	}
	
	// for companies
	 function company()
	   {
	    $companies = $this->MSynonym->fetchcompanies();
		foreach($companies as $row)
		  {
		   $comp = $row->current_company;
		   $pos = strpos($comp, ',');
		   $company = strstr($comp, ',', TRUE);
		    if(false===$pos)
			  {
			     $sql = 'UPDATE candidates SET company="'.$row->current_company.'" WHERE id="'.$row->id.'"';
			  }
			 else{
		   $sql = 'UPDATE candidates SET company="'.$company.'" WHERE id="'.$row->id.'"';
		   }
		   echo $sql.'<br/>';
	      $this->MSynonym->import($sql);
		  }
	    
	   }
	 function companyupdate()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/companyupdate/';
		$config['total_rows'] = $this->MSynonym->record_count_company_update();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdated();
		$data['results'] = $this->MSynonym->fetch_candidates($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_index";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	 function locationup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'current_location' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data);
				
				$data2 = array(
				'id' => $id,
				'location' => $company[$i],
				);
				$this->MSynonym->updateLoc($id,$data2);
				 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/locationup/';
		$config['total_rows'] = $this->MSynonym->record_count_loc_update();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedLoc();
		$data['results'] = $this->MSynonym->fetch_candidates_loc($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_loc";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	function designationup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'current_location' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data);
				
				$data2 = array(
				'id' => $id,
				'location' => $company[$i],
				);
				$this->MSynonym->updateLoc($id,$data2);
				 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/designationup/';
		$config['total_rows'] = $this->MSynonym->record_count_desig_update();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedDesig();
		$data['results'] = $this->MSynonym->fetch_candidates_desig($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_desig";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}

   function instituteup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'current_location' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data);
				
				$data2 = array(
				'id' => $id,
				'location' => $company[$i],
				);
				$this->MSynonym->updateLoc($id,$data2);
				 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/instituteup/';
		$config['total_rows'] = $this->MSynonym->record_count_instt_update();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedInstt();
		$data['results'] = $this->MSynonym->fetch_candidates_instt($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_instt";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	function courseup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'current_location' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data);
				
				$data2 = array(
				'id' => $id,
				'location' => $company[$i],
				);
				$this->MSynonym->updateLoc($id,$data2);
				 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/courseup/';
		$config['total_rows'] = $this->MSynonym->record_count_course_update();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedCourse();
		$data['results'] = $this->MSynonym->fetch_candidates_course($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_course";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	function noncore()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/noncore/';
		$config['total_rows'] = $this->MSynonym->record_count_company_noncore();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdated();
		$data['results'] = $this->MSynonym->fetch_candidates_noncore($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_noncore";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// all updated company list
	function allupdated()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "All Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "All Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/allupdated/';
		$config['total_rows'] = $this->MSynonym->record_count_company_allupdated();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdated();
		$data['results'] = $this->MSynonym->fetch_candidates_allupdated($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_updated";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	// not updated compnay list
	function notupdated()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdated/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdated();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdated();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdated($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdated";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function notupdatedlocgroup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdatedlocgroup/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedlocgroup();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedLoc();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedlocgroup($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdatedlocgroup";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	// not updated compnay list
	function notupdatedloc()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdatedloc/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedloc();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedLoc();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedloc($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdatedloc";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function editloc()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/editloc/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedloc();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedLoc();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedloc($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_editloc";
	       $data['module'] = 'synonym';
	       $this->load->view('admin/admin_candidate_editloc',$data);		
	
	}
	// not updated compnay list
	function allupdatedloc()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/allupdatedloc/';
		$config['total_rows'] = $this->MSynonym->record_count_company_allupdatedloc();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedLoc();
		$data['results'] = $this->MSynonym->fetch_candidates_allupdatedloc($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_allupdatedloc";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function notupdateddesiggroup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdateddesiggroup/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdateddesiggroup();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedDesig();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdateddesiggroup($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdateddesiggroup";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function editdesig()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		 
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/editdesig/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdateddesig();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedDesig();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdateddesig($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_editdesig";
	       $data['module'] = 'synonym';
	       $this->load->view('admin/admin_candidate_editdesig',$data);		

	}
	// not updated compnay list
	function notupdateddesig()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdateddesig/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdateddesig();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedDesig();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdateddesig($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdateddesig";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function allupdateddesig()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/allupdateddesig/';
		$config['total_rows'] = $this->MSynonym->record_count_company_allupdateddesig();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedDesig();
		$data['results'] = $this->MSynonym->fetch_candidates_allupdateddesig($limit);

		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_allupdateddesig";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function notupdatedinsttgroup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdatedinsttgroup/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedinsttgroup();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedInstt();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedinsttgroup($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdatedinsttgroup";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	function editinstt()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/editinstt/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedinstt();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedInstt();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedinstt($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_editinstt";
	       $data['module'] = 'synonym';
	       $this->load->view('admin/admin_candidate_editinstt',$data);		
	}
	
	// not updated compnay list
	function notupdatedinstt()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdatedinstt/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedinstt();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedInstt();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedinstt($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdatedinstt";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function allupdatedinstt()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/allupdatedinstt/';
		$config['total_rows'] = $this->MSynonym->record_count_company_allupdatedinstt();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedInstt();
		$data['results'] = $this->MSynonym->fetch_candidates_allupdatedinstt($limit);

		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_allupdatedinstt";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	// not updated compnay list
	function notupdatedcoursegroup()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdatedcoursegroup/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedcoursegroup();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedCourse();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedcoursegroup($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdatedcoursegroup";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function editcourse()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/editcourse/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedcourse();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedCourse();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedcourse($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_editcourse";
	       $data['module'] = 'synonym';
	       $this->load->view('admin/admin_candidate_editcourse',$data);		
	}
	
	// not updated compnay list
	function notupdatedcourse()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/notupdatedcourse/';
		$config['total_rows'] = $this->MSynonym->record_count_company_notupdatedcourse();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedCourse();
		$data['results'] = $this->MSynonym->fetch_candidates_notupdatedcourse($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_notupdatedcourse";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	
	// not updated compnay list
	function allupdatedcourse()
	  
	    {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Not Updated Company List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Not Updated Company List";
		$data['totaldb'] = $this->MSynonym->record_count_company_update();
		$pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$username = $this->session->userdata('id');
		  if($this->input->post('companyname'))
		    {
			 $candidateid = $_POST['c_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/companyupdate/'.$pageno,'refresh');
			}
		else{
        $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/allupdatedcourse/';
		$config['total_rows'] = $this->MSynonym->record_count_company_allupdatedcourse();
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = 15;		
		$this->pagination->initialize($config);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['total'] = $config['total_rows'];
		$data['totalupdated'] = $this->MSynonym->getTotalUpdatedCourse();
		$data['results'] = $this->MSynonym->fetch_candidates_allupdatedcourse($limit);

		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	       
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_candidate_allupdatedcourse";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
	}
	}
	  // update copmany
	  function updatecomp()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$data = array(
				'id' => $id,
				'is_company_updated' =>1,
				);
				$this->MSynonym->updateCand($id,$data); 
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		
		
		// update copmany
	  function updatelocgroup()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$locg = $company[$i];
				$data = array(
					'current_location' => $company[$i],
				);
				$this->MSynonym->updateComp2($locg,$data); 
				
				$data2 = array(
					'location' => $company[$i],
				);
				$this->MSynonym->updateLoc($locg,$data2);

			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$locg = $company[$j];
				$data2 = array(
					'is_location_updated' =>1,
				);
				$this->MSynonym->updateLoc($id,$data2);
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		
		
		// update copmany
	  function updatedesiggroup()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$locg = $company[$i];
				$data = array(
					'designation' => $company[$i],
				);
				$this->MSynonym->updateComp3($locg,$data); 
				
				$data2 = array(
					'designation' => $company[$i],
				);
				$this->MSynonym->updateDesig($locg,$data2);

			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$locg = $company[$j];
				$data2 = array(
					'is_desig_updated' =>1,
				);
				$this->MSynonym->updateDesig2($id,$data2);
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		// update copmany
	  function updatedesig()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'designation' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
				
				$data2 = array(
				'cdid' => $id,
				'designation' => $company[$i],
				);
				$this->MSynonym->updateDesig($id,$data2);

			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$data2 = array(
				'cdid' => $id,
				'is_desig_updated' =>1,
				);
				$this->MSynonym->updateDesig($id,$data2); 
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		
		// update copmany
	  function updateinsttgroup()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$locg = $company[$i];
				$data = array(
					'institute' => $company[$i],
				);
				$this->MSynonym->updateComp4($locg,$data); 
				
				$data2 = array(
					'institute' => $company[$i],
				);
				$this->MSynonym->updateInstt($locg,$data2);

			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$locg = $company[$j];
				$data2 = array(
					'is_instt_updated' =>1,
				);
				$this->MSynonym->updateInstt2($id,$data2);
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		// update copmany
	  function updateinstt()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'institute' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
				
				$data2 = array(
				'cdid' => $id,
				'institute' => $company[$i],
				);
				$this->MSynonym->updateInstt($id,$data2);

			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$data2 = array(
				'cdid' => $id,
				'is_instt_updated' =>1,
				);
				$this->MSynonym->updateInstt($id,$data2); 
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		
		// update copmany
	  function updatecoursegroup()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$locg = $company[$i];
				$data = array(
					'course' => $company[$i],
				);
				$this->MSynonym->updateComp5($locg,$data); 
				
				$data2 = array(
					'course' => $company[$i],
				);
				$this->MSynonym->updateCourse($locg,$data2);

			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$locg = $company[$j];
				$data2 = array(
					'is_course_updated' =>1,
				);
				$this->MSynonym->updateCourse2($id,$data2);
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		// update copmany
	  function updatecourse()
	    {
		 $pageno = $this->uri->segment(5);
		 $category = $this->uri->segment(4);
		 if($this->input->post('companyname'))
		    {
			if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'course' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
				
				$data2 = array(
				'cdid' => $id,
				'course' => $company[$i],
				);
				$this->MSynonym->updateLoc($id,$data2);

			   } 
			  
			}
		 if($this->input->post('c_id'))
			{
			 $candidateid = $_POST['c_id'];
			 $count = count($candidateid);
			  for($j=0; $j<$count; $j++)
			   {
			    $id = $candidateid[$j];
				$data2 = array(
				'cdid' => $id,
				'is_course_updated' =>1,
				);
				$this->MSynonym->updateCourse($id,$data2); 
			   } 
			  
			}
		  if($this->input->post('cc_id'))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				 'noncore' =>1,
				);
				$this->MSynonym->updateCore($id,$data); 
			   } 
			  
			}
		  if(($this->input->post('cc_id')) && ($this->input->post('savechanges')))
			{
			 $ccandidateid = $_POST['cc_id'];
			 $count = count($ccandidateid);
			  for($k=0; $k<$count; $k++)
			   {
			    $id = $ccandidateid[$k];
				$data = array(
				'noncore' =>'0',
				);
				$this->MSynonym->sendBack($id,$data); 
			   } 
			  
			}
		  if($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*100)-1;
				redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
				
			   }
		 if ($this->input->post('run')){
		 $replace= $this->input->post('replace');
		  $replacewith = $this->input->post('replacewith');
		
			$this->MSynonym->replace($replace,$replacewith);
			$affected = $this->db->affected_rows();
			
					flashMsg('success', $affected.' rocords updated');
					  redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
					}
			 // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated successfully.');
					   redirect('synonym/admin/'.$category.'/'.$pageno,'refresh');
		}
		}
		//last updated
		function lastupdated()
		  {
		    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$maDate = $this->MSynonym->maxdate();
		   $data['lastupdated'] = $this->MSynonym->getLastUpdated($maDate);
		   if($this->input->post('companyname'))
			{
			 $candidateid = $_POST['cand_id'];
			 $company = $_POST['companyname'];
			 $count = count($candidateid);
			  for($i=0; $i<$count; $i++)
			   {
			    $id = $candidateid[$i];
				$data = array(
				'id' => $id,
				'company' => $company[$i],
				);
				$this->MSynonym->updateComp($id,$data); 
			   } 
			    redirect('synonym/admin/lastupdated/','refresh');
			  }
			 else{
			  $this->load->view('admin/admin_candidate_lastupdated',$data);
			 }
		  }
		  
		function managesynonym()
	   {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Manage Parent Synonym";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Manage Parent Synonym";
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParent();
		 if(($this->input->post('removesynonym')) && ($this->input->post('existingsynonym')))
		   {
		    $synonym = $this->input->post('existingsynonym');
			$this->MSynonym->deleteSynonym($synonym);
			$this->MSynonym->changeSynSta($synonym);
			flashMsg('success',$synonym.' has been deleted successfully.');
			redirect('synonym/admin/managesynonym/','refresh');
		   }
		  elseif(($this->input->post('removeparent')) && ($this->input->post('existingcompany'))){
		  $parent = $this->input->post('existingcompany');
		  $syn = $this->MSynonym->getSynonym($parent);
		  $count = count($syn);
		   for($i=0; $i<$count; $i++)
		     {
			  $s = $syn[$i];
			   $this->MSynonym->updatesyns($s);
			 }
			
		  $this->MSynonym->deleteparent($parent);
		   flashMsg('success',$parent.' has been deleted successfully.');
			redirect('synonym/admin/managesynonym/','refresh');
		  }
		  elseif($this->input->post('rename'))
		  {
		   $parent = $this->input->post('existingcompany');
		   $rename = $this->input->post('newparent');
		  $this->MSynonym->updateparent($parent,$rename);
		  $this->MSynonym->updateparentsyn($parent,$rename);
		   flashMsg('success',$parent.' has been updated successfully.');
			redirect('synonym/admin/managesynonym/','refresh');
		  }
		  else{
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_manageps";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);		
		   }	
	   }
	   
	   // accordign to list type INDUSTRY
	// This gets all the list category, list values, their synonyms etc.
	function industry()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentInd();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/industry/';
		$config['total_rows'] = $this->MSynonym->record_count_industry();
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
		$data['results'] = $this->MSynonym->fetch_industry($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_industry";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	function filterind()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$page = $this->uri->segment(4);
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentInd();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$ind = $this->MSynonym->searchterm_handler_ind($this->input->get_post('indf', TRUE));
        $config['base_url'] = base_url() . 'index.php/synonym/admin/filterind/';
		$config['total_rows'] = $this->MSynonym->record_count_industryf($ind);
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
		$data['results'] = $this->MSynonym->fetch_industryf($ind,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['ind'] = $ind;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_filterind";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	
	// accordign to list type LOCATION
	// This gets all the list category, list values, their synonyms etc.
	function location()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentLoc();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/location/';
		$config['total_rows'] = $this->MSynonym->record_count_location();
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
		$data['results'] = $this->MSynonym->fetch_location($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_location";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	 // send to parent
	 function sendtoloc()
	    {
		 
		  $page = $this->uri->segment(4);
		  // This sends the companies to a parent
	   if ($this->input->post('goexistingcompany')){
		$parent= $this->input->post('existingcompany');
		$comp = $this->MSynonym->getCand($parent);
		$prid = $comp['s_id'];
		$name = $this->input->post('type');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		    $syn = $synonym[$i];
			$compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		          $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					 'type' => $name,
					 	);
					$this->MSynonym->addtoparent($synonym_details);
					$this->MSynonym->addPridStatus($prid,$syn);
					$this->MSynonym->addPridLoc($prid,$syn);
					}
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/location/'.$page,'refresh');
					}
	elseif ($this->input->post('gonewcompany')){
		$parent= $this->input->post('newcompany');
		$name = $this->input->post('type');
		$companypage = $this->input->post('companypage');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		  $syn = $synonym[$i];
		  $compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		      $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					  'type' => $name,
					   'companypage' =>$companypage,
					 	 	);
					$this->MSynonym->addtoparent($synonym_details);
					}
					$this->MSynonym->addParent($parent,$name,$companypage);
					$comp = $this->MSynonym->getCand($parent);
					$prid = $comp['s_id'];
					$this->MSynonym->addPridStatus($prid,$syn);
					$this->MSynonym->addPridLoc($prid,$syn);
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/location/'.$page,'refresh');
					}
	    elseif($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*20)-1;
				redirect('synonym/admin/index/'.$pageno,'refresh');
				
			   }
		 if($this->input->post('notcleaned'))		
	    {
		 if($this->input->post('cleaned'))
		  {
		 $cleaned=$_POST['cleaned'];
		 $comps = $_POST['comps'];
		 $count = count($cleaned);
		  for($i=0; $i<$count; $i++)
		    {
			 $id = $comps[$i];
			 $clean = $cleaned[$i];
			  $this->MSynonym->upCleanedLoc($clean);
			}
			}
	 if($this->input->post('noncore'))	
	    {
		 $noncore=$_POST['noncore'];
		 $comps = $_POST['comps'];
		 $count = count($noncore);
		  for($i=0; $i<$count; $i++)
		    {
				 $noncoree = $noncore[$i];
			  $this->MSynonym->sendtononcore($noncoree);
			}
			 }
			          flashMsg('success','Sent to Parent successfully.');
					  redirect('synonym/admin/index/'.$page,'refresh');
		  }  	
		  }
	
	function filterloc()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$page = $this->uri->segment(4);
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentloc();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$ind = $this->MSynonym->searchterm_handler_loc($this->input->get_post('locf', TRUE));
        $config['base_url'] = base_url() . 'index.php/synonym/admin/filterloc/';
		$config['total_rows'] = $this->MSynonym->record_count_locf($loc);
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
		$data['results'] = $this->MSynonym->fetch_locf($loc,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['ind'] = $ind;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_filterloc";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	
	// This gets all the list category, list values, their synonyms etc.
	function indfunction()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentIndFunc();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/indfunction/';
		$config['total_rows'] = $this->MSynonym->record_count_indfunction();
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
		$data['results'] = $this->MSynonym->fetch_indfunction($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_indfunction";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	function filterindfunc()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$page = $this->uri->segment(4);
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentIndFunc();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		$indfunc = $this->MSynonym->searchterm_handler_indfunc($this->input->get_post('indfuncf', TRUE));
        $config['base_url'] = base_url() . 'index.php/synonym/admin/filterindfunc/';
		$config['total_rows'] = $this->MSynonym->record_count_indfuncf($ind);
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
		$data['results'] = $this->MSynonym->fetch_indfuncf($ind,$limit);
		$data['links'] = $this->pagination->create_links();
		$data['ind'] = $ind;
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_filterindfunc";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	function CandManager()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/CandManager/';
		$config['total_rows'] = $this->MSynonym->record_count_dup();
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
		$data['results'] = $this->MSynonym->fetch_candidates_dup($limit);
		$data['links'] = $this->pagination->create_links();
		// Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "search_result_duplicate";
	       $data['module'] = 'candidates';
	       $this->load->view('admin/search_result_duplicate',$data);	 
	   }
	 // This gets all the list category, list values, their synonyms etc.
	function designation()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentDesig();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/designation/';
		$config['total_rows'] = $this->MSynonym->record_count_designation();
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
		$data['results'] = $this->MSynonym->fetch_designation($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_designation";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	// send to parent
	 function sendtodesig()
	    {
		 
		  $page = $this->uri->segment(4);
		  // This sends the companies to a parent
	   if ($this->input->post('goexistingcompany')){
		$parent= $this->input->post('existingcompany');
		$comp = $this->MSynonym->getCand($parent);
		$prid = $comp['s_id'];
		$name = $this->input->post('type');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		    $syn = $synonym[$i];
			$compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		          $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					 'type' => $name,
					 	);
					$this->MSynonym->addtoparent($synonym_details);
					$this->MSynonym->addPridStatusDesig($prid,$syn);
					$this->MSynonym->addPridDesig($prid,$syn);
					}
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/designation/'.$page,'refresh');
					}
	elseif ($this->input->post('gonewcompany')){
		$parent= $this->input->post('newcompany');
		$name = $this->input->post('type');
		$companypage = $this->input->post('companypage');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		  $syn = $synonym[$i];
		  $compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		      $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					  'type' => $name,
					   'companypage' =>$companypage,
					 	 	);
					$this->MSynonym->addtoparent($synonym_details);
					}
					$this->MSynonym->addParent($parent,$name,$companypage);
					$comp = $this->MSynonym->getCand($parent);
					$prid = $comp['s_id'];
					$this->MSynonym->addPridStatusDesig($prid,$syn);
					$this->MSynonym->addPridDesig($prid,$syn);
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/designation/'.$page,'refresh');
					}
	    elseif($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*20)-1;
				redirect('synonym/admin/index/'.$pageno,'refresh');
				
			   }
		 if($this->input->post('notcleaned'))		
	    {
		 if($this->input->post('cleaned'))
		  {
		 $cleaned=$_POST['cleaned'];
		 $comps = $_POST['comps'];
		 $count = count($cleaned);
		  for($i=0; $i<$count; $i++)
		    {
			 $id = $comps[$i];
			 $clean = $cleaned[$i];
			  $this->MSynonym->upCleanedLoc($clean);
			}
			}
	 if($this->input->post('noncore'))	
	    {
		 $noncore=$_POST['noncore'];
		 $comps = $_POST['comps'];
		 $count = count($noncore);
		  for($i=0; $i<$count; $i++)
		    {
				 $noncoree = $noncore[$i];
			  $this->MSynonym->sendtononcore($noncoree);
			}
			 }
			          flashMsg('success','Sent to Parent successfully.');
					  redirect('synonym/admin/index/'.$page,'refresh');
		  }  	
		  }
	 // This gets all the list category, list values, their synonyms etc.
	function institute()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentInstt();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/institute/';
		$config['total_rows'] = $this->MSynonym->record_count_institute();
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
		$data['results'] = $this->MSynonym->fetch_institute($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_institute";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	// send to parent
	 function sendtoinstt()
	    {
		 
		  $page = $this->uri->segment(4);
		  // This sends the companies to a parent
	   if ($this->input->post('goexistingcompany')){
		$parent= $this->input->post('existingcompany');
		$comp = $this->MSynonym->getCand($parent);
		$prid = $comp['s_id'];
		$name = $this->input->post('type');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		    $syn = $synonym[$i];
			$compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		          $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					 'type' => $name,
					 	);
					$this->MSynonym->addtoparent($synonym_details);
					$this->MSynonym->addPridStatusInstt($prid,$syn);
					$this->MSynonym->addPridInstt($prid,$syn);
					}
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/institute/'.$page,'refresh');
					}
	elseif ($this->input->post('gonewcompany')){
		$parent= $this->input->post('newcompany');
		$name = $this->input->post('type');
		$companypage = $this->input->post('companypage');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		  $syn = $synonym[$i];
		  $compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		      $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					  'type' => $name,
					   'companypage' =>$companypage,
					 	 	);
					$this->MSynonym->addtoparent($synonym_details);
					}
					$this->MSynonym->addParent($parent,$name,$companypage);
					$comp = $this->MSynonym->getCand($parent);
					$prid = $comp['s_id'];
					$this->MSynonym->addPridStatusInstt($prid,$syn);
					$this->MSynonym->addPridInstt($prid,$syn);
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/institute/'.$page,'refresh');
					}
	    elseif($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*20)-1;
				redirect('synonym/admin/index/'.$pageno,'refresh');
				
			   }
		 if($this->input->post('notcleaned'))		
	    {
		 if($this->input->post('cleaned'))
		  {
		 $cleaned=$_POST['cleaned'];
		 $comps = $_POST['comps'];
		 $count = count($cleaned);
		  for($i=0; $i<$count; $i++)
		    {
			 $id = $comps[$i];
			 $clean = $cleaned[$i];
			  $this->MSynonym->upCleanedLoc($clean);
			}
			}
	 if($this->input->post('noncore'))	
	    {
		 $noncore=$_POST['noncore'];
		 $comps = $_POST['comps'];
		 $count = count($noncore);
		  for($i=0; $i<$count; $i++)
		    {
				 $noncoree = $noncore[$i];
			  $this->MSynonym->sendtononcore($noncoree);
			}
			 }
			          flashMsg('success','Sent to Parent successfully.');
					  redirect('synonym/admin/index/'.$page,'refresh');
		  }  	
		  }
	    // This gets all the list category, list values, their synonyms etc.
	function course()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$data['listtype'] = $this->MSynonym->getListtype();
		$data['parentlist'] = $this->MSynonym->getParentCourse();
		 $this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/synonym/admin/course/';
		$config['total_rows'] = $this->MSynonym->record_count_course();
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
		$data['results'] = $this->MSynonym->fetch_course($limit);
		$data['links'] = $this->pagination->create_links();
		 // Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_list_course";
	       $data['module'] = 'synonym';
	       $this->load->view($this->_container,$data);			
	}
	
	 // send to parent
	 function sendtocourse()
	    {
		 
		  $page = $this->uri->segment(4);
		  // This sends the companies to a parent
	   if ($this->input->post('goexistingcompany')){
		$parent= $this->input->post('existingcompany');
		$comp = $this->MSynonym->getCand($parent);
		$prid = $comp['s_id'];
		$name = $this->input->post('type');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		    $syn = $synonym[$i];
			$compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		          $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					 'type' => $name,
					 	);
					$this->MSynonym->addtoparent($synonym_details);
					$this->MSynonym->addPridStatusCourse($prid,$syn);
					$this->MSynonym->addPridCourse($prid,$syn);
					}
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/course/'.$page,'refresh');
					}
	elseif ($this->input->post('gonewcompany')){
		$parent= $this->input->post('newcompany');
		$name = $this->input->post('type');
		$companypage = $this->input->post('companypage');
		//For Candidate
	   $synonym=$_POST['synonym'];
	     $count = count($_POST['synonym']);
	       for($i=0; $i<$count; $i++){
		  $syn = $synonym[$i];
		  $compp = $synonym[$i];
			  $this->MSynonym->sendtosynonym($compp);
		      $synonym_details = array(
			          'parentname' =>$parent,
			         'synonym'   =>$synonym[$i],
					  'type' => $name,
					   'companypage' =>$companypage,
					 	 	);
					$this->MSynonym->addtoparent($synonym_details);
					}
					$this->MSynonym->addParent($parent,$name,$companypage);
					$comp = $this->MSynonym->getCand($parent);
					$prid = $comp['s_id'];
					$this->MSynonym->addPridStatusCourse($prid,$syn);
					$this->MSynonym->addPridCourse($prid,$syn);
					flashMsg('success','Synonyms have been sent to Parent successfully.');
					  redirect('synonym/admin/course/'.$page,'refresh');
					}
	    elseif($this->input->post('jump'))
			   {
			    $page = $this->input->post('jumper');
				$pageno = ($page*20)-1;
				redirect('synonym/admin/index/'.$pageno,'refresh');
				
			   }
		 if($this->input->post('notcleaned'))		
	    {
		 if($this->input->post('cleaned'))
		  {
		 $cleaned=$_POST['cleaned'];
		 $comps = $_POST['comps'];
		 $count = count($cleaned);
		  for($i=0; $i<$count; $i++)
		    {
			 $id = $comps[$i];
			 $clean = $cleaned[$i];
			  $this->MSynonym->upCleanedLoc($clean);
			}
			}
	 if($this->input->post('noncore'))	
	    {
		 $noncore=$_POST['noncore'];
		 $comps = $_POST['comps'];
		 $count = count($noncore);
		  for($i=0; $i<$count; $i++)
		    {
				 $noncoree = $noncore[$i];
			  $this->MSynonym->sendtononcore($noncoree);
			}
			 }
			          flashMsg('success','Sent to Parent successfully.');
					  redirect('synonym/admin/index/'.$page,'refresh');
		  }  	
		  }
		  
	function createComp()
	   {
	    $this->load->view('admin/admin_create_newcomp');
	   }
}
?>