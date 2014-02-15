<section>
  <h2>Categories</h2>
  <?php echo anchor('admin/category/edit', '<i class="glyphicon glyphicon-plus"></i> Add a category') ?>
  <table class="table table-striped">
    <thead>
    <tr>
      <th>Category Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($categories)): foreach($categories as $category):?>
    <tr>
      <td><?php echo anchor('admin/category/edit/' . $category->id, $category->cat_name); ?></td>
      <td><?php echo btn_edit('admin/category/edit/' . $category->id) ?></td>
      <td><?php echo btn_delete('admin/category/delete/' . $category->id) ?></td>
    </tr>
     <?php endforeach; ?>
    <?php else: ?>
    <tr>
    	<td colspan="3">We could not find any categories .</td>
    </tr>
    <? endif; ?>
    </tbody>
  </table>
</section>
