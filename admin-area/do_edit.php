<?php
ob_start();
session_start();
require_once('../connect/connect.php');
require_once('../func/main.php');
$gtype = htmlspecialchars(mysql_real_escape_string($_GET['type']));
$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));

if ($gtype == 'products')
{
	if ($gdo == 'edit')
	{
		$pname = htmlspecialchars(mysql_real_escape_string($_POST['fadp_name']));
		//$pview = htmlspecialchars(mysql_real_escape_string($_POST['fadp_view']));
		$ptype2 = htmlspecialchars(mysql_real_escape_string($_POST['fadp_type2']));
		$ppro = htmlspecialchars(mysql_real_escape_string($_POST['fadp_promote']));
		$plocation = htmlspecialchars(mysql_real_escape_string($_POST['fadp_location']));
		$poldnew = htmlspecialchars(mysql_real_escape_string($_POST['fadp_oldnew']));
		$ppurpose = htmlspecialchars(mysql_real_escape_string($_POST['fadp_purpose']));
		$psmr = mysql_real_escape_string($_POST['fadp_smr']);
		$pcnt = mysql_real_escape_string($_POST['fadp_content']);
		$pstatus = htmlspecialchars(mysql_real_escape_string($_POST['fadp_status']));
		$ppricepri = htmlspecialchars(mysql_real_escape_string($_POST['fadp_price_pri']));

		$que_p = que("SELECT * FROM posts WHERE NameNone = '".$gname."'");
		$row_p = mysql_fetch_object($que_p);
		$idPost = $row_p->idPost;
		
		$que_prs = que("SELECT * FROM products WHERE PriProduct = 0 AND NameNone = '".$gname."'");
		$i = 2;
		while ($row_prs = mysql_fetch_object($que_prs))
		{
			$pprice[$i] = htmlspecialchars(mysql_real_escape_string($_POST['fadp_price_'.$i]));
			$i ++;
		}
		switch ($pstatus)
		{
			case 'Đã kích hoạt':
				$pstatus2 = 1;
				break;
			case 'Chưa kích hoạt':
				$pstatus2 = 0;
				break;
			default:
				$pstatus2 = 0;
		}
		
		$que = que("SELECT * FROM typeproducts2 WHERE Name = '".$ptype2."'");
		$row = mysql_fetch_object($que);
		$idTypeProduct2 = $row->idTypeProduct2;
		$idTypeProduct = $row->idTypeProduct;
		
		$que = que("SELECT * FROM promote WHERE Name = '".$ppro."'");
		$row = mysql_fetch_object($que);
		$idPr = $row->idPromote;
		
		$que = que("SELECT * FROM location WHERE Name = '".$plocation."'");
		$row = mysql_fetch_object($que);
		$idLocation = $row->idLocation;
		
		$que = que("SELECT * FROM oldnew WHERE Name = '".$poldnew."'");
		$row = mysql_fetch_object($que);
		$idOldNew = $row->idOldNew;
		
		$que = que("SELECT * FROM purposes WHERE Name = '".$ppurpose."'");
		$row = mysql_fetch_object($que);
		$idPurpose = $row->idPurpose;
		
		$Date = date("Y-n-d H:i:s");
		
		$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
		$row = mysql_fetch_object($que);
		$idUserE = $row->idUser;
		
		$queu = que("UPDATE posts SET Name = '$pname', Summary = '$psmr', Content = '$pcnt', idPr = '$idPr', Active = '$pstatus2', idUserE = '$idUserE' WHERE NameNone = '$gname'");

		$queu = que("UPDATE products SET Name = '$pname', Summary = '$psmr', idPr = '$idPr', Price = '$ppricepri', idLocation = '$idLocation', idPost = '$idPost', idTypeProduct = '$idTypeProduct', idTypeProduct2 = '$idTypeProduct2', idOldNew = '$idOldNew', idPurpose = '$idPurpose', Active = '$pstatus2' WHERE NameNone = '$gname' AND PriProduct = 1");

		$que_prs = que("SELECT * FROM products WHERE PriProduct = 0 AND NameNone = '".$gname."' ORDER BY Number ASC");
		$i = 2;
		while ($row_prs = mysql_fetch_object($que_prs))
		{
			$queu = que("UPDATE products SET Name = '$pname', Summary = '$psmr', idPr = '$idPr', Price = '$pprice[$i]', idLocation = '$idLocation', idPost = '$idPost', idTypeProduct = '$idTypeProduct', idTypeProduct2 = '$idTypeProduct2', idOldNew = '$idOldNew', idPurpose = '$idPurpose', Active = '$pstatus2' WHERE NameNone = '$gname' AND Number = '$i'");
		$i ++;
		}
		
		$_SESSION['last'] = $gname;
		header ('Location: manager.php?do=finish');
	}
	elseif ($gdo == 'del')
	{
		header ('Location: manager.php?do=confirm&name='.$gname);
	}
	elseif ($gdo == 'delok')
	{
		$qued = que("DELETE FROM posts WHERE NameNone = '$gname'");
		$qued = que("DELETE FROM products WHERE NameNone = '$gname'");
		header ('Location: list_posts.php');
	}
	elseif ($gdo == 'delcancel')
	{
		header ('Location: manager.php?name='.$gname);
	}

} // if ($gtype == 'products') 
elseif ($gtype == 'shows')
{
	if ($gdo == 'edit')
	{
		$pname = htmlspecialchars(mysql_real_escape_string($_POST['fadp_name']));
		$psmr = mysql_real_escape_string($_POST['fadp_smr']);
		$pcnt = mysql_real_escape_string($_POST['fadp_content']);
		$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
		$row = mysql_fetch_object($que);
		$idUserE = $row->idUser;
		$pstatus = htmlspecialchars(mysql_real_escape_string($_POST['fadp_status']));
		switch ($pstatus)
		{
			case 'Đã kích hoạt':
				$pstatus2 = 1;
				break;
			case 'Chưa kích hoạt':
				$pstatus2 = 0;
				break;
			default:
				$pstatus2 = 0;
		}
		
		$queu = que("UPDATE shows SET Name = '$pname', Summary = '$psmr', Content = '$pcnt',  Active = '$pstatus2', idUserE = '$idUserE' WHERE NameNone = '$gname'");
		$_SESSION['last'] = $gname;
		header ('Location: manager_show.php?do=finish');
	}
	elseif ($gdo == 'del')
	{
		header ('Location: manager_show.php?do=confirm&name='.$gname);
	}
	elseif ($gdo == 'delok')
	{
		$qued = que("DELETE FROM shows WHERE NameNone = '$gname'");
		$qued = que("DELETE FROM show_comments WHERE NameNone = '$gname'");
		header ('Location: list_shows.php');
	}
	elseif ($gdo == 'delcancel')
	{
		header ('Location: manager_show.php?name='.$gname);
	}
}
elseif ($gtype == 'news')
{
	if ($gdo == 'edit')
	{
		$pname = htmlspecialchars(mysql_real_escape_string($_POST['fadp_name']));
		$ptype = htmlspecialchars(mysql_real_escape_string($_POST['fadp_type']));
		$psmr = mysql_real_escape_string($_POST['fadp_smr']);
		$pcnt = mysql_real_escape_string($_POST['fadp_content']);
		$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
		$row = mysql_fetch_object($que);
		$idUser = $row->idUser;
		$pstatus = htmlspecialchars(mysql_real_escape_string($_POST['fadp_status']));
		switch ($pstatus)
		{
			case 'Đã kích hoạt':
				$pstatus2 = 1;
				break;
			case 'Chưa kích hoạt':
				$pstatus2 = 0;
				break;
			default:
				$pstatus2 = 0;
		}
		
		$que = que("SELECT * FROM typenews WHERE Name = '".$ptype."'");
		$row = mysql_fetch_object($que);
		$idTypeNews = $row->idTypeNews;
		
		$queu = que("UPDATE news SET Name = '$pname', Summary = '$psmr', Content = '$pcnt', idTypeNews = '$idTypeNews', Active = '$pstatus2', idUser = '$idUser' WHERE NameNone = '$gname'");
		$_SESSION['last'] = $gname;
		header ('Location: manager_news.php?do=finish');
	}
	elseif ($gdo == 'add')
	{
		$pimg = htmlspecialchars(mysql_real_escape_string($_FILES['fadp_img']['name']));
		$pimg = renameImg($pimg);
			$ex3 = substr($_FILES['fadp_img']['name'],-3);
			$ex4 = substr($_FILES['fadp_img']['name'],-4);
			$ex = array('jpg','jpeg','png','gif','bmp');
			for ($j = 0; $j < count($ex); $j ++)
			{
				if ($ex3 == $ex[$j] || $ex4 == $ex[$j])
				{
					move_uploaded_file($_FILES['fadp_img']['tmp_name'],"../images/". $pimg);
				}
			}
		
		$pname = htmlspecialchars(mysql_real_escape_string($_POST['fadp_name']));
		$pnn = changeTitle($pname);
		$ptype = htmlspecialchars(mysql_real_escape_string($_POST['fadp_type']));
		$psmr = mysql_real_escape_string($_POST['fadp_smr']);
		$pcnt = mysql_real_escape_string($_POST['fadp_content']);
		$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
		$row = mysql_fetch_object($que);
		$idUser = $row->idUser;
		$Date = date("Y-n-d H:i:s");
		$sDate = date("d-n-Y");
		$pstatus = htmlspecialchars(mysql_real_escape_string($_POST['fadp_status']));
		switch ($pstatus)
		{
			case 'Đã kích hoạt':
				$pstatus2 = 1;
				break;
			case 'Chưa kích hoạt':
				$pstatus2 = 0;
				break;
			default:
				$pstatus2 = 0;
		}
		
		$que = que("SELECT * FROM typenews WHERE Name = '".$ptype."'");
		$row = mysql_fetch_object($que);
		$idTypeNews = $row->idTypeNews;
		
		$queu = que("INSERT INTO news (Name, NameNone, Summary, Content, urlImg, idTypeNews, Date, sDate, Active, idUser) VALUES ('$pname', '$pnn', '$psmr', '$pcnt', '$pimg', '$idTypeNews', '$Date', '$sDate', '$pstatus2', '$idUser')");
		header ('Location: manager_news.php?do=finish');
	}
	elseif ($gdo == 'del')
	{
		header ('Location: manager_news.php?do=confirm&name='.$gname);
	}
	elseif ($gdo == 'delok')
	{
		$qued = que("DELETE FROM news WHERE NameNone = '$gname'");
		header ('Location: list_news.php');
	}
	elseif ($gdo == 'delcancel')
	{
		header ('Location: manager_news.php?name='.$gname);
	}
}
?>