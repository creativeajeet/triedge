<?php
class Admin extends Admin_Controller {

function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('Segment');
			// Load models and language
			$this->load->module_model('auth','User_model');
			$this->load->model('MSegment');
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
		$data['title'] = "Segment";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Segment';
		$data['segmenttype'] = $this->MSegment->getSegmentType();
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_segment_create";
	    $data['module'] = 'segment';
	    $this->load->view($this->_container,$data);			
	}
	 function select_segment(){
            if('IS_AJAX') {
        	$data['option_segment'] = $this->MSegment->getSegment();		
		$this->load->view('admin/segment',$data);
            }
		
	}
	
	 function parentname(){
            if('IS_AJAX') {
        	$data['option_segment'] = $this->MSegment->getParentName();		
		$this->load->view('admin/parentname',$data);
            }
		
	}
	
	function currentchild(){
            if('IS_AJAX') {
			$data['option_segment'] = $this->MSegment->getChildName();		
		    $this->load->view('admin/currentchild',$data);
            }
		
	}
	
	function getsubindustry(){
            if('IS_AJAX') {
        	$data['option_subindustry'] = $this->MSegment->getSubIndus();		
		$this->load->view('admin/subindustry',$data);
            }
		
	} 
	function select_otherconstituent(){
            if('IS_AJAX') {
        	$data['option_constituent_other'] = $this->MSegment->getConstituentOther();		
		$this->load->view('admin/otherconstituent',$data);
            }
		
	}

	  // This enters a new worksheet
      function addSegment()
	  {
	        // This shows the module name user is accessing, as a title in the browser. 
            $data['title'] = "Segment Manager";
			// This shows the module name you are accessing, as a header(tab name) in the browser. 
            $data['header'] = "Segment Manager";
       
       
				 if($this->input->post('segment_type_name')){
				
	                            $this->MSegment->addSegmentType();
								 flashMsg('success','Segment Type has been entered.');
	                   redirect('segment/admin/','refresh');
						 }
				
				 if($this->input->post('segment')){
				// This enters the multiple constituents.
				 $segment_name=$_POST['segment'];
	             $segment_type=$_POST['segment_type'];
	                $count = count($_POST['segment_type']);
	                     for($i=0; $i<$count; $i++) {
	                            $segment_details=array(
											'segment_type_id' 	  => $segment_type[$i],
											'segment_name'    => $segment_name,
													);
	                            $this->MSegment->addSegment($segment_details);
						 }
			   flashMsg('success','Segment Name has been entered.');
	           redirect('segment/admin/','refresh');
       
	        }
			
			if(($this->input->post('childname')) && ($this->input->post('addchild'))){
				// This enters the multiple constituents.
				 $childname=$_POST['childname'];
	             $parentid=$_POST['parentid'];
	                $count = count($_POST['parentid']);
	                     for($i=0; $i<$count; $i++) {
	                            $child_details=array(
											'parent_id' 	  => $parentid[$i],
											'child_name'    => $childname,
													);
	                            $this->MSegment->addChild($child_details);
						 }
			   flashMsg('success','Segment Name has been entered.');
	           redirect('segment/admin/','refresh');
       
	        }
		
       }
	   
	    //////////////////////////////////////////////////////////////////////
	   function tagmanager()
    	{
	    // This shows the module name user is accessing, as a tiltle in the browser. 
		$data['title'] = "Tag Manager";
		// This shows the module name you are accessing, as a header(tab name) in the browser. 
        $data['header'] = 'Tag Manager';
		$data['segmenttype'] = $this->MSegment->getTagType();
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_segment_tagmanager";
	    $data['module'] = 'segment';
	    $this->load->view($this->_container,$data);			
	 }
	 
	 function createtag()
	    {
		  if($this->input->post('createtagtype'))
		    {
			  $this->MSegment->addTagType();
			
			  
			   flashMsg('success','New Tag Type has been created successfully.');
	          redirect('segment/admin/tagmanager','refresh');

			}
		 if($this->input->post('createnewtag'))
		    {
			 $tagtype = $_POST['tag_type'];
			 $tagname = $_POST['newtag'];
			 $count = count($tagtype);
			   for($i=0; $i<$count; $i++)
			     {
				  $tagdata = array(
				   'tag_type_id' => $tagtype[$i],
				   'tag_name' => $tagname,
				  );
				  $this->MSegment->addNewTag($tagdata);
				 }
			  
			   flashMsg('success','New Tag has been created successfully.');
	          redirect('segment/admin/tagmanager','refresh');

			}
		}  
	 
	 function select_tag(){
            if('IS_AJAX') {
        	$data['option_tags'] = $this->MSegment->getTags();		
		$this->load->view('admin/tags',$data);
            }
		
	}
  

	
}
?>