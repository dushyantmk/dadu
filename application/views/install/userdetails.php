
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
      <h1>A new shop front for your online business!</h1>
      <p>Step 3 of 3</p>
      <h3>Little  bit of information about you</h3>
     <form action="./userdetails" method="post">
    <div class="clear"></div>  
    
    <?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<table class="table">
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name'); ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo form_input('email'); ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?php echo form_password('password'); ?></td>
	</tr>
	<tr>
		<td>Confirm password</td>
		<td><?php echo form_password('password_confirm'); ?></td>
	</tr>
	
    </table>
        <div class="clear"></div>  
    <p class="center"><input type="submit" value="Complete Install" class="btn"></p>
  
	<?php echo form_close();?>

  
    </div>
    <div class="clear"></div>  
    </section>
</div>
<footer>
  <div class="wrapper"><small>&copy; 2013-14 <a href="http://www.dushyantkanungo.com" target="_blank">Dushyant Kanungo</a> | Digital Media Project | B.Sc. (Hons) Web Design Year 3 | University of the West of England, Bristol. </small></div>
</footer>
</body>
</html>
