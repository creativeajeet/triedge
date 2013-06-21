<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BackendPro
 *
 * A website backend system for developers for PHP 4.3.2 or newer
 *
 * @package         BackendPro
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

/**
 * Home
 *
 * @package         BackendPro
 * @subpackage      Controllers
 */
class Home extends Admin_Controller
{
	function Home()
	{
		parent::Admin_Controller();
		$this->load->module_model('customersupport','MCustomer_support');
			$this->load->module_model('auth','User_model');
			$this->load->module_model('usage','MUsage');
			$this->load->module_model('candidates','MCandidate');
			$this->load->module_model('pof','MPof');
			$this->load->module_model('messege','MMessege');
			$this->load->model('MDash');
			$this->load->language('customer');

		log_message('debug','BackendPro : Home class loaded');
	}

function index()
{
	$data['title'] = "Customer Support Home";
	$data['header'] = $this->lang->line('customer_record');
			// get the username and pull the customer records for the user
			$data['username']=$this->session->userdata('id');
			$username = $this->session->userdata('id');
			$customer_records = $this->MCustomer_support->getMsg($username);
		  $data['total_db'] = $this->MCandidate->record_count();
			//$data['total_db'] = $this->MCandidate->record_count_total();
		   //$data['total_db'] = $this->MCandidate->getLastImportId();
			$userid = $this->session->userdata('id');
			$data['userd'] = $this->MPof->getUserDetails($userid);
		    $user = $this->session->userdata('id');
		    $data['results'] = $this->MPof->getUserPos($user); 
			$data['news'] = $this->MMessege->getNews();
			$consid = $this->session->userdata('id');
			$data['posdel'] = $this->MUsage->getPosDeliveryDash($consid); 
			
			
			
		if($this->input->post('from'))
		{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$today = date("Y-m-d");
		
		redirect('admin/home/find/'.$from.'/'.$to,'refresh');
		}
		else
		{
		$today = date("Y-m-d");
		$user = $this->session->userdata('username');
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
		$from = date('Y-m-d');
		$to = date('Y-m-d');
		$data['added'] = $this->MUsage->countTodayAddedByUser($user,$from,$to);
		$data['edited'] = $this->MUsage->countTodayEditedByUser($user,$from,$to);
		$data['deleted'] = $this->MUsage->countTodaydeletedByUser($user,$from,$to);
		$data['total'] = ($data['added']+$data['edited']+$data['deleted']);
		/// for metricess

		$data['vrsread'] = $this->MPof->getAllVRSRead();
		$data['novrs'] = $this->MPof->getAllVRSNo();
		
			// This how Bep load views
			$data['page'] = $this->config->item('backendpro_template_admin') . "home";
			
			$this->load->view($this->_container,$data); 
			}
}
    // ajax call for reading msg
	 function readMsg()
      {
 
       $id = $this->input->post('msg_id');
      $this->MMessege->readMessage($id);
       }
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
		$user = $this->session->userdata('username');
		$today = date("Y-m-d");
		
		redirect('admin/home/userAction/'.$user.'/'.$from.'/'.$to,'refresh');
		}
		else
		{
		 $from = $this->input->post('from');
		$to = $this->input->post('to');
		$today = date("Y-m-d");
		 $data['users']= $this->MUsage->getUsers();
		$data['added1'] = $this->MUsage->getByConsultant($today);
		$data['added'] = $this->MUsage->countAdded($from,$to);
		$data['edited'] = $this->MUsage->countEdited($from,$to);
		$data['deleted'] = $this->MUsage->countdeleted($from,$to);
		$data['total'] = ($data['added']+$data['edited']+$data['deleted']);
		// This how Bep load views
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_consultant_action";
	 
	     $this->load->view($this->_container,$data);	
		 }	
	  }
	 function userAction()
	  {
	   // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Software Usage";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = "Software Usage";
		
		if($this->input->post('from'))
		{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$user = $this->session->userdata('username');
		$today = date("Y-m-d");
		
		redirect('admin/home/userAction/'.$user.'/'.$from.'/'.$to,'refresh');
		}
		else
		{
		$user = $this->uri->segment(4);
		$from = $this->uri->segment(5);
		$to = $this->uri->segment(6);
		$today = date("Y-m-d");
		$data['user']= $this->uri->segment(4);
		
		$data['added'] = $this->MUsage->countAddedbySingleUser($from,$to,$user);
		$data['edited'] = $this->MUsage->countEditedbySingleUser($from,$to,$user);
		$data['deleted'] = $this->MUsage->countDeletedbySingleUser($from,$to,$user);
		$data['total'] = ($data['added']+$data['edited']+$data['deleted']);
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_consultant_action";
	 
	     $this->load->view($this->_container,$data);	
	  }
	  }
	  
	 function posDash()
	    {
		   $user = $this->session->userdata('id');
		    $data['results'] = $this->MPof->getUserPos($user); 
		 // This how Bep load views
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_pof_home";
			
			$this->load->view($this->_container,$data); 
		}
}
/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */