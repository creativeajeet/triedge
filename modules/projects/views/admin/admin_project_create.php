<?php print displayStatus();?>



<?php

echo form_open('projects/admin/newproject/');
echo "<ul class=\"projectul\">\n";
echo "<li id=\"proname\" class=\"\">\n<label for='project_name'>Project Name</label>\n";
$data = array('name'=>'project_name','id'=>'project_name','size'=>26);
echo "<div>".form_input($data) ."</div></li>\n";

echo "\n<li id=\"hour\" class=\"\" >\n<label for='hour'>Messege at hour</label>\n";
$data = array('name'=>'hour','id'=>'hour','size'=>4);
echo "<div>".form_input($data) ."</div>\n</li>\n";

echo "\n<li id=\"min\" class=\"\" >\n<label for='total_hr'>Messege at min</label>\n";
$data = array('name'=>'min','id'=>'min','size'=>4);
echo "<div>".form_input($data) ."</div>\n</li>\n";

echo "\n<li id=\"link\" class=\"\" >\n<label for='total_hr'>Link</label>\n";
$data = array('name'=>'link','id'=>'link','size'=>40);
echo "<div>".form_input($data) ."</div>\n</li>\n";



echo "<li id=\"noteli\" class=\"\"><label for='note'>Note</label>\n";
$data = array('name'=>'note','id'=>'note');
echo "<div>".form_textarea($data) ."</div>\n</li>\n";


$id = $this->uri->segment(4);
echo "<li>".form_hidden('id',$id)."</li>\n";
$submitdata = array(
    'name'        => 'submit',
    'class'          => 'submit',
    'value'       => 'Create New Project'
    );
echo "<li id=\"submitbtn\" class=\"\">".form_submit($submitdata)."</li>\n</ul>\n";
echo form_close()."\n";

echo "<div class=\"clear\">&nbsp;</div>";


/*
echo "<pre>";
print_r ($name);
echo "</pre>";
 * 
 */

?>



	