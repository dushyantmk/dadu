<section>
  <h2>Users</h2>
  <?php echo anchor('admin/user/edit', '<i class="glyphicon glyphicon-plus"></i> Add a user') ?>
  <table class="table table-striped">
    <thead>
    <tr>
      <th>Email</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($users)): foreach($users as $user):?>
	    <?php if($user->name !== 'superadmin'): ?>
    		<tr>
		      <td><?php echo anchor('admin/user/edit/' . $user->id, $user->email); ?></td>
		      <td><?php echo btn_edit('admin/user/edit/' . $user->id) ?></td>
              <?php if($this->session->userdata('email') !== $user->email): ?>
		      <td><?php echo btn_delete('admin/user/delete/' . $user->id);?></td>
              <?php else:?>
              <td></td>
              <?php endif;?>
			</tr>
		<?php endif; ?>
	<?php endforeach; ?>
    <?php else: ?>
    <tr>
    	<td colspan="3">We could not find any users.</td>
    </tr>
    <? endif; ?>
    </tbody>
  </table>
</section>
