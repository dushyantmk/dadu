<?php
header('Content-Type: image/png');
$image = str_replace(' ','+',$_POST['image']);
$data = base64_decode(substr($image,strpos($image	,",")+1));
file_put_contents($_POST['md5'].'.png',$data);

?>
