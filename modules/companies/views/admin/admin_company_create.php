
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="<?php echo base_url()?>js/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/vtip.js"></script>

<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style><style type="text/css">
       #codeTextarea{
          width:500px;
         
       }
       .textAreaWithLines{
          font-family:courier;      
          border:1px solid #000;
          
       }
       .textAreaWithLines textarea,.textAreaWithLines div{
          border:0px;
          line-height:120%;
          font-size:12px;
       }
       .lineObj{
          color:red;
       }
       </style>
	    <script type="text/javascript">
       
       var lineObjOffsetTop = 2;
       
       function createTextAreaWithLines(id)
       {
          var el = document.createElement('DIV');
          var ta = document.getElementById(id);
          ta.parentNode.insertBefore(el,ta);
          el.appendChild(ta);
          
          el.className='textAreaWithLines';
          el.style.width = (ta.offsetWidth + 30) + 'px';
          ta.style.position = 'absolute';
          ta.style.left = '30px';
          el.style.height = (ta.offsetHeight + 2) + 'px';
          el.style.overflow='hidden';
          el.style.position = 'relative';
          el.style.width = (ta.offsetWidth + 30) + 'px';
          var lineObj = document.createElement('DIV');
          lineObj.style.position = 'absolute';
          lineObj.style.top = lineObjOffsetTop + 'px';
          lineObj.style.left = '0px';
          lineObj.style.width = '27px';
          el.insertBefore(lineObj,ta);
          lineObj.style.textAlign = 'right';
          lineObj.className='lineObj';
          var string = '';
          for(var no=1;no<200;no++){
             if(string.length>0)string = string + '<br>';
             string = string + no;
          }
          
          ta.onkeydown = function() { positionLineObj(lineObj,ta); };
          ta.onmousedown = function() { positionLineObj(lineObj,ta); };
          ta.onscroll = function() { positionLineObj(lineObj,ta); };
          ta.onblur = function() { positionLineObj(lineObj,ta); };
          ta.onfocus = function() { positionLineObj(lineObj,ta); };
          ta.onmouseover = function() { positionLineObj(lineObj,ta); };
          lineObj.innerHTML = string;
          
       }
       
       function positionLineObj(obj,ta)
       {
          obj.style.top = (ta.scrollTop * -1 + lineObjOffsetTop) + 'px';   
       
          
       }
       
       </script>
<SCRIPT language="javascript">
    function add() {
      var clone=document.getElementById("container_block").cloneNode(true);
      clone.setAttribute('id','newid');

	  var foo = document.getElementById("container");
	  foo.appendChild(clone);   
	}

	function deleteNode(n){
     n.parentNode.parentNode.removeChild(n.parentNode);
	}
  </SCRIPT>
<body><br/>
<?php

echo form_open('companies/admin/newcompany/'); ?>


 <table width="1032" border="1">
  <tr>
    <td width="764"><table width="764" border="1" bordercolor="#ECE9D8">
  <tr>
    <td colspan="11"><h2>Company/Institute Details </h2></td>
  </tr>
  <tr>
    <td width="105" height="38">Company/Institute Name </td>
    <td colspan="8"><?php print form_input('comp','','id="comp" class="text" size="57" style="background-color:#99CCFF"')?></td>
    <td>Type</td>
    <td><select name="type" style="width:145px; background-color:#99CCFF">
	    <option value="">Select</option>
		<option>Company</option>
		<option>Institute</option>
        </select></td>
    </tr>
  <tr>
    <td height="37">Client</td>
    <td colspan="3">
   
  
	<?php print form_checkbox('client','1',$this->validation->set_radio('client','1'),'id="client" ')?></td>
    <td colspan="2">Agreement With </td>
    <td colspan="3"><select name="agmwith" style="width:145px; background-color:#99CCFF">
      <option>Resouce Angle</option>
      <option>Mirus</option>
          </select></td>
    <td>Target Company </td>
    <td><input type="checkbox" name="checkbox4" value="checkbox" disabled="disabled"/></td>
  </tr>
  <tr>
    <td height="48">Other Group Companies </td>
    <td colspan="8"><input name="textfield22232" type="text" size="50" disabled="disabled"/></td>
    <td><input type="submit" class="btn btn-primary" name="Submit3" value="+" disabled="disabled"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">Web Link </td>
    <td colspan="8"><input name="textfield22232" type="text" size="50" disabled="disabled"/></td>
    <td><input type="submit" class="btn btn-primary" name="Submit34" value="+" disabled="disabled"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38" colspan="9"><h6>Head Office</h6> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="37">Location</td>
    <td colspan="3"><select name="select" style="width:145px" disabled="disabled">
        <option>Mumbai</option>
        <option>Banglore</option>
    </select></td>
    <td colspan="2">State</td>
    <td colspan="3"><select name="select6" style="width:145px" disabled="disabled">
      <option>Karnataka</option>
        </select></td>
    <td>Country</td>
    <td><select name="select3" style="width:145px" disabled="disabled">
      <option>India</option>
      <option>Singapore</option>
    </select></td>
  </tr>
  <tr>
    <td height="32">Industry</td>
    <td colspan="3"><select name="select" style="width:145px" disabled="disabled">
      <option>Banking</option>
        </select></td>
    <td colspan="2">Sub-Industry</td>
    <td colspan="3"><select name="select2" style="width:145px" disabled="disabled">
      <option>Banking</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Synopsis</td>
    <td colspan="10"><textarea name="textarea" cols="75" disabled="disabled"></textarea></td>
    </tr>
  <tr>
    <td colspan="3"><h2>Department</h2></td>
    <td width="78"><h2>
      <input type="submit" class="btn btn-primary" name="Submit224" value="Add More" disabled="disabled"/>
    </h2></td>
    <td colspan="7"><h2>&nbsp;</h2></td>
  </tr>
  <tr>
    <td height="38">SBU/Department</td>
    <td colspan="8"><input name="textfield22232" type="text" size="50" disabled="disabled"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">is a division of </td>
    <td colspan="8"><input name="textfield22232" type="text" size="50" disabled="disabled"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50">has the following division </td>
    <td colspan="8"><input name="textfield22232" type="text" size="50" disabled="disabled"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Acronym</td>
    <td colspan="3"><input type="text" name="textfield4" disabled="disabled"/></td>
    <td colspan="2"><div align="center">Full Form </div></td>
    <td colspan="5"><input name="textfield44" type="text" size="40" disabled="disabled"/></td>
    </tr>
  <tr>
    <td height="33">Department Head </td>
    <td colspan="3"><input type="text" name="textfield45" disabled="disabled"/></td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Location</td>
    <td colspan="3"><select name="select7" style="width:145px" disabled="disabled">
      <option>Mumbai</option>
      <option>Banglore</option>
    </select></td>
    <td colspan="2"><input type="submit" class="btn btn-primary" name="Submit32" value="+" disabled="disabled"/></td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Team Size </td>
    <td colspan="3"><input type="text" name="textfield452" disabled="disabled"/></td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Industry Tag </td>
    <td colspan="3"><input type="text" name="textfield4522" disabled="disabled"/></td>
    <td colspan="2"><input type="submit" class="btn btn-primary" name="Submit32" value="+" disabled="disabled"/></td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Function Tag </td>
    <td colspan="3"><input type="text" name="textfield4522" disabled="disabled"/></td>
    <td colspan="2"><input type="submit" class="btn btn-primary" name="Submit32" value="+" disabled="disabled"/></td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Department Synopsis</td>
    <td colspan="10"><textarea name="textarea3" disabled="disabled"></textarea></td>
  </tr>
  
      <tr>
        <td height="35" colspan="11"><h2>Other Details </h2></td>
      </tr>
      <tr>
        <td height="34" colspan="2"><h6>Rating Grid </h6> </td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td width="58">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td width="86">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">&nbsp;</td>
        <td colspan="3"><div align="center">Rating</div></td>
        <td colspan="2">&nbsp;</td>
        <td colspan="3"><div align="center">Narration</div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">&nbsp;</td>
        <td colspan="3"><div align="center">
          <input type="text" name="textfield4" disabled="disabled"/>
        </div></td>
        <td colspan="2">Highest</td>
        <td colspan="3"><div align="center">
          <input type="text" name="textfield44" disabled="disabled"/>
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">&nbsp;</td>
        <td colspan="3"><div align="center">
          <input type="text" name="textfield4" disabled="disabled"/>
        </div></td>
        <td colspan="2"><input type="submit" class="btn btn-primary" name="Submit322" value="+" disabled="disabled"/></td>
        <td colspan="3"><div align="center">
          <input type="text" name="textfield44" disabled="disabled"/>
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">&nbsp;</td>
        <td colspan="3"><div align="center">
          <input type="text" name="textfield4" disabled="disabled"/>
        </div></td>
        <td colspan="2">Lowest</td>
        <td colspan="3"><div align="center">
          <input type="text" name="textfield44" disabled="disabled"/>
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="26" colspan="10"><h2>&nbsp;</h2></td>
        <td width="160" height="26">&nbsp;</td>
      </tr>
    <tr bordercolor="#003366">
    <td height="26" colspan="10"><h6>Education-Designation-Grade-Salary</h6></td>
    <td height="26">&nbsp;</td>
    </tr>
  
    <tr bgcolor="#CCCCCC">
      <td height="28"><div align="center"><h6>Grade</h6></div></td>
      <td><div align="center"><h6>Designation</h6></div></td>
      <td colspan="4"><div align="center"><h6>Education</h6></div></td>
      <td colspan="2"><div align="center"><h6>Salary Range</h6> </div></td>
      <td colspan="2"><div align="center">
        <h6>Comments</h6>
      </div></td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#CCCCCC">
      <td>&nbsp;</td>
      <td width="58">&nbsp;</td>
      <td colspan="2"><div align="center">
        <p>Education Level </p>
      </div></td>
      <td colspan="2"><p align="center">Exp. Range(in years) </p>      </td>
      <td colspan="2"><div align="center">
        <p>(in lacs per year) </p>
        </div></td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td width="52"><div align="center">from</div></td>
      <td width="13"><div align="center">to</div></td>
      <td><div align="center">from</div></td>
      <td><div align="center">to</div></td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32"><div align="center">
          <input name="gradeRow1" type="text" size="8" disabled="disabled" />
      </div></td>
      <td><div align="center">
          <input name="desigRow1" type="text" size="8" disabled="disabled"/>
      </div></td>
      <td colspan="2"><div align="center">
          <select name="selRow0" disabled="disabled">
            <option value="value0">PG</option>
            <option value="value1">UG</option>
          </select>
      </div></td>
      <td><div align="center">
          <input name="exfRow1" type="text" size="2" disabled="disabled"/>
      </div></td>
      <td><div align="center">
          <input name="extRow1" type="text" size="2" disabled="disabled" onkeypress="keyPressTest(event, this);"/>
      </div></td>
      <td><div align="center">
          <input name="salfRow1" type="text" size="2" disabled="disabled" onkeypress="keyPressTest(event, this);"/>
      </div></td>
      <td><div align="center">
          <input name="saltRow1" type="text" size="2" disabled="disabled" onkeypress="keyPressTest(event, this);"/>
      </div></td>
      <td colspan="2"><div align="center">
        <input type="text" name="comRow1" disabled="disabled" onkeypress="keyPressTest(event, this);"/>
      </div></td>
      <td><input type="button" value="Add" onclick="addRowToTable();" /></td>
    </tr>
    <tr>
    <td colspan="11"><h2>Important Dates</h2></td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">Months</div></td>
    <td colspan="2">&nbsp;</td>
    <td><div align="center">Months</div></td>
    <td width="34">&nbsp;</td>
    <td width="45">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="54">Performance Cycle </td>
    <td><div align="center">from</div></td>
    <td colspan="2"><div align="center">
      <input name="textfield4332252" type="text" size="8" disabled="disabled"/>
    </div></td>
    <td colspan="2"><div align="center">To</div></td>
    <td><div align="center">
      <input name="textfield4332253" type="text" size="8" disabled="disabled"/>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">Months</div></td>
    <td colspan="2">&nbsp;</td>
    <td><div align="center">Months</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="43">Appraisal Date </td>
    <td><div align="center">Annual</div></td>
    <td colspan="2"><div align="center">
        <input name="textfield4332252" type="text" size="8" disabled="disabled"/>
    </div></td>
    <td colspan="2"><div align="center">Mid Year </div></td>
    <td><div align="center">
        <input name="textfield4332253" type="text" size="8" disabled="disabled"/>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td colspan="3"><div align="center">Months</div></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35">Bonus Payment </td>
    <td colspan="3"><input type="text" name="textfield43" disabled="disabled"/></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35">Notice Period </td>
    <td colspan="3"><input type="text" name="textfield43" disabled="disabled"/></td>
    <td colspan="2">months</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35">Probation Period </td>
    <td colspan="3"><input type="text" name="textfield43" disabled="disabled"/></td>
    <td colspan="2">months</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="55">Policy Features </td>
    <td colspan="8"><input name="textfield22232" type="text" size="50" disabled="disabled"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35" colspan="11"><h2>Client Terms</h2></td>
  </tr>
  <tr>
    <td height="32">Start Date </td>
    <td colspan="3"><?php print form_input('start','','id="start" class="text" size="8" style="background-color:#99CCFF"')?></td>
    <td colspan="2">End Date </td>
    <td colspan="3"><?php print form_input('end','Open Agreement','id="end" class="text" size="8" style="background-color:#99CCFF"')?></td>
    <td>Agreement Received </td>
    <td><?php print form_checkbox('agmrcvd','1')?></td>
  </tr>
  <tr>
    <td height="23" colspan="2">Agreement Status </td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="9"><textarea name="agmstatus" cols="60" rows="2" wrap="hard" style="background-color:#99CCFF"></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr >
        <td height="114" colspan="11"><p>
<input type="button" value="Add More" onclick="add();" />
        </p>
        <table width="653"> 

   <tr bgcolor="#CCCCCC">
    <th width="71"><div align="center">
      <h6>Grade</h6>
    </div></th>
    <th width="86"><div align="center">
      <h6>Designation</h6>
    </div></th>
    <th width="62"><div align="center">
      <h6>Rate (in %) </h6>
    </div></th>
    <th width="127"><div align="center">
      <h6>Calculated On </h6>
    </div></th>
    <th width="96"><div align="center">
      <h6>Component Included </h6>
    </div></th>
    <th width="99"><div align="center">
      <h6>Component Excluded </h6>
    </div></th>
    <th width="80">&nbsp;</th>
   </tr>
 </table>
  <table width="667" border="1" id="tblSample">

  
  <div name="container" id="container">
   
 <div name="container_block" id="container_block">
 <input name="grade[]" id="grade[]" type="text" size="8" style="background-color:#99CCFF" /> 
  <input name="desig[]" id="desig[]" type="text" size="10" style="background-color:#99CCFF">	
   <input name="rate[]" id="rate[]" type="text" size="8" style="background-color:#99CCFF"/>
   <input name="cal[]" id="cal[]" type="text" size="15" style="background-color:#99CCFF"/>
   <input name="comi[]" id="comi[]" type="text" size="15" style="background-color:#99CCFF"/>
   <input name="come[]" id="come[]" type="text" size="15" style="background-color:#99CCFF"/>
   <input type="button" value="X" onclick="deleteNode(this);" />
</div>
 </div>
</table></td>
  </tr>
  
  <tr>
    <td height="32" colspan="9">Additional Terms </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="11"><textarea name="additional" cols="90" id="codeTextarea" style="background-color:#99CCFF"></textarea> <script type="text/javascript">
       createTextAreaWithLines('codeTextarea');
       </script></td>
    </tr>
  <tr>
    <td height="30" colspan="11">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="11"><h2>&nbsp;</h2></td>
  </tr>
  <tr>
    <td colspan="11"><li class="submit"> <?php print form_hidden('id','')?>
            <div class="buttons">
              <button type="submit" class="btn btn-primary" class="positive" name="submit" value="submit"> <?php print  $this->bep_assets->icon('disk');?> <?php print $this->lang->line('general_save')?> </button>
            </div>
    </li></td>
  </tr>
  <tr>
    <td height="30" colspan="11"><h2>&nbsp;</h2></td>
  </tr>
  <tr>
    <td height="35" colspan="11"><h3><a href="../admin/newhr">HR Manager</a></h3></td>
  </tr>
  <tr>
    <td height="35" colspan="11"><h2>&nbsp;</h2></td>
  </tr>
</table></td>
    <td width="8" bgcolor="#999999">&nbsp;</td>
    <td width="238" bgcolor="#999999"><div class="tab_container_right">
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
        <option selected="selected" >::Category::</option>
        <option>Company</option>
        <option>Department</option>
        <option>HR Policy</option>
                        </select>
    </div></td>
    <td width="189"><div align="left">
      <input name="Submit" value="Save" type="submit" class="btn btn-primary" disabled="disabled">
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
              <td width="87"><a href="#" disabled="disabled">worddoc.doc</a></td>
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
              <td><a href="#" disabled="disabled">exceldoc.xls</a></td>
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



	