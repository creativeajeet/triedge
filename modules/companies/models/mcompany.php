<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MCompany extends Base_model{

    function MCompany(){
        parent::Base_model();
	$this->_TABLES = array( 
                            'Table' => 'company'
                         );
                    }

    
	
	function count_companies()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM companies";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getCompanyList($limit){
       $sql="SELECT * FROM companies JOIN synonym ON companies.compid=synonym.s_id ORDER BY synonym.parentname LIMIT " .$limit . ",20 ";
		
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
	 function count_clients()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM companies WHERE companies.is_client='334'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientList($limit){
       $sql="SELECT * FROM companies JOIN synonym ON companies.compid=synonym.s_id WHERE companies.is_client='334' ORDER BY synonym.parentname LIMIT " .$limit . ",20 ";
		
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
	
	function count_bd_target()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM companies WHERE companies.bd_target='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getBDTarget($limit){
       $sql="SELECT * FROM companies JOIN synonym ON companies.compid=synonym.s_id WHERE companies.bd_target='1' ORDER BY synonym.parentname LIMIT " .$limit . ",20 ";
		
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
	
	function count_clients_hr()
	{
		 $sql = "SELECT COUNT(DISTINCT candidates.id) As cnt FROM candidates LEFT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND candidates.is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientHR($limit){
       $sql="SELECT *,candidates.designation As desig FROM candidates LEFT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND candidates.is_to_Delete = 0 GROUP BY candidates.candidate_name ORDER BY candidates.company LIMIT " .$limit . ",20 ";
		
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
	
	function count_clients_hr_fil($company,$location,$consul)
	{
		 $sql = "SELECT COUNT(DISTINCT candidates.id) As cnt FROM candidates LEFT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND candidates.is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientHRFil($limit,$company,$location,$consul){
       $sql="SELECT *,candidates.designation As desig FROM candidates LEFT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND candidates.is_to_Delete = 0 AND candidates.company LIKE '%".$company."%' AND candidates.current_location LIKE '%".$location."%' GROUP BY candidates.candidate_name ORDER BY candidates.company LIMIT " .$limit . ",20 ";
		
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
	
	function count_clients_hr_filter($company,$location,$consul)
	{
		 $sql = "SELECT COUNT(DISTINCT candidates.id) As cnt FROM candidates LEFT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND candidates.is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientHRFilter($limit,$company,$location,$consul)
	{
       $sql="SELECT *,candidates.designation As desig FROM candidates LEFT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND candidates.is_to_Delete = 0 AND candidates.company LIKE '%".$company."%' AND candidates.current_location LIKE '%".$location."%' GROUP BY candidates.candidate_name ORDER BY candidates.company LIMIT " .$limit . ",20 ";
		
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
	
	function count_clients_hr_app()
	{
		 $sql = "SELECT COUNT(DISTINCT pof.hiring_manager) As cnt FROM candidates RIGHT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND pof.manager !='0' AND candidates.is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientHRApp($limit){
       $sql="SELECT *,candidates.designation As desig FROM candidates RIGHT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND pof.manager !='0' AND candidates.is_to_Delete = 0 GROUP BY pof.hiring_manager LIMIT " .$limit . ",20 ";
		
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
	
	function count_clients_hr_pen()
	{
		 $sql = "SELECT COUNT(DISTINCT pof.hiring_manager) As cnt FROM candidates RIGHT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND pof.manager='0' AND candidates.is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientHRPen($limit){
       $sql="SELECT *,candidates.designation As desig FROM candidates RIGHT JOIN pof ON candidates.id=pof.hiring_manager WHERE candidates.cand_mgmt='329' AND pof.manager='0' AND candidates.is_to_Delete = 0 GROUP BY pof.hiring_manager LIMIT " .$limit . ",20 ";
		
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
	
	
	 
	 // This retrieve the single pof detail
	   function getCompDetail($cid){
		   $data=array();
		  $this->db->select('*');
		   $this->db->from('synonym');
		   $this->db->where('synonym.s_id', $cid);
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
	 
	 function importfiles($sql){
      $this->load->database();
      $this->db->query($sql);
      }
	 // This gets a list of client names fro dropdown
	 function getClientDropdown()
	    {
		 $data = array();
		 $this->db->from('companies');
		 $this->db->join('synonym','companies.compid=synonym.s_id');
		 $this->db->order_by('parentname','ASC');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->compid]=$row->parentname;
		  }
		  return $data;
		}
		
		function getAgreeDropdown()
	    {
		 $data = array();
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id','15');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->id]=$row->segment_name;
		  }
		  return $data;
		}
		
		function getPeriodDropdown()
	    {
		 $data = array();
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id','14');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->id]=$row->segment_name;
		  }
		  return $data;
		}
	 // This retrieves the single company record.
/*	 function getSingleCompany($id){
		   $data = array();
	       $this->db->select('*');
		   $this->db->from('company');
		   $this->db->where('id', $id);
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
	   */
	  
	// This retrieves all the HR record.
	function getHr(){
        $data = array();
        $this->db->select('*');
	    $this->db->from('hrmanager');
       //$this->db->where('client', 1); 
	    $query = $this->db->get();
	    if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row)
			   {
                $data[]=$row;
               }
             }
        $query->free_result();
        return $data;
    }


     // This is for getting company id
    function getCc(){
        $this->db->insert_id();
		$this->db->from('company');
	   $query = $this->db->get();
	   $query->free_result();
       
    }
	// gets the username
	function getUsername($id=NULL){
        $data = array();
	    $this->db->select('*');
	    $this->db->from('be_users');
        $this->db->where('id', $id);
	    $query = $this->db->get();
	    if ($query->num_rows() > 0){
                  foreach ($query->result_array() as $row)
				  {
                     $data=$row;
                  }
             }
        $query->free_result();
        return $data;
    }
     function getIndustryList()
	   {
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',1);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->id] = $row->segment_name;
		  }
		  
	  return $result;
	}
	function getFirmList()
	   {
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',8);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->id] = $row->segment_name;
		  }
		  
	  return $result;
	}
	
	function getCompTypeList()
	   {
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',7);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->id] = $row->segment_name;
		  }
		  
	  return $result;
	}
	
	function getRelationTypeList()
	   {
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',13);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->id] = $row->segment_name;
		  }
		  
	  return $result;
	}
	
	function getFunctionList()
	   {
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',2);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->id] = $row->segment_name;
		  }
		  
	  return $result;
	}
	function getLocationList()
	   {
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('synonym');
		 $this->db->where('type',2);
		 $this->db->where('is_parent',1);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->s_id] = $row->parentname;
		  }
		  
	  return $result;
	}
     // This inserts the company inputs into the database
     function enterNewCompany(){
	            $company_data = array(
                'c_id' => $this->input->post('id'),
                'comp' => $this->input->post('comp'),
				'industry' => $this->input->post('industry'),
				'client' => $this->input->post('client'),
				
		        );
            if ($this->db->insert('company',$company_data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
         }
		
		 function do_upload($attachemnt_details) {
		
	if ($this->db->insert('companies_attachments',$attachemnt_details))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
    
	}
	 // This inserts the client details into the database
     function addClientDetails($client_id){
	            $client_data = array(
                'id' => $this->input->post('id'),
                'client_id' => $client_id,
				'start' => $this->input->post('start'),
				'end' =>$this->input->post('end'),
				'agmwith' => $this->input->post('agmwith'),
				'agmrcvd'=> $this->input->post('agmrcvd'),
				'agmstatus'=> $this->input->post('agmstatus'),
				'additional' =>$this->input->post('additional'),
		        );
            if ($this->db->insert('client',$client_data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
         }
	
	  // This retrieve the single company detail
	   function getSingleCompany($cid){
		   $data=array();
		   $this->db->select('*');
		   $this->db->from('companies');
		   $this->db->join('companies_client_terms','companies.compid=companies_client_terms.clientid');
		   $this->db->where('companies.compid', $cid);
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
	    // This retrieve the single client detail
	   function getSingleClient($cid){
		   $data=array();
		   $this->db->select('*');
		   $this->db->from('client');
		 
		   $this->db->where('client.client_id', $cid);
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
	  // edit company details
	   // This inserts the company inputs into the database
     function editCompany($compid){
	            $company_data = array(
                'compid' => $compid,
                'comptype' => $this->input->post('comptype'),
				'agmwith' => $this->input->post('agmwith'),
				'groupname' => $this->input->post('groupname'),
				'weblink' => $this->input->post('weblink'),
				'globalloc' => $this->input->post('globalloc'),
				'indialoc' => $this->input->post('indialoc'),
				'industry' => $this->input->post('industry'),
				'synopsis' => $this->input->post('synopsis'),
				
		        );
         
		   $this->db->where('compid', $compid);
		   $this->db->update('companies', $company_data);
         }
	  
	  	 // This inserts the client details into the database
     function editClientDetails($cid){
	            $client_data = array(
                'client_id' => $cid,
				'start' => $this->input->post('start'),
				'end' =>$this->input->post('end'),
				'agmwith' => $this->input->post('agmwith'),
				'agmrcvd'=> $this->input->post('agmrcvd'),
				'agmstatus'=> $this->input->post('agmstatus'),
				'additional' =>$this->input->post('additional'),
		        );
          $this->db->where('client_id', $cid);
		   $this->db->update('client', $client_data);
         }
	 // This updates the company inputs into the database
     function updateCompany($id){
	            $company_data = array(
                'c_id' => $this->input->post('id'),
                'comp' => $this->input->post('comp'),
				'type' => $this->input->post('type'),
				'client' => $this->input->post('client'),
				'agmwith' => $this->input->post('agmwith'),
				'start' => $this->input->post('start'),
				'end' =>$this->input->post('end'),
				'open'=> $this->input->post('open'),
				'agmstatus'=> $this->input->post('agmstatus'),
				'agmrcvd'=> $this->input->post('agmrcvd'),
				'additional' =>$this->input->post('additional'),
		        );
         $this->db->where('id', $id);
         $this->db->update('company', $company_data); 
         }
		 
		  // This retrieves attachment list from database.
	function getAttachmentList($cid){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('companies_attachments');
		$this->db->where('comp_id', $cid);
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
	    function getAttach($id){
	       $data=array();
		   $this->db->select('filepath,filename');
		   $this->db->from('companies_attachments');
		   $this->db->where('id', $id);
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
		  
		  function getCompp($compid){
	       $data=array();
		   $this->db->select('parentname');
		   $this->db->from('synonym');
		   $this->db->where('s_id', $compid);
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
		  
	  function fetch_filespaa()
	    {
		
		$sql="SELECT * FROM synonym WHERE type='2' AND is_parent='1'";
		
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
	
	 function fetch_comp()
	    {
		
		$sql="SELECT * FROM synonym WHERE companypage='1'";
		
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
	
	function count_employeedb($company)
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates LEFT JOIN synonym ON candidates.prid=synonym.s_id WHERE synonym.parentname='".$company."' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getEmployeeDB($company,$limit){
       $sql="SELECT * FROM candidates LEFT JOIN synonym ON candidates.prid=synonym.s_id WHERE synonym.parentname='".$company."' ORDER BY candidates.candidate_name LIMIT " .$limit . ",20 ";
		
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
	
	
	function count_hrmanagers($company)
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates LEFT JOIN synonym ON candidates.prid=synonym.s_id WHERE synonym.parentname='".$company."' AND cand_mgmt='329' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getHRManagers($company,$limit){
       $sql="SELECT *,pri.username As priclientmgr, sec.username As secclientmgr,candidates.id As can FROM candidates LEFT JOIN synonym ON candidates.prid=synonym.s_id LEFT JOIN pof ON candidates.id=pof.hiring_manager LEFT JOIN be_users As pri ON pof.manager=pri.id LEFT JOIN be_users As sec ON pof.sec_manager=sec.id WHERE synonym.parentname='".$company."' AND cand_mgmt='329' GROUP BY candidates.candidate_name ORDER BY candidates.candidate_name LIMIT " .$limit . ",20 ";
		
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
	
	function count_clienttans($cid)
	{
		  $sql = "SELECT COUNT(*) As cnt FROM pof WHERE client_id='".$cid."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientTrans($cid,$limit){
      $sql = "SELECT *,SUM(stage='cvsent') As sum1, SUM(stage='client_reject') As sum2, SUM(stage='291') As sum3, SUM(stage='offer') As sum4, COUNT(DISTINCT cand_id) As count2 FROM pof LEFT JOIN candidates ON pof.hiring_manager=candidates.id LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN company ON company.c_id=pof.client_id LEFT JOIN segment_name ON segment_name.id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN be_users ON pof.client_mgr=be_users.id WHERE pof.client_id='".$cid."' GROUP BY pof.pof_id ORDER BY pof.hiring_manager DESC LIMIT " .$limit . ",20 ";
		
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
	
	function getRating($rating1){
	       $sql = 'SELECT * FROM segment_name WHERE segment_name="'.$rating1.'"';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	           return TRUE; 
	      }
	      else{
		  return FALSE;
		  }
		  }
		  
	 function getGrade($grade1){
	       $sql = 'SELECT * FROM segment_name WHERE segment_name="'.$grade1.'"';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	           return TRUE; 
	      }
	      else{
		  return FALSE;
		  }
		  }
	function checkRating($cid){
	       $sql = 'SELECT * FROM companies_rating WHERE cid="'.$cid.'"';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	           return TRUE; 
	      }
	      else{
		  return FALSE;
		  }
		  }
		  
	  function checkGrade($cid){
	       $sql = 'SELECT * FROM companies_grade WHERE cid="'.$cid.'"';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	           return TRUE; 
	      }
	      else{
		  return FALSE;
		  }
		  }
		  
		  function addRatingList($rating1)
	  {
	    $data = array(
		'segment_name' => $rating1,
		'segment_type_id' => '9',
		);
	  if($this->db->insert('segment_name',$data))
	    {
		 return TRUE;
		}
		else{
		return FALSE;
		}
	  }
	  
	  function addGradeList($grade1)
	  {
	    $data = array(
		'segment_name' => $grade1,
		'segment_type_id' => '10',
		);
	  if($this->db->insert('segment_name',$data))
	    {
		 return TRUE;
		}
		else{
		return FALSE;
		}
	  }
	  
	  	 
	function updateRating($rid,$data)
	  {
	  if($this->db->where('rid',$rid)->update('companies_rating',$data))
	    {
		 return TRUE;
		}
		else{
		return FALSE;
		}
	  }
	  
	  function updateGrade($gid,$data)
	  {
	  if($this->db->where('gid',$gid)->update('companies_grade',$data))
	    {
		 return TRUE;
		}
		else{
		return FALSE;
		}
	  }
	  
	 function addRating($data)
	  {
	  if($this->db->insert('companies_rating',$data))
	    {
		 return TRUE;
		}
		else{
		return FALSE;
		}
	  }
	  
	  function getLevelDrop()
	   {
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',11);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->id] = $row->segment_name;
		  }
		  
	  return $result;
	}
	
	   function addGrade($data)
	  {
	  
	  if($this->db->insert('companies_grade',$data))
	    {
		 return TRUE;
		}
		else{
		return FALSE;
		}
	  }
	  
	  // This retrieves all the company record.
    function getRatingGrid($cid){
       $sql="SELECT * FROM companies_rating WHERE cid='".$cid."' ORDER BY status";
		
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
	 // This retrieves all the company record.
    function getGradeStruc($cid){
       $sql="SELECT * FROM companies_grade WHERE cid='".$cid."' ORDER BY status";
		
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
	  // This retrieves all the company record.
    function getGradeStruct($cid){
       $sql="SELECT * FROM companies_grade LEFT JOIN segment_name ON companies_grade.level=segment_name.id WHERE companies_grade.cid='".$cid."' ORDER BY companies_grade.status";
		
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
	
	  // This retrieves all the company record.
    function getCompComments($cid){
       $sql="SELECT * FROM companies_scribbles JOIN be_users ON companies_scribbles.userid=be_users.id WHERE companies_scribbles.cid='".$cid."' ORDER BY companies_scribbles.date DESC";
		
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
	
	function addComment($cid)
	  {
	   $data = array(
	    'cid' => $cid,
		'comment' => $this->input->post('comment'),
		'userid' => $this->session->userdata('id'),
		'date' => date('Y-m-d'),
		);
	  if($this->db->insert('companies_scribbles',$data))
	    {
		 return TRUE;
		}
		else{
		return FALSE;
		}
	  }
	 
	 function save($compid){
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
			'prid' => $compid,
			'sent_to_synonym' =>1,
			'is_company_updated' =>1,
	 		
	 	);
    if($this->db->insert('candidates',$data))
	{
	 return $this->db->insert_id();
	}
	else{
	 return FALSE;
	}
  }
  
   function getAllGradeList($compid){
	 
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
	    $this->db->where('cid',$compid);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->grade]= $row->grade;
        }
        
        return $result;
	}
	
	function getAllLevelList($compid){
	 
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
	    $this->db->join('segment_name','companies_grade.level=segment_name.id');
	    $this->db->where('companies_grade.cid',$compid);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->segment_name]= $row->segment_name;
        }
        
        return $result;
	}
	
	function getContractDropdown()
	    {
		 $data = array();
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id','17');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->id]=$row->segment_name;
		  }
		  return $data;
		}
		function getSentToDropdown()
	    {
		 $data = array();
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id','18');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->id]=$row->segment_name;
		  }
		  return $data;
		}
		function getSendByDropdown()
	    {
		 $data = array();
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id','19');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->id]=$row->segment_name;
		  }
		  return $data;
		}
		
	function updateClientTerms($clientid)
	  {
	     $data = array(
		 'contract_type' => $this->input->post('contracttype'),
		 'start_date' => $this->input->post('startdate'),
		 'end_date' => $this->input->post('enddate'),
		 'agmwith' => $this->input->post('agmwith'),
		 'contract_assurance' => $this->input->post('contractassurance'),
		 'rfp' => $this->input->post('rfp'),
		 'tentative_date' => $this->input->post('tentativedate'),
		 'remarks' => $this->input->post('remarks'),
		 'otherterms' => $this->input->post('otherterms'),
		 'bill_sent_to' => $this->input->post('billsentto'),
		 'bill_send_by' => $this->input->post('billsendby'),
		 'bill_instruc' => $this->input->post('instruction'),
		 );
		 if($this->db->where('clientid',$clientid)->update('companies_client_terms',$data))
		   {
		    return TRUE;
		   }
		   else{
		   return FALSE;
		   }
	  }
	 
	 function updateGradeFee($gid,$data)
	  {
	   $this->db->where('gid',$gid)->update('companies_grade',$data);
	   return TRUE;
	  }
	  
	   // This retrieves all the company record.
    function getSignatories($cid){
       $sql="SELECT * FROM candidates WHERE cand_mgmt='411' AND prid='".$cid."' ORDER BY candidates.candidate_name";
		
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
	
	// for locations names
	  function getLocName(){
	     $result = array();
		 $this->db->select('*');
		 $this->db->from('synonym');
		 $this->db->where('type',2);
		 $this->db->where('is_parent',1);
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->parentname] = $row->parentname;
		  }
		  
	  return $result;
	}
	
	// for locations names
	  function getConsuls(){
	     $result = array();
		 $this->db->select('*');
		$this->db->from('be_users');
			$this->db->where('group',3);
			$this->db->where('active',1);
			$this->db->order_by('be_users.username','ASC');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		    $result[$row->id] = $row->username;
		  }
		  
	  return $result;
	}
	
	function searchterm_handler_company($clients)
	{
		if($clients)
		{
			$this->session->set_userdata('clients', $clients);
			return $clients;
		}
		elseif($this->session->userdata('clients'))
		{
			$clients = $this->session->unset_userdata('clients');
			return $clients;
		}
		else
		{
			$clients ="";
			return $clients;
		}
	}
	
	function searchterm_handler_location($locations)
	{
		if($locations)
		{
			$this->session->set_userdata('locations', $locations);
			return $locations;
		}
		elseif($this->session->userdata('locations'))
		{
			$locations = $this->session->unset_userdata('locations');
			return $locations;
		}
		else
		{
			$locations ="";
			return $locations;
		}
	}
	
	function searchterm_handler_consul($consultants)
	{
		if($consultants)
		{
			$this->session->set_userdata('consultants', $consultants);
			return $consultants;
		}
		elseif($this->session->userdata('consultants'))
		{
			$consultants = $this->session->unset_userdata('consultants');
			return $consultants;
		}
		else
		{
			$consultants ="";
			return $consultants;
		}
	}
	
	 function updateClient($compa)
		   {
		  
		   $sql = "UPDATE companies SET is_client='334' WHERE compid =".$compa;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
		   
      function updateBD($compa)
		   {
		  
		   $sql = "UPDATE companies SET bd_target='1' WHERE compid =".$compa;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
	 
}
