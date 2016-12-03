<?php
$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$_SESSION['url'] = $url;
$url2 = $url;
?>