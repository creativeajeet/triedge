<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MUsage extends Base_model{

	function MUsage(){
		parent::Base_model();
		$this->_TABLES = array( 'candidates' => 'candidates'
                                    );
	}
	
	// avg call data for single entries
	// avg call data
	// gets mtd
    function getAllCallMTD($username)
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
		$sql = "SELECT *,calltime As cnt FROM metrices_calldata WHERE month='".$month."' AND quarter='".$qtr."' AND year='".$year."' AND users='".$username."'";
	 	 $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
	  
	 // gets qtr
    function getAllCallQTR($username)
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
		 $sql = "SELECT *,SUM(calltime) As cnt1 FROM metrices_calldata WHERE quarter='".$qtr."' AND year='".$year."' AND users='".$username."'";
	 	$q = $this->db->query($sql);
		$q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt1;
	  }
	 // gets ytd
    function getAllCallYTD($username)
		    {
		
		    $year = date('Y');
	      $currentdate = date('Y-m-d'); 
		 $sql = "SELECT *,SUM(calltime) As cnt1 FROM metrices_calldata WHERE year='".$year."' AND users='".$username."'";
	 $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt1;
	  }
	// gets no. of leaves taken in a week by a user
    function countLeaveWTD($username)
	  {
	   $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$weekdate."' AND '".$currentdate."') AND intime='00:00:00' AND user='".$username."' AND is_holiday='0'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a month by a user
    function countLeaveMTD($username)
	  {
	   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$monthdate."' AND '".$currentdate."') AND intime='00:00:00' AND user='".$username."' AND is_holiday='0'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a quarter by a user
    function countLeaveQTD($firstdate,$lastdate,$username)
	  {
	   
	   $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$firstdate."' AND '".$lastdate."') AND intime='00:00:00' AND user='".$username."' AND is_holiday='0'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a year by a user
    function countLeaveYTD($username)
	  {
	   $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	  $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$yeardate."' AND '".$currentdate."') AND intime='00:00:00' AND user='".$username."' AND is_holiday='0'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of working days in a week by a user
    function countWorkDayWTD($username)
	  {
	   $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$weekdate."' AND '".$currentdate."') AND intime !='00:00:00' AND user='".$username."' AND DAYOFWEEK(date) NOT IN (1,7) AND is_holiday='0'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a month by a user
    function countWorkDayMTD($username)
	  {
	   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$monthdate."' AND '".$currentdate."') AND intime !='00:00:00' AND user='".$username."' AND is_holiday='0' AND DAYOFWEEK(date) NOT IN (1,7)";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a quarter by a user
    function countWorkDayQTD($firstdate,$lastdate,$username)
	  {
	   
	   $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$firstdate."' AND '".$lastdate."') AND intime !='00:00:00' AND user='".$username."' AND is_holiday='0'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a year by a user
    function countWorkDayYTD($username)
	  {
	   $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	  $sql="SELECT COUNT(DISTINCT date) As cnt FROM metrices_workingtime WHERE (date BETWEEN '".$yeardate."' AND '".$currentdate."') AND intime !='00:00:00' AND user='".$username."' AND is_holiday='0'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of working days in a week by a user
    function countWorkHourWTD($username)
	  {
	   $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(outtime)-TIME_TO_SEC(intime))) As cnt FROM metrices_workingtime WHERE intime !='00:00:00 ' AND user='".$username."' AND (date BETWEEN '".$weekdate."' AND '".$currentdate."') AND DAYOFWEEK(date) NOT IN (1,7) GROUP BY user";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a month by a user
    function countWorkHourMTD($username)
	  {
	   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(outtime)-TIME_TO_SEC(intime))) As cnt FROM metrices_workingtime WHERE intime !='00:00:00 ' AND user='".$username."' AND (date BETWEEN '".$monthdate."' AND '".$currentdate."') AND DAYOFWEEK(date) NOT IN (1,7) GROUP BY user";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a quarter by a user
 /*   function countWorkHourQTD($firstdate,$lastdate,$username)
	  {
	   
	    $sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(outtime)-TIME_TO_SEC(intime))) As cnt FROM metrices_workingtime WHERE intime !='00:00:00 ' AND user='".$username."' AND (date BETWEEN '".$firstdate."' AND '".$lastdate."') GROUP BY user";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
*/
// gets no. of leaves taken in a year by a user
    function countWorkHourYTD($username)
	  {
	   $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	  $sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(outtime)-TIME_TO_SEC(intime))) As cnt FROM metrices_workingtime WHERE intime !='00:00:00 ' AND user='".$username."' AND (date BETWEEN '".$yeardate."' AND '".$currentdate."') GROUP BY user";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
 // gets no. of leaves taken in a week by a user
    function countWorksheetWTD($user)
	  {
	   $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND put_in_worksheet =' ' AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a month by a user
    function countWorksheetMTD($user)
	  {
	   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	  $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$monthdate."' AND '".$currentdate."') AND put_in_worksheet =' ' AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a quarter by a user
    function countWorksheetQTD($firstdate,$lastdate,$user)
	  {
	   
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$firstdate."' AND '".$lastdate."') AND put_in_worksheet =' ' AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of leaves taken in a year by a user
    function countWorksheetYTD($user)
	  {
	   $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	  $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$yeardate."' AND '".$currentdate."') AND put_in_worksheet =' ' AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

	// gets no. of candidates added in a week by a user
    function countEnterWTD($user)
	  {
	   $weekdate = date('Y-m-d', strtotime('Last Monday', time()));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0 AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates added in a month by a user
    function countEnterMTD($user)
	  {
	   $monthdate = date('Y-m-d',mktime(0, 0, 0, (date('m')), 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$monthdate."' AND '".$currentdate."') AND is_to_Delete = 0 AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of candidates added in a quarter by a user
    function countEnterQTD($firstdate,$lastdate,$user)
	  {
	   
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$firstdate."' AND '".$lastdate."') AND is_to_Delete = 0 AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates added in a year by a user
    function countEnterYTD($user)
	  {
	   $yeardate = date('Y-m-d',mktime(0, 0, 0, 1, 1, date('Y')));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (entered_on BETWEEN '".$yeardate."' AND '".$currentdate."') AND is_to_Delete = 0 AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of candidates edited in a week by a user
    function countEditWTD($user)
	  {
	   $weekdate = date('Y-m-d', strtotime('-6 days'));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (last_updated BETWEEN '".$weekdate."' AND '".$currentdate."') AND is_to_Delete = 0 AND last_updated_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited in a month by a user
    function countEditMTD($user)
	  {
	   $monthdate = date('Y-m-d', strtotime('-29 days'));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (last_updated BETWEEN '".$monthdate."' AND '".$currentdate."') AND is_to_Delete = 0 AND last_updated_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of candidates edited in a quarter by a user
    function countEditQTD($firstdate,$lastdate,$user)
	  {
	    $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (last_updated BETWEEN '".$firstdate."' AND '".$lastdate."') AND is_to_Delete = 0 AND last_updated_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited in a year by a user
    function countEditYTD($user)
	  {
	   $yeardate = date('Y-m-d', strtotime('-364 days'));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(id) As cnt FROM candidates WHERE (last_updated BETWEEN '".$yeardate."' AND '".$currentdate."') AND is_to_Delete = 0 AND last_updated_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of positions allocated in a week to a user
    function countPofAllocatedW($username)
	  {
	    $weekdate = date('Y-m-d', strtotime('-6 days'));
	   $currentdate = date('Y-m-d'); 
	     $sql="SELECT COUNT(event_id) As cnt FROM events_tt JOIN allocation ON allocation.id=events_tt.alloc_id WHERE (allocation.fad BETWEEN '".$weekdate."' AND '".$currentdate."') AND events_tt.section_id='".$username."' AND events_tt.is_alloc='1'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of positions allocated in a month to a user
    function countPofAllocatedM($username)
	  {
	     $monthdate = date('Y-m-d', strtotime('-29 days'));
	     $currentdate = date('Y-m-d'); 
	     $sql="SELECT COUNT(event_id) As cnt FROM events_tt JOIN allocation ON allocation.id=events_tt.alloc_id WHERE (allocation.fad BETWEEN '".$monthdate."' AND '".$currentdate."') AND events_tt.section_id='".$username."' AND events_tt.is_alloc='1'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of positions allocated in a quarter to a user
    function countPofAllocatedQ($firstdate,$lastdate,$username)
	  {
	      $sql="SELECT COUNT(event_id) As cnt FROM events_tt JOIN allocation ON allocation.id=events_tt.alloc_id WHERE (allocation.fad BETWEEN '".$firstdate."' AND '".$lastdate."') AND events_tt.section_id='".$username."' AND events_tt.is_alloc='1'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of positions allocated in a year to a user
    function countPofAllocatedY($username)
	  {
	    $yeardate = date('Y-m-d', strtotime('-364 days'));
	     $currentdate = date('Y-m-d');
	     $sql="SELECT COUNT(event_id) As cnt FROM events_tt JOIN allocation ON allocation.id=events_tt.alloc_id WHERE (allocation.fad BETWEEN '".$yeardate."' AND '".$currentdate."') AND events_tt.section_id='".$username."' AND events_tt.is_alloc='1'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of cvsent in a week by a user
    function countCVsentW($username)
	  {
	   $weekdate = date('Y-m-d', strtotime('-6 days'));
	   $currentdate = date('Y-m-d'); 
	   $sql="SELECT COUNT(s_id) As cnt FROM pof_candidates WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$weekdate."' AND '".$currentdate."') AND user_id='".$username."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of cvsent in a month by a user
    function countCVsentM($username)
	  {
	   $monthdate = date('Y-m-d', strtotime('-29 days'));
	   $currentdate = date('Y-m-d'); 
	    $sql="SELECT COUNT(s_id) As cnt FROM pof_candidates WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$monthdate."' AND '".$currentdate."') AND user_id='".$username."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of cvsent in a month by a user
    function countCVsentQ($firstdate,$lastdate,$username)
	  {
	   $sql="SELECT COUNT(s_id) As cnt FROM pof_candidates WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$firstdate."' AND '".$lastdate."') AND user_id='".$username."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of cvsent in a year by a user
    function countCVsentY($username)
	  {
	   $yeardate = date('Y-m-d', strtotime('-364 days'));
	   $currentdate = date('Y-m-d'); 
	    $sql="SELECT COUNT(s_id) As cnt FROM pof_candidates WHERE (stage='cvsent' OR stage='client_reject' OR stage='interview_shortlist' OR stage='offer') AND (date BETWEEN '".$yeardate."' AND '".$currentdate."') AND user_id='".$username."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//

// gets no. of candidates added today by a user
    function countTodayAddedByUser($user,$from,$to)
	  {
	   $sql="SELECT COUNT(entered_by) As cnt FROM candidates WHERE (entered_on BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0 AND entered_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited today by a user
    function countTodayEditedByUser($user,$from,$to)
	  {
	   $sql="SELECT COUNT(last_updated_by) As cnt FROM candidates WHERE (last_updated BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0 AND last_updated_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
	
	// gets no. of candidates deleted today by a user
    function countTodayDeletedByUser($user,$from,$to)
	  {
	   $sql="SELECT COUNT(deleted_by) As cnt FROM candidates WHERE (deleted_on BETWEEN '".$from."' AND '".$to."') AND deleted_by='".$user."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates added today
    function countTodayAdded($from,$to)
	  {
	   $sql="SELECT COUNT(DISTINCT entered_by) As cnt FROM candidates WHERE (entered_on BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited today
    function countTodayEdited($from,$to)
	  {
	   $sql="SELECT COUNT(DISTINCT last_updated_by) As cnt FROM candidates WHERE (last_updated BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
	
	// gets no. of candidates deleted today
    function countTodayDeleted($from,$to)
	  {
	   $sql="SELECT COUNT(DISTINCT deleted_by) As cnt FROM candidates WHERE (deleted_on BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets users.
    function getUser()
	  {
	   $data =array();
	   $this->db->from('be_users');
	    $this->db->where('active',1);
	   $Q = $this->db->get();
	   if($Q->num_rows() > 0)
	    {
	    foreach($Q->result() as $row) 
		 {
		  $data[] = $row;
		 }
		 return $data;
		 }
	  }
	  
	  function getUsername($consid)
	  {
	   $data =array();
	   $this->db->from('be_users');
	    $this->db->where('id',$consid);
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
// gets no of addition, edition ,deletion done by consultant
   function getByConsultant($from,$to)
   
	   {
    $sql = "SELECT *,COUNT(entered_by) FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4 OR be_users.group=10) GROUP BY be_users.username;";
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
  //
  // gets no of addition, edition ,deletion done by consultant
   function getByConsultant1($from,$to)
   
	   {
    $sql = "SELECT *,COUNT(last_updated_by) FROM ( SELECT * FROM candidates WHERE (last_updated BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4 OR be_users.group=10) GROUP BY be_users.username;";
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
  //
// gets no of addition, edition ,deletion done by consultant
   function getByConsultant2($from,$to)
   
	   {
    $sql = "SELECT *,COUNT(deleted_by) FROM ( SELECT * FROM candidates WHERE (deleted_on BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 1) As sub RIGHT JOIN be_users ON be_users.username=sub.deleted_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4 OR be_users.group=10) GROUP BY be_users.username;";
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
  //

// gets list of candidates added today
    function getTodayAdded($today)
	 {
	   $sql ="SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE last_updated = '".$today."' GROUP BY entered_by";
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
  //
  
  // gets list of candidates added today
    function getTodayEdited($today)
	 {
	   $sql ="SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE last_updated = '".$today."' GROUP BY last_updated_by";
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
  //
  
	// gets no. of candidates added between date range
    function countAdded($from,$to)
	  {
	   $sql="SELECT COUNT(entered_by) As cnt FROM ( SELECT * FROM candidates WHERE (entered_on BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0 ) As sub RIGHT JOIN be_users ON be_users.username=sub.entered_by ";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited between date range
    function countEdited($from,$to)
	  {
	   $sql="SELECT COUNT(last_updated_by) As cnt FROM ( SELECT * FROM candidates WHERE (last_updated BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.last_updated_by WHERE be_users.active=1 AND (be_users.group=3 OR be_users.group=4) ";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
	
	// gets no. of candidates deleted between date range
    function countDeleted($from,$to)
	  {
	   $sql="SELECT COUNT(deleted_by) As cnt FROM ( SELECT * FROM candidates WHERE (last_updated BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0) As sub RIGHT JOIN be_users ON be_users.username=sub.deleted_by ";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
// 

// gets no. of candidates deleted between date range
    function countImported($from,$to)
	  {
	   $sql="SELECT COUNT(is_imported) As cnt FROM candidates WHERE (is_imported BETWEEN '".$from."' AND '".$to."') AND is_imported=1";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
// 
// gets list of candidates added today
    function getTotalAdded($from,$to)
	 {
 $sql ="SELECT * FROM (SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand ) As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
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
  //
	// gets no. of candidates added by user between date range
    function countAddedbySingleUser($from,$to,$user)
	  {
	   $sql="SELECT COUNT(entered_by) As cnt FROM (SELECT entered_by,entered_on FROM candidates JOIN be_users ON candidates.entered_by=be_users.username WHERE be_users.id ='".$user."' AND is_to_Delete = 0) As sub WHERE entered_on BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
// gets no. of candidates edited by user between date range
    function countEditedbySingleUser($from,$to,$user)
	  {
	   $sql="SELECT COUNT(last_updated_by) As cnt FROM (SELECT last_updated_by,last_updated FROM candidates JOIN be_users ON candidates.last_updated_by=be_users.username WHERE be_users.id ='".$user."' AND is_to_Delete = 0) As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
//
	
	// gets no. of candidates deleted by user between date range
    function countDeletedbySingleUser($from,$to,$user)
	  {
	   $sql="SELECT COUNT(deleted_by) As cnt FROM (SELECT * FROM candidates WHERE deleted_by ='".$user."') As sub WHERE deleted_on BETWEEN '".$from."' AND '".$to."'";
	   $q=$this->db->query($sql);
	   $row=$q->row();
	   return $row->cnt;
	  }
// 
// gets list of candidates entered by a user
    function getAddedByUser($from,$to,$user,$limit)
	  {
	   $sql ="SELECT * FROM candidates JOIN (SELECT id As bid, username FROM be_users) As sub ON candidates.entered_by=sub.username WHERE sub.bid ='".$user."' AND (entered_on BETWEEN '".$from."' AND '".$to."') AND is_to_Delete = 0 LIMIT " .$limit . ",20 ";
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
  //
  
  // gets list of candidates edited by a user
    function getEditedByUser($from,$to,$user,$limit)
	  {
	   $sql ="SELECT * FROM candidates JOIN (SELECT id As bid, username FROM be_users) As sub ON candidates.last_updated_by=sub.username WHERE sub.bid ='".$user."' AND (last_updated BETWEEN '".$from."' AND '".$to."') LIMIT " .$limit . ",20 ";
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
  //
  
   // gets list of candidates deleted by a user
    function getDeletedByUser($from,$to,$user)
	  {
	   $sql ="SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE candidates.deleted_by ='".$user."' AND (deleted_on BETWEEN '".$from."' AND '".$to."')";
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
  //
  
   // gets list of candidates actioned by a user
    function getTotalByUser($from,$to,$user)
	  {
	   $sql ="SELECT * FROM (SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE candidates.entered_by ='".$user."' OR candidates.last_updated_by ='".$user."' OR candidates.deleted_by ='".$user."' ) As sub WHERE last_updated BETWEEN '".$from."' AND '".$to."'";
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
  //
	 function import($sql){
  $this->load->database();
  $this->db->query($sql);
  }  
 
	 function importfiles($sql){
  $this->load->database();
  $this->db->query($sql);
  }   
  
  function do_upload($cand_details) {
		
	if ($this->db->insert('files',$cand_details))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
    
	}
	
  function save(){
 $data = array( 
		    'candidate_name' => $this->input->post('candidate_name'),
			'telephone' => $this->input->post('telephone'),
			'email' => $this->input->post('email'),
			'current_location' => $this->input->post('current_location'),
			'region' => $this->input->post('region'),
			'current_company' => $this->input->post('current_company'),
			'job_title' => $this->input->post('job_title'),
			'department' => $this->input->post('department'),
			'designation' => $this->input->post('designation'),
			'grade' => $this->input->post('grade'),
			'level' => $this->input->post('level'),
			'salary' => $this->input->post('salary'),
	 		'in_current_company_since' => $this->input->post('in_current_company_since'),
			'reports_to' => $this->input->post('reports_to'),
			'current_role' => $this->input->post('current_role'),
			'previous_company' => $this->input->post('previous_company'),
			'course' => $this->input->post('course'),
			'institute' => $this->input->post('institute'),
			'year_of_passing' => $this->input->post('year_of_passing'),
			'year_of_birth' => $this->input->post('year_of_birth'),
			'profile_brief' => $this->input->post('profile_brief'),
			'comment' => $this->input->post('comment'),
			'entered_by' => $this->input->post('entered_by'),
			'last_updated' => date('Y-m-d H:i:s'),
	 		
	 	);
    if($this->db->insert('candidates',$data))
	{
	 return $this->db->insert_id();
	}
	else{
	 return FALSE;
	}
  }

  function update(){
    $id   = $this->input->post('id');
    $entered_by = $this->input->post('entered_by');
    $candidate_name = $this->input->post('candidate_name');
    $current_location = $this->input->post('current_location');
	$year_of_birth = $this->input->post('year_of_birth');
    $email = $this->input->post('email');
    $telephone = $this->input->post('telephone');
	$region = $this->input->post('region');
    $current_company = $this->input->post('current_company');
    $job_title = $this->input->post('job_title');
	$in_current_company_since = $this->input->post('in_current_company_since');
    $department = $this->input->post('department');
    $reports_to = $this->input->post('reports_to');
	$designation = $this->input->post('designation');
    $grade = $this->input->post('grade');
    $level = $this->input->post('level');
	$previous_company = $this->input->post('previous_company');
    $salary = $this->input->post('salary');
    $course = $this->input->post('course');
	$institute = $this->input->post('institute');
    $year_of_passing = $this->input->post('year_of_passing');
    $industry = $this->input->post('industry');
	$sub_industry = $this->input->post('sub_industry');
    $indfunction = $this->input->post('indfunction');
    $sub_function = $this->input->post('sub_function');
	$worksheet1 = $this->input->post('worksheet1');
    $worksheet2 = $this->input->post('worksheet2');
    $current_role = $this->input->post('current_role');
	$profile_brief = $this->input->post('profile_brief');
    $comment = $this->input->post('comment');
     $data = array(
      'entered_by'=>$entered_by,
      'candidate_name'=>$candidate_name,
	   'current_location'=>$current_location,
      'year_of_birth'=>$year_of_birth,
	   'email'=>$email,
      'telephone'=>$telephone,
	   'region'=>$region,
      'current_company'=>$current_company,
	   'job_title'=>$job_title,
      'in_current_company_since'=>$in_current_company_since,
	   'department'=>$department,
      'reports_to'=>$reports_to,
	   'designation'=>$designation,
      'grade'=>$grade,
	   'level'=>$level,
      'previous_company'=>$previous_company,
	   'salary'=>$salary,
      'course'=>$course,
	   'institute'=>$institute,
      'year_of_passing'=>$year_of_passing,
	   'industry'=>$industry,
      'sub_industry'=>$sub_industry,
	   'indfunction'=>$indfunction,
      'sub_function'=>$sub_function,
	   'worksheet1'=>$worksheet1,
      'worksheet2'=>$worksheet2,
	   'current_role'=>$current_role,
      'profile_brief'=>$profile_brief,
	   'comment'=>$comment
     
    );
    $this->db->where('id',$id);
    $this->db->update('candidates',$data);
  }
	 function getConsulName(){
		$result = array();
		$this->db->select('*');
		$this->db->from('be_users');
		$this->db->where('group',3);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->username;
        }
        
        return $result;
	}	
		
	function record_count()
	{
		 $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE is_to_Delete = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	function fetch_candidates($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->where('candidates.is_to_Delete',0);
		$this->db->order_by('candidate_name');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_candidates_lastupdated($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->order_by('last_updated', 'DESC');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
	function fetch_candidates_bycolumn($limit,$start,$column,$order)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->order_by($column, $order);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	function fetch_files()
	{
		
		$this->db->from('files');
		
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	function record_count_refered($username)
	{
		$sql = "SELECT COUNT(*) As cnt FROM addtorefer WHERE userid =".$username;
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
		       
	}
	function fetch_reference($limit,$start,$username)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'candidates.id=files.cand', 'left');
		$this->db->join('addtorefer', 'candidates.id=addtorefer.c_id', 'left');
		$this->db->where('addtorefer.userid', $username);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	function search_record_count_simple($heading,$keyword)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE ". $heading." LIKE '%" . $keyword . "%'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search_simple($heading,$keyword,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand 
				WHERE ". $heading." LIKE '%" . $keyword . "%' LIMIT " .$limit . ",20 ";
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
	function search_record_count_all($keyword)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE worksheet1 LIKE '%" . $keyword . "%' OR worksheet2 LIKE '%" . $keyword . "%' OR status LIKE '%" . $keyword . "%' OR candidate_name LIKE '%" . $keyword . "%' OR telephone LIKE '%" . $keyword . "%' OR email LIKE '%" . $keyword . "%' OR current_location LIKE '%" . $keyword . "%' OR region LIKE '%" . $keyword . "%' OR current_company LIKE '%" . $keyword . "%' OR job_title LIKE '%" . $keyword . "%' OR department LIKE '%" . $keyword . "%' OR designation LIKE '%" . $keyword . "%' OR grade LIKE '%" . $keyword . "%' OR level LIKE '%" . $keyword . "%' OR salary LIKE '%" . $keyword . "%' OR in_current_company_since LIKE '%" . $keyword . "%' OR reports_to LIKE '%" . $keyword . "%' OR current_role LIKE '%" . $keyword . "%' OR industry LIKE '%" . $keyword . "%' OR sub_industry LIKE '%" . $keyword . "%' OR indfunction LIKE '%" . $keyword . "%' OR sub_function LIKE '%" . $keyword . "%' OR previous_company LIKE '%" . $keyword . "%' OR course LIKE '%" . $keyword . "%' OR institute LIKE '%" . $keyword . "%' OR year_of_passing LIKE '%" . $keyword . "%' OR year_of_birth LIKE '%" . $keyword . "%' OR profile_brief LIKE '%" . $keyword . "%' OR comment LIKE '%" . $keyword . "%' OR entered_by LIKE '%" . $keyword . "%'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search_all($keyword,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand 
				WHERE worksheet1 LIKE '%" . $keyword . "%' OR worksheet2 LIKE '%" . $keyword . "%' OR status LIKE '%" . $keyword . "%' OR candidate_name LIKE '%" . $keyword . "%' OR telephone LIKE '%" . $keyword . "%' OR email LIKE '%" . $keyword . "%' OR current_location LIKE '%" . $keyword . "%' OR region LIKE '%" . $keyword . "%' OR current_company LIKE '%" . $keyword . "%' OR job_title LIKE '%" . $keyword . "%' OR department LIKE '%" . $keyword . "%' OR designation LIKE '%" . $keyword . "%' OR grade LIKE '%" . $keyword . "%' OR level LIKE '%" . $keyword . "%' OR salary LIKE '%" . $keyword . "%' OR in_current_company_since LIKE '%" . $keyword . "%' OR reports_to LIKE '%" . $keyword . "%' OR current_role LIKE '%" . $keyword . "%' OR industry LIKE '%" . $keyword . "%' OR sub_industry LIKE '%" . $keyword . "%' OR indfunction LIKE '%" . $keyword . "%' OR sub_function LIKE '%" . $keyword . "%' OR previous_company LIKE '%" . $keyword . "%' OR course LIKE '%" . $keyword . "%' OR institute LIKE '%" . $keyword . "%' OR year_of_passing LIKE '%" . $keyword . "%' OR year_of_birth LIKE '%" . $keyword . "%' OR profile_brief LIKE '%" . $keyword . "%' OR comment LIKE '%" . $keyword . "%' OR entered_by LIKE '%" . $keyword . "%' ORDER BY candidate_name LIMIT " .$limit . ",20 ";
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
	function searchterm_handler_simple($keyword)
	{
		if($keyword)
		{
			$this->session->set_userdata('keyword', $keyword);
			return $keyword;
		}
		elseif($this->session->userdata('keyword'))
		{
			$keyword = $this->session->userdata('keyword');
			return $keyword;
		}
		else
		{
			$keyword ="";
			return $keyword;
		}
	}
	function searchterm_handler_all($keyword)
	{
		if($keyword)
		{
			$this->session->set_userdata('keyword', $keyword);
			return $keyword;
		}
		elseif($this->session->userdata('keyword'))
		{
			$keyword = $this->session->userdata('keyword');
			return $keyword;
		}
		else
		{
			$keyword ="";
			return $keyword;
		}
	}
	function searchterm_handler_simple_heading($heading)
	{
		if($heading)
		{
			$this->session->set_userdata('heading', $heading);
			return $heading;
		}
		elseif($this->session->userdata('heading'))
		{
			$heading = $this->session->userdata('heading');
			return $heading;
		}
		else
		{
			$heading ="";
			return $heading;
		}
	}
	function search_record_count_folder($folder_name,$username)
	{
		$sql = "SELECT COUNT(*) As cnt FROM addtofolder WHERE p_id LIKE '%" . $folder_name . "%' AND user = ".$username." ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_folder($folder_name,$username,$limit)
	{
		$sql = "SELECT * FROM addtofolder RIGHT JOIN candidates ON addtofolder.c_id=candidates.id LEFT JOIN files ON candidates.id=files.cand  
				WHERE p_id LIKE '%" . $folder_name . "%' AND user = ".$username." LIMIT " .$limit . ",20 ";
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
	
	function searchterm_handler_simple_folder_name($folder_name)
	{
		if($folder_name)
		{
			$this->session->set_userdata('folder_name', $folder_name);
			return $folder_name;
		}
		elseif($this->session->userdata('folder_name'))
		{
			$folder_name = $this->session->userdata('folder_name');
			return $folder_name;
		}
		else
		{
			$folder_name ="";
			return $folder_name;
		}
	}
	function search_record_count_worksheet($masterworksheet,$basicworksheet)
	{
		$sql = "SELECT COUNT(*) As cnt FROM addtoworksheet1 WHERE addtoworksheet1.master_worksheet_id=" . $masterworksheet . " AND addtoworksheet1.constituent_id = ".$basicworksheet." ";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function open_worksheet($masterworksheet,$basicworksheet,$limit)
	{
		$sql = "SELECT * FROM addtoworksheet1 RIGHT JOIN candidates ON addtoworksheet1.c_id=candidates.id LEFT JOIN files ON candidates.id=files.cand
				WHERE addtoworksheet1.master_worksheet_id=" . $masterworksheet . " AND addtoworksheet1.constituent_id = ".$basicworksheet." LIMIT " .$limit . ",20 ";
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
	function searchterm_handler_simple_masterworksheet($masterworksheet)
	{
		if($masterworksheet)
		{
			$this->session->set_userdata('master_worksheet', $masterworksheet);
			return $masterworksheet;
		}
		elseif($this->session->userdata('master_worksheet'))
		{
			$masterworksheet = $this->session->userdata('master_worksheet');
			return $masterworksheet;
		}
		else
		{
			$masterworksheet ="";
			return $masterworksheet;
		}
	}
	function searchterm_handler_simple_basicworksheet($basicworksheet)
	{
		if($basicworksheet)
		{
			$this->session->set_userdata('constituent', $basicworksheet);
			return $basicworksheet;
		}
		elseif($this->session->userdata('constituent'))
		{
			$basicworksheet = $this->session->userdata('constituent');
			return $basicworksheet;
		}
		else
		{
			$basicworksheet ="";
			return $basicworksheet;
		}
	}
	
	function search_record_count($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$designation,$grade,$level,$course,$institute,$passingyear)
	{
		$sql = "SELECT COUNT(*) As cnt FROM candidates WHERE candidate_name LIKE '%" . $candidatename . "%' AND current_location LIKE '%".$currentloc."%' AND region LIKE '%".$region."%' AND current_company LIKE '%".$currentcomp."%' AND industry LIKE '%".$industry."%' AND sub_industry LIKE '%".$subindustry."%' AND indfunction LIKE '%".$indfunction."%' AND sub_function LIKE '%".$subfunction."%' AND department LIKE '%".$department."%' AND job_title LIKE '%".$jobtitle."%' AND designation LIKE '%".$designation."%' AND grade LIKE '%".$grade."%' AND level LIKE '%".$level."%' AND course LIKE '%".$course."%' AND institute LIKE '%".$institute."%' AND year_of_passing LIKE '%".$passingyear."%'";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
	function search($candidatename,$currentloc,$region,$currentcomp,$industry,$subindustry,$indfunction,$subfunction,$department,$jobtitle,$designation,$grade,$level,$course,$institute,$passingyear,$limit)
	{
		$sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand
				WHERE candidate_name LIKE '%" . $candidatename . "%' AND current_location LIKE '%".$currentloc."%' AND region LIKE '%".$region."%' AND current_company LIKE '%".$currentcomp."%' AND industry LIKE '%".$industry."%' AND sub_industry LIKE '%".$subindustry."%' AND indfunction LIKE '%".$indfunction."%' AND sub_function LIKE '%".$subfunction."%' AND department LIKE '%".$department."%' AND job_title LIKE '%".$jobtitle."%' AND designation LIKE '%".$designation."%' AND grade LIKE '%".$grade."%' AND level LIKE '%".$level."%' AND course LIKE '%".$course."%' AND institute LIKE '%".$institute."%' AND year_of_passing LIKE '%".$passingyear."%' ORDER BY candidate_name LIMIT " .$limit . ",20 ";
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
	
  function searchterm_handler_simple_candname($candidatename)
	{
		if($candidatename)
		{
			$this->session->set_userdata('candidatename', $candidatename);
			return $candidatename;
		}
		elseif($this->session->userdata('candidatename'))
		{
			$candidatename = $this->session->userdata('candidatename');
			return $candidatename;
		}
		else
		{
			$candidatename ="";
			return $candidatename;
		}
	}
  function searchterm_handler_curloc($currentloc)
	{
		if($currentloc)
		{
			$this->session->set_userdata('currentlocation', $currentloc);
			return $currentloc;
		}
		elseif($this->session->userdata('currentlocation'))
		{
			$currentloc = $this->session->userdata('currentlocation');
			return $currentloc;
		}
		else
		{
			$currentloc ="";
			return $currentloc;
		}
	}
	
   function searchterm_handler_region($region)
	{
		if($region)
		{
			$this->session->set_userdata('region', $region);
			return $region;
		}
		elseif($this->session->userdata('region'))
		{
			$region = $this->session->userdata('region');
			return $region;
		}
		else
		{
			$region ="";
			return $region;
		}
	}
	
  function searchterm_handler_curcomp($currentcomp)
	{
		if($currentcomp)
		{
			$this->session->set_userdata('currentcomp', $currentcomp);
			return $currentcomp;
		}
		elseif($this->session->userdata('currentcomp'))
		{
			$currentcomp = $this->session->userdata('currentcomp');
			return $currentcomp;
		}
		else
		{
			$currentcomp ="";
			return $currentcomp;
		}
	}
  function searchterm_handler_ind($industry)
	{
		if($industry)
		{
			$this->session->set_userdata('industry', $industry);
			return $industry;
		}
		elseif($this->session->userdata('industry'))
		{
			$industry = $this->session->userdata('industry');
			return $industry;
		}
		else
		{
			$industry ="";
			return $industry;
		}
	}
  function searchterm_handler_subind($subindustry)
	{
		if($subindustry)
		{
			$this->session->set_userdata('subindustry', $subindustry);
			return $subindustry;
		}
		elseif($this->session->userdata('subindustry'))
		{
			$subindustry = $this->session->userdata('subindustry');
			return $subindustry;
		}
		else
		{
			$subindustry ="";
			return $subindustry;
		}
	}
	
  function searchterm_handler_indfunc($indfunction)
	{
		if($indfunction)
		{
			$this->session->set_userdata('indfunction', $indfunction);
			return $indfunction;
		}
		elseif($this->session->userdata('indfunction'))
		{
			$indfunction = $this->session->userdata('indfunction');
			return $indfunction;
		}
		else
		{
			$indfunction ="";
			return $indfunction;
		}
	} 
	
  function searchterm_handler_subfunc($subfunction)
	{
		if($subfunction)
		{
			$this->session->set_userdata('subfunction', $subfunction);
			return $subfunction;
		}
		elseif($this->session->userdata('subfunction'))
		{
			$subfunction = $this->session->userdata('subfunction');
			return $subfunction;
		}
		else
		{
			$subfunction ="";
			return $subfunction;
		}
	}
  function searchterm_handler_department($department)
	{
		if($department)
		{
			$this->session->set_userdata('department', $department);
			return $department;
		}
		elseif($this->session->userdata('department'))
		{
			$department = $this->session->userdata('department');
			return $department;
		}
		else
		{
			$department ="";
			return $department;
		}
	}

  function searchterm_handler_jobtitle($jobtitle)
	{
		if($jobtitle)
		{
			$this->session->set_userdata('jobtitle', $jobtitle);
			return $jobtitle;
		}
		elseif($this->session->userdata('jobtitle'))
		{
			$jobtitle = $this->session->userdata('jobtitle');
			return $jobtitle;
		}
		else
		{
			$jobtitle ="";
			return $jobtitle;
		}
	}

  function searchterm_handler_designation($designation)
	{
		if($designation)
		{
			$this->session->set_userdata('designation', $designation);
			return $designation;
		}
		elseif($this->session->userdata('designation'))
		{
			$designation = $this->session->userdata('designation');
			return $designation;
		}
		else
		{
			$designation ="";
			return $designation;
		}
	}

  function searchterm_handler_grade($grade)
	{
		if($grade)
		{
			$this->session->set_userdata('grade', $grade);
			return $grade;
		}
		elseif($this->session->userdata('grade'))
		{
			$grade = $this->session->userdata('grade');
			return $grade;
		}
		else
		{
			$grade ="";
			return $grade;
		}
	}

  function searchterm_handler_level($level)
	{
		if($level)
		{
			$this->session->set_userdata('level', $level);
			return $level;
		}
		elseif($this->session->userdata('level'))
		{
			$level = $this->session->userdata('level');
			return $level;
		}
		else
		{
			$level ="";
			return $level;
		}
	}

  function searchterm_handler_course($course)
	{
		if($course)
		{
			$this->session->set_userdata('course', $course);
			return $course;
		}
		elseif($this->session->userdata('course'))
		{
			$course = $this->session->userdata('course');
			return $course;
		}
		else
		{
			$course ="";
			return $course;
		}
	}

  function searchterm_handler_ins($institute)
	{
		if($institute)
		{
			$this->session->set_userdata('institute', $institute);
			return $institute;
		}
		elseif($this->session->userdata('institute'))
		{
			$institute = $this->session->userdata('institute');
			return $institute;
		}
		else
		{
			$institute ="";
			return $institute;
		}
	}

  function searchterm_handler_pass($passingyear)
	{
		if($passingyear)
		{
			$this->session->set_userdata('passingyear', $passingyear);
			return $passingyear;
		}
		elseif($this->session->userdata('passingyear'))
		{
			$passingyear = $this->session->userdata('passingyear');
			return $passingyear;
		}
		else
		{
			$passingyear ="";
			return $passingyear;
		}
	}

  function addtoindus($indus_details){
	           

            if ($this->db->insert('addtoindus',$indus_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtosubindus($sub_indus_details){
	           

            if ($this->db->insert('addtosubindus',$sub_indus_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 
	 function addtofunc($indfunc_details){
	           

            if ($this->db->insert('addtofunc',$indfunc_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtosubfunc($sub_func_details){
	           

            if ($this->db->insert('addtosubfunc',$sub_func_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	
	 function addtoWorksheet($worksheet_details){
	           

            if ($this->db->insert('addtoworksheet1',$worksheet_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	function addtoworksheet1($worksheet1_details){
	           

            if ($this->db->insert('addtoworksheet',$worksheet1_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtoworksheet2($worksheet2_details){
	           

            if ($this->db->insert('addtoworksheet2',$worksheet2_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	function addtofolder($cand_details){
	           

            if ($this->db->insert('addtofolder',$cand_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtostatus($status_details){
	           

            if ($this->db->insert('addtostatus',$status_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
	 function addtorefer($user_details){
	           

            if ($this->db->insert('addtorefer',$user_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
     }
    // This retrieves all the candidates' record from database.
	function getAllRecord(){
	 	$data = array();
	    $Q = $this->db->get('candidate');
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	 // This retrieves the list of jobtitles from database.
	 function getPof(){
		$result = array();
		$this->db->select('*');
		$this->db->from('position');
		$this->db->order_by('pof_id','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->pof_id]= $row->jobtitle;
        }
         return $result;
	   }
	   function getFolder($username){
		// admin id is 2 and member id is 1
	     $data = array();
		 $this->db->distinct();
	     $this->db->select('p_id');
	     $this->db->where('user', $username);
	     $Q = $this->db->get('addtofolder');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[]=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	   // This retrieves the list of jobtitles from database.
	 function getWorksheet(){
		$result = array();
		$this->db->select('*');
		$this->db->from('candidates');
		$this->db->order_by('id','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->worksheet1;
        }
         return $result;
	   }
	 // This retrieves the list of grade entered by List Manager from database.
     function getGrade(){
	    $result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',5);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->entry;
        }
        return $result;
	  }
	  // This retrieves the list of degree entered by List Manager from database.
     function getDegree(){
		$result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',5);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->entry;
        }
        return $result;
	  }
	  // This retrieves the list of year entered by List Manager from database.
	 function getYearofPassing(){
	    $result = array();
		$this->db->select('*');
		$this->db->from('listentry');
	    $this->db->where('list_id',5);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[$row->id]= $row->entry;
        }
        return $result;
	  }
	 
	 function addtolist($cand_details){
	     if ($this->db->insert('addtolist',$cand_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
        }
		 
	  function enteraddtolist(){
	 	 $data = array( 
			'p_id' => $this->input->post('p_id'),
	 			);
		 if ($this->db->insert('enteraddtolist',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	     }
	  // This inserts the candidates inputs
 	  function enterNewCandidate(){
	 	$data = array( 
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'lname' => $this->input->post('lname'),
			'location' => $this->input->post('location'),
			'state' => $this->input->post('state'),
			'pin' => $this->input->post('pin'),
			'country' => $this->input->post('country'),
			'edu_level' => $this->input->post('edu_level'),
			'course_type' => $this->input->post('course_type'),
			'degree' => $this->input->post('degree'),
	 		'subject' => $this->input->post('subject'),
			'pass_year' => $this->input->post('pass_year'),
			'percent' => $this->input->post('percent'),
			'instt' => $this->input->post('instt'),
			'rank' => $this->input->post('rank'),
			'certification' => $this->input->post('certification'),
			'native_place' => $this->input->post('native_place'),
	 		'nationality' => $this->input->post('nationality'),
			'dob' => $this->input->post('dob'),
			'gender' => $this->input->post('gender'),
			'married' => $this->input->post('married'),
			'spouse' => $this->input->post('spouse'),
			'wedding_ani' => $this->input->post('wedding_ani'),
			'childrens' => $this->input->post('childrens'),
			'entered_by' => $this->input->post('entered_by'),
			'introduced_by' => $this->input->post('introduced_by'),
			'cand_manager' => $this->input->post('cand_manager'),
	 	);
		 if ($this->db->insert('candidate',$data))
			{ 
			return $this->db->insert_id();
			}
			else
			{
			return FALSE;
			}
	     }
		  // This enters the work experiance details for a candidate
	   function addWorkexp($work_exp){
	      if ($this->db->insert('candidate_work_experiance',$work_exp))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		// This enters the multiple email ids for a candidate
	   function addEmail($email){
	      if ($this->db->insert('candidate_email',$email))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		// This enters the multiple phone nos. for a candidate
	   function addPhone($phone){
	      if ($this->db->insert('candidate_phone',$phone))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		 // This enters the multiple addresses for a candidate
	   function addAddress($address){
	      if ($this->db->insert('candidate_address',$address))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
		// This enters the multiple weblinks for a candidate
	   function addWeb($web){
	      if ($this->db->insert('candidate_web',$web))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	    // This enters the salary details for a candidate
	   function addSalary($salary){
	      if ($this->db->insert('candidate_salary',$salary))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   
	   // This gets the single candidate profile.
	   function getSingleCandidate($id){
	       $data=array();
		   $this->db->select('*');
		   $this->db->from('candidates');
		 
		   $this->db->where('candidates.id', $id);
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
	 // This retrieves the folders
	   function getSingleCandidatefolder($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtofolder');
		   $this->db->join('candidates', 'addtofolder.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the worksheet
	   function getSingleCandidateMasterWorksheet($id){
	       
	       $this->db->select('*');
		   $this->db->from('addtoworksheet1');
		   $this->db->join('basicworksheet', 'addtoworksheet1.constituent_id=basicworksheet.worksheet_id');
		   $this->db->join('masterworksheet', 'basicworksheet.submaster_id=masterworksheet.submaster_id');
		   $this->db->join('worksheet', 'masterworksheet.master_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('basicworksheet.submaster_id');
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the worksheet
	   function getSingleCandidateSubMasterWorksheet($id){
	       
	       $this->db->select('*');
		   $this->db->from('addtoworksheet1');
		   $this->db->join('basicworksheet', 'addtoworksheet1.constituent_id=basicworksheet.worksheet_id');
		   $this->db->join('worksheet', 'basicworksheet.submaster_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('basicworksheet.submaster_id');
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the worksheet
	   function getSingleCandidateBasicDirect($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtoworksheet1');
		  $this->db->join('worksheet', 'addtoworksheet1.constituent_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('addtoworksheet1.constituent_id');
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	     // This retrieves the worksheet
	   function getSingleCandidateBasicIndirect($id){
	       
	       $this->db->select('*');
		   $this->db->from('worksheetconstituent');
		   $this->db->join('addtoworksheet1', 'addtoworksheet1.constituent_id=worksheetconstituent.worksheet_id');
		  $this->db->join('worksheet', 'worksheetconstituent.constituent_id=worksheet.id');
		   $this->db->join('candidates', 'addtoworksheet1.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
		   $this->db->group_by('worksheetconstituent.constituent_id');   
	        $query = $this->db->get();
           return $query->result();
	      }
	   
	   //
	    // This retrieves the indus
	   function getSingleCandidateindus($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtoindus');
		   $this->db->join('autopopulate', 'addtoindus.industry=autopopulate.id');
		   $this->db->join('candidates', 'addtoindus.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
		     // This retrieves the subindus
	   function getSingleCandidatesubindus($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtosubindus');
		   $this->db->join('autopopulate', 'addtosubindus.sub_industry=autopopulate.id');
		   $this->db->join('candidates', 'addtosubindus.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
	   // This retrieves the func
	   function getSingleCandidatefunc($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtofunc');
		   $this->db->join('autopopulate', 'addtofunc.indfunction=autopopulate.id');
		   $this->db->join('candidates', 'addtofunc.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
		 // This retrieves the subindus
	   function getSingleCandidatesubfunc($id){
	    
	       $this->db->select('*');
		   $this->db->from('addtosubfunc');
		   $this->db->join('autopopulate', 'addtosubfunc.sub_function=autopopulate.id');
		   $this->db->join('candidates', 'addtosubfunc.c_id = candidates.id');
	       $this->db->where('candidates.id', $id);
	        $query = $this->db->get();
           return $query->result();
	      }
	    // This retrieves candidate status
		  
	   // This gets the single candidate profile.
	   function getCandidateStatus($id,$username){
	       $data=array();
		   $this->db->select('*');
		   $this->db->from('addtostatus');
		   $this->db->where('c_id', $id);
		   $this->db->where('user', $username);
		
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
	    // This inserts the candidates inputs
 	   function updateFile($file_id,$id){
	 	$data = array( 
		    'id' => $id,
			'file_to_view' => $file_id,
			'last_updated' => date('Y-m-d H:i:s'),
	 		
	 	);
		$this->db->where('id',$id);
		$this->db->update('candidates',$data);	
	   }
	     // This inserts the candidates inputs
 	   function updateCandidate($user,$id){
	 	$data = array( 
		    'id' => $id,
			'candidate_name' => $this->input->post('candidate_name'),
			'telephone' => $this->input->post('telephone'),
			'email' => $this->input->post('email'),
			'current_location' => $this->input->post('current_location'),
			'region' => $this->input->post('region'),
			'current_company' => $this->input->post('current_company'),
			'job_title' => $this->input->post('job_title'),
			'department' => $this->input->post('department'),
			'designation' => $this->input->post('designation'),
			'grade' => $this->input->post('grade'),
			'level' => $this->input->post('level'),
			'salary' => $this->input->post('salary'),
	 		'in_current_company_since' => $this->input->post('in_current_company_since'),
			'reports_to' => $this->input->post('reports_to'),
			'current_role' => $this->input->post('current_role'),
			'previous_company' => $this->input->post('previous_company'),
			'course' => $this->input->post('course'),
			'institute' => $this->input->post('institute'),
			'year_of_passing' => $this->input->post('year_of_passing'),
			'year_of_birth' => $this->input->post('year_of_birth'),
			'profile_brief' => $this->input->post('profile_brief'),
			'comment' => $this->input->post('comment'),
			'last_updated' => date('Y-m-d H:i:s'),
			'last_updated_by' => $user,
	 		
	 	);
		$this->db->where('id',$id);
		$this->db->update('candidates',$data);	
	   }
	  
 //This sends the candidates to the del list.
   function deleteCandidate($candidateid,$user){
	 	$data = array(
		'id' => $candidateid,
		'last_updated' => date('Y-m-d H:i:s'),
		'last_updated_by' => $user,
		'is_to_Delete' => 1,
		);
	 	$this->db->where('id', $candidateid);
		$this->db->update('candidates',$data);	
	 }
	// This gets a username
	  function getUsers(){
		 $data = array();
	     $this->db->select('id,username');
	      $this->db->where('active',1);
	     $Q = $this->db->get('be_users');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		   {
	         $data[]=$row;
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 } 
	 // This gets the single candidate profile.
	   function getCv($id){
	       $data=array();
		   $this->db->select('filepath,filename');
		   $this->db->from('files');
		   $this->db->where('cand', $id);
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
	// This gets all the username for the dropdown  
	  function getUsersDropDown($id){
		 $data = array();
	     $this->db->select('id,username');
	     $Q = $this->db->get('be_users');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		   {
	         $data[$row['username']] = $row['username'];
	       }
	    }
	    $Q->free_result();  
	    return $data; 
	 }
	 
 // This retrieves industry list from database.
	function getIndustryList(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id', 1);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	 // This retrieves industry list from database.
	function getFunctionList(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id', 2);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	   // This retrieves industry list from database.
	function getCityList(){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where('segment_type_id', 3);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	        // This retrieves attachment list from database.
	function getAttachmentList($id){
	 	$data = array();
		$this->db->select('*');
		$this->db->from('files');
		$this->db->where('cand', $id);
	    $Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	      }
	    }
	    $Q->free_result();    
	    return $data;  
	  }
	  
	 function deletesubind($id){
	$this->db->delete('addtofolder', array('fid' => $id));
	 }
	  // This gets the file name to show.
	   function getSinglefile($id){
	       $data=array();
		   $this->db->select('*');
		   $this->db->from('candidates');
		   $this->db->join('files', 'candidates.file_to_view=files.file_id');
		 
		   $this->db->where('candidates.id', $id);
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
	 	 // This inserts the master worksheet constituents details.
   function addConstituent($constituent_details){
	     if ($this->db->insert('worksheetconstituent1',$constituent_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	   
	function record_count_cand_to_del()
	{
	   $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE is_to_Delete = 1";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		
	}
	function fetch_candidates_to_del($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from('candidates');
		$this->db->join('files', 'files.cand=candidates.id', 'left');
		$this->db->where('candidates.is_to_Delete',1);
		$this->db->order_by('candidate_name');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}

			return $data;
		}
		
	}
	
//This sends the candidates to the del list.
   function RejCandDB($candidateid){
	 	$data = array(
		'id' => $candidateid,
		'is_to_Delete' => 0,
		);
	 	$this->db->where('id', $candidateid);
		$this->db->update('candidates',$data);	
	 }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function countWorksheetNot()
	   {
	    $sql = "SELECT *,SUM(put_in_worksheet='') As count1,SUM(file_to_view='') As count2, SUM(entered_by=be_users.username) As count3 FROM candidates RIGHT JOIN be_users ON be_users.username=candidates.entered_by WHERE be_users.active=1 GROUP BY candidates.entered_by;";
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
    function countAllCand()
	 {
	  $sql = "SELECT COUNT(*) As cnt FROM candidates";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	 }
	function countConsolWork()
	 {
	  $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE put_in_worksheet = 0";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	 }
	 
	 function countConsolCV()
	 {
	  $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE file_to_view =' '";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	 }
   
    function count_notWork($user)
	  {
	  $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE put_in_worksheet = 0 AND is_to_Delete = 0 AND entered_by ='".$user."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_notWorkSort($user,$column,$order,$limit)
	  {
	   $sql = "SELECT * FROM candidates WHERE (put_in_worksheet = 0 AND is_to_Delete = 0) AND entered_by ='".$user."' ORDER BY ".$column." ".$order." LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	  function fetch_candidates_notWork($user,$limit)
	  {
	   $sql = "SELECT * FROM candidates WHERE (put_in_worksheet = 0 AND is_to_Delete = 0) AND entered_by ='".$user."' LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	  function fetch_candidates_noCVSort($user,$column,$order,$limit)
	  {
	   $sql = "SELECT * FROM candidates WHERE (file_to_view =' ' AND is_to_Delete = 0) AND entered_by ='".$user."' ORDER BY ".$column." ".$order." LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	  function count_noCV($user)
	  {
	  $sql = "SELECT COUNT(*) As cnt FROM candidates WHERE file_to_view =' ' AND is_to_Delete = 0 AND entered_by ='".$user."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	
	function fetch_candidates_noCV($user,$limit)
	  {
	   $sql = "SELECT * FROM candidates WHERE (file_to_view =' ' AND is_to_Delete = 0) AND entered_by ='".$user."' LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	  function fetch_candidates_consolWork($limit)
	  {
	   $sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE put_in_worksheet = 0 LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	  function fetch_candidates_consolWorkSort($column,$order,$limit)
	  {
	   $sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE put_in_worksheet = 0 ORDER BY ".$column." ".$order." LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	  
	 function fetch_candidates_consolCV($limit)
	  {
	   $sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE file_to_view =' ' LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	  function fetch_candidates_consolCVSort($column,$order,$limit)
	  {
	   $sql = "SELECT * FROM candidates LEFT JOIN files ON candidates.id=files.cand WHERE file_to_view =' ' ORDER BY ".$column." ".$order." LIMIT " .$limit . ",20 ";
	   $q = $this->db->query($sql);
	   foreach($q->result() as $row)
	    {
		 $data[]=$row;
		}
		return $data;
	  }
	  
	function searchterm_handler_column($column)
	{
		if($column)
		{
			$this->session->set_userdata('column', $column);
			return $column;
		}
		elseif($this->session->userdata('column'))
		{
			$column = $this->session->userdata('column');
			return $column;
		}
		else
		{
			$column ="";
			return $column;
		}
	}
	
	function searchterm_handler_order($order)
	{
		if($order)
		{
			$this->session->set_userdata('order', $order);
			return $order;
		}
		elseif($this->session->userdata('order'))
		{
			$order = $this->session->userdata('order');
			return $order;
		}
		else
		{
			$order ="";
			return $order;
		}
	}
	
	function countUnresumes()
	 {
	  $sql = "SELECT COUNT(*) As cnt FROM files LEFT OUTER JOIN candidates ON (files.cand=candidates.id) WHERE candidates.id IS NULL";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	 }
	
	function getUnresumes($limit)
	{
		
		$sql = "SELECT file_id, filename, cand FROM files LEFT OUTER JOIN candidates ON (files.cand=candidates.id) WHERE candidates.id IS NULL LIMIT " .$limit . ",20 ";
		
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
	
   // This gets the single candidate profile.
	   function getResume($id){
	       $data=array();
		   $this->db->select('filepath,filename');
		   $this->db->from('files');
		   $this->db->where('file_id', $id);
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
		  //
	 //This deletes the part of master worksheet.
   function delCandFile($fileid){
	 	$file = $this->get_file($fileid);
		if (!$this->db->where('file_id', $fileid)->delete('files'))
		{
			return FALSE;
		}
		unlink('./public/candidate/' . $file->filename);	
		return TRUE;
	}
		
	
	function get_file($fileid)
	  {
	   return $this->db->select()
				->from('files')
				->where('file_id', $fileid)
				->get()
				->row();
	  }
	  
	 ////delivery reports//////
	 function getConsDelivery()
	{
	
	    $date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		
		$day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
			 
			 
		$sql = "SELECT id,username,countt,allactive,allurgent, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' ) ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7, SUM(CASE WHEN (date BETWEEN '".$from."' AND '".$to."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As countlast FROM pof_candidates JOIN (SELECT id, username,active, SUM(events_tt.section_id=be_users.id) As countt FROM events_tt JOIN be_users ON events_tt.section_id=be_users.id WHERE events_tt.is_alloc=1 GROUP BY be_users.id) As sub ON pof_candidates.user_id=sub.id JOIN (SELECT id As id1,SUM(pof.pos_status='wip_urgent') As allurgent, SUM(pof.pos_status='wip_active') As allactive FROM pof JOIN events_tt ON events_tt.pof_id=pof.pof_id JOIN be_users ON events_tt.section_id=be_users.id WHERE events_tt.is_alloc=1 GROUP BY be_users.id) As sub1 ON pof_candidates.user_id=sub1.id1 WHERE sub.active=1 GROUP BY sub.id ORDER BY sub.username";
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
	
	 ////delivery reports//////
	 function getRADelivery()
	{
	
	    $date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		
		$day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
			 
			 
		$sql = "SELECT id,username,SUM(CASE WHEN (databankdate='".$date."') THEN rastage = '283' ELSE 0 END) As count1, SUM(CASE WHEN (databankdate='".$date1."') THEN rastage = '283' ELSE 0 END) As count2, SUM(CASE WHEN (databankdate='".$date2."') THEN rastage = '283' ELSE 0 END) As count3, SUM(CASE WHEN (databankdate='".$date3."') THEN rastage = '283' ELSE 0 END) As count4, SUM(CASE WHEN (databankdate='".$date4."') THEN rastage = '283' ELSE 0 END) As count5, SUM(CASE WHEN (databankdate='".$date5."') THEN rastage = '283' ELSE 0 END) As count6, SUM(CASE WHEN (databankdate='".$date6."') THEN rastage = '283' ELSE 0 END) As count7, SUM(CASE WHEN (databankdate BETWEEN '".$from."' AND '".$to."') THEN rastage = '283' ELSE 0 END) As countlast, COUNT(DISTINCT pofid) As countpos FROM pof_candidates RIGHT JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE be_users.group='10' GROUP BY be_users.id";
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
	
	 function getRADeliveryposwise($ra,$date)
	{
	
	    		 
		$sql = "SELECT *,SUM(CASE WHEN (databankdate='".$date."') THEN rastage = '283' ELSE 0 END) As count1 FROM pof_candidates RIGHT JOIN be_users ON pof_candidates.ra_id=be_users.id LEFT JOIN pof on pof_candidates.pofid=pof.pof_id WHERE pof_candidates.ra_id='".$ra."' AND databankdate='".$date."' GROUP BY pof_candidates.pofid";
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
	
	function getPosDeliveryDaily()
	{
	
	    $date  = date('Y-m-d');
		$date1 = date('Y-m-d',strtotime('-1 days'));
		$date2 = date('Y-m-d',strtotime('-2 days'));
		$date3 = date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		$sql = "SELECT pofid,pof_no,posi,c_id,parentname,jobtitle,countt, SUM(pof_candidates.stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )) As totalcvsent1, SUM(pof_candidates.stage='client_reject') As totalcvsent2, SUM(pof_candidates.stage='interview_shortlist') As totalcvsent3, SUM(pof_candidates.stage='offer') As totalcvsent4, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7 FROM pof_candidates RIGHT JOIN (SELECT pof_no,pof.pof_id As posi,compid AS c_id,parentname,jobtitle,events_tt.pof_id As posid, SUM(events_tt.pof_id=pof.pof_id) As countt FROM events_tt JOIN pof ON events_tt.pof_id=pof.pof_id JOIN companies ON pof.client_id=companies.compid JOIN synonym ON companies.compid=synonym.s_id WHERE events_tt.is_alloc=1 GROUP BY pof.pof_id) As sub ON pof_candidates.pofid=sub.posi GROUP BY sub.posi ORDER BY sub.parentname DESC";
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
	
	function filterPosDelivery($from)
	{
	    $date = $from;
	    $date1 = date('Y-m-d',strtotime($date . "-1 days"));
		$date2 = date('Y-m-d',strtotime($date . "-2 days"));
		$date3 = date('Y-m-d',strtotime($date . "-3 days"));
		$date4 = date('Y-m-d',strtotime($date . "-4 days"));
		$date5 = date('Y-m-d',strtotime($date . "-5 days"));
		$date6 = date('Y-m-d',strtotime($date . "-6 days"));
		$sql = "SELECT pofid,pof_no,posi,c_id,parentname,jobtitle,countt, SUM(pof_candidates.stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )) As totalcvsent1, SUM(pof_candidates.stage='client_reject') As totalcvsent2, SUM(pof_candidates.stage='interview_shortlist') As totalcvsent3, SUM(pof_candidates.stage='offer') As totalcvsent4, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7 FROM pof_candidates RIGHT JOIN (SELECT pof_no,pof.pof_id As posi,compid AS c_id,parentname,jobtitle,events_tt.pof_id As posid, SUM(events_tt.pof_id=pof.pof_id) As countt FROM events_tt JOIN pof ON events_tt.pof_id=pof.pof_id JOIN companies ON pof.client_id=companies.compid JOIN synonym ON companies.compid=synonym.s_id WHERE events_tt.is_alloc=1 GROUP BY pof.pof_id) As sub ON pof_candidates.pofid=sub.posi GROUP BY sub.posi ORDER BY sub.parentname DESC";
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
	function getPosDeliveryActive()
	{
	
	    $date  = date('Y-m-d');
		$date1 = date('Y-m-d',strtotime('-1 days'));
		$date2 = date('Y-m-d',strtotime('-2 days'));
		$date3 = date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		$sql = "SELECT pofid,pof_no,posi,c_id,parentname,jobtitle,countt, SUM(pof_candidates.stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )) As totalcvsent1, SUM(pof_candidates.stage='client_reject') As totalcvsent2, SUM(pof_candidates.stage='interview_shortlist') As totalcvsent3, SUM(pof_candidates.stage='offer') As totalcvsent4, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7 FROM pof_candidates RIGHT JOIN (SELECT pof_no,pof.pof_id As posi,compid As c_id,parentname,jobtitle,events_tt.pof_id As posid, SUM(events_tt.pof_id=pof.pof_id) As countt FROM events_tt JOIN pof ON events_tt.pof_id=pof.pof_id JOIN companies ON pof.client_id=companies.compid JOIN synonym ON companies.compid=synonym.s_id WHERE events_tt.is_alloc=1 AND (pof.pos_status='wip_active' OR pof.pos_status='wip_urgent') GROUP BY pof.pof_id) As sub ON pof_candidates.pofid=sub.posi GROUP BY sub.posi ORDER BY sub.parentname DESC";
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
	
	function getConsPosDelivery($consid)
	{
	
	    $date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		$sql = "SELECT pofid,pof_no,posi,comp,jobtitle,countt, SUM(pof_candidates.stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )) As totalcvsent1, SUM(pof_candidates.stage='client_reject') As totalcvsent2, SUM(pof_candidates.stage='interview_shortlist') As totalcvsent3, SUM(pof_candidates.stage='offer') As totalcvsent4, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7 FROM pof_candidates JOIN (SELECT pof_no,pof.pof_id As posi,comp,jobtitle,events_tt.pof_id As posid, consuls As countt FROM events_tt JOIN pof ON events_tt.pof_id=pof.pof_id JOIN company ON pof.client_id=company.c_id JOIN pof_cons ON events_tt.pof_id=pof_cons.pos_id WHERE events_tt.is_alloc=1 AND events_tt.section_id='".$consid."' GROUP BY pof.pof_id) As sub ON pof_candidates.pofid=sub.posi GROUP BY sub.posi ORDER BY sub.comp DESC";
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
	
	function getConsPosDeliveryactive($consid)
	{
	
	    $date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		$sql = "SELECT pofid,pof_no,posi,parentname,jobtitle,countt, SUM(pof_candidates.stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )) As totalcvsent1, SUM(pof_candidates.stage='client_reject') As totalcvsent2, SUM(pof_candidates.stage='interview_shortlist') As totalcvsent3, SUM(pof_candidates.stage='offer') As totalcvsent4, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7 FROM pof_candidates RIGHT JOIN (SELECT pof_no,pof.pof_id As posi,parentname,jobtitle,events_tt.pof_id As posid, consuls As countt FROM events_tt JOIN pof ON events_tt.pof_id=pof.pof_id JOIN companies ON pof.client_id=companies.compid JOIN synonym ON companies.compid=synonym.s_id JOIN pof_cons ON events_tt.pof_id=pof_cons.pos_id WHERE events_tt.is_alloc=1 AND (pof.pos_status='wip_urgent' OR pof.pos_status='wip_active') AND events_tt.section_id='".$consid."' GROUP BY pof.pof_id) As sub ON pof_candidates.pofid=sub.posi GROUP BY sub.posi ORDER BY sub.parentname DESC";
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
	
	 function getPosConsDelivery($pofid)
	{
	
	    $date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		
		$day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
			 
			 
		$sql = "SELECT id,username,countt,allactive,allurgent, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7, SUM(CASE WHEN (date BETWEEN '".$from."' AND '".$to."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As countlast FROM pof_candidates RIGHT JOIN (SELECT id, username,active, SUM(events_tt.section_id=be_users.id) As countt FROM events_tt JOIN be_users ON events_tt.section_id=be_users.id WHERE events_tt.is_alloc=1 GROUP BY be_users.id) As sub ON pof_candidates.user_id=sub.id JOIN (SELECT id As id1,SUM(pof.pos_status='wip_urgent') As allurgent, SUM(pof.pos_status='wip_active') As allactive FROM pof JOIN events_tt ON events_tt.pof_id=pof.pof_id JOIN be_users ON events_tt.section_id=be_users.id WHERE events_tt.is_alloc=1 AND events_tt.pof_id='".$pofid."' GROUP BY be_users.id) As sub1 ON pof_candidates.user_id=sub1.id1 WHERE sub.active=1 GROUP BY sub.id ORDER BY sub.username";
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
	
	function generateVRS($date,$consultant)
		 {
		  
		$sql ="SELECT *,synonym.parentname As compa, a1.parentname As loca FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date ='".$date."') AND be_users.id ='".$consultant."' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ORDER BY compa ASC, pof_candidates.pofid, pof_candidates.date ASC ";
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
	function generateVRSClient($date,$client)
		 {
		  
		$sql ="SELECT * FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id LEFT JOIN files ON candidates.id=files.cand RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN company ON pof.client_id=company.c_id LEFT JOIN segment_name ON pof.location=segment_name.id LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date ='".$date."') AND company.c_id ='".$client."' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ORDER BY company.comp ASC, pof_candidates.pofid, pof_candidates.date ASC ";
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
	
	function generateVRSthisweek($from,$to,$consultant)
		 {
		  
		$sql ="SELECT *,synonym.parentname As compa, a1.parentname As loca FROM pof_candidates JOIN candidates ON pof_candidates.cand_id=candidates.id RIGHT JOIN pof ON pof_candidates.pofid=pof.pof_id LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN be_users ON pof_candidates.user_id=be_users.id WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND be_users.id ='".$consultant."' AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 GROUP BY pof_candidates.cand_id ORDER BY compa ASC, pof_candidates.pofid, pof_candidates.date ASC ";
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
	
	function getPosDeliveryDash($consid)
	{
	
	    $date = date('Y-m-d');
		$date1= date('Y-m-d',strtotime('-1 days'));
		$date2= date('Y-m-d',strtotime('-2 days'));
		$date3= date('Y-m-d',strtotime('-3 days'));
		$date4 = date('Y-m-d',strtotime('-4 days'));
		$date5 = date('Y-m-d',strtotime('-5 days'));
		$date6 = date('Y-m-d',strtotime('-6 days'));
		
		$day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('-1 Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
			 
			 
		$sql = "SELECT id,username,countt,allactive,allurgent, SUM(CASE WHEN (date='".$date."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count1, SUM(CASE WHEN (date='".$date1."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count2, SUM(CASE WHEN (date='".$date2."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count3, SUM(CASE WHEN (date='".$date3."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count4, SUM(CASE WHEN (date='".$date4."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count5, SUM(CASE WHEN (date='".$date5."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count6, SUM(CASE WHEN (date='".$date6."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As count7, SUM(CASE WHEN (date BETWEEN '".$from."' AND '".$to."') THEN stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ELSE 0 END) As countlast FROM pof_candidates JOIN (SELECT id, username,active, SUM(events_tt.section_id=be_users.id) As countt FROM events_tt JOIN be_users ON events_tt.section_id=be_users.id WHERE events_tt.is_alloc=1 GROUP BY be_users.id) As sub ON pof_candidates.user_id=sub.id JOIN (SELECT id As id1,SUM(pof.pos_status='wip_urgent') As allurgent, SUM(pof.pos_status='wip_active') As allactive FROM pof JOIN events_tt ON events_tt.pof_id=pof.pof_id JOIN be_users ON events_tt.section_id=be_users.id WHERE events_tt.is_alloc=1 AND events_tt.section_id='".$consid."' GROUP BY be_users.id) As sub1 ON pof_candidates.user_id=sub1.id1 WHERE sub.active=1 GROUP BY sub.id ORDER BY sub.username";
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
	
	function countSentCvThisWeek($from,$to)
		   {
		    
			 $from = date('Y-m-d',strtotime('-6 days'));
			  $to = date('Y-m-d');
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvLastWeek($from,$to)
		   {
		    $date = date('Y-m-d');
		    $day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('Last Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date BETWEEN '".$from."' AND '".$to."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countDatabankThisWeek($from,$to)
		   {
		    
			 $from = date('Y-m-d',strtotime('-6 days'));
			  $to = date('Y-m-d');
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate BETWEEN '".$from."' AND '".$to."') AND stage='283' AND be_users.group='10' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countDatabankLastWeek($from,$to)
		   {
		    $date = date('Y-m-d');
		    $day = date('l',strtotime($date));
            if($day=='Monday')
              {
              $from = date('Y-m-d',strtotime('Last Monday', time()));
              }
           else{
           $from = date('Y-m-d',strtotime('-2 Monday', time()));
             }
			 $to = date('Y-m-d',strtotime('Last Saturday', time()));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate BETWEEN '".$from."' AND '".$to."') AND stage='283' AND be_users.group='10' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvThisWeekCT()
		   {
		    
			$date = date('Y-m-d');
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date ='".$date."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvThisWeekCT1()
		   {
		    
			$date1= date('Y-m-d',strtotime('-1 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date ='".$date1."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvThisWeekCT2()
		   {
		    
			$date2= date('Y-m-d',strtotime('-2 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date ='".$date2."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countSentCvThisWeekCT3()
		   {
		    
			$date3= date('Y-m-d',strtotime('-3 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date ='".$date3."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countSentCvThisWeekCT4()
		   {
		    
			$date4= date('Y-m-d',strtotime('-4 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date ='".$date4."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countSentCvThisWeekCT5()
		   {
		    
			$date5= date('Y-m-d',strtotime('-5 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date ='".$date5."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvThisWeekCT6()
		   {
		    
			$date6= date('Y-m-d',strtotime('-6 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates WHERE (pof_candidates.date ='".$date6."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countDatabankThisWeekCT()
		   {
		    
			$date = date('Y-m-d');
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate ='".$date."') AND stage='283' AND be_users.group='10'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countDatabankThisWeekCT1()
		   {
		    
			$date1= date('Y-m-d',strtotime('-1 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate ='".$date1."') AND stage='283' AND be_users.group='10' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countDatabankThisWeekCT2()
		   {
		    
			$date2= date('Y-m-d',strtotime('-2 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate ='".$date2."') AND stage='283' AND be_users.group='10'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countDatabankThisWeekCT3()
		   {
		    
			$date3= date('Y-m-d',strtotime('-3 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate ='".$date3."') AND stage='283' AND be_users.group='10'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countDatabankThisWeekCT4()
		   {
		    
			$date4= date('Y-m-d',strtotime('-4 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate ='".$date4."') AND stage='283' AND be_users.group='10' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countDatabankThisWeekCT5()
		   {
		    
			$date5= date('Y-m-d',strtotime('-5 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate ='".$date5."') AND stage='283' AND be_users.group='10' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countDatabankThisWeekCT6()
		   {
		    
			$date6= date('Y-m-d',strtotime('-6 days'));
		    $sql = "SELECT COUNT(cand_id) As cnt FROM pof_candidates JOIN be_users ON pof_candidates.ra_id=be_users.id WHERE (pof_candidates.databankdate ='".$date6."') AND stage='283' AND be_users.group='10' ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   //for active position delivery
		   
		   // for positions delivery
		    function countSentCvThisWeekPAT()
		   {
		    
			$date = date('Y-m-d');
		    $sql = "SELECT COUNT(pofid) As cnt FROM pof_candidates JOIN pof ON pof_candidates.pofid=pof.pof_id WHERE (pof_candidates.date ='".$date."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 AND pos_status IN ('wip_active', 'wip_urgent') ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvThisWeekPAT1()
		   {
		    
			$date1= date('Y-m-d',strtotime('-1 days'));
		    $sql = "SELECT COUNT(pofid) As cnt FROM pof_candidates JOIN pof ON pof_candidates.pofid=pof.pof_id WHERE (pof_candidates.date ='".$date1."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 AND pos_status IN ('wip_active', 'wip_urgent') ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvThisWeekPAT2()
		   {
		    
			$date2= date('Y-m-d',strtotime('-2 days'));
		    $sql = "SELECT COUNT(pofid) As cnt FROM pof_candidates JOIN pof ON pof_candidates.pofid=pof.pof_id WHERE (pof_candidates.date ='".$date2."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 AND pos_status IN ('wip_active', 'wip_urgent') ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countSentCvThisWeekPAT3()
		   {
		    
			$date3= date('Y-m-d',strtotime('-3 days'));
		    $sql = "SELECT COUNT(pofid) As cnt FROM pof_candidates JOIN pof ON pof_candidates.pofid=pof.pof_id WHERE (pof_candidates.date ='".$date3."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 AND pos_status IN ('wip_active', 'wip_urgent') ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countSentCvThisWeekPAT4()
		   {
		    
			$date4= date('Y-m-d',strtotime('-4 days'));
		    $sql = "SELECT COUNT(pofid) As cnt FROM pof_candidates JOIN pof ON pof_candidates.pofid=pof.pof_id WHERE (pof_candidates.date ='".$date4."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 AND pos_status IN ('wip_active', 'wip_urgent') ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		    function countSentCvThisWeekPAT5()
		   {
		    
			$date5= date('Y-m-d',strtotime('-5 days'));
		   $sql = "SELECT COUNT(pofid) As cnt FROM pof_candidates JOIN pof ON pof_candidates.pofid=pof.pof_id WHERE (pof_candidates.date ='".$date5."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 AND pos_status IN ('wip_active', 'wip_urgent') ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
		   function countSentCvThisWeekPAT6()
		   {
		    
			$date6= date('Y-m-d',strtotime('-6 days'));
		    $sql = "SELECT COUNT(pofid) As cnt FROM pof_candidates JOIN pof ON pof_candidates.pofid=pof.pof_id WHERE (pof_candidates.date ='".$date6."') AND stage IN (SELECT id FROM segment_name WHERE segment_type_id='5' )	 AND pos_status IN ('wip_active', 'wip_urgent') ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
		   }
		   
  function count_clienttans($cid)
	{
		  $sql = "SELECT COUNT(*) As cnt FROM pof WHERE client_id='".$cid."'";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getClientTrans($limit){
      $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN candidates ON pof.hiring_manager=candidates.id LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN segment_name ON segment_name.id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN be_users ON pof.client_mgr=be_users.id GROUP BY pof.client_id  ORDER BY pof.client_id DESC LIMIT " .$limit . ",20 ";
		
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
	
	function count_consults($cid)
	{
		  $sql = "SELECT COUNT(*) As cnt FROM pof";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getConsults($limit){
      $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN candidates ON pof.hiring_manager=candidates.id LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN segment_name ON segment_name.id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN be_users ON pof_candidates.user_id=be_users.id GROUP BY pof_candidates.user_id  ORDER BY pof_candidates.user_id DESC LIMIT " .$limit . ",20 ";
		
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
	
	function count_dor($cid)
	{
		  $sql = "SELECT COUNT(*) As cnt FROM pof ";
	   $q = $this->db->query($sql);
	   $row = $q->row();
	   return $row->cnt;
	}
	//
    // This retrieves all the company record.
    function getDOR($limit){
      $sql = "SELECT *,SUM(stage='288') As sum1, SUM(stage='289') As sum2, SUM(stage='291') As sum3, SUM(stage='293') As sum4, COUNT(DISTINCT cand_id) As count2,synonym.parentname As compa, a1.parentname As loca FROM pof LEFT JOIN candidates ON pof.hiring_manager=candidates.id LEFT JOIN pof_candidates ON pof.pof_id=pof_candidates.pofid LEFT JOIN synonym ON synonym.s_id=pof.client_id LEFT JOIN synonym As a1 ON a1.s_id=pof.location LEFT JOIN segment_name ON segment_name.id=pof.location LEFT JOIN pof_cons ON pof.pof_id=pof_cons.pos_id LEFT JOIN be_users ON pof.client_mgr=be_users.id GROUP BY pof.pos_taken_on  ORDER BY pof.pos_taken_on DESC LIMIT " .$limit . ",20 ";
		
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
	
	
}

 