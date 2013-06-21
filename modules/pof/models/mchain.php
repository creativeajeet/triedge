<?php
class MChain extends Model{
	function __construct(){
		parent::Model();
	}
	
	function getCountryList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('country');
		$this->db->order_by('id','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->country;
        }
        
        return $result;
	}

	function getCityList(){
	 
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
	
	
	function getCityListe(){
	 
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

}
?>
