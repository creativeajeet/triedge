<?php
class MAutocomplete extends Model{

	function __construct(){
		parent::Model();
	}
	
	function lookup($keyword){
		$this->db->select('*')->from('autopopulate');
        $this->db->like('name',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
	}
}
