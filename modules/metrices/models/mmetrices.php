<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MMetrices extends Base_model{

    function MMetrices(){
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
	 $this->db->where('active','1');
	 $this->db->where('group','3');
	 $this->db->or_where('group','9');
	 $this->db->where_not_in('id',array(46,47));
	 $this->db->order_by('username','ASC');
	 $q=$this->db->get();
	 foreach($q->result() as $row)
	  {
	   $data[]=$row;
	  }
	  return $data;
	}
	
	// add metrices
	function addTime($data)
	  {
	   if($this->db->insert('metrices_workingtime',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	  }
    // get all the leabes entitle
	 function allLevesEn()
	    {
		 $data = array();
		 $this->db->select('*');
		 $this->db->from('metrices_leaves_settings');
		 $this->db->where('is_entered','1');
		 $this->db->group_by('quarter');
		 $this->db->order_by('date','ASC');
		 $q=$this->db->get();
	     foreach($q->result() as $row)
	      {
	       $data[]=$row;
	      }
	     return $data;
	     }
	// enters leaves entitlement
	
	function addLeavesen($data)
	  {
	   if($this->db->insert('metrices_leaves_settings',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	  }
	  
	 // all call data
	  
	 function allCallData()
	    {
		 $data = array();
		 $this->db->select('*');
		 $this->db->from('metrices_calldata');
		 $this->db->group_by('month');
		 $this->db->where('is_entered','1');
		 $this->db->order_by('date','ASC');
		 $q=$this->db->get();
	     foreach($q->result() as $row)
	      {
	       $data[]=$row;
	      }
	     return $data;
	     }
	// enters calldata
	
	function addCallData($data)
	  {
	   if($this->db->insert('metrices_calldata',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	  }
	 // get holidays
	  // all call data
	  
	 function getHolidays()
	    {
		 $data = array();
		 $this->db->select('*');
		 $this->db->from('metrices_workingtime');
		 $this->db->where('is_holiday','1');
		  $this->db->group_by('status');
		 $this->db->order_by('date','DESC');
		 $q=$this->db->get();
	     foreach($q->result() as $row)
	      {
	       $data[]=$row;
	      }
	     return $data;
	     }
	 
	 // leave application message
	 function sendApplcation($data)
	    {
		   if($this->db->insert('messege',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	   }
	  // apply for leave
	  function applyLeave()
	    {
		 $data = array(
		 'applied_on' => $this->input->post('date_apply'),
		 'emp' => $this->input->post('emp_name'),
		 'l_from' => $this->input->post('l_from'),
		 'l_to' => $this->input->post('l_to'),
		 'no_of_leaves' => $this->input->post('no_of_leaves'),
		 'reason' => $this->input->post('l_reason'),
		 'join_on' => $this->input->post('l_join'),
		 'leaves_bal' => $this->input->post('l_balance'),
		 'leaves_taken' => $this->input->post('total_leave'),
		 );
		
		 if( $this->db->insert('metrices_leave_application',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	   }
	  // gets all leave applications
	  function getAllLeaveApplications()
	    {
		 
		$sql = "SELECT * FROM  metrices_leave_application LEFT JOIN be_users ON metrices_leave_application.emp=be_users.id ORDER BY metrices_leave_application.applied_on DESC;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	 // gets all new positions
	  function getAllNewPositions()
	    {
		 
		$sql = "SELECT * FROM  pof LEFT JOIN company ON company.c_id=pof.client_id ORDER BY pof.entered_on DESC;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	  // gets full details about the leave applied by consultant
	  function getfullDetails($leaveid)
	    {
		$data = array();
		 $this->db->select('*');
		 $this->db->from('metrices_leave_application');
		 $this->db->join('be_users','metrices_leave_application.emp=be_users.id','LEFT');
		 $this->db->where('metrices_leave_application.leave_id',$leaveid);
		 $Q = $this->db->get();
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      }
	      $Q->free_result();  
	      return $data; 
		  }
	  // approve leave
	  
	    function approveleave($leaveid)
		   {
		    $data = array(
			'leave_id' => $leaveid,
			'is_approve' => 1,
			'is_pending' => '0',
			);
			if($this->db->where('leave_id',$leaveid)->update('metrices_leave_application',$data))
			  {
			   return TRUE;
			  }
			else{
			 return FALSE;
			}
		  }
		// send approval msg to consultant
		function sendapprove($user)
		  {
		   $data = array(
		   'type' => 'leave_application',
		   'title' => 'Leave Application Approved',
		   'send_to' => $user,
		   'msg' => 'Your leave application has been approved.',
		   'sent_by' => $this->session->userdata('id'),
		   'sent_on' => date('Y-m-d H:i:s'),
			);
		   if( $this->db->insert('messege',$data))
		    {
			 return TRUE;
			}
		   else{
		     return FALSE;
		   }
		  }
		  
		 // deny leave
	  
	    function denyleave($leaveid)
		   {
		    $data = array(
			'leave_id' => $leaveid,
			'is_approve' => '0',
			'is_pending' => '0',
			);
			if($this->db->where('leave_id',$leaveid)->update('metrices_leave_application',$data))
			  {
			   return TRUE;
			  }
			else{
			 return FALSE;
			}
		  }
		// send deny msg to consultant
		function senddeny($user)
		  {
		   $data = array(
		   'type' => 'leave_application',
		   'title' => 'Leave Application Denied',
		   'send_to' => $user,
		   'msg' => 'Your leave application has been denied.',
		   'sent_by' => $this->session->userdata('id'),
		   'sent_on' => date('Y-m-d H:i:s'),
			);
		   if( $this->db->insert('messege',$data))
		    {
			 return TRUE;
			}
		   else{
		     return FALSE;
		   }
		  }
		  
		 // gets total new entries
		/* function getTotalNewEntry()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "(SELECT COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username) UNION (SELECT COUNT(entered_by) As cnt2 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$monthdate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username) UNION (SELECT COUNT(entered_by) As cnt3 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$yeardate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username)";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	*/
	/*function getTotalNewEntry()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "SELECT *,COUNT(entered_by) As cn1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub, COUNT(edited_by) As cn2 FROM ( SELECT * FROM candidates WHERE (edited_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0),COUNT(deleted_by) As cn3 FROM ( SELECT * FROM candidates WHERE (deleted_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0), RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username";
	 	$Q = $this->db->query($sql);
	if($Q->num_rows() > 0){
	foreach($Q->result_array() as $row)
	{
	 $data[] = $row;
	}
	}
	 $Q->free_result();  
	    return $data; 
   }
   */
   function getTotalNewEntry()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "(SELECT *,COUNT(entered_by) As cn1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '2012-09-10' AND '2012-09-12') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username) UNION ALL (SELECT *,COUNT(entered_by) As cn1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '2012-09-03' AND '2012-09-12') AND is_to_Delete = 0) As sub1 RIGHT JOIN be_users ON be_users.username=sub1.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username) UNION ALL (SELECT *,COUNT(entered_by) As cn1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '2012-01-01' AND '2012-09-12') AND is_to_Delete = 0) As sub2 RIGHT JOIN be_users ON be_users.username=sub2.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username); ";
	 	$Q = $this->db->query($sql);
	if($Q->num_rows() > 0){
	foreach($Q->result_array() as $row)
	{
	 $data[] = $row;
	}
	}
	 $Q->free_result();  
	    return $data; 
   }
    // gets wtd
    function getTotalWTD()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	 // gets mtd
    function getTotalMTD()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$monthdate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets qtr
    function getTotalQTR()
		    {
		  $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
		 $sql = "SELECT *,COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$firstdate."' AND '".$lastdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets wtd
    function getTotalYTD()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$yeardate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	// all edits
	// gets wtd
    function getTotalWTDedits()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "SELECT *,COUNT(last_updated_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (last_updated BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	 // gets mtd
    function getTotalMTDedits()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "SELECT *,COUNT(last_updated_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (last_updated BETWEEN '".$monthdate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets qtr
    function getTotalQTRedits()
		    {
		  $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
		 $sql = "SELECT *,COUNT(last_updated_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (last_updated BETWEEN '".$firstdate."' AND '".$lastdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets ytd
    function getTotalYTDedits()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,COUNT(last_updated_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (last_updated BETWEEN '".$yeardate."' AND '".$currentdate."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	// avd db to worksheet
	// gets wtd
    function getTotalWTDavgdb()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "SELECT *,COUNT(sub.id) As cnt1,COUNT(DISTINCT date) As day FROM be_users LEFT JOIN ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND put_in_worksheet =' ') As sub ON be_users.username=sub.entered_by  LEFT JOIN ( SELECT * FROM metrices_workingtime WHERE (date BETWEEN '".$weekdate."' AND '".$currentdate."') AND intime !='00:00:00' AND is_holiday='0' ) As sub2 ON be_users.id=sub2.user WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	 // gets mtd
    function getTotalMTDavgdb()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "SELECT *,COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$monthdate."' AND '".$currentdate."') AND put_in_worksheet =' ') As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets qtr
    function getTotalQTRavgdb()
		    {
		  $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
		 $sql = "SELECT *,COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$firstdate."' AND '".$lastdate."') AND put_in_worksheet =' ') As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets ytd
    function getTotalYTDavgdb()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,COUNT(entered_by) As cnt1 FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$yeardate."' AND '".$currentdate."') AND put_in_worksheet =' ') As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	// avg call data
	// gets mtd
    function getAllCallMTD()
		    {
			$curmonth = date('n');
			if($curmonth==1)
			 {
			  $month=12;
			  $qtr = 4;
			  $year = date('Y', strtotime('Last Year'));
			 }
			 else{
		 $month = date('n', strtotime('Last Month'));
		 $qtr = ceil(date('n')/3);
		 $year = date('Y');
		 }
		$sql = "SELECT *,calltime As cnt1 FROM be_users LEFT JOIN metrices_calldata ON be_users.id=metrices_calldata.users WHERE month='".$month."' AND quarter='".$qtr."' AND year='".$year."' GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets qtr
    function getAllCallQTR()
		    {
		  $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $qtr=4;
			  $year = date('Y', strtotime('Last Year'));
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			 $qtr=1;
			  $year = date('Y');
			}
			elseif($month>=7 && $month<=9)
		    {
			 $qtr=2;
			 $year = date('Y');
			}
			elseif($month>=10 && $month<=12)
		    {
			 $qtr=3;
			  $year = date('Y');
			}
		 $sql = "SELECT *,SUM(calltime) As cnt1 FROM be_users LEFT JOIN metrices_calldata ON be_users.id=metrices_calldata.users WHERE quarter='".$qtr."' AND year='".$year."' GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets ytd
    function getAllCallYTD()
		    {
		
		    $year = date('Y');
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,SUM(calltime) As cnt1 FROM be_users LEFT JOIN metrices_calldata ON be_users.id=metrices_calldata.users WHERE year='".$year."' GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	// total leaves taken
	// avd db to worksheet
	// gets wtd
    function getTotalWTDLeaves()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "SELECT *,COUNT(DISTINCT date) As cnt1 FROM be_users LEFT JOIN metrices_workingtime ON be_users.id=metrices_workingtime.user WHERE (date BETWEEN '".$weekdate."' AND '".$currentdate."') AND intime='00:00:00' AND is_holiday='0' AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	 // gets mtd
    function getTotalMTDLeaves()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql = "SELECT *,COUNT(DISTINCT date) As cnt1 FROM be_users LEFT JOIN metrices_workingtime ON be_users.id=metrices_workingtime.user WHERE (date BETWEEN '".$monthdate."' AND '".$currentdate."') AND intime='00:00:00' AND is_holiday='0' AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets qtr
    function getTotalQTRLeaves()
		    {
		  $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
		$sql = "SELECT *,COUNT(DISTINCT date) As cnt1 FROM be_users LEFT JOIN metrices_workingtime ON be_users.id=metrices_workingtime.user WHERE (date BETWEEN '".$firstdate."' AND '".$lastdate."') AND intime='00:00:00' AND is_holiday='0' AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets ytd
    function getTotalYTDLeaves()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,COUNT(DISTINCT date) As cnt1 FROM be_users LEFT JOIN metrices_workingtime ON be_users.id=metrices_workingtime.user WHERE (date BETWEEN '".$yeardate."' AND '".$currentdate."') AND intime='00:00:00' AND is_holiday='0' AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	// positions allocated
	// gets wtd
    function getWTDPos()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql="SELECT *,COUNT(event_id) As cnt1 FROM be_users LEFT JOIN events_tt ON be_users.id=events_tt.section_id JOIN allocation ON allocation.id=events_tt.alloc_id WHERE (allocation.fad BETWEEN '".$weekdate."' AND '".$currentdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) AND events_tt.is_alloc='1' GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	 // gets mtd
    function getMTDPos()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql="SELECT *,COUNT(event_id) As cnt1 FROM events_tt JOIN allocation ON allocation.id=events_tt.alloc_id RIGHT JOIN be_users ON be_users.id=events_tt.section_id WHERE (allocation.fad BETWEEN '".$monthdate."' AND '".$currentdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) AND events_tt.is_alloc='1' GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets qtr
    function getQTRPos()
		    {
		  $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
		 $sql="SELECT *,COUNT(event_id) As cnt1 FROM events_tt JOIN allocation ON allocation.id=events_tt.alloc_id RIGHT JOIN be_users ON be_users.id=events_tt.section_id WHERE (allocation.fad BETWEEN '".$firstdate."' AND '".$lastdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) AND events_tt.is_alloc='1' GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets ytd
    function getYTDPos()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql="SELECT *,COUNT(event_id) As cnt1 FROM events_tt JOIN allocation ON allocation.id=events_tt.alloc_id RIGHT JOIN be_users ON be_users.id=events_tt.section_id WHERE (allocation.fad BETWEEN '".$yeardate."' AND '".$currentdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) AND events_tt.is_alloc='1' GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
    // positions allocated
	// gets wtd
    function getWTDCVsent()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		 $sql="SELECT *,COUNT(s_id) As cnt1 FROM be_users LEFT JOIN pof_candidates ON be_users.id=pof_candidates.user_id WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$weekdate."' AND '".$currentdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	
	 // gets mtd
    function getMTDCVsent()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		$sql="SELECT *,COUNT(s_id) As cnt1 FROM be_users LEFT JOIN pof_candidates ON be_users.id=pof_candidates.user_id WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$monthdate."' AND '".$currentdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets qtr
    function getQTRCVsent()
		    {
		  $month = date('n');
		  if($month>=1 && $month<=3)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,1,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,3,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			  
			}
		   elseif($month>=4 && $month<=6)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,4,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,6,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=7 && $month<=9)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,7,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,9,30,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
			elseif($month>=10 && $month<=12)
		    {
			  $year = date('Y');
			  $mkfirst = mktime(0,0,0,10,1,$year);
			  $firstdate = date('Y-m-d',$mkfirst);
			  $mklast = mktime(0,0,0,12,31,$year);
			  $lastdate = date('Y-m-d',$mklast);
			}
		 $sql="SELECT *,COUNT(s_id) As cnt1 FROM be_users LEFT JOIN pof_candidates ON be_users.id=pof_candidates.user_id WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$firstdate."' AND '".$lastdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	 // gets ytd
    function getYTDCVsent()
		    {
		  $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
		   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
		    $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	      $currentdate = date('Y-m-d'); 
		  $sql="SELECT *,COUNT(s_id) As cnt1 FROM be_users LEFT JOIN pof_candidates ON be_users.id=pof_candidates.user_id WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$yeardate."' AND '".$currentdate."') AND be_users.active=1 AND (be_users.group=3 OR be_users.group=4) GROUP BY be_users.username;";
	 	$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		
	}
	// old leave data
	// old leave data
	  
	 function oldLeaveData()
	    {
		 $data = array();
		 $this->db->select('*');
		 $this->db->from('metrices_oldleave');
		 $this->db->group_by('month');
		 $this->db->where('is_entered','1');
		 $this->db->order_by('date','ASC');
		 $q=$this->db->get();
	     foreach($q->result() as $row)
	      {
	       $data[]=$row;
	      }
	     return $data;
	     }
	// enters calldata
	
	function addOldleave($data)
	  {
	   if($this->db->insert('metrices_oldleave',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	  }
	  // old leave data
	  
	 function oldWorkHourData()
	    {
		 $data = array();
		 $this->db->select('*');
		 $this->db->from('metrices_oldworkhour');
		 $this->db->group_by('month');
		 $this->db->where('is_entered','1');
		 $this->db->order_by('date','ASC');
		 $q=$this->db->get();
	     foreach($q->result() as $row)
	      {
	       $data[]=$row;
	      }
	     return $data;
	     }
	// enters calldata
	
	function addOldworkhour($data)
	  {
	   if($this->db->insert('metrices_oldworkhour',$data))
	     {
		  return TRUE;
		 }
		else{
		 return FALSE;
		}
	  }
}
