<?php print displayStatus();?>
<h2><?php echo $title;?></h2>
<?php

/*
 This is how CI display flash data. but we don't use it.

if ($this->session->flashdata('message')){
	echo "<div class='status_box'>".$this->session->flashdata('message')."</div>";
}
*/

/*
 * $customers returns user_id, company_name
 */


echo "<h3 class=\"projectheading\">User List</h3>
";


if (count($users)){
	echo "<table class='tablesorter middle' border='1' cellspacing='0' cellpadding='3' width='95%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th class=\"left\">User Name</th><th>Show Task List</th><th>Enter New Task</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($users as $key => $list){
		echo "<tr valign='top'>\n";
		echo "<td class=\"left\">".$list."</td>\n";
                //echo "<td><a href=\"../admin/projectlist/".$key."\" >".$this->bep_assets->icon('page_16','Show Project List')."</a></td>\n";

                echo "<td>";
                echo anchor('projects/admin/projectlist/'.$key,$this->bep_assets->icon('page_16','Show Porject List'));
                echo "</td>\n";


                //echo "<td><a href=\"../admin/newproject/".$key."\" >".$this->bep_assets->icon('add_16','Enter New Project')."</a></td>\n";

                echo "<td>";
                echo anchor('projects/admin/newproject/'.$key,$this->bep_assets->icon('buttonadd16','Enter Newhow Porject'));
                echo "</td>\n";


                
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}


            


    /*
echo '$customers<pre>';
print_r($customers);
echo "</pre><br />";

echo '$projects<pre>';
print_r($projects);
echo "</pre><br />";
     * 
     */
