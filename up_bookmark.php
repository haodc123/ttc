<?php
ob_start();
session_start();
require_once('connect/connect.php');
require_once('func/main.php');
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
$Date = date("Y-n-d H:i:s");
$IP = $_SERVER['REMOTE_ADDR'];
$que = que("SELECT * FROM products WHERE NameNone = '".$gname."'");
$row = mysql_fetch_object($que);
$idProduct = $row->idProduct;
	
if (isset($_SESSION['Name']))
{
	$que = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
    $row = mysql_fetch_object($que);
	$idUser = $row->idUser;
	$quei = que("INSERT INTO bookmarks (idUser, idProduct, Date, IP) VALUES ('$idUser', '$idProduct', '$Date', '$IP')");
}
else
{
	$que = que("SELECT * FROM xusers");
	$new = true;
	while ($row = mysql_fetch_object($que))
	{
		if ($IP == $row->IP)
		{
			$idXUser = $row->idXUser;
			$quei = que("INSERT INTO bookmarks (idXUser, idProduct, Date, IP) VALUES ('$idXUser', '$idProduct', '$Date', '$IP')");
			$new = false;
		}
	} // while ($row = mysql_fetch_object($que))
	if ($new == true)
	{
		$quei = que("INSERT INTO xusers (IP, Date) VALUES ('$IP', '$Date')");
		$idXUser = mysql_insert_id();
		$quei = que("INSERT INTO bookmarks (idXUser, idProduct, Date, IP) VALUES ('$idXUser', '$idProduct', '$Date', '$IP')");
	}
}
$bm = mysql_insert_id();
$_SESSION[$bm.'BMidProduct'] = $idProduct;
header ('Location: '.$_SESSION['url']);
?>