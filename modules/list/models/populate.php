<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Populate extends Base_model

{
	function _construct()
    {
		parent::_construct();
    }
	
	function get($id = null, $parent = null)
	{
		
		if ($id) {
			if (is_array($id)) {
				$this->db->where_in('id', $id);
			} else {
				$this->db->where('id', $id);
			}
		}
		
		if ($parent) {
			//get data if parent is null
			if ($parent == 'blank') {
				$condition = null;
			} else {
				$condition = $parent;
			}
			
			if (is_array($condition)) {
				$this->db->where_in('parent_id', $condition);
			} else {
				$this->db->where('parent_id', $condition);
			}
		}
		
		return $this->db->get('autopopulate');
	}
	
		 
 	function addList(){
	
	 	$data = array( 
			'name' => $this->input->post('name'),
			'parent_id' => $this->input->post('test2'),	
	 			);
			
		 if ($this->db->insert('autopopulate',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	 }
	 
	 
	 function makeSynonym(){
	
	 	$data = array( 
			'synonym' => $this->input->post('synonym'),
			'parent_id' => $this->input->post('test2'),	
	 			);
			
		 if ($this->db->insert('make_synonym',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	 }
	 
	  function makeSynonymOther(){
	
	 	$data = array( 
			'other' => $this->input->post('other'),
			'parent_id' => $this->input->post('test2'),	
	 			);
			
		 if ($this->db->insert('make_synonym',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	 }
	 
	 
	 public function check_user_exist($usr)
    {
		
        $this->db->where("name",$usr);
        $query=$this->db->get("autopopulate");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	 
	 function addConstituents(){
	
	 	$data = array( 
			'name' => $this->input->post('name1'),
			'parent_id' => $this->input->post('category'),	
	 			);
			
		 if ($this->db->insert('autopopulate',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	 }
		
}
?>