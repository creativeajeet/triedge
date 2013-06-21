<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Contact Details</h3>
							</div>
							<div class="box-content nopadding">
							<div class="inputform">
<?php echo form_open_multipart('candidates/admin/do_upload');?>
<table width="772">
  

  <tr>
    <td width="144" height="31">Excel Sheet </td>
    <td colspan="4"><input type="file" name="userfile" size="20" /></td>
    <td width="244">&nbsp;</td>
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
    <td width="84">
      <div align="center">
        <input type="text" name="fromC" style="width:50px;"/>
    </div></td>
    <td width="84">
      <div align="center">
        <input type="text" name="toC" style="width:50px;"/>
    </div></td>
    <td width="83"><div align="center">
      <input type="text" name="fromR" style="width:50px;"/>
    </div></td>
    <td width="105">
      <div align="center">
        <input type="text" name="toR" style="width:50px;"/>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26">Import in </td>
    <td colspan="4"><select name="table_name">
      <option value="candidates">Candidates</option>
      <option value="position">Position</option>
	  <option value="segment_name">List Manager</option>
	  <option value="testimport">Test Import</option>
    </select>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td colspan="4"><input name="submit" type="submit" value="upload" class="btn btn-primary" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="6"><h2>Import Excel generated from portals :: </h2></td>
  </tr>
  <tr>
    <td height="28" colspan="5"><table width="100%">
      <tr>
        <td scope="col"><?php echo anchor('candidates/admin/importNaukri/', img('http://software.triedge.in/assets/images/naukri.gif')); ?></td>
        <td scope="col"><?php echo anchor('candidates/admin/importMonster/', img('http://software.triedge.in/assets/images/monster.gif')); ?></td>
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
    <td height="28" colspan="5"><strong>Before importing your excel sheet, plz make sure that the column names, in your excel sheet, are in the following format.</strong> </td>
  </tr>
  <tr>
    <td width="27" height="23">1.</td>
    <td width="769" colspan="4">worksheet1</td>
  </tr>
  <tr>
    <td height="23">2.</td>
    <td colspan="4">worksheet2</td>
  </tr>
  <tr>
    <td height="23">3.</td>
    <td colspan="4">status</td>
  </tr>
  <tr>
    <td height="23">4.</td>
    <td colspan="4">candidate_name</td>
  </tr>
  <tr>
    <td height="23">5.</td>
    <td colspan="4">telephone</td>
  </tr>
  <tr>
    <td height="23">6.</td>
    <td colspan="4">email</td>
  </tr>
  <tr>
    <td height="23">7.</td>
    <td colspan="4">current_location</td>
  </tr>
  <tr>
    <td height="23">8.</td>
    <td colspan="4">region</td>
  </tr>
  <tr>
    <td height="23">9.</td>
    <td colspan="4">current_company</td>
  </tr>
  <tr>
    <td height="23">10.</td>
    <td colspan="4">job_title</td>
  </tr>
  <tr>
    <td height="23">11.</td>
    <td colspan="4">department</td>
  </tr>
  <tr>
    <td height="23">12.</td>
    <td colspan="4">designation</td>
  </tr>
  <tr>
    <td height="23">13.</td>
    <td colspan="4">grade</td>
  </tr>
  <tr>
    <td height="23">14.</td>
    <td colspan="4">level</td>
  </tr>
  <tr>
    <td height="23">15.</td>
    <td colspan="4">salary</td>
  </tr>
  <tr>
    <td height="23">16.</td>
    <td colspan="4">in_current_company_since</td>
  </tr>
  <tr>
    <td height="23">17.</td>
    <td colspan="4">reports_to</td>
  </tr>
  <tr>
    <td height="23">18.</td>
    <td colspan="4">current_role</td>
  </tr>
  <tr>
    <td height="23">19.</td>
    <td colspan="4">industry</td>
  </tr>
  <tr>
    <td height="23">20.</td>
    <td colspan="4">sub_industry</td>
  </tr>
  <tr>
    <td height="23">21.</td>
    <td colspan="4">function</td>
  </tr>
  <tr>
    <td height="23">22.</td>
    <td colspan="4">sub_function</td>
  </tr>
  <tr>
    <td height="23">23.</td>
    <td colspan="4">previous_company</td>
  </tr>
  <tr>
    <td height="23">24.</td>
    <td colspan="4">course</td>
  </tr>
  <tr>
    <td height="23">25.</td>
    <td colspan="4">institute</td>
  </tr>
  <tr>
    <td height="23">26.</td>
    <td colspan="4">year_of_passing</td>
  </tr>
  <tr>
    <td height="23">27.</td>
    <td colspan="4">year_of_birth</td>
  </tr>
  <tr>
    <td height="23">29.</td>
    <td colspan="4">comment</td>
  </tr>
  <tr>
    <td height="23">30.</td>
    <td colspan="4">candidate_code</td>
  </tr>
  <tr>
    <td height="23">31.</td>
    <td colspan="4">attach</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</body>
</html>