<?php
ob_start();
session_start();
require_once('connect/connect.php');
require_once('func/main.php');
$gtype = htmlspecialchars(mysql_real_escape_string($_GET['type']));
$gstep = htmlspecialchars(mysql_real_escape_string($_GET['step']));

if ($gtype == 'products')
{
	if ($gstep == '1')
	{
		$_SESSION['pname'] = htmlspecialchars(mysql_real_escape_string($_POST['fup_name']));
		$_SESSION['ptype'] = htmlspecialchars(mysql_real_escape_string($_POST['fup_type']));
		$_SESSION['ppro'] = htmlspecialchars(mysql_real_escape_string($_POST['fup_promote']));
		$_SESSION['plocation'] = htmlspecialchars(mysql_real_escape_string($_POST['fup_location']));
		$_SESSION['poldnew'] = htmlspecialchars(mysql_real_escape_string($_POST['fup_oldnew']));
		$_SESSION['ppurpose'] = htmlspecialchars(mysql_real_escape_string($_POST['fup_purpose']));
		$_SESSION['psmr'] = mysql_real_escape_string($_POST['fup_smr']);
		$_SESSION['pcontent'] = mysql_real_escape_string($_POST['fup_content']);
		
		if ($_SESSION['pname'] == '' || $_SESSION['psmr'] == '' || $_SESSION['pcontent'] == '')
			header ('Location: up_products.php?error=blank');
		elseif (strlen($_SESSION['pname']) > 65)
			header ('Location: up_products.php?error=long');
		else
			header ('Location: up_products.php?step=2p');
	}
	elseif ($gstep == '2p')
	{
		$pmanyImg = htmlspecialchars(mysql_real_escape_string($_POST['fup_manyImg']));
		switch ($pmanyImg)
		{
			case 'Dưới 10':
				$_SESSION['manyImg'] = 10;
				break;
			case '10 - 20':
				$_SESSION['manyImg'] = 20;
				break;
			default:
				$_SESSION['manyImg'] = 50;
		}
		header ('Location: up_products.php?step=2');
	}
	elseif ($gstep == '2')
	{
		if ($_FILES['fup_img_pri']['name'] == '' || $_POST['fup_price_pri'] == '')
			header ('Location: up_products.php?error=blankimg');
		else
		{
			$pimgpri = htmlspecialchars(mysql_real_escape_string($_FILES['fup_img_pri']['name']));
			$pimgpri = renameImg($pimgpri);		
			$ppricepri = htmlspecialchars(mysql_real_escape_string($_POST['fup_price_pri']));
			
			for ($i=1; $i<=$_SESSION['manyImg']; $i++)
			{
				if ($_FILES['fup_img_'.$i]['name'] <> '')
				{
				$pimg[$i] = htmlspecialchars(mysql_real_escape_string($_FILES['fup_img_'.$i]['name']));
				$pprice[$i] = htmlspecialchars(mysql_real_escape_string($_POST['fup_price_'.$i]));
				$pimg[$i] = renameImg($pimg[$i]);
				}
			}
			
			$pname = $_SESSION['pname'];
			$NameNone = changeTitle($pname);
			
			$que = que("SELECT * FROM typeproducts2 WHERE Name = '".$_SESSION['ptype']."'");
			$row = mysql_fetch_object($que);
			$idTypeProduct2 = $row->idTypeProduct2;
			$idTypeProduct = $row->idTypeProduct;
			
			$que = que("SELECT * FROM promote WHERE Name = '".$_SESSION['ppro']."'");
			$row = mysql_fetch_object($que);
			$idPr = $row->idPromote;
			
			$que = que("SELECT * FROM location WHERE Name = '".$_SESSION['plocation']."'");
			$row = mysql_fetch_object($que);
			$idLocation = $row->idLocation;
			
			$que = que("SELECT * FROM oldnew WHERE Name = '".$_SESSION['poldnew']."'");
			$row = mysql_fetch_object($que);
			$idOldNew = $row->idOldNew;
			
			$que = que("SELECT * FROM purposes WHERE Name = '".$_SESSION['ppurpose']."'");
			$row = mysql_fetch_object($que);
			$idPurpose = $row->idPurpose;
			
			$psmr = $_SESSION['psmr'];
			$pcontent = $_SESSION['pcontent'];
			$Date = date("Y-n-d H:i:s");
			$sDate = date("d-n-Y");
			$IP = $_SERVER['REMOTE_ADDR'];
			
			$que = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
			$row = mysql_fetch_object($que);
			$idUser = $row->idUser;
			
			$quei = que("INSERT INTO posts (Name, NameNone, Summary, Content, idPr, Date, sDate, idUser, IP, Active) VALUES ('$pname', '$NameNone', '$psmr', '$pcontent', '$idPr', '$Date', '$sDate', '$idUser', '$IP', '0')");
			
			$idPost = mysql_insert_id();
			move_uploaded_file($_FILES['fup_img_pri']['tmp_name'],"images/". $pimgpri);
			$quei = que("INSERT INTO products (Name, NameNone, Summary, Price, idPr, idLocation, idPost, Date, sDate, urlImg, PriProduct, Number, idTypeProduct, idTypeProduct2, idOldNew, idPurpose, idUser, Active) VALUES ('$pname', '$NameNone', '$psmr', '$ppricepri', '$idPr', '$idLocation', '$idPost', '$Date', '$sDate', '$pimgpri', '1', '1', '$idTypeProduct', '$idTypeProduct2', '$idOldNew', '$idPurpose', '$idUser', '0')");
	
			for ($i=1; $i<=$_SESSION['manyImg']; $i++)
			{
				if ($_FILES['fup_img_'.$i]['name'] <> '')
				{
					$ex3 = substr($_FILES['fup_img_'.$i]['name'],-3);
					$ex4 = substr($_FILES['fup_img_'.$i]['name'],-4);
					$ex = array('jpg','jpeg','png','gif','bmp');
					for ($j = 0; $j < count($ex); $j ++)
					{
						if ($ex3 == $ex[$j] || $ex4 == $ex[$j])
						{
				$k = $i + 1;
				move_uploaded_file($_FILES['fup_img_'.$i]['tmp_name'],"images/". $pimg[$i]);
				$quei = que("INSERT INTO products (Name, NameNone, Summary, Price, idPr, idLocation, idPost, Date, sDate, urlImg, PriProduct, Number, idTypeProduct, idTypeProduct2, idOldNew, idPurpose, idUser, Active) VALUES ('$pname', '$NameNone', '$psmr', '$pprice[$i]', '$idPr', '$idLocation', '$idPost', '$Date', '$sDate', '$pimg[$i]', '0', '$k', '$idTypeProduct', '$idTypeProduct2', '$idOldNew', '$idPurpose', '$idUser', '0')");
						}
					}
				} // if ($_FILES['fup_img_'.$i]['name'] <> '')
			} // for ($i=1; $i<=$_SESSION['manyImg']; $i++)
			$_SESSION['Post'] = $NameNone;
			$que_u_npost = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['aaa']."'");
			$row_u_npost = mysql_fetch_object($que_u_npost);
			$nPosts = $row_u_npost->nPosts -1;
			$queu_npost = que("UPDATE users SET nPosts = '".$nPosts."' WHERE NameNone = '".$_SESSION['aaa']."'");
			header ('Location: up_products.php?do=finish');
		} // if ($_FILES['fup_img_pri']['name'] == '' || $_POST['fup_price_pri'] == '')
	} // elseif ($gstep == '2')
} // if ($gtype == 'products')

if ($gtype == 'shows')
{
	$pname = htmlspecialchars(mysql_real_escape_string($_POST['fup_name']));
	$pimg = htmlspecialchars(mysql_real_escape_string($_FILES['fup_img']['name']));
	$psmr = mysql_real_escape_string($_POST['fup_smr']);
	$pcontent = mysql_real_escape_string($_POST['fup_content']);
	if ($pname <> '' && $pimg <> '' && $psmr <> '' && $pcontent <> '')
	{
		$NameNone = changeTitle($pname);
		$Date = date("Y-n-d H:i:s");
		$sDate = date("d-n-Y");
		$IP = $_SERVER['REMOTE_ADDR'];
		$que = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
		$row = mysql_fetch_object($que);
		$idUser = $row->idUser;
		
		$rand = rand(0, 99999);
		$extimg = substr($pimg, -4);
		if ($extimg <> 'jpeg')
		{
			$pimg = 'Shop4la - '.substr($pimg, 0, -4).'-'.$rand.substr($pimg, -4);;
		}
		else
		{
			$pimg = 'Shop4la - '.substr($pimg, 0, -5).'-'.$rand.substr($pimg, -5);;
		}
		
		$ex3 = substr($_FILES['fup_img']['name'],-3);
		$ex4 = substr($_FILES['fup_img']['name'],-4);
		$ex = array('jpg','jpeg','png','gif','bmp');
			for ($j = 0; $j < count($ex); $j ++)
			{
				if ($ex3 == $ex[$j] || $ex4 == $ex[$j])
				{
				move_uploaded_file($_FILES['fup_img']['tmp_name'],"images/". $pimg);
				$quei = que("INSERT INTO shows (Name, NameNone, urlImg, Summary, Content, Date, sDate, LDate, idUser, IP, Active) VALUES ('$pname', '$NameNone', '$pimg', '$psmr', '$pcontent', '$Date', '$sDate', '$Date', '$idUser', '$IP', '0')");
				$idShow = mysql_insert_id();
				$quei = que("INSERT INTO show_comments (Name, NameNone, Content, PriShow, Date, sDate, idShow, idUser, idUserTo, IP) VALUES ('$pname', '$NameNone', '$pcontent', 1, '$Date', '$sDate', '$idShow', '$idUser', '$idUser', '$IP')");
				}
			}
		$_SESSION['Show'] = $NameNone;
		header ('Location: up_shows.php?do=finish');
	}
	else
	{
		header ('Location: up_shows.php?error=blank');
	}
}
?>