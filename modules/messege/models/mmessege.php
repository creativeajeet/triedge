<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MMessege extends Base_model{

    function MMessege(){
        parent::Base_model();
	$this->_TABLES = array( 
                            'messege' => 'messege',
                                      );
    }

    /*
     *
     *
     */
   function getUsers()
    {
	 $data = array();
	 $this->db->select('*');
	 $this->db->from('be_users');
	 $this->db->order_by('username','ASC');
	 $q=$this->db->get();
	 foreach($q->result() as $row)
	  {
	   $data[$row->id]=$row->username;
	  }
	  return $data;
	}

	function sendMsg($msg_details)
	  {
	    if($this->db->insert('messege',$msg_details))
		 {
		  return TRUE;
		 }
		 else
		 {
		  return FALSE;
		 }
	  }
     function getNews()
	  {
	    $today = date('Y-m-d h:i:s');
	   $date = date('Y-m-d h:i:s',strtotime('-7 day',$today));
	   $data = array();
	   $this->db->select('*');
	   $this->db->from('messege');
	   $this->db->join('be_users','messege.sent_by=be_users.id', 'right');
	   $this->db->where('messege.type','news');
	   $this->db->where('messege.sent_on <=',$date);
	   $q = $this->db->get();
	    foreach($q->result() as $row)
		 {
		  $data[]=$row;
		 }
		 return $data;
	  }
      function readMsg($msgid)
	    {
		  $data = array();
	   $this->db->select('*');
	   $this->db->from('messege');
	   $this->db->join('be_users','messege.sent_by=be_users.id', 'right');
	   $this->db->where('messege.msg_id',$msgid);
	   $q = $this->db->get();
	    foreach($q->result() as $row)
		 {
		  $data=$row;
		 }
		 return $data;
		  
		}
		
  // This gets the single candidate profile.
	  function getTimestamp($userid)
	  {
	      $today = date('Y-m-d h:i:s');
	     $date = date('Y-m-d h:i:s',strtotime('-7 day',$today));
	       $data = array();
		 $this->db->select('*');
		 $this->db->from('messege');
		 $this->db->join('be_users','messege.sent_by=be_users.id','left');
		 $this->db->where('messege.send_to',$userid);
		 $this->db->where('(messege.type="indi" OR messege.type="leave_application" OR messege.type="position_uploaded")');
		 $this->db->where('is_read','0');
		 $this->db->order_by('messege.msg_id','DESC');
		 $this->db->limit(1,0);
		
		
		 $Q=$this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
		  // This gets the single candidate profile.
	  function getAllIndi($userid)
	  {
	       $data = array();
		 $this->db->select('*');
		 $this->db->from('messege');
		 $this->db->join('be_users','messege.sent_by=be_users.id','left');
		 $this->db->where('messege.send_to',$userid);
		 $this->db->where('messege.type','indi');
		 $this->db->or_where('messege.type','news');
		 $this->db->order_by('messege.msg_id','DESC');
				
		 $Q=$this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	      
	      return $data; 
		  }
		  //
		  
		  	  // This gets sent messages.
	  function getAllSent($userid)
	  {
	       $data = array();
		  $this->db->select('*, GROUP_CONCAT(username) as send_to');
		 $this->db->from('messege');
		 $this->db->join('be_users','messege.send_to=be_users.id','left');
		 $this->db->where('messege.sent_by',$userid);
		 $this->db->group_by('messege.msg');
		 $this->db->order_by('messege.msg_id','DESC');
				
		 $Q=$this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	      
	      return $data; 
		  }
		  //
		  
		    // This gets the single candidate profile.
	  function getAllReceived($userid)
	  {
	       $data = array();
		 $this->db->select('*');
		 $this->db->from('messege');
		 $this->db->join('be_users','messege.sent_by=be_users.id','left');
		 $this->db->where('messege.send_to',$userid);
		 $this->db->where('messege.type','indi');
		 $this->db->order_by('messege.msg_id','DESC');
				
		 $Q=$this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result() as $row)
		    {
	          $data[]=$row;
	        }
	      }
	      
	      return $data; 
		  }
		  //
		  
		function readMessage($id)
		  {
		    $data = array(
			'msg_id' => $id,
			'is_read' => 1,
			);
			if($this->db->where('msg_id',$id)->update('messege',$data))
			 {
			  return TRUE;
			 }
			else
			{
			 return FALSE;
			}
		  }
}
