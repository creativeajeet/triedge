<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Support_Controller {
  function Admin(){
   	parent::Support_Controller();
		   // Check for access permission
			 check('Customer Support');
					
			// Load model
			$this->load->module_model('customersupport','MCustomer_support');
			$this->load->module_model('support','MSupport');
			$this->load->language('customer');			
	}
  

	function index(){
			//check('Customer Support');
			$data['title'] = "Customer Support Home";
			// get the username and pull the customer records for the user
			$data['username']=$this->session->userdata('username');
			$username = $this->session->userdata('username');
			$customer_records = $this->MCustomer_support->getAllCustomerRecordByUsername($username);
			$data['customer_records'] = $customer_records;
		
			$data['totaltime'] = $this->MCustomer_support-> totalColumn($username,'time');
			$data['totalcredit'] = $this->MCustomer_support-> totalColumn($username, 'point_credit');
			$totaltime = $this->MCustomer_support-> totalColumn($username,'time');
			$totalcredit = $this->MCustomer_support-> totalColumn($username, 'point_credit');
			$data['total'] = $totalcredit['point_credit'] - $totaltime['time'];
			
			$data['header'] = $this->lang->line('customer_record');
				
			// This how Bep load views
			$data['page'] = $this->config->item('backendpro_template_admin') . "support_home";
			$data['module'] = 'customersupport';
			$this->load->view($this->_container,$data); 
		
			
	}
  

	function details($id){
		check('Customer Record');
		// we use the following variables in the view
		$data['title'] = "Support Details";
		$data['header'] = "Support Details" ;
		
		// get user name from the session, just to say Hi username!
		$data['username']=$this->session->userdata('username');
		$username = $this->session->userdata('username');
		
		// we should show details where customer_id matches. Otherwise a customer can see other customer's record as well
		$customer_records = $this->MCustomer_support->getAllCustomerRecordByUsername($username);
		$customer_id = $customer_records['0']['customer_id'];// this will give 2 or 3 etc.
		$id = $this->uri->segment(4);
		$details= $this->MCustomer_support->getRecordDetails($id, $customer_id);
		$data['details'] = $details;
		// when you type details/33 which is not the customer's record then it returns nothing
		// so if $data['details'] is empty  then redirect
		if (empty($details)){
			flashMsg('warning','The requested record does not exist');
		  	redirect('customersupport/admin/','refresh');
		}
		// Set breadcrumb
		$this->bep_site->set_crumb('Details','customersupport/admin/details');
			
		// This how Bep load views
		$data['page'] = $this->config->item('backendpro_template_admin') . "details";
		$data['module'] = 'customersupport';
		$this->load->view($this->_container,$data); 
		
	}
	
	
	
}//end class
?>
