<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
	th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	tr,td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>
	<?php $worksheet = $this->uri->segment(4); ?>	
<?php echo form_open('candidates/admin/createTags/'.$worksheet); ?>

	<?php if (count($currenttags)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Current Tags</th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 echo "<tr valign='top'><td>\n";
 foreach ($currenttags as $row){
 

echo    form_checkbox('tagid',$row->tagw_id).$row->tag_name;
 
 }
  echo  "</td></tr>";
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 	<?php if (count($suggestedtags)){ 
 echo "<table>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Suggested Tags</th>\n";
			echo "</tr>\n</thead>\n<tbody>\n";
 echo "<tr valign='top'><td>\n";
 foreach ($suggestedtags as $row){
 

echo    "<input name='suggestedtags[]' value='".$row->t_id."' type='checkbox'>".$row->tag_name;
 
 }
  echo  "</td></tr>";
  echo '<tr><td><div align="right"><input type="submit" class="btn btn-primary" name="addTags" value="Add" /></div></td></tr>';
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
 <h2></h2>
 <?php 
 $atts1 = array(
              'width'      => '300',
              'height'     => '760',
              'scrollbars' => 'yes',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '350',
              'screeny'    => '80'
            );
			?>
 <div align="right"><?php echo anchor_popup('candidates/admin/tagsummary','Tag Summary',$atts1); ?></div>
 <br/>
 <table>
	<thead>
	<tr>
		<th colspan="2">Create Tags</th>
		</tr></thead><tbody>
		<tr>
		<td><input type="text" name="newtag" size="20"/>
		</td>
		<td><div align="right"><input type="submit" class="btn btn-primary" name="createtag" value="Create" /></div>
		</td>
		</tr>
		</tbody>
		</table>