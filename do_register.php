<?php
session_start();
require_once('z-include/se_Name.php');
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
<?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            
            <div class="div_ann">
                    <div class="div_ann_title"> T H Ô N G &nbsp; B Á O </div>
                    <div class="div_ann_content">
            
			<?php
			if ($_GET['do'] == "register") {
				$user = mysql_real_escape_string($_POST['fr_user']);
				$dsp = htmlspecialchars(mysql_real_escape_string($_POST['fr_dsp']));
				$NameNone = changeTitle($dsp);
				$pass = MD5($_POST['fr_pass']);
				$pass2 = MD5($_POST['fr_pass2']);
				$email = mysql_real_escape_string($_POST['fr_email']);
				$email_r = explode('@', $email);
				$yh = mysql_real_escape_string($_POST['fr_yh']);
				$fname = htmlspecialchars(mysql_real_escape_string($_POST['fr_fname']));
				$addr = htmlspecialchars(mysql_real_escape_string($_POST['fr_addr']));
				$tel = mysql_real_escape_string($_POST['fr_tel']);
				$RegDate = date("Y-n-d H:i:s");
				$sRegDate = date("d-n-Y");
				$IP = $_SERVER['REMOTE_ADDR'];
				$new = true;
				$que = que("SELECT * FROM users");
				
				while ($row = mysql_fetch_object($que))
				{
					if ($dsp == $row->Name)
					{
						echo '<p class="p_ann">Tên hiển thị này đã có, bạn hãy đặt 1 tên khác !</p>';
						$new = false;
					}
					elseif ($email == $row->Email)
					{
						echo '<p class="p_ann">Email này đã được sử dụng, bạn hãy lấy 1 email khác !</p>';
						$new = false;
					}
					elseif ($user == $row->Username)
					{
						echo '<p class="p_ann">Tên đăng nhập này đã có, bạn hãy đặt 1 tên khác !</p>';
						$new = false;
					}
				}
				if (preg_match("/\'/",$dsp) || preg_match("/\+/",$dsp) || preg_match("/\&/",$dsp) || preg_match("/\'/",$user) || preg_match("/\+/",$user) || preg_match("/\&/",$user))
					{
						echo '<p class="p_ann">Có những ký tự như : \', + , & trong tên của bạn, vui lòng không đặt những ký tự này !</p>';
						$new = false;
					}
				if (($user == '' || $dsp == '' || $pass == '' || $email == '' || $yh == '' || $fname == '' || $addr == '' || $pass <> $pass2 || strlen($dsp) > 30 || $email_r[1] == '' || $_POST['captcha_cli'] <> $_SESSION['code'] || $tel == '') && $new == true)
				{
					if ($user == '' || $dsp == '' || $pass == '' || $email == '' || $fname == '' || $addr == '' || $yh == '')
					{
						echo '<p class="p_ann">Tất cả các mục đều cần điền đầy đủ thông tin !</p>';
					}
					elseif ($pass <> $pass2)
					{
						echo '<p class="p_ann">Bạn có chắc mật khẩu đúng chưa ? Chúng tôi thấy bạn nhập 2 lần không thống nhất !</p>';
					}
					elseif (strlen($dsp) > 30)
					{
						echo '<p class="p_ann">Xin lỗi bạn vì sự hạn chế này, nhưng để được phục vụ tốt nhất, tên hiển thị phải < 25 ký tự !</p>';
					}
					elseif ($email_r[1] == '')
					{
						echo '<p class="p_ann">Ồ, cái email gì kỳ vậy, chữa lại đi chứ !</p>';
					}
					elseif ($_POST['captcha_cli'] <> $_SESSION['code'])
					{
						echo '<p class="p_ann">Bạn nhập sai mã xác nhận rồi !</p>';
					}
					elseif ($tel == '')
					{
						echo '<p class="p_ann">Bạn phải nhập số Điện thoại !</p>';
					}
					echo '<a href="register.php"><p class="p_ann">Quay lại !</p></a>';
				}
				elseif ($new == true)
				{
					$que = que("INSERT INTO users (Name, NameNone, Username, Password, Tel, Email, Yahoo, FName, Address, IP, RegDate, sRegDate, nPosts, nUp, idTypeUser, idGroup) VALUES ('$dsp', '$NameNone', '$user', '$pass', '$tel', '$email', '$yh', '$fname', '$addr', '$IP', '$RegDate', '$sRegDate', '60', '500', '2', '2')");
					if ($que)
					{
						echo '<p class="p_ann">Bạn đã đăng ký thành công, chúc mừng bạn. Giờ bạn đã có thể sử dụng nhiều dịch vụ và tính năng trên ThoiTrangChung.Com... !</p>';
					}
					else
					{
						echo '<p class="p_ann">Đăng ký không thành công !</p>';
                	}
                }  
			}
			?>
            
            		</div>
            	</div>
                
            </div><!-- .content -->
            <?php require_once('z-include/sidebar_right.php'); ?>
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->

    <?php require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
