<h2><?php print $header?></h2>
<p><?php print $this->lang->line('access_advanced_desc')?></p>

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
        <td width=33%><b><?php print $this->lang->line('access_groups')?></b></td>
        <td width=33%><b><?php print $this->lang->line('access_resources')?></b></td>
        <td width=33%><b><?php print $this->lang->line('access_actions')?></b></td>
    </tr>
    <tr>
        <td><div class="advanced_view_tree"><ul id="access_groups" class="treeview"><?php print $this->access_control_model->buildGroupSelector()?></ul></div></td>
        <td><div class="advanced_view_tree"><ul id="access_resources" class="treeview"></ul></div></td>
        <td><div class="advanced_view_tree" id="access_actions"><?php print $this->lang->line('access_advanced_select')?></div></td>
    </tr>
</table>
</div>
						</div>
					</div>
				</div>
<div  class="btn"><i class="icon-step-backward"></i>                
	<a href="<?php print site_url('auth/admin/acl_permissions') ?>">
      <?php print $this->lang->line('general_back')?>
    </a>
</div>