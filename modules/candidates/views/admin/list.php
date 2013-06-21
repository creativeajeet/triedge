<table id="example" class="display" border="1" cellspacing="0" cellpadding="3" width="200px"> 
<thead>
<tr >
 <th>No</th>
 <th>Date</th>
 <th>Name</th>
 <th>Amount</th>
 <th>Edit</th>
 <th>Delete</th>
 </tr>
 </thead>
 <?php
 $i=0;
 foreach ($query as $row){
 $i++;
 echo "<tr class=\"record\">";
 echo    "<td>".form_checkbox('c_id[]',$i,FALSE)."</td>";
 echo    "<td>$row->fname</td>";
 echo    "<td>$row->lname</td>";
 echo    "<td>$row->rank</td>";
 echo    "<td><a href=\"#\" class=\"edit\" id=\"$row->id\" fname=\"$row->fname\" lname=\"$row->lname\" rank=\"$row->rank\">Edit</a></td>";
 echo    "<td><a class=\"delbutton\" id=\"$row->id\" href=\"#\" >Delete</a></td>";
 echo  "</tr>";
 }
 ?>
</table>