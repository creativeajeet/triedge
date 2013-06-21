<?php
class Admin extends Admin_Controller {

function Admin(){
   	parent::Admin_Controller();
		   // Check for access permission
			check('List Manager');
			// Load models and language
			$this->load->module_model('auth','User_model');
		
			$this->load->model('MDup');
			$this->load->language('customer');
			$this->load->module_model('messege','MMessege');
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
		$username = $this->session->userdata('id');
		
		
		$this->load->library('pagination');
	    $this->session->unset_userdata('searchterm');
        $config['base_url'] = base_url() . 'index.php/candidates/admin/dup/';
		$config['total_rows'] = $this->MDup->record_count_dup();
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
		$data['results'] = $this->MDup->fetch_candidates_dup($limit);
		$data['links'] = $this->pagination->create_links();
		// Set breadcrumb(navigation). This tells where you are.
	        $this->bep_site->set_crumb('Candidate List','candidates/admin/poflist');
		   $data['page'] = $this->config->item('backendpro_template_admin') . "search_result_duplicate";
	       $data['module'] = 'dup';
	       $this->load->view($this->_container,$data);	 
	   }
	   
	   //duplication Remover
	   //duplication remover
		function dupRemover()
		  {
		   $pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		      if($this->input->post('save'))
			 {
			   if($this->input->post('cup_id'))
			    {
				  $user = $this->session->userdata('username');
				  $cupid = $_POST['cup_id'];
				 $candidate_nameu = $this->input->post('candidate_name');
			$telephoneu = $_POST['telephone'];
			$emailu = $this->input->post('email');
			$current_locationu = $this->input->post('current_location');
			$regionu = $this->input->post('region');
			$current_companyu = $this->input->post('current_company');
			$job_titleu = $this->input->post('job_title');
			$departmentu = $this->input->post('department');
			$designationu = $this->input->post('designation');
			$gradeu = $this->input->post('grade');
			$levelu = $this->input->post('level');
			$salaryu = $this->input->post('salary');
	 		$in_current_company_sinceu = $this->input->post('in_current_company_since');
			$reports_tou = $this->input->post('reports_to');
			$current_roleu = $this->input->post('current_role')."- By- ".$user."-".date('Y-m-d H:i:s');
			$previous_companyu = $this->input->post('previous_company');
			$courseu = $this->input->post('course');
			$instituteu = $this->input->post('institute');
			$year_of_passingu = $this->input->post('year_of_passing');
			$year_of_birthu = $this->input->post('year_of_birth');
			$profile_briefu = $this->input->post('profile_brief');
			$commentu = $this->input->post('comment');
			$industryu = $this->input->post('industry');
			$subindustryu = $this->input->post('sub_industry');
			$indfunctionu = $this->input->post('indfunction');
			$subfunctionu = $this->input->post('sub_function');
				  $countu = count($_POST['cup_id']);
				    for($j=0; $j<$countu; $j++)
					{
					 $id = $cupid[$j];
					 $data = array( 
		    'id' => $id,
			
			'telephone' => $telephoneu[$j],
			'email' => $emailu[$j],
			'current_location' => $current_locationu[$j],
			'region' => $regionu[$j],
			'current_company' => $current_companyu[$j],
			'job_title' => $job_titleu[$j],
			'department' => $departmentu[$j],
			'designation' => $designationu[$j],
			'grade' => $gradeu[$j],
			'level' => $levelu[$j],
			'salary' => $salaryu[$j],
	 		'in_current_company_since' => $in_current_company_sinceu[$j],
			'reports_to' => $reports_tou[$j],
			'current_role' => $current_roleu[$j],
			'previous_company' => $previous_companyu[$j],
			'course' => $courseu[$j],
			'institute' => $instituteu[$j],
			'year_of_passing' => $year_of_passingu[$j],
			'year_of_birth' => $year_of_birthu[$j],
			'profile_brief' => $profile_briefu[$j],
			'industry' => $industryu[$j],
			'sub_industry' => $subindustryu[$j],
			'indfunction' => $indfunctionu[$j],
			'sub_function' => $subfunctionu[$j],
			'comment' => $commentu[$j],
			'last_updated' => date('Y-m-d H:i:s'),
			'last_updated_by' => $user,
			);
				$this->MCandidate->upCandidate($id,$data); 
				 
					}
							
					
				}
			   if($this->input->post('cdel_id'))
			   {
			     $cdelid=$_POST['cdel_id'];
			     $count = count($_POST['cdel_id']);
				  for($i=0; $i<$count; $i++)
				   {
				    $candidateid = $cdelid[$i];
	                $this->MCandidate->delCandDB($candidateid);
				   }
			   }
			 
				// This flags the messege about that a new company has been created successfully.		
	                   flashMsg('success','Database has been updated successfully.');
					   redirect('candidates/admin/dupManager/'.$pageno,'refresh');
			 }
		 }
	
}
?>