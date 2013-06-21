<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MList extends Base_model{

	function MList(){
		parent::Base_model();
		$this->_TABLES = array( 'list' => 'list'
                                    );
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
	
}

