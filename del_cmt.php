<?php
session_start();
require_once('connect/connect.php');
require_once('func/main.php');
$gidc = htmlspecialchars(mysql_real_escape_string($_GET['idc']));

$que_d = que("UPDATE post_comments SET Active = 0 WHERE idPost_Comment = '".$gidc."'");
	header ('Location: '.$_SESSION['url']);

?>