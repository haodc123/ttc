<?php
ob_start();
session_start();
require_once('z-include/se_url.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('z-include/css.php'); ?>
<?php require_once('z-include/ad_css.php'); ?>
<?php require_once('z-include/js.php'); ?>
<?php require_once('connect/connect.php'); ?>
<?php require_once('func/main.php'); ?>
<script type="text/javascript" src="editor/scripts/innovaeditor.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Quản trị Shop hàng - <?php require_once('z-include/title_p2.php'); ?>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) { 
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}
//-->
</script>
</head>

<body id="admin">
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
        
<?php
$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
$gerror = htmlspecialchars(mysql_real_escape_string($_GET['error']));
$gstep = htmlspecialchars(mysql_real_escape_string($_GET['step']));
$_SESSION['NameNone'] = $_SESSION['aaa'];
$que_uc = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
$row_uc = mysql_fetch_object($que_uc);
$que_up = que("SELECT * FROM posts WHERE NameNone = '".$gname."'");
$row_up = mysql_fetch_object($que_up);
if ($row_uc->idUser == $row_up->idUser)
{
	$que = que("SELECT * FROM products WHERE PriProduct = 1 AND NameNone = '".$gname."'");
	$row = mysql_fetch_object($que);
	
	$pname = $row->Name;
	$nn = $row->NameNone;
	$psmr = $row->Summary;
	$view = $row->View;
	$idPr = $row->idPr;
	$idLocation = $row->idLocation;
	$idPost = $row->idPost;
	$Date = $row->Date;
	$sDate = $row->sDate;
	$idTypeProduct = $row->idTypeProduct;
	$idTypeProduct2 = $row->idTypeProduct2;
	$idOldNew = $row->idOldNew;
	$idPurpose = $row->idPurpose;
	$idUser = $row->idUser;
	$Active = $row->Active;
	
	$que1 = que("SELECT * FROM posts WHERE NameNone = '".$gname."'");
	$row1 = mysql_fetch_object($que1);
	$que_u = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
	$row_u = mysql_fetch_object($que_u);
	$que_c = que("SELECT COUNT(Name) FROM products WHERE idPost = '".$row1->idPost."'");
	$row_c = mysql_fetch_array($que_c);
	$num = $row_c['COUNT(Name)'];
	$num ++;

	$_SESSION['NameNone'] = $_SESSION['aaa'];
	if ($gdo == '')
	{
?>
        	<h1 class="h1_up_title">Sửa thông tin Shop hàng - Thêm ảnh :</h1>
            
        <div class="div_up" id="ad_mgr">
		<?php
		if ($gstep == '1')
		{
		?>
          <form class="fup" name="fad_post" method="post" action="edit_post_addimg.php?do=edit&step=1&name=<?php echo $gname; ?>">

                <label>Bạn muốn đăng lên thêm bao nhiêu hình : </label>
                <label id="note">Bạn chú ý rằng đây là những hình được đưa ra riêng (bên cạnh nội dung shop hàng) và có giá cụ thể từng món hàng</label>
                <input class="fuptxt" id="addimg" name="fadp_many" type="text" /><br />
          		<input class="fupimg_add" name="fadp_img" type="image" src="templates/but_tieptuc_gr.png" />
                <div class="clear"></div>
          </form>
       <?php
	   }
	   elseif ($gstep == '2')
	   {
	   ?>
                
			<?php
            $que_prs = que("SELECT * FROM products WHERE PriProduct = 0 AND NameNone = '".$gname."' ORDER BY Number ASC");
            $i = $num;
			?>
            <form class="fup" enctype="multipart/form-data" name="fup2" method="post" action="edit_post_addimg.php?do=edit&step=2&name=<?php echo $gname; ?>">
				<?php
                while ($i <= ($_SESSION['addimg'] + $row_c['COUNT(Name)']))
                {
                ?>
                
                    <label class="label_short">Hình <?php echo $i; ?> : </label>
                    <input class="fupimgs" name="fup_img_<?php echo $i; ?>" type="file" />
                    <label class="label_short">Giá : </label>
                    <input class="fuptxt" id="price" name="fup_price_<?php echo $i; ?>" type="text" />
                    <label class="label_short">VNĐ</label>
                    <div class="clear"></div>
                    
                
                <?php
                $i ++;
                } // while ($i <= ($_SESSION['addimg'] + $row_c['COUNT(Name)']))
                ?>
                	<input class="fupimg" name="fup_img" type="image" src="templates/but_danglen_gr.png" />
                    <div class="clear"></div>
            </form>
            <?php
        } // elseif ($gstep == '2')
            ?>
<?php
	}
	elseif ($gdo == 'edit')
	{
		if ($gstep == '1')
		{
			$_SESSION['addimg'] = $_POST['fadp_many'];
			header ('Location: edit_post_addimg.php?step=2&name='.$gname);
		}
		if ($gstep == '2')
		{
			$i = $num;
			for ($i; $i <= ($_SESSION['addimg'] + $row_c['COUNT(Name)']); $i++)
			{
				if ($_FILES['fup_img_'.$i]['name'] <> '')
				{
					$pimg[$i] = htmlspecialchars(mysql_real_escape_string($_FILES['fup_img_'.$i]['name']));
					$pprice[$i] = htmlspecialchars(mysql_real_escape_string($_POST['fup_price_'.$i]));
					$pimg[$i] = renameImg($pimg[$i]);
					
					$ex3 = substr($_FILES['fup_img_'.$i]['name'],-3);
					$ex4 = substr($_FILES['fup_img_'.$i]['name'],-4);
					$ex = array('jpg','jpeg','png','gif','bmp');
					for ($j = 0; $j < count($ex); $j ++)
					{
						if ($ex3 == $ex[$j] || $ex4 == $ex[$j])
						{
					move_uploaded_file($_FILES['fup_img_'.$i]['tmp_name'],"images/". $pimg[$i]);
					$quei = que("INSERT INTO products (Name, NameNone, Summary, Price, View, idPr, idLocation, idPost, Date, sDate, urlImg, PriProduct, Number, idTypeProduct, idTypeProduct2, idOldNew, idPurpose, idUser, Active) VALUES ('$pname', '$nn', '$psmr', '$pprice[$i]', '$view', '$idPr', '$idLocation', '$idPost', '$Date', '$sDate', '$pimg[$i]', '0', '$i', '$idTypeProduct', '$idTypeProduct2', '$idOldNew', '$idPurpose', '$idUser', '$Active')");
						}
					}
				} // if ($_FILES['fup_img_'.$i]['name'] <> '')
			}
			$que_uc2 = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
			$row_uc2 = mysql_fetch_object($que_uc2);
			$nEdit = $row_uc2->nEdit - 1;
			$queu = que("UPDATE users SET nEdit = '$nEdit' WHERE NameNone = '".$_SESSION['NameNone']."'");
			header ('Location: edit_post_addimg.php?do=finish&name='.$gname);
		} // if ($gstep == '2')
	}
	elseif ($gdo == 'finish')
	{
		echo '<p>Bạn đã thêm ảnh thành công</p><br />';
		echo '<a href="detail_product.php?name='.$gname.'">Di chuyển tới shop hàng vừa sửa</a><br /><br />';
	}
}	
else
	echo 'Bạn phải <a href="login.php">đăng nhập</a> và phải là Chủ của Shop này mới có quyền sửa<br /><br />';
?>
			</div>
        </div>
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
