<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MDash extends Model{

	function MDash(){
		parent::Model();
		$this->_TABLES = array( 'candidates' => 'candidates'
                                    );
	}
// gets no. of candidates added today
    function countTodayAdded($user,$today)
	  {
	   $sql="SELECT COUNT(entered_by) As cnt FROM candidates WHERE last_updated ='".$today."' OR entered_by ='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited today
    function countTodayEdited($user,$today)
	  {
	   $sql="SELECT COUNT(DISTINCT last_updated_by) As cnt FROM candidates WHERE last_updated ='".$today."' OR last_updated_by ='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
	
	// gets no. of candidates deleted today
    function countTodayDeleted($user,$today)
	  {
	   $sql="SELECT COUNT(DISTINCT deleted_by) As cnt FROM candidates WHERE last_updated ='".$today."' OR deleted_by ='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets users.
    function getUser()
	  {
	   $data =array();
	   $this->db->from('be_users');
	  
	   $Q = $this->db->get();
	   if($Q->num_rows() > 0)
	    {
	    foreach($Q->result() as $row) 
		 {
		  $data[] = $row;
		 }
		 return $data;
		 }
	  }
// gets no of addition, edition ,deletion done by consultant
   function getByConsultant($today)
   
	   {
    $sql = "SELECT *,COUNT(entered_by)FROM candidates RIGHT JOIN be_users ON be_users.username=candidates.entered_by WHERE entered_by=be_users.username GROUP BY candidates.entered_by;";
	$Q = $this->db->query($sql);
	if($Q->num_rows() > 0){
	foreach($Q->result_array() as $row)
	{
	 $data[] = $row;
	}
	}
	 $Q->free_result();  
	    return $data; 
   }
  //
// gets list of candidates added today
    function getTodayAdded($today)
	  {
	   $data =array();
	   $this->db->from('candidates');
	   $this->db->where('last_updated',$today);
	   $this->db->group_by('entered_by');
	   $Q = $this->db->get();
	   if($Q->num_rows() > 0)
	    {
	    foreach($Q->result() as $row) 
		 {
		  $data = $row;
		 }
		 return $data;
		 }
	  }
  //
	// gets no. of candidates added between date range
    function countAdded($from,$to)
	  {
	   $sql="SELECT COUNT(DISTINCT entered_by) As cnt FROM candidates WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited between date range
    function countEdited($from,$to)
	  {
	   $sql="SELECT COUNT(DISTINCT last_updated_by) As cnt FROM candidates WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
	
	// gets no. of candidates deleted between date range
    function countDeleted($from,$to)
	  {
	   $sql="SELECT COUNT(DISTINCT deleted_by) As cnt FROM candidates WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
// 
	// gets no. of candidates added by user between date range
    function countAddedbySingleUser($from,$to,$user)
	  {
	   $sql="SELECT COUNT(entered_by) As cnt FROM (SELECT * FROM candidates WHERE entered_by ='".$user."') As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited by user between date range
    function countEditedbySingleUser($from,$to,$user)
	  {
	   $sql="SELECT COUNT(last_updated_by) As cnt FROM (SELECT * FROM candidates WHERE last_updated_by ='".$user."') As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
	
	// gets no. of candidates deleted by user between date range
    function countDeletedbySingleUser($from,$to,$user)
	  {
	   $sql="SELECT COUNT(deleted_by) As cnt FROM (SELECT * FROM candidates WHERE deleted_by ='".$user."') As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
// 
// gets list of candidates entered by a user
    function getAddedByUser($from,$to,$user)
	  {
	   $sql ="SELECT * FROM (SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE candidates.entered_by ='".$user."') As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
  //
  
  // gets list of candidates edited by a user
    function getEditedByUser($from,$to,$user)
	  {
	   $sql ="SELECT * FROM (SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE candidates.last_updated_by ='".$user."') As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
  //
  
   // gets list of candidates deleted by a user
    function getDeletedByUser($from,$to,$user)
	  {
	   $sql ="SELECT * FROM (SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE candidates.deleted_by ='".$user."') As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
  //
  
   // gets list of candidates actioned by a user
    function getTotalByUser($from,$to,$user)
	  {
	   $sql ="SELECT * FROM (SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE candidates.entered_by ='".$user."' OR candidates.last_updated_by ='".$user."' OR candidates.deleted_by ='".$user."' ) As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
  //
	 function import($sql){
  $this->load->database();
  $this->db->query($sql);
  }  
 
	 function importfiles($sql){
  $this->load->database();
  $this->db->query($sql);
  }   
  
  function do_upload($cand_details) {
		
	if ($this->db->insert('files',$cand_details))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
    
	}
	
  function save(){
 $data = array( 
		    'candidate_name' => $this->input->post('candidate_name'),
			'telephone' => $this->input->post('telephone'),
			'email' => $this->input->post('email'),
			'current_location' => $this->input->post('current_location'),
			'region' => $this->input->post('region'),
			'current_company' => $this->input->post('current_company'),
			'job_title' => $this->input->post('job_title'),
			'department' => $this->input->post('department'),
			'designation' => $this->input->post('designation'),
			'grade' => $this->input->post('grade'),
			'level' => $this->input->post('level'),
			'salary' => $this->input->post('salary'),
	 		'in_current_company_since' => $this->input->post('in_current_company_since'),
			'reports_to' => $this->input->post('reports_to'),
			'current_role' => $this->input->post('current_role'),
			'previous_company' => $this->input->post('previous_company'),
			'course' => $this->input->post('course'),
			'institute' => $this->input->post('institute'),
			'year_of_passing' => $this->input->post('year_of_passing'),
			'year_of_birth' => $this->input->post('year_of_birth'),
			'profile_brief' => $this->input->post('profile_brief'),
			'comment' => $this->input->post('comment'),
			'entered_by' => $this->input->post('entered_by'),
			'last_updated' => date('Y-m-d H:i:s'),
	 		
	 	);
    if($this->db->insert('candidates',$data))
	{
	 return $this->db->insert_id();
	}
	else{
	 return FALSE;
	}
  }

  function update(){
    $id   = $this->input->post('id');
    $entered_by = $this->input->post('entered_by');
    $candidate_name = $this->input->post('candidate_name');
    $current_location = $this->input->post('current_location');
	$year_of_birth = $this->input->post('year_of_birth');
    $email = $this->input->post('email');
    $telephone = $this->input->post('telephone');
	$region = $this->input->post('region');
    $current_company = $this->input->post('current_company');
    $job_title = $this->input->post('job_title');
	$in_current_company_since = $this->input->post('in_current_company_since');
    $department = $this->input->post('department');
    $reports_to = $this->input->post('reports_to');
	$designation = $this->input->post('designation');
    $grade = $this->input->post('grade');
    $level = $this->input->post('level');
	$previous_company = $this->input->post('previous_company');
    $salary = $this->input->post('salary');
    $course = $this->input->post('course');
	$institute = $this->input->post('institute');
    $year_of_passing = $this->input->post('year_of_passing');
    $industry = $this->input->post('industry');
	$sub_industry = $this->input->post('sub_industry');
    $indfunction = $this->input->post('indfunction');
    $sub_function = $this->input->post('sub_function');
	$worksheet1 = $this->input->post('worksheet1');
    $worksheet2 = $this->input->post('worksheet2');
    $current_role = $this->input->post('current_role');
	$profile_brief = $this->input->post('profile_brief');
    $comment = $this->input->post('comment');
     $data = array(
      'entered_by'=>$entered_by,
      'candidate_name'=>$candidate_name,
	   'current_location'=>$current_location,
      'year_of_birth'=>$year_of_birth,
	   'email'=>$email,
      'telephone'=>$telephone,
	   'region'=>$region,
      'current_company'=>$current_company,
	   'job_title'=>$job_title,
      'in_current_company_since'=>$in_current_company_since,
	   'department'=>$department,
      'reports_to'=>$reports_to,
	   'designation'=>$designation,
      'grade'=>$grade,
	   'level'=>$level,
      'previous_company'=>$previous_company,
	   'salary'=>$salary,
      'course'=>$course,
	   'institute'=>$institute,
      'year_of_passing'=>$year_of_passing,
	   'industry'=>$industry,
      'sub_industry'=>$sub_industry,
	   'indfunction'=>$indfunction,
      'sub_function'=>$sub_function,
	   'worksheet1'=>$worksheet1,
      'worksheet2'=>$worksheet2,
	   'current_role'=>$current_role,
      'profile_brief'=>$profile_brief,
	   'comment'=>$comment
     
    );
    $this->db->where('id',$id);
    $this->db->update('candidates',$data);
  }
	 function getConsulName(){
		$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where('group',3);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->username;
        }
        
        return $result;
	}	
		
	function record_count()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	function fetch_candidates($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->where('candidates.is_to_Delete',0);
		$this->db->order_by('candidate_name');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_candidates_lastupdated($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->order_by('last_updated', 'DESC');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_candidates_bycolumn($limit,$start,$column,$order)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->order_by($column, $order);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	function fetch_files()
	{
		
		$this->db->from('files');
		
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	function record_count_refered($username)
	{
		$sql = "SELECT COUNT(*) As cnt FROM addtorefer WHERE userid =".$username;
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
		       
	}
	function fetch_reference($limit,$start,$username)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'candidates.id=files.cand', 'left');
		$this->db->join('addtorefer', 'candidates.id=addtorefer.c_id', 'left');
		$this->db->where('addtorefer.userid', $username);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	function search_record_count_simple($heading,$keyword)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE ". $heading." LIKE '%" . $keyword . "%'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search_simple($heading,$keyword,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand 
				WHERE ". $heading." LIKE '%" . $keyword . "%' LIMIT " .$limit . ",20 ";
		$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	function search_record_count_all($keyword)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE worksheet1 LIKE '%" . $keyword . "%' OR worksheet2 LIKE '%" . $keyword . "%' OR status LIKE '%" . $keyword . "%' OR candidate_name LIKE '%" . $keyword . "%' OR telephone LIKE '%" . $keyword . "%' OR email LIKE '%" . $keyword . "%' OR current_location LIKE '%" . $keyword . "%' OR region LIKE '%" . $keyword . "%' OR current_company LIKE '%" . $keyword . "%' OR job_title LIKE '%" . $keyword . "%' OR department LIKE '%" . $keyword . "%' OR designation LIKE '%" . $keyword . "%' OR grade LIKE '%" . $keyword . "%' OR level LIKE '%" . $keyword . "%' OR salary LIKE '%" . $keyword . "%' OR in_current_company_since LIKE '%" . $keyword . "%' OR reports_to LIKE '%" . $keyword . "%' OR current_role LIKE '%" . $keyword . "%' OR industry LIKE '%" . $keyword . "%' OR sub_industry LIKE '%" . $keyword . "%' OR indfunction LIKE '%" . $keyword . "%' OR sub_function LIKE '%" . $keyword . "%' OR previous_company LIKE '%" . $keyword . "%' OR course LIKE '%" . $keyword . "%' OR institute LIKE '%" . $keyword . "%' OR year_of_passing LIKE '%" . $keyword . "%' OR year_of_birth LIKE '%" . $keyword . "%' OR profile_brief LIKE '%" . $keyword . "%' OR comment LIKE '%" . $keyword . "%' OR entered_by LIKE '%" . $keyword . "%'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search_all($keyword,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand 
				WHERE worksheet1 LIKE '%" . $keyword . "%' OR worksheet2 LIKE '%" . $keyword . "%' OR status LIKE '%" . $keyword . "%' OR candidate_name LIKE '%" . $keyword . "%' OR telephone LIKE '%" . $keyword . "%' OR email LIKE '%" . $keyword . "%' OR current_location LIKE '%" . $keyword . "%' OR region LIKE '%" . $keyword . "%' OR current_company LIKE '%" . $keyword . "%' OR job_title LIKE '%" . $keyword . "%' OR department LIKE '%" . $keyword . "%' OR designation LIKE '%" . $keyword . "%' OR grade LIKE '%" . $keyword . "%' OR level LIKE '%" . $keyword . "%' OR salary LIKE '%" . $keyword . "%' OR in_current_company_since LIKE '%" . $keyword . "%' OR reports_to LIKE '%" . $keyword . "%' OR current_role LIKE '%" . $keyword . "%' OR industry LIKE '%" . $keyword . "%' OR sub_industry LIKE '%" . $keyword . "%' OR indfunction LIKE '%" . $keyword . "%' OR sub_function LIKE '%" . $keyword . "%' OR previous_company LIKE '%" . $keyword . "%' OR course LIKE '%" . $keyword . "%' OR institute LIKE '%" . $keyword . "%' OR year_of_passing LIKE '%" . $keyword . "%' OR year_of_birth LIKE '%" . $keyword . "%' OR profile_brief LIKE '%" . $keyword . "%' OR comment LIKE '%" . $keyword . "%' OR entered_by LIKE '%" . $keyword . "%' ORDER BY candidate_name LIMIT " .$limit . ",20 ";
		$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	function searchterm_handler_simple($keyword)
	{
		if($keyword)
		{
			$this->session->set_userdata('keyword', $keyword);
			return $keyword;
		}
		elseif($this->session->userdata('keyword'))
		{
			$keyword = $this->session->userdata('keyword');
			return $keyword;
		}
		else
		{
			$keyword ="";
			return $keyword;
		}
	}
	function searchterm_handler_all($keyword)
	{
		if($keyword)
		{
			$this->session->set_userdata('keyword', $keyword);
			return $keyword;
		}
		elseif($this->session->userdata('keyword'))
		{
			$keyword = $this->session->userdata('keyword');
			return $keyword;
		}
		else
		{
			$keyword ="";
			return $keyword;
		}
	}
	function searchterm_handler_simple_heading($heading)
	{
		if($heading)
		{
			$this->session->set_userdata('heading', $heading);
			return $heading;
		}
		elseif($this->session->userdata('heading'))
		{
			$heading = $this->session->userdata('heading');
			return $heading;
		}
		else
		{
			$heading ="";
			return $heading;
		}
	}
	function search_record_count_folder($folder_name,$username)
	{
		$sql = "SELECT COUNT(*) As cnt FROM addtofolder WHERE p_id LIKE '%" . $folder_name . "%' AND user = ".$username." ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_folder($folder_name,$username,$limit)
	{
		$sql = "SELECT * FROM addtofolder RIGHT JOIN candidates ON addtofolder.c_id=candidates.id LEFT JOIN files ON candidates.id=files.cand  
				WHERE p_id LIKE '%" . $folder_name . "%' AND user = ".$username." LIMIT " .$limit . ",20 ";
		$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	function searchterm_handler_simple_folder_name($folder_name)
	{
		if($folder_name)
		{
			$this->session->set_userdata('folder_name', $folder_name);
			return $folder_name;
		}
		elseif($this->session->userdata('folder_name'))
		{
			$folder_name = $this->session->userdata('folder_name');
			return $folder_name;
		}
		else
		{
			$folder_name ="";
			return $folder_name;
		}
	}
	function search_record_count_worksheet($masterworksheet,$basicworksheet)
	{
		$sql = "SELECT COUNT(*) As cnt FROM addtoworksheet1 WHERE addtoworksheet1.master_worksheet_id=" . $masterworksheet . " AND addtoworksheet1.constituent_id = ".$basicworksheet." ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_worksheet($masterworksheet,$basicworksheet,$limit)
	{
		$sql = "SELECT * FROM addtoworksheet1 RIGHT JOIN candidates ON addtoworksheet1.c_id=candidates.id LEFT JOIN files ON candidates.id=files.cand
				WHERE addtoworksheet1.master_worksheet_id=" . $masterworksheet . " AND addtoworksheet1.constituent_id = ".$basicworksheet." LIMIT " .$limit . ",20 ";
		$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	function searchterm_handler_simple_masterworksheet($masterworksheet)
	{
		if($masterworksheet)
		{
			$this->session->set_userdata('master_worksheet', $masterworksheet);
			return $masterworksheet;
		}
		elseif($this->session->userdata('master_worksheet'))
		{
			$masterworksheet = $this->session->userdata('master_worksheet');
			return $masterworksheet;
		}
		else
		{
			$masterworksheet ="";
			return $masterworksheet;
		}
	}
	function searchterm_handler_simple_basicworksheet($basicworksheet)
	{
		if($basicworksheet)
		{
			$this->session->set_userdata('constituent', $basicworksheet);
			return $basicworksheet;
		}
		elseif($this->session->userdata('constituent'))
		{
			$basicworksheet = $this->session->userdata('constituent');
			return $basicworksheet;
		}
		else
		{
			$basicworksheet ="";
			return $basicworksheet;
		}
	}
	
	function search_record_count($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$designation,$grade,$level,$course,$institute,$passingyear)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE candidate_name LIKE '%" . $candidatename . "%' AND current_location LIKE '%".$currentloc."%' AND region LIKE '%".$region."%' AND current_company LIKE '%".$currentcomp."%' AND industry LIKE '%".$industry."%' AND sub_industry LIKE '%".$subindustry."%' AND indfunction LIKE '%".$indfunction."%' AND sub_function LIKE '%".$subfunction."%' AND department LIKE '%".$department."%' AND job_title LIKE '%".$jobtitle."%' AND designation LIKE '%".$designation."%' AND grade LIKE '%".$grade."%' AND level LIKE '%".$level."%' AND course LIKE '%".$course."%' AND institute LIKE '%".$institute."%' AND year_of_passing LIKE '%".$passingyear."%'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$designation,$grade,$level,$course,$institute,$passingyear,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand
				WHERE candidate_name LIKE '%" . $candidatename . "%' AND current_location LIKE '%".$currentloc."%' AND region LIKE '%".$region."%' AND current_company LIKE '%".$currentcomp."%' AND industry LIKE '%".$industry."%' AND sub_industry LIKE '%".$subindustry."%' AND indfunction LIKE '%".$indfunction."%' AND sub_function LIKE '%".$subfunction."%' AND department LIKE '%".$department."%' AND job_title LIKE '%".$jobtitle."%' AND designation LIKE '%".$designation."%' AND grade LIKE '%".$grade."%' AND level LIKE '%".$level."%' AND course LIKE '%".$course."%' AND institute LIKE '%".$institute."%' AND year_of_passing LIKE '%".$passingyear."%' ORDER BY candidate_name LIMIT " .$limit . ",20 ";
		$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
  function searchterm_handler_simple_candname($candidatename)
	{
		if($candidatename)
		{
			$this->session->set_userdata('candidatename', $candidatename);
			return $candidatename;
		}
		elseif($this->session->userdata('candidatename'))
		{
			$candidatename = $this->session->userdata('candidatename');
			return $candidatename;
		}
		else
		{
			$candidatename ="";
			return $candidatename;
		}
	}
  function searchterm_handler_curloc($currentloc)
	{
		if($currentloc)
		{
			$this->session->set_userdata('currentlocation', $currentloc);
			return $currentloc;
		}
		elseif($this->session->userdata('currentlocation'))
		{
			$currentloc = $this->session->userdata('currentlocation');
			return $currentloc;
		}
		else
		{
			$currentloc ="";
			return $currentloc;
		}
	}
	
   function searchterm_handler_region($region)
	{
		if($region)
		{
			$this->session->set_userdata('region', $region);
			return $region;
		}
		elseif($this->session->userdata('region'))
		{
			$region = $this->session->userdata('region');
			return $region;
		}
		else
		{
			$region ="";
			return $region;
		}
	}
	
  function searchterm_handler_curcomp($currentcomp)
	{
		if($currentcomp)
		{
			$this->session->set_userdata('currentcomp', $currentcomp);
			return $currentcomp;
		}
		elseif($this->session->userdata('currentcomp'))
		{
			$currentcomp = $this->session->userdata('currentcomp');
			return $currentcomp;
		}
		else
		{
			$currentcomp ="";
			return $currentcomp;
		}
	}
  function searchterm_handler_ind($industry)
	{
		if($industry)
		{
			$this->session->set_userdata('industry', $industry);
			return $industry;
		}
		elseif($this->session->userdata('industry'))
		{
			$industry = $this->session->userdata('industry');
			return $industry;
		}
		else
		{
			$industry ="";
			return $industry;
		}
	}
  function searchterm_handler_subind($subindustry)
	{
		if($subindustry)
		{
			$this->session->set_userdata('subindustry', $subindustry);
			return $subindustry;
		}
		elseif($this->session->userdata('subindustry'))
		{
			$subindustry = $this->session->userdata('subindustry');
			return $subindustry;
		}
		else
		{
			$subindustry ="";
			return $subindustry;
		}
	}
	
  function searchterm_handler_indfunc($indfunction)
	{
		if($indfunction)
		{
			$this->session->set_userdata('indfunction', $indfunction);
			return $indfunction;
		}
		elseif($this->session->userdata('indfunction'))
		{
			$indfunction = $this->session->userdata('indfunction');
			return $indfunction;
		}
		else
		{
			$indfunction ="";
			return $indfunction;
		}
	} 
	
  function searchterm_handler_subfunc($subfunction)
	{
		if($subfunction)
		{
			$this->session->set_userdata('subfunction', $subfunction);
			return $subfunction;
		}
		elseif($this->session->userdata('subfunction'))
		{
			$subfunction = $this->session->userdata('subfunction');
			return $subfunction;
		}
		else
		{
			$subfunction ="";
			return $subfunction;
		}
	}
  function searchterm_handler_department($department)
	{
		if($department)
		{
			$this->session->set_userdata('department', $department);
			return $department;
		}
		elseif($this->session->userdata('department'))
		{
			$department = $this->session->userdata('department');
			return $department;
		}
		else
		{
			$department ="";
			return $department;
		}
	}

  function searchterm_handler_jobtitle($jobtitle)
	{
		if($jobtitle)
		{
			$this->session->set_userdata('jobtitle', $jobtitle);
			return $jobtitle;
		}
		elseif($this->session->userdata('jobtitle'))
		{
			$jobtitle = $this->session->userdata('jobtitle');
			return $jobtitle;
		}
		else
		{
			$jobtitle ="";
			return $jobtitle;
		}
	}

  function searchterm_handler_designation($designation)
	{
		if($designation)
		{
			$this->session->set_userdata('designation', $designation);
			return $designation;
		}
		elseif($this->session->userdata('designation'))
		{
			$designation = $this->session->userdata('designation');
			return $designation;
		}
		else
		{
			$designation ="";
			return $designation;
		}
	}

  function searchterm_handler_grade($grade)
	{
		if($grade)
		{
			$this->session->set_userdata('grade', $grade);
			return $grade;
		}
		elseif($this->session->userdata('grade'))
		{
			$grade = $this->session->userdata('grade');
			return $grade;
		}
		else
		{
			$grade ="";
			return $grade;
		}
	}

  function searchterm_handler_level($level)
	{
		if($level)
		{
			$this->session->set_userdata('level', $level);
			return $level;
		}
		elseif($this->session->userdata('level'))
		{
			$level = $this->session->userdata('level');
			return $level;
		}
		else
		{
			$level ="";
			return $level;
		}
	}

  function searchterm_handler_course($course)
	{
		if($course)
		{
			$this->session->set_userdata('course', $course);
			return $course;
		}
		elseif($this->session->userdata('course'))
		{
			$course = $this->session->userdata('course');
			return $course;
		}
		else
		{
			$course ="";
			return $course;
		}
	}

  function searchterm_handler_ins($institute)
	{
		if($institute)
		{
			$this->session->set_userdata('institute', $institute);
			return $institute;
		}
		elseif($this->session->userdata('institute'))
		{
			$institute = $this->session->userdata('institute');
			return $institute;
		}
		else
		{
			$institute ="";
			return $institute;
		}
	}

  function searchterm_handler_pass($passingyear)
	{
		if($passingyear)
		{
			$this->session->set_userdata('passingyear', $passingyear);
			return $passingyear;
		}
		elseif($this->session->userdata('passingyear'))
		{
			$passingyear = $this->session->userdata('passingyear');
			return $passingyear;
		}
		else
		{
			$passingyear ="";
			return $passingyear;
		}
	}

  function addtoindus($indus_details){
	           

            if ($this->db->insert('addtoindus',$indus_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtosubindus($sub_indus_details){
	           

            if ($this->db->insert('addtosubindus',$sub_indus_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 
	 function addtofunc($indfunc_details){
	           

            if ($this->db->insert('addtofunc',$indfunc_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtosubfunc($sub_func_details){
	           

            if ($this->db->insert('addtosubfunc',$sub_func_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	
	 function addtoWorksheet($worksheet_details){
	           

            if ($this->db->insert('addtoworksheet1',$worksheet_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	function addtoworksheet1($worksheet1_details){
	           

            if ($this->db->insert('addtoworksheet',$worksheet1_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtoworksheet2($worksheet2_details){
	           

            if ($this->db->insert('addtoworksheet2',$worksheet2_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	function addtofolder($cand_details){
	           

            if ($this->db->insert('addtofolder',$cand_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtostatus($status_details){
	           

            if ($this->db->insert('addtostatus',$status_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtorefer($user_details){
	           

            if ($this->db->insert('addtorefer',$user_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
    // This retrieves all the candidates' record from database.
	function getAllRecord(){
	 	$data = array();
	    $Q = $this->db->get('candidate');
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	 // This retrieves the list of jobtitles from database.
	 function getPof(){
		$result = array();
		$this->db->select('*');
		$this->db->from('position');
		$this->db->order_by('pof_id','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->pof_id]= $row->jobtitle;
        }
         return $result;
	   }
	   function getFolder($username){
		// admin id is 2 and member id is 1
	     $data = array();
		 $this->db->distinct();
	     $this->db->select('p_id');
	     $this->db->where('user', $username);
	     $Q = $this->db->get('addtofolder');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	   // This retrieves the list of jobtitles from database.
	 function getWorksheet(){
		$result = array();
		$this->db->select('*');
		$this->db->from('candidates');
		$this->db->order_by('id','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->worksheet1;
        }
         return $result;
	   }
	 // This retrieves the list of grade entered by List Manager from database.
     function getGrade(){
	    $result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',5);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->entry;
        }
        return $result;
	  }
	  // This retrieves the list of degree entered by List Manager from database.
     function getDegree(){
		$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',5);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->entry;
        }
        return $result;
	  }
	  // This retrieves the list of year entered by List Manager from database.
	 function getYearofPassing(){
	    $result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',5);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->entry;
        }
        return $result;
	  }
	 
	 function addtolist($cand_details){
	     if ($this->db->insert('addtolist',$cand_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
        }
		 
	  function enteraddtolist(){
	 	 $data = array( 
			'p_id' => $this->input->post('p_id'),
	 			);
		 if ($this->db->insert('enteraddtolist',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	     }
	  // This inserts the candidates inputs
 	  function enterNewCandidate(){
	 	$data = array( 
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'lname' => $this->input->post('lname'),
			'location' => $this->input->post('location'),
			'state' => $this->input->post('state'),
			'pin' => $this->input->post('pin'),
			'country' => $this->input->post('country'),
			'edu_level' => $this->input->post('edu_level'),
			'course_type' => $this->input->post('course_type'),
			'degree' => $this->input->post('degree'),
	 		'subject' => $this->input->post('subject'),
			'pass_year' => $this->input->post('pass_year'),
			'percent' => $this->input->post('percent'),
			'instt' => $this->input->post('instt'),
			'rank' => $this->input->post('rank'),
			'certification' => $this->input->post('certification'),
			'native_place' => $this->input->post('native_place'),
	 		'nationality' => $this->input->post('nationality'),
			'dob' => $this->input->post('dob'),
			'gender' => $this->input->post('gender'),
			'married' => $this->input->post('married'),
			'spouse' => $this->input->post('spouse'),
			'wedding_ani' => $this->input->post('wedding_ani'),
			'childrens' => $this->input->post('childrens'),
			'entered_by' => $this->input->post('entered_by'),
			'introduced_by' => $this->input->post('introduced_by'),
			'cand_manager' => $this->input->post('cand_manager'),
	 	);
		 if ($this->db->insert('candidate',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	     }
		  // This enters the work experiance details for a candidate
	   function addWorkexp($work_exp){
	      if ($this->db->insert('candidate_work_experiance',$work_exp))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		// This enters the multiple email ids for a candidate
	   function addEmail($email){
	      if ($this->db->insert('candidate_email',$email))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		// This enters the multiple phone nos. for a candidate
	   function addPhone($phone){
	      if ($this->db->insert('candidate_phone',$phone))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		 // This enters the multiple addresses for a candidate
	   function addAddress($address){
	      if ($this->db->insert('candidate_address',$address))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		// This enters the multiple weblinks for a candidate
	   function addWeb($web){
	      if ($this->db->insert('candidate_web',$web))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	    // This enters the salary details for a candidate
	   function addSalary($salary){
	      if ($this->db->insert('candidate_salary',$salary))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   
	   // This gets the single candidate profile.
	   function getSingleCandidate($id){
	       $data=array();
		   $this->db->select('*');
		   $this->db->from('candidates');
		 
		   $this->db->where('candidates.id', $id);
		   $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
	 // This retrieves the folders
	   function getSingleCandidatefolder($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtofolder');
		   $this->db->join('candidates', 'addtofolder.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the worksheet
	   function getSingleCandidateMasterWorksheet($id){
	       
	       $this->db->select('*');
		   $this->db->from('addtoworksheet1');
		   $this->db->join('basicworksheet', 'addtoworksheet1.constituent_id=basicworksheet.worksheet_id');
		   $this->db->join('masterworksheet', 'basicworksheet.submaster_id=masterworksheet.submaster_id');
		   $this->db->join('worksheet', 'masterworksheet.master_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('basicworksheet.submaster_id');
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the worksheet
	   function getSingleCandidateSubMasterWorksheet($id){
	       
	       $this->db->select('*');
		   $this->db->from('addtoworksheet1');
		   $this->db->join('basicworksheet', 'addtoworksheet1.constituent_id=basicworksheet.worksheet_id');
		   $this->db->join('worksheet', 'basicworksheet.submaster_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('basicworksheet.submaster_id');
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the worksheet
	   function getSingleCandidateBasicDirect($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtoworksheet1');
		  $this->db->join('worksheet', 'addtoworksheet1.constituent_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('addtoworksheet1.constituent_id');
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	     // This retrieves the worksheet
	   function getSingleCandidateBasicIndirect($id){
	       
	       $this->db->select('*');
		   $this->db->from('worksheetconstituent');
		   $this->db->join('addtoworksheet1', 'addtoworksheet1.constituent_id=worksheetconstituent.worksheet_id');
		  $this->db->join('worksheet', 'worksheetconstituent.constituent_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('worksheetconstituent.constituent_id');   
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the indus
	   function getSingleCandidateindus($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtoindus');
		   $this->db->join('autopopulate', 'addtoindus.industry=autopopulate.id');
		   $this->db->join('candidates', 'addtoindus.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
		     // This retrieves the subindus
	   function getSingleCandidatesubindus($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtosubindus');
		   $this->db->join('autopopulate', 'addtosubindus.sub_industry=autopopulate.id');
		   $this->db->join('candidates', 'addtosubindus.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
	   // This retrieves the func
	   function getSingleCandidatefunc($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtofunc');
		   $this->db->join('autopopulate', 'addtofunc.indfunction=autopopulate.id');
		   $this->db->join('candidates', 'addtofunc.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
		 // This retrieves the subindus
	   function getSingleCandidatesubfunc($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtosubfunc');
		   $this->db->join('autopopulate', 'addtosubfunc.sub_function=autopopulate.id');
		   $this->db->join('candidates', 'addtosubfunc.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
	    // This retrieves candidate status
		  
	   // This gets the single candidate profile.
	   function getCandidateStatus($id,$username){
	       $data=array();
		   $this->db->select('*');
		   $this->db->from('addtostatus');
		   $this->db->where('c_id', $id);
		   $this->db->where('user', $username);
		
		   $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
	    // This inserts the candidates inputs
 	   function updateFile($file_id,$id){
	 	$data = array( 
		    'id' => $id,
			'file_to_view' => $file_id,
			'last_updated' => date('Y-m-d H:i:s'),
	 		
	 	);
		$this->db->where('id',$id);
		$this->db->update('candidates',$data);	
	   }
	     // This inserts the candidates inputs
 	   function updateCandidate($user,$id){
	 	$data = array( 
		    'id' => $id,
			'candidate_name' => $this->input->post('candidate_name'),
			'telephone' => $this->input->post('telephone'),
			'email' => $this->input->post('email'),
			'current_location' => $this->input->post('current_location'),
			'region' => $this->input->post('region'),
			'current_company' => $this->input->post('current_company'),
			'job_title' => $this->input->post('job_title'),
			'department' => $this->input->post('department'),
			'designation' => $this->input->post('designation'),
			'grade' => $this->input->post('grade'),
			'level' => $this->input->post('level'),
			'salary' => $this->input->post('salary'),
	 		'in_current_company_since' => $this->input->post('in_current_company_since'),
			'reports_to' => $this->input->post('reports_to'),
			'current_role' => $this->input->post('current_role'),
			'previous_company' => $this->input->post('previous_company'),
			'course' => $this->input->post('course'),
			'institute' => $this->input->post('institute'),
			'year_of_passing' => $this->input->post('year_of_passing'),
			'year_of_birth' => $this->input->post('year_of_birth'),
			'profile_brief' => $this->input->post('profile_brief'),
			'comment' => $this->input->post('comment'),
			'last_updated' => date('Y-m-d H:i:s'),
			'last_updated_by' => $user,
	 		
	 	);
		$this->db->where('id',$id);
		$this->db->update('candidates',$data);	
	   }
	  
 //This sends the candidates to the del list.
   function deleteCandidate($candidateid,$user){
	 	$data = array(
		'id' => $candidateid,
		'last_updated' => date('Y-m-d H:i:s'),
		'last_updated_by' => $user,
		'is_to_Delete' => 1,
		);
	 	$this->db->where('id', $candidateid);
		$this->db->update('candidates',$data);	
	 }
	// This gets a username
	  function getUsers(){
		 $data = array();
	     $this->db->select('id,username');
	   
	     $Q = $this->db->get('be_users');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		   {
	         $data[]=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	 // This gets the single candidate profile.
	   function getCv($id){
	       $data=array();
		   $this->db->select('filepath,filename');
		   $this->db->from('files');
		   $this->db->where('cand', $id);
		   $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
	// This gets all the username for the dropdown  
	  function getUsersDropDown($id){
		 $data = array();
	     $this->db->select('id,username');
	     $Q = $this->db->get('be_users');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		   {
	         $data[$row['username']] = $row['username'];
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 }
	 
 // This retrieves industry list from database.
	function getIndustryList(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id', 1);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	 // This retrieves industry list from database.
	function getFunctionList(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id', 2);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	   // This retrieves industry list from database.
	function getCityList(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id', 3);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	        // This retrieves attachment list from database.
	function getAttachmentList($id){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('files');
		$this->db->where('cand', $id);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	  
	 function deletesubind($id){
	$this->db->delete('addtofolder', array('fid' => $id));
	 }
	  // This gets the file name to show.
	   function getSinglefile($id){
	       $data=array();
		   $this->db->select('*');
		   $this->db->from('candidates');
		   $this->db->join('files', 'candidates.file_to_view=files.file_id');
		 
		   $this->db->where('candidates.id', $id);
		   $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
	 	 // This inserts the master worksheet constituents details.
   function addConstituent($constituent_details){
	     if ($this->db->insert('worksheetconstituent1',$constituent_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	   
	function record_count_cand_to_del()
	{
	   $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE is_to_Delete = 1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		
	}
	function fetch_candidates_to_del($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->where('candidates.is_to_Delete',1);
		$this->db->order_by('candidate_name');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
//This sends the candidates to the del list.
   function RejCandDB($candidateid){
	 	$data = array(
		'id' => $candidateid,
		'is_to_Delete' => 0,
		);
	 	$this->db->where('id', $candidateid);
		$this->db->update('candidates',$data);	
	 }
}

 