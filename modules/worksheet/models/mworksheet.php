<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MWorksheet extends Base_model{

	function MWorksheet(){
		parent::Base_model();
		$this->_TABLES = array( 'worksheet' => 'worksheet'
                                    );
	}
	//
		//
	 function getMyWorksheet($username){
		$result = array();
		$this->db->select('*');
		$this->db->from('worksheet_pref');
		$this->db->join('worksheet','worksheet_pref.worksheet_id=worksheet.id');
		$this->db->where('user_id',$username);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           $result[]= $row;
        }
        
        return $result;
	}	
	//
	//delete my pref worksheet
	 function delMyWorksheet($prefid)
	   {
	    return $this->db->where('pid',$prefid)->delete('worksheet_pref');
	   }
	  //
	//
	function getSegmentType(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('segment');
		$this->db->where('is_segment',1);
			
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->segment_type;
        }
        
        return $result;
	}
	function getSegment(){
	 
		$segment_type_id = $this->input->post('segmenttypeid');
		$result = array();
		$this->db->select('*');
		$this->db->from('segment_name');
		$this->db->where_in('segment_type_id',$segment_type_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->segment_name;
        }
        
        return $result;
	}
	function getMasterWorksheet(){
	 
		$segment_type_id = $this->input->post('segmenttypemid');
		$result = array();
		$this->db->select('*');
		$this->db->from('worksheet');
		$this->db->where_in('segment_type_id',$segment_type_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getSubMasterWorksheet(){
	 
		$masterworksheet_id = $this->input->post('masterworksheetid');
		$result = array();
		$this->db->select('*');
		$this->db->from('masterworksheet');
		$this->db->join('worksheet', 'worksheet.id=masterworksheet.submaster_id');
		$this->db->where_in('masterworksheet.master_id',$masterworksheet_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	
	function getBasicWorksheet(){
	 
		$submaster_id = $this->input->post('submasterworksheetid');
		$result = array();
		$this->db->select('*');
		$this->db->from('basicworksheet');
		$this->db->join('worksheet', 'basicworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('basicworksheet.submaster_id',$submaster_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getMasterWorksheettosend(){
	 
		$segment_type_id = $this->input->post('segmenttypesid');
		$result = array();
		$this->db->select('*');
		$this->db->from('worksheet');
		$this->db->where_in('segment_type_id',$segment_type_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getSubMasterWorksheettosend(){
	 
		$masterworksheet_id = $this->input->post('masterworksheettosendid');
		$result = array();
		$this->db->select('*');
		$this->db->from('masterworksheet');
		$this->db->join('worksheet', 'worksheet.id=masterworksheet.submaster_id');
		$this->db->where_in('masterworksheet.master_id',$masterworksheet_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getBasicWorksheettosend(){
	 
		$submaster_id = $this->input->post('submasterworksheetsid');
		$result = array();
		$this->db->select('*');
		$this->db->from('basicworksheet');
		$this->db->join('worksheet', 'basicworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('basicworksheet.submaster_id',$submaster_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getMasterWorksheettopull(){
	 
		$segment_type_id = $this->input->post('segmenttypepid');
		$result = array();
		$this->db->select('*');
		$this->db->from('worksheet');
		$this->db->where_in('segment_type_id',$segment_type_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getSubMasterWorksheettopull(){
	 
		$masterworksheet_id = $this->input->post('masterworksheettopullid');
		$result = array();
		$this->db->select('*');
		$this->db->from('masterworksheet');
		$this->db->join('worksheet', 'worksheet.id=masterworksheet.submaster_id');
		$this->db->where_in('masterworksheet.master_id',$masterworksheet_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getBasicWorksheettopull(){
	 
		$submaster_id = $this->input->post('submasterworksheetpid');
		$result = array();
		$this->db->select('*');
		$this->db->from('basicworksheet');
		$this->db->join('worksheet', 'basicworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('basicworksheet.submaster_id',$submaster_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	
	//
	function getBasicWorksheettopullList(){
	 
		$submaster_id = $this->input->post('submasterworksheetpid');
		$result = array();
		$this->db->select('*');
		$this->db->from('basicworksheet');
		$this->db->join('worksheet', 'basicworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('basicworksheet.submaster_id',$submaster_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[]= $row;
        }
        
        return $result;
	}
	//
	function getSubBasicWorksheettosend(){
	 
		$subbasic_id = $this->input->post('subbasicworksheetsid');
		$result = array();
		$this->db->select('*');
		$this->db->from('subbasicworksheet');
		$this->db->join('worksheet', 'subbasicworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('subbasicworksheet.subbasic_id',$subbasic_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getSubBasicWorksheettopull(){
	 
		$subbasic_id = $this->input->post('subbasicworksheetpid');
		$result = array();
		$this->db->select('*');
		$this->db->from('subbasicworksheet');
		$this->db->join('worksheet', 'subbasicworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('subbasicworksheet.subbasic_id',$subbasic_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	//
	function getSubBasicWorksheettopullList(){
	 
		$subbasic_id = $this->input->post('subbasicworksheetpid');
		$result = array();
		$this->db->select('*');
		$this->db->from('subbasicworksheet');
		$this->db->join('worksheet', 'subbasicworksheet.worksheet_id=worksheet.id');
		$this->db->where_in('subbasicworksheet.subbasic_id',$subbasic_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[]= $row;
        }
        
        return $result;
	}
	//
	function getBasicWorksheets(){
	 
		$masterworksheet_id = $this->input->post('masterworksheettosendid');
		$result = array();
		$this->db->select('*');
		$this->db->from('worksheetconstituent');
		$this->db->where_in('segment_type_id',$segment_type_id);
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}
	function getListMasterWorksheet(){
	 
	$result = array();
		$this->db->select('*');
		$this->db->from('worksheet');
		$this->db->where('worksheet_type', 'master');
	  	
		
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
           
            $result[$row->id]= $row->worksheet_name;
        }
        
        return $result;
	}

		// This inserts the masterworksheet details.
   function newWorksheetMaster()
   {
    $data = array(
	'worksheet_name' => $this->input->post('worksheet_name'),
	'worksheet_type' => $this->input->post('worksheet_type'),
	'segment_type_id' => $this->input->post('segment_type_id'),
	'segment_id' => $this->input->post('segment_id'),
	'worksheet_obj'  => $this->input->post('worksheet_obj'),
	'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	);
	if($this->db->insert('worksheet', $data))
	{
	return $this->db->insert_id();
	}
	else
	{
	return FALSE;
	}
   }
   		// This inserts the submasterworksheet details.
   function newWorksheetSubMaster()
   {
     $data=array(
				'worksheet_name' 	  => $this->input->post('worksheet_name'),
				'worksheet_type' => $this->input->post('worksheet_type'),
				'worksheet_obj'  => $this->input->post('worksheet_obj'),
	            'worksheet_scribbles' => $this->input->post('worksheet_scribbles'),
													);
	if($this->db->insert('worksheet', $data))
	{
	return $this->db->insert_id();
	}
	else
	{
	return FALSE;
	}
   }
     // This inserts the master worksheet details.
   function addtoMasterworksheet($masterworksheet_details){
	     if ($this->db->insert('masterworksheet',$masterworksheet_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
   	// This inserts the basic details.
   function newWorksheetBasic()
   {
    $data = array(
	'worksheet_name' => $this->input->post('worksheet_name'),
	'worksheet_type' => $this->input->post('worksheet_type'),
	'worksheet_obj'  => $this->input->post('worksheet_obj'),
	'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	);
	if($this->db->insert('worksheet', $data))
	{
	return $this->db->insert_id();
	}
	else
	{
	return FALSE;
	}
   }
	// This inserts theworksheet details.
   function newWorksheet()
   {
    $data = array(
	'worksheet_name' => $this->input->post('worksheet_name'),
	'worksheet_type' => $this->input->post('worksheet_type'),
	'worksheet_obj'  => $this->input->post('worksheet_obj'),
	'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	);
	if($this->db->insert('worksheet', $data))
	{
	return $this->db->insert_id();
	}
	else
	{
	return FALSE;
	}
   }
   	// This inserts theworksheet details.
   function newWorksheetSubBasic()
   {
    $data = array(
	'worksheet_name' => $this->input->post('worksheet_name'),
	'worksheet_type' => $this->input->post('worksheet_type'),
	'worksheet_obj'  => $this->input->post('worksheet_obj'),
	'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	);
	if($this->db->insert('worksheet', $data))
	{
	return $this->db->insert_id();
	}
	else
	{
	return FALSE;
	}
   }
    // This inserts the master worksheet details.
   function addMasterWorksheet($master_worksheet_details){
	     if ($this->db->insert('masterworksheet',$master_worksheet_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	   
	    // This inserts the master worksheet constituents details.
   function addBasicWorksheet($basicworksheet_details){
	     if ($this->db->insert('basicworksheet',$basicworksheet_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	   
	      // This inserts the master worksheet constituents details.
   function addSubBasicWorksheet($subbasicworksheet_details){
	     if ($this->db->insert('subbasicworksheet',$subbasicworksheet_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	 	 // This inserts the master worksheet constituents details.
   function addConstituent($constituent_details){
	     if ($this->db->insert('worksheetconstituent',$constituent_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	// This inserts the other constituents details.
   function addOtherConstituent($other_constituent_details){
	     if ($this->db->insert('worksheetconstituent',$other_constituent_details))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }
	   //
	
  
	 function myworksheets($worksheets){
	     if ($this->db->insert('worksheet_pref',$worksheets))
			{ 
			return TRUE;
			}
			else
			{
			return FALSE;
			}
         }

	 // Gets a details for a particular worksheet
	function getSingleWorksheetDetails($id)
	      {
		    $data = array();
			$this->db->select('*');
			$this->db->from('worksheet');
			//$this->db->join('segment','worksheet.segment_type_id=segment.id');
			//$this->db->join('segment_name','worksheet.segment_id=segment_name.id');
			$this->db->where('id', $id);
			$Q = $this->db->get();
			if($Q->num_rows > 0)
			 {
			  foreach($Q->result_array() as $row)
			    {
				$data = $row;
				}
			 }
			 $Q->free_result();
			 return $data;
		   }
     // Gets a details for a particular worksheet
	function getMasterWorksheetDetails($id)
	      {
		    $data = array();
			$this->db->select('*');
			$this->db->from('worksheet');
			$this->db->join('segment','worksheet.segment_type_id=segment.id');
			$this->db->join('segment_name','worksheet.segment_id=segment_name.id');
			$this->db->where('worksheet.id', $id);
			$Q = $this->db->get();
			if($Q->num_rows > 0)
			 {
			  foreach($Q->result_array() as $row)
			    {
				$data = $row;
				}
			 }
			 $Q->free_result();
			 return $data;
		   }
		 // Gets a details for a particular worksheet
	function getSubMasterWorksheetDetails($id)
	      {
		    $data = array();
			$this->db->select('*');
			$this->db->from('worksheet');
			$this->db->join('masterworksheet','worksheet.id=masterworksheet.master_id');
			$this->db->where('masterworksheet.submaster_id',$id);
			
			$Q = $this->db->get();
			if($Q->num_rows > 0)
			 {
			  foreach($Q->result() as $row)
			    {
				$data[] = $row;
				}
			 }
			
			 return $data;
		   }
			 // Gets a details for a particular worksheet
	function getBasicWorksheetDetails($id)
	      {
		    $data = array();
			$this->db->select('*');
			$this->db->from('worksheet');
			$this->db->join('basicworksheet','worksheet.id=basicworksheet.submaster_id');
			$this->db->where('basicworksheet.worksheet_id',$id);
			
			$Q = $this->db->get();
			if($Q->num_rows > 0)
			 {
			  foreach($Q->result() as $row)
			    {
				$data[] = $row;
				}
			 }
			
			 return $data;
		   }
  // Gets a details for a particular worksheet
	function getSubBasicWorksheetDetails($id)
	      {
		    $data = array();
			$this->db->select('*');
			$this->db->from('worksheet');
			$this->db->join('subbasicworksheet','worksheet.id=subbasicworksheet.subbasic_id');
			$this->db->where('subbasicworksheet.worksheet_id',$id);
			
			$Q = $this->db->get();
			if($Q->num_rows > 0)
			 {
			  foreach($Q->result() as $row)
			    {
				$data[] = $row;
				}
			 }
			
			 return $data;
		   }
   		 // Gets a details for a particular basic worksheet(sent)
	function getSBasicWorksheetDetails($id)
	      {
		    $data = array();
			$this->db->select('*');
			$this->db->from('worksheet');
			$this->db->join('worksheetconstituent','worksheet.id=worksheetconstituent.constituent_id');
			$this->db->where('worksheetconstituent.worksheet_id',$id);
			
			$Q = $this->db->get();
			if($Q->num_rows > 0)
			 {
			  foreach($Q->result() as $row)
			    {
				$data[] = $row;
				}
			 }
			
			 return $data;
		   }
		
		
	 // Gets a details for a particular basic worksheet(pulled)
	function getpBasicWorksheetDetails($id)
	      {
		    $data = array();
			$this->db->select('*');
			$this->db->from('worksheet');
			$this->db->join('worksheetconstituent','worksheet.id=worksheetconstituent.worksheet_id');
			$this->db->where('worksheetconstituent.constituent_id',$id);
			
			$Q = $this->db->get();
			if($Q->num_rows > 0)
			 {
			  foreach($Q->result() as $row)
			    {
				$data[] = $row;
				}
			 }
			
			 return $data;
		   }
		
   	// This updates the masterworksheet details.
   function updateWorksheetMaster($id)
      {
       $data = array(
	   'id' => $id,
	   'worksheet_name' => $this->input->post('worksheet_name'),
	   'worksheet_type' => $this->input->post('worksheet_type'),
	   'segment_type_id' => $this->input->post('segment_type_id'),
	   'segment_id' => $this->input->post('segment_id'),
	   'worksheet_obj'  => $this->input->post('worksheet_obj'),
	   'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	  );
	 $this->db->where('id',$id);
     $this->db->update('worksheet',$data);
   }
    
   // This updates the submasterworksheet details.
   function updateWorksheetSubMaster($id)
   {
     $data=array(
	            'id' => $id,
				'worksheet_name' 	  => $this->input->post('worksheet_name'),
				'worksheet_type' => $this->input->post('worksheet_type'),
				'worksheet_obj'  => $this->input->post('worksheet_obj'),
	            'worksheet_scribbles' => $this->input->post('worksheet_scribbles'),
													);
     $this->db->where('id',$id);
     $this->db->update('worksheet',$data);
   }
   
   // This updates the basic details.
   function updateWorksheetBasic($id)
   {
    $data = array(
	'id' => $id,
	'worksheet_name' => $this->input->post('worksheet_name'),
	'worksheet_type' => $this->input->post('worksheet_type'),
	'worksheet_obj'  => $this->input->post('worksheet_obj'),
	'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	);
	  $this->db->where('id',$id);
     $this->db->update('worksheet',$data);
   }
   
    // This updates the basic details.
   function updateWorksheetSubBasic($id)
   {
    $data = array(
	'id' => $id,
	'worksheet_name' => $this->input->post('worksheet_name'),
	'worksheet_type' => $this->input->post('worksheet_type'),
	'worksheet_obj'  => $this->input->post('worksheet_obj'),
	'worksheet_scribbles' => $this->input->post('worksheet_scribbles')
	);
	  $this->db->where('id',$id);
     $this->db->update('worksheet',$data);
   }
    //This deletes the part of master worksheet.
   function deletepartmaster($id){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('id', id_clean($id));
		$this->db->delete('masterworksheet');	
	 }
 //This deletes the part of master worksheet.
   function deletepartsub($id){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('id', id_clean($id));
		$this->db->delete('basicworksheet');	
	 }
	 //This deletes the part ofbasic worksheet.
   function deletepartbasic($id){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('id', id_clean($id));
		$this->db->delete('subbasicworksheet');	
	 }
   //This deletes the worksheet where basic worksheet had been sent.
   function deletesent($id){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('id', id_clean($id));
		$this->db->delete('worksheetconstituent');	
	 }
	 // This deletes the worksheet where basic worksheet is pulled form.
    function deletepull($id){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('id', id_clean($id));
		$this->db->delete('worksheetconstituent');	
	 }
	 
	 function getCand($sbid){
	      $sql = 'SELECT * FROM addtoworksheet1 WHERE constituent_id = "'.$sbid.'" OR constituent_id IS NULL';
		   $Q = $this->db->query($sql);
		   if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row)
		    {
	          $data=$row;
	        }
	      
	      $Q->free_result();  
	      return $data; 
		  }
		  else{
		  return NULL;
		  }
		  }
	 
	//delete my pref worksheet
	 function removeWork1($sbid)
	   {
	     return $this->db->where('id',$sbid)->delete('worksheet');
	      }
	  //
	  
	  //delete my pref worksheet
	 function removeWork2($sbid)
	   {
	    
	    return $this->db->where('worksheet_id',$sbid)->delete('subbasicworksheet');
		
	   }
	  //
	  //delete my pref worksheet
	 function removeWork3($sbid)
	   {
	    
		return $this->db->where('worksheet_id',$sbid)->delete('worksheetconstituent');
	   }
	  //
	   //delete my pref worksheet
	 function removeWork4($sbid)
	   {
	    
		return $this->db->where('constituent_id',$sbid)->delete('worksheetconstituent');
	   }
	  //
	
}

