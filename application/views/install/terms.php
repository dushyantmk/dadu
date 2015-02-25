
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
      <h1>First thing first</h1>
      <p>Step 1 of 3</p>
      <h3>Terms &amp; Conditions</h3>
      <form action="./database" method="post">
        <p>
          <textarea rows="10" cols="100" readonly>The MIT License (MIT)

Copyright (c) 2013 Dushyant Kanungo

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
</textarea>
        <p class="center">
          <input id="terms" name="terms" type="checkbox"/>
          <label for="terms">I have read and agreed to the terms &amp; conditions.</label>
        <div class="clear"></div>
        <p class="center"><input type="submit" disabled value="Proceed to Step Two" id="proceed" name="Submit"></p>
      </form>
    </div>
  </section>
  <div class="clear"></div>
</div>
<div class="clear"></div>
<script><!--
$("#terms").change(function() {
  $("#proceed").attr("disabled", !this.checked);
});
--></script>
<footer>
  <div class="wrapper"><small>&copy; 2013-14 <a href="http://www.dushyantkanungo.com" target="_blank">Dushyant Kanungo</a> | Digital Media Project | B.Sc. (Hons) Web Design Year 3 | University of the West of England, Bristol. </small></div>
</footer>
</body>
</html>
<!--
http://stackoverflow.com/questions/3565632/how-to-enable-button-when-checkbox-clicked-in-jquery
http://choosealicense.com/licenses/mit/
http://api.jquery.com/val/#val2
Mr. Ben Argo
-->
