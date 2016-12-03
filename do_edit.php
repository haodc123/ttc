<?php
ob_start();
session_start();
require_once('connect/connect.php');
require_once('func/main.php');
$gtype = htmlspecialchars(mysql_real_escape_string($_GET['type']));
$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));

if ($gtype == 'products')
{
	if ($gdo == 'edit')
	{
		$pname = htmlspecialchars(mysql_real_escape_string($_POST['fadp_name']));
		$ptype2 = htmlspecialchars(mysql_real_escape_string($_POST['fadp_type2']));
		$ppro = htmlspecialchars(mysql_real_escape_string($_POST['fadp_promote']));
		$plocation = htmlspecialchars(mysql_real_escape_string($_POST['fadp_location']));
		$poldnew = htmlspecialchars(mysql_real_escape_string($_POST['fadp_oldnew']));
		$ppurpose = htmlspecialchars(mysql_real_escape_string($_POST['fadp_purpose']));
		$psmr = mysql_real_escape_string($_POST['fadp_smr']);
		$pcnt = mysql_real_escape_string($_POST['fadp_content']);
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
		
		$queu = que("UPDATE posts SET Name = '$pname', Summary = '$psmr', Content = '$pcnt', idPr = '$idPr' WHERE NameNone = '$gname'");

		$queu = que("UPDATE products SET Name = '$pname', Summary = '$psmr', idPr = '$idPr', Price = '$ppricepri', idLocation = '$idLocation', idPost = '$idPost', idTypeProduct = '$idTypeProduct', idTypeProduct2 = '$idTypeProduct2', idOldNew = '$idOldNew', idPurpose = '$idPurpose' WHERE NameNone = '$gname' AND PriProduct = 1");

		$que_prs = que("SELECT * FROM products WHERE PriProduct = 0 AND NameNone = '".$gname."' ORDER BY Number ASC");
		$i = 2;
		while ($row_prs = mysql_fetch_object($que_prs))
		{
			$queu = que("UPDATE products SET Name = '$pname', Summary = '$psmr', idPr = '$idPr', Price = '$pprice[$i]', idLocation = '$idLocation', idPost = '$idPost', idTypeProduct = '$idTypeProduct', idTypeProduct2 = '$idTypeProduct2', idOldNew = '$idOldNew', idPurpose = '$idPurpose' WHERE NameNone = '$gname' AND Number = '$i'");
		$i ++;
		}
		
		$que_uc = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
		$row_uc = mysql_fetch_object($que_uc);
		$nEdit = $row_uc->nEdit - 1;
		$queu = que("UPDATE users SET nEdit = '$nEdit' WHERE NameNone = '".$_SESSION['NameNone']."'");
		
		$_SESSION['last'] = $gname;
		header ('Location: edit_post.php?do=finish&name='.$gname);

	}
	elseif ($gdo == 'del')
	{
		header ('Location: edit_post.php?do=confirm&name='.$gname);
	}
	elseif ($gdo == 'delok')
	{
		$qued = que("DELETE FROM posts WHERE NameNone = '$gname'");
		$qued = que("DELETE FROM products WHERE NameNone = '$gname'");
		header ('Location: edit_post.php?do=delfinish');
	}
	elseif ($gdo == 'delcancel')
	{
		header ('Location: edit_post.php?name='.$gname);
	}

} // if ($gtype == 'products') 

?>