<?php echo form_open('candidates/admin/dupRemover/'.$pageno); ?>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Candidate List
								</h3>
							</div>
							<div class="box-content nopadding">
<?php
 if (count($results)){ 
 echo "<table id='mainTable' class='scrolltable'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th><div align='center'>Del</div></th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($results as $row){
 
echo "<tr valign='top'>\n";
 echo    "<th><input class='case' name='c_id[]' value='".$row->id."' type='text'>D</th>";
 
  echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>



 <h2></h2>
 <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and Total records found :: <b><?php echo $total; ?></b></p>

</div>
						</div>
					</div>
				</div>

 <?php echo $links; ?><div align="right" style="position:relative"><input type="submit" class="btn btn-primary" name="save" value="Save" /></div>
 
