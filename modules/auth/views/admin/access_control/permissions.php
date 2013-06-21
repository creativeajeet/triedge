<h2><?php print $header?></h2>
<div  class="btn"><i class="icon-cog"></i>                
	<a href="<?php print  site_url('auth/admin/acl_permissions/form')?>">
    <?php print $this->lang->line('access_create_permission')?>
    </a>
</div>
<div  class="btn"><i class="icon-bolt"></i>                
	<a href="<?php print  site_url('auth/admin/acl_permissions/show')?>">
     <?php print $this->lang->line('access_advanced_permissions')?>
    </a>
</div>


<?php print form_open('auth/admin/acl_permissions/delete')?>
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
        <th width=25%><?php print $this->lang->line('access_groups')?></th>
        <th width=25%><?php print $this->lang->line('access_resources')?></th>
        <th width=25%><?php print $this->lang->line('access_actions')?></th>
        <th width=10% class="middle"><?php print $this->lang->line('general_edit')?></th>
        <th width=10%><?php print $this->lang->line('general_delete')?></th>
    </tr>
</thead>

<tfoot>
    <tr>
        <td colspan=5>&nbsp;</td>
        <td><button class="btn btn-small btn-inverse" name="delete"><i class="icon-trash"></i> Delete</button></td>
    </tr>
</tfoot>

<tbody>
        <?php foreach($this->access_control_model->getPermissions() as $key=>$row){?>
        <tr>
            <td style="vertical-align:middle"><?php print $key?></td>
            <td style="vertical-align:middle"><?php print $row['aro']?></td>
            <td style="vertical-align:middle"><span class="<?php print ($row['allow']) ? 'allow':'deny'?>"><?php print $row['aco']?></span></td>
            <td>
                <?php
                // Print out the actions
                if(isset($row['actions'])){
                    foreach($row['actions'] as $action)
                    {
                        print '<span class="';
                        print ($action['allow']) ? 'allow':'deny';
                        print '">'.$action['axo'].'</span><br>';
                    }
                }
                else { print "&nbsp;"; }
                ?>
            </td>
            <td class="middle"><a href="<?php print site_url('auth/admin/acl_permissions/form/'.$key)?>"><?php print $this->bep_assets->icon('pencil');?></a></td>
            <td style="vertical-align:middle"><?php print form_checkbox('select[]',$key,FALSE)?></td>
        </tr>
        <?php } ?>
</tbody>
<?php print form_close()?>
</table>
</div>
						</div>
					</div>
				</div>

<div  class="btn"><i class="icon-step-backward"></i>                
	<a href="<?php print site_url('auth/admin/access_control')?>">
      <?php print $this->lang->line('general_back')?>
    </a>
</div>



