<h3>Canvas Settings</h3>
	<?php // echo validation_errors(); ?>
     <?php if(isset($error)) echo $error;?>

	<?php echo form_open("admin/canvas/save"); ?>
	<table class="table">
		<tr>
			<td>
            	Canvas Dimentions 
            </td>
			<td>
				<abbr title="Width">w</abbr> = 
				<?php echo form_input('dimensions_width', set_value('dimensions_width', $this->config->item('dimensions_width', 'canvas'))); ?> px  / 
				<abbr title="Height">h</abbr> = 
				<?php echo form_input('dimensions_height', set_value('dimensions_height', $this->config->item('dimensions_height', 'canvas'))); ?> px (Recommended 350px x 400px) 
			</td>
		</tr>
		<tr>
		    <td>Your Brand Logo</td>
		    <td>
    			<img src="<?php echo site_url($this->config->item('logo_url', 'canvas')); ?>" style="margin-right:20px;" />
				<input type="button" name="add_brand_logo" id="add_brand_logo" value="Change Brand Logo" class="btn btn-primary">
			</td>
		</tr>
		<tr>
			<td>Brand Logo Position </td>
			<td> 
            	x = <?php echo form_input('logo_x', set_value('logo_x', $this->config->item('logo_x', 'canvas'))); ?> 
                y = <?php echo form_input('logo_y', set_value('logo_y', $this->config->item('logo_y', 'canvas'))); ?>
			</td>
		</tr>
		<tr>
			<td>Blank Product Image(s)</td>
			<td>
            	<input type="button" name="add_product_template" id="add_product_template" value="Manage Product Templates" class="btn btn-primary">
            </td>
		</tr>
		<tr>
			<td>Product Position</td>
			<td>
        		x = <?php echo form_input('product_x', set_value('product_x', $this->config->item('product_x', 'canvas'))); ?> 
	            y = <?php echo form_input('product_y', set_value('product_y', $this->config->item('product_y', 'canvas'))); ?>
			</td>
		</tr>
		<tr>
			<td>Text Box 1</td>
			<td>
            	x = <?php echo form_input('text_box_0_x', set_value('text_box_0_x', $this->config->item('text_box_0_x', 'canvas'))); ?> 
                y = <?php echo form_input('text_box_0_y', set_value('text_box_0_y', $this->config->item('text_box_0_y', 'canvas'))); ?>
			</td>
		</tr>
		<tr>
			<td>Text Box 2</td>
			<td>
            	x = <?php echo form_input('text_box_1_x', set_value('text_box_1_x', $this->config->item('text_box_1_x', 'canvas'))); ?> 
            	y = <?php echo form_input('text_box_1_y', set_value('text_box_1_y', $this->config->item('text_box_1_y', 'canvas'))); ?>
			</td>
		</tr>
		<tr>
			<td>Text customization</td>
			<td>
            	<?php print_r($this->config->item('text_colour', 'canvas')); ?>
            	<?php echo form_hidden('text_colour', 'off'); ?>
            	<input type="checkbox" name="text_colour" value="on" <?php echo ($this->config->item('text_colour', 'canvas') == 'on' ? 'checked' : ''); ?> />
				<label for="text_colour">Colour</label><br />
                
                <?php print_r($this->config->item('text_font', 'canvas')); ?>
            	<?php echo form_hidden('text_font', 'off'); ?>
            	<input type="checkbox" name="text_font" value="on" <?php echo ($this->config->item('text_font', 'canvas') == 'on' ? 'checked' : ''); ?> />
				<label for="text_font">Font</label><br />
                
                <?php print_r($this->config->item('text_weight', 'canvas')); ?>
            	<?php echo form_hidden('text_weight', 'off'); ?>
            	<input type="checkbox" name="text_weight" value="on" <?php echo ($this->config->item('text_weight', 'canvas') == 'on' ? 'checked' : ''); ?> />
				<label for="text_weight">Boldness</label><br />
                
                <?php print_r($this->config->item('text_size', 'canvas')); ?>
            	<?php echo form_hidden('text_size', 'off'); ?>
            	<input type="checkbox" name="text_size" value="on" <?php echo ($this->config->item('text_size', 'canvas') == 'on' ? 'checked' : ''); ?> />
				<label for="text_size">Size</label><br />
                
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?> 
				<?php echo form_reset('reset', 'Reset to Defaults', 'class="btn btn-primary"'); ?> 
				<?php echo form_button('preview', 'Preview Canvas', 'class="btn btn-primary"'); ?>
			</td>
		</tr>
	</table>
    <?php echo form_close();?> 
<div id="brand_logo_upload">
	<p class="right" style="cursor:pointer" id="closebox">x</p>
	<?php echo form_open_multipart('admin/canvas/do_upload');?>
    <table class="table">
    	<tr>
			<td> Select New Brand Image </td>
			<td>
            	<input type="file" name="userfile" size="20" /> <br />(Recommended 75px x 50px)
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

<div id="templates_upload">
	<p class="right" style="cursor:pointer" id="closebox2">x</p>
	<?php echo form_open_multipart('admin/canvas/template_upload');?>
    <table class="table">
    	<tr>
			<td> Add Brand Template </td>
			<td>
            	<input type="file" name="userfile" size="20" />
            </td>
		</tr>
        <tr>
			<td>Template Name<br />(To be displayed in dropdown list.)</td>
			<td>
            	<input type="text" name="userfile_name" size="20" />
            </td>
		</tr>
		<tr>
        	<td></td>
            <td>
            	<input type="submit" value="Upload" id="add_product_template">
            </td>
		</tr>
        <tr>
	        <td colspan="2">
            	<table align="center">
		            <tr>
                    	<?php $list = Canvas_helper::get_product_images(); ?>
                    	<?php if(!empty($list)): ?>
        				<?php foreach(Canvas_helper::get_product_images() as $file_name => $file): ?>
                        <td class="manage_products_list">
		            	<img src="<?php echo $file ?>" class="template_preview" /><br />
        		    	<?php echo btn_delete('admin/canvas/delete/' . $file_name) ?>   	
                        </td>
						<?php endforeach; ?>
						<?php else: ?>
						<p>No product templates found.</p>
						<?php endif; ?>
					</tr>
                </table>
            </td>
        </tr>
	</table>
    <?php echo form_close();?> 
</div>

<script><!--
$('#add_brand_logo').click(function(event) {
    event.preventDefault();
    $("#brand_logo_upload").fadeIn("medium",function() {
			
	});
});
$('#closebox').click(function(event) {
    event.preventDefault();
    $("#brand_logo_upload").fadeOut("medium");
});

$('#add_product_template').click(function(event) {
    event.preventDefault();
    $("#templates_upload").fadeIn("medium",function() {
			
	});
});
$('#closebox2').click(function(event) {
    event.preventDefault();
    $("#templates_upload").fadeOut("medium");
});
-->
</script> 
