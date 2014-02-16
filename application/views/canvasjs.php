
//********************************************** Initiating and drawing all the layers

//http://html5.litten.com/layers/canvaslayers.html
var globalpng;

$(function(){
		var layer1;
		var layer2;
		var layer3;
		var layer4;
		var prod_color;

		var ctx1;
		var ctx2;
		var ctx3;
		var ctx3;

		var x = <?php echo $this->config->item('dimensions_width', 'canvas'); ?>;
		var y = <?php echo $this->config->item('dimensions_height', 'canvas'); ?>;
		var dx = 2;
		var dy = 4;
		var WIDTH = <?php echo $this->config->item('dimensions_width', 'canvas'); ?>;
		var HEIGHT = <?php echo $this->config->item('dimensions_height', 'canvas'); ?>;
		var product = new Image();
		var logo = new Image();
		var custom_text;
		
	
		$("form#custom_design").submit(function(event) {
			event.preventDefault();
			
			prod_color = $("input[name=rr]:checked").val();
			
			custom_text = $("#custom_text").val();
			size_one = $("#size_one").val();
			color_one = $("#color_one").val();
			fontWeight_one = $("#fontWeight_one").val();
			font_one = $("#font_one").val();
			
			custom_text2 = $("#custom_text2").val();
			size_two = $("#size_two").val();
			color_two = $("#color_two").val();
			fontWeight_two = $("#fontWeight_two").val();
			font_two = $("#font_two").val();
			
			draw2(prod_color);

			draw3(custom_text, size_one, color_one, fontWeight_one, font_one);
			draw4(custom_text2, size_two, color_two, fontWeight_two, font_two);
		})
		
		
	function init() {
		//product.src ="product_templates/tshirt.png";
		
		logo.src ="<?php echo $this->config->item('logo_url', 'canvas'); ?>";

		layer1 = document.getElementById("logo_layer");
		ctx1 = layer1.getContext("2d");

		layer2 = document.getElementById("product_layer");
		ctx2 = layer2.getContext("2d");

		layer3 = document.getElementById("text_layer");
		ctx3 = layer3.getContext("2d");

		layer4 = document.getElementById("text_layer");
		ctx4 = layer4.getContext("2d");

		layer5 = document.getElementById("text_layer");
		ctx5 = layer4.getContext("2d");

		drawAll();
	}

	function drawAll() {
		draw1();
		draw2();
		draw3();
		draw4();
	}

	function draw1() {
		ctx1.clearRect(0, 0, WIDTH, HEIGHT);
		ctx1.drawImage(logo, <?php echo $this->config->item('logo_x', 'canvas'); ?>, <?php echo $this->config->item('logo_y', 'canvas'); ?>);
	}

	function draw2(prod_color) {

//http://stackoverflow.com/questions/15394124/passing-radio-button-values-to-javascript

		if (typeof(prod_color) == 'undefined' || custom_text2 == null || prod_color == 'white'){product.src ="product_templates/tshirt.png";}
		if (prod_color == 'black'){product.src ="product_templates/tshirt-dark.png";}
		if (prod_color == 'green'){product.src ="product_templates/tshirt-green.png";}
		if (prod_color == 'pink'){product.src ="product_templates/tshirt-pink.png";}
		if (prod_color == 'blue'){product.src ="product_templates/tshirt-blue.png";}
		
		ctx2.clearRect(0, 0, WIDTH, HEIGHT);
		ctx2.drawImage(product, <?php echo $this->config->item('product_x', 'canvas'); ?>, <?php echo $this->config->item('product_y', 'canvas'); ?>);
	}

	function draw3(custom_text, size_one, color_one, fontWeight_one, font_one) {
		if (typeof(custom_text) == 'undefined' || custom_text == null){ custom_text=""; size_one="30"; color_one="#000"; fontWeight_one="normal"; font_one="Trebuchet MS";}
		ctx3.clearRect(0, 0, 550, 500);
		ctx3.font=fontWeight_one + " " + size_one+"px " +font_one;
		ctx3.textAlign = 'center'
		ctx3.fillStyle=(color_one);
		ctx3.fillText(custom_text,<?php echo $this->config->item('text_box_0_x', 'canvas'); ?>,<?php echo $this->config->item('text_box_0_y', 'canvas'); ?>);
	}
	
	function draw4(custom_text2, size_two, color_two, fontWeight_two, font_two) {
		if (typeof(custom_text2) == 'undefined' || custom_text2 == null){ custom_text2=""; size_two="12"; color_two="#666"; fontWeight_two="normal"; font_two="Arial";}
		ctx4.textAlign = 'center'
		ctx4.font=fontWeight_two + " " + size_two+"px " +font_two;
		ctx4.fillStyle=(color_two);
		ctx4.fillText(custom_text2,<?php echo $this->config->item('text_box_1_x', 'canvas'); ?>,<?php echo $this->config->item('text_box_1_y', 'canvas'); ?>);
	}

init();


//********************************************** Merging and converting canvas to an image


//http://davidwalsh.name/convert-canvas-image
//http://stackoverflow.com/questions/13416800/how-to-generate-an-image-from-imagedata-in-javascript
//http://jsfiddle.net/bnwpS/15/
//https://hacks.mozilla.org/2012/02/saving-images-and-files-in-localstorage/
//https://www.ibm.com/developerworks/community/blogs/bobleah/entry/html5_code_example_store_images_using_localstorage57?lang=en
//http://www.w3schools.com/tags/canvas_filltext.asp
//https://www.inkling.com/read/html5-canvas-fulton-fulton-1st/chapter-3/setting-the-text-font

$("#generatebtn").click(function(event) {
	event.preventDefault();
	var can_final= document.getElementById("final_canvas");
	var ctx_final= can_final.getContext('2d');
	
	ctx_final.drawImage(layer1,0,0);
	ctx_final.drawImage(layer2,0,0);
	ctx_final.drawImage(layer3,0,0);
	ctx_final.drawImage(layer4,0,0);
	
	var image = new Image();

//********************************************** Saving the converted image into local storage

	image = can_final.toDataURL("image/png");
	localStorage.setItem($.md5(image)+".png",image);
	document.getElementById("final_product").src = localStorage.getItem($.md5(image)+'.png');
	
//********************************************** uploading the generating image from local storage to server
	
	$.ajax({
		url: './user_images/upload.php',
		type: "POST",
		context: document.body,
		data: {
			md5: $.md5(image),
			image: localStorage.getItem($.md5(image)+".png")
		},
		async: false
	}).done(function() {
		

//********************************************** Get url and share it on FB
				
//http://stackoverflow.com/questions/9364225/return-the-text-of-a-href-from-a-list-generated-dynamically
//https://developers.facebook.com/docs/plugins/share/
//http://stackoverflow.com/questions/5786851/define-global-variable-in-a-javascript-function
//http://stackoverflow.com/questions/18885676/open-new-tab-without-popup-blocker-after-ajax-call-on-user-click
	
		window.globalpng = $.md5(image)+'.png';
		window.open(
		'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http://www.cems.uwe.ac.uk/~dk2-kanungo/y3/dmp/beta/user_images/'+window.globalpng), 
		'facebook-share-dialog', 
		'width=626,height=436'); 
	});

});

});