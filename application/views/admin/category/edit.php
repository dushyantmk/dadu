<h3><?php echo empty($category->id) ? 'Add a new category' : 'Edit category ' . $category->cat_name; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Category Name</td>
		<td><?php echo form_input('cat_name', set_value('cat_name', $category->cat_name)); ?></td>
	</tr>
    <tr>
		<td>Slug</td>
		<td><?php echo form_input('slug', set_value('slug', $category->slug)); ?></td>
	</tr>
	<tr>
		<td>Category Description</td>
		<td><?php echo form_textarea('cat_desc', set_value('cat_desc', $category->cat_desc), 'class="tinymce"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
