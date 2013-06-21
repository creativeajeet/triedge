<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MWorksheet extends Base_model{

	function MWorksheet(){
		parent::Base_model();
		$this->_TABLES = array( 'worksheet' => 'worksheet'
                                    );
	}
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
		$this->db->from('worksheet');
		$this->db->join('masterworksheet', 'worksheet.id=masterworksheet.submaster_id');
		$this->db->where_in('masterworksheet.master_id',$masterworksheet_id);
		
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
		$this->db->from('worksheet');
		$this->db->join('masterworksheet', 'worksheet.id=masterworksheet.submaster_id');
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
		$this->db->from('worksheet');
		$this->db->join('masterworksheet', 'worksheet.id=masterworksheet.submaster_id');
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
   function addtoMassterworksheet($masterworksheet_details){
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
	



	
}

