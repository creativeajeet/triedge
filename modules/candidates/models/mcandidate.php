<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MCandidate extends Base_model{

	function MCandidate(){
		parent::Base_model();
		$this->_TABLES = array( 'candidate' => 'candidate'
                                    );
	}
	
  function import($sql){
      $this->load->database();
      $this->db->query($sql);
      return $this->db->insert_id();
      } 
	  
	  function lookup($keyword){
		$this->db->select('*')->from('synonym');
        $this->db->like('parentname',$keyword,'after');
		$this->db->where('type','company');
		$this->db->group_by('parentname');
        $query = $this->db->get();    
        
        return $query->result();
	} 
	
	function lookuplocation($keyword){
		$this->db->select('*')->from('synonym');
        $this->db->like('parentname',$keyword,'after');
		$this->db->where('type','2');
		$this->db->group_by('parentname');
        $query = $this->db->get();    
        
        return $query->result();
	} 
	
	function lookupindustry($keyword){
		$this->db->select('*')->from('segment_name');
        $this->db->like('segment_name',$keyword,'after');
		$this->db->where('segment_type_id','1');
		  $query = $this->db->get();    
        
        return $query->result();
	} 
	function lookupindfunc($keyword){
		$this->db->select('*')->from('segment_name');
        $this->db->like('segment_name',$keyword,'after');
		$this->db->where('segment_type_id','2');
		  $query = $this->db->get();    
        
        return $query->result();
	}
	
	function lookupgrade($keyword){
		$this->db->select('*')->from('segment_name');
        $this->db->like('segment_name',$keyword,'after');
		$this->db->where('segment_type_id',10);
		$this->db->group_by('segment_name');
        $query = $this->db->get();    
        
        return $query->result();
	}
	
	 function checkGradeList(){
	 
		$company = $this->input->post('companyid');
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
		$this->db->join('synonym','companies_grade.cid=synonym.s_id');
		$this->db->like('synonym.parentname',$company);
		
		$array_keys_values = $this->db->get();
        if($array_keys_values->num_rows()>0)
		{
		 return TRUE;
		}
		else{
		return FALSE;
		}
	}
	
	
	function getGradeList(){
	 
		$company = $this->input->post('companyid');
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
		$this->db->join('synonym','companies_grade.cid=synonym.s_id');
		$this->db->like('synonym.parentname',$company);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->grade]= $row->grade;
        }
        
        return $result;
	}
	
	function getAllGradeList(){
	 
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
	    $this->db->where('segment_type_id','10');
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->segment_name]= $row->segment_name;
        }
        
        return $result;
	}
	
	function checkLevelList(){
	 
		$company = $this->input->post('companyid');
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
		$this->db->join('synonym','companies_grade.cid=synonym.s_id');
		$this->db->like('synonym.parentname',$company);
		
		$array_keys_values = $this->db->get();
        if($array_keys_values->num_rows()>0)
		  {
		   return TRUE;
		  }
		  else{
		   return FALSE;
		  }
	}
	
	function getLevelList(){
	 
		$company = $this->input->post('companyid');
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
		$this->db->join('synonym','companies_grade.cid=synonym.s_id');
		$this->db->join('segment_name','companies_grade.level=segment_name.id');
		$this->db->like('synonym.parentname',$company);
		$this->db->where('segment_name.segment_type_id','11');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->segment_name]= $row->segment_name;
        }
        
        return $result;
	}
	
	function getAllLevelList(){
	 
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
	    $this->db->where('segment_type_id','11');
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->segment_name]= $row->segment_name;
        }
        
        return $result;
	}
	function importfiless()
	{
		 $sql = 'SELECT * FROM candidates WHERE prid="0" AND sent_to_synonym="0" AND is_company_updated="0" AND noncore="0" AND company !=" ";';
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function importloc()
	{
		 $sql = 'SELECT * FROM segment_name WHERE segment_type_id="3";';
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function importcand()
	{
		 $sql = 'SELECT * FROM candidates WHERE designation NOT LIKE "%,%";';
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
   // gets last import id
     function getLastImportId()
	     {
		       
		       $query = $this->db->query('SELECT max(id) as maxid FROM candidates');
               $row = $query->row();
               $max_id = $row->maxid; 
			   return $max_id;  
		 }
		 
  // gets last import id
     function getAllImportId($lastpid)
	     {
		       $sql = "SELECT * FROM candidates WHERE id>".$lastpid;
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
  function importfiles($sql){
      $this->load->database();
      $this->db->query($sql);
      } 
	    
  function importworks($sql){
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
		    'candidate_name' => ucwords($this->input->post('candidate_name')),
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
			'industry' => $this->input->post('industry'),
			'sub_industry' => $this->input->post('sub_industry'),
			'indfunction' => $this->input->post('indfunction'),
			'sub_function' => $this->input->post('sub_function'),
			'previous_company' => $this->input->post('previous_company'),
			'course' => $this->input->post('course'),
			'institute' => $this->input->post('institute'),
			'year_of_passing' => $this->input->post('year_of_passing'),
			'year_of_birth' => $this->input->post('year_of_birth'),
			'profile_brief' => $this->input->post('profile_brief'),
			'comment' => $this->input->post('comment'),
			'entered_by' => $this->input->post('entered_by'),
			'entered_on' => date('Y-m-d H:i:s'),
			'input_by' => $this->input->post('input_by'),
			'company' => $this->input->post('current_company'),
			'cand_mgmt' => $this->input->post('cand_mgmt'),
	 		
	 	);
    if($this->db->insert('candidates',$data))
	{
	 return $this->db->insert_id();
	}
	else{
	 return FALSE;
	}
  }
  // get the last candidate id
  function last_cand()
    {
	 $sql = "SELECT MAX(id) As last FROM candidates";
	 $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->last;
					 
	}
  //
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
		$this->db->where('active',1);
			$this->db->where('group',3);
			$this->db->or_where('group',4);
			$this->db->order_by('be_users.username','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->username;
        }
        
        return $result;
	}	
	//user's dropdown
	
   function getConsulDropdown(){
		$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		
			$this->db->where('group',3);
			$this->db->or_where('group',4);
			$this->db->order_by('be_users.username','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->username]= $row->username;
        }
        
        return $result;
	  }	
	  
	function getConsulDropdown2(){
		$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where('active',1);
		$this->db->order_by('be_users.username','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->username]= $row->username;
        }
        
        return $result;
	  }	
	  
	  function getCandMgmtDropdown(){
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id','12');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	  }	
	//
	function getConsulsDropdown(){
		$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where('group',3);
		$this->db->or_where('group',4);
		$this->db->where('active',1);
		$this->db->order_by('be_users.username','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->username;
        }
        
        return $result;
	}	
	// get positions
	function getAllPostitions()
	  {
	   $user = $this->session->userdata('id');
	   $result = array();
	   $this->db->select('*');
	   $this->db->from('pof');
	   $this->db->join('events_tt','pof.pof_id=events_tt.pof_id');
	   $this->db->where('events_tt.is_alloc','1');
	   $this->db->where('events_tt.section_id',$user);
	   $array_key_values = $this->db->get();
	   foreach($array_key_values->result() as $row)
	     {
		   $result[$row->pof_id] = $row->jobtitle;
		 }
		 return $result;
	  }
	//
	// get positions
	function getAllPostitions2()
	  {
	   $user = $this->session->userdata('id');
	   $result = array();
	   $this->db->select('*');
	   $this->db->from('pof');
	   $this->db->order_by('entered_on','DESC');
	     $array_key_values = $this->db->get();
	   foreach($array_key_values->result() as $row)
	     {
		   $result[$row->pof_id] = $row->jobtitle;
		 }
		 return $result;
	  }
	//
	
	function getSheetOpt()
	  {
	   $result = array();
	   $this->db->select('*');
	   $this->db->from('segment_name');
	   $this->db->where('segment_type_id',20);
	   $array_key_values = $this->db->get();
	   foreach($array_key_values->result() as $row)
	     {
		   $result[$row->id] = $row->segment_name;
		 }
		 return $result;
	  }
	//
	 function getUserWorksheet($username){
		$result = array();
		$this->db->select('*');
		$this->db->from('worksheet_pref');
		$this->db->join('worksheet','worksheet_pref.worksheet_id=worksheet.id');
		$this->db->where('user_id',$username);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}	
	//
	//
	function record_count_notattach($user)
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE file_to_view =' ' AND entered_by ='".$user."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	// get candidate list whose cv is not attached
	 function getAttachNot($user,$column_name,$order,$limit)
	  {
	   $sql="SELECT * FROM candidates WHERE file_to_view =' ' AND entered_by ='".$user."'  ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	//
	//
	function record_count_mycandidate($user)
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE entered_by ='".$user."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	// get candidate list whose cv is not attached
	 function fetch_mycandidates($user,$limit)
	  {
	   $sql="SELECT * FROM candidates WHERE entered_by ='".$user."' ORDER BY id DESC LIMIT " .$limit . ",20 ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	//
	
	function record_count()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	function record_count_total()
	{
	  $date = date('Y-m-d');
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '2012-07-11' AND '".$date."') AND is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	function fetch_candidates($limit)
	{
		$sql="SELECT * FROM (SELECT * FROM candidates WHERE is_to_Delete = 0 ORDER BY id DESC LIMIT 50) As cand LIMIT " .$limit . ",20 ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	//
	
	//duplication manager
	function record_count_dup()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates RIGHT JOIN dupmanager ON candidates.id=dupmanager.cand_id";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	function fetch_candidates_dup($limit)
	{
		$sql="SELECT * FROM candidates RIGHT JOIN dupmanager ON candidates.id=dupmanager.cand_id ORDER BY candidates.candidate_name DESC LIMIT " .$limit . ",20 ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	//
	
	function record_count_worksheet($user)
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE put_in_worksheet = 0 AND entered_by ='".$user."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	function fetch_candidates_worksheet($user,$column_name,$order,$limit)
	{
		$sql="SELECT * FROM candidates WHERE put_in_worksheet = 0 AND entered_by ='".$user."' ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	//
	function fetch_candidates_lastupdated($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->where('candidates.is_to_Delete',0);
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
	function record_count_column($column_name,$order)
	  {
	  return $this->db->count_all('candidates');
	  }
	function fetch_candidates_bycolumn($column_name,$order,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_cands()
	{
		
		$sql="SELECT * FROM candidates WHERE candidate_code BETWEEN 'DT-40476' AND 'DT-40502';";
		
		$query = $this->db->query($sql);
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
		
		$sql="SELECT * FROM files WHERE candidate_c BETWEEN 'DT-40476' AND 'DT-40502';";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_candspa()
	{
		
		$sql="SELECT * FROM candidates ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_filespa()
	{
		
		$sql="SELECT * FROM dupcand";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_filespaa()
	{
		
		$sql="SELECT * FROM synonym";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_worksheet()
	{
		
		$this->db->from('addtoworksheet1');
		
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
	function fetch_reference($limit,$start,$username,$column_name,$order)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('addtorefer', 'candidates.id=addtorefer.c_id', 'left');
		$this->db->where('addtorefer.userid', $username);
		$this->db->order_by($column_name,$order);
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
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE ". $heading." LIKE '%" . $keyword . "%' AND is_to_Delete = 0";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search_simple($heading,$keyword,$column_name,$order,$limit)
	{
		$sql = "SELECT * FROM candidates WHERE ". $heading." LIKE '%" . $keyword . "%' AND is_to_Delete = 0 ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
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
	
	function search_record_count_simple_alpha($heading,$alpha)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE ". $heading." LIKE '" . $alpha . "%' AND is_to_Delete = 0";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search_simple_alpha($heading,$alpha,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand 
				WHERE ". $heading." LIKE '" . $alpha . "%' AND is_to_Delete = 0 LIMIT " .$limit . ",20 ";
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
	function search_record_count_all($keyword)
	{
		$sql = "SELECT COUNT(*) As cnt FROM (SELECT * FROM candidates WHERE worksheet1 LIKE '%" . $keyword . "%' OR worksheet2 LIKE '%" . $keyword . "%' OR status LIKE '%" . $keyword . "%' OR candidate_name LIKE '%" . $keyword . "%' OR telephone LIKE '%" . $keyword . "%' OR email LIKE '%" . $keyword . "%' OR current_location LIKE '%" . $keyword . "%' OR region LIKE '%" . $keyword . "%' OR current_company LIKE '%" . $keyword . "%' OR job_title LIKE '%" . $keyword . "%' OR department LIKE '%" . $keyword . "%' OR designation LIKE '%" . $keyword . "%' OR grade LIKE '%" . $keyword . "%' OR level LIKE '%" . $keyword . "%' OR salary LIKE '%" . $keyword . "%' OR in_current_company_since LIKE '%" . $keyword . "%' OR reports_to LIKE '%" . $keyword . "%' OR current_role LIKE '%" . $keyword . "%' OR industry LIKE '%" . $keyword . "%' OR sub_industry LIKE '%" . $keyword . "%' OR indfunction LIKE '%" . $keyword . "%' OR sub_function LIKE '%" . $keyword . "%' OR previous_company LIKE '%" . $keyword . "%' OR course LIKE '%" . $keyword . "%' OR institute LIKE '%" . $keyword . "%' OR year_of_passing LIKE '%" . $keyword . "%' OR year_of_birth LIKE '%" . $keyword . "%' OR profile_brief LIKE '%" . $keyword . "%' OR comment LIKE '%" . $keyword . "%' OR entered_by LIKE '%" . $keyword . "%') As cand WHERE is_to_Delete = 0";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search_all($keyword,$column_name,$order,$limit)
	{
		$sql = "SELECT * FROM (SELECT * FROM candidates WHERE worksheet1 LIKE '%" . $keyword . "%' OR worksheet2 LIKE '%" . $keyword . "%' OR status LIKE '%" . $keyword . "%' OR candidate_name LIKE '%" . $keyword . "%' OR telephone LIKE '%" . $keyword . "%' OR email LIKE '%" . $keyword . "%' OR current_location LIKE '%" . $keyword . "%' OR region LIKE '%" . $keyword . "%' OR current_company LIKE '%" . $keyword . "%' OR job_title LIKE '%" . $keyword . "%' OR department LIKE '%" . $keyword . "%' OR designation LIKE '%" . $keyword . "%' OR grade LIKE '%" . $keyword . "%' OR level LIKE '%" . $keyword . "%' OR salary LIKE '%" . $keyword . "%' OR in_current_company_since LIKE '%" . $keyword . "%' OR reports_to LIKE '%" . $keyword . "%' OR current_role LIKE '%" . $keyword . "%' OR industry LIKE '%" . $keyword . "%' OR sub_industry LIKE '%" . $keyword . "%' OR indfunction LIKE '%" . $keyword . "%' OR sub_function LIKE '%" . $keyword . "%' OR previous_company LIKE '%" . $keyword . "%' OR course LIKE '%" . $keyword . "%' OR institute LIKE '%" . $keyword . "%' OR year_of_passing LIKE '%" . $keyword . "%' OR year_of_birth LIKE '%" . $keyword . "%' OR profile_brief LIKE '%" . $keyword . "%' OR comment LIKE '%" . $keyword . "%' OR entered_by LIKE '%" . $keyword . "%') As cand WHERE is_to_Delete = 0 ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
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
	function open_folder($folder_name,$username,$column_name,$order,$limit)
	{
		$sql = "SELECT * FROM addtofolder LEFT JOIN candidates ON addtofolder.c_id=candidates.id WHERE addtofolder.p_id LIKE '%" . $folder_name . "%' AND addtofolder.user = ".$username." ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
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
	
	function search_record_count_worksheet($basicworksheet)
	{
		$sql = "SELECT COUNT(*) As cnt FROM worksheetconstituent RIGHT JOIN addtoworksheet1 ON addtoworksheet1.constituent_id = worksheetconstituent.worksheet_id  LEFT JOIN candidates ON addtoworksheet1.c_id=candidates.id WHERE (addtoworksheet1.constituent_id = ".$basicworksheet." OR worksheetconstituent.constituent_id = ".$basicworksheet.") AND is_to_Delete = 0 ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_worksheet($basicworksheet,$column_name,$order,$limit)
	{
		$sql = "SELECT * FROM worksheetconstituent RIGHT JOIN addtoworksheet1 ON addtoworksheet1.constituent_id = worksheetconstituent.worksheet_id  LEFT JOIN candidates ON addtoworksheet1.c_id=candidates.id WHERE (addtoworksheet1.constituent_id = ".$basicworksheet." OR worksheetconstituent.constituent_id = ".$basicworksheet.") AND is_to_Delete = 0 GROUP BY addtoworksheet1.c_id ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
		
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
	function search_record_count_worksheet_filter($basicworksheet,$worksheettype)
	{
		$sql = "SELECT COUNT(*) As cnt FROM worksheetconstituent RIGHT JOIN addtoworksheet1 ON addtoworksheet1.constituent_id = worksheetconstituent.worksheet_id  LEFT JOIN candidates ON addtoworksheet1.c_id=candidates.id WHERE (addtoworksheet1.constituent_id = ".$basicworksheet." OR worksheetconstituent.constituent_id = ".$basicworksheet.") AND is_to_Delete = 0 AND (addtoworksheet1.type IN (".$worksheettype.")) ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_worksheet_filter($basicworksheet,$worksheettype,$column_name,$order,$limit)
	{
		$sql = "SELECT * FROM worksheetconstituent RIGHT JOIN addtoworksheet1 ON addtoworksheet1.constituent_id = worksheetconstituent.worksheet_id  LEFT JOIN candidates ON addtoworksheet1.c_id=candidates.id WHERE (addtoworksheet1.constituent_id = ".$basicworksheet." OR worksheetconstituent.constituent_id = ".$basicworksheet.") AND is_to_Delete = 0 AND (addtoworksheet1.type IN (".$worksheettype.")) GROUP BY addtoworksheet1.c_id ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
		
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
	
	function search_record_count_worksheet_comp($basicworksheet,$comp)
	{
		$sql = "SELECT candidates.id,current_company,COUNT( candidates.id ) As cnt FROM candidates LEFT JOIN addtoworksheet1 ON candidates.id = addtoworksheet1.c_id JOIN synonym ON candidates.prid=synonym.s_id WHERE addtoworksheet1.constituent_id ='".$basicworksheet."' AND synonym.parentname='".$comp."'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_worksheet_comp($basicworksheet,$comp,$column_name,$order,$limit)
	{
	
		$sql = "SELECT *,candidates.id As canid FROM candidates LEFT JOIN addtoworksheet1 ON candidates.id = addtoworksheet1.c_id JOIN synonym ON candidates.prid=synonym.s_id WHERE addtoworksheet1.constituent_id ='".$basicworksheet."' AND synonym.parentname='".$comp."' ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
		
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
	
	function search_record_count_worksheet_loc($basicworksheet,$comp)
	{
		$sql = "SELECT candidates.id,current_company,COUNT( candidates.id ) As cnt FROM candidates LEFT JOIN addtoworksheet1 ON candidates.id = addtoworksheet1.c_id WHERE addtoworksheet1.constituent_id ='".$basicworksheet."' AND candidates.current_location='".$comp."'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_worksheet_loc($basicworksheet,$comp,$column_name,$order,$limit)
	{
	
		$sql = "SELECT *,candidates.id As canid FROM candidates LEFT JOIN addtoworksheet1 ON candidates.id = addtoworksheet1.c_id  WHERE addtoworksheet1.constituent_id ='".$basicworksheet."' AND candidates.current_location='".$comp."' ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
		
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
	
  function get_worksheet($basicworksheet)
	{
		$sql = "SELECT * FROM worksheetconstituent RIGHT JOIN addtoworksheet1 ON addtoworksheet1.constituent_id = worksheetconstituent.worksheet_id  LEFT JOIN candidates ON addtoworksheet1.c_id=candidates.id WHERE addtoworksheet1.constituent_id = ".$basicworksheet." OR worksheetconstituent.constituent_id = ".$basicworksheet." GROUP BY addtoworksheet1.c_id ";
		
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
	// companywise counts
	function countCompany($worksheet)
	{
		$sql = "SELECT COUNT(DISTINCT candidates.id) As cnt FROM candidates LEFT JOIN addtoworksheet1 ON candidates.id = addtoworksheet1.c_id
WHERE addtoworksheet1.constituent_id ='".$worksheet."'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	
	function getCompanyCount($worksheet,$limit)
	{
		$sql = "SELECT parentname,COUNT(DISTINCT candidates.id) As cnt1 FROM candidates RIGHT JOIN addtoworksheet1 ON candidates.id=addtoworksheet1.c_id RIGHT JOIN synonym ON candidates.prid=synonym.s_id WHERE addtoworksheet1.constituent_id=".$worksheet." GROUP BY parentname ORDER BY parentname LIMIT " .$limit . ",20 ";
		
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
	
	// companywise counts
	function countCompanyFil($worksheet,$currentcomp)
	{
		$sql = "SELECT COUNT(DISTINCT candidates.id) As cnt FROM candidates LEFT JOIN addtoworksheet1 ON candidates.id = addtoworksheet1.c_id
WHERE addtoworksheet1.constituent_id ='".$worksheet."' AND candidates.current_company LIKE '%".$currentcomp."%'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	
	function getCompanyCountFil($worksheet,$currentcomp,$limit)
	{
		$sql = "SELECT parentname,COUNT(DISTINCT candidates.id) As cnt1 FROM candidates RIGHT JOIN addtoworksheet1 ON candidates.id=addtoworksheet1.c_id RIGHT JOIN synonym ON candidates.prid=synonym.s_id WHERE addtoworksheet1.constituent_id=".$worksheet." AND candidates.current_company LIKE '%".$currentcomp."%' GROUP BY parentname ORDER BY parentname LIMIT " .$limit . ",20 ";
		
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
	
	
	function searchterm_handler_myworksheet($myworksheet)
	{
		if($myworksheet)
		{
			$this->session->set_userdata('myworksheet', $myworksheet);
			return $myworksheet;
		}
		elseif($this->session->userdata('myworksheet'))
		{
			$myworksheet = $this->session->userdata('myworksheet');
			return $myworksheet;
		}
		else
		{
			$myworksheet ="";
			return $myworksheet;
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
	
	function search_record_count($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$worksheet,$enteredby,$designation,$grade,$level,$course,$institute,$passingyear)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates JOIN synonym ON candidates.prid=synonym.s_id WHERE candidate_name LIKE '%" . $candidatename . "%' AND current_location LIKE '%".$currentloc."%' AND region LIKE '%".$region."%' AND parentname LIKE '%".$currentcomp."%' AND industry LIKE '%".$industry."%' AND sub_industry LIKE '%".$subindustry."%' AND indfunction LIKE '%".$indfunction."%' AND sub_function LIKE '%".$subfunction."%' AND department LIKE '%".$department."%' AND job_title LIKE '%".$jobtitle."%' AND entered_by LIKE '%".$enteredby."%' AND designation LIKE '%".$designation."%' AND grade LIKE '%".$grade."%' AND level LIKE '%".$level."%' AND course LIKE '%".$course."%' AND institute LIKE '%".$institute."%' AND year_of_passing LIKE '%".$passingyear."%' AND ( worksheet1 LIKE '%".$worksheet."%' OR worksheet2 LIKE '%".$worksheet."%' ) AND is_to_Delete = 0  ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$worksheet,$enteredby,$designation,$grade,$level,$course,$institute,$passingyear,$column_name,$order,$limit)
	{
		$sql = "SELECT * FROM candidates JOIN synonym ON candidates.prid=synonym.s_id WHERE candidate_name LIKE '%" . $candidatename . "%' AND current_location LIKE '%".$currentloc."%' AND region LIKE '%".$region."%' AND parentname LIKE '%".$currentcomp."%' AND industry LIKE '%".$industry."%' AND sub_industry LIKE '%".$subindustry."%' AND indfunction LIKE '%".$indfunction."%' AND sub_function LIKE '%".$subfunction."%' AND department LIKE '%".$department."%' AND job_title LIKE '%".$jobtitle."%' AND entered_by LIKE '%".$enteredby."%' AND designation LIKE '%".$designation."%' AND grade LIKE '%".$grade."%' AND level LIKE '%".$level."%' AND course LIKE '%".$course."%' AND institute LIKE '%".$institute."%' AND year_of_passing LIKE '%".$passingyear."%' AND ( worksheet1 LIKE '%".$worksheet."%' OR worksheet2 LIKE '%".$worksheet."%' ) AND is_to_Delete = 0 ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
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
	function searchterm_handler_worksheet($worksheet)
	{
		if($worksheet)
		{
			$this->session->set_userdata('worksheet', $worksheet);
			return $worksheet;
		}
		elseif($this->session->userdata('worksheet'))
		{
			$worksheet = $this->session->userdata('worksheet');
			return $worksheet;
		}
		else
		{
			$worksheet ="";
			return $worksheet;
		}
	}
	function searchterm_handler_enteredby($enteredby)
	{
		if($enteredby)
		{
			$this->session->set_userdata('enteredby', $enteredby);
			return $enteredby;
		}
		elseif($this->session->userdata('enteredby'))
		{
			$enteredby = $this->session->userdata('enteredby');
			return $enteredby;
		}
		else
		{
			$enteredby ="";
			return $enteredby;
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
/* Theese handlers are for new search
*/
  function searchterm_handler_simple_candname1($candidatename)
	{
		
			$candidatename = $this->session->unset_userdata('candidatename');
			return $candidatename;
		
	}
	
  function searchterm_handler_curloc1($currentloc)
	{
		
			$currentloc = $this->session->unset_userdata('currentlocation');
			return $currentloc;
		
	}
	
   function searchterm_handler_region1($region)
	{
			$region = $this->session->unset_userdata('region');
			return $region;
		
	}
	
  function searchterm_handler_curcomp1($currentcomp)
	{
		
			$currentcomp = $this->session->unset_userdata('currentcomp');
			return $currentcomp;
		
	}
  function searchterm_handler_ind1($industry)
	{
	
			$industry = $this->session->unset_userdata('industry');
			return $industry;
		
	}
  function searchterm_handler_subind1($subindustry)
	{
		
			$subindustry = $this->session->unset_userdata('subindustry');
		
	}
	
  function searchterm_handler_indfunc1($indfunction)
	{
		
			$indfunction = $this->session->unset_userdata('indfunction');
			return $indfunction;
		
	} 
	
  function searchterm_handler_subfunc1($subfunction)
	{
		
			$subfunction = $this->session->unset_userdata('subfunction');
			return $subfunction;
		
	}
  function searchterm_handler_department1($department)
	{
		
			$department = $this->session->unset_userdata('department');
			return $department;
		
	}

  function searchterm_handler_jobtitle1($jobtitle)
	{
	
			$jobtitle = $this->session->unset_userdata('jobtitle');
			return $jobtitle;
		
	}
 function searchterm_handler_worksheet1($worksheet)
	{
	
			$worksheet = $this->session->unset_userdata('worksheet');
			return $worksheet;
		
	}
  function searchterm_handler_enteredby1($enteredby)
	{
	
			$enteredby = $this->session->unset_userdata('enteredby');
			return $enteredby;
		
	}
  function searchterm_handler_designation1($designation)
	{
		
			$designation = $this->session->unset_userdata('designation');
			return $designation;
		
	}

  function searchterm_handler_grade1($grade)
	{
		
			$grade = $this->session->unset_userdata('grade');
			return $grade;
		
	}

  function searchterm_handler_level1($level)
	{
		
			$level = $this->session->unset_userdata('level');
			return $level;
		
	}

  function searchterm_handler_course1($course)
	{
		
			$course = $this->session->unset_userdata('course');
			return $course;
		
	}

  function searchterm_handler_ins1($institute)
	{
		$institute = $this->session->unset_userdata('institute');
			return $institute;
		
	}

  function searchterm_handler_pass1($passingyear)
	{
		    $passingyear = $this->session->unset_userdata('passingyear');
			return $passingyear;
	
	}
	 function searchterm_handler_simple_candname11($candidatename)
	{
		if($candidatename)
		{
			$this->session->set_userdata('candidatename', $candidatename);
			return $candidatename;
		}
		elseif($this->session->userdata('candidatename'))
		{
			$candidatename = $this->session->unset_userdata('candidatename');
			return $candidatename;
		}
		else
		{
			$candidatename ="";
			return $candidatename;
		}
		
	}
///
// There handlers are for changing search criteria	
  function searchterm_handler_curloc11($currentloc)
	{
		
			if($currentloc)
		{
			$this->session->set_userdata('currentlocation', $currentloc);
			return $currentloc;
		}
		elseif($this->session->userdata('currentlocation'))
		{
			$currentloc = $this->session->unset_userdata('currentlocation');
			return $currentloc;
		}
		else
		{
			$currentloc ="";
			return $currentloc;
		}
		
	}
	
   function searchterm_handler_region11($region)
	{
			if($region)
		{
			$this->session->set_userdata('region', $region);
			return $region;
		}
		elseif($this->session->userdata('region'))
		{
			$region = $this->session->unset_userdata('region');
			return $region;
		}
		else
		{
			$region ="";
			return $region;
		}
		
	}
	
  function searchterm_handler_curcomp11($currentcomp)
	{
		
		if($currentcomp)
		{
			$this->session->set_userdata('currentcomp', $currentcomp);
			return $currentcomp;
		}
		elseif($this->session->userdata('currentcomp'))
		{
			$currentcomp = $this->session->unset_userdata('currentcomp');
			return $currentcomp;
		}
		else
		{
			$currentcomp ="";
			return $currentcomp;
		}
		
	}
  function searchterm_handler_ind11($industry)
	{
	
			if($industry)
		{
			$this->session->set_userdata('industry', $industry);
			return $industry;
		}
		elseif($this->session->userdata('industry'))
		{
			$industry = $this->session->unset_userdata('industry');
			return $industry;
		}
		else
		{
			$industry ="";
			return $industry;
		}
		
	}
  function searchterm_handler_subind11($subindustry)
	{
		
			if($subindustry)
		{
			$this->session->set_userdata('subindustry', $subindustry);
			return $subindustry;
		}
		elseif($this->session->userdata('subindustry'))
		{
			$subindustry = $this->session->unset_userdata('subindustry');
			return $subindustry;
		}
		else
		{
			$subindustry ="";
			return $subindustry;
		}
		
	}
	
  function searchterm_handler_indfunc11($indfunction)
	{
		
			if($indfunction)
		{
			$this->session->set_userdata('indfunction', $indfunction);
			return $indfunction;
		}
		elseif($this->session->userdata('indfunction'))
		{
			$indfunction = $this->session->unset_userdata('indfunction');
			return $indfunction;
		}
		else
		{
			$indfunction ="";
			return $indfunction;
		}
		
	} 
	
  function searchterm_handler_subfunc11($subfunction)
	{
		
			if($subfunction)
		{
			$this->session->set_userdata('subfunction', $subfunction);
			return $subfunction;
		}
		elseif($this->session->userdata('subfunction'))
		{
			$subfunction = $this->session->unset_userdata('subfunction');
			return $subfunction;
		}
		else
		{
			$subfunction ="";
			return $subfunction;
		}
		
	}
  function searchterm_handler_department11($department)
	{
		
			if($department)
		{
			$this->session->set_userdata('department', $department);
			return $department;
		}
		elseif($this->session->userdata('department'))
		{
			$department = $this->session->unset_userdata('department');
			return $department;
		}
		else
		{
			$department ="";
			return $department;
		}
		
	}

  function searchterm_handler_jobtitle11($jobtitle)
	{
	
			if($jobtitle)
		{
			$this->session->set_userdata('jobtitle', $jobtitle);
			return $jobtitle;
		}
		elseif($this->session->userdata('jobtitle'))
		{
			$jobtitle = $this->session->unset_userdata('jobtitle');
			return $jobtitle;
		}
		else
		{
			$jobtitle ="";
			return $jobtitle;
		}
	}
 function searchterm_handler_worksheet11($worksheet)
	{
	
			if($worksheet)
		{
			$this->session->set_userdata('worksheet', $worksheet);
			return $worksheet;
		}
		elseif($this->session->userdata('worksheet'))
		{
			$worksheet = $this->session->unset_userdata('worksheet');
			return $worksheet;
		}
		else
		{
			$worksheet ="";
			return $worksheet;
		}
	}
   function searchterm_handler_enteredby11($enteredby)
	{
	
			if($enteredby)
		{
			$this->session->set_userdata('enteredby', $enteredby);
			return $enteredby;
		}
		elseif($this->session->userdata('enteredby'))
		{
			$enteredby = $this->session->unset_userdata('enteredby');
			return $enteredby;
		}
		else
		{
			$enteredby ="";
			return $enteredby;
		}
	}
  function searchterm_handler_designation11($designation)
	{
		
			if($designation)
		{
			$this->session->set_userdata('designation', $designation);
			return $designation;
		}
		elseif($this->session->userdata('designation'))
		{
			$designation = $this->session->unset_userdata('designation');
			return $designation;
		}
		else
		{
			$designation ="";
			return $designation;
		}
		
	}

  function searchterm_handler_grade11($grade)
	{
		if($grade)
		{
			$this->session->set_userdata('grade', $grade);
			return $grade;
		}
		elseif($this->session->userdata('grade'))
		{
			$grade = $this->session->unset_userdata('grade');
			return $grade;
		}
		else
		{
			$grade ="";
			return $grade;
		}
		
	}

  function searchterm_handler_level11($level)
	{
		if($level)
		{
			$this->session->set_userdata('level', $level);
			return $level;
		}
		elseif($this->session->userdata('level'))
		{
			$level = $this->session->unset_userdata('level');
			return $level;
		}
		else
		{
			$level ="";
			return $level;
		}
		
	}

  function searchterm_handler_course11($course)
	{
		
			if($course)
		{
			$this->session->set_userdata('course', $course);
			return $course;
		}
		elseif($this->session->userdata('course'))
		{
			$course = $this->session->unset_userdata('course');
			return $course;
		}
		else
		{
			$course ="";
			return $course;
		}
		
	}

  function searchterm_handler_ins11($institute)
	{
		if($institute)
		{
			$this->session->set_userdata('institute', $institute);
			return $institute;
		}
		elseif($this->session->userdata('institute'))
		{
			$institute = $this->session->unset_userdata('institute');
			return $institute;
		}
		else
		{
			$institute ="";
			return $institute;
		}
		
	}

  function searchterm_handler_pass11($passingyear)
	{
		   if($passingyear)
		{
			$this->session->set_userdata('passingyear', $passingyear);
			return $passingyear;
		}
		elseif($this->session->userdata('passingyear'))
		{
			$passingyear = $this->session->unset_userdata('passingyear');
			return $passingyear;
		}
		else
		{
			$passingyear ="";
			return $passingyear;
		}
	
	}
////
function searchterm_handler_column($column_name)
	{
		if($column_name)
		{
			$this->session->set_userdata('column_name', $column_name);
			return $column_name;
		}
		elseif($this->session->userdata('column_name'))
		{
			$column_name = $this->session->unset_userdata('column_name');
			return $column_name;
		}
		else
		{
			$column_name ="candidate_name";
			return $column_name;
		}
	}
	
function searchterm_handler_column_sort($column_name)
	{
		if($column_name)
		{
			$this->session->set_userdata('column_name', $column_name);
			return $column_name;
		}
		elseif($this->session->userdata('column_name'))
		{
			$column_name = $this->session->userdata('column_name');
			return $column_name;
		}
		else
		{
			$column_name ="candidate_name";
			return $column_name;
		}
	}
function searchterm_handler_order($order)
	{
		if($order)
		{
			$this->session->set_userdata('order', $order);
			return $order;
		}
		elseif($this->session->userdata('order'))
		{
			$order = $this->session->userdata('order');
			return $order;
		}
		else
		{
			$order ="ASC";
			return $order;
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
	 //
	 function addCandtoWorksheet($cand){
	    $data = array(
		'id' => $cand,
		'put_in_worksheet' =>1,
		);
	           
      $this->db->where('id',$cand);
	  $this->db->update('candidates', $data);
     }
	 //
	 
	 function addtoPof($position_details){
	           

            if ($this->db->insert('pof_candidates',$position_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	function movetoWorksheet($worksheet_details,$cand,$sworksheet)
	   {
	    $this->db->where('c_id',$cand);
		$this->db->where('constituent_id',$sworksheet);
	  $this->db->update('addtoworksheet1', $worksheet_details);
	   }
	   // 
	function addtoworksheet1($worksheet1_details){
	           

            if ($this->db->insert('addtoworksheet1',$worksheet1_details))
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
	  // add to position
	 function addtoposition($selection_details)
	   {
	    if($this->db->insert('pof_candidates',$selection_details))
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
		 $this->db->where('option', '405');
	     $Q = $this->db->get('addtofolder');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	 
	 function getFolderAll($username){
		// admin id is 2 and member id is 1
	     $data = array();
		 $this->db->distinct();
	     $this->db->select('p_id');
	   	 $this->db->where('option', '406');
	     $Q = $this->db->get('addtofolder');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	 
	 function getFolderShare($username){
		// admin id is 2 and member id is 1
	     $data = array();
		 $this->db->distinct();
	     $this->db->select('*');
	     $this->db->where('user', $username);
		 $this->db->group_by('p_id');
	     $Q = $this->db->get('addtofolder');
	     foreach ($Q->result() as $row)
        {
           $result[$row->p_id]= $row->p_id;
        }
         return $result;
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
		  
		function getCand($company){
	      $sql = 'SELECT * FROM synonym WHERE parentname="'.$company.'" OR synonym="'.$company.'"';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
		 function addParentid($id,$data)
		   {
		    if($this->db->where('id',$id)->update('candidates',$data))
			  {
			   return TRUE;
			  }
			  else
			  {
			   return FALSE;
			  }
		   }
		 function senttosyn($id,$data)
		   {
		    if($this->db->where('id',$id)->update('candidates',$data))
			  {
			   return TRUE;
			  }
			  else
			  {
			   return FALSE;
			  }
		   }
		    function getCandLoc($loc){
	       $sql = 'SELECT * FROM synonym WHERE (parentname="'.$loc.'" OR synonym="'.$loc.'") AND type="2" ';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
		  
		   function addtostatuslist($id){
         $data = array( 
		    'cdid' => $id,
			'location' => $this->input->post('current_location'),
			'designation' => $this->input->post('designation'),
			'institute' => $this->input->post('institute'),
			'course' => $this->input->post('course'),
			'industry' => $this->input->post('industry'),
			'indfunction' => $this->input->post('indfunction'),
			);
    if($this->db->insert('candstatus',$data))
	{
	 return $this->db->insert_id();
	}
	else{
	 return FALSE;
	}
  }
		   function addParentidStatus($id,$data)
		   {
		    if($this->db->where('cdid',$id)->update('candstatus',$data))
			  {
			   return TRUE;
			  }
			  else
			  {
			   return FALSE;
			  }
		   }
		   
		   function senttosynstatus($id,$data)
		   {
		    if($this->db->where('cdid',$id)->update('candstatus',$data))
			  {
			   return TRUE;
			  }
			  else
			  {
			   return FALSE;
			  }
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
		 // this gets the history of candidate
	  function getCandHistory($id)
	      {
		   $data = array();
		   $this->db->select('*');
		   $this->db->from('pof_candidates');
		   $this->db->join('pof','pof_candidates.pofid=pof.pof_id');
		   $this->db->join('company','pof.client_id=company.c_id','left');
		   $this->db->join('be_users','pof_candidates.user_id=be_users.id');
		   $this->db->where('pof_candidates.cand_id',$id);
		   $q = $this->db->get();
		   foreach($q->result() as $row)
		    {
			 $data[]=$row;
			}
			return $data;
		  }
	    // This retrieves candidate status
		  
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
			'industry' => $this->input->post('industry'),
			'sub_industry' => $this->input->post('sub_industry'),
			'indfunction' => $this->input->post('indfunction'),
			'sub_function' => $this->input->post('sub_function'),
			'previous_company' => $this->input->post('previous_company'),
			'course' => $this->input->post('course'),
			'institute' => $this->input->post('institute'),
			'year_of_passing' => $this->input->post('year_of_passing'),
			'year_of_birth' => $this->input->post('year_of_birth'),
			'profile_brief' => $this->input->post('profile_brief'),
			'comment' => $this->input->post('comment'),
			'last_updated' => date('Y-m-d H:i:s'),
			'last_updated_by' => $user,
			'company' => $this->input->post('current_company'),
			'cand_mgmt' => $this->input->post('cand_mgmt'),
	 		
	 	);
		$this->db->where('id',$id);
		$this->db->update('candidates',$data);	
	   }
	  
	   // This inserts the candidates inputs
 	   function upCandidate($id,$data){
	 	if($this->db->where('id',$id)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
//This sends the candidates to the del list.
   function deleteCandidate($candidateid,$user){
	 	$data = array(
		'id' => $candidateid,
		'deleted_on' => date('Y-m-d H:i:s'),
		'deleted_by' => $user,
		'is_to_Delete' => 1,
		);
	 	$this->db->where('id', $candidateid);
		$this->db->update('candidates',$data);	
	 }
	 
	 //This sends the candidates to the del list.
   function removeCandidatework($candidateid,$worktorem,$user){
	 	$this->db->where('c_id', id_clean($candidateid));
		$this->db->where('constituent_id', $worktorem);
		$this->db->delete('addtoworksheet1');	
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
		  //
		   // get jd to view
	    function getAttach($id){
	       $data=array();
		   $this->db->select('filepath,filename');
		   $this->db->from('files');
		   $this->db->where('file_id', $id);
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
	//
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
		$this->db->where('candidates.is_to_Delete',1);
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
	  //This deletes the part of master worksheet.
   function delCandDB($candidateid){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('id', id_clean($candidateid));
		$this->db->delete('candidates');	
	 }
	  //This deletes the part of master worksheet.
   function delCandDBW($candidateid){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('c_id', id_clean($candidateid));
		$this->db->delete('addtoworksheet1');	
	 }
	 
	 //This removes candidates from duplication manager list.
   function remCandDB($candidateid){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('cand_id', id_clean($candidateid));
		$this->db->delete('dupmanager');	
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
	 
	 
	function searchterm_handler_basicworksheet1($constituentpull)
	{
		if($constituentpull)
		{
			$this->session->set_userdata('constituentpull', $constituentpull);
			return $constituentpull;
		}
		elseif($this->session->userdata('constituentpull'))
		{
			$constituentpull = $this->session->userdata('constituentpull');
			return $constituentpull;
		}
		else
		{
			$constituentpull ="";
			return $constituentpull;
		}
		
	}
	 
 function searchterm_handler_basicworksheet2($basicworksheet_id)
	{
		if($basicworksheet_id)
		{
			$this->session->set_userdata('basicworksheet_id', $basicworksheet_id);
			return $basicworksheet_id;
		}
		elseif($this->session->userdata('basicworksheet_id'))
		{
			$basicworksheet_id = $this->session->userdata('basicworksheet_id');
			return $basicworksheet_id;
		}
		else
		{
			$basicworksheet_id ="";
			return $basicworksheet_id;
		}
		
	}
	
	function searchterm_handler_worksheett($worksheett)
	{
		if($worksheett)
		{
			$this->session->set_userdata('worksheett', $worksheett);
			return $worksheett;
		}
		elseif($this->session->userdata('worksheett'))
		{
			$worksheett = $this->session->userdata('worksheett');
			return $worksheett;
		}
		else
		{
			$worksheett ="";
			return $worksheett;
		}
		
	}
	
	 //gets the user details
	 function getUserDetails($username)
	  {
	    $data=array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where('id',$username);
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
		  
		   //gets comments details
	function getWorksheetComments($worksheetid)
	   {
	    $data = array();
		$this->db->select('*');
		$this->db->from('worksheet_scribbles');
		$this->db->join('be_users','worksheet_scribbles.sent_by=be_users.id','left');
		$this->db->where('worksheet_scribbles.workid', $worksheetid);
		$Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	       return $data; 
		  }
		 //
		 
	 function enterWorkScribble($worksheetid)
	   {
	    $sent_by = $this->session->userdata('id');
		$sent_on = date('Y-m-d h:i:s');
	     $data = array(
		 'workid' => $worksheetid,
		 'comment' => $this->input->post('comment'),
		 'date' => $sent_on,
		 'sent_by' => $sent_by
		 );
		 if($this->db->insert('worksheet_scribbles',$data))
		  {
		   return TRUE;
		  }
		  else{
		   return FALSE;
		  }
	   }
	   
	   // file attachemnt
	function do_upload_worksheet($attachemnt_details) {
		
	if ($this->db->insert('worksheet_attachment',$attachemnt_details))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
    
	}
	//
	    // This retrieves attachment list from database.
	function getWorksheetAttachmentList($worksheetid){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('worksheet_attachment');
		$this->db->where('work_id', $worksheetid);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	  
	     // get jd to view
	    function getWorkAttach($id){
	       $data=array();
		   $this->db->select('filepath,filename');
		   $this->db->from('worksheet_attachment');
		   $this->db->where('file_id', $id);
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
		  
		  // companywise counts
	function countPosition($worksheet)
	{
		$sql = "SELECT COUNT(DISTINCT pof_worksheet.pof_id) As cnt FROM pof_worksheet LEFT JOIN pof ON pof_worksheet.pof_id = pof.pof_id
WHERE pof_worksheet.worksheet_id ='".$worksheet."'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	
	function getPositionCount($worksheet,$limit)
	{
		$sql = "SELECT pof.pof_id,jobtitle FROM pof RIGHT JOIN pof_worksheet ON pof_worksheet.pof_id = pof.pof_id
WHERE pof_worksheet.worksheet_id ='".$worksheet."' LIMIT " .$limit . ",20 ";
		
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
	
	// companywise counts
	function countLocation($worksheet)
	{
		$sql = "SELECT COUNT(DISTINCT candidates.current_location) As cnt FROM candidates RIGHT JOIN addtoworksheet1 ON candidates.id=addtoworksheet1.c_id WHERE addtoworksheet1.constituent_id=".$worksheet." ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	
	function getLocationCount($worksheet,$limit)
	{
		$sql = "SELECT *,COUNT(DISTINCT candidates.id) As cnt1 FROM candidates RIGHT JOIN addtoworksheet1 ON candidates.id=addtoworksheet1.c_id WHERE addtoworksheet1.constituent_id=".$worksheet." GROUP BY candidates.current_location ORDER BY candidates.current_location LIMIT " .$limit . ",20 ";
		
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
	
	// companywise counts
	function countLocationFil($worksheet,$currentloc)
	{
		$sql = "SELECT COUNT(DISTINCT candidates.current_location) As cnt FROM candidates RIGHT JOIN addtoworksheet1 ON candidates.id=addtoworksheet1.c_id WHERE addtoworksheet1.constituent_id=".$worksheet." AND candidates.current_location LIKE '%".$currentloc."%' ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	
	function getLocationCountFil($worksheet,$currentloc,$limit)
	{
		$sql = "SELECT *,COUNT(DISTINCT candidates.id) As cnt1 FROM candidates RIGHT JOIN addtoworksheet1 ON candidates.id=addtoworksheet1.c_id WHERE addtoworksheet1.constituent_id=".$worksheet." AND candidates.current_location LIKE '%".$currentloc."%' GROUP BY candidates.current_location ORDER BY candidates.current_location LIMIT " .$limit . ",20 ";
		
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
	
	function getIndusDropDown(){
	 
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id','1');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	}
	
	function getFuncDropDown(){
	 
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id','2');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	}
	
	function getSubIndus(){
	 
		$industryid = $this->input->post('industryid');
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_child_name');
		$this->db->where_in('parent_id',$industryid);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->child_id]= $row->child_name;
        }
        
        return $result;
	} 
	
	function getSubFunc(){
	 
		$indfunction = $this->input->post('indfuncid');
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_child_name');
		$this->db->where_in('parent_id',$indfunction);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->child_id]= $row->child_name;
        }
        
        return $result;
	} 
	
	//count current tags
	function countCurrentTags($worksheet)
	   {
	   $sql = "SELECT COUNT(*) As cnt FROM tags_worksheet WHERE worksheet_id='".$worksheet."'";
	     $q = $this->db->query($sql);
		 $row = $q->row();
		 return $row->cnt;
	   }
	 // get the current tags for worksheeet
	 function getCurrentTags($worksheet)
	    {
		  $sql = "SELECT * FROM tags_worksheet JOIN tags ON tags.t_id=tags_worksheet.tagw_id WHERE tags_worksheet.worksheet_id='".$worksheet."'";
		   $query = $this->db->query($sql);
		    if($query->num_rows()>0)
			 {
			  foreach($query->result() as $row)
			   {
			    $data[] = $row;
			   }
			   return $data;
			 }
			 
		}
	// for suggested Tags
	//count current tags
	function countSuggestedTags($worksheet)
	   {
	   $sql = "SELECT COUNT(*) As cnt FROM tags_worksheet WHERE worksheet_id='".$worksheet."'";
	     $q = $this->db->query($sql);
		 $row = $q->row();
		 return $row->cnt;
	   }
	 // get the current tags for worksheeet
	 function getSuggestedTags($worksheet)
	    {
		  $sql = "SELECT * FROM tags LEFT JOIN tags_worksheet ON tags.t_id=tags_worksheet.tagw_id WHERE tags_worksheet.tagw_id IS NULL";
		   $query = $this->db->query($sql);
		    if($query->num_rows()>0)
			 {
			  foreach($query->result() as $row)
			   {
			    $data[] = $row;
			   }
			   return $data;
			 }
			 
		}
		
		function newTag()
		   {
		     $data = array('tag_name'=>$this->input->post('newtag'));
		     if($this->db->insert('tags',$data))
			  {
			   return TRUE;
			  }
			  else
			  {
			   return FALSE;
			  }
		   }
		   
		function addTags($tag_data)
		   {
		    if($this->db->insert('tags_worksheet',$tag_data))
			  {
			   return TRUE;
			  }
			  else
			  {
			   return FALSE;
			  }
		   }
	 
	 function countAllTags()
	   {
	   $sql = "SELECT COUNT(*) As cnt FROM tags";
	     $q = $this->db->query($sql);
		 $row = $q->row();
		 return $row->cnt;
	   }
	 // get the current tags for worksheeet
	 function getAllTags($limit)
	    {
		  $sql = "SELECT * , COUNT( DISTINCT worksheet_id ) AS worksheet, COUNT( DISTINCT position_id ) AS position, COUNT( DISTINCT candidate_id ) AS candidate FROM tags LEFT JOIN tags_worksheet ON tags.t_id = tags_worksheet.tagw_id LEFT JOIN tags_position ON tags.t_id = tags_position.tagp_id LEFT JOIN tags_candidate ON tags.t_id = tags_candidate.tagc_id GROUP BY tags.t_id LIMIT " .$limit . ",10 ";
		   $query = $this->db->query($sql);
		    if($query->num_rows()>0)
			 {
			  foreach($query->result() as $row)
			   {
			    $data[] = $row;
			   }
			   return $data;
			 }
			 
		}
		
		function saveMapping($data){
   
    if($this->db->insert('candidates',$data))
	{
	 return $this->db->insert_id();
	}
	else{
	 return FALSE;
	}
  }
    function getMyRecentSheet($user,$sheetname)
	{
	
		$sql = "SELECT * FROM candidates WHERE entered_by='".$user."' AND sheetname='".$sheetname."'";
		
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
	
	function getMyAllSheets($user)
	{
	
		$sql = "SELECT * FROM candidates WHERE entered_by='".$user."' AND sheetname != ' ' GROUP BY sheetname";
		
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
	
	function getWorksheetName($basicworksheet)
	{
		 $sql = "SELECT worksheet_name FROM worksheet WHERE id='".$basicworksheet."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->worksheet_name;
	}
	
	
	function getInputTypeList(){
	 
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
	    $this->db->where('segment_type_id','16');
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	}
	
	function getCandFol($p_id)
	  {
	      $sql = 'SELECT c_id FROM addtofolder WHERE p_id="'.$p_id.'"';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
}

 