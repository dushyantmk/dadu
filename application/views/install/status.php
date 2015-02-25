<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dadu</title>
<link href="../includes/dadustyle.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="../js/tablescript.js"></script>
<script type="text/javascript" src="../js/install_progress.js"></script>
</head>
<body>
<div class="topgrey">
  <div class="wrapper">
    <div class="grid-3 push-9"><a href="#">Facebook</a> | <a href="#">Twitter</a></div>
  </div>
</div>
<header>
  <div class="wrapper"><div class="grid-3"><a href="dashboard.php"><img src="../includes/dadu-logo-100.png" width="200" alt="Dadu" longdesc="http://www.dadushop.com"></a></div>
    <div class="grid-9">
      <h1>Get Started!</h1>
    </div>
  </div>
</header>
<div class="wrapper">
  <section>
    <div class="grid-12">
      <h1>This is exciting</h1>
      <p>Step 2.5 (we cheated) of 3</p>
      <h3>Installing</h3>
   
    <div class="clear"></div>
   	<section id="progress">  
    	<!-- Progress will be entered in here -->
    </section>
    
   	<div class="clear"></div>  
    <p class="center"><a href="userdetails" class="btn">Proceed to Step Three</a></p>
    </div>
    <div class="clear"></div>  
    </section>
</div>
<script type="text/javascript"><!--
	$('input[name="db_name"]').focus(function(){
		$(this).val('');
	}).blur(function() {
		if($(this).val().length == 0) {
			$(this).val('dadushop');
		}
	});
	$('input[name="db_host"]').focus(function(){
		$(this).val('');
	}).blur(function() {
		if($(this).val().length == 0) {
			$(this).val('127.0.0.1');
		}
	});
	$('input[name="db_prefix"]').focus(function(){
		$(this).val('');
	}).blur(function() {
		if($(this).val().length == 0) {
			$(this).val('dadu_');
		}
	});
--></script>
<footer>
  <div class="wrapper"><small>&copy; 2013-14 <a href="http://www.dushyantkanungo.com" target="_blank">Dushyant Kanungo</a> | Digital Media Project | B.Sc. (Hons) Web Design Year 3 | University of the West of England, Bristol. </small></div>
</footer>
</body>
</html>
