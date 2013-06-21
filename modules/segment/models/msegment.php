<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MSegment extends Base_model{

	function MSegment(){
		parent::Base_model();
		$this->_TABLES = array( 'worksheet' => 'worksheet'
                                    );
	}
	function getSegmentType(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('segment');
			
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->segment_type;
        }
        
        return $result;
	}
	function getSegment(){
	 
		$segment_type_id = $this->input->post('segmenttypeid');
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where_in('segment_type_id',$segment_type_id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	}
	
	function getParentName(){
	 
		$parenttype = $this->input->post('parenttype');
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where_in('segment_type_id',$parenttype);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	}
	
	function getChildName(){
	 
		$parentnameid = $this->input->post('parentnameid');
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_child_name');
		$this->db->where_in('parent_id',$parentnameid);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->child_id]= $row->child_name;
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
	
	
	function getConstituentopen(){
	 
		$country_id = $this->input->post('masterworksheetopenid');
		$result = array();
		$this->db->select('*');
		$this->db->from('masterworksheet');
		$this->db->join('worksheet', 'masterworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('masterworksheet.master_worksheet_id',$country_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getConstituentOther(){
	$country_id = $this->input->post('masterworksheetid');
		$result = array();
		$this->db->select('*');
		$this->db->from('masterworksheet');
		$this->db->join('worksheet', 'masterworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('masterworksheet.master_worksheet_id',$country_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	// This inserts theworksheet details.
   function newWorksheet()
   {
    $data = array(
	'worksheet_name' => $this->input->post('worksheet_name'),
	'worksheet_type' => $this->input->post('worksheet_type'),
	'worksheet_obj'  => $this->input->post('worksheet_obj'),
	'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	);
	if($this->db->insert('worksheet', $data))
	{
	return $this->db->insert_id();
	}
	else
	{
	return FALSE;
	}
   }
    // This inserts the segment type details.
   function addSegmentType(){
   $data = array(
	'segment_type' => $this->input->post('segment_type_name'),
	'is_segment'  => $this->input->post('is_segment'),
		);
	 $this->db->insert('segment',$data);
         }
	   //
	 // This inserts the master worksheet constituents details.
   function addSegment($segment_details){
	     if ($this->db->insert('segment_name',$segment_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	   
	    // This inserts the master worksheet constituents details.
   function addChild($child_details){
	     if ($this->db->insert('segment_child_name',$child_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   // 
	  // This inserts the other constituents details.
   function addOtherConstituent($other_constituent_details){
	     if ($this->db->insert('worksheetconstituent',$other_constituent_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	   
	   ///////////////////////////////////////////////////
	function getTagType(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('tag_type');
			
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->type_id]= $row->type_name;
        }
        
        return $result;
	}
	
	function getTags(){
	 
		$tag_type_id = $this->input->post('tagtypeid');
		$result = array();
		$this->db->select('*');
		$this->db->from('tag_name');
		$this->db->where_in('tag_type_id',$tag_type_id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->t_id]= $row->tag_name;
        }
        
        return $result;
	}
	
	function addTagType(){
	    $data = array(
		 'type_name' => $this->input->post('tag_type_name'),
		);
	     if ($this->db->insert('tag_type',$data))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	function addNewTag($tagdata){
	     if ($this->db->insert('tag_name',$tagdata))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	
}

