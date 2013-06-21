<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Dashboard</title>
<style type="text/css">
<!--

.tab_container_can {
	border: 1px solid #999;
	border-top: none;
	clear: both;
	float: none;
	width: 100%;
	font-size:10px;
	color:#243953;
	background-color:#fafafa;
	border: 1px solid #a9a9a9;
	-moz-border-radius: 5px;
    -webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	text-align:left;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	height: 150px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	padding-top: 2px;
	padding-right: 1px;
	padding-bottom: 2px;
	padding-left: 5px;
	
}

-->
</style>
<div class='tab_container_can'>
<?php echo "<h1 class='style5'>".$this->session->userdata('username')."</h1>"; ?>
</div>
<?php

if (count($customer_records)){
	echo "<table id='tablesorter' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>Task Name</th><th>Note</th><th>Link</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($customer_records as $list){
		// print_r ($total);
		echo "<tr valign='top'>\n";
		echo "<td align='center'>".$list['project_name']."</td>\n";
		echo "<td>".$list['note']."</td>\n";
		echo "<td><a href=\"".$list['link']."\" target=\"_blank\">".$list['link']."</a></td>\n";
			
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
	
}
?>
<script type="text/javascript">
function breakTime(){ // <<< do not edit or remove this line!
/* Set Break Hour in 24hr Notation */
var breakHour=<?php echo $list['hour']; ?>
/* Set Break Minute */
var breakMinute=<?php echo $list['min']; ?>
/* Set Break Message */
var breakMessage="<?php echo $list['note']; ?>"
///////////////////No Need to Edit//////////////
var theDate=new Date()
if (Math.abs(theDate.getHours())==breakHour&&Math.abs(theDate.getMinutes())==breakMinute){
this.focus();
clearInterval(breakInt)
if(confirm(breakMessage)){
       window.location.href = "<?php echo $list['link']; ?>";
   }
   else{
   setTimeout("breakTime()",1800000)
}
}
var breakInt=setInterval("breakTime()",58000)
</script>
</body></html>