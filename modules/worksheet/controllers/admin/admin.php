<?php
class Admin extends Admin_Controller {

function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('List Manager');
			// Load models and language
			$this->load->module_model('auth','User_model');
			$this->load->model('MWorksheet');
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
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_create";
	    $data['module'] = 'worksheet';
	    $this->load->view($this->_container,$data);			
	}
	function prefWorksheet()
	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		$username = $this->session->userdata('id');
		$data['myworksheet'] = $this->MWorksheet->getMyWorksheet($username);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$user = $this->session->userdata('id');
		 if($this->input->post('worksheet'))
		   {
		    $worksheet = $_POST['worksheet'];
			$count = count($worksheet);
			 for($i=0; $i<$count; $i++)
			  {
			    $worksheets = array(
				'user_id' => $user,
				'worksheet_id' => $worksheet[$i],
				);
				$this->MWorksheet->myworksheets($worksheets);
			  }
		     redirect('worksheet/admin/prefWorksheet','refresh');
		   }
		   else
		   {
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_consultant_worksheet";
	    $data['module'] = 'worksheet';
	    $this->load->view($this->_container,$data);	
		}		
	}
	//
	 function delmyworksheet()
	   {
	    if($this->input->post('worksheet'))
		 {
		  $myworksheet = $this->input->post('worksheet');
		   $count = count($myworksheet);
		    for($i=0; $i<$count; $i++)
			 {
			  $prefid = $myworksheet[$i];
			  $this->MWorksheet->delMyWorksheet($prefid);
			 }
		 }
		 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Worksheet preferences have been deleted successfully.');
	          redirect('worksheet/admin/prefWorksheet','refresh');
	   }
	//
	function select_segment(){
            if('IS_AJAX') {
        	$data['option_segment'] = $this->MWorksheet->getSegment();		
		$this->load->view('admin/segment',$data);
            }
		
	}
	function select_masterworksheet(){
            if('IS_AJAX') {
        	$data['option_masterworksheet'] = $this->MWorksheet->getMasterWorksheet();		
		$this->load->view('admin/masterworksheet',$data);
            }
		
	}
	function select_submasterworksheet(){
            if('IS_AJAX') {
        	$data['option_submasterworksheet'] = $this->MWorksheet->getSubMasterWorksheet();		
		$this->load->view('admin/submasterworksheet',$data);
            }
		
	}
	
	function select_basicworksheet(){
            if('IS_AJAX') {
        	$data['option_basicworksheet'] = $this->MWorksheet->getBasicWorksheet();		
		$this->load->view('admin/basicworksheet',$data);
            }
		
	}
	function select_masterworksheettosend(){
            if('IS_AJAX') {
        	$data['option_masterworksheettosend'] = $this->MWorksheet->getMasterWorksheettosend();		
		$this->load->view('admin/masterworksheettosend',$data);
            }
		
	}
	function select_submasterworksheettosend(){
            if('IS_AJAX') {
        	$data['option_submasterworksheettosend'] = $this->MWorksheet->getSubMasterWorksheettosend();		
		$this->load->view('admin/submasterworksheettosend',$data);
            }
		
	}
	function select_subbasicworksheettosend(){
            if('IS_AJAX') {
        	$data['option_subbasicworksheettosend'] = $this->MWorksheet->getSubBasicWorksheettosend();		
		$this->load->view('admin/subbasicworksheettosend',$data);
            }
		
	}
	function select_subbasicworksheettopull(){
            if('IS_AJAX') {
        	$data['option_subbasicworksheettopull'] = $this->MWorksheet->getSubBasicWorksheettopull();		
		$this->load->view('admin/subbasicworksheettopull',$data);
            }
		
	}
	function select_basicworksheettosend(){
            if('IS_AJAX') {
        	$data['option_basicworksheettosend'] = $this->MWorksheet->getBasicWorksheettosend();		
		$this->load->view('admin/basicworksheettosend',$data);
            }
		
	}
	function select_masterworksheettopull(){
            if('IS_AJAX') {
        	$data['option_masterworksheettopull'] = $this->MWorksheet->getMasterWorksheettopull();		
		$this->load->view('admin/masterworksheettopull',$data);
            }
		
	}
	function select_submasterworksheettopull(){
            if('IS_AJAX') {
        	$data['option_submasterworksheettopull'] = $this->MWorksheet->getSubMasterWorksheettopull();		
		$this->load->view('admin/submasterworksheettopull',$data);
            }
		
	}
	function select_basicworksheettopull(){
            if('IS_AJAX') {
        	$data['option_basicworksheettopull'] = $this->MWorksheet->getBasicWorksheettopull();		
		$this->load->view('admin/basicworksheettopull',$data);
            }
		
	}
	function select_masterworksheetconstituentpull(){
            if('IS_AJAX') {
        	$data['option_masterworksheetconstituent'] = $this->MWorksheet->getMasterWorksheetconstituent();		
		$this->load->view('admin/masterworksheetconstituentpull',$data);
            }
		
	}
	
	function select_basicworksheets(){
            if('IS_AJAX') {
        	$data['option_basicworksheets'] = $this->MWorksheet->getBasicWorksheets();		
		$this->load->view('admin/basicworksheets',$data);
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
	//
	function select_segment1(){
            if('IS_AJAX') {
        	$data['option_segment'] = $this->MWorksheet->getSegment();		
		$this->load->view('admin/segment1',$data);
            }
		
	}
	function select_masterworksheet1(){
            if('IS_AJAX') {
        	$data['option_masterworksheet'] = $this->MWorksheet->getMasterWorksheet();		
		$this->load->view('admin/masterworksheet1',$data);
            }
		
	}
	function select_submasterworksheet1(){
            if('IS_AJAX') {
        	$data['option_submasterworksheet'] = $this->MWorksheet->getSubMasterWorksheet();		
		$this->load->view('admin/submasterworksheet1',$data);
            }
		
	}
	
	function select_basicworksheet1(){
            if('IS_AJAX') {
        	$data['option_basicworksheet'] = $this->MWorksheet->getBasicWorksheet();		
		$this->load->view('admin/basicworksheet1',$data);
            }
		
	}
	

	function select_subbasicworksheettopull1(){
            if('IS_AJAX') {
        	$data['option_subbasicworksheettopull'] = $this->MWorksheet->getSubBasicWorksheettopull();		
			$data['subbasicworksheettopull'] = $this->MWorksheet->getSubBasicWorksheettopullList();		
		$this->load->view('admin/subbasicworksheettopull1',$data);
            }
		
	}
	
	function select_masterworksheettopull1(){
            if('IS_AJAX') {
        	$data['option_masterworksheettopull'] = $this->MWorksheet->getMasterWorksheettopull();		
		$this->load->view('admin/masterworksheettopull1',$data);
            }
		
	}
	function select_submasterworksheettopull1(){
            if('IS_AJAX') {
        	$data['option_submasterworksheettopull'] = $this->MWorksheet->getSubMasterWorksheettopull();		
		$this->load->view('admin/submasterworksheettopull1',$data);
            }
		
	}
	function select_basicworksheettopull1(){
            if('IS_AJAX') {
        	$data['option_basicworksheettopull'] = $this->MWorksheet->getBasicWorksheettopull();	
			$data['basicworksheettopull'] = $this->MWorksheet->getBasicWorksheettopullList();	
		$this->load->view('admin/basicworksheettopull1',$data);
            }
		
	}
	function select_masterworksheetconstituentpull1(){
            if('IS_AJAX') {
        	$data['option_masterworksheetconstituent'] = $this->MWorksheet->getMasterWorksheetconstituent();		
		$this->load->view('admin/masterworksheetconstituentpull1',$data);
            }
		
	}
		
  // This enters a new worksheet
      function addWorksheet()
	  {
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Worksheet Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Worksheet Manager";
          
            $data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
	    	$data['segmenttype'] = $this->MWorksheet->getSegmentType();
            $this->load->library('form_validation');  
			 if ($this->input->post('worksheet_name')){
			   $id=$this->input->post('id');
	            
				if(($this->input->post('worksheet_type'))==2){
				$this->form_validation->set_rules('worksheet_name', 'Worksheet Name', 'required');
		        $this->form_validation->set_rules('segment_id', 'Segment Name', 'required');
			   if ($this->form_validation->run() == FALSE)
		       {
			     // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_create";
				  $data['module'] = 'worksheet';
                 $this->load->view($this->_container,$data);
		      }
			  else{
				$this->MWorksheet->newWorksheetMaster();
				$wid = $this->db->insert_id();
		                   // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Master Worksheet has been entered.');
	          redirect('worksheet/admin/edit/'.$wid,'refresh');   
			}
		 }
				 if(($this->input->post('worksheet_type'))==3){
				 $this->form_validation->set_rules('worksheet_name', 'Worksheet Name', 'required');
		        $this->form_validation->set_rules('masterworksheet_id', 'Part of Sub Masterworksheet', 'required');
				 if ($this->form_validation->run() == FALSE)
		       {
			       // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_create";
				  $data['module'] = 'worksheet';
                 $this->load->view($this->_container,$data);
		      }
			  else{
			  $this->MWorksheet->newWorksheetSubMaster();
				 $wid=$this->db->insert_id();
				 // This enters the multiple constituents.
	             $masterworksheet=$_POST['masterworksheet_id'];
	                $count = count($_POST['masterworksheet_id']);
	                     for($i=0; $i<$count; $i++) {
	                            $masterworksheet_details=array(
											'submaster_id' => $wid,
											'master_id'    => $masterworksheet[$i],
													);
	                            $this->MWorksheet->addtoMasterworksheet($masterworksheet_details);
						 }
		             // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Sub-Master Worksheet has been entered.');
	          redirect('worksheet/admin/edit/'.$wid,'refresh');
			
				 }
				}
				
				if(($this->input->post('worksheet_type'))==4){
				 $this->form_validation->set_rules('worksheet_name', 'Worksheet Name', 'required');
		        $this->form_validation->set_rules('basicworksheet', 'Part of Sub Masterworksheet', 'required');
				 if ($this->form_validation->run() == FALSE)
		       {
			       // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_create";
				  $data['module'] = 'worksheet';
                 $this->load->view($this->_container,$data);
		      }
			  else{
			   $this->MWorksheet->newWorksheetBasic();
		          $wid=$this->db->insert_id(); 	
				 // This enters the multiple constituents.
	             $basicworksheet=$_POST['basicworksheet'];
	                $count = count($_POST['basicworksheet']);
	                     for($i=0; $i<$count; $i++) {
	                            $basicworksheet_details=array(
											'worksheet_id' 	  => $wid,
											'submaster_id'    =>  $basicworksheet[$i],
													);
	                            $this->MWorksheet->addBasicWorksheet($basicworksheet_details);
						 }
		             // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Sub-Master Worksheet has been entered.');
	          redirect('worksheet/admin/edit/'.$wid,'refresh');
			
				 }
				}
			
				if(($this->input->post('worksheet_type'))==5){
				
	           
			
				 $this->form_validation->set_rules('worksheet_name', 'Worksheet Name', 'required');
		        $this->form_validation->set_rules('basicworksheet', 'Part of Sub Masterworksheet', 'required');
				 if ($this->form_validation->run() == FALSE)
		       {
			       // This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_create";
				  $data['module'] = 'worksheet';
                 $this->load->view($this->_container,$data);
		      }
			  else{
				  $this->MWorksheet->newWorksheetSubBasic();
		          $wid=$this->db->insert_id(); 	
		   if((($this->input->post('worksheet_type'))==5)&&($this->input->post('subbasicworksheet'))){			 
				 // This enters the multiple constituents.
	             $subbasicworksheet=$_POST['subbasicworksheet'];
	                $count = count($_POST['subbasicworksheet']);
	                     for($i=0; $i<$count; $i++) {
	                            $subbasicworksheet_details=array(
											'worksheet_id' 	  => $wid,
											'subbasic_id'    =>  $subbasicworksheet[$i],
													);
	                            $this->MWorksheet->addSubBasicWorksheet($subbasicworksheet_details);
						 }
					 }
			if((($this->input->post('worksheet_type'))==5)&&($this->input->post('constituent'))){
				 // This enters the multiple constituents.
	             $constituent=$_POST['constituent'];
	                $count = count($_POST['constituent']);
	                     for($i=0; $i<$count; $i++) {
	                            $constituent_details=array(
											'worksheet_id' 	  => $wid,
											'constituent_id'    => $constituent[$i],
													);
	                            $this->MWorksheet->addConstituent($constituent_details);
						 }
				 }
			if((($this->input->post('worksheet_type'))==5)&&($this->input->post('constituentpull'))){
				// This enters the multiple constituents.
	             $constituentpull=$_POST['constituentpull'];
	                $count = count($_POST['constituentpull']);
	                     for($i=0; $i<$count; $i++) {
	                            $other_constituent_details=array(
											'worksheet_id' 	  => $constituentpull[$i],
											'constituent_id'    => $wid,
													);
	                            $this->MWorksheet->addOtherConstituent($other_constituent_details);
						 }
					}	
					 
			 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Basic Worksheet has been entered.');
	          redirect('worksheet/admin/edit/'.$wid,'refresh');
				 //
				 }
			
		   	 }
	      }
       }

	   
	   function goedit()
	     { 
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Worksheet Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Worksheet Manager";
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		    $data['segmenttype'] = $this->MWorksheet->getSegmentType();
			 
			 if(($this->input->post('segment_id'))&&($this->input->post('submaster_id'))&&($this->input->post('basicworksheet_id'))&&($this->input->post('constituentpull')))
			 {
			 $id = $_POST['constituentpull'];
			  $count = count($_POST['constituentpull']);
			    for($i=0; $i<$count; $i++)
				{
				  $sbid = $id[$i];
				 }
				redirect('worksheet/admin/edit/'.$sbid, 'refresh');
			 
			 }
			 if(($this->input->post('segment_id'))&&($this->input->post('submaster_id'))&&($this->input->post('basicworksheet_id')))
			 {
			 $id = $_POST['basicworksheet_id'];
			  $count = count($_POST['basicworksheet_id']);
			    for($i=0; $i<$count; $i++)
				{
				  $bid = $id[$i];
				 }
				redirect('worksheet/admin/edit/'.$bid, 'refresh');
			 
			 }
			 if(($this->input->post('segment_id'))&&($this->input->post('submaster_id')))
			 {
			 $id = $_POST['submaster_id'];
			  $count = count($_POST['submaster_id']);
			    for($i=0; $i<$count; $i++)
				{
				  $sid = $id[$i];
				 }
				redirect('worksheet/admin/edit/'.$sid, 'refresh');
			 
			 }
			 if($this->input->post('segment_id'))
			 {
			 $id = $_POST['segment_id'];
			  $count=count($_POST['segment_id']);
			  for($i=0; $i<$count; $i++)
			  {
			   $mid = $id[$i];
			  
			  }
			  redirect('worksheet/admin/edit/'.$mid, 'refresh');
			  }
			else{
			// This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_goedit";
                 $data['module'] = 'worksheet';
                 $this->load->view($this->_container,$data);
				 }
		 
	      }
		 
		function edit()
	      {
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "List";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'List';
		if ($this->input->post('worksheet_name')){
		        
			 if ($this->input->post('worksheet_name')){
	            
				if(($this->input->post('worksheet_type'))==2){
				$id = $this->uri->segment(4);
				$this->MWorksheet->updateWorksheetMaster($id);
		                   // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Master Worksheet has been Updated.');
	          redirect('worksheet/admin/edit/'.$id,'refresh');   
			
				 }
				 if(($this->input->post('worksheet_type'))==3){
				 $id = $this->uri->segment(4);
				 $this->MWorksheet->updateWorksheetSubMaster($id);
				 $wid = $this->uri->segment(4);
				 if($this->input->post('masterworksheet_id')){
				 // This enters the multiple constituents.
	             $masterworksheet=$_POST['masterworksheet_id'];
	                $count = count($_POST['masterworksheet_id']);
	                     for($i=0; $i<$count; $i++) {
	                            $masterworksheet_details=array(
											'submaster_id' => $wid,
											'master_id'    => $masterworksheet[$i],
													);
	                            $this->MWorksheet->addtoMasterworksheet($masterworksheet_details);
						 }
						 }
		             // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Sub-Worksheet has been entered.');
	           redirect('worksheet/admin/edit/'.$id,'refresh');   
			
				 }
				 
				 if(($this->input->post('worksheet_type'))==4){
				 $id = $this->uri->segment(4);
				 $this->MWorksheet->updateWorksheetBasic($id);
				 $wid = $this->uri->segment(4);
				 if($this->input->post('basicworksheet')){
				 // This enters the multiple constituents.
	             $basicworksheet=$_POST['basicworksheet'];
	                $count = count($_POST['basicworksheet']);
	                     for($i=0; $i<$count; $i++) {
	                            $basicworksheet_details=array(
											'worksheet_id' 	  => $wid,
											'submaster_id'    =>  $basicworksheet[$i],
													);
	                            $this->MWorksheet->addBasicWorksheet($basicworksheet_details);
						 }
						 }
		             // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Sub-Worksheet has been entered.');
	           redirect('worksheet/admin/edit/'.$id,'refresh');   
			
				 }
				
			
				if(($this->input->post('worksheet_type'))==5){
				 $id = $this->uri->segment(4);
	            $this->MWorksheet->updateWorksheetSubBasic($id);
		        $wid = $this->uri->segment(4);
				 if($this->input->post('subbasicworksheet')){
				  // This enters the multiple constituents.
	             $subbasicworksheet=$_POST['subbasicworksheet'];
	                $count = count($_POST['subbasicworksheet']);
	                     for($i=0; $i<$count; $i++) {
	                            $subbasicworksheet_details=array(
											'worksheet_id' 	  => $wid,
											'subbasic_id'    =>  $subbasicworksheet[$i],
													);
	                            $this->MWorksheet->addSubBasicWorksheet($subbasicworksheet_details);
						 }
				 //
				 }
				 if($this->input->post('constituent')){
				 // This enters the multiple constituents.
				 $wid = $this->uri->segment(4);
	             $constituent=$_POST['constituent'];
	                $count = count($_POST['constituent']);
	                     for($i=0; $i<$count; $i++) {
	                            $constituent_details=array(
											'worksheet_id' 	  => $wid,
											'constituent_id'    => $constituent[$i],
													);
	                            $this->MWorksheet->addConstituent($constituent_details);
						 }
				 //
				 }
				 if((($this->input->post('worksheet_type'))==5)&&($this->input->post('basicworksheet_id'))){
				 // This enters the multiple constituents.
				 $wid = $this->uri->segment(4);
	             $constituent=$_POST['basicworksheet_id'];
	                $count = count($_POST['basicworksheet_id']);
	                     for($i=0; $i<$count; $i++) {
	                            $constituent_details=array(
											'worksheet_id' 	  => $wid,
											'constituent_id'    => $constituent[$i],
													);
	                            $this->MWorksheet->addConstituent($constituent_details);
						 }
				 //
				 }
				 if($this->input->post('constituentpull')){
				// This enters the multiple constituents.
	             $constituentpull=$_POST['constituentpull'];
	                $count = count($_POST['constituentpull']);
	                     for($i=0; $i<$count; $i++) {
	                            $other_constituent_details=array(
											'worksheet_id' 	  => $constituentpull[$i],
											'constituent_id'    => $wid,
													);
	                            $this->MWorksheet->addOtherConstituent($other_constituent_details);
						 }
				 //

				}	
				 // This flags the messege about that a new pof has been created successfully.
	            flashMsg('success','Basic Worksheet has been entered.');
	           redirect('worksheet/admin/edit/'.$id,'refresh');   
			  	 }
	       }
	   }else{
		$id = $this->uri->segment(4);
		$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		$data['segmenttype'] = $this->MWorksheet->getSegmentType();
		$data['worksheetdetails'] = $this->MWorksheet->getSingleWorksheetDetails($id);
		$data['masterworkdetails'] = $this->MWorksheet->getMasterWorksheetDetails($id);
		$data['submasterworkdetails'] = $this->MWorksheet->getSubMasterWorksheetDetails($id);
		$data['basicworkdetails'] = $this->MWorksheet->getBasicWorksheetDetails($id);
		$data['subbasicworkdetails'] = $this->MWorksheet->getSubBasicWorksheetDetails($id);
		$data['sentbasicworkdetails'] = $this->MWorksheet->getSBasicWorksheetDetails($id);
		$data['pullbasicworkdetails'] = $this->MWorksheet->getpBasicWorksheetDetails($id);
		
		if ($data['worksheetdetails']['worksheet_type'] ==5)
		 {
	       $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_editsubbasic";
		}
		 if ($data['worksheetdetails']['worksheet_type'] ==4)
		 {
		  $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_editbasic";
		}
		 if ($data['worksheetdetails']['worksheet_type'] ==3)
		 {
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_editsubmaster";
		}
		if ($data['worksheetdetails']['worksheet_type'] ==2)
		 {
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_edit";
		}
	    $data['module'] = 'worksheet';
	    $this->load->view($this->_container,$data);			
    	}
		}
	//This deletes the master worksheet.
	function deletepartmaster($id){
	    $wid = $this->uri->segment(5);
		$this->MWorksheet->deletepartmaster($id);
		$this->session->set_flashdata('message','Worksheet deleted');
		redirect('worksheet/admin/edit/'.$wid,'refresh');
		}
	//This deletes the part of master worksheet.
	function deletepartsub($id){
	    $wid = $this->uri->segment(5);
		$this->MWorksheet->deletepartsub($id);
		$this->session->set_flashdata('message','Worksheet deleted');
		redirect('worksheet/admin/edit/'.$wid,'refresh');
		}
	//This deletes the part of master worksheet.
	function deletepartbasic($id){
	    $wid = $this->uri->segment(5);
		$this->MWorksheet->deletepartbasic($id);
		$this->session->set_flashdata('message','Worksheet deleted');
		redirect('worksheet/admin/edit/'.$wid,'refresh');
		}
	
	//This deletes the worksheet where basic worksheet had been sent.
	function deletesent($id){
	     $wid = $this->uri->segment(5);
		$this->MWorksheet->deletesent($id);
		$this->session->set_flashdata('message','Worksheet deleted');
		redirect('worksheet/admin/edit/'.$wid,'refresh');
		}
	// This deletes the worksheet where basic worksheet is pulled form.
	function deletepull($id){
	     $wid = $this->uri->segment(5);
		$this->MWorksheet->deletepull($id);
		$this->session->set_flashdata('message','Worksheet deleted');
		redirect('worksheet/admin/edit/'.$wid,'refresh');
	}
 
 function godeletework()
	     { 
		    // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Worksheet Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Worksheet Manager";
			$data['masterworksheet'] = $this->MWorksheet->getListMasterWorksheet();
		    $data['segmenttype'] = $this->MWorksheet->getSegmentType();
			 
			 if(($this->input->post('segment_id'))&&($this->input->post('submaster_id'))&&($this->input->post('basicworksheet_id'))&&($this->input->     post('constituentpull')))
			 {
			 $id = $_POST['constituentpull'];
			 $count = count($_POST['constituentpull']);
			    for($i=0; $i<$count; $i++)
				{
				  $sbid = $id[$i];
				 }
			 $cand = $this->MWorksheet->getCand($sbid);
			   if($cand['constituent_id']==NULL)
			     {
				 $this->MWorksheet->removeWork1($sbid);
				 $this->MWorksheet->removeWork2($sbid);
				 $this->MWorksheet->removeWork3($sbid);
				  $this->MWorksheet->removeWork4($sbid);
			   flashMsg('success','Worksheet has been removed.');
				redirect('worksheet/admin/godeletework/', 'refresh');
				}
				else{
				 flashMsg('error','Worksheet can not be removed because it has some candidates.');
				 redirect('worksheet/admin/godeletework/', 'refresh');
				
				}
			 
			 }
			 
			 if(($this->input->post('segment_id'))&&($this->input->post('submaster_id'))&&($this->input->post('basicworksheet_id')))
			 {
			 $id = $_POST['basicworksheet_id'];
			  $count = count($_POST['basicworksheet_id']);
			    for($i=0; $i<$count; $i++)
				{
				  $bid = $id[$i];
				 }
				redirect('worksheet/admin/edit/'.$bid, 'refresh');
			 
			 }
			 if(($this->input->post('segment_id'))&&($this->input->post('submaster_id')))
			 {
			 $id = $_POST['submaster_id'];
			  $count = count($_POST['submaster_id']);
			    for($i=0; $i<$count; $i++)
				{
				  $sid = $id[$i];
				 }
				redirect('worksheet/admin/edit/'.$sid, 'refresh');
			 
			 }
			 if($this->input->post('segment_id'))
			 {
			 $id = $_POST['segment_id'];
			  $count=count($_POST['segment_id']);
			  for($i=0; $i<$count; $i++)
			  {
			   $mid = $id[$i];
			  
			  }
			  redirect('worksheet/admin/edit/'.$mid, 'refresh');
			  }
			else{
			// This is how Mirus-HRMS loads views
                 $data['page'] = $this->config->item('backendpro_template_admin') . "admin_worksheet_godelete";
                 $data['module'] = 'worksheet';
                 $this->load->view($this->_container,$data);
				 }
		 
	      }
	
}
?>