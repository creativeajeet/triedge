<h2><?php print $header?></h2>

<?php print form_open('auth/admin/acl_actions/delete')?> 
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
<thead>
    <tr>
        <th width=5%><?php print $this->lang->line('general_id')?></th>
        <th><?php print $this->lang->line('access_actions')?></th>
        <th width=10%><?php print $this->lang->line('general_delete')?></th>
    </tr>
</thead>
<tfoot>
    <tr>
        <td colspan=2>&nbsp;</td>
        <td><button class="btn btn-small btn-inverse" name="delete"><i class="icon-trash"></i> Delete</button></td>  
    </tr>
</tfoot>
<tbody>
    <?php 
    $query = $this->access_control_model->fetch('axos');
    foreach($query->result() as $result): ?>
    <tr>
        <td><?php print $result->id?></td>
        <td><?php print $result->name?></td>
        <td><?php print form_checkbox('select[]',$result->name,FALSE)?></td>
    </tr>    
    <?php endforeach;?>
</tbody>
</table>
</div>
						</div>
					</div>
				</div>
<?php print form_close()?>

<div  class="btn"><i class="icon-step-backward"></i>                
	<a href="<?php print site_url('auth/admin/access_control')?>">
      <?php print $this->lang->line('general_back')?>
    </a>
</div>

<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i><?php print $this->lang->line('access_create_action')?></h3>
							</div>
							<div class="box-content nopadding">
								<?php print form_open('auth/admin/acl_actions/create',array('class'=>'form-horizontal form-bordered'))?>
								<div class="control-group">
										<label for="textfield" class="control-label"> <?php print form_label($this->lang->line('access_name'),'name')?></label>
										<div class="controls">
											<?php print form_input('name','','class="text"')?>
										</div>
									</div>
																		
																	
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" class="btn btn-primary" class="positive" name="submit" value="submit"><?php print $this->lang->line('general_save')?></button>
										<button type="button" class="btn">Cancel</button>
									</div>
								<?php print form_close()?>
							</div>
						</div>
					</div>
				</div>
