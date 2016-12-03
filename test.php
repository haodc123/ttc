<?php
session_start();
require_once('connect/connect.php');
//require_once('func/main.php');

function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
	imagejpeg($image, $destination_url, $quality);
 
	//return destination file url
	return $destination_url;
}
 
$source_photo = 'test/source.jpg';
$dest_photo = 'test/testing.jpg';
 
$d = compress_image($source_photo, $dest_photo, 60);
 
echo '
<div style="float:left;margin-right:10px">
	<img src="'.$source_photo.'" alt="" />
	<br />'.filesize($source_photo).' Bytes
</div>
 
<div style="float:left;">
	<img src="'.$dest_photo.'" alt="" />
	<br />'.filesize($dest_photo).' Bytes
</div>
';
 
?>