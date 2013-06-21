
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    $(function() {
        $.fn.cTable = function(o) {        

            this.wrap('<div class="cTContainer" />');
            this.wrap('<div class="relativeContainer" />');    
            //Update below template as how you have it in orig table
            var origTableTmpl = '<table border="1" cellspacing="1" cellpadding="0" align="center" width="95%" ></table>';            
            //get row 1 and clone it for creating sub tables
            var row1 = this.find('tr').slice(0, o.fRows).clone();

            var r1c1ColSpan = 0;
            for (var i = 0; i < o.fCols; i++ ) {
                r1c1ColSpan += this[0].rows[0].cells[i].colSpan;
            }

            //create table with just r1c1 which is fixed for both scrolls
            var tr1c1 = $(origTableTmpl);
            row1.each(function () {            
                var tdct = 0;
                $(this).find('td').filter( function () {
                    tdct += this.colSpan;
                    return tdct > r1c1ColSpan;
                }).remove();                
            });
            row1.appendTo(tr1c1);
            tr1c1.wrap('<div class="fixedTB" />');
            tr1c1.parent().prependTo(this.closest('.relativeContainer'));

            //create a table with just c1        
            var c1= this.clone().prop({'id': ''});
            c1.find('tr').slice(0, o.fRows).remove();
            c1.find('tr').each(function (idx) {
                var c = 0;
                $(this).find('td').filter(function () {
                    c += this.colSpan;
                    return c > r1c1ColSpan;
                }).remove();           
            });

            var prependRow = row1.first().clone();
            prependRow.find('td').empty();
            c1.prepend(prependRow).wrap('<div class="leftSBWrapper" />')
            c1.parent().wrap('<div class="leftContainer" />');            
            c1.closest('.leftContainer').insertAfter('.fixedTB');

            //create table with just row 1 without col 1
            var r1 = $(origTableTmpl);
            row1 = this.find('tr').slice(0, o.fRows).clone();
            row1.each(function () {
                var tds = $(this).find('td'), tdct = 0;
                tds.filter (function () {
                    tdct += this.colSpan;
                    return tdct <= r1c1ColSpan;
                }).remove();
            });
            row1.appendTo(r1);
            r1.wrap('<div class="topSBWrapper" />')
            r1.parent().wrap('<div class="rightContainer" />')  
            r1.closest('.rightContainer').appendTo('.relativeContainer');

            $('.relativeContainer').css({'width': 'auto', 'height': o.height});

            this.wrap('<div class="SBWrapper"> /')        
            this.parent().appendTo('.rightContainer');    
            this.prop({'width': o.width});    

            var tw = 0;
            //set width and height of rendered tables
            for (var i = 0; i < o.fCols; i++) {
                tw += $(this[0].rows[0].cells[i]).outerWidth(true);
            }
            tr1c1.width(tw);
            c1.width(tw);

            $('.rightContainer').css('left', tr1c1.outerWidth(true));

            for (var i = 0; i < o.fRows; i++) {
                var tr1c1Ht = $(c1[0].rows[i]).outerHeight(true);
                var thisHt = $(this[0].rows[i]).outerHeight(true);
                var finHt = (tr1c1Ht > thisHt)?tr1c1Ht:thisHt;
                $(tr1c1[0].rows[i]).height(finHt);
                $(r1[0].rows[i]).height(finHt);
            }
            $('.leftContainer').css({'top': tr1c1.outerHeight(true), 'width': tr1c1.outerWidth(true)});

            var rtw = $('.relativeContainer').width() - tw;
            $('.rightContainer').css({'width' : rtw, 'height': o.height, 'max-width': o.width - tw});    

            var trs = this.find('tr');
            trs.slice(1, o.fRows).remove();
            trs.slice(0, 1).find('td').empty();
            trs.each(function () {
                var c = 0;
                $(this).find('td').filter(function () {
                    c += this.colSpan;
                    return c <= r1c1ColSpan;
                }).remove();
            });

            r1.width(this.outerWidth(true));

            for (var i = 1; i < c1[0].rows.length; i++) {
                var c1Ht = $(c1[0].rows[i]).outerHeight(true);
                var thisHt = $(this[0].rows[i]).outerHeight(true);
                var finHt = (c1Ht > thisHt)?c1Ht:thisHt;
                $(c1[0].rows[i]).height(finHt);
                $(this[0].rows[i]).height(finHt);
            }

            $('.SBWrapper').css({'height': $('.relativeContainer').height() - $('.topSBWrapper').height()});            

            $('.SBWrapper').scroll(function () {
                var rc = $(this).closest('.relativeContainer');
                var lfW = rc.find('.leftSBWrapper');
                var tpW = rc.find('.topSBWrapper');

                lfW.css('top', ($(this).scrollTop()*-1));
                tpW.css('left', ($(this).scrollLeft()*-1));        
            });

            $(window).resize(function () {
                $('.rightContainer').width(function () {
                    return $(this).closest('.relativeContainer').outerWidth() - $(this).siblings('.leftContainer').outerWidth();
                });

            });
        }

        $('#cTable').cTable({
            width: 3000,
            height: 500,
            fCols: 7,
            fRows: 1
        });
    });
</script>

	<style>
    .cTContainer { overflow: hidden; padding: 2px; }
    .cTContainer table { table-layout: fixed; }
    .relativeContainer { position: relative; overflow: hidden;}    
    .fixedTB { position: absolute; z-index: 11;  }
    .leftContainer { position: absolute; overflow: hidden;  }
    .rightContainer { position: absolute; overflow: hidden;  }
    .leftSBWrapper { position: relative; z-index: 10; }
    .topSBWrapper { position: relative; z-index: 10; width: 100%; }
    .SBWrapper { width: 100%; overflow: auto; }

    td {
	background-color: white;
	overflow: hidden;
	padding: 1px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
}    
   td.heading
   {
	color: #FFFFFF;
	background-color: #666666;
   }

    </style>


<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Duplication Manager
								</h3>
							</div>
							</div>

<?php $pageno = ($this->uri->segment(4))? $this->uri->segment(4) : 0; ?>
<?php echo form_open('candidates/admin/dupRemover/'.$pageno); ?>

<?php
 if (count($results)){ 
 echo "<table width='95%' cellspacing='1' cellpadding='0' align='center' border='1' id='cTable'>\n";

	echo "<tr>\n";
	echo "<td width='2%' class='heading'><div align='center'>Del</div></td>\n";
		echo "<td width='2%' class='heading'><div align='center'>Up</div></td>\n";
		echo "<td width='2%' class='heading'><div align='center'></div></td>\n";
		echo "<td width='7%' class='heading'>Candidate Name</td>\n";
		echo "<td width='1%' class='heading'></td>\n";
		echo "<td width='1%' class='heading'>CV</td>\n";
		echo "<td width='5%' class='heading'><div align='center'>Telephone</div></td>\n";
		echo "<td width='7%' class='heading'>Current Co.</td>\n";
		echo "<td width='3%'class='heading'>Entered On</td>\n";
		echo "<td width='5%'class='heading'>Job Title</td>\n";
		echo "<td width='5%' class='heading'>Email</td>\n";
		echo "<td width='3%' class='heading'>Current Loc.</td>\n";
		echo "<td width='5%' class='heading'>Designation</td>\n";
		echo "<td width='4%' class='heading'>Department</td>\n";
		echo "<td width='2%' class='heading'>Grade</td>\n";
		echo "<td width='2%' class='heading'>Level</td>\n";
		echo "<td width='3%' class='heading'>Salary</td>\n";
		echo "<td width='2%' class='heading'>Since</td>\n";
		echo "<td width='4%' class='heading'>Reports To</td>\n";
		echo "<td width='3%' class='heading'>Current Role</td>\n";
		echo "<td width='4%' class='heading'>Industry</td>\n";
		echo "<td width='4%' class='heading'>Subindustry</td>\n";
		echo "<td width='4%' class='heading'>Function</td>\n";
		echo "<td width='4%' class='heading'>SubFunction</td>\n";
		echo "<td width='4%' class='heading'>Prev.Company</td>\n";
		echo "<td width='6%' class='heading'>Course</td>\n";
	    echo "<td width='3%' class='heading'><div align='center'>Passing Year</div></td>\n";
		echo "<td width='6%' class='heading'>Institute</td>\n";
		echo "<td width='4%' class='heading'>Birth Year</td>\n";
		echo "<td width='7%' class='heading'>Profile Brief</td>\n";
		echo "<td width='7%' class='heading'>Comment</td>\n";
		echo "</tr>\n";
 
 foreach ($results as $row){
 
echo "<tr>\n";
 echo    "<td class='heading'><input class='case' name='cdel_id[]' value='".$row->id."' type='checkbox'>D</td>";
 echo    "<td class='heading'><input class='case' name='cup_id[]' value='".$row->id."' type='hidden'><input class='case' value='".$row->id."' type='checkbox'>U</td>";
 echo    "<td class='heading'><input class='case' name='crem_id[]' value='".$row->id."' type='checkbox'>R</td>";
 echo    "<td class='heading'>$row->candidate_name</td>";
$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $cv_image = "http://software.triedge.in/assets/icons/document16.png";
 echo    "<td>".anchor_popup('candidates/admin/editCandidate/'.$row->id, img('http://software.triedge.in/assets/icons/pencil.png'), $atts)."</td>";

 if(!$row->file_to_view)
 {
  echo "<td></td>";
   }
 else
  {
  echo    "<td><div align='center'>".anchor_popup('candidates/admin/viewcv/'.$row->id, img($cv_image), $atts)."</div></td>";
  } 
   echo    "<td class='heading'><input type='text' name='telephone[]' value='$row->telephone' size='12'/></td>";
    echo    "<td class='heading'><input type='text' name='current_company[]' id='current_company' value='$row->current_company' size='20'/></td>";
   echo    "<td>$row->entered_on</td>";
  echo    "<td><input type='text' name='job_title[]' id='job_title' value='$row->job_title'/></td>";
 echo    "<td><input type='text' name='email[]' id='email' value='$row->email'/></td>";
   echo    "<td><input type='text' name='current_location[]' id='current_location' value='$row->current_location' size='8'/></td>";
echo    "<td><input type='text' name='designation[]' id='designation' value='$row->designation'/></td>";
echo    "<td><input type='text' name='department[]' id='department' value='$row->department' size='15'/></td>";
echo    "<td><input type='text' name='grade[]' id='grade' value='$row->grade' size='4'/></td>";
echo    "<td><input type='text' name='level[]' id='level' value='$row->level' size='4'/></td>";
echo    "<td><input type='text' name='salary[]' id='salary' value='$row->salary' size='9'/></td>";
 echo    "<td><input type='text' name='in_current_company_since[]' id='in_current_company_since' value='$row->in_current_company_since' size='4'/></td>";
  echo    "<td><input type='text' name='reports_to[]' id='reports_to' value='$row->reports_to' size='12'/></td>";
   echo    "<td><input type='text' name='current_role[]' id='current_role' value='$row->current_role' size='9'/></td>";
    echo    "<td><input type='text' name='industry[]' id='industry' value='$row->industry' size='12'/></td>";
	 echo    "<td><input type='text' name='sub_industry[]' id='sub_industry' value='$row->sub_industry' size='12'/></td>";
	  echo    "<td><input type='text' name='indfunction[]' id='indfunction' value='$row->indfunction' size='12'/></td>";
	   echo    "<td><input type='text' name='sub_function[]' id='sub_function' value='$row->sub_function' size='12'/></td>";
	    echo    "<td><input type='text' name='previous_company[]' id='previous_company' value='$row->previous_company' size='12'/></td>";

 echo    "<td><input type='text' name='course[]' id='course' value='$row->course'/></td>";
  echo    "<td><input type='text' name='year_of_passing[]' id='year_of_passing' value='$row->year_of_passing' size='5'/></td>";
echo    "<td><input type='text' name='institute[]' id='institute' value='$row->institute'/></td>";
echo    "<td><input type='text' name='year_of_birth[]' id='year_of_birth' value='$row->year_of_birth' size='10'/></td>";
echo    "<td><textarea name='profile_brief[]'>$row->profile_brief</textarea></td>";
echo    "<td><textarea name='comment[]'>$row->comment</textarea></td>";
 
  echo  "</tr>";
 }
 echo "</table>";
 }
 
 else{
  echo 'No records found'; 
 } 
 ?>
</div>
						</div>
					</div>
				</div>
 <?php echo $links; ?><div align="left" style="position:relative">Jump to page no.<input type="text" name="jump" size="6" /><input type="submit" class="btn btn-primary" name="go" value="GO" /></div><div align="right" style="position:relative; margin-top:-10px; margin-bottom:20px;"><input type="submit" class="btn btn-primary" name="save" value="Done" /></div>

