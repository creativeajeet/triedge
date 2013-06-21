<?php
class Dropdown_model extends Model {

	function Dropdown_model()
	{
		parent::Model();
	}

	function get_countries(){
		$this->db->select('id, country_name');
		$query = $this->db->get('countries');

		$countries = array();

		if($query->result()){
			foreach ($query->result() as $country) {
				$countries[$country->id] = $country->country_name;
			}
		return $countries;
		}else{
			return FALSE;
		}
	}
	
	function get_cities($country = NULL){
		$this->db->select('id, city_name');

		if($country != NULL){
			$this->db->where('country_id', $country);
		}

		$query = $this->db->get('cities');

		$cities = array();

		if($query->result()){
			foreach ($query->result() as $city) {
				$cities[$city->id] = $city->city_name;
			}
		return $cities;
		}else{
			return FALSE;
		}
	}
}
?>