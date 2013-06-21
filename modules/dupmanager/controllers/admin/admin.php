<?php
class Admin extends Admin_Controller {

function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('List Manager');
			// Load models and language
			$this->load->module_model('auth','User_model');
			
			$this->load->model('MDupmanager');
			
			// Set breadcrumb
			$this->bep_site->set_crumb('Miscellaneous','list/admin');
			$this->load->helper('date');
			// Load the validation library
		    $this->load->library('validation');
			log_message('debug','BackendPro : Members class loaded');
	}
	
		 //duplication manager
	 function index()
	   {
	     // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Candidate List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Candidate List";
		$data['results'] = $this->MDupmanager->fetch_candidates_dup1();
		  $this->load->view('admin/search_result_duplicate1',$data);	 
	   }
	   
	   //duplication Remover
	   
	  function insertCandidate()
	    {
		  if($this->input->post('save'))
		   {
		    $cand = $_POST['c_id'];
			$count = count($_POST['c_id']);
			for($i=0; $i<$count; $i++)
			  {
			   $data = array('cand_id' => $cand[$i]);
			   $this->MDupmanager->add($data);
			  }
			  flashMsg('success','Inserted successfully.');
			 redirect('candidates/admin/','refresh');
		   }
		}
	
}
?>