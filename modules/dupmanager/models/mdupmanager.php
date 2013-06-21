<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MDupmanager extends Base_model{

	function MDupmanager(){
		parent::Base_model();
		$this->_TABLES = array( 'candidate' => 'candidate'
                                    );
	}
	

	
	function fetch_candidates_dup1()
	{
		$sql="SELECT DISTINCT t1.id FROM candidates t1, candidates t2 WHERE t1.candidate_name=t2.candidate_name AND t1.candidate_name LIKE 'g%' AND ( t1.telephone=t2.telephone OR t1.email = t2.email ) AND t1.id <> t2.id AND ( t1.email !='' OR t1.telephone !='' ) LIMIT 0,500 ";
		
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
	function add($data){
	           

            if ($this->db->insert('dupmanager',$data))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	
}