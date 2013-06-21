<?php echo form_open('dupmanager/admin/insertCandidate/');?>
<?php
 if (count($results)){ 
 foreach ($results as $row){
 
 echo    "<input class='case' name='c_id[]' value='".$row->id."' type='hidden'>$row->id";
 
  
 }
} 
 
 else{
  echo 'No records found'; 
 } 
 ?>

<input type="submit" class="btn btn-primary" name="save" value="Save" /></div>
 
