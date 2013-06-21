<h2><?php print $header?></h2>
<p><?php print $this->lang->line('userlib_password_info')?></p>


<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i><?php print $header?></h3>
							</div>
							<div class="box-content nopadding">
								<?php print form_open('auth/admin/members/form/'.$this->form_validation->id,array('class'=>'form-horizontal form-bordered'))?>
									<div class="control-group">
										<label for="textfield" class="control-label"> <?php print form_label($this->lang->line('userlib_username'),'username')?></label>
										<div class="controls">
											<?php print form_input('username',set_value('username',$this->form_validation->username),'id="username" class="text"')?>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label"> <?php print form_label($this->lang->line('userlib_email'),'email')?></label>
										<div class="controls">
											 <?php print form_input('email',set_value('email',$this->form_validation->email),'id="email" class="text"')?>
										</div>
									</div>
									<div class="control-group">
										<label for="password" class="control-label"> <?php print form_label($this->lang->line('userlib_password'),'password')?></label>
										<div class="controls">
											<?php print form_password('password','','id="password" class="text"')?>
										</div>
									</div>
									<div class="control-group">
										<label for="password" class="control-label">  <?php print form_label($this->lang->line('userlib_confirm_password'),'confirm_password')?></label>
										<div class="controls">
											 <?php print form_password('confirm_password','','id="confirm_password" class="text"')?>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label"><?php print form_label($this->lang->line('userlib_group'),'group')?></label>
										<div class="controls">
											<?php print form_dropdown('group',$groups,set_value('group',$this->form_validation->group),'id="group" size="10" style="width:20.3em;"')?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> <?php print form_label($this->lang->line('userlib_active'),'active')?></label>
										<div class="controls">
											<?php print $this->lang->line('general_yes')?> <?php print form_radio('active','1',set_radio('active','1',$selected = ($this->form_validation->active == 1) ? TRUE : FALSE),'id="active"')?>

                <?php print $this->lang->line('general_no')?> <?php print form_radio('active','0',set_radio('active','0',$selected = ($this->form_validation->active == 1) ? FALSE : TRUE))?>
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