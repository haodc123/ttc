<?php
ob_start();
session_start();
require_once('z-include/se_url.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('z-include/css.php'); ?>
<?php require_once('z-include/js.php'); ?>
<?php require_once('connect/connect.php'); ?>
<?php require_once('func/main.php'); ?>
<?php require_once('func/calendar/calendar/classes/tc_calendar.php'); ?>
<script language="javascript" src="func/calendar/calendar/calendar.js"></script>
<link href="func/calendar/calendar/calendar.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cá nhân - <?php require_once('z-include/title_p2.php'); ?>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            
            <?php		
			$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
			$gpart = htmlspecialchars(mysql_real_escape_string($_GET['part']));
			$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
			$que = que("SELECT * FROM users WHERE NameNone = '".$gname."'");
			$row = mysql_fetch_object($que);
			if ($gpart <> '')
			{
			?>
            
            	<div class="div_products">
                	<div class="div_product" id="personal">
                
                	<a class="a_img" href="personal.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo replaceAva($row->urlAvatar); ?>" alt="<?php echo $row->Name; ?>" /></a>
                    
                    <div class="info">
                    	<div class="div_rate">
						<?php
						$que2 = que("SELECT * FROM packages WHERE idPackage = '".$row->idPackage."'");
						$row2 = mysql_fetch_object($que2);
						if ($row2->Name == 'Vàng')
							echo '<img src="templates/icon_gold.png" />';
						elseif ($row2->Name == 'Bạc')
							echo '<img src="templates/icon_silver.png" />';
						?>
                        </div>
                        
                        <a class="a_name" href="personal.php?name=<?php echo $row->NameNone; ?>"><?php echo $row->Name; ?></a><br />
                        <div class="clear"></div>
                        <div class="info_left">
                            <p class="p_line1">
                                Ngày đăng ký : 
                                <?php DateFriendly($row->sRegDate); ?>
                            </p>
                            <p class="p_line2">
                                <?php
                                if ($row->idTypeUser <> 1) echo 'Số lần Post : '.$row->nPosts;
                                ?>
                            </p>
                            <p class="p_line3">
                                <?php
                                if ($row->idTypeUser <> 1) echo 'Số lượt Up : '.$row->nUp;
                                ?>
                            </p>
                        </div>
                        <div class="info_right">
                        	Email: <?php echo $row->Email; ?><br />
                            ĐT: <?php echo $row->Tel; ?><br />
							Địa chỉ: <?php echo $row->Address; ?>
                        </div>
                        
                    </div><!-- .info -->
                    <div class="clear"></div>
                    
                    </div><!-- .div_product -->
                </div><!-- .div_products -->
                    	
                <div class="div_personal_primary">

                        <div class="div_personal_content"  id="edit_personal">
                        
                            <p class="p_title">Tên đăng nhập :</p>
                            <p class="p_content"><?php echo $row->Username; ?></p><br />
							
						<?php if ($gpart == 'usn') { ?>
						<div class="clear"></div>
						<p class="p_title2">Tên đăng nhập mới :</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <input class="fpqueryu" name="fp_usn" type="text" />
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Tên hiển thị :</p>
                            <p class="p_content"><?php echo $row->Name; ?></p>
                            <div class="clear"></div>
                            
                            <p class="p_title">Mật khẩu :</p>
                            <p class="p_content">********</p>
							
						<?php if ($gpart == 'pass') { ?>
						<div class="clear"></div>
						<p class="p_title2">Mật khẩu mới :</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <input class="fpqueryu" name="fp_pass1" type="password" /><br />
							<label>Xác nhận</label>
							<input class="fpqueryu" name="fp_pass2" type="password" />
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Email :</p>
                            <p class="p_content"><?php echo $row->Email; ?></p>
							
						<?php if ($gpart == 'email') { ?>
						<div class="clear"></div>
						<p class="p_title2">Email mới :</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <input class="fpqueryu" name="fp_email" type="text" />
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Yahoo :</p>
                            <p class="p_content"><?php echo replaceText($row->Yahoo, 'Chưa có thông tin'); ?></p>
                            
                        <?php if ($gpart == 'yh') { ?>
						<div class="clear"></div>
						<p class="p_title2">Yahoo mới :</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <input class="fpqueryu" name="fp_yh" type="text" />
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Avatar :</p>
                            <?php
							$row->urlAvatar <> '' ? $ava = $row->urlAvatar : $ava = 'Chưa có thông tin';
                            if ($row->urlAvatar == '') echo '<p class="p_content">'.$ava.'</p>';
								else echo '<img class="img_content" src="images/'.$ava.'" />';
							?>
							
						<?php if ($gpart == 'ava') { ?>
						<div class="clear"></div>
						<p class="p_title2" id="title_ava">Avatar mới :</p>
						<form class="fpedit" id="f_ava" name="fp" enctype="multipart/form-data" method="post" action="edit_personal.php?do=edit">
                            <input class="fpqueryu" name="fp_ava" type="file" />
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
                            <div class="clear"></div>
                            
                            <h1>Thông tin khác</h1>
                            
                            <p class="p_title">Giới tính :</p>
                            <p class="p_content"><?php $row->Gender = 0 ? $gender = 'Nam' : $gender = 'Nữ' ; echo $gender; ?></p>
                            
						<?php if ($gpart == 'gender') { ?>
						<div class="clear"></div>
						<p class="p_title2">Cập nhật Giới tính:</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <select name="fp_gender" id="Menu">
                              <option value="0">Nam</option>
                              <option value="1">Nữ</option>
                            </select>
                          <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
							<div class="clear"></div>
                            
                            <p class="p_title">Ngày sinh :</p>
                            <p class="p_content"><?php replaceText($row->sBirDate, 'Chưa có thông tin'); ?></p>
                            
						<?php if ($gpart == 'bdate') { ?>
						<div class="clear"></div>
						<p class="p_title2">Cập nhật Ngày sinh :</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <?php
							  $myCalendar = new tc_calendar("date1", true);
							  $myCalendar->setIcon("func/calendar/calendar/images/iconCalendar.gif");
							  $myCalendar->setDate(01, 01, 2000);
							  $myCalendar->setPath("func/calendar/calendar/");
							  $myCalendar->setYearInterval(1900, 2015);
							  $myCalendar->dateAllow('1900-01-01', '2015-12-31');
							  $myCalendar->setSpecificDate(array("1900-01-01"), 0, 'month');
							  $myCalendar->setOnChange("myChanged('test')");
							  $myCalendar->writeScript();
							?>
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
							<div class="clear"></div>
                            
                            <p class="p_title">Địa chỉ :</p>
							<p class="p_content"><?php replaceText($row->Address, 'Chưa có thông tin'); ?></p>
							
						<?php if ($gpart == 'addr') { ?>
						<div class="clear"></div>
						<p class="p_title2">Cập nhật Địa chỉ:</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <input class="fpqueryu" name="fp_addr" type="text" />
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Điện thoại :</p>
                            <p class="p_content"><?php replaceText($row->Tel, 'Chưa có thông tin'); ?></p>
                            
						<?php if ($gpart == 'tel') { ?>
						<div class="clear"></div>
						<p class="p_title2">Cập nhật Số điện thoại:</p>
						<form class="fpedit" name="fp" method="post" action="edit_personal.php?do=edit">
                            <input class="fpqueryu" name="fp_tel" type="text" />
                            <input class="fpimg" name="fp_img" type="image" src="templates/but_capnhat_gr.png" />
                        </form>
						<?php } ?>
							<div class="clear"></div>
                        
                        </div><!-- .div_personal_content -->
				
                   </div><!-- .div_personal_primary -->
				   
				   <?php
				}
				elseif ($gdo == 'edit')
				{
				   $pusn = htmlspecialchars(mysql_real_escape_string($_POST['fp_usn']));
				   $ppass1 = $_POST['fp_pass1'];
				   $ppass2 = $_POST['fp_pass2'];
				   $pemail = htmlspecialchars(mysql_real_escape_string($_POST['fp_email']));
				   $pyh = htmlspecialchars(mysql_real_escape_string($_POST['fp_yh']));
				   $pgender = htmlspecialchars(mysql_real_escape_string($_POST['fp_gender']));
				   $pbdate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
				   $paddr = htmlspecialchars(mysql_real_escape_string($_POST['fp_addr']));
				   $ptel = htmlspecialchars(mysql_real_escape_string($_POST['fp_tel']));
				   
				   if ($pusn <> '')
						$queu = que("UPDATE users SET Username = '".$pusn."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   if ($ppass1 <> '' && $ppass1 == $ppass2)
				   {
						$pass = MD5($ppass1);
						$queu = que("UPDATE users SET Password = '".$pass."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   }
				   if ($pemail <> '')
						$queu = que("UPDATE users SET Email = '".$pemail."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   if ($pyh <> '')
						$queu = que("UPDATE users SET Yahoo = '".$pyh."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   if ($pgender <> '')
				   {
						$queu = que("UPDATE users SET Gender = '".$pgender."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   }
				   if ($pbdate <> '')
						$queu = que("UPDATE users SET BirDate = '".$pbdate."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   if ($paddr <> '')
						$queu = que("UPDATE users SET Address = '".$paddr."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   if ($ptel <> '')
						$queu = que("UPDATE users SET Tel = '".$ptel."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   if ($_FILES['fp_ava']['name'] <> '')
				   {
						$pava = htmlspecialchars(mysql_real_escape_string($_FILES['fp_ava']['name']));
						$extava = substr($pava, -4);
						if ($extava <> 'jpeg')
						{
						$pava = 'Shop4la - '.substr($pava, 0, -4).'-'.$rand.substr($pava, -4);;
						}
						else
						{
						$pava = 'Shop4la - '.substr($pava, 0, -5).'-'.$rand.substr($pava, -5);;
						}
						
						$ex3 = substr($_FILES['fp_ava']['name'],-3);
						$ex4 = substr($_FILES['fp_ava']['name'],-4);
						$ex = array('jpg','jpeg','png','gif','bmp');
						for ($j = 0; $j < count($ex); $j ++)
						{
							if ($ex3 == $ex[$j] || $ex4 == $ex[$j])
							{
							move_uploaded_file($_FILES['fp_ava']['tmp_name'],"images/". $pava);
							}
						}
						$queu = que("UPDATE users SET urlAvatar = '".$pava."' WHERE NameNone = '".$_SESSION['NameNone']."'");
				   }
				header ('Location: edit_personal.php?do=finish');
				} // elseif ($gdo == 'edit')
				elseif ($gdo == 'finish')
				{
				   ?>
				<div class="div_up">
					<p>Bạn đã chỉnh sửa thành công, chúc mừng bạn !</p>
					<p><a href="personal.php?name=<?php echo $_SESSION['NameNone']; ?>">Quay về</a></p>
				</div>

					<?php
				}
					?>
                        
            <div class="clear"></div>
            
            </div><!-- .content -->
            <?php require_once('z-include/sidebar_right.php'); ?>
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
