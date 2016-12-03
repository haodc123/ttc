<?php
session_start();
require_once('connect/connect.php');
require_once('func/main.php');
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));

	if (isset($_SESSION['Name']))
	{
		$que = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
		$row = mysql_fetch_object($que);
		$idUser = $row->idUser;
	}
	else
		$idUser = 0;
	
	$que2 = que("SELECT * FROM shows WHERE NameNone = '".$gname."'");
	$row2 = mysql_fetch_object($que2);
	$idShow = $row2->idShow;
	$nLike = $row2->nLike + 1;
	
	$Date = date("Y-n-d H:i:s");

	$IP = $_SERVER['REMOTE_ADDR'];

	$quei = que("INSERT INTO likes (idUser, IP, idShow, Date) VALUES ('$idUser', '$IP', '$idShow', '$Date')");
	
	$queu = que("UPDATE shows SET nLike = '".$nLike."' WHERE NameNone = '".$gname."'");
	
	header ('Location: '.$_SESSION['url']);
?>