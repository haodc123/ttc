<?php
session_start();
require_once('connect/connect.php');
require_once('func/main.php');
$gtype = htmlspecialchars(mysql_real_escape_string($_GET['type']));
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
$gnameto = htmlspecialchars(mysql_real_escape_string($_GET['nameto']));

if ($gtype == 'posts')
{
	$que2 = que("SELECT * FROM posts WHERE NameNone = '".$gname."'");
	$row2 = mysql_fetch_object($que2);
	$idPost = $row2->idPost;
	$pname = htmlspecialchars(mysql_real_escape_string($_POST['fc_name']));
	$pcontent = $_POST['fc_content'];
	$Date = date("Y-n-d H:i:s");
	$sDate = date("d-n-Y");
	$IP = $_SERVER['REMOTE_ADDR'];
	
	if (isset($_SESSION['Name']))
	{
		$que = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
		$row = mysql_fetch_object($que);
		$idUser = $row->idUser;
		
		$quei = que("INSERT INTO post_comments (Content, idPost, Date, sDate, idUser, IP) VALUES ('$pcontent', '$idPost', '$Date', '$sDate', '$idUser', '$IP')");
	}
	else
	{
		$idUser = 0;

		$quei = que("INSERT INTO post_comments (Name, Content, idPost, Date, sDate, idUser, IP) VALUES ('$pname', '$pcontent', '$idPost', '$Date', '$sDate', '$idUser', '$IP')");
	}
	
}
elseif ($gtype == 'shows') 
{
	$que = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
	$row = mysql_fetch_object($que);
	$idUser = $row->idUser;
	
	$que2 = que("SELECT * FROM shows WHERE NameNone = '".$gname."'");
	$row2 = mysql_fetch_object($que2);
	$idShow = $row2->idShow;
	$idUserTo = $row2->idUser;
	$pcontent = $_POST['fc_content'];
	$Date = date("Y-n-d H:i:s");
	$sDate = date("d-n-Y");
	$IP = $_SERVER['REMOTE_ADDR'];
	
	$quei = que("INSERT INTO show_comments (Content, PriShow, Date, sDate, idShow, idUser, idUserTo, IP) VALUES ('$pcontent', 0, '$Date', '$sDate', '$idShow', '$idUser', '$idUserTo', '$IP')");
	$queu = que("UPDATE shows SET LDate = '".$Date."' WHERE idShow = '".$idShow."'");

	}
elseif ($gtype == 'messages') 
{
	$que = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
	$row = mysql_fetch_object($que);
	$idUser = $row->idUser;
	
	$que = que("SELECT * FROM users WHERE NameNone = '".$gnameto."'");
	$row = mysql_fetch_object($que);
	$idUserTo = $row->idUser;
	
	$pcontent = $_POST['fm_content'];
	$Date = date("Y-n-d H:i:s");
	$sDate = date("d-n-Y");
	$IP = $_SERVER['REMOTE_ADDR'];
	
	$quei = que("INSERT INTO show_comments (Content, PriShow, Date, sDate, idShow, idUser, idUserTo, IP) VALUES ('$pcontent', -1, '$Date', '$sDate', 0, '$idUser', '$idUserTo', '$IP')");
}
	header ('Location: '.$_SESSION['url']);

?>