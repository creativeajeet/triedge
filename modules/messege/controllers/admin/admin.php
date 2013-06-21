<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
  function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('Messege');
			// Load models and language
			$this->load->model('MMessege');
			$this->load->module_model('auth','User_model');
			$this->load->language('customer');
			// Set breadcrumb
			$this->bep_site->set_crumb('Project Home','projects/admin');
                        $this->load->helper('date');
	}


    function index(){
        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Message";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Message";
            // get the users list
			$data['users'] = $this->MMessege->getUsers();
	        // This how Bep load views
	        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_messege_home";
	        $data['module'] = 'messege';
	        $this->load->view($this->_container,$data);
           }

   function newMsg()
	  {
	    $sent_by = $this->session->userdata('id');
		$timezone = "Asia/Calcutta";
       if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$sent_on = date('Y-m-d h:i:s');
	    if($this->input->post('type')=='indi')
		  {
		   $user = $_POST['user'];
		   $count = count($user);
		   for($i=0; $i<$count; $i++)
		   {
		    $msg_details = array(
			'type' =>$this->input->post('type'),
			'title' => $this->input->post('title'),
			'send_to' =>$user[$i],
			'msg' => $this->input->post('msg'),
			'sent_by' => $sent_by,
			'sent_on' => $sent_on,
			);
			$this->MMessege->sendMsg($msg_details);
		   }
		   flashMsg('success','Messege has been sent successfully.');
		  redirect('messege/admin/newMsg','refresh') ;
		  }
		 elseif($this->input->post('type')=='news')
		 {
		  $msg_details = array(
			'type' =>$this->input->post('type'),
			'title' => $this->input->post('title'),
			'msg' => $this->input->post('msg'),
			'sent_by' => $sent_by,
			'sent_on' => $sent_on,
			);
			$this->MMessege->sendMsg($msg_details);
		  
		   flashMsg('success','Messege has been sent successfully.');
		  redirect('messege/admin/newMsg','refresh') ;
		 }
		
		
	   // get the users list
			$data['users'] = $this->MMessege->getUsers();
	$this->load->view('admin/admin_messege_new',$data); 
	
	
	  }
	  
	 
    function news()
	  {
	   $msgid = $this->uri->segment(4);
	   
	   $data['news'] = $this->MMessege->readMsg($msgid);
	   $this->load->view('admin/admin_messege_read',$data);
	   
	  }

 function seeAll()
	  {
	    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Message";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Message";
	    $userid = $this->session->userdata('id');
		$data['results'] = $this->MMessege->getAllIndi($userid);
	   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_messege_home";
	        $data['module'] = 'messege';
	        $this->load->view($this->_container,$data);
	  }


 function sent()
    {
	  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Message";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Message";
	    $userid = $this->session->userdata('id');
		$data['results'] = $this->MMessege->getAllSent($userid);
	   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_messege_sent";
	        $data['module'] = 'messege';
	        $this->load->view($this->_container,$data);
	}
function received()
    {
	  // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Message";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Message";
	    $userid = $this->session->userdata('id');
		$data['results'] = $this->MMessege->getAllReceived($userid);
	   $data['page'] = $this->config->item('backendpro_template_admin') . "admin_messege_received";
	        $data['module'] = 'messege';
	        $this->load->view($this->_container,$data);
	}
	
   // task allocation
   
   function task()
	  {
	   // get the users list
			$data['users'] = $this->MMessege->getUsers();
	$this->load->view('admin/admin_messege_newTask',$data); 
	   
	  }
	  
}//end class
?>
