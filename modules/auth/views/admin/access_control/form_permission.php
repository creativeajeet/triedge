<?php print form_open('auth/admin/acl_permissions/save')?>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									<?php print $header?>
								</h3>
							</div>
							<div class="box-content nopadding">
<table class="table table-nomargin table-bordered">
    <tr>
        <td width="33%"><b><?php print $this->lang->line('access_groups')?></b></td>
        <td width="33%"><b><?php print $this->lang->line('access_resources')?></b></td>
        <td width="33%"><b><?php print $this->lang->line('access_actions')?></b></td>
    </tr>
    <tr>
        <td>
        	<?php
        		// Show regions as readonly?
        		$readonly = ($_POST['id'] == NULL)?'':' readonly';
        	?>
	        <div class="scrollable_tree<?php print $readonly?>"><ul id="groups"><?php print $this->access_control_model->buildGroupSelector(($_POST['id']!=NULL))?></ul></div>
			</td>
			<td>
			<div class="scrollable_tree<?php print $readonly?>"><ul id="resources"><?php print $this->access_control_model->buildResourceSelector(($_POST['id']!=NULL))?></ul></div>
			</td>
			<td>
			<div class="scrollable_tree"><?php print $this->access_control_model->buildActionSelector()?></div>
        </td>
    </tr>
    <tr>

        <td colspan="3">
            <b><?php print $this->lang->line('access')?>:</b><br/>
            <?php print form_radio('allow','Y',set_radio('allow','Y',$selected = ($this->form_validation->allow == 'Y') ? TRUE : FALSE)) . $this->lang->line('access_allow')?>
            <?php print form_radio('allow','N',set_radio('allow','N',$selected = ($this->form_validation->allow == 'N') ? TRUE : FALSE)) . $this->lang->line('access_deny')?>
        </td>
    </tr>
</table>
<?php print form_hidden('id',$this->form_validation->id)?>
<div class="form-actions">
									 <?php print form_hidden('id',set_value('id',$this->form_validation->id))?>
										<button type="submit" class="btn btn-primary" class="btn btn-primary" class="positive" name="submit" value="submit"><?php print $this->lang->line('general_save')?></button>
										<button type="button" class="btn">Cancel</button>
									</div>
</div>
						</div>
					</div>
				</div>

<?php print form_close()?>