<section>
  <h2>Products</h2>
  <?php echo anchor('admin/product/edit', '<i class="glyphicon glyphicon-plus"></i> Add a product') ?>
  <table class="table table-striped">
    <thead>
    <tr>
      <th>Product Name</th>
      <th>Product Category</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($products)): foreach($products as $product):?>
    <tr>
      <td><?php echo anchor('admin/product/edit/' . $product->id, $product->prod_name); ?></td>
      <td><?php echo $product->cat_id; ?></td>
      <td><?php echo btn_edit('admin/product/edit/' . $product->id) ?></td>
      <td><?php echo btn_delete('admin/product/delete/' . $product->id) ?></td>
    </tr>
     <?php endforeach; ?>
    <?php else: ?>
    <tr>
    	<td colspan="3">We could not find any products.</td>
    </tr>
    <? endif; ?>
    </tbody>
  </table>
</section>
