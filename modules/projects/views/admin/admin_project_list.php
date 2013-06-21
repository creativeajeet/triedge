<?php print displayStatus();?>

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


$id = $this->uri->segment(4);
echo "<h3><a href=\"../newproject/".$id."\">Enter New Project</a></h3>";

/*
if (count($projects)){
	echo "<table id='tablesorter' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>Project Name</th><th class='middle'>Active</th><th>Actions</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($projects as $key => $list){
		echo "<tr valign='top'>\n";
		echo "<td><a href=\"projectlog/".$list['id']."\" >".$list['project_name']."</a></td>\n";
		$active =  ($list['active']?'tick':'cross');
		echo '<td class="middle">'.$this->bep_assets->icon($active)."</td>";
		echo "<td>";
		echo anchor('projects/admin/update_project/'.$list['id'],$this->bep_assets->icon('pencil','Edit Project'));
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}
*/



if (count($projects)){

            echo "<table class='tablesorter middle' border='1' cellspacing='0' cellpadding='3' width='95%'>\n";
            echo "<thead>\n<tr valign='top'>\n";
            echo "<th class=\"left\" >Task Name</th>\n<th>Files</th>\n";
            echo "</tr>\n</thead>\n<tbody>\n";

            foreach ($projects as $key => $list){
                echo "<tr valign='top'>\n";
                echo "<td class=\"left\" width=\"20%\">".$list['project_name']."</td>\n";
                echo "<td><a href=\"".$list['link']."\" target=\"_blank\">".$this->bep_assets->icon('glyphadd16','Enter Log')."</a></td>\n";
                
                
               
                echo "</td>\n";

                echo "</tr>\n";
            }
            echo "</tbody>\n</table>\n";
        }else{
            echo "There are no projects. Add new project.";
        }


        /*
echo '<br />$name<pre>';
print_r($name);
echo "</pre><br />";

echo '$project<pre>';
print_r($projects);
echo "</pre><br />";
         * 
         */
