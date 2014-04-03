<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dadu</title>
<link href="../includes/dadustyle.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/tablescript.js"></script>
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
      <h1>An easy way to manage your web content!</h1>
      <p>Step 2 of 3</p>
      <h3>Setting up the Database</h3>
      
      <?php if(isset($error_message)): ?>
      	<section class="error">
        	<?php echo $error_message; ?>
        </section>
      <?php endif; ?>
    <form action="./database" method="post">
    <div class="clear"></div>    
    <table>
    <tr>
    <td>Database Name</td>
    <td><input name="db_name" type="text" value="dadushop" required></td>
    <td>Database where you wish to install Dadu</td>
    </tr>
    <tr>
      <td>User Name</td>
      <td><input name="db_user" type="text" placeholder="db_user" required></td>
      <td>Your  MySQL username for this database</td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="db_password" type="password" placeholder="Passw0rd" required></td>
      <td></td>
    </tr>
    <tr>
      <td>Database Host</td>
      <td><input name="db_host" type="text" value="localhost" required></td>
      <td>Please contact your web host if localhost doesn't work</td>
    </tr>
    <tr class="row-last">
      <td class="first">Table Prefix</td>
      <td><input name="db_prefix" type="text" value="dmp_"></td>
      <td class="last">To run multiple Dadu versions of Dadu</td>
    </tr>
    </table>
        <div class="clear"></div>  
    <p class="center"><input type="submit" value="Proceed to Step Three" class="btn"></p>
    </form>
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
			$(this).val('localhost');
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
