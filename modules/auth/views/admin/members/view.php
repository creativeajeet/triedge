<h2><?php print $header?></h2>

<div  class="btn"><i class="icon-user"></i>                
	<a href="<?php print  site_url('auth/admin/members/form')?>">
      <?php print $this->lang->line('userlib_create_user')?>
    </a>
</div>

<?php print form_open('auth/admin/members/delete')?>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Members List
								</h3>
							</div>
							<div class="box-content nopadding">
<table class="table table-nomargin table-bordered">
    <thead>
        <tr>
            <th width=5%><?php print $this->lang->line('general_id')?></th>
            <th><?php print $this->lang->line('userlib_username')?></th>
            <th><?php print $this->lang->line('userlib_email')?></th>
            <th><?php print $this->lang->line('userlib_group')?></th>
            <th><?php print $this->lang->line('userlib_last_visit')?></th>
            <th width=5% class="middle"><?php print $this->lang->line('userlib_active')?></th> 
            <th width=5% class="middle"><?php print $this->lang->line('general_edit')?></th>
            <th width=10%><?php print $this->lang->line('general_delete')?></th>        
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan=7>&nbsp;</td>
            <td><button class="btn btn-small btn-inverse" name="delete"><i class="icon-trash"></i> Delete</button></td>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach($members->result_array() as $row):
            // Check if this user account belongs to the person logged in
            // if so don't allow them to delete it, also if it belongs to the main
            // admin user don't allow them to delete it
            $delete  = ($row['id'] == $this->session->userdata('id') || $row['id'] == 1) ? '&nbsp;' : form_checkbox('select[]',$row['id'],FALSE);  
			
			$active =  ($row['active']?'tick':'cross');   
        ?>
        <tr>
            <td><?php print $row['id']?></td>
            <td><?php print $row['username']?></td>
            <td><?php print $row['email']?></td>
            <td><?php print $row['group']?></td>
            <td><?php print $row['last_visit']?></td>
            <td class="middle"><?php print $this->bep_assets->icon($active);?></td>
            <td class="middle"><a href="<?php print site_url('auth/admin/members/form/'.$row['id'])?>"><?php print $this->bep_assets->icon('pencil');?></a></td>
            <td><?php print $delete?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
	</div>
						</div>
					</div>
				</div>
<?php print form_close()?>