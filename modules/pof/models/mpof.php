<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPof extends Base_model{

	function MPof(){
		parent::Base_model();
		$this->_TABLES = array( 'pof' => 'pof'
          );
	    }
	// this counts all the pofs.
	function record_count()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM pof";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
    // This retrieves all the POF's record from database
	 function getAllRecord($limit,$column_name,$order){
	 	$sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid GROUP BY pof.pof_id ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
	   $Q = $this->db->query($sql);
	if($Q->num_rows() > 0){
	foreach($Q->result() as $row)
	{
	 $data[] = $row;
	}
	}
	 $Q->free_result();  
	    return $data; 
   }
	  //
	   // This retrieves all the POF's record from database
	 function getFilterRecord($limit,$column_name,$order,$pofno,$dor,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul){
	 
	    $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2, synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON  pof.pof_id=pof_cons.pos_id WHERE pof.jobtitle LIKE '%".$jobtitle."%' AND synonym.parentname LIKE '%".$company."%' AND pof.grade LIKE '%".$grade."%' AND pof.sal_t LIKE '%".$salary."%' AND pof.pos_status LIKE '%".$posstatus."%' AND pof_cons.consuls LIKE '%".$consul."%' GROUP BY pof.pof_id ;";
	 	
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
	  
	    // This retrieves all the POF's record from database
	 function getFilterRecordUn($limit,$column_name,$order,$pofno,$dor,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul){
	 
	    $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2, synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON  pof.pof_id=pof_cons.pos_id WHERE pof.is_allocated='0' AND pof.not_pursue='0' AND pof.jobtitle LIKE '%".$jobtitle."%' AND synonym.parentname LIKE '%".$company."%' AND pof.grade LIKE '%".$grade."%' AND pof.sal_t LIKE '%".$salary."%' AND pof.pos_status LIKE '%".$posstatus."%' GROUP BY pof.pof_id ;";
	 	
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
	    // This retrieves all the POF's record from database
	 function getFilterRecordUnalloc($limit,$start,$column_name,$order,$pofno,$dor,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul){
	 
	 $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2, synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON  pof.pof_id=pof_cons.pos_id WHERE pof.jobtitle LIKE '%".$jobtitle."%' AND synonym.parentname LIKE '%".$company."%' AND pof.grade LIKE '%".$grade."%' AND pof.sal_t LIKE '%".$salary."%' AND pof.pos_status LIKE '%".$posstatus."%' AND pof_cons.consuls LIKE '%".$consul."%' GROUP BY pof.pof_id ;";
	 	
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
	  
	   // This retrieves all the POF's record from database datewise
	 function getAllPofbtDate($from,$to,$column_name,$order){
	 
	   $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id WHERE pos_taken_on BETWEEN '".$from."' AND '".$to."' GROUP BY pof.pof_id ORDER BY ".$column_name." ".$order.";";
	 	
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
	  ////
function searchterm_handler_column($column_name)
	{
		if($column_name)
		{
			$this->session->set_userdata('column_name_pof', $column_name);
			return $column_name;
		}
		elseif($this->session->userdata('column_name_pof'))
		{
			$column_name = $this->session->userdata('column_name_pof');
			return $column_name;
		}
		else
		{
			$column_name ="pof.pof_id";
			return $column_name;
		}
	}
function searchterm_handler_order($order)
	{
		if($order)
		{
			$this->session->set_userdata('order_pof', $order);
			return $order;
		}
		elseif($this->session->userdata('order_pof'))
		{
			$order = $this->session->userdata('order_pof');
			return $order;
		}
		else
		{
			$order ="DESC";
			return $order;
		}
	}
	  // sorting
	  function sortColumn($column,$order)
	   {
	    $data = array();
		$this->db->select('*');
		$this->db->from('pof');
		$this->db->join('company', 'company.c_id=pof.client_id', 'left');
		$this->db->join('segment_name', 'segment_name.id=pof.location', 'left');
		$this->db->join('pof_cons', 'pof.pof_id=pof_cons.pos_id', 'left');
		$this->db->order_by($column, $order);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result() as $row){
	        $data[] = $row;
	      }
	    }
	   
	    return $data;  
	   }
	   //
	   //column sort allocated
	   // sorting
	  function sortColumnAllocated($column,$order)
	   {
	    $data = array();
		$this->db->from('pof');
		$this->db->join('company', 'company.c_id=pof.client_id', 'left');
		$this->db->join('segment_name', 'segment_name.id=pof.location', 'left');
		$this->db->join('pof_cons', 'pof.pof_id=pof_cons.pos_id', 'left');
		$this->db->join('allocation','pof.pof_id=allocation.p_id','left');
		$this->db->join('events_tt', 'pof.pof_id=events_tt.pof_id', 'left');
		$this->db->where('pof.is_allocated',1);
		$this->db->order_by($column, $order);
		$this->db->group_by('pof.pof_id');
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result() as $row){
	        $data[] = $row;
	      }
	    }
	   
	    return $data;  
	   }
	   //
	   
	 /*   // This retrieves all the POF's record which are allocated  from database
	 function getAllRecordAllocated($column_name,$order){
	     $sql = "SELECT *,SUM(stage='cvsent') As sum1, SUM(stage='client_reject') As sum2, SUM(stage='interview_shortlist') As sum3, SUM(stage='offer') As sum4, SUM(stage='databank') As count2 FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN company ON company.c_id=pof.client_id LEFT JOIN segment_name ON segment_name.id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN allocation ON pof.pof_id=allocation.p_id LEFT JOIN events_tt ON pof.pof_id=events_tt.pof_id WHERE pof.is_allocated='1' AND pof.not_pursue='0' GROUP BY pof.pof_id ORDER BY ".$column_name." ".$order.";";
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
	  */
	  //counts all allocated positions
	  function record_count_allocated()
	  {
		 $sql = "SELECT COUNT(*) As cnt FROM pof WHERE is_allocated='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	  // This retrieves all the POF's record which are allocated  from database
	 function getAllRecordAllocated($limit,$column_name,$order){
	 	$sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN (SELECT * FROM events_tt WHERE is_alloc='1' GROUP BY pof_id) As was ON pof.pof_id=was.pof_id LEFT JOIN allocation ON was.alloc_id=allocation.id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid WHERE pof.is_allocated='1' AND pof.not_pursue='0' GROUP BY pof.pof_id ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
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
	  
	   // This retrieves all the POF's record which are allocated  from database
	 function getManagerList($column_name,$order){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('pof');
		$this->db->join('company', 'company.c_id=pof.client_id', 'left');
		$this->db->join('segment_name', 'segment_name.id=pof.location', 'left');
		$this->db->join('pof_cons', 'pof.pof_id=pof_cons.pos_id', 'left');
		$this->db->join('allocation','pof.pof_id=allocation.p_id','left');
		$this->db->join('events_tt', 'pof.pof_id=events_tt.pof_id', 'left');
		$this->db->where('pof.is_allocated',1);
		$this->db->order_by($column_name, $order);
		$this->db->group_by('pof.pof_id');
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result() as $row){
	        $data[] = $row;
	      }
	    }
	   
	    return $data;  
	  }
	  //
	  // This retrieves all the POF's record which are unallocated from database
	 function getAllRecordUnAlloc($column_name,$order){
	 	$sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid WHERE pof.is_allocated ='0' AND pof.not_pursue ='0' GROUP BY pof.pof_id ORDER BY ".$column_name." ".$order." ";
	   $Q = $this->db->query($sql);
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result() as $row){
	        $data[] = $row;
	      }
	    }
	   
	    return $data;  
	  }
	  //
	  
	  // This retrieves all the POF's record which are allocated  from database
	 function getAllActiveRecord($column_name,$order){
	 	$sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN (SELECT * FROM events_tt WHERE is_alloc='1' GROUP BY pof_id) As was ON pof.pof_id=was.pof_id LEFT JOIN allocation ON was.alloc_id=allocation.id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid WHERE (pof.pos_status='wip_urgent' OR pof.pos_status='wip_active') AND pof.is_allocated='1' AND pof.not_pursue='0' GROUP BY pof.pof_id ORDER BY ".$column_name." ".$order.";";
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
	  
	  // This retrieves all the POF's record from database
	 function getFilterRecordActive($limit,$start,$column_name,$order,$pofno,$dor,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul){
	 
	   $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2, synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON  pof.pof_id=pof_cons.pos_id LEFT JOIN (SELECT * FROM events_tt WHERE is_alloc='1' GROUP BY pof_id) As was ON pof.pof_id=was.pof_id LEFT JOIN allocation ON was.alloc_id=allocation.id WHERE pof.jobtitle LIKE '%".$jobtitle."%' AND synonym.parentname LIKE '%".$company."%' AND pof.grade LIKE '%".$grade."%' AND pof.sal_t LIKE '%".$salary."%' AND pof.pos_status LIKE '%".$posstatus."%' AND pof_cons.consuls LIKE '%".$consul."%' AND (pof.pos_status='wip_urgent' OR pof.pos_status='wip_active') GROUP BY pof.pof_id ;";
	 	
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
	  // This retrieves all the POF's record which are unallocated from database
	 function getAllRecordNotPursue(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('pof');
		$this->db->join('company', 'company.c_id=pof.client_id', 'left');
		$this->db->join('segment_name', 'segment_name.id=pof.location', 'left');
		$this->db->join('pof_cons', 'pof.pof_id=pof_cons.pos_id', 'left');
		$this->db->join('companies_grade', 'pof.grade=companies_grade.gid', 'left');
		$this->db->where('pof.is_allocated','0');
		$this->db->where('pof.not_pursue',1);
		$this->db->order_by('pof.pof_id', 'DESC');
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result() as $row){
	        $data[] = $row;
	      }
	    }
	   
	    return $data;  
	  }
	  //
	   // This retrieves all the POF's record from database
	 function getAllRecordCon($consul){
	 	$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where_in('id',$consul);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->username;
        }
        
        return $result;
	}	
	  // get jd to view
	    function getJD($id){
	       $data=array();
		   $this->db->select('filepath,filename');
		   $this->db->from('pof_attachment');
		   $this->db->where('pof_id', $id);
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
		   $this->db->from('pof_attachment');
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
	//
	  function getConsulName(){
		$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where('active',1);
		$this->db->where('group',3);
		$this->db->or_where('group',4);
		$this->db->or_where('group',2);
		$this->db->order_by('be_users.username','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->username;
        }
        
        return $result;
	}
	
	 function getHRManager(){
		$result = array();
		$this->db->select('*');
		$this->db->from('candidates');
		$this->db->where('cand_mgmt','329');
		 $this->db->order_by('candidate_name','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->candidate_name;
        }
        
        return $result;
	}
	
	 function getHRManagerEdit($pid){
		$result = array();
		$this->db->select('*');
		$this->db->from('pof');
		$this->db->join('synonym','pof.client_id=synonym.s_id');
		$this->db->join('candidates','synonym.parentname=candidates.company');
		$this->db->where('pof.pof_id',$pid);
		$this->db->where('candidates.cand_mgmt','329');
		 $this->db->order_by('candidates.candidate_name','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->candidate_name;
        }
        
        return $result;
	}
		
	 //gets the user details
	 function getUserDetails($userid)
	  {
	    $data=array();
		$this->db->from('be_users');
		$this->db->where('id',$userid);
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

   // gets last pof id
     function getLastPofId()
	     {
		       
		        $query = $this->db->query('SELECT max(pof_id) as maxid FROM pof');
               $row = $query->row();
               $max_id = $row->maxid; 
			   return $max_id;  
		 }
		// gets attachments
		        // This retrieves attachment list from database.
	function getAttachment($pid){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('pof_attachment');
		$this->db->where('pof_id', $pid);
		  $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	  //
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
	  function addPosCons($pid,$consuls)
	   {
	    $data=array(
		'pos_id' => $pid,
		'consuls' => $consuls,
		);
		 if ($this->db->insert('pof_cons',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	     }
	   // This inserts the new pof's entries into the database.
 	//   function enterNewPof($worksheet){
	function enterNewPof($pid){
	     $year = date('y');
		 $lastpidin =  sprintf("%03d", $pid);
	    	  $data = array( 
		     'pof_no' => $year.'M'.$lastpidin,
			'client_id' => $this->input->post('client_id'),
			'jobtitle' => $this->input->post('jobtitle'),
			'tl' => $this->input->post('tl'),
			'generic_role' => $this->input->post('generic_role'),
			'department' => $this->input->post('department'),
			'job_type' => $this->input->post('job_type'),
//			'worksheet' => $worksheet,
			'jd' => $this->input->post('jd'),
			'candidate_specs' => $this->input->post('candidate_specs'),
	 		'pos_taken_by' => $this->input->post('pos_taken_by'),
			'pos_given_by' => $this->input->post('pos_given_by'),
	 		'pos_taken_on' => $this->input->post('pos_taken_on'),
			'pos_sharing_method' => $this->input->post('pos_sharing_method'),
			'transaction_type' => $this->input->post('transaction_type'),
			'client_mgr' => $this->input->post('client_mgr'),
			'hiring_manager' => $this->input->post('hiring_mgr'),
			'vc' => $this->input->post('vc'),
			'group_posting' => $this->input->post('group_posting'),
			'assesment_sheet' => $this->input->post('assesment_sheet'),
			'tracker' => $this->input->post('tracker'),
			'mirus_web' => $this->input->post('mirus_web'),
			'client_web' => $this->input->post('client_web'),
	 		'client_confi' => $this->input->post('client_confi'),
			// for Location grid
			'location' => $this->input->post('location'),
			'no_of_pos' => $this->input->post('no_of_pos'),
			'grade' => $this->input->post('grade'),
			'designation' => $this->input->post('designation'),
			'level' => $this->input->post('level'),
			'exp_f' => $this->input->post('exp_f'),
			'exp_t' => $this->input->post('exp_t'),
			'sal_f' => $this->input->post('sal_f'),
			'sal_t' => $this->input->post('sal_t'),
			'reports_to_name' => $this->input->post('reports_to_name'),
			'reports_to_level' => $this->input->post('reports_to_level'),
			// for Education grid
			'edu_level' => $this->input->post('edu_level'),
			'batch_f' => $this->input->post('batch_f'),
			'batch_t' => $this->input->post('batch_t'),
			'degree' => $this->input->post('degree'),
			'subject' => $this->input->post('subject'),
			'institute_pref' => $this->input->post('institute_pref'),
			'entered_by' => $this->input->post('entered_by'),
			'entered_on' => $this->input->post('entered_on'),
	 		
		  );
		 if ($this->db->insert('pof',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	     }
	   //
	  // this adds multiple worksheets
	   function addWorksheet($worksheet_details)
	    {
		 if($this->db->insert('pof_worksheet',$worksheet_details))
		 {
		  return TRUE;
		 }
		 else
		 {
		  return FALSE;
		 }
		}
	  // This adds multiple hiring manager details for a POF
	   function addHiringMgr($hiring_mgr_details)
	    {
		 if($this->db->insert('pof_hiring_mgr',$hiring_mgr_details))
		  {
		   return TRUE;
		  }
		  else{
		    return FALSE;
		  }
		}
	//
	 // This adds multiple hiring manager details for a POF
	   function editHiringMgr($hiring_mgr_details,$pid)
	    {
		 if($this->db->where('pof_id',$pid)->update('pof_hiring_mgr',$hiring_mgr_details))
		  {
		   return TRUE;
		  }
		  else{
		    return FALSE;
		  }
		}
	//
	// this adds commitment made to client
	   function addCommitment($commitment)
	    {
		 if($this->db->insert('pof_commit', $commitment))
		  {
		   return TRUE;
		  }
		  else
		  {
		   return FALSE;
		  }
		}
	//	
	// this adds commitment made to client
	   function editCommitment($commitment,$pid)
	    {
		 if($this->db->where('pof_id',$pid)->update('pof_commit', $commitment))
		  {
		   return TRUE;
		  }
		  else
		  {
		   return FALSE;
		  }
		}
	//	
	// file attachemnt
	function do_upload($attachemnt_details) {
		
	if ($this->db->insert('pof_attachment',$attachemnt_details))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
    
	}
	//
	
	function updateFileView($pof_id,$fileid){
	 
	$sql = "UPDATE pof SET file_to_view =".$fileid." WHERE pof_id =".$pof_id;
	$this->db->query($sql);
         }
		 
		 function updateFileViewe($pid,$fileid){
	 
	$sql = "UPDATE pof SET file_to_view =".$fileid." WHERE pof_id =".$pid;
	$this->db->query($sql);
         }
	   // This inserts the location grid (for multiple Location, No.,Grade,Designation,level,Year of Passing,Exp. Range,Salary Range,Reports To,Billing )for a particular pof.
	   function addLocation($location_details){
	      if ($this->db->insert('pofloc',$location_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	   // This retrieve the single pof detail
	   function getSinglePof($pid){
		   $sql = "SELECT *,hrmgr.username As hrmanager FROM pof LEFT JOIN be_users As hrmgr ON hrmgr.id=pof.hiring_manager LEFT JOIN be_users ON pof.client_mgr=be_users.id LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id WHERE pof.pof_id='".$pid."'";
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
	   //
	   
	    // get tags
		 function getAllTaags($pid){
		   $data=array();
		  $this->db->select('*');
		   $this->db->from('tags_position');
		   $this->db->join('tags','tags_position.tagp_id=tags.t_id','left');
		   $this->db->where('tags_position.position_id',$pid);
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
	    // This retrieve the single pof detail
	   function getPos($id){
		   $data=array();
		   $this->db->select('*');
		   $this->db->from('pof');
		   $this->db->join('companies', 'companies.compid=pof.client_id', 'left');
		   $this->db->join('synonym', 'companies.compid=synonym.s_id', 'left');
		   $this->db->join('be_users', 'pof.client_mgr=be_users.id', 'left');
		   $this->db->where('pof.pof_id', $id);
		   $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data=$row;
	        }
	      }
	       return $data; 
		  }
	   //
	    // This retrieve the hiring manager detail for a pof
	   function getPofHiringMgr($pid){
		   $data=array();
		   $this->db->select('*');
		   $this->db->from('pof_hiring_mgr');
		 
		   $this->db->where('pof_hiring_mgr.pof_id', $pid);
		   $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
	   //
	     // This retrieve the hiring manager detail for a pof
	   function getPofCommitment($pid){
		   $data=array();
		   $this->db->select('*');
		   $this->db->from('pof_commit');
		 
		   $this->db->where('pof_commit.pof_id', $pid);
		   $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
	   //
	       // This retrieve the hiring manager detail for a pof
	   function getWorksheet($pid){
		   $data=array();
		   $this->db->select('*');
		   $this->db->from('pof_worksheet');
		   $this->db->join('worksheet', 'worksheet.id=pof_worksheet.worksheet_id');
		 
		   $this->db->where('pof_worksheet.pof_id', $pid);
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
	   // This updates a pof. 
	   function updatePof($pid){
	   $data = array( 
	        'pof_id' => $pid,
            'client_id' => $this->input->post('client_id'),
			'jobtitle' => $this->input->post('jobtitle'),
			'tl' => $this->input->post('tl'),
			'generic_role' => $this->input->post('generic_role'),
			'department' => $this->input->post('department'),
			'job_type' => $this->input->post('job_type'),
//			'worksheet' => $worksheet,
			'jd' => $this->input->post('jd'),
			'candidate_specs' => $this->input->post('candidate_specs'),
	 		'pos_taken_by' => $this->input->post('pos_taken_by'),
			'pos_given_by' => $this->input->post('pos_given_by'),
	 		'pos_taken_on' => $this->input->post('pos_taken_on'),
			'pos_sharing_method' => $this->input->post('pos_sharing_method'),
			'transaction_type' => $this->input->post('transaction_type'),
			'client_mgr' => $this->input->post('client_mgr'),
			'hiring_manager' => $this->input->post('hiring_mgr'),
			'vc' => $this->input->post('vc'),
			'group_posting' => $this->input->post('group_posting'),
			'assesment_sheet' => $this->input->post('assesment_sheet'),
			'tracker' => $this->input->post('tracker'),
			'mirus_web' => $this->input->post('mirus_web'),
			'client_web' => $this->input->post('client_web'),
	 		'client_confi' => $this->input->post('client_confi'),
			// for Location grid
			'location' => $this->input->post('location'),
			'no_of_pos' => $this->input->post('no_of_pos'),
			'grade' => $this->input->post('grade'),
			'designation' => $this->input->post('designation'),
			'level' => $this->input->post('level'),
			'exp_f' => $this->input->post('exp_f'),
			'exp_t' => $this->input->post('exp_t'),
			'sal_f' => $this->input->post('sal_f'),
			'sal_t' => $this->input->post('sal_t'),
			'reports_to_name' => $this->input->post('reports_to_name'),
			'reports_to_level' => $this->input->post('reports_to_level'),
			// for Education grid
			'edu_level' => $this->input->post('edu_level'),
			'batch_f' => $this->input->post('batch_f'),
			'batch_t' => $this->input->post('batch_t'),
			'degree' => $this->input->post('degree'),
			'subject' => $this->input->post('subject'),
			'institute_pref' => $this->input->post('institute_pref'),
			 );
			 
		$this->db->where('pof_id', $pid);
		$this->db->update('pof', $data);
         }
	   // this deteles worksheet
	    //This deletes the part ofbasic worksheet.
     function deleteworksheet($id){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('w_id', id_clean($id));
		$this->db->delete('pof_worksheet');	
	 }
	 // 
	 // this allocates positions
	 function allocate($allocation_details)
	     {
		  if($this->db->insert('pof_allocation',$allocation_details))
		  {
		   return TRUE;
		  }
		  else{
		   return FALSE;
		  }		   
		 }
		//
	 // this re-allocates positions
	 function reallocate($allocation_details,$eventid)
	     {
		  if($this->db->where('event_id',$eventid)->update('events_tt',$allocation_details))
		  {
		   return TRUE;
		  }
		  else{
		   return FALSE;
		  }		   
		 }
		//
	  // updates allocation
	  function updatePofAllocation($pid)
	     {
		  $data = array(
		  'p_id' => $pid,
		  'fad' => $this->input->post('fad'),
		  );
		  $this->db->where('p_id', $pid);
		  $this->db->update('allocation', $data);
		 }
	 // this updates whether position is allocated or not
	  function updatePofAlloc($pid)
	    {
		$sql = "UPDATE pof SET is_allocated = 1 WHERE pof_id =".$pid;
		$this->db->query($sql);
		}
	//gets allocation details
	function getAllocDetails($id)
	   {
	    $data = array();
		$this->db->distinct('pof_id');
		$this->db->from('events_tt');
		$this->db->join('allocation','events_tt.alloc_id=allocation.id','left');
		$this->db->join('be_users', 'events_tt.section_id=be_users.id','left');
		$this->db->where('events_tt.pof_id', $id);
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
		//gets allocation details
	function getUnAllocated($id)
	   {
	    $data = array();
		$this->db->distinct('pof_id');
		$this->db->from('events_tt');
		$this->db->join('allocation','events_tt.alloc_id=allocation.id','left');
		$this->db->join('be_users', 'events_tt.section_id=be_users.id','left');
		$this->db->where('events_tt.pof_id', $id);
		$this->db->where('events_tt.is_alloc', 0);
		
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
		 	//gets allocation details
	function getAllocated($id)
	   {
	    $data = array();
		$this->db->distinct('pof_id');
		$this->db->from('events_tt');
		$this->db->join('allocation','events_tt.alloc_id=allocation.id','left');
		$this->db->join('be_users', 'events_tt.section_id=be_users.id','left');
		$this->db->where('events_tt.pof_id', $id);
		$this->db->where('events_tt.is_alloc', 1);
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
		 //gets allocation details
	function getAllocDetail($id)
	   {
	    $data = array();
		$this->db->from('allocation');
		$this->db->where('p_id', $id);
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
		 //
		 
	 function getPofCon($id)
	      {
	    $data = array();
		$this->db->from('pof_cons');
		$this->db->where('pos_id', $id);
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
	   // This inserts the new VC entries into the database.
	   function enterNewvc($pid){
	 	    $data = array( 
		    'pid' => $pid,
			'kra' => $this->input->post('kra'),
			'jobcri' => $this->input->post('jobcri'),
			);
		 if ($this->db->insert('vc',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	    }
	  //
	  // This inserts the multiple linkages(internal) for a particular VC
	   function addLinki($linki_details){
	     if ($this->db->insert('vc_linki',$linki_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
	   //
	   // This inserts the multiple linkages(external) for a particular VC
	    function addLinke($linke_details){
	     if ($this->db->insert('vc_linke',$linke_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
		 //
		 // This inserts the multiple industry tags for a particular VC
	    function addIndusTag($indus_tag_details){
	     if ($this->db->insert('vc_indus_tag',$indus_tag_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
	     //
		 // This inserts the multiple function tags for a particular VC
	   function addFuncTag($func_tag_details){
	     if ($this->db->insert('vc_func_tag',$func_tag_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
	     //
		 // This inserts the multiple personality tags for a particular VC
	    function addPersonalityTag($personality_tag_details){
	      if ($this->db->insert('vc_personality_tag',$personality_tag_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
		 //
		 // This inserts the multiple geography span tags for a particular VC 
	     function addGeogSpanTag($geog_span_tag_details){
	      if ($this->db->insert('vc_geog_span_tag',$geog_span_tag_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          } 
	     //
		 
		 // 
		 function st()
		   {
		    $data = array(
			'chm' => $this->input->post('chm'),
			'remark1' => $this->input->post('remark1'),
			'clm' => $this->input->post('clm'),
			'remark2' => $this->input->post('remark2'),
			'linkedin' => $this->input->post('linkedin'),
			'mirus' => $this->input->post('mirs'),
			'website' => $this->input->post('website'),
			'attachtype' => $this->input->post('attachtype'),
			'primary' => $this->input->post('primary'),
			'reno' => $this->input->post('reno'),
			'redate' => $this->input->post('redate'),
			'reremark' => $this->input->post('reremark'),
			'mapdate' => $this->input->post('mapdate'),
			'mapremark' => $this->input->post('mapremark'),
			'spdate' => $this->input->post('spdate'),
			'sremark' => $this->input->post('sremark'),
			'tfrdate' => $this->input->post('tfrdate'),
			'tfrremark' => $this->input->post('tfrremark'),
			'tlrdate' => $this->input->post('tlrdate'),
			'tlrremark' => $this->input->post('tlrremark'),
			);
		   }
		 // This inserts the multiple key selling propositions for a particular VC
	    function addKeysell($sell_details){
	      if ($this->db->insert('vc_keysell',$sell_details))
			 { 
			 return TRUE;
			 }
			 else
			 {
			 return FALSE;
			 }
           }
		  //
		  // This inserts the multiple key evaluation points for a particular VC
	    function addKeyeva($eva_details){
	      if ($this->db->insert('vc_keyeva',$eva_details))
			 { 
			 return TRUE;
			 }
			 else
			 {
			 return FALSE;
			 }
           }
	     //
		 // This inserts the multiple target companies for a particular VC
	    function addTargetComp($tcomp_details){
	     if ($this->db->insert('vc_target_comp',$tcomp_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
		 //
		 // This inserts the multiple excluded companies for a particular VC
	    function addExcludeComp($ecomp_details){
	     if ($this->db->insert('vc_exclude_comp',$ecomp_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
		 //
		 // This inserts the multiple search steps for a particular VC
	    function addSearchstep($sss_details){
	     if ($this->db->insert('vc_search',$sss_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
          }
		 //
		 // This retrieves all the users for a user-dropdown
		function getUsersDropDown(){
		    $data = array();
	        $this->db->select('*');
			$this->db->from('be_users');
			$this->db->where('active',1);
			$this->db->where('group',3);
			$this->db->or_where('group',4);
			$this->db->or_where('group',10);
			$this->db->order_by('be_users.username','ASC');
	        $Q = $this->db->get();
	        if ($Q->num_rows() > 0){
	        foreach ($Q->result_array() as $row)
			  {
	           $data[$row['id']] = $row['username'];
	          }
	       }
	      $Q->free_result();  
	      return $data; 
	    }
		//
		
		 // This retrieves all the users for a user-dropdown
		function getTransDropDown(){
		    $data = array();
	        $this->db->select('*');
			$this->db->from('segment_name');
			$this->db->where('segment_type_id',6);
			       $Q = $this->db->get();
	        if ($Q->num_rows() > 0){
	        foreach ($Q->result_array() as $row)
			  {
	           $data[$row['id']] = $row['segment_name'];
	          }
	       }
	      $Q->free_result();  
	      return $data; 
	    }
		//
		 // This retrieves all the users for a user-dropdown
		function getConDropDown(){
		    $data = array();
	        $this->db->select('*');
			$this->db->from('be_users');
			$this->db->where('group',3);
			$this->db->where('active',1);
			$this->db->order_by('be_users.username','ASC');
	        $Q = $this->db->get();
	        if ($Q->num_rows() > 0){
	        foreach ($Q->result_array() as $row)
			  {
	           $data[$row['username']] = $row['username'];
	          }
	       }
	      $Q->free_result();  
	      return $data; 
	    }
		//
		// This retrieves all the users for a user-dropdown
		function getClientsDropdown(){
		 $data = array();
		 $this->db->from('company');
		 $this->db->where('client',1);
		 $this->db->order_by('comp','ASC');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->comp]=$row->comp;
		  }
		  return $data;
	    }
		//
		 // This retrieves all the users for a user-dropdown
		function getUsers(){
		    $data = array();
	        $this->db->select('*');
			$this->db->from('be_users');
			$this->db->where('group',3);
			$this->db->where('active',1);
			$this->db->order_by('be_users.username','ASC');
	        $Q = $this->db->get();
	        if ($Q->num_rows() > 0){
	        foreach ($Q->result_array() as $row)
			  {
	           $data[] = $row;
	          }
	       }
	      $Q->free_result();  
	      return $data; 
	    }
		//
	 // gets all allocations
	 function getAllAllocation(){
	 	$data = array();
		$this->db->distinct();
		$this->db->from('allocation');
		$this->db->join('events_tt', 'allocation.id=events_tt.alloc_id');
        $this->db->join('be_users', 'events_tt.section_id=be_users.id', 'RIGHT');
		$this->db->where('be_users.group',3);
		$this->db->where('be_users.active',1);
		$this->db->where('events_tt.is_alloc',1);
		$this->db->group_by('events_tt.pof_id');
		$this->db->order_by('be_users.username','ASC');
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	 	
	 }
	 
	 //
		 function updateStatus($pid,$posstatus)
		   {
		   $user = $this->session->userdata('id');
		   $date = date('Y-m-d');
		   $sql = "UPDATE pof SET pos_status='".$posstatus."' WHERE pof_id =".$pid;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
		    //
		 function updateFocus($pid,$focus)
		   {
		   $user = $this->session->userdata('id');
		   $date = date('Y-m-d');
		   $sql = "UPDATE pof SET focus='1' WHERE pof_id =".$focus;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
		    //
		 function updateClosure($pid,$closure)
		   {
		   $user = $this->session->userdata('id');
		   $date = date('Y-m-d');
		   $sql = "UPDATE pof SET closure='1' WHERE pof_id =".$closure;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
	 // This inserts the allocation inputs into the database
	  function enterAlloc($pid){
	     $data= array(
		   'p_id' => $pid,
		   'fad' =>$this->input->post('fad'),
		   'instruction' =>$this->input->post('instruction'),
		   'allocated_by' => $this->input->post('allocated_by'),
		   'transac_imp' => $this->input->post('transaction_imp'),
		   'target_resume' => $this->input->post('target_resume'),
		   'superviser' => $this->input->post('superviser'),
		   );
		  if($this->db->insert('allocation',$data))
		       {
			   return $this->db->insert_id();
			   }
			   else
			   {
			   return FALSE;
			   }
			}
     //This inserts the multiple consultants who are being allocated the position/positions to.
	    function addAlLocation($allocation_details){
	       if ($this->db->insert('events_tt',$allocation_details))
			   { 
			   return TRUE;
			   }
			   else
			   {
			   return FALSE;
			   }
            }
	  //gets allocation details
	function getEventDetails($event_id)
	   {
	    $data = array();
		$this->db->distinct('pof_id');
		$this->db->from('events_tt');
		$this->db->join('allocation','events_tt.alloc_id=allocation.id','left');
		$this->db->join('be_users', 'events_tt.section_id=be_users.id','left');
		$this->db->where('events_tt.event_id', $event_id);
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
		 function upPosCons($pid,$consuls)
		 {
		  $data = array(
		  'pos_id' => $pid,
		  'consuls' =>$consuls,
		  );
		 $this->db->where('pos_id',$pid);
		 $this->db->update('pof_cons', $data);
		 }
		 //
		  //
		 function upPofStatus($pid)
		 {
		  $data = array(
		  'pof_id' => $pid,
		  'transaction_type' =>$this->input->post('transaction_type'),
		  );
		 $this->db->where('pof_id',$pid);
		 $this->db->update('pof', $data);
		 }
		 //
		  //
		 function upPursue($pid)
		 {
		  $data = array(
		  'pof_id' => $pid,
		  'not_pursue' =>1,
		  );
		 $this->db->where('pof_id',$pid);
		 $this->db->update('pof', $data);
		 }
		 //
		  
	 function updatePofEvent($e_details)
		 {
		  $data = array(
		  'is_alloc' => 0,
		  );
		 $this->db->where_in('event_id',$e_details );
		 $this->db->update('events_tt', $data);
		 }
	  function updateAlloc($event)
	   {
	     $data = array(
		 'section_id' => $this->input->post('consul'),
		 'start_date' => $this->input->post('doa'),
		 'credit' => $this->input->post('credit'),
		 'block_names' => $this->input->post('block_names'),
		 'end_date' => $this->input->post('end_date'),
		 );
	    $this->db->where('event_id', $event);
		$this->db->update('events_tt', $data);
	   }
	  function getUserPos($user)
	   {
	    $data = array();
		$this->db->select('*');
		$this->db->from('events_tt');
		$this->db->join('pof', 'pof.pof_id=events_tt.pof_id');
		$this->db->join('pof_cons', 'pof_cons.pos_id=events_tt.pof_id', 'left');
		$this->db->join('company', 'company.c_id=pof.client_id', 'left');
		$this->db->join('segment_name', 'segment_name.id=pof.location', 'left');
	    $this->db->join('allocation','events_tt.alloc_id=allocation.id','left');
		$this->db->where('events_tt.section_id',$user);
		$this->db->where('events_tt.is_alloc',1);
	     $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	       return $data; 
		 }
		 // get the list of candidates added to position
		function countCand($pid)
		  {
		    $sql = "SELECT COUNT(DISTINCT cand_id) As cnt FROM pof_candidates WHERE pofid =".$pid."";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		  // get the no. of candidates added to shorlist. 
		  function countShort($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='284' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		  //
		  function countCandOffer($pid)
		    {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='293' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		   function countClientShort($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='291' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  
		   function countPosClosed($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='294' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  
		  
		   function countCandJoined($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='295' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  
		  
		   function countFinalRound($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='292' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		  // get the no. of candidates added to onhold
		  function countOnhold($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='285' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		   // get the no. of candidates added to reject
		  function countReject($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='286' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		   // get the no. of candidates added to reject
		  function countClientReject($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='289' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		  
		   // get the no. of candidates duplicate
		  function countCVDuplicate($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='290' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		  // get the no. of candidates added to refpool
		  function countRefPool($pid)
		  {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage ='287' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		  // get the no of candidates added to cvsent
		  function countCvsent($pid)
		  {
		    $sql = "SELECT COUNT(DISTINCT cand_id) As cnt FROM pof_candidates WHERE pofid =".$pid." AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' ) ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		  }
		  //
		// get position databank
		function getPosDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('segment_name', 'pof_candidates.stage=segment_name.id');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->order_by('candidates.candidate_name','ASC');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
		  //
		  //get shortlisted databank
		  function getShortlistedDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','284');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			 
			  //get shortlisted databank by client
		  function getClientShortlistedDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','291');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			  //get shortlisted databank by client
		  function getFinalRoundDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','292');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			  //get shortlisted databank by client
		  function getPosClosedDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','294');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			  //get shortlisted databank by client
		  function getCandJoinedDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','295');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			 
		    function getCandOfferDatabank($pid,$limit)
			  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','293');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			  
		// get onhold databank
		function getOnholdDatabank($pid,$limit)
		    {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','285');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			//get rejected databank
			function getRejectedDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','286');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			 //get rejected databank
		function getClientRejectedDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','289');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			 
			  //get rejected databank
		function getClientDuplicateDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','290');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			//get ref pool databank
			function getRefpoolDatabank($pid,$limit)
		  {
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
			$this->db->join('files', 'candidates.id=files.cand', 'left');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('pof_candidates.stage','287');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			 //
			 //get cvsent databank
			 function getCvsentDatabank($pid,$limit)
		     {
			 $stage = array('cvsent','client_reject','interview_shortlist','offer');
		    $data = array();
			$this->db->select('*');
			$this->db->select('candidates.id As cid');
			$this->db->from('pof_candidates');
			$this->db->join('be_users','pof_candidates.user_id=be_users.id');
			$this->db->join('candidates','pof_candidates.cand_id=candidates.id');
		    $this->db->join('segment_name', 'pof_candidates.stage=segment_name.id');
			$this->db->where('pof_candidates.pofid',$pid);
			$this->db->where('segment_name.segment_type_id','5');
			$this->db->group_by('pof_candidates.cand_id');
			$this->db->order_by('candidates.candidate_name','ASC');
			$this->db->limit(20,$limit);
			$q = $this->db->get();
			if($q->num_rows()>0)
			 {
			  foreach($q->result() as $row)
			   {
			    $data[] = $row;
			   }
			  return $data;
			 }
			 }
			//
		 function updateChange($sid,$stage)
		   {
		   $user = $this->session->userdata('id');
		   $date = date('Y-m-d');
		   $sql = "UPDATE pof_candidates SET stage='".$stage."', user_id =".$user.", date ='".$date."' WHERE s_id =".$sid;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
		
		  //
		 function clientChange($sid,$stage)
		   {
		   $user = $this->session->userdata('id');
		    $sql = "UPDATE pof_candidates SET stage='".$stage."', user_id =".$user." WHERE s_id =".$sid;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
		   //
		 function clientChangeCvsent($sid,$stage,$sharedon)
		   { 		   $user = $this->session->userdata('id');
		    $sql = "UPDATE pof_candidates SET stage='".$stage."', shared_on='".$sharedon."' WHERE s_id =".$sid;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		  // crates VRS
		  function countSentCv($from,$to,$consultant,$client)
		   {
		    $sql = "SELECT COUNT(DISTINCT cand_id) As cnt FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND be_users.username LIKE '%".$consultant."%' AND pof.client_id LIKE '".$client."%' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		  
		 // count no cv attached
		  function noCvSentVRS($from,$to,$consultant,$client)
		   {
		    $sql = "SELECT COUNT(DISTINCT cand_id) As cnt FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND be_users.username LIKE '%".$consultant."%' AND pof.client_id LIKE '".$client."%' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )		 AND candidates.file_to_view=' '";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   // count no cv marked
		  function noMarkVRS($from,$to,$consultant,$client)
		   {
		    $sql = "SELECT COUNT(DISTINCT cand_id) As cnt FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND be_users.username LIKE '%".$consultant."%' AND pof.client_id LIKE '".$client."%' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )		 AND pof_candidates.shared_on=' '";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		function generateVRS($from,$to,$consultant,$client,$limit)
		 {
		  
		$sql ="SELECT *,synonym.parentname As compa, a1.parentname As loca FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND be_users.username LIKE '%".$consultant."%' AND pof.client_id LIKE '%".$client."%' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 GROUP BY pof_candidates.cand_id ORDER BY compa ASC, pof_candidates.pofid, pof_candidates.date ASC LIMIT " .$limit . ",20 ";
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
	// My VRs
	// crates VRS
		  function countMySentCv($from,$to,$consultant,$client)
		   {
		    $sql = "SELECT COUNT(DISTINCT cand_id) As cnt FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND be_users.username LIKE '%".$consultant."%' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		function generateMyVRS($from,$to,$consultant,$client,$limit)
		 {
		   		  
		$sql ="SELECT *,synonym.parentname As compa, a1.parentname As loca FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND be_users.username LIKE '%".$consultant."%' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 GROUP BY pof_candidates.cand_id ORDER BY compa ASC, pof_candidates.pofid, pof_candidates.date ASC LIMIT " .$limit . ",20 ";
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
	// vrs status for all the consultant
	function getAllVRSRead()
		 {
		 $date = date('Y-m-d');
            $day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
		   		  
		$sql ="SELECT * FROM pof_candidates LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' ) AND (date BETWEEN '".$from."' AND '".$to."') GROUP BY pof_candidates.user_id ORDER BY be_users.username ASC;";
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
	
	// no cv sent
	// vrs status for all the consultant
	function getAllVRSNo()
		 {
		 $date = date('Y-m-d');
            $day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
		   		  
		$sql ="SELECT * FROM be_users WHERE active='1' AND (id NOT IN (SELECT user_id FROM pof_candidates WHERE stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' ) AND (date BETWEEN '".$from."' AND '".$to."'))) ORDER BY username ASC;";
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
	// vrs status- read or not
	  function vrsRead($from,$to,$userid)
	     {
		   $sql = "UPDATE pof_candidates SET is_read='1' WHERE user_id =".$userid." AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' ) AND (date BETWEEN '".$from."' AND '".$to."')";
			  $q = $this->db->query($sql);
			  return $q;
		 }
	// crates VRS
		  function countSentCvs($from,$to)
		   {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE (date BETWEEN '".$from."' AND '".$to."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
	function getVRS($from,$to,$limit)
		 {
		  
		$sql ="SELECT *,synonym.parentname As compa, a1.parentname As loca FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' ) ORDER BY compa ASC, pof_candidates.pofid, pof_candidates.date ASC LIMIT " .$limit . ",20 ";
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
	
	// final round
		  function countCandFinalRound()
		   {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE stage ='292'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
	function getCandFinalRound($limit)
		 {
		  
		$sql ="SELECT * FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id LEFT JOIN files ON candidates.id=files.cand RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN company ON pof.client_id=company.c_id LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE stage ='292' LIMIT " .$limit . ",20 ";
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
	// candidate offer
		  function countCandtoOffer()
		   {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE stage ='293'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
	function getCandtoOffer($limit)
		 {
		  
		$sql ="SELECT * FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id LEFT JOIN files ON candidates.id=files.cand RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN company ON pof.client_id=company.c_id LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE stage ='293' LIMIT " .$limit . ",20 ";
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
	
	// final round
		  function countCandClosed()
		   {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE stage ='294'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
	function getCandClosed($limit)
		 {
		  
		$sql ="SELECT * FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id LEFT JOIN files ON candidates.id=files.cand RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN company ON pof.client_id=company.c_id LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE stage ='294' LIMIT " .$limit . ",20 ";
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
	
	// final round
		  function countCandJ()
		   {
		    $sql = "SELECT COUNT(*) As cnt FROM pof_candidates WHERE stage ='295'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
	function getCandJ($limit)
		 {
		  
		$sql ="SELECT * FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id LEFT JOIN files ON candidates.id=files.cand RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN company ON pof.client_id=company.c_id LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE stage ='295' LIMIT " .$limit . ",20 ";
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
	
	function searchtermhanderfrom($from)
	{
		if($from)
		{
			$this->session->set_userdata('from', $from);
			return $from;
		}
		elseif($this->session->userdata('from'))
		{
			$from = $this->session->userdata('from');
			return $from;
		}
		else
		{
			$from ="";
			return $from;
		}
	}
	function searchtermhandlerto($to)
	{
		if($to)
		{
			$this->session->set_userdata('to', $to);
			return $to;
		}
		elseif($this->session->userdata('to'))
		{
			$to = $this->session->userdata('to');
			return $to;
		}
		else
		{
			$to ="";
			return $to;
		}
	}
	
	function searchtermhandlerconsultant($consultant)
	{
		if($consultant)
		{
			$this->session->set_userdata('consultant', $consultant);
			return $consultant;
		}
		elseif($this->session->userdata('consultant'))
		{
			$consultant = $this->session->userdata('consultant');
			return $consultant;
		}
		else
		{
			$consultant ="";
			return $consultant;
		}
	}
	
	function searchtermhandlerclient($client)
	{
		if($client)
		{
			$this->session->set_userdata('client', $client);
			return $client;
		}
		elseif($this->session->userdata('client'))
		{
			$client = $this->session->userdata('client');
			return $client;
		}
		else
		{
			$client ="";
			return $client;
		}
	}
	
	function searchtermhanderfrom1($from)
	{
		if($from)
		{
			$this->session->set_userdata('from', $from);
			return $from;
		}
		elseif($this->session->userdata('from'))
		{
			$from = $this->session->unset_userdata('from');
			return $from;
		}
		else
		{
			$from ="";
			return $from;
		}
	}
	function searchtermhandlerto1($to)
	{
		if($to)
		{
			$this->session->set_userdata('to', $to);
			return $to;
		}
		elseif($this->session->userdata('to'))
		{
			$to = $this->session->unset_userdata('to');
			return $to;
		}
		else
		{
			$to ="";
			return $to;
		}
	}
	
	function searchtermhandlerconsultant1($consultant)
	{
		if($consultant)
		{
			$this->session->set_userdata('consultant', $consultant);
			return $consultant;
		}
		elseif($this->session->userdata('consultant'))
		{
			$consultant = $this->session->unset_userdata('consultant');
			return $consultant;
		}
		else
		{
			$consultant ="";
			return $consultant;
		}
	}
	
	function searchtermhandlerclient1($client)
	{
		if($client)
		{
			$this->session->set_userdata('client', $client);
			return $client;
		}
		elseif($this->session->userdata('client'))
		{
			$client = $this->session->unset_userdata('client');
			return $client;
		}
		else
		{
			$client ="";
			return $client;
		}
	}
		
 function delJD($jd)
	   { 
	    $file = $this->get_file_to_delete($jd);
		 if(!$this->db->where('id',$jd)->delete('pof_attachment'))
		  {
		   return FALSE;
		  }
		  unlink('./public/JD/'.$file->filename);
		  return TRUE;	
	   }
	 
	 function get_file_to_delete($jd)
	  {
	   return $this->db->select()
	                   ->from('pof_attachment')
					   ->where('id',$jd)
					   ->get()
					   ->row();
	  }
	
	   //
		  function enterTalk($pof_id)
		   {
		   $user = $this->input->post('manager');
		   $date = date('Y-m-d');
		   $sql = "UPDATE pof SET manager='".$user."', talked_on='".$date."', is_talked =1  WHERE pof_id =".$pof_id;
			  $q = $this->db->query($sql);
			  return $q;
		   }
		   //
      //gets allocation details
	function getCurAlloc($id)
	   {
	    $data = array();
		$this->db->select('*');
		$this->db->from('events_tt');
		$this->db->where('events_tt.pof_id', $id);
		$this->db->where('events_tt.is_alloc', 1);
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
		 
	 //gets comments details
	function getPosComments($pid)
	   {
	    $data = array();
		$this->db->select('*');
		$this->db->from('pof_scribble');
		$this->db->join('be_users','pof_scribble.sent_by=be_users.id','left');
		$this->db->where('pof_scribble.pofid', $pid);
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
		 
		 
		  //gets comments details
	function getGrades($pid)
	   {
	   $result = array();
		$this->db->select('*,');
		$this->db->from('pof');
		$this->db->join('companies_grade','pof.client_id=companies_grade.cid');
		$this->db->where('pof.pof_id',$pid);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->gid]= $row->grade;
        }
        
        return $result;
		  }
		 //
		 
		   //gets comments details
	function getLevels($pid)
	   {
	   $result = array();
		$this->db->select('*,');
		$this->db->from('pof');
		$this->db->join('companies_grade','pof.client_id=companies_grade.cid');
		$this->db->join('segment_name','companies_grade.level=segment_name.id');
		$this->db->where('pof.pof_id',$pid);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->segment_name;
        }
        
        return $result;
		  }
		 //
	 function enterScribble($pid,$sent_by,$sent_on)
	   {
	     $data = array(
		 'pofid' => $pid,
		 'msg' => $this->input->post('msg'),
		 'date' => $sent_on,
		 'sent_by' => $sent_by
		 );
		 if($this->db->insert('pof_scribble',$data))
		  {
		   return TRUE;
		  }
		  else{
		   return FALSE;
		  }
	   }
	 // update allocation
	 function updateAllocTR($allocid)
	   {
	    $data = array(
		 'id' =>$allocid,
		 'target_resume' => $this->input->post('target_resume'),
		);
	    $this->db->where('id',$allocid);
		$this->db->update('allocation',$data);
	   }
	   
	  ///dropdowns for filter
	  // for consultant names
	  function getConsulNameF(){
		$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where('group',3);
		$this->db->or_where('group',4);
		$this->db->where('active',1);
		$this->db->order_by('username','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->username]= $row->username;
        }
        
        return $result;
	}	
	// for companies names
	  function getCompNameF(){
		 $data = array();
		 $this->db->from('companies');
		 $this->db->join('synonym','companies.compid=synonym.s_id');
		 $this->db->where('companies.is_client','334');
		 $this->db->order_by('parentname','ASC');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->compid]=$row->parentname;
		  }
		  return $data;
		}
		// for companies names
	  function getCompNameF2(){
		 $data = array();
		 $this->db->from('companies');
		 $this->db->join('synonym','companies.compid=synonym.s_id');
		 $this->db->where('companies.is_client','334');
		 $this->db->order_by('parentname','ASC');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->parentname]=$row->parentname;
		  }
		  return $data;
		}
	
	// for locations names
	  function getLocNameF(){
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
	
	// for filter
	function searchterm_handler_jobtitle($jobtitle)
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
	
	function searchterm_handler_company($company)
	{
		if($company)
		{
			$this->session->set_userdata('company', $company);
			return $company;
		}
		elseif($this->session->userdata('company'))
		{
			$company = $this->session->userdata('company');
			return $company;
		}
		else
		{
			$company ="";
			return $company;
		}
	}
	
	function searchterm_handler_companyfilterpos($companyfilterpos)
	{
		if($companyfilterpos)
		{
		   if($companyfilterpos=='a')
		     {
			$companyfilterpos = $this->session->set_userdata('companyfilterpos');
			return $companyfilterpos;
			 }
			 else{
			$this->session->set_userdata('companyfilterpos', $companyfilterpos);
			return $companyfilterpos;
			}
		}
		elseif($this->session->userdata('companyfilterpos'))
		{
			$companyfilterpos = $this->session->userdata('companyfilterpos');
			return $companyfilterpos;
		}
		else
		{
			$companyfilterpos ="";
			return $companyfilterpos;
		}
	}
	
	function searchterm_handler_companyf($company)
	{
		if($company)
		{
			$this->session->set_userdata('companyf', $company);
			return $company;
		}
		elseif($this->session->userdata('companyf'))
		{
			$company = $this->session->userdata('companyf');
			return $company;
		}
		else
		{
			$company ="";
			return $company;
		}
	}
	
	function searchterm_handler_location($location)
	{
		if($location)
		{
			$this->session->set_userdata('location', $location);
			return $location;
		}
		elseif($this->session->userdata('location'))
		{
			$location = $this->session->userdata('location');
			return $location;
		}
		else
		{
			$location ="";
			return $location;
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
			$grade = $this->session->unset_userdata('grade');
			return $grade;
		}
		else
		{
			$grade ="";
			return $grade;
		}
	}
	
	function searchterm_handler_salary($salary)
	{
		if($salary)
		{
			$this->session->set_userdata('salary', $salary);
			return $salary;
		}
		elseif($this->session->userdata('salary'))
		{
			$salary = $this->session->unset_userdata('salary');
			return $salary;
		}
		else
		{
			$salary ="";
			return $salary;
		}
	}
	
	function searchterm_handler_posstatus($posstatus)
	{
		if($posstatus)
		{
			$this->session->set_userdata('posstatus', $posstatus);
			return $posstatus;
		}
		elseif($this->session->userdata('posstatus'))
		{
			$posstatus = $this->session->userdata('posstatus');
			return $posstatus;
		}
		else
		{
			$posstatus ="";
			return $posstatus;
		}
	}
	
	function searchterm_handler_posstatusf($posstatus)
	{
		if($posstatus)
		{
			$this->session->set_userdata('posstatusf', $posstatus);
			return $posstatus;
		}
		elseif($this->session->userdata('posstatusf'))
		{
			$posstatus = $this->session->userdata('posstatusf');
			return $posstatus;
		}
		else
		{
			$posstatus ="";
			return $posstatus;
		}
	}
	
	function searchterm_handler_consul($consul)
	{
		if($consul)
		{
			$this->session->set_userdata('consul', $consul);
			return $consul;
		}
		elseif($this->session->userdata('consul'))
		{
			$consul = $this->session->userdata('consul');
			return $consul;
		}
		else
		{
			$consul ="";
			return $consul;
		}
	}
	
	function searchterm_handler_consulf($consul)
	{
		if($consul)
		{
			$this->session->set_userdata('consulf', $consul);
			return $consul;
		}
		elseif($this->session->userdata('consulf'))
		{
			$consul = $this->session->userdata('consulf');
			return $consul;
		}
		else
		{
			$consul ="";
			return $consul;
		}
	}
	
	function myApp($username)
	   {
	    $data=array();
		$this->db->from('appraisal');
		$this->db->where('cons_name',$username);
		$Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	    
	      return $data; 
		  }
	  // appraisal feedback
	  function newAppraisal()
	    {
		 $data = array(
		 'cons_name' => $this->input->post('cons_name'),
		 'join_date' => $this->input->post('join_date'),
		 'app_period' => $this->input->post('app_period'),
		 'total_added' => $this->input->post('total_added'),
		 'no_work' => $this->input->post('no_work'),
		 'no_cv' => $this->input->post('no_cv'),
		 'no_cv_vrs' => $this->input->post('no_cv_vrs'),
		 'client_mgmt' =>$this->input->post('client_mgmt'),
		 'facilitating' => $this->input->post('facilitating'),
		 'total_closure' => $this->input->post('total_closure'),
		 'avg_closure' => $this->input->post('avg_closure'),
		 'ratio' => $this->input->post('ratio'),
		 'highest_value' => $this->input->post('highest_value'),
		 'time_taken' => $this->input->post('time_taken'),
		 'exec_speed' => $this->input->post('exec_speed'),
		 'avg_calling' => $this->input->post('avg_calling'),
		 'referencing' => $this->input->post('referencing'),
		 'avg_day' => $this->input->post('avg_day'),
		 'avg_cv_sent' => $this->input->post('avg_cv_sent'),
		 'resumes_reject' => $this->input->post('resumes_reject'),
		 'handle_pres' => $this->input->post('handle_pres'),
		 'scalability' => $this->input->post('scalability'),
		 'multi_task' => $this->input->post('multi_task'),
		 'commit_excel' => $this->input->post('commit_excel'),
		 'total_holidays' => $this->input->post('total_holidays'),
		 'without_supervision' => $this->input->post('without_supervision'),
		 'meet_commit' => $this->input->post('meet_commit'),
		 'high_value' => $this->input->post('high_value'),
		 'mid_value' => $this->input->post('mid_value'),
		 'ref_support' => $this->input->post('ref_support'),
		 'business_dev' => $this->input->post('business_dev'),
		 'others' => $this->input->post('others'),
		 'feedback_cand' => $this->input->post('feedback_cand'),
		 'trans_flow' => $this->input->post('trans_flow'),
		 'rel_peers' => $this->input->post('rel_peers'),
		 'sharing_peers' => $this->input->post('sharing_peers'),
		 'take_initiative' => $this->input->post('take_initiative'),
		 'self_initiative' => $this->input->post('self_initiative'),
		 'manage_process' => $this->input->post('manage_process'),
		 'total_team_closure' => $this->input->post('total_team_closure'),
		 'new_team' => $this->input->post('new_team'),
		 'retain_team' => $this->input->post('retain_team'),
		 'leadership' => $this->input->post('leadership'),
		 'date' => date('Y-m-d'),
		 );
		 if ($this->db->insert('appraisal',$data))
		   {
		    return $this->db->insert_id();
		   }
		  else
		  {
		   return FALSE;
		  }
		}
		//
		// appraisal feedback
	  function submitAppraisal()
	    {
		 $data = array(
		 'cons_name' => $this->input->post('cons_name'),
		 'join_date' => $this->input->post('join_date'),
		 'app_period' => $this->input->post('app_period'),
		 'total_added' => $this->input->post('total_added'),
		 'no_work' => $this->input->post('no_work'),
		 'no_cv' => $this->input->post('no_cv'),
		 'no_cv_vrs' => $this->input->post('no_cv_vrs'),
		 'client_mgmt' =>$this->input->post('client_mgmt'),
		 'facilitating' => $this->input->post('facilitating'),
		 'total_closure' => $this->input->post('total_closure'),
		 'avg_closure' => $this->input->post('avg_closure'),
		 'ratio' => $this->input->post('ratio'),
		 'highest_value' => $this->input->post('highest_value'),
		 'time_taken' => $this->input->post('time_taken'),
		 'exec_speed' => $this->input->post('exec_speed'),
		 'avg_calling' => $this->input->post('avg_calling'),
		 'referencing' => $this->input->post('referencing'),
		 'avg_day' => $this->input->post('avg_day'),
		 'avg_cv_sent' => $this->input->post('avg_cv_sent'),
		 'resumes_reject' => $this->input->post('resumes_reject'),
		 'handle_pres' => $this->input->post('handle_pres'),
		 'scalability' => $this->input->post('scalability'),
		 'multi_task' => $this->input->post('multi_task'),
		 'commit_excel' => $this->input->post('commit_excel'),
		 'total_holidays' => $this->input->post('total_holidays'),
		 'without_supervision' => $this->input->post('without_supervision'),
		 'meet_commit' => $this->input->post('meet_commit'),
		 'high_value' => $this->input->post('high_value'),
		 'mid_value' => $this->input->post('mid_value'),
		 'ref_support' => $this->input->post('ref_support'),
		 'business_dev' => $this->input->post('business_dev'),
		 'others' => $this->input->post('others'),
		 'feedback_cand' => $this->input->post('feedback_cand'),
		 'trans_flow' => $this->input->post('trans_flow'),
		 'rel_peers' => $this->input->post('rel_peers'),
		 'sharing_peers' => $this->input->post('sharing_peers'),
		 'take_initiative' => $this->input->post('take_initiative'),
		 'self_initiative' => $this->input->post('self_initiative'),
		 'manage_process' => $this->input->post('manage_process'),
		 'total_team_closure' => $this->input->post('total_team_closure'),
		 'new_team' => $this->input->post('new_team'),
		 'retain_team' => $this->input->post('retain_team'),
		 'leadership' => $this->input->post('leadership'),
		 'date' => date('Y-m-d'),
		 'submit' => 1,
		 );
		 if ($this->db->insert('appraisal',$data))
		   {
		    return $this->db->insert_id();
		   }
		  else
		  {
		   return FALSE;
		  }
		}
	  //gets the user details
	 function getAppDetails($id)
	  {
	    $data=array();
		$this->db->from('appraisal');
		$this->db->where('id',$id);
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
	 
	 // appraisal feedback
	  function editAppraisal($id)
	    {
		 $data = array(
		 'cons_name' => $this->input->post('cons_name'),
		 'join_date' => $this->input->post('join_date'),
		 'app_period' => $this->input->post('app_period'),
		 'total_added' => $this->input->post('total_added'),
		 'no_work' => $this->input->post('no_work'),
		 'no_cv' => $this->input->post('no_cv'),
		 'no_cv_vrs' => $this->input->post('no_cv_vrs'),
		 'client_mgmt' =>$this->input->post('client_mgmt'),
		 'facilitating' => $this->input->post('facilitating'),
		 'total_closure' => $this->input->post('total_closure'),
		 'avg_closure' => $this->input->post('avg_closure'),
		 'ratio' => $this->input->post('ratio'),
		 'highest_value' => $this->input->post('highest_value'),
		 'time_taken' => $this->input->post('time_taken'),
		 'exec_speed' => $this->input->post('exec_speed'),
		 'avg_calling' => $this->input->post('avg_calling'),
		 'referencing' => $this->input->post('referencing'),
		 'avg_day' => $this->input->post('avg_day'),
		 'avg_cv_sent' => $this->input->post('avg_cv_sent'),
		 'resumes_reject' => $this->input->post('resumes_reject'),
		 'handle_pres' => $this->input->post('handle_pres'),
		 'scalability' => $this->input->post('scalability'),
		 'multi_task' => $this->input->post('multi_task'),
		 'commit_excel' => $this->input->post('commit_excel'),
		 'total_holidays' => $this->input->post('total_holidays'),
		 'without_supervision' => $this->input->post('without_supervision'),
		 'meet_commit' => $this->input->post('meet_commit'),
		 'high_value' => $this->input->post('high_value'),
		 'mid_value' => $this->input->post('mid_value'),
		 'ref_support' => $this->input->post('ref_support'),
		 'business_dev' => $this->input->post('business_dev'),
		 'others' => $this->input->post('others'),
		 'feedback_cand' => $this->input->post('feedback_cand'),
		 'trans_flow' => $this->input->post('trans_flow'),
		 'rel_peers' => $this->input->post('rel_peers'),
		 'sharing_peers' => $this->input->post('sharing_peers'),
		 'take_initiative' => $this->input->post('take_initiative'),
		 'self_initiative' => $this->input->post('self_initiative'),
		 'manage_process' => $this->input->post('manage_process'),
		 'total_team_closure' => $this->input->post('total_team_closure'),
		 'new_team' => $this->input->post('new_team'),
		 'retain_team' => $this->input->post('retain_team'),
		 'leadership' => $this->input->post('leadership'),
		  );
		 if ($this->db->where('id',$id)->update('appraisal',$data))
		   {
		    return TRUE;
		   }
		  else
		  {
		   return FALSE;
		  }
		}
		
		// appraisal feedback
	  function submitAppraisalDraft($id)
	    {
		 $data = array(
		 'cons_name' => $this->input->post('cons_name'),
		 'join_date' => $this->input->post('join_date'),
		 'app_period' => $this->input->post('app_period'),
		 'total_added' => $this->input->post('total_added'),
		 'no_work' => $this->input->post('no_work'),
		 'no_cv' => $this->input->post('no_cv'),
		 'no_cv_vrs' => $this->input->post('no_cv_vrs'),
		 'client_mgmt' =>$this->input->post('client_mgmt'),
		 'facilitating' => $this->input->post('facilitating'),
		 'total_closure' => $this->input->post('total_closure'),
		 'avg_closure' => $this->input->post('avg_closure'),
		 'ratio' => $this->input->post('ratio'),
		 'highest_value' => $this->input->post('highest_value'),
		 'time_taken' => $this->input->post('time_taken'),
		 'exec_speed' => $this->input->post('exec_speed'),
		 'avg_calling' => $this->input->post('avg_calling'),
		 'referencing' => $this->input->post('referencing'),
		 'avg_day' => $this->input->post('avg_day'),
		 'avg_cv_sent' => $this->input->post('avg_cv_sent'),
		 'resumes_reject' => $this->input->post('resumes_reject'),
		 'handle_pres' => $this->input->post('handle_pres'),
		 'scalability' => $this->input->post('scalability'),
		 'multi_task' => $this->input->post('multi_task'),
		 'commit_excel' => $this->input->post('commit_excel'),
		 'total_holidays' => $this->input->post('total_holidays'),
		 'without_supervision' => $this->input->post('without_supervision'),
		 'meet_commit' => $this->input->post('meet_commit'),
		 'high_value' => $this->input->post('high_value'),
		 'mid_value' => $this->input->post('mid_value'),
		 'ref_support' => $this->input->post('ref_support'),
		 'business_dev' => $this->input->post('business_dev'),
		 'others' => $this->input->post('others'),
		 'feedback_cand' => $this->input->post('feedback_cand'),
		 'trans_flow' => $this->input->post('trans_flow'),
		 'rel_peers' => $this->input->post('rel_peers'),
		 'sharing_peers' => $this->input->post('sharing_peers'),
		 'take_initiative' => $this->input->post('take_initiative'),
		 'self_initiative' => $this->input->post('self_initiative'),
		 'manage_process' => $this->input->post('manage_process'),
		 'total_team_closure' => $this->input->post('total_team_closure'),
		 'new_team' => $this->input->post('new_team'),
		 'retain_team' => $this->input->post('retain_team'),
		 'leadership' => $this->input->post('leadership'),
		 'date' => date('Y-m-d'),
		 'submit' => 1,
		   );
		 if ($this->db->where('id',$id)->update('appraisal',$data))
		   {
		    return TRUE;
		   }
		  else
		  {
		   return FALSE;
		  }
		}
		
		// appraisal feedback
	  function resubmitAppraisal()
	    {
		 $data = array(
		 'cons_name' => $this->input->post('cons_name'),
		 'join_date' => $this->input->post('join_date'),
		 'app_period' => $this->input->post('app_period'),
		 'total_added' => $this->input->post('total_added'),
		 'no_work' => $this->input->post('no_work'),
		 'no_cv' => $this->input->post('no_cv'),
		 'no_cv_vrs' => $this->input->post('no_cv_vrs'),
		 'client_mgmt' =>$this->input->post('client_mgmt'),
		 'facilitating' => $this->input->post('facilitating'),
		 'total_closure' => $this->input->post('total_closure'),
		 'avg_closure' => $this->input->post('avg_closure'),
		 'ratio' => $this->input->post('ratio'),
		 'highest_value' => $this->input->post('highest_value'),
		 'time_taken' => $this->input->post('time_taken'),
		 'exec_speed' => $this->input->post('exec_speed'),
		 'avg_calling' => $this->input->post('avg_calling'),
		 'referencing' => $this->input->post('referencing'),
		 'avg_day' => $this->input->post('avg_day'),
		 'avg_cv_sent' => $this->input->post('avg_cv_sent'),
		 'resumes_reject' => $this->input->post('resumes_reject'),
		 'handle_pres' => $this->input->post('handle_pres'),
		 'scalability' => $this->input->post('scalability'),
		 'multi_task' => $this->input->post('multi_task'),
		 'commit_excel' => $this->input->post('commit_excel'),
		 'total_holidays' => $this->input->post('total_holidays'),
		 'without_supervision' => $this->input->post('without_supervision'),
		 'meet_commit' => $this->input->post('meet_commit'),
		 'high_value' => $this->input->post('high_value'),
		 'mid_value' => $this->input->post('mid_value'),
		 'ref_support' => $this->input->post('ref_support'),
		 'business_dev' => $this->input->post('business_dev'),
		 'others' => $this->input->post('others'),
		 'feedback_cand' => $this->input->post('feedback_cand'),
		 'trans_flow' => $this->input->post('trans_flow'),
		 'rel_peers' => $this->input->post('rel_peers'),
		 'sharing_peers' => $this->input->post('sharing_peers'),
		 'take_initiative' => $this->input->post('take_initiative'),
		 'self_initiative' => $this->input->post('self_initiative'),
		 'manage_process' => $this->input->post('manage_process'),
		 'total_team_closure' => $this->input->post('total_team_closure'),
		 'new_team' => $this->input->post('new_team'),
		 'retain_team' => $this->input->post('retain_team'),
		 'leadership' => $this->input->post('leadership'),
		 'date' => date('Y-m-d'),
		 'submit' => 1,
		 'resubmit' => $this->input->post('resubmit'),
		  );
		 if ($this->db->insert('appraisal',$data))
		   {
		    return $this->db->insert_id();
		   }
		  else
		  {
		   return FALSE;
		  }
		}
		
		// appraisal feedback
	  function editAppraisalDraft($id)
	    {
		 $data = array(
		 'cons_name' => $this->input->post('cons_name'),
		 'join_date' => $this->input->post('join_date'),
		 'app_period' => $this->input->post('app_period'),
		 'total_added' => $this->input->post('total_added'),
		 'no_work' => $this->input->post('no_work'),
		 'no_cv' => $this->input->post('no_cv'),
		 'no_cv_vrs' => $this->input->post('no_cv_vrs'),
		 'client_mgmt' =>$this->input->post('client_mgmt'),
		 'facilitating' => $this->input->post('facilitating'),
		 'total_closure' => $this->input->post('total_closure'),
		 'avg_closure' => $this->input->post('avg_closure'),
		 'ratio' => $this->input->post('ratio'),
		 'highest_value' => $this->input->post('highest_value'),
		 'time_taken' => $this->input->post('time_taken'),
		 'exec_speed' => $this->input->post('exec_speed'),
		 'avg_calling' => $this->input->post('avg_calling'),
		 'referencing' => $this->input->post('referencing'),
		 'avg_day' => $this->input->post('avg_day'),
		 'avg_cv_sent' => $this->input->post('avg_cv_sent'),
		 'resumes_reject' => $this->input->post('resumes_reject'),
		 'handle_pres' => $this->input->post('handle_pres'),
		 'scalability' => $this->input->post('scalability'),
		 'multi_task' => $this->input->post('multi_task'),
		 'commit_excel' => $this->input->post('commit_excel'),
		 'total_holidays' => $this->input->post('total_holidays'),
		 'without_supervision' => $this->input->post('without_supervision'),
		 'meet_commit' => $this->input->post('meet_commit'),
		 'high_value' => $this->input->post('high_value'),
		 'mid_value' => $this->input->post('mid_value'),
		 'ref_support' => $this->input->post('ref_support'),
		 'business_dev' => $this->input->post('business_dev'),
		 'others' => $this->input->post('others'),
		 'feedback_cand' => $this->input->post('feedback_cand'),
		 'trans_flow' => $this->input->post('trans_flow'),
		 'rel_peers' => $this->input->post('rel_peers'),
		 'sharing_peers' => $this->input->post('sharing_peers'),
		 'take_initiative' => $this->input->post('take_initiative'),
		 'self_initiative' => $this->input->post('self_initiative'),
		 'manage_process' => $this->input->post('manage_process'),
		 'total_team_closure' => $this->input->post('total_team_closure'),
		 'new_team' => $this->input->post('new_team'),
		 'retain_team' => $this->input->post('retain_team'),
		 'leadership' => $this->input->post('leadership'),
		  'submit' => 0,
		  );
		 if ($this->db->where('id',$id)->update('appraisal',$data))
		   {
		    return TRUE;
		   }
		  else
		  {
		   return FALSE;
		  }
		}
    function allCands()
	   {
	   $data=array();
		$this->db->from('appraisal');
		$this->db->join('be_users','appraisal.cons_name=be_users.username','right');
		$this->db->where('active',1);
		$this->db->where('group',3);
		$this->db->or_where('group',4);
		$this->db->order_by('be_users.username');
		$this->db->group_by('be_users.username');
		$Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	    
	      return $data; 
		}
		
		//gets the user details
	 function viewAppDetails($username)
	  {
	    $data=array();
		$this->db->from('appraisal');
		$this->db->where('cons_name',$username);
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
		  
	  function submitComments($username)
	    {
		 $data = array(
		 'cons_name' => $username,
		 'join_date' => $this->input->post('join_date'),
		 'app_period' => $this->input->post('app_period'),
		 'total_added' => $this->input->post('total_added'),
		 'no_work' => $this->input->post('no_work'),
		 'no_cv' => $this->input->post('no_cv'),
		 'no_cv_vrs' => $this->input->post('no_cv_vrs'),
		 'client_mgmt' =>$this->input->post('client_mgmt'),
		 'facilitating' => $this->input->post('facilitating'),
		 'total_closure' => $this->input->post('total_closure'),
		 'avg_closure' => $this->input->post('avg_closure'),
		 'ratio' => $this->input->post('ratio'),
		 'highest_value' => $this->input->post('highest_value'),
		 'time_taken' => $this->input->post('time_taken'),
		 'exec_speed' => $this->input->post('exec_speed'),
		 'avg_calling' => $this->input->post('avg_calling'),
		 'referencing' => $this->input->post('referencing'),
		 'avg_day' => $this->input->post('avg_day'),
		 'avg_cv_sent' => $this->input->post('avg_cv_sent'),
		 'resumes_reject' => $this->input->post('resumes_reject'),
		 'handle_pres' => $this->input->post('handle_pres'),
		 'scalability' => $this->input->post('scalability'),
		 'multi_task' => $this->input->post('multi_task'),
		 'commit_excel' => $this->input->post('commit_excel'),
		 'total_holidays' => $this->input->post('total_holidays'),
		 'without_supervision' => $this->input->post('without_supervision'),
		 'meet_commit' => $this->input->post('meet_commit'),
		 'high_value' => $this->input->post('high_value'),
		 'mid_value' => $this->input->post('mid_value'),
		 'ref_support' => $this->input->post('ref_support'),
		 'business_dev' => $this->input->post('business_dev'),
		 'others' => $this->input->post('others'),
		 'feedback_cand' => $this->input->post('feedback_cand'),
		 'trans_flow' => $this->input->post('trans_flow'),
		 'rel_peers' => $this->input->post('rel_peers'),
		 'sharing_peers' => $this->input->post('sharing_peers'),
		 'take_initiative' => $this->input->post('take_initiative'),
		 'self_initiative' => $this->input->post('self_initiative'),
		 'manage_process' => $this->input->post('manage_process'),
		 'total_team_closure' => $this->input->post('total_team_closure'),
		 'new_team' => $this->input->post('new_team'),
		 'retain_team' => $this->input->post('retain_team'),
		 'leadership' => $this->input->post('leadership'),
		 'com_ope_ex' => $this->input->post('com_ope_ex'),
		 'com_num_del' => $this->input->post('com_num_del'),
		 'com_ex_level' => $this->input->post('com_ex_level'),
		 'com_pot' => $this->input->post('com_pot'),
		 'com_level' => $this->input->post('com_level'),
		 'com_cand_rel' => $this->input->post('com_cand_rel'),
		 'com_client_rel' => $this->input->post('com_client_rel'),
		 'com_peer_rel' => $this->input->post('com_peer_rel'),
		 'com_ini' => $this->input->post('com_ini'),
		 'com_pro' => $this->input->post('com_pro'),
		 'com_leadership' => $this->input->post('com_leadership'),
		 );
		 
		if ($this->db->where('cons_name',$username)->update('appraisal',$data))
		   {
		    return TRUE;
		   }
		  else
		  {
		   return FALSE;
		  }
		}
		
	  // get admin and client managers
	  // This retrieve the hiring manager detail for a pof
	   function getAdminClientMgr(){
		   $data=array();
		   $this->db->select('*');
		   $this->db->from('be_users');
		   $this->db->where('group', 2);
		    $this->db->or_where('group', 8);
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
	  // send message that the new positions has been uploaded
	 function sendMsg($data)
	    {
		   if($this->db->insert('messege',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	   }
	   
	   function getCandStagesPre(){
		 $data = array();
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',4);
		  $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->id]=$row->segment_name;
		  }
		  return $data;
	    }
		//
		function getCandStagesPost(){
		 $data = array();
		 $this->db->from('segment_name');
		 $this->db->where('segment_type_id',5);
		  $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->id]=$row->segment_name;
		  }
		  return $data;
	    }
		
	function get_posdatabank($pid)
	{
		$sql = "SELECT * FROM candidates JOIN pof_candidates ON candidates.id=pof_candidates.cand_id WHERE pofid='".$pid."' GROUP BY id ";
		
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
	
	 // This gets a list of client names fro dropdown
	 function getClientDropdown()
	    {
		 $data = array();
		 $this->db->from('companies');
		 $this->db->join('synonym','companies.compid=synonym.s_id');
		 $this->db->where('is_client','334');
		 $this->db->order_by('parentname','ASC');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->compid]=$row->parentname;
		  }
		  return $data;
		}
		
		 // This gets a list of client names fro dropdown
	 function getClientDropdown2()
	    {
		 $data = array();
		 $this->db->from('companies');
		 $this->db->join('synonym','companies.compid=synonym.s_id');
		 $this->db->where('is_client','334');
		 $this->db->order_by('parentname','ASC');
		 $q = $this->db->get();
		 foreach($q->result() as $row)
		  {
		   $data[$row->parentname]=$row->parentname;
		  }
		  return $data;
		}
		
	 function getGradeList(){
	 
		$company = $this->input->post('companyid');
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
		$this->db->where('cid',$company);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->gid]= $row->grade;
        }
        
        return $result;
	}
	
	function getHiringManagerList(){
	 
		$company = $this->input->post('companyid');
		$result = array();
		$this->db->select('*');
		$this->db->from('candidates');
		$this->db->where('prid',$company);
		$this->db->where('cand_mgmt','329');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->candidate_name;
        }
        
        return $result;
	}
	
	function getClientManagerList(){
	 
		$hrmanager = $this->input->post('hrmanagerid');
		$result = array();
		$this->db->select('*');
		$this->db->from('pof');
		$this->db->join('be_users',"pof.manager=be_users.id");
		$this->db->where('hiring_manager',$hrmanager);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->username;
        }
        
        return $result;
	}
	
	function getLevelList(){
	 
		$grade = $this->input->post('gradeid');
		$result = array();
		$this->db->select('*');
		$this->db->from('companies_grade');
		$this->db->join('segment_name','companies_grade.level=segment_name.id');
		$this->db->where('companies_grade.gid',$grade);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	}
	
	// this counts all the pofs.
	function record_count_posdelivery()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM pof WHERE pof.is_allocated='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
    // This retrieves all the POF's record from database
	 function getAllPosDelivery($limit,$column_name,$order){
	 	$sql = "SELECT *,SUM(stage='283') As sum1, SUM(stage='284') As sum2, SUM(stage='285') As sum3, SUM(stage='286') As sum4, SUM(stage='287') As sum5, SUM(stage='288') As sum6, SUM(stage='289') As sum7, SUM(stage='290') As sum8, SUM(stage='291') As sum9, SUM(stage='292') As sum10, SUM(stage='293') As sum11, SUM(stage='294') As sum12, SUM(stage='295') As sum13, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid LEFT JOIN (SELECT * FROM events_tt WHERE is_alloc='1' GROUP BY pof_id) As was ON pof.pof_id=was.pof_id LEFT JOIN allocation ON was.alloc_id=allocation.id LEFT JOIN (SELECT date As cvsenton,pofid FROM pof_candidates ORDER BY date DESC LIMIT 1,1) As lastcv ON pof.pof_id=lastcv.pofid LEFT JOIN candidates ON pof.hiring_manager=candidates.id WHERE pof.is_allocated='1' AND pof.not_pursue='0' GROUP BY pof.pof_id ORDER BY ".$column_name." ".$order." LIMIT " .$limit . ",20 ";
	   $Q = $this->db->query($sql);
	if($Q->num_rows() > 0){
	foreach($Q->result() as $row)
	{
	 $data[] = $row;
	}
	}
	 $Q->free_result();  
	    return $data; 
   }
	  //
	  
	  // this counts all the pofs.
	function record_count_posdelivery_filer($company,$location,$grade,$salary,$posstatus,$consul,$focus,$closure)
	{
		 $sql = "SELECT COUNT(pof.pof_id) As cnt FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id WHERE pof.is_allocated='1' AND pof.not_pursue='0' AND pof.jobtitle LIKE '%".$jobtitle."%' AND synonym.parentname LIKE '%".$company."%' AND pof.pos_status LIKE '%".$posstatus."%' AND pof_cons.consuls LIKE '%".$consul."%' GROUP BY pof.pof_id";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	   // This retrieves all the POF's record from database
	 function getFilterDelRecord($limit,$column_name,$order,$pofno,$dor,$jobtitle,$company,$location,$grade,$salary,$posstatus,$consul,$focus,$closure){
	 
	    $sql = "SELECT *,SUM(stage='283') As sum1, SUM(stage='284') As sum2, SUM(stage='285') As sum3, SUM(stage='286') As sum4, SUM(stage='287') As sum5, SUM(stage='288') As sum6, SUM(stage='289') As sum7, SUM(stage='290') As sum8, SUM(stage='291') As sum9, SUM(stage='292') As sum10, SUM(stage='293') As sum11, SUM(stage='294') As sum12, SUM(stage='295') As sum13, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid LEFT JOIN (SELECT * FROM events_tt WHERE is_alloc='1' GROUP BY pof_id) As was ON pof.pof_id=was.pof_id LEFT JOIN allocation ON was.alloc_id=allocation.id LEFT JOIN (SELECT date As cvsenton,pofid FROM pof_candidates ORDER BY date DESC LIMIT 1,1) As lastcv ON pof.pof_id=lastcv.pofid LEFT JOIN candidates ON pof.hiring_manager=candidates.id WHERE pof.is_allocated='1' AND pof.not_pursue='0' AND pof.jobtitle LIKE '%".$jobtitle."%' AND synonym.parentname LIKE '%".$company."%' AND pof.pos_status LIKE '%".$posstatus."%' AND pof_cons.consuls LIKE '%".$consul."%' GROUP BY pof.pof_id LIMIT " .$limit . ",20 ";
	 	
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
	  //position at offer
	  // this counts all the pofs.
	function record_count_posatclosure()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM pof WHERE pof.is_allocated='1' AND pof.not_pursue='0' AND pof.closure='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
    // This retrieves all the POF's record from database
	 function getAllPosatclosure($limit){
	 	$sql = "SELECT *,SUM(stage='283') As sum1, SUM(stage='284') As sum2, SUM(stage='285') As sum3, SUM(stage='286') As sum4, SUM(stage='287') As sum5, SUM(stage='288') As sum6, SUM(stage='289') As sum7, SUM(stage='290') As sum8, SUM(stage='291') As sum9, SUM(stage='292') As sum10, SUM(stage='293') As sum11, SUM(stage='294') As sum12, SUM(stage='295') As sum13, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid LEFT JOIN (SELECT * FROM events_tt WHERE is_alloc='1' GROUP BY pof_id) As was ON pof.pof_id=was.pof_id LEFT JOIN allocation ON was.alloc_id=allocation.id LEFT JOIN (SELECT date As cvsenton,pofid FROM pof_candidates ORDER BY date DESC LIMIT 1,1) As lastcv ON pof.pof_id=lastcv.pofid WHERE pof.is_allocated='1' AND pof.not_pursue='0' AND pof.closure='1' GROUP BY pof.pof_id ORDER BY pof.pof_id DESC LIMIT " .$limit . ",20 ";
	   $Q = $this->db->query($sql);
	if($Q->num_rows() > 0){
	foreach($Q->result() as $row)
	{
	 $data[] = $row;
	}
	}
	 $Q->free_result();  
	    return $data; 
   }
	  //
	  
	   //position at focus
	  // this counts all the pofs.
	function record_count_posatfocus()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM pof WHERE pof.is_allocated='1' AND pof.not_pursue='0' AND pof.focus='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
    // This retrieves all the POF's record from database
	 function getAllPosatfocus($limit){
	 	$sql = "SELECT *,SUM(stage='283') As sum1, SUM(stage='284') As sum2, SUM(stage='285') As sum3, SUM(stage='286') As sum4, SUM(stage='287') As sum5, SUM(stage='288') As sum6, SUM(stage='289') As sum7, SUM(stage='290') As sum8, SUM(stage='291') As sum9, SUM(stage='292') As sum10, SUM(stage='293') As sum11, SUM(stage='294') As sum12, SUM(stage='295') As sum13, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN companies_grade ON pof.grade=companies_grade.gid LEFT JOIN (SELECT * FROM events_tt WHERE is_alloc='1' GROUP BY pof_id) As was ON pof.pof_id=was.pof_id LEFT JOIN allocation ON was.alloc_id=allocation.id LEFT JOIN (SELECT date As cvsenton,pofid FROM pof_candidates ORDER BY date DESC LIMIT 1,1) As lastcv ON pof.pof_id=lastcv.pofid WHERE pof.is_allocated='1' AND pof.not_pursue='0' AND pof.focus='1' GROUP BY pof.pof_id ORDER BY pof.pof_id DESC LIMIT " .$limit . ",20 ";
	   $Q = $this->db->query($sql);
	if($Q->num_rows() > 0){
	foreach($Q->result() as $row)
	{
	 $data[] = $row;
	}
	}
	 $Q->free_result();  
	    return $data; 
   }
	  //
	 // worksheet company
	 // for companies names
	  function getWorksheetComp(){
		 $sql="SELECT synonym.s_id, synonym.parentname FROM candidates RIGHT JOIN synonym ON candidates.prid=synonym.s_id WHERE candidates.put_in_worksheet='1' AND candidates.prid!='0' GROUP BY synonym.parentname";
		 $q = $this->db->query($sql);
		 foreach($q->result() as $row)
		  {
		   $data[$row->s_id]=$row->parentname;
		  }
		  return $data;
		}
		//
		 // This retrieves all the POF's record from database
	 function getAllTags($pid){
	 
	    $sql = "SELECT * FROM tag_vc JOIN tag_name ON tag_name.t_id=tag_vc.tagv_id WHERE tag_vc.pof_id='".$pid."';";
	 	
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
	  function addTagVC($tagdata){
	     if ($this->db->insert('tag_vc',$tagdata))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
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
	function deletefrompos($candidateid,$pofno){
	 	$this->db->where('cand_id',$candidateid);
		$this->db->where('pofid', $pofno);
		$this->db->delete('pof_candidates');	
	 }
	 function deleteCandidate($candidateid){
	 	$this->db->where('id', $candidateid);
		$this->db->delete('candidates');	
	 }

}



	 



	 
	