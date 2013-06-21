<h2><?php print $header?></h2>

<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i><?php print $header?></h3>
							</div>
							<div class="box-content nopadding">
								<?php print form_open('auth/admin/acl_groups/form/'.$this->form_validation->id,array('class'=>'form-horizontal form-bordered'))?>
									<div class="control-group">
										<label for="textfield" class="control-label"> <?php print form_label($this->lang->line('access_name'),'name')?></label>
										<div class="controls">
											<?php print form_input('name',$this->form_validation->name,'class="text"')?>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label"><?php print form_label($this->lang->line('access_disabled'),'disabled')?></label>
										<div class="controls">
											  Yes <?php print form_radio('disabled','1',set_radio('disabled','1',$selected = ($this->form_validation->disabled == '1') ? TRUE : FALSE))?>
                No <?php print form_radio('disabled','0',set_radio('disabled','0',$selected = ($this->form_validation->disabled == '0') ? TRUE : FALSE))?>
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label"><?php print form_label($this->lang->line('access_parent_name'),'parent')?></label>
										<div class="controls">
										<?php print form_dropdown('parent',$groups,$this->form_validation->parent,'size=10 style="width:20.3em;"')?>
										</div>
									</div>
									
									<div class="form-actions">
									 <?php print form_hidden('id',set_value('id',$this->form_validation->id))?>
										<button type="submit" class="btn btn-primary" class="btn btn-primary" class="positive" name="submit" value="submit"><?php print $this->lang->line('general_save')?></button>
										<button type="button" class="btn">Cancel</button>
									</div>
								<?php print form_close()?>
							</div>
						</div>
					</div>
				</div>