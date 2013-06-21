



<h2><?php print $header?></h2>
<p><?php print $this->lang->line('userlib_password_info')?></p>

<?php print form_open('auth/admin/members/form/'.$this->validation->id,array('class'=>'horizontal'))?>
    <fieldset>
        <ol>
		<li>
                <?php print form_label($this->lang->line('userlib_joindate'),'joindate')?>
                <?php print form_input('username',$this->validation->username,'id="username" class="text"')?>
            </li>
			<li>
                <?php print form_label($this->lang->line('userlib_empcode'),'empcode')?>
                <?php print form_input('username',$this->validation->username,'id="username" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_username'),'username')?>
                <?php print form_input('username',$this->validation->username,'id="username" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_email'),'email')?>
                <?php print form_input('email',$this->validation->email,'id="email" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_password'),'password')?>
                <?php print form_password('password','','id="password" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_confirm_password'),'confirm_password')?>
                <?php print form_password('confirm_password','','id="confirm_password" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_group'),'group')?>
                <?php print form_dropdown('group',$groups,$this->validation->group,'id="group" size="10" style="width:20.3em;"')?>
            </li>
			<li>
                <?php print form_label($this->lang->line('userlib_team'),'team')?>
                <?php print form_dropdown('team',array('Finanace', 'BPO'),'id="group" size="10" style="width:20.3em;"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_active'),'active')?>
                <?php print $this->lang->line('general_yes')?> <?php print form_radio('active','1',$this->validation->set_radio('active','1'),'id="active"')?>
                <?php print $this->lang->line('general_no')?> <?php print form_radio('active','0',$this->validation->set_radio('active','0'))?>
            </li>
            <li class="submit">
                <?php print form_hidden('id',$this->validation->id)?>
                <div class="buttons">
	                <button type="submit" class="positive" name="submit" value="submit">
	                	<?php print  $this->bep_assets->icon('disk');?>
	                	<?php print $this->lang->line('general_save')?>
	                </button>

	                <a href="<?php print  site_url('auth/admin/members')?>" class="negative">
	                	<?php print  $this->bep_assets->icon('cross');?>
	                	<?php print $this->lang->line('general_cancel')?>
	                </a>

	                 </div>
            </li>
        </ol>
    </fieldset>

   

   


<?php print form_close()?>