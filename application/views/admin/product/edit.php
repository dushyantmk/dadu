<h3><?php echo empty($product->id) ? 'Add a new product' : 'Edit product ' . $product->prod_name; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
<table class="table">
	<tr>
		<td>Category</td>
		<td>
		<?php $this->data['categories'] = $this->category_m->get();	?>
		<select name="cat_id" id="cat_id">
		<?php foreach($this->data['categories'] as $category): ?>
		<option value="<?php echo $category->id; ?>"><?php  echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
	</td>
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
    	<td>Product Image</td>
		<td>
    		<img src="<?php echo site_url('images/products/' .$product->prod_img); ?>" style="margin-right:20px; width:100px;" />
			<input type="file" name="userfile" size="20" class="btn btn-primary">
		</td>
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
<div id="prod_upload">
	<p class="right" style="cursor:pointer" id="closebox">x</p>
	<?php echo form_open_multipart('admin/product/edit');?>
    <table class="table">
    	<tr>
			<td> Select New Product Image </td>
			<td>
            	<input type="file" name="userfile" size="20" />
            </td>
		</tr>
		<tr>
        	<td></td>
            <td>
            	<input type="submit" value="Upload" id="add_brand_image">
            </td>
		</tr>
	</table>
    <?php echo form_close();?> 
</div>
<script><!--
$('#prod_img').click(function(event) {
    event.preventDefault();
    $("#prod_upload").fadeIn("medium",function() {
			
	});
});
$('#closebox').click(function(event) {
    event.preventDefault();
    $("#prod_upload").fadeOut("medium");
});

-->
</script> 