<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPof extends Base_model{

	function MPof(){
		parent::Base_model();
		$this->_TABLES = array( 'pof' => 'pof'
                                    );
	}
	

	 function getAllRecord(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('position');
		$this->db->join('pofloc', 'position.pof_id=pofloc.pid');
		$this->db->order_by('pof_id asc');
	   
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	 	
	 }
	 
	 function getLastClient(){
	 	
	  $data = array();
	  
	  $this->db->select_max('pof_id');
	
	  $this->db->limit(1);
	   
	    $Q = $this->db->get('position');
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	 	
	 }
	 
	 function getListIndus(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',7);
		
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->entry;
        }
        
        return $result;
	}
	function getListFunc(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',8);
		
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->entry;
        }
        
        return $result;
	}
	function getListPersonality(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',9);
		
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->entry;
        }
        
        return $result;
	}
	function getListGeo(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',10);
		
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->entry;
        }
        
        return $result;
	}
	
	function getListIndustry(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('autopopulate');
	    $this->db->where('parent_id',2);
		
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->name;
        }
        
        return $result;
	}
	
	function getCompanyList(){
	 
		$country_id = $this->input->post('countryid');
		$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
		$this->db->where_in('list_id',$country_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->entry;
        }
        
        return $result;
	}
	
	function getCompanyListEx(){
	 
		$countrry_id = $this->input->post('countrryid');
		$result = array();
		$this->db->select('*');
		$this->db->from('autopopulate');
		$this->db->where_in('parent_id',$countrry_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->name;
        }
        
        return $result;
	}
	
 	function enterNewPof($file_name){
	
	 	$data = array( 
			'filename' =>$file_name,
			'client' => $this->input->post('client'),
			'jobtitle' => $this->input->post('jobtitle'),
			'indus' => $this->input->post('indus'),
			'patch' => $this->input->post('patch'),
	 		'func' => $this->input->post('func'),
	 		'deptt' => $this->input->post('deptt'),
			'custseg' => $this->input->post('custseg'),
			'edu' => $this->input->post('edu'),
			'degree' => $this->input->post('degree'),
	 		'coursetype' => $this->input->post('coursetype'),
			'sub' => $this->input->post('sub'),
	 		'instt' => $this->input->post('instt'),
			'rank' => $this->input->post('rank'),
			'skills' => $this->input->post('skills'),
			'lead' => $this->input->post('lead'),
			'jd' => $this->input->post('jd'),
			'possharedas' => $this->input->post('possharedas'),
			'dor' => $this->input->post('dor'),
			'cmgr' => $this->input->post('cmgr'),
			'postaken' => $this->input->post('postaken'),
	 		'posgiven' => $this->input->post('posgiven'),
	 		'hmgr' => $this->input->post('hmgr'),
			'commit' => $this->input->post('commit'),
			'upload' => $this->input->post('upload'),
			'vc' => $this->input->post('vc'),
			'scribble' => $this->input->post('scribble'),
			'cate' => $this->input->post('cate'),
			'attachtype' => $this->input->post('attachtype'),
			'primary' => $this->input->post('primary'),
			
	 			);
		
			
		 if ($this->db->insert('position',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	 }
	 
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

	
	 function addGrade($grad_details){
	           

            if ($this->db->insert('comgrade',$grad_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }

	function getSinglePof($pid){
		// admin id is 2 and member id is 1
	     $data = array();
	     $this->db->select('*');
		 $this->db->from('position');
		 $this->db->join('pofloc', 'pofloc.pid = position.pof_id');
	     $this->db->where('position.pof_id', $pid);
	     $Q = $this->db->get();
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	 
	function getPofLoc($pid){
		// admin id is 2 and member id is 1
	     $data = array();
	     $this->db->select('*');
		 $this->db->from('pofloc');
		 $this->db->join('position', 'pofloc.pid = position.pof_id');
	     $this->db->where('position.pof_id', $pid);
	     $Q = $this->db->get();
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	
	 function enterNewvc(){
	 	$data = array( 
		
		'pid' => $this->input->post('pid'),
			'kra' => $this->input->post('kra'),
			'jobcri' => $this->input->post('jobcri'),
			'custseg' => $this->input->post('custseg'),
			'geo' => $this->input->post('geo'),
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
		 if ($this->db->insert('vc',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	 }
	 
	 
	 function addKra($kra_details){
	           

            if ($this->db->insert('vc_kra',$kra_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 
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
	 
	function getUsersDropDown($id){
		// admin id is 2 and member id is 1
	     $data = array();
	     $this->db->select('id,username');
	    
	     $Q = $this->db->get('be_users');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[$row['username']] = $row['username'];
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 }
	 
	
	 
	 function updateRecord($id){
	 	$data = array( 
			'client' => $this->input->post('client'),
			'job_tilte' => $this->input->post('job_tilte'),
			'industry' => $this->input->post('industry'),
	 		'function' => $this->input->post('function'),
	 		'department' => $this->input->post('department'),
			'custseg' => $this->input->post('cust_seg'),
			'edu' => $this->input->post('edu'),
			'course' => $this->input->post('course'),
	 		'course_type' => $this->input->post('course_type'),
	 		'instt' => $this->input->post('instt'),
			'jd' => $this->input->post('jd'),
			
		);
		$id = $this->input->post('id');
		$this->update('pof',$data,array('id'=>$id));
	 	
	 }
	 
	 function deleteRecord($id){
	 	$this->delete('pof',array('id'=>$id));
	 }
	 
}

  function checkpof($id){
            $data = array();
            /*
            $sql = 'SELECT omc_projects.id, omc_specs.id, omc_logs.id, omc_files.id
                        FROM omc_projects
                        LEFT OUTER JOIN omc_specs ON omc_specs.project_id = omc_projects.id
                        LEFT OUTER JOIN omc_logs   ON omc_logs.project_id = omc_projects.id
                        LEFT OUTER JOIN omc_files ON omc_files.project_id = omc_projects.id
                        WHERE omc_projects.id = $id';
            $query = $this->db->query($sql);

            */

            $this->db->select('*');
            $this->db->from('pof');
            
            $query = $this->db->get();
              

            
            if ($query->num_rows() > 0){
                foreach ($query->result_array() as $row){
                   $data = $row;
                }
            }else{
                $data = FALSE;
            }
            $query->free_result();
            return $data;

         }



/*
 * Used in projects/admin/admin.php
 */
         function deleteRecord($id){
	 	$this->delete('pof',array('id'=>$id));
	 }
	 
	