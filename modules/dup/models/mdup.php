<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MDup extends Base_model{

	function MDup(){
		parent::Base_model();
		$this->_TABLES = array( 'candidate' => 'candidate'
                                    );
	}
	
//duplication manager
	function record_count_dup()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates RIGHT JOIN dupmanager ON candidates.id=dupmanager.cand_id";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	function fetch_candidates_dup($limit)
	{
		$sql="SELECT * FROM candidates RIGHT JOIN dupmanager ON candidates.id=dupmanager.cand_id ORDER BY candidates.candidate_name LIMIT " .$limit . ",20 ";
		
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
	
}

 