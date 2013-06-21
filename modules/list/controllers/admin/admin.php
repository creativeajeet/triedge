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
		$query = $this->Populate->get(null, 'blank');
		$data['tests'] = $this->formatArrayToIdName($query->result_array());
        $data['page'] = $this->config->item('backendpro_template_admin') . "autopopulate";
	    $data['module'] = 'list';
	    $this->load->view($this->_container,$data);			
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
}
?>