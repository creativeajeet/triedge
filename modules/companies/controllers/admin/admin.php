<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
  function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('Companies');
			// Load models and language
			$this->load->model('MCompany');
			$this->load->module_model('messege','MMessege');
			$this->load->module_model('pof','MPof');
			$this->load->module_model('candidates','MCandidate');
			$this->load->module_model('auth','User_model');
			// Set breadcrumb
			$this->bep_site->set_crumb('Companies','companies/admin');
            $this->load->helper('date');
	}
    // This loads all the companies' record.
    function index(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$userid = $this->session->userdata('id');
		$data['user'] = $this->MPof->getUserDetails($userid);
       		// gets the companylist
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/index/';
		$config['total_rows'] = $this->MCompany->count_companies();
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
		$data['results'] = $this->MCompany->getCompanyList($limit);
		$data['links'] = $this->pagination->create_links();
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_index";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	   function changeStatus()
	    {
		  
		  $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		  if(($this->input->post('change')))
		   {
		    
		   if(($this->input->post('cpage'))) 
		   {
		    
			$comp = $_POST['cpage'];
			$count = count($comp);
			  for($i=0; $i<$count; $i++)
			   {
			      $compa = $comp [$i];
				$this->MCompany->updateClient($compa);
			   }
			  
		   }
		   if(($this->input->post('badtarget'))) 
		   {
		    
			$clo = $_POST['badtarget'];
			$count = count($clo );
			  for($i=0; $i<$count; $i++)
			   {
			   
			    $compa = $clo[$i];
				$this->MCompany->updateBD($compa);
			   }
			  
		   }
		  			 
			 redirect('companies/admin/'.$page,'refresh');
		  }
		}
	   // This loads all the companies' record.
    function clientlist(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$userid = $this->session->userdata('id');
		$data['user'] = $this->MPof->getUserDetails($userid);
       		// gets the companylist
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/clientlist/';
		$config['total_rows'] = $this->MCompany->count_clients();
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
		$data['results'] = $this->MCompany->getClientList($limit);
		$data['links'] = $this->pagination->create_links();
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_clientlist";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	  function clientManagement(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$data['user']= $this->MPof->getConsulName();
		$data['location'] = $this->MCompany->getLocName();
		 $data['clients'] = $this->MPof->getClientDropdown2();
		 $data['consuls'] = $this->MCompany->getConsuls();
       		// gets the companylist
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config['total_rows'] = $this->MCompany->count_clients_hr();
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
		$data['results'] = $this->MCompany->getClientHR($limit);
		$data['links'] = $this->pagination->create_links();
		
		$config1['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config1['total_rows'] = $this->MCompany->count_bd_target();
		$config1['per_page'] = 20;
		$config1['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config1);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalbd'] = $config1['total_rows'];
		$data['bdresults'] = $this->MCompany->getBDTarget($limit);
		$data['bdlinks'] = $this->pagination->create_links();
		
		//for cleint terms
		 $config2['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config2['total_rows'] = $this->MCompany->count_clients();
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config2['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalclient'] = $config2['total_rows'];
		$data['resultsclients'] = $this->MCompany->getClientList($limit);
		$data['clientslinks'] = $this->pagination->create_links();
		//
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_clientHRlist";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	  function clientManagementfilter(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$data['user']= $this->MPof->getConsulName();
		$data['location'] = $this->MCompany->getLocName();
		 $data['clients'] = $this->MPof->getClientDropdown2();
		 $data['consuls'] = $this->MCompany->getConsuls();
       		// gets the companylist
		$company = $this->MCompany->searchterm_handler_company($this->input->get_post('clients',TRUE));	
		$location = $this->MCompany->searchterm_handler_location($this->input->get_post('locations',TRUE));	
		$consul = $this->MCompany->searchterm_handler_consul($this->input->get_post('consultants',TRUE));
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/clientManagementfilter/';
		$config['total_rows'] = $this->MCompany->count_clients_hr_filter($company,$location,$consul);
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
		$data['results'] = $this->MCompany->getClientHRFilter($limit,$company,$location,$consul);
		$data['links'] = $this->pagination->create_links();
		
		
		$config1['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config1['total_rows'] = $this->MCompany->count_bd_target();
		$config1['per_page'] = 20;
		$config1['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config1);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalbd'] = $config1['total_rows'];
		$data['bdresults'] = $this->MCompany->getBDTarget($limit);
		$data['bdlinks'] = $this->pagination->create_links();
				//for cleint terms
		 $config2['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config2['total_rows'] = $this->MCompany->count_clients();
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config2['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalclient'] = $config2['total_rows'];
		$data['resultsclients'] = $this->MCompany->getClientList($limit);
		$data['clientslinks'] = $this->pagination->create_links();
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_clientHRlistfilter";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	  function clientManagers(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$data['user']= $this->MPof->getConsulName();
		$data['location'] = $this->MCompany->getLocName();
		 $data['clients'] = $this->MPof->getClientDropdown2();
		 $data['consuls'] = $this->MCompany->getConsuls();
       		// gets the companylist
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/clientManagers/';
		$config['total_rows'] = $this->MCompany->count_clients_hr();
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
		$data['results'] = $this->MCompany->getClientHR($limit);
		$data['links'] = $this->pagination->create_links();
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_clientMGRlist";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	  function clientManagersFilter(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$data['user']= $this->MPof->getConsulName();
		$data['location'] = $this->MCompany->getLocName();
		 $data['clients'] = $this->MPof->getClientDropdown2();
		 $data['consuls'] = $this->MCompany->getConsuls();
		 
		 $company = $this->MCompany->searchterm_handler_company($this->input->get_post('clients',TRUE));	
		$location = $this->MCompany->searchterm_handler_location($this->input->get_post('locations',TRUE));	
		$consul = $this->MCompany->searchterm_handler_consul($this->input->get_post('consultants',TRUE));
       		// gets the companylist
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/clientManagersFilter/';
		$config['total_rows'] = $this->MCompany->count_clients_hr_fil($company,$location,$consul);
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
		$data['results'] = $this->MCompany->getClientHRFil($limit,$company,$location,$consul);
		$data['links'] = $this->pagination->create_links();
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_clientFilMGRlist";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	  function clientManagementapp(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$data['user']= $this->MPof->getConsulName();
		$data['location'] = $this->MCompany->getLocName();
		 $data['clients'] = $this->MPof->getClientDropdown2();
		 $data['consuls'] = $this->MCompany->getConsuls();
       		// gets the companylist
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/clientManagementapp/';
		$config['total_rows'] = $this->MCompany->count_clients_hr_app();
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
		$data['results'] = $this->MCompany->getClientHRApp($limit);
		$data['links'] = $this->pagination->create_links();
		
		
		$config1['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config1['total_rows'] = $this->MCompany->count_bd_target();
		$config1['per_page'] = 20;
		$config1['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config1);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalbd'] = $config1['total_rows'];
		$data['bdresults'] = $this->MCompany->getBDTarget($limit);
		$data['bdlinks'] = $this->pagination->create_links();
		//for cleint terms
		 $config2['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config2['total_rows'] = $this->MCompany->count_clients();
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config2['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalclient'] = $config2['total_rows'];
		$data['resultsclients'] = $this->MCompany->getClientList($limit);
		$data['clientslinks'] = $this->pagination->create_links();
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_clientHRapplist";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	  function clientManagementpen(){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
		$data['user']= $this->MPof->getConsulName();
		$data['location'] = $this->MCompany->getLocName();
		 $data['clients'] = $this->MPof->getClientDropdown2();
		 $data['consuls'] = $this->MCompany->getConsuls();
       		// gets the companylist
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/companies/admin/clientManagementpen/';
		$config['total_rows'] = $this->MCompany->count_clients_hr_app();
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
		$data['results'] = $this->MCompany->getClientHRPen($limit);
		$data['links'] = $this->pagination->create_links();
		
		
		$config1['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config1['total_rows'] = $this->MCompany->count_bd_target();
		$config1['per_page'] = 20;
		$config1['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config1);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalbd'] = $config1['total_rows'];
		$data['bdresults'] = $this->MCompany->getBDTarget($limit);
		$data['bdlinks'] = $this->pagination->create_links();
		//for cleint terms
		 $config2['base_url'] = base_url() . 'index.php/companies/admin/clientManagement/';
		$config2['total_rows'] = $this->MCompany->count_clients();
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 4;
		//$choice = $config['total_rows']/$config['per_page'];
		$config2['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
        $data['totalclient'] = $config2['total_rows'];
		$data['resultsclients'] = $this->MCompany->getClientList($limit);
		$data['clientslinks'] = $this->pagination->create_links();
           // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
	
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_clientHRPenlist";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
      }
	  
	  
	 function companypage()
	    {
		    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
       		// gets the companylist
	    $cid = $this->uri->segment(4);
		$data['checkrating']=$this->MCompany->checkRating($cid);
		$data['checkgrade']=$this->MCompany->checkGrade($cid);
		$userid = $this->session->userdata('id');
		 $data['compdetail'] =  $this->MCompany->getSingleCompany($cid);
		$data['user'] = $this->MPof->getUserDetails($userid);
		$data['companyF'] = $this->MPof->getCompNameF();
		$data['locationF'] = $this->MPof->getLocNameF();
		$data['consulF'] = $this->MPof->getConsulNameF();
		 $data['clients'] = $this->MCompany->getClientDropdown();
		  $data['industry'] = $this->MCompany->getIndustryList();
		  $data['firm'] = $this->MCompany->getFirmList();
		  $data['comptype'] = $this->MCompany->getCompTypeList();
		  $data['relationtype'] = $this->MCompany->getRelationTypeList();
		  $data['location'] = $this->MCompany->getLocationList();
       $data['detail'] =  $this->MCompany->getCompDetail($cid);
	   $data['ratinggrid'] = $this->MCompany->getRatingGrid($cid);
	   $data['gradestruct'] = $this->MCompany->getGradeStruct($cid);
	    $data['compcomments'] = $this->MCompany->getCompComments($cid);
		$data['attachment'] =  $this->MCompany->getAttachmentList($cid);
	   $compdetail = $this->MCompany->getCompDetail($cid);
		$company = $compdetail['parentname'];
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		//// for emplaoyee data//////
        $config1['base_url'] = base_url() . 'index.php/companies/admin/companypage/'.$cid.'/';
		$config1['total_rows'] = $this->MCompany->count_employeedb($company);
		$config1['per_page'] = 20;
		$config1['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config1);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['total'] = $config1['total_rows'];
		$data['results'] = $this->MCompany->getEmployeeDB($company,$limit);
		$data['links'] = $this->pagination->create_links();
		////
		$config3['base_url'] = base_url() . 'index.php/companies/admin/companypageclient/'.$cid.'/';
		$config3['total_rows'] = $this->MCompany->count_hrmanagers($company);
		$config3['per_page'] = 20;
		$config3['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config3);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['totalhr'] = $config3['total_rows'];
		$data['resultshr'] = $this->MCompany->getHRManagers($company,$limit);
		$data['hrlinks'] = $this->pagination->create_links();
         // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
		
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_page";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
		}
		
	function companypageclient()
	    {
		    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
       		// gets the companylist
	     $cid = $this->uri->segment(4);
		$data['checkrating']=$this->MCompany->checkRating($cid);
		$data['checkgrade']=$this->MCompany->checkGrade($cid);
		$userid = $this->session->userdata('id');
		 $data['compdetail'] =  $this->MCompany->getSingleCompany($cid);
		$data['user'] = $this->MPof->getUserDetails($userid);
		$data['companyF'] = $this->MPof->getCompNameF();
		$data['locationF'] = $this->MPof->getLocNameF();
		$data['consulF'] = $this->MPof->getConsulNameF();
		 $data['clients'] = $this->MCompany->getClientDropdown();
		 $data['agreement'] = $this->MCompany->getAgreeDropdown();
		 $data['sentto'] = $this->MCompany->getSentToDropdown();
		 $data['sendby'] = $this->MCompany->getSendByDropdown();
		 $data['contracttype'] = $this->MCompany->getContractDropdown();
		  $data['period'] = $this->MCompany->getPeriodDropdown();
		  $data['industry'] = $this->MCompany->getIndustryList();
		  $data['firm'] = $this->MCompany->getFirmList();
		  $data['comptype'] = $this->MCompany->getCompTypeList();
		  $data['relationtype'] = $this->MCompany->getRelationTypeList();
		  $data['location'] = $this->MCompany->getLocationList();
       $data['detail'] =  $this->MCompany->getCompDetail($cid);
	   $data['ratinggrid'] = $this->MCompany->getRatingGrid($cid);
	   $data['gradestruct'] = $this->MCompany->getGradeStruct($cid);
	    $data['compcomments'] = $this->MCompany->getCompComments($cid);
		$data['attachment'] =  $this->MCompany->getAttachmentList($cid);
		$data['signatories'] = $this->MCompany->getSignatories($cid);
	   $compdetail = $this->MCompany->getCompDetail($cid);
		$company = $compdetail['parentname'];
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
		//// for emplaoyee data//////
        $config1['base_url'] = base_url() . 'index.php/companies/admin/companypageclient/'.$cid.'/';
		$config1['total_rows'] = $this->MCompany->count_employeedb($company);
		$config1['per_page'] = 20;
		$config1['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config1);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['total'] = $config1['total_rows'];
		$data['results'] = $this->MCompany->getEmployeeDB($company,$limit);
		$data['links'] = $this->pagination->create_links();
		/////////////////////
		//////for client transaction//////////
		$config2['base_url'] = base_url() . 'index.php/companies/admin/companypageclient/'.$cid.'/';
		$config2['total_rows'] = $this->MCompany->count_clienttans($cid);
		$config2['per_page'] = 20;
		$config2['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config2);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['totalpos'] = $config2['total_rows'];
		$data['resultspos'] = $this->MCompany->getClientTrans($cid,$limit);
		$data['poslinks'] = $this->pagination->create_links();
		/////////////////////////
		///////////for HR MAnagers///////////
		//////for client transaction//////////
		$config3['base_url'] = base_url() . 'index.php/companies/admin/companypageclient/'.$cid.'/';
		$config3['total_rows'] = $this->MCompany->count_hrmanagers($company);
		$config3['per_page'] = 20;
		$config3['uri_segment'] = 5;
		//$choice = $config['total_rows']/$config['per_page'];
		$config1['num_links'] = 19;		
		$this->pagination->initialize($config3);

		$limit = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
        $data['totalhr'] = $config3['total_rows'];
		$data['resultshr'] = $this->MCompany->getHRManagers($company,$limit);
		$data['hrlinks'] = $this->pagination->create_links();
		
         // Set breadcrumb(navigation). This tells where you are.
	    $this->bep_site->set_crumb('Companies List','companies/admin/companylist');
		
         // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_page";
	    $data['module'] = 'companies';
	    $this->load->view($this->_container,$data);
		}
   // This inserts the company inputs into the database.
    function entercompany(){
	      if($this->input->post('client_id'))
		   {
		    $compid = $this->uri->segment('4');
	        $this->MCompany->editCompany($compid);
			if($this->input->post('groupname'))
			 {
			$groupname = $_POST['groupname'];
			$group = $this->MCompany->getGroup($groupname);
			if($groupname!=$group['parentname'])
			  {
			     $this->MCompany->addGroup($groupname); 
			  }
		   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been entered.');
	                redirect('companies/admin/companypageclient/'.$compid,'refresh');
	          }
			  }
			
         }
	// edit company
	function editCompany()
	  {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Companies List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Companies List';
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
		}
		else
		{
		$data['hour'] = 0;
		$data['min']= 0;
		$data['message'] = 0;
		$data['sentby'] = 0;
		}
		$data['id'] = $this->uri->segment(4);
		$cid = $this->uri->segment(4);
		if($this->input->post('upload'))
			   {
			   $file =  $_SERVER['DOCUMENT_ROOT']."/public/company/" ;
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			'upload_path' => $file,
			'max_size' => 10240
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		 //rename($image_data['full_path'],$image_data['file_path'].$name."_".$type.$image_data['file_ext']);
		$this->load->database();
	
	 
		      $cand_details = array(
	 
			         'client_id'   =>$cid,
					 'filename'  => $image_data['file_name'],
		             'filepath'  => $image_data['full_path']
			);
				
			$this->MCompany->do_upload($cand_details);
			
			// This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Uploaded succesfully.');
	                redirect('companies/admin/index/');
			   }
	 		if ($this->input->post('comp')){
         $this->MCompany->editCompany($cid);
		  $this->MCompany->editClientDetails($cid);
		   // This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Company has been updated.');
	                redirect('companies/admin/index/');
	          }
			 
	
	  else
	  {
	     // This gets the detail about the company which user is editing..
         $data['detail'] =  $this->MCompany->getSingleCompany($cid);
		 // This gets the detail about the company which user is editing..
         $data['detail_client'] =  $this->MCompany->getSingleClient($cid);
	    // gets the companylist
        $data['results'] =  $this->MCompany->getCompanyList();
	    $data['industry'] = $this->MCompany->getIndustryList();
		// To retrive the attachment list.
			    $data['attachment'] =  $this->MCompany->getAttachmentList($cid);
			    // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_company_edit";
                $data['module'] = 'companies';
                $this->load->view($this->_container,$data);
	  }
    }
	
	 function viewattachment()
	    {
		  $id = $this->uri->segment(4);
		  $data['attachment'] = $this->MCompany->getAttach($id);
		  $this->load->view('admin/admin_company_attachment',$data);
		 }
		 
	function filespa()
	  {
	  $data['files']=$this->MCompany->fetch_filespaa();
	  foreach ($data['files'] as $row){
	  $sql = 'UPDATE pof SET location="'.$row->s_id.'" WHERE duplocation ="'.$row->synonym.'";';
	  echo $sql;
	   $this->MCompany->importfiles($sql);
	   
	  }
	 	  
	  }
	  
	  function filesp()
	  {
	  $data['files']=$this->MCompany->fetch_comp();
	  foreach ($data['files'] as $row){
	  $sql = 'INSERT INTO companies VALUES('.$row->s_id.')';
	  echo $sql;
	   $this->MCompany->importfiles($sql);
	   
	  }
	 	  
	  }
	  
	function addRatingGrid()
	  {
	    $compid = $this->uri->segment(4);
	 
	   if($this->input->post('add'))
	       {
			 $rating = $this->input->post('rating');
			  $status = $this->input->post('status');
			  $narration = $this->input->post('narration');
			   $count = count($rating); 
			   for($i=0; $i<$count; $i++)
				   {
				    $data = array(
					 'cid' => $compid,
					'rating' => $rating[$i],
					'narration' => $narration[$i],
					'status' => $status[$i],
					);
				  $this->MCompany->addRating($data);
				  $rating1=$rating[$i];
				  $getrating = $this->MCompany->getRating($rating1);
				    if($getrating == FALSE)
					  {
					   $this->MCompany->addRatingList($rating1);
					   
					  }
				}
					 
			
			 redirect('companies/admin/editRatingGrid/'.$compid,'refresh');
	   }
	   else
	     {
	    $this->load->view('admin/admin_company_addrating');
		}
	  }
	  
	  function editRatingGrid()
	  {
	    $compid = $this->uri->segment(4);
	 
	      if($this->input->post('add'))
			   {
			 $rating = $this->input->post('rating');
			  $status = $this->input->post('status');
			  $narration = $this->input->post('narration');
			   $count = count($rating); 
			   for($i=0; $i<$count; $i++)
				   {
				    $data = array(
					 'cid' => $compid,
					'rating' => $rating[$i],
					'narration' => $narration[$i],
					'status' => $status[$i],
					);
				  $this->MCompany->addRating($data);
				  $rating1=$rating[$i];
				  $getrating = $this->MCompany->getRating($rating1);
				    if($getrating == FALSE)
					  {
					   $this->MCompany->addRatingList($rating1);
					   
					  }
				    }
							 
				
			 redirect('companies/admin/editRatingGrid/'.$compid,'refresh');
					 
		   	 }
			 if($this->input->post('update'))
			   {
			     $rid1=$this->input->post('rid');
				  $rating = $this->input->post('oldrating');
				    $status = $this->input->post('oldstatus');
					  $narration = $this->input->post('oldnarration');
					    $count = count($rid1);
						 for($i=0; $i<$count; $i++)
				          {
				          $data = array(
					       'rating' => $rating[$i],
					       'narration' => $narration[$i],
					       'status' => $status[$i],
					       );
						   $rid = $rid1[$i];
				       $this->MCompany->updateRating($rid,$data);
				  	    }
								 
				
			 redirect('companies/admin/editRatingGrid/'.$compid,'refresh');
			   }
	
	    else
	     {
		  $cid = $this->uri->segment(4);
		  $data['ratinggrid'] = $this->MCompany->getRatingGrid($cid);
	    $this->load->view('admin/admin_company_editrating',$data);
		}
	  }
	  
	function addGradeStruc()
	  {
	    $compid = $this->uri->segment(4);
	    $data['leveldrop'] = $this->MCompany->getLevelDrop();
	   if($this->input->post('add'))
	       {
			 $grade = $this->input->post('grade');
			  $equidesig = $this->input->post('equidesig');
			  $status = $this->input->post('status');
			  $level = $this->input->post('level');
			   $count = count($grade); 
			   for($i=0; $i<$count; $i++)
				   {
				    $data = array(
					 'cid' => $compid,
					'grade' => $grade[$i],
					'equi_desig' => $equidesig[$i],
					'level' => $level[$i],
					'status' => $status[$i],
					);
				  $this->MCompany->addGrade($data);
				  $grade1=$grade[$i];
				  $getgrade = $this->MCompany->getGrade($grade1);
				    if($getgrade == FALSE)
					  {
					   $this->MCompany->addGradeList($grade1);
					   
					  }
				}
					 
			
			
			 redirect('companies/admin/editGradeStruc/'.$compid,'refresh');
	   }
	   else
	     {
	    $this->load->view('admin/admin_company_addgrade',$data);
		}
	  }
	  
	 function editGradeStruc()
	  {
	    $compid = $this->uri->segment(4);
	    $data['leveldrop'] = $this->MCompany->getLevelDrop();
	      if($this->input->post('add'))
			   {
			$grade = $this->input->post('grade');
			  $status = $this->input->post('status');
			   $equidesig = $this->input->post('equidesig');
			  $level = $this->input->post('level');
			   $count = count($grade); 
			   for($i=0; $i<$count; $i++)
				   {
				    $data = array(
					 'cid' => $compid,
					'grade' => $grade[$i],
					'equi_desig' => $equidesig[$i],
					'level' => $level[$i],
					'status' => $status[$i],
					);
				  $this->MCompany->addGrade($data);
				  $grade1=$grade[$i];
				  $getgrade = $this->MCompany->getGrade($grade1);
				    if($getgrade == FALSE)
					  {
					   $this->MCompany->addGradeList($grade1);
					   
					  }
				}
				 redirect('companies/admin/editGradeStruc/'.$compid,'refresh');
					 
		   	 }
			 if($this->input->post('update'))
			   {
			     $gid1=$this->input->post('gid');
				  $grade = $this->input->post('oldgrade');
				    $status = $this->input->post('oldstatus');
					 $equidesig = $this->input->post('oldequidesig');
					  $level = $this->input->post('oldlevel');
					    $count = count($gid1);
						 for($i=0; $i<$count; $i++)
				          {
				          $data = array(
					      'grade' => $grade[$i],
						  'equi_desig' => $equidesig[$i],
					      'level' => $level[$i],
					      'status' => $status[$i],
					       );
						   $gid = $gid1[$i];
				       $this->MCompany->updateGrade($gid,$data);
				  	    }
				redirect('companies/admin/editGradeStruc/'.$compid,'refresh');
			   }
		else
	     {
		  $cid = $this->uri->segment(4);
		  $data['gradestruc'] = $this->MCompany->getGradeStruc($cid);
	    $this->load->view('admin/admin_company_editgrade',$data);
		}
	  }
	  
	  function addScribble()
	  {
	   $cid = $this->uri->segment(4);
	   $data['compcomments'] = $this->MCompany->getCompComments($cid);
	   if($this->input->post('add'))
	   {
	    $this->MCompany->addComment($cid);
		redirect('companies/admin/addScribble/'.$cid,'refresh');
	   }
	   else
	     {
	   $this->load->view('admin/admin_company_scribble',$data);
		}
	  }
     function addAttachment()
	    {
		 		$cid = $this->uri->segment(4);
		    if(isset($_POST['go']))
					 {
					  $file =  $_SERVER['DOCUMENT_ROOT']."/public/company/" ;
					   $config = array(
					   'allowed_types' => 'jpg|jpeg|gif|png|doc|docx|pdf|xls',
			            'upload_path' => $file,
			             'max_size' => 2000
		                  );
					$this->load->library('upload', $config);
					 $this->upload->do_upload();
					 $company_attachment_data = $this->upload->data();
					  $this->load->database();
					   $attachemnt_details = array(
					    'comp_id' => $cid,
						'filename' => $company_attachment_data['file_name'],
						'filepath' => $company_attachment_data['full_path']
						);
					  $this->MCompany->do_upload($attachemnt_details);
					echo "Uploaded successfully.";
					 }
					 else{
					 $this->load->view('admin/admin_company_addattachment');
					 }			  
		}
	  		 // This enters new candidate.
    function newCandidate(){
	    // This gets the company id.
	    $compid = $this->uri->segment(4);
		// This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Edit Candidate";
        // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Edit Candidate";
	    $username = $this->session->userdata('id');
		$data['compp'] = $this->MCompany->getCompp($compid);
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
            $compid = $this->uri->segment(4);
	        $this->MCompany->save($compid);
			$id = $this->db->insert_id(); 
			$this->MCandidate->addtostatuslist($id);  
			
				 
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
				$data['gradelist']= $this->MCompany->getAllGradeList($compid);
				$data['levellist']= $this->MCompany->getAllLevelList($compid);
                $data['module'] = 'candidates';
                $this->load->view('admin/admin_candidate_new',$data);
           }
         }
		 
	function clientterms()
	  {
	    $clientid = $this->uri->segment(4);
	   if($this->input->post('contracttype'))
	     {
		  $this->MCompany->updateClientTerms($clientid);
		   if($this->input->post('gradeid'))
		     {
			   $gradeid = $_POST['gradeid'];
			    $feetype = $_POST['feetype'];
				 $fees = $_POST['fees'];
				   $cgp = $_POST['cgp'];
				    $cep = $_POST['cep'];
					 $count = count($gradeid);
					  for($i=0; $i<=$count; $i++)
					    {
						 $gid = $gradeid[$i];
						  $data = array(
						  'feetype' => $feetype[$i],
						  'fees' => $fees[$i],
						  'cgp' => $cgp[$i],
						  'cep' => $cep[$i],
						  );
						  $this->MCompany->updateGradeFee($gid,$data);
						}
			 }
			 if($this->input->post('signator_name'))
		     {
			   
				 $clientid = $this->uri->segment(4);
			   $enteredby = $this->session->userdata('username');
			  $date = date('Y-m-d');
			  $sheetname = $this->input->post('sheetname');
			  $signator_name = $this->input->post('signator_name');
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
			  
				   $data = array(
				   'candidate_name' => $signator_name,
			       'telephone' => $telephone,
			       'email' => $email,
			       'current_location' => $current_location,
			       'current_company' => $current_company,
			       'job_title' => $job_title,
			       'designation' => $designation,
		           'course' => $course,
			       'institute' => $institute,
			       'year_of_passing' => $year_of_passing,
			       'company' => $current_company,
				   'entered_by' => $enteredby,
				   'entered_on' => $date,
				   'cand_mgmt' => '411',
				   'prid' => $clientid,
				   );
				   $this->MCandidate->saveMapping($data);
				  
				  
			 }
			
	
			 // This flags the messege about that a new company has been created successfully.		
	              flashMsg('success','Candidate has been updated successfully.');
				   redirect('companies/admin/companypageclient/'.$clientid,'refresh');
				}   
				   
			else{
			  $data['page'] = $this->config->item('backendpro_template_admin') . "admin_client_page";
	       $data['module'] = 'candidates';
	        $this->load->view($this->_container,$data);
			 }
		 
	  }
}//end class

?>
