<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">


	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/master.css" />
	
	

	<style type="text/css">
	
table, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	
	vertical-align: baseline;
}


#tabs {
font-size: 90%;
margin: 2px 0;
}
#tabs ul {
float: left;

width: 600px;

}
#tabs li {

margin-bottom: -20px;
list-style: none;
}
* html #tabs li {
	display: inline; /* ie6 double float margin bug */
	margin-top: -20px;
}
#tabs li,
#tabs li a {
float: left;
}
#tabs ul li a {
text-decoration: none;
padding: 5px;
color: #0073BF;
font-weight: bold;
}
#tabs ul li.active {
background: #CEE1EF url(img/nav-right.gif) no-repeat right top;
}
#tabs ul li.active a {
background: url(img/nav-left.gif) no-repeat left top;
color: #333333;
}
#tabs div {
	background: #CEE1EF;
	clear: both;
	padding: 5px;
	min-height: 100px;
	
}
#tabs div h3 {
text-transform: uppercase;

letter-spacing: 1px;

#tabs div p {
line-height: 150%;
}
-->
</style>
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
	tr, td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>

 
</head>
<body>
<?php $compid = $this->uri->segment(4); ?>
 <?php echo form_open('companies/admin/addScribble/'.$compid.'/');?>
<table width="100%">
  
	<tr>
      <td height="19"><textarea name="comment" cols="90" rows="5" style="background:#CCCCCC"></textarea></td>
    </tr>
	<tr>
      <td width="793">
        <div align="left">
          <input name="add" type="submit" class="btn btn-primary" value="Save" />
        </div></td>
	</tr>
</table>
<br/>
 <h2>Scribbles</h2>
 <?php
 if (count($compcomments)){ 
 echo "<table class='data'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
		echo "<th>Scribbles</th>\n";
	
		echo "<th>On</th>\n";
			echo "<th>By</th>\n";
		echo "</tr>\n</thead>\n<tbody>\n";
 
 foreach ($compcomments as $row){
 
echo "<tr valign='top'>\n";

 echo    "<td>$row->comment</td>";
 echo    "<td>$row->date</td>";
 echo    "<td>$row->username</td>";
 echo  "</tr>";
 }
 echo "</tbody>\n</table>";
 }
 
 else{
  echo 'No comments found'; 
 } 
 ?>

 
</body>
</html>