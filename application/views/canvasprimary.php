<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dadu Canvas</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script src="<?php echo site_url('js/jquery.md5.js');?>"></script>
<script src="<?php echo site_url('canvas.js');?>"></script>
<link href="<?php echo site_url('css/dadu-style.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
<div id="canvas_front">
  <canvas id="logo_layer" style="z-index: 1; position:absolute; left:0px; top:0px; border:1px solid #d3d3d3;" height="500px" width="550">
    <h1>Oh man!</h1>
    <p>These browser wars, useless IT support staff and companies fighting for money!</p>
    <p>All that ended up with your browser not supporting HTML5 Canvas.</p>
    <p><a href="https://www.google.com/intl/en/chrome/browser/" target="_blank">Go on... download a browser that actually works for you!</a></p>
  </canvas>
  <canvas id="product_layer" style="z-index: 2; position:absolute; left:0px; top:0px;" height="500px" width="550"></canvas>
  <canvas id="text_layer" style="z-index: 3; position:absolute; left:0; top:0px;" height="500px" width="550"></canvas>
  <canvas id="text_layer2" style="z-index:4; position:absolute; left:0; top:0px;" height="500px" width="550"></canvas>
</div>
<div id="form_front">
  <form id="custom_design">
  <p><select name="product_variance" id="product_variance">
    <?php $list = Canvas_helper::get_product_images(); ?>
	<?php if(!empty($list)): ?>
	<?php foreach(Canvas_helper::get_product_images() as $file_name => $file): ?>
	<option value="<?php echo $file; ?>"><?php  echo ucwords(preg_replace('(.*\/|png|jpg|jpeg|gif|\.|\_|\-)', ' ',$file)); ?></option>
	<?php endforeach; ?>
	<?php endif; ?>
  </select></p>
    <p>
      <input type="text" name="custom_text" placeholder="What Should Your T-Shirt Say?" id="custom_text" size="36" max="30">
    </p>
    <?php if($this->config->item('text_size', 'canvas') == 'on'): ?>
    <select name="size_one" id="size_one">
      <option selected value="30">30</option>
      <option value="29">29</option>
      <option value="28">28</option>
      <option value="27">27</option>
      <option value="26">26</option>
      <option value="25">25</option>
      <option value="24">24</option>
      <option value="23">23</option>
      <option value="22">22</option>
      <option value="21">21</option>
      <option value="20">20</option>
      <option value="19">19</option>
      <option value="18">18</option>
      <option value="17">17</option>
      <option value="16">16</option>
      <option value="15">15</option>
      <option value="14">14</option>
      <option value="13">13</option>
      <option value="12">12</option>
    </select>
    <?php else: ?>
    <input type="hidden" name="size_one"  id="size_one" value="30"/>
    <?php endif; ?>
    
    <?php if($this->config->item('text_colour', 'canvas') == 'on'): ?>
    <input type="color" name="color_one" id="color_one">
    <?php else: ?>
    <input type="hidden" name="color_one"  id="color_one" value="#000"/>    
    <?php endif; ?>
    
    <?php if($this->config->item('text_weight', 'canvas') == 'on'): ?>
	<select id="fontWeight_one" name="fontWeight_one">
		<option value="normal">normal</option>
		<option value="bold">bold</option>
		<option value="bolder">bolder</option>
		<option value="lighter">lighter</option>
	</select>
    <?php else: ?>
    <input type="hidden" id="fontWeight_one" name="fontWeight_one" value="normal"/>
    <?php endif; ?>
    
    <?php if($this->config->item('text_font', 'canvas') == 'on'): ?>
    <select id="font_one" name="font_one">
	 <option value="Arial">Arial</option>
	 <option value="Verdana">Verdana</option>
	 <option value="Century Gothic">Century Gothic</option>
	 <option value="fantasy">fantasy</option>
	 <option value="Helvetica">Helvetica</option>
	<option value="cursive">Comic Sans</option>
	</select>
    <?php else: ?>
    <input type="hidden" id="font_one" name="font_one" value="Arial"/>
    <?php endif; ?>
    
    <p>
      <input type="text" name="custom_text2" placeholder="Anything else?" id="custom_text2" size="36" max="30">
    </p>
    <?php if($this->config->item('text_size', 'canvas') == 'on'): ?>
    <select name="size_two" id="size_two">
      <option value="30">30</option>
      <option value="29">29</option>
      <option value="28">28</option>
      <option value="27">27</option>
      <option value="26">26</option>
      <option value="25">25</option>
      <option value="24">24</option>
      <option value="23">23</option>
      <option value="22">22</option>
      <option value="21">21</option>
      <option value="20">20</option>
      <option value="19">19</option>
      <option value="18">18</option>
      <option value="17">17</option>
      <option value="16">16</option>
      <option value="15">15</option>
      <option value="14">14</option>
      <option value="13">13</option>
      <option selected value="12">12</option>
    </select>
    <?php else: ?>
    <input type="hidden" name="size_one"  id="size_two" value="12"/>
    <?php endif; ?>
    
    <?php if($this->config->item('text_colour', 'canvas') == 'on'): ?>
    <input type="color" name="color_two" id="color_two">
    <?php else: ?>
    <input type="hidden" name="color_two"  id="color_two" value="#666"/>
	<?php endif; ?>
    
    <?php if($this->config->item('text_weight', 'canvas') == 'on'): ?>
	<select id="fontWeight_two" name="fontWeight_two">
		<option value="normal">normal</option>
		<option value="bold">bold</option>
		<option value="bolder">bolder</option>
		<option value="lighter">lighter</option>
	</select>
    <?php else: ?>
    <input type="hidden" name="fontWeight_two"  id="fontWeight_two" value="normal"/>
    <?php endif; ?>
    
   <?php if($this->config->item('text_font', 'canvas') == 'on'): ?>
    <select id="font_two">
	 <option value="Arial">Arial</option>
	 <option value="Verdana">Verdana</option>
	 <option value="Century Gothic">Century Gothic</option>
	 <option value="fantasy">fantasy</option>
	 <option value="Helvetica">Helvetica</option>
	<option value="cursive">Comic Sans</option>
	</select>
    <?php else: ?>
    <input type="hidden" id="font_two" name="font_two" value="Arial"/>
	<?php endif; ?>
    
    <p>
      <button id="submit" type="submit" value="Submit" name="submit">Create</button> 
      <a id="generatebtn" target="_blank">Share</a> 
      <button id="buy">Purchase</button>
    </p>
  </form>
  <form>
    <p>
      
    </p>
  </form>
  </p>
</div>
<div style="margin-top:250px; display:none;">
  <canvas id="final_canvas" style="display:none" width="550" height="500"></canvas>
  <img id="final_product" />
<?php $list = Canvas_helper::get_product_images(); ?>
<?php if(!empty($list)): ?>
<?php foreach(Canvas_helper::get_product_images() as $file_name => $file): ?>
  <img src="<?php echo $file ?>">
<?php endforeach; ?>
<?php endif; ?>
  </div>
</body>
</html>