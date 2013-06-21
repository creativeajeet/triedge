<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
  function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('Task');
			// Load models and language
			$this->load->model('MProject');
			$this->load->module_model('auth','User_model');
			$this->load->language('customer');
			// Set breadcrumb(navigation). This tells where you are while accessing this software.
			$this->bep_site->set_crumb('Project Home','projects/admin');
                        $this->load->helper('date');
	}

    // This loads all the tasks allocated to diffrent consultants
    function index(){
         // This shows the module name user is accessing, as a tiltle in the browser. 
		 $data['title'] = "Projects Page";
        // This shows the module name you are accessing, as a header(tab name) in the browser. 
	    $data['header'] = $this->lang->line('project_projects');
        // get members details where group = 1 which is a member or not 2 which is admin from be_users
	    $id = 1;
        $data['users'] = $this->MProject->getAllCustomersProfile($id);
        // get all tasks
       
	    // This is how Mirus-HRMS loads views
    	$data['page'] = $this->config->item('backendpro_template_admin') . "admin_project_home";
    	$data['module'] = 'projects';
    	$this->load->view($this->_container,$data);
       }


    function projectlist($id=NULL){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
	    $data['title'] = "Project List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Project List';
        $id = $this->uri->segment(4);
		// get all tasks
        $data['projects'] =  $this->MProject->getProjectList($id);
        // Set breadcrumb(navigation). This tells where you are while accessing this software.
	    $this->bep_site->set_crumb('Project List','projects/admin/projectlist');
        // get username
        $data['name'] =  $this->MProject->getUsername($id);
        // This is how Mirus-HRMS loads views
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_project_list";
	    $data['module'] = 'projects';
	    $this->load->view($this->_container,$data);
    }

    // This creates a new tasks to a user by admin.   
    function newproject($id=0){
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Enter New Project";
       // This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Enter New Project";
         // Set breadcrumb(navigation). This tells where you are while accessing this software.
        $this->bep_site->set_crumb('Enter New Project','projects/admin/enter_newproject');
        // get username name
        $id = $this->uri->segment(4);
        $data['name'] =  $this->MProject->getUsername($id);

        if ($this->input->post('project_name')){
        $id = $this->input->post('id');
	    // fields filled up so,
	    $this->MProject->enterNewProject();
	   // This flags the messege about that a new tasks has been created successfully.		
	  flashMsg('success','New project created.');
	redirect('projects/admin/projectlist/'.$id,'refresh');
        }
		else{
                // This is how Mirus-HRMS loads views
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_project_create";
                // This how Bep load views
                $data['module'] = 'projects';
                $this->load->view($this->_container,$data);
        }
    }
}//end class
?>
