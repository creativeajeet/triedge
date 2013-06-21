<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MProject extends Base_model{
    function MProject(){
        parent::Base_model();
	     $this->_TABLES = array( 
                            'Table' => 'omc_projects',
                            'Logs' =>'omc_logs'
                            );
                          }

    // This retrieves all the user's profile by admin.
    function getAllCustomersProfile($id=NULL){
        $data = array();
	    $this->db->select('*');
	    $this->db->from('be_users');
	    $this->db->order_by("id", "asc");
	    $query = $this->db->get();
	    if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $data[$row['id']] = $row['username'];
            }
        }
        $query->free_result();
        return $data;
      }


   // This retrieves all the tasks of a user allocated by admin.
    function getProjectList($cus_id=NULL){
        $data = array();
        $this->db->select('*');
	    $this->db->from('omc_projects');
        $this->db->join('be_users', 'omc_projects.customer_id = be_users.id');
        $this->db->where('customer_id', $cus_id);
        $this->db->order_by('customer_id asc');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $data[]=$row;
            }
        }
        $query->free_result();
        return $data;
      }


    // This gets the username
    function getUsername($id=NULL){
        $data = array();
	    $this->db->select('*');
	    $this->db->from('be_users');
        $this->db->where('id', $id);
	    $query = $this->db->get();
	    if ($query->num_rows() > 0){
                foreach ($query->result_array() as $row){
                $data=$row;
                }
             }
        $query->free_result();
        return $data;
      }


     // This inserts tasks values into the database.
     function enterNewProject(){
            $data = array(
                'customer_id' => $this->input->post('id'),
                'project_name' => $this->input->post('project_name'),
				'hour' => $this->input->post('hour'),
				'min' => $this->input->post('min'),
				'link' => $this->input->post('link'),
                'note' => $this->input->post('note'),
                'created_by' => $this->input->post('created_by'),
                'active' => $this->input->post('active'),

            );
             $this->db->insert('omc_projects',$data);
      }

   // This is for pop up msg about the task allocated to user.
     function getMsg($userid){
		$data = array();
		$this->db->from('omc_projects');
		$this->db->join('be_users', 'be_users.id = omc_projects.customer_id');
		$this->db->where('be_users.id', $username);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
	       foreach ($query->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $query->free_result();  
	    return $data; 	    

}

}
