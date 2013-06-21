<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<body>
<?php echo form_open_multipart('candidates/admin/do_uploadMonster');?>
<table width="772" border="1">
  
<tr>
    <td height="31" colspan="5"><img src="<?php echo base_url(); ?>assets/images/monster.gif"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="106" height="31">Excel Sheet </td>
    <td colspan="4"><input type="file" name="userfile" size="20" /></td>
    <td width="401">&nbsp;</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td><div align="center">StartCol</div></td>
    <td><div align="center">EndCol</div></td>
    <td><div align="center">StartRow</div></td>
    <td><div align="center">EndRow</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26">Heading coumn </td>
    <td width="62">
      <div align="center">
        <input type="text" name="fromC" size="2"/>
      </div></td>
    <td width="52">
      <div align="center">
        <input type="text" name="toC" size="2"/>
      </div></td>
    <td width="58"><div align="center">
      <input type="text" name="fromR" size="2"/>
    </div></td>
    <td width="53">
      <div align="center">
        <input type="text" name="toR" size="2"/>
      </div></td>
    <td><input name="submit" type="submit" class="btn btn-primary" value="Import" /></td>
  </tr>
  
  <tr>
    <td height="28">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="6"><h2>Import Excel generated from portals :: </h2></td>
  </tr>
  <tr>
    <td height="28" colspan="5"><table width="100%">
      <tr>
        <td scope="col"><?php echo anchor('candidates/admin/importNaukri/', img('http://localhost/uploadapp/assets/images/naukri.gif')); ?></td>
        <td scope="col"><?php echo anchor('candidates/admin/importMonster/', img('http://localhost/uploadapp/assets/images/monster.gif')); ?></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="6"><h2></h2></td>
  </tr>
</table>
<table width="812" border="1">
 
  <tr>
    <td height="28" colspan="5"><strong>Before importing your excel sheet, plz make sure that the column names, in your excel sheet, are in the following order.</strong> </td>
  </tr>
  <tr>
    <td width="27" height="23">A.</td>
    <td width="769" colspan="4">Name</td>
  </tr>
  <tr>
    <td height="23">B.</td>
    <td colspan="4">Date of Birth</td>
  </tr>
  <tr>
    <td height="23">C.</td>
    <td colspan="4">Resume Title</td>
  </tr>
  <tr>
    <td height="23">D.</td>
    <td colspan="4">Education</td>
  </tr>
  <tr>
    <td height="23">E.</td>
    <td colspan="4">Exp. (Yrs)</td>
  </tr>
  <tr>
    <td height="23">F.</td>
    <td colspan="4">Employers</td>
  </tr>
  <tr>
    <td height="23">G.</td>
    <td colspan="4">Current Location</td>
  </tr>
  <tr>
    <td height="23">H.</td>
    <td colspan="4">Roles</td>
  </tr>
  <tr>
    <td height="23">I.</td>
    <td colspan="4">Industry</td>
  </tr>
  <tr>
    <td height="23">J.</td>
    <td colspan="4">Email</td>
  </tr>
  <tr>
    <td height="23">K.</td>
    <td colspan="4">Mobile</td>
  </tr>
  <tr>
    <td height="23">L.</td>
    <td colspan="4">Current Annual Salary (Rs. in Lacs)</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="28">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</body>
</html>