<?php
session_start();
$captcha_r = array("bg_captcha.gif","bg_captcha2.gif","bg_captcha3.gif");
$i = rand(0,2);
$captcha = imagecreatefromgif($captcha_r[$i]);

//set some variables
$black = imagecolorallocate($captcha, 0, 0, 0);
$white = imagecolorallocate($captcha, 225, 225, 225);
$red = imagecolorallocate($captcha, 225, 0, 0);
$font = 'HARLOWSI.TTF';
$font2 ='arial.ttf';

//random stuff
$string = md5(microtime() * mktime());
$text = substr($string, 0, 5);
$_SESSION['code'] = $text;

//create some stupid stuff

imagettftext($captcha, 16, 5, 5, 25, $red, $font2, $text);

// begin to create image
header('content-type: image/png');
imagepng($captcha);

//clean up
imagedestroy($captcha);



?>