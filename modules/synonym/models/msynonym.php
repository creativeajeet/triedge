<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MSynonym extends Base_model{

	function MSynonym(){
		parent::Base_model();
		$this->_TABLES = array( 'list' => 'list'
                                    );
	}
	function import($sql){
      $this->load->database();
      $this->db->query($sql);
     } 
	  function importworks($sql){
      $this->load->database();
      $this->db->query($sql);
     } 
	function getListtype(){
	    $data = array();
		$sql="SELECT * FROM autopopulate WHERE parent_id IS NULL";
		$array_keys_values = $this->db->query($sql);
        foreach ($array_keys_values->result() as $row)
        {
          $data[$row->id]= $row->name;
        }
        
        return $data;
	}
	 //count companies
	
	function record_count_company()
	{
		 $sql = "SELECT COUNT(DISTINCT company) As cnt FROM candidates WHERE sent_to_synonym='0' AND is_company_updated='1' AND noncore='0'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_company($limit){
	 	$sql="SELECT id,company,COUNT(company) As countcomp FROM candidates WHERE sent_to_synonym='0' AND is_company_updated='1' AND noncore='0' GROUP BY company LIMIT " .$limit . ",20 ";
				
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
	
	 //count companies
	
	function record_count_company_listview()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_company_updated='1' AND (is_to_Delete='0' OR is_to_Delete=' ') AND noncore='0' AND sent_to_synonym='0'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_company_listview($limit){
	 	$sql="SELECT * FROM candidates WHERE is_company_updated='1' AND (is_to_Delete='0' OR is_to_Delete=' ') AND noncore='0' AND sent_to_synonym='0' ORDER BY company LIMIT " .$limit . ",20 ";
				
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
	
	//count companies
	
	function record_count_company_syn()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_company_updated='1' AND (is_to_Delete='0' OR is_to_Delete=' ') AND noncore='0' AND sent_to_synonym='1' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_company_syn($limit){
	 	$sql="SELECT * FROM candidates WHERE is_company_updated='1' AND (is_to_Delete='0' OR is_to_Delete=' ') AND noncore='0' AND sent_to_synonym='1' ORDER BY company  LIMIT " .$limit . ",20 ";
				
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
	
	function fetch_company_work(){
	 	$sql="SELECT synonym FROM synonym ";
				
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
	
	function record_count_companyf($comp)
	{
		$sql = "SELECT COUNT(DISTINCT company) As cnt FROM candidates LEFT JOIN synonym ON candidates.company=synonym.synonym WHERE candidates.company LIKE '%".$comp."%' AND synonym.synonym IS NULL ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_companyf($comp,$limit){
	 	$sql="SELECT id,company FROM candidates LEFT JOIN synonym ON candidates.company=synonym.synonym WHERE candidates.company LIKE '%".$comp."%' AND synonym.synonym IS NULL GROUP BY candidates.company ORDER BY candidates.company ASC LIMIT " .$limit . ",20 ";
				
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
	//count companies
	
	function record_count_cleanedcompany()
	{
		 $sql = "SELECT COUNT(s_id) As cnt FROM synonym WHERE type='company'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_cleanedcompany($limit){
	 	$sql="SELECT * FROM synonym WHERE type='company' ORDER BY synonym LIMIT " .$limit . ",20 ";
				
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
	//count companies
	
	function record_count_cleanedcompany_filters($comp)
		{
		 $sql = "SELECT COUNT(s_id) As cnt FROM synonym WHERE is_parent='".$comp."' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_cleanedcompany_filters($comp,$limit){
	 	$sql="SELECT * FROM synonym WHERE is_parent='".$comp."' ORDER BY synonym LIMIT " .$limit . ",20 ";
				
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
	
	function record_count_cleanedcompany_filterss($comp)
		{
		 $sql = "SELECT COUNT(s_id) As cnt FROM synonym WHERE is_parent='".$comp."' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_cleanedcompany_filterss($comp,$limit){
	 	$sql="SELECT * FROM synonym WHERE is_parent='".$comp."' ORDER BY synonym LIMIT " .$limit . ",20 ";
				
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
	//count companies
	
	function record_count_cleanedcompany_filter($compage)
		{
		 $sql = "SELECT COUNT(s_id) As cnt FROM synonym WHERE is_parent='1' AND companypage='".$compage."' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_cleanedcompany_filter($compage,$limit){
	 	$sql="SELECT * FROM synonym WHERE is_parent='1' AND companypage='".$compage."' ORDER BY synonym LIMIT " .$limit . ",20 ";
				
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
	
	
	function searchterm_handler_comp($compf)
	{
		
			if($compf)
		{
			$this->session->set_userdata('compf', $compf);
			return $compf;
		}
		elseif($this->session->userdata('compf'))
		{
			$compf = $this->session->userdata('compf');
			return $compf;
		}
		else
		{
			$compf ="";
			return $compf;
		}
		
	}
	function searchterm_handler_psf($psf)
	{
		
			if($psf)
		{
			$this->session->set_userdata('psf', $psf);
			return $psf;
		}
		elseif($this->session->userdata('psf'))
		{
			$psf = $this->session->userdata('psf');
			return $psf;
		}
		else
		{
			$psf ="";
			return $psf;
		}
		
	}
	
	function searchterm_handler_compage($compage)
	{
		
			if($compage)
		{
			$this->session->set_userdata('compage', $compage);
			return $compage;
		}
		elseif($this->session->userdata('compage'))
		{
			$compage = $this->session->userdata('compage');
			return $compage;
		}
		else
		{
			$compage ="";
			return $compage;
		}
		
	}
	 // This retrieves all the lists.
	 function fetchcompanies(){
	 	$sql="SELECT id,current_company FROM candidates WHERE id NOT IN (19147,38126,38740,73405,204134)";
				
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
	// add synonyms to parent
	 function addtoparent($synonym_details)
	   {
	    if($this->db->insert("synonym",$synonym_details))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	    // add synonyms to parent
	 function addParent($parent,$name,$companypage)
	   {
	    $data = array(
		'parentname' => $parent,
		'synonym' => $parent,
		'type' => $name,
		'companypage' => $companypage,
		'is_parent' => 1
		);
	    if($this->db->insert("synonym",$data))
		  {
		   return $this->db->insert_id();
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	 // get parent list
	 //
	function getParent(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where('type','company');
		$this->db->group_by('parentname');	
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->parentname]= $row->parentname;
        }
        
        return $result;
	}
	// get synonyms
	function getexistingsynonym(){
	 
		$existingcompany = $this->input->post('existingcompany');
		$result = array();
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where_in('parentname',$existingcompany);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->synonym]= $row->synonym;
        }
        
        return $result;
	}
     // This retrieves all the lists.
	 function getAllRecord(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('list'); 
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	 	
	 }
	 
	 function getAllListRecord($id){
	 	$data = array();
		$this->db->select('*');
	    $this->db->from('listentry');
	    $this->db->where('list_id', $id);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	 	
	 }
	 
	 function getSingleList($id=NULL){
		$data = array();
		$this->db->select('*');
		$this->db->from('list');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
	       foreach ($query->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $query->free_result();  
	    return $data; 
		
	} 
	
	function getCatList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('list');
		$this->db->order_by('id','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
          $result[$row->id]= $row->name;
        }
        
        return $result;
	}
	
	
	function getCatEnrtyList(){
	 	$cat_id = $this->input->post('cid');
		$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
		$this->db->where_in('list_id',$cat_id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
          $result[$row->id]= $row->entry;
        }
        
        return $result;
	}
	
	/*function getCatEnrtyList(){
	 
		$country_id = $this->input->post('countryid');
		$result = array();
		$this->db->select('*');
		$this->db->from('city');
		$this->db->where_in('countryid',$country_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->cityname;
        }
        
        return $result;
	}
	*/
	function getList($id){
	    $result = array();
		$this->db->select('*');
		$this->db->from('listentry');
		$this->db->where('list_id', $id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->entry;
        }
        return $result;
	}
	
	
    function getListDropdown(){
	   	$result = array();
		$this->db->select('*');
		$this->db->from('list');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
          $result[$row->id]= $row->name;
        }
       return $result;
	}
	
/*	function getList($id){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
		$this->db->where('list_id', $id);
		$this->db->where('is_entry', TRUE);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->entry;
        }
        
        return $result;
	}
	
	*/
		 
 	function addList(){
		 	$data = array( 
			'name' => $this->input->post('name'),
			'type' => $this->input->post('type'),	
	 			);
			
		 if ($this->db->insert('list',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	      }
	 
	
	function enter_list($data){
         if ($this->db->insert('listentry',$data))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	// This inserts the values for synonyms into the database. 
	function make_syn(){
	 	$data = array( 
			'list1' => $this->input->post('list1'),
			'list2' => $this->input->post('list2'),
		);
		$this->db->insert('listsyn',$data);	
		$this->db->set('is_entry', 'FALSE');
        $this->db->where('id',$data['list2']);  
		$this->db->update('listentry');   
	 }
	 function record_count_company_update()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	 function getTotalUpdatedLoc()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE is_to_Delete = 0 AND is_location_updated=1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	} 
	
	function getTotalUpdatedDesig()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE is_to_Delete = 0 AND is_desig_updated=1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	} 
	
	function getTotalUpdatedInstt()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE is_to_Delete = 0 AND is_instt_updated=1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	} 
	
	function getTotalUpdatedCourse()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE is_to_Delete = 0 AND is_course_updated=1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	} 
	
	 function getTotalUpdated()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_to_Delete = 0 AND is_company_updated=1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	} 
	
	 function fetch_candidates($limit)
	{
		$sql="SELECT * FROM candidates WHERE is_to_Delete = 0 ORDER BY company DESC LIMIT " .$limit . ",100 ";
		
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
	
	function record_count_loc_update()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.current_location) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.loc_to_synonym='0' AND candstatus.is_location_updated='0' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}

	function fetch_candidates_loc($limit)
	{
		$sql="SELECT id,candidates.current_location,COUNT(candidates.current_location) As countloc FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.loc_to_synonym='0' AND candstatus.is_location_updated='0' GROUP BY candidates.current_location LIMIT " .$limit . ",100 ";
		
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
	
	function record_count_desig_update()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}

	function fetch_candidates_desig($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE is_to_Delete = 0 ORDER BY candstatus.designation DESC LIMIT " .$limit . ",100 ";
		
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
	
	
	function record_count_instt_update()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}

	function fetch_candidates_instt($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE is_to_Delete = 0 ORDER BY candstatus.institute DESC LIMIT " .$limit . ",100 ";
		
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
	
	function record_count_course_update()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}

	function fetch_candidates_course($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE is_to_Delete = 0 ORDER BY candstatus.course DESC LIMIT " .$limit . ",100 ";
		
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
	function record_count_company_noncore()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_to_Delete = 0 AND noncore='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
		
	 function fetch_candidates_noncore($limit)
	{
		$sql="SELECT * FROM candidates WHERE is_to_Delete = 0 AND noncore='1' ORDER BY company DESC LIMIT " .$limit . ",100 ";
		
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
	 // This updates company
 	   function updateComp($id,$data){
	   	if($this->db->where('id',$id)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	   // This updates company
 	   function updateComp2($locg,$data){
	   	if($this->db->where('current_location',$locg)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function updateLoc($id,$data2){
	   	if($this->db->where('location',$id)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function updateLoc2($locg,$data2){
	   	if($this->db->where('location',$locg)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function updateComp3($locg,$data){
	   	if($this->db->where('designation',$locg)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function updateDesig2($id,$data2){
	   	if($this->db->where('designation',$id)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	  
	  // This updates company
 	   function updateDesig($id,$data2){
	   	if($this->db->where('cdid',$id)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   } 
	   
	    // This updates company
 	   function updateComp4($locg,$data){
	   	if($this->db->where('institute',$locg)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function updateInstt2($id,$data2){
	   	if($this->db->where('institute',$id)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	  // This updates company
 	   function updateInstt($id,$data2){
	   	if($this->db->where('cdid',$id)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function updateComp5($locg,$data){
	   	if($this->db->where('course',$locg)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function updateCourse2($id,$data2){
	   	if($this->db->where('course',$id)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   } 
	   // This updates company
 	   function updateCourse($id,$data2){
	   	if($this->db->where('cdid',$id)->update('candstatus',$data2))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	  
	    function upCleaned($clean){
		 $sql = 'UPDATE candidates SET is_company_updated="0" WHERE company COLLATE Latin1_General_CS = "'.$clean.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    function sendtononcore($noncoree){
			 $sql = 'UPDATE candidates SET noncore="1" WHERE company COLLATE Latin1_General_CS = "'.$noncoree.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	    // This updates company
 	   function updateCand($id,$data){
	   	if($this->db->where('id',$id)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    // This updates company
 	   function sendBack($id,$data){
	   	if($this->db->where('id',$id)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	     // This updates company
 	   function updateCore($id,$data){
	   	if($this->db->where('id',$id)->update('candidates',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	    function replace($replace,$replacewith){
	 	$data = array(
		'company' => $replacewith,
		'is_company_updated' => '1',
		'company_updated_by' => $this->session->userdata('username'),
		'company_updated_on' => date('Y-m-d H:i:s')
		);
				
		if($this->db->where('company',$replace)->update('candidates',$data))
		  {
		   return $this->db->affected_rows();
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   function maxdate()
	    {
		 $user = $this->session->userdata('username');
		 $sql = "SELECT MAX(company_updated_on) As cnt FROM candidates WHERE company_updated_by='".$user."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	   }
	   function getLastUpdated($maDate)
	   {
	    $user = $this->session->userdata('username');
		$sql="SELECT * FROM candidates WHERE company_updated_by='".$user."' AND company_updated_on='".$maDate."'";
		
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
	   
	   function deleteSynonym($synonym){
	  if($this->db->where('synonym',$synonym)->delete('synonym'))
	   {
	    return TRUE;
	   }
	   else{
	   
	  return FALSE;
	   }
	  }
	  
	  function changeSynSta($synonym){
	    $data = array(
			'sent_to_synonym' =>'0'
		);
	  if($this->db->where('company',$synonym)->update('candidates',$data))
	   {
	    return TRUE;
	   }
	   else{
	   
	  return FALSE;
	   }
	  }
	  
	   function updatesyns($s){
	   $data = array(
	   	'sent_to_synonym' =>'0'
	   );
	  if($this->db->where_in('company',$s)->update('candidates',$data))
	   {
	    return TRUE;
	   }
	   else{
	   
	  return FALSE;
	   }
	  }
	  function deleteparent($parent){
	  if($this->db->where('parentname',$parent)->delete('synonym'))
	   {
	    return TRUE;
	   }
	   else{
	   
	  return FALSE;
	   }
	  }
	  
	   function updateparent($parent,$rename){
	   $data = array(
	   'parentname' => $rename
	   );
	  if($this->db->where('parentname',$parent)->update('synonym',$data))
	   {
	    return TRUE;
	   }
	   else{
	   
	  return FALSE;
	   }
	  }
	  
	  function updateparentsyn($parent,$rename){
	   $data = array(
	   'synonym' => $rename
	   );
	  if($this->db->where('synonym',$parent)->update('synonym',$data))
	   {
	    return TRUE;
	   }
	   else{
	   
	  return FALSE;
	   }
	  }
	  
	   // This retrieves all the lists.
	 function getSynonym($parent){
	 	$data = array();
		$this->db->select('synonym');
		$this->db->from('synonym');
		$this->db->where('parentname', $parent);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
	       foreach ($query->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $query->free_result();  
	    return $data; 
		
	} 
	  // get all the updated companies
	   function record_count_company_allupdated()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE is_to_Delete = 0 AND is_company_updated=1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_allupdated($limit)
	{
		$sql="SELECT * FROM candidates WHERE is_to_Delete = 0 AND is_company_updated=1 ORDER BY company DESC LIMIT " .$limit . ",100 ";
		
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
	
	 // get all the updated companies
	   function record_count_company_notupdated()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates WHERE (is_company_updated='0' OR is_company_updated=' ') AND is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdated($limit)
	{
		$sql="SELECT * FROM candidates WHERE (is_company_updated='0' OR is_company_updated=' ') AND is_to_Delete = 0 ORDER BY company DESC LIMIT " .$limit . ",100 ";
		
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
	
	 // get all the updated companies
	   function record_count_company_notupdatedlocgroup()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.current_location) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.loc_to_synonym='0' AND candstatus.is_location_updated='0' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdatedlocgroup($limit)
	{
		$sql="SELECT id,candidates.current_location,COUNT(candidates.current_location) As countloc FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.loc_to_synonym='0' AND candstatus.is_location_updated='0' GROUP BY candidates.current_location LIMIT " .$limit . ",100 ";
		
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
	 // get all the updated companies
	   function record_count_company_notupdatedloc()
	{
		 $sql = "SELECT COUNT(DISTINCT candstatus.location) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_location_updated='0') AND is_to_Delete = 0 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdatedloc($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_location_updated='0') AND is_to_Delete = 0 GROUP BY location ORDER BY location DESC LIMIT " .$limit . ",100 ";
		
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
	 // get all the updated companies
	   function record_count_company_allupdatedloc()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_location_updated='1') AND is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_allupdatedloc($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_location_updated='1') AND is_to_Delete = 0 ORDER BY location DESC LIMIT " .$limit . ",100 ";
		
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
	// get all the updated companies
	   function record_count_company_notupdateddesiggroup()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.designation) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.desig_to_synonym='0' AND candstatus.is_desig_updated='0' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdateddesiggroup($limit)
	{
		$sql="SELECT id,candidates.designation,COUNT(candidates.designation) As countloc FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.desig_to_synonym='0' AND candstatus.is_desig_updated='0' GROUP BY candidates.designation LIMIT " .$limit . ",100 ";
		
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
	// get all the updated companies
	   function record_count_company_notupdateddesig()
	{
		 $sql = "SELECT COUNT(DISTINCT candstatus.designation) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_desig_updated='0') AND is_to_Delete = 0 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdateddesig($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_desig_updated='0') AND is_to_Delete = 0 GROUP BY candstatus.designation ORDER BY candstatus.designation DESC LIMIT " .$limit . ",100 ";
		
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
	
	 // get all the updated companies
	   function record_count_company_allupdateddesig()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_desig_updated='1') AND is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_allupdateddesig($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_desig_updated='1') AND is_to_Delete = 0 ORDER BY candstatus.designation DESC LIMIT " .$limit . ",100 ";
		
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
	// get all the updated companies
	   function record_count_company_notupdatedinsttgroup()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.institute) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.instt_to_synonym='0' AND candstatus.is_instt_updated='0' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdatedinsttgroup($limit)
	{
		$sql="SELECT id,candidates.institute,COUNT(candidates.institute) As countloc FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.instt_to_synonym='0' AND candstatus.is_instt_updated='0' GROUP BY candidates.institute LIMIT " .$limit . ",100 ";
		
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
	// get all the updated companies
	   function record_count_company_notupdatedinstt()
	{
		 $sql = "SELECT COUNT(DISTINCT candstatus.institute) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_instt_updated='0') AND is_to_Delete = 0 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdatedinstt($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_instt_updated='0') AND is_to_Delete = 0 GROUP BY candstatus.institute ORDER BY candstatus.institute DESC LIMIT " .$limit . ",100 ";
		
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
	
	 // get all the updated companies
	   function record_count_company_allupdatedinstt()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_instt_updated='1') AND is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_allupdatedinstt($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_instt_updated='1') AND is_to_Delete = 0 ORDER BY candstatus.institute DESC LIMIT " .$limit . ",100 ";
		
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
	// get all the updated companies
	   function record_count_company_notupdatedcoursegroup()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.course) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.course_to_synonym='0' AND candstatus.is_course_updated='0' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdatedcoursegroup($limit)
	{
		$sql="SELECT id,candidates.course,COUNT(candidates.course) As countloc FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.course_to_synonym='0' AND candstatus.is_course_updated='0' GROUP BY candidates.course LIMIT " .$limit . ",100 ";
		
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
	// get all the updated companies
	   function record_count_company_notupdatedcourse()
	{
		 $sql = "SELECT COUNT(DISTINCT candstatus.course) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_course_updated='0') AND is_to_Delete = 0 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notupdatedcourse($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_course_updated='0') AND is_to_Delete = 0  GROUP BY candstatus.course ORDER BY candstatus.course DESC LIMIT " .$limit . ",100 ";
		
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
	
	 // get all the updated companies
	   function record_count_company_allupdatedcourse()
	{
		 $sql = "SELECT COUNT(id) As cnt FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_course_updated='1') AND is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_allupdatedcourse($limit)
	{
		$sql="SELECT * FROM candidates JOIN candstatus ON candidates.id=candstatus.cdid WHERE (is_course_updated='1') AND is_to_Delete = 0 ORDER BY candstatus.course DESC LIMIT " .$limit . ",100 ";
		
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
	
	
	  // for industry list
	function record_count_industry()
	{
		 $sql = "SELECT COUNT(DISTINCT industry) As cnt FROM candidates ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_industry($limit){
	 	$sql="SELECT id,industry FROM candidates GROUP BY industry LIMIT " .$limit . ",20 ";
				
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
	// get existing industries
	function getParentInd(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id','1');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->segment_name]= $row->segment_name;
        }
        
        return $result;
	}
	function record_count_industryf($ind)
	{
		$sql = "SELECT COUNT(DISTINCT industry) As cnt FROM candidates LEFT JOIN synonym ON candidates.industry=synonym.synonym WHERE candidates.industry LIKE '%".$ind."%' AND synonym.synonym IS NULL ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_industryf($ind,$limit){
	 	$sql="SELECT id,industry FROM candidates LEFT JOIN synonym ON candidates.industry=synonym.synonym WHERE candidates.industry LIKE '%".$ind."%' AND synonym.synonym IS NULL GROUP BY candidates.industry ORDER BY candidates.industry ASC LIMIT " .$limit . ",20 ";
				
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
	
	function searchterm_handler_ind($indf)
	{
		
			if($indf)
		{
			$this->session->set_userdata('indf', $indf);
			return $indf;
		}
		elseif($this->session->userdata('indf'))
		{
			$indf = $this->session->userdata('indf');
			return $indf;
		}
		else
		{
			$indf ="";
			return $indf;
		}
		
	}
	
	// for location list
	function record_count_location()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.current_location) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.loc_to_synonym='0' AND candstatus.is_location_updated='1' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_location($limit){
	 	$sql="SELECT id,candidates.current_location,COUNT(candidates.current_location) As countloc FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.loc_to_synonym='0' AND candstatus.is_location_updated='1' GROUP BY candidates.current_location LIMIT " .$limit . ",20 ";
				
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
	// get existing industries
	function getParentLoc(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where('type','2');
		$this->db->group_by('parentname');	
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->parentname]= $row->parentname;
        }
        
        return $result;
	}
	function record_count_locationf($ind)
	{
		$sql = "SELECT COUNT(DISTINCT industry) As cnt FROM candidates LEFT JOIN synonym ON candidates.industry=synonym.synonym WHERE candidates.industry LIKE '%".$ind."%' AND synonym.synonym IS NULL ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_locationf($ind,$limit){
	 	$sql="SELECT id,industry FROM candidates LEFT JOIN synonym ON candidates.industry=synonym.synonym WHERE candidates.industry LIKE '%".$ind."%' AND synonym.synonym IS NULL GROUP BY candidates.industry ORDER BY candidates.industry ASC LIMIT " .$limit . ",20 ";
				
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
	
	function searchterm_handler_loc($locf)
	{
		
			if($locf)
		{
			$this->session->set_userdata('locf', $locf);
			return $locf;
		}
		elseif($this->session->userdata('locf'))
		{
			$locf = $this->session->userdata('locf');
			return $locf;
		}
		else
		{
			$locf ="";
			return $locf;
		}
		
	}
	
	// for location list
	function record_count_indfunction()
	{
		 $sql = "SELECT COUNT(DISTINCT indfunction) As cnt FROM candidates ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_indfunction($limit){
	 	$sql="SELECT id,indfunction FROM candidates GROUP BY indfunction LIMIT " .$limit . ",20 ";
				
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
	// get existing industries
	function getParentIndFunc(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where('type','indfunction');
		$this->db->group_by('parentname');	
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->parentname]= $row->parentname;
        }
        
        return $result;
	}
	
	function record_count_indfuncf($ind)
	{
		$sql = "SELECT COUNT(DISTINCT indfunction) As cnt FROM candidates LEFT JOIN synonym ON candidates.indfunction=synonym.synonym WHERE candidates.indfunction LIKE '%".$ind."%' AND synonym.synonym IS NULL ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_indfuncf($ind,$limit){
	 	$sql="SELECT id,indfunction FROM candidates LEFT JOIN synonym ON candidates.indfunction=synonym.synonym WHERE candidates.indfunction LIKE '%".$ind."%' AND synonym.synonym IS NULL GROUP BY candidates.indfunction ORDER BY candidates.indfunction ASC LIMIT " .$limit . ",20 ";
				
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
	
	function searchterm_handler_indfunc($indfuncf)
	{
		
			if($indfuncf)
		{
			$this->session->set_userdata('indfuncf', $indfuncf);
			return $indfuncf;
		}
		elseif($this->session->userdata('indfuncf'))
		{
			$indfuncf = $this->session->userdata('indfuncf');
			return $indfuncf;
		}
		else
		{
			$indfuncf ="";
			return $indfuncf;
		}
		
	}
	function savechanges($sid,$data)
	  {
	    if($this->db->where('s_id',$sid)->update('synonym',$data))
	     {
		  return TRUE;
		 }
		 else{
		 return FALSE;
		 }
	  }
	  
	  function sendtosynonym($compp)
	  {
	   $data = array(
	  	   'sent_to_synonym' =>1
	   );
	   if($this->db->where('company',$compp)->update('candidates',$data))
	     {
		  return TRUE;
		 }
		 else{
		 return FALSE;
		 }
	  }
	  
	  function getCand($parent){
	       $sql = 'SELECT * FROM synonym WHERE parentname=synonym AND parentname="'.$parent.'" GROUP BY parentname';
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
		  
	  function addPrid($prid,$syn){
		 $sql = 'UPDATE candidates SET prid="'.$prid.'", is_company_updated="1", sent_to_synonym="1" WHERE company = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	   function addPridComp($prid){
		$data = array(
		'compid' => $prid,
		);
		
	   	if($this->db->insert('companies',$data))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	   
	   function addPridStatus($prid,$syn){
		
		 $sql = 'UPDATE candstatus SET locid="'.$prid.'", is_location_updated="1", loc_to_synonym="1" WHERE location = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   function addPridLoc($prid,$syn){
		
		 $sql = 'UPDATE candidates SET locid="'.$prid.'" WHERE current_location = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   //duplication manager
	function record_count_dup()
	{
		$sql = "SELECT COUNT(id) As cnt FROM candidates WHERE (is_company_updated='0' OR is_company_updated=' ') AND is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	function fetch_candidates_dup($limit)
	{
		$sql="SELECT * FROM candidates WHERE (is_company_updated='0' OR is_company_updated=' ') AND is_to_Delete = 0 ORDER BY company DESC LIMIT " .$limit . ",100 ";
		
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
	
	// get existing industries
	function getParentDesig(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where('type','3');
		$this->db->group_by('parentname');	
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->parentname]= $row->parentname;
        }
        
        return $result;
	}
	// for institute list
	function record_count_designation()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.designation) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.desig_to_synonym='0' AND candstatus.is_desig_updated='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_designation($limit){
	 	$sql="SELECT id,candidates.designation,COUNT(candidates.designation) As countCourse FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.desig_to_synonym='0' AND candstatus.is_desig_updated='1' GROUP BY candidates.designation LIMIT " .$limit . ",20 ";
				
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
	
	function addPridStatusDesig($prid,$syn){
		
		 $sql = 'UPDATE candstatus SET desigid="'.$prid.'", is_desig_updated="1", desig_to_synonym="1" WHERE designation = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   function addPridDesig($prid,$syn){
		
		 $sql = 'UPDATE candidates SET desigid="'.$prid.'" WHERE designation = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	   
	// get existing industries
	function getParentInstt(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where('type','4');
		$this->db->group_by('parentname');	
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->parentname]= $row->parentname;
        }
        
        return $result;
	}
	// for institute list
	function record_count_institute()
	{
		$sql = "SELECT COUNT(DISTINCT candidates.institute) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.instt_to_synonym='0' AND candstatus.is_instt_updated='1'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_institute($limit){
	 	$sql="SELECT id,candidates.institute,COUNT(candidates.institute) As countCourse FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.instt_to_synonym='0' AND candstatus.is_instt_updated='1' GROUP BY candidates.institute LIMIT " .$limit . ",20 ";
				
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
	
	function addPridStatusInstt($prid,$syn){
		
		 $sql = 'UPDATE candstatus SET insttid="'.$prid.'", is_instt_updated="1", instt_to_synonym="1" WHERE institute = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   function addPridInstt($prid,$syn){
		
		 $sql = 'UPDATE candidates SET insttid="'.$prid.'" WHERE institute = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	// get existing industries
	function getParentCourse(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where('type','5');
		$this->db->group_by('parentname');	
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->parentname]= $row->parentname;
        }
        
        return $result;
	}
	// for institute list
	function record_count_course()
	{
		 $sql = "SELECT COUNT(DISTINCT candidates.course) As cnt FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.course_to_synonym='0' AND candstatus.is_course_updated='1' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
	 // fetch companies
	 // This retrieves all the lists.
	 function fetch_course($limit){
	 	$sql="SELECT id,candidates.course,COUNT(candidates.course) As countCourse FROM candidates LEFT JOIN candstatus ON candidates.id=candstatus.cdid WHERE candstatus.course_to_synonym='0' AND candstatus.is_course_updated='1' GROUP BY candidates.course LIMIT " .$limit . ",20 ";
				
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
	
	 function addPridStatusCourse($prid,$syn){
		
		 $sql = 'UPDATE candstatus SET courseid="'.$prid.'", is_course_updated="1", course_to_synonym="1" WHERE course = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   function addPridCourse($prid,$syn){
		
		 $sql = 'UPDATE candidates SET courseid="'.$prid.'" WHERE course = "'.$syn.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }
	   
	   function addPpage($pname)
	     {
		  $sql = 'UPDATE synonym SET companypage=1 WHERE s_id = "'.$pname.'";';
	   	if($this->db->query($sql))
		  {
		   return TRUE;
		  }
		 else
		 {
		  return FALSE;
		 }
	   }

}

