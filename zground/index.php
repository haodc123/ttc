<?php
ob_start();
session_start();
require_once('../z-include/se_url.php');
?>
<?php require_once('../connect/connect.php'); ?>
<?php require_once('../func/main.php'); ?>
<?php
$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
$row = mysql_fetch_object($que);
if ($row->idGroup == -1)
	header ('Location: list_posts.php?type=all');
else
	echo 'You must <a href="../login.php">Login</a> and is an admin';
?>