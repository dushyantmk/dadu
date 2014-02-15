<h3><?php echo empty($product->id) ? 'Add a new product' : 'Edit product ' . $product->prod_name; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Category</td>
		<td>
		<?php
		 // This bit should do this:
		 
		 //Fetch category names from dmp_categories table and display as a drop down and while saving in the DB, category id is saved as cat_id in dmp_products table
		 
		//this is not working
		
		//echo form_dropdown('cat_id', $category, $this->input->post('cat_id') ? $this->input->post('cat_id') : $product->cat_id); 		
		?></td>
	</tr>
	<tr>
		<td>Product Name</td>
		<td><?php echo form_input('prod_name', set_value('prod_name', $product->prod_name)); ?></td>
	</tr>
	<tr>
		<td>Product Price (&pound;)</td>
		<td><?php echo form_input('prod_price', set_value('prod_price', $product->prod_price)); ?></td>
	</tr>
    <tr>
		<td>Slug</td>
		<td><?php echo form_input('slug', set_value('slug', $product->slug)); ?></td>
	</tr>
	<tr>
		<td>Product Description</td>
		<td><?php echo form_textarea('prod_desc', set_value('prod_desc', $product->prod_desc), 'class="tinymce"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
