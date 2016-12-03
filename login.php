<?php
session_start();
if ($_GET['do']=="logout") {
	header ("Location: ".$_SESSION['url']);
	session_destroy();
}
elseif (isset($_SESSION['Name'])) {
	header ('Location: home.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('z-include/css.php'); ?>
<?php require_once('z-include/js.php'); ?>
<?php require_once('connect/connect.php'); ?>
<?php require_once('func/main.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Đăng nhập - 
<?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            
            <?php
			if ($_GET['do'] == "login") {
				$user = mysql_real_escape_string($_POST['fl_user']);
				$pass = MD5($_POST['fl_pass']);
				$que = que("SELECT * FROM users WHERE Username = '".$user."' AND Password = '".$pass."'");

					$row = mysql_fetch_array($que);
					if ($row <> '') {
						$row['Name'];
						$_SESSION['Name'] = $row['Name'];
						$_SESSION['NameNone'] = $row['NameNone'];
						$_SESSION['aaa'] = $row['NameNone'];
					?>
				<div class="div_ann">
                    <div class="div_ann_title"> C H U Y Ể N &nbsp; T R A N G . . . </div>
                    <div class="div_ann_content">
						<p class="p_ann">Chào mừng thành viên <B><?php echo $_SESSION['Name']; ?></b><br /><br />
                        Trình duyệt sẽ tự trở về trang chủ sau 3 giây !!!<br /><br />
						Hoặc trở về <b><a href="<?php echo $_SESSION['url']; ?>">Trang trước</a></b></p>
					</div>
                </div>
<script language=javascript>
	function goback () {
  		window.location = "home.php";
	}
	setTimeout("goback()",3000);
</script> 
				<?php
                }
                else {
                ?>
                <div class="div_ann">
                    <div class="div_ann_title"> T H Ô N G &nbsp; B Á O </div>
                    <div class="div_ann_content">
						<p class="p_ann">Đăng nhập không thành công !</p>
                        <a href="<?php echo $_SESSION['url']; ?>"><p class="p_ann">Quay lại !</p></a>
                    </div>
                </div>
				<?php
                }
			}
			else {
			?>
            <div class="div_ann">
                <div class="div_ann_title"> Đ Ă N G &nbsp; N H Ậ P </div>
                <div class="div_ann_content">
                <form class="flogin_page" name="fl" method="post" action="login.php?do=login">
                    <label>Tên đăng nhập : </label>
                    <input class="flquery_page" name="fl_user" type="text" />
                    <div class="clear"></div>
                    <label>Mật khẩu : </label>
                    <input class="flquery_page" name="fl_pass" type="password" />
                    <div class="clear"></div>
                    <label id="stick">Ghi nhớ</label>
                    <input class="flcheck_page" type="checkbox" />
                    <div class="clear"></div>
                    <input class="flimg_page" name="fl_img" type="image" src="templates/login_gr.png" />
            	</form>
                <div class="clear"></div>
                <h1>Bạn chưa có Tài khoản, hãy <a href="register.php">Đăng ký</a></h1>
                <h1>Nếu bạn quên mật khẩu, hãy <a href="lost_pass.php">Vào đây</a></h1>
                </div>
            </div>
            <?php
			}
			?>
                
            </div><!-- .content -->
            <?php require_once('z-include/sidebar_right.php'); ?>
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->

    <?php require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
