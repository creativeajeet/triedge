<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="<?php echo base_url()?>js/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/vtip.js"></script>

<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/Styles.css" />

<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/basic.css" />
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
<body>
<?php print form_open('companies/admin/newhr/')?>
   <table width="1075" border="1">
  <tr>
    <td width="781"> <table width="781" border="1">
  <tr>
    <td colspan="12"><h2>Contact Details </h2></td>
  </tr>
  <tr>
    <td width="96" height="51">First Name </td>
    <td colspan="3"><?php print form_input('fname','','id="fname" class="text"')?></td>
    <td width="71">Middle Name </td>
    <td colspan="3"><?php print form_input('mname','','id="mname" class="text"')?></td>
    <td colspan="2">Last Name </td>
    <td colspan="2"><?php print form_input('lname','','id="lname" class="text"')?></td>
  </tr>
  <tr>
    <td height="38">Email Type </td>
    <td colspan="3"><select name="select" disabled="disabled">
      <option>Personal</option>
      <option>Official</option>
    </select>    </td>
    <td>Email Id </td>
    <td colspan="3"><input type="text" name="textfield22" disabled="disabled"/></td>
    <td colspan="2">Primary</td>
    <td width="66"><input type="checkbox" name="checkbox" value="checkbox" disabled="disabled"/></td>
    <td width="71"><input type="submit" class="btn btn-primary" name="Submit" value="+" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="37">Phone Type </td>
    <td colspan="3"><select name="select" disabled="disabled">
      <option>Landline-P</option>
	  <option>Landline-O</option>
	  <option>Mobile-P</option>
      <option>Mobile-O</option>
          </select>    </td>
    <td>Phone No. </td>
    <td colspan="3"><input type="text" name="pno" /></td>
    <td colspan="2">Primary</td>
    <td><input type="checkbox" name="checkbox" value="checkbox" disabled="disabled"/></td>
    <td><input type="submit" class="btn btn-primary" name="Submit" value="+" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="41">Address Type </td>
    <td colspan="3"><select name="select2" disabled="disabled">
      <option>Permanent-R</option>
	  <option>Permanent-O</option>
      <option>Correspondence-R</option>
	  <option>Correspondence-O</option>
        </select></td>
    <td>Address</td>
    <td colspan="6"><input name="textfield222" type="text" size="50" disabled="disabled"/></td>
    <td><input type="submit" class="btn btn-primary" name="Submit2" value="+" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="32">Location</td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td>State</td>
    <td colspan="3"><select name="select3" disabled="disabled">
        <option>Maharastra</option>
        <option>Karnataka</option>
    </select></td>
    <td colspan="2">Pin Code </td>
    <td colspan="2"><input type="text" name="textfield32" disabled="disabled"/></td>
  </tr>
  <tr>
    <td>Web Link </td>
    <td colspan="7"><input name="textfield2223" type="text" size="50" disabled="disabled"/></td>
    <td><input type="submit" class="btn btn-primary" name="Submit23" value="+" disabled="disabled"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><h2>Work Exp.  </h2></td>
    <td><h2>
      <input type="submit" class="btn btn-primary" name="Submit224" value="Add More" disabled="disabled"/>
    </h2></td>
    <td colspan="8"><h2>&nbsp;</h2></td>
  </tr>
  <tr>
    <td height="33">Company</td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td>Industry</td>
    <td colspan="3"><select name="select4" disabled="disabled">
      <option>Banking</option>
        </select></td>
    <td colspan="2">Function</td>
    <td colspan="2"><input type="text" name="textfield32" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="53">Job Title </td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td>Work Type </td>
    <td colspan="3"><select name="select3" disabled="disabled">
      <option>Full Time</option>
      <option>Part Time</option>
        </select></td>
    <td colspan="2">Department</td>
    <td colspan="2"><input type="text" name="textfield32" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="42">Location</td>
    <td colspan="3"><select name="select5" disabled="disabled">
      <option>New Delhi</option>
      <option>Mumbai</option>
        </select></td>
    <td>Country</td>
    <td colspan="3"><select name="select6" disabled="disabled">
      <option>India</option>
      <option>Singapore</option>
        </select></td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="34">Duration</td>
    <td width="28">from</td>
    <td width="52"><select name="select7" disabled="disabled">
      <option>10</option>
      <option>11</option>
        </select></td>
    <td width="72"><select name="select8" disabled="disabled">
      <option>2010</option>
      <option>2011</option>
        </select></td>
    <td><div align="center">To</div></td>
    <td width="59"><select name="select9" disabled="disabled">
      <option>10</option>
      <option>11</option>
    </select></td>
    <td width="66"><select name="select19" disabled="disabled">
      <option>2010</option>
      <option>2011</option>
    </select></td>
    <td width="38">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Designation</td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td>Grade</td>
    <td colspan="3"><select name="select3" disabled="disabled">
      <option>A</option>
      <option>B</option>
        </select></td>
    <td colspan="2">Level</td>
    <td colspan="2"><select name="select11" disabled="disabled">
      <option>Sr.</option>
        </select></td>
  </tr>
  <tr>
    <td height="43">Role</td>
    <td colspan="11"><textarea name="textarea" disabled="disabled"></textarea></td>
  </tr>
     <tr>
        <td height="35" colspan="11"><h2>Salary</h2></td>
        <td height="35"><input type="submit" class="btn btn-primary" name="Submit22" value="Add More" disabled="disabled"/></td>
      </tr>
      <tr>
        <td height="34">Year</td>
        <td colspan="2"><select name="select18" disabled="disabled">
          <option>2010</option>
          <option>2011</option>
        </select></td>
        <td>Rating</td>
        <td><input name="textfield43" type="text" size="3" disabled="disabled"/></td>
        <td>High</td>
        <td colspan="2"><input name="textfield432" type="text" size="15" disabled="disabled"/></td>
        <td width="29">&nbsp;</td>
        <td width="57">Low</td>
        <td colspan="2"><input name="textfield4322" type="text" size="15" disabled="disabled"/></td>
      </tr>
      <tr>
        <td height="34">F.sal(PA)</td>
        <td colspan="2"><input name="textfield4323" type="text" size="10" disabled="disabled"/></td>
        <td>V.sal(PA)</td>
        <td><input name="textfield4324" type="text" size="10" disabled="disabled"/></td>
        <td>T.sal(PA)</td>
        <td colspan="2"><input name="textfield432" type="text" size="10" disabled="disabled"/></td>
        <td>&nbsp;</td>
        <td>Currency</td>
        <td colspan="2"><input name="textfield4322" type="text" size="15" disabled="disabled"/></td>
      </tr>
    <tr>
    <td colspan="3"><h2>Academics</h2></td>
    <td><h2><input type="submit" class="btn btn-primary" name="Submit224" value="Add More" disabled="disabled"/></h2></td>
    <td colspan="8"><h2>&nbsp;</h2></td>
    </tr>
  <tr>
    <td height="52">Edu Level</td>
    <td colspan="3"><select name="select15" disabled="disabled">
      <option>PG</option>
      <option>UG</option>
    </select></td>
    <td>Course Type </td>
    <td colspan="3"><select name="select12" disabled="disabled">
      <option>Regular</option>
      <option>PartTime</option>
    </select></td>
    <td colspan="2">Degree/Course</td>
    <td colspan="2"><select name="select16" disabled="disabled">
      <option>B.Tech.</option>
      <option>MBA</option>
    </select></td>
  </tr>
  <tr>
    <td height="52">Subject</td>
    <td colspan="3"><select name="select17" disabled="disabled">
      <option>Computers</option>
      <option>Human Resource</option>
    </select></td>
    <td>Year Of Passing </td>
    <td colspan="3"><select name="select13" disabled="disabled">
      <option>2010</option>
    </select></td>
    <td colspan="2">Percentage</td>
    <td colspan="2"><input type="text" name="textfield32222" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="31">Instt/University</td>
    <td colspan="7"><select name="select14" disabled="disabled">
      <option>Indian Institute of Management, Ahemdabad</option>
      <option>Correspondence</option>
    </select></td>
    <td colspan="2">Rank</td>
    <td><input type="checkbox" name="checkbox2" value="checkbox" disabled="disabled"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Certification</td>
    <td colspan="7"><input name="textfield2222" type="text" size="50" disabled="disabled"/></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="12"><h2>Personal</h2></td>
  </tr>
  <tr>
    <td height="35">Native Place </td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td>Nationality</td>
    <td colspan="3"><select name="select4" disabled="disabled">
      <option>Indian</option>
        </select></td>
    <td colspan="2">DOB</td>
    <td colspan="2"><input type="text" name="textfield32" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="47">Gender</td>
    <td colspan="3"><select name="select5"disabled="disabled">
      <option>Male</option>
      <option>Female</option>
        </select></td>
    <td>Married</td>
    <td colspan="3"><select name="select6" disabled="disabled">
      <option>Yes</option>
      <option>No</option>
        </select></td>
    <td colspan="2">Spouse Name </td>
    <td colspan="2"><input type="text" name="textfield322" disabled="disabled"/></td>
  </tr>
  <tr>
    <td>Wedding Aniversary </td>
    <td colspan="3"><input type="text" name="textfield323" disabled="disabled"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">No. of children </td>
    <td colspan="2"><input type="text" name="textfield3222" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="35" colspan="12"><h2>Additional</h2></td>
  </tr>
  <tr>
    <td height="48">PAN No. </td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td>Blood Group </td>
    <td colspan="3"><select name="select4" disabled="disabled">
        <option>AB</option>
        <option>O</option>
    </select></td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="4"><h6>Emergency Contact </h6></td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="58">Name</td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td>Phone No. </td>
    <td colspan="3"><input type="text" name="textfield42" disabled="disabled"/></td>
    <td colspan="2">Relationship</td>
    <td colspan="2"><input type="text" name="textfield32223" disabled="disabled"/></td>
  </tr>
  <tr>
    <td colspan="12"><li class="submit"> <?php print form_hidden('id','')?>
            <div class="buttons">
              <button type="submit" class="btn btn-primary" class="positive" name="submit" value="submit"> <?php print  $this->bep_assets->icon('disk');?> <?php print $this->lang->line('general_save')?> </button>
            </div>
    </li></td>
    <td colspan="11">&nbsp;</td>
  </tr>
</table></td>
    <td width="12" bgcolor="#999999">&nbsp;</td>
    <td width="558" bgcolor="#999999"><div class="tab_container_right">
	<div id="wrapper1">  <h4><strong> <a href="#" class='green-button pcb'><span>Scribbles</span></a></strong></h4>
      <div style="top: 50px; left: 180.5px; display: none;" class="togglebox2">
        <div class="block">
        <table width="253" height="130">
  <tbody><tr>
    <td colspan="2" scope="col" height="60"><div align="left">
      <form id="form1" name="form1" method="post" action="">
        <label>
          <textarea name="textarea" cols="28" disabled="disabled"></textarea>
          </label>
      </form>
    </div></td>
  </tr>
  
  <tr>
    <td width="99" height="33"><div align="left">
      <select name="select2" disabled="disabled">
        <option selected="selected">::Category::</option>
        <option>Company</option>
        <option>Department</option>
        <option>HR Policy</option>
                        </select>
    </div></td>
    <td width="189"><div align="left">
      <input name="Submit" value="Save" type="submit" class="btn btn-primary"disabled="disabled">
</div></td>
  </tr>
</tbody></table>
        </div>
      </div> <h4><strong> <a href="#" class='green-button pcb'><span>Attachment</span></a></strong></h4>
      <div style="display: none;" class="togglebox2">
        <div class="block1">
          <table width="260">
            <tbody><tr>
              <td height="31"><div align="left"><h6 class="style1"> Type </h6>
              </div></td>
              <td colspan="3" height="31"><div align="left"><span class="style1">
                <select name="select7" disabled="disabled">
                  <option selected="selected">Agreement</option>
                  <option>Company Presentation</option>

                  <option>Organogram</option>
				  <option>Formats</option>
                  <option>Other</option>
                </select>
              </span></div></td>
              <td width="57" height="31">&nbsp;</td>
            </tr>
            <tr>
              <td width="60" height="26"><div align="left">
                <h6 class="style1">File</h6>
              </div></td>
              <td colspan="2"><div align="left"><span class="style1">
                <input name="textfield232" size="13" type="text" disabled="disabled">
              </span></div></td>
              <td colspan="2" height="26"><div align="left"><span class="style1">
                <input name="Submit2322" value="Browse" type="submit" class="btn btn-primary" disabled="disabled">
              </span></div></td>
            </tr>
            <tr>
              <td height="32"><div align="left">
                <h6 class="style1">Primary</h6>
              </div></td>
              <td colspan="2"><div align="left">
                <input name="checkbox" value="checkbox" type="checkbox" disabled="disabled">
              </div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left"><span class="style1">
                <input name="Submit2" value="Attach" type="submit" class="btn btn-primary" disabled="disabled">
              </span></div></td>
              <td colspan="2"><div align="left"><span class="style1">
                <input name="Submit22" value="Add Another" type="submit" class="btn btn-primary" disabled="disabled">
              </span></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5"><div align="left">
                <h6><strong><u>Attached Document </u></strong></h6>
              </div></td>
            </tr>
            <tr>
              <td><form id="form1" name="form1" method="post" action="">
                <div align="left">
                  <input name="checkbox2" value="checkbox" type="checkbox" disabled="disabled">
                </div>
                </form>                </td>
              <td width="87"><a href="#">worddoc.doc</a></td>
              <td width="25"><div align="left">
                <h6 align="left"><strong>P</strong></h6>
              </div></td>
              <td width="62">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="22"><form id="form1" name="form1" method="post" action="">
                <div align="left">
                  <input name="checkbox3" value="checkbox" type="checkbox" disabled="disabled">
                </div>
              </form>                <a href="#"></a></td>
              <td><a href="#">exceldoc.xls</a></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style1">
                <input name="Submit232" value="Remove" type="submit" class="btn btn-primary" disabled="disabled">
              </span></div></td>
              <td>&nbsp;</td>
            </tr>
</tbody></table>
        </div>
      </div>
     </div>
    </div></td>
  </tr>
</table>
        
<?php print form_close()?>      