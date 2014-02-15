<h3>Canvas Settings</h3>
<?php // echo validation_errors(); ?>
<?php echo form_open_multipart("admin/canvas/save"); ?>
<table class="table">
  <tr>
    <td>Canvas Dimentions </td>
    <td>
    	<abbr title="Width">w</abbr> = <?php echo form_input('dimensions_width', set_value('dimensions_width', $this->config->item('dimensions_width', 'canvas'))); ?> px  / 
	    <abbr title="Height">h</abbr> = <?php echo form_input('dimensions_height', set_value('dimensions_height', $this->config->item('dimensions_height', 'canvas'))); ?> px (Recommended 350px x 400px)
    </td>
  </tr>
  <tr>
    <td>Your Brand Logo</td>
    <td>
		<img src="<?php echo $this->config->item('logo_url', 'canvas'); ?>" style="margin-bottom:10px;" /><br />
        
        
        
        
        
        <!-- The excercise to upload this bit starts from here-->
    
        <input type="file" name="logo_url" size="20" />
        
        <!-- lets see if it works-->
        
        
        
        
        <br />
		<?php //echo form_input('logo_url', set_value('logo_url', $this->config->item('logo_url', 'canvas'))); ?> (Recommended 75px x 50px)    
	</td>
  </tr>
  <tr>
    <td>Brand Logo Position </td>
    <td>
    	x = <?php echo form_input('logo_x', set_value('logo_x', $this->config->item('logo_x', 'canvas'))); ?> y = <?php echo form_input('logo_y', set_value('logo_y', $this->config->item('logo_y', 'canvas'))); ?> </td>
  </tr>
  <tr>
    <td>Blank Product Image(s)</td>
    <td>
    	<input type="button" name="addbrandimages" id="addbrandimages" value="Add New Image">
	</td>
  </tr>
  <tr>
    <td>Product Position</td>
    <td>
    	x = <?php echo form_input('product_x', set_value('product_x', $this->config->item('product_x', 'canvas'))); ?> y = <?php echo form_input('product_y', set_value('product_y', $this->config->item('product_y', 'canvas'))); ?> </td>
  </tr>
  <tr>
    <td>Text Box 1</td>
    <td>
    	x = <?php echo form_input('text_box_0_x', set_value('text_box_0_x', $this->config->item('text_box_0_x', 'canvas'))); ?> y = <?php echo form_input('text_box_0_y', set_value('text_box_0_y', $this->config->item('text_box_0_y', 'canvas'))); ?> </td>
  </tr>
  <tr>
    <td>Text Box 2</td>
    <td>
    	x = <?php echo form_input('text_box_1_x', set_value('text_box_1_x', $this->config->item('text_box_1_x', 'canvas'))); ?> y = <?php echo form_input('text_box_1_y', set_value('text_box_1_y', $this->config->item('text_box_1_y', 'canvas'))); ?> </td>
  </tr>
  <tr>
  
    <td>Text customization</td>
    <td>
		<?php //echo form_checkbox('text_colour', 'colour', set_value('text_colour', $this->config->item('text_colour', TRUE))); ?> <label for="text_colour">Colour</label> 
		<?php //echo form_checkbox('text_font', 'font', set_value('text_font', $this->config->item('text_font', TRUE))); ?> <label for="text_font">Font</label> 
		<?php //echo form_checkbox('text_weight', 'weight', set_value('text_weight', $this->config->item('text_weight', FALSE))); ?> <label for="text_weight">Boldness</label> 
		<?php //echo form_checkbox('text_size', 'size', set_value('text_size', $this->config->item('text_size', TRUE))); ?> <label for="text_size">Size</label> 
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