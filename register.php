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
Đăng ký - 
<?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">

            <div class="div_ann">
                <div class="div_ann_title"> Đ Ă N G &nbsp; K Ý &nbsp; T H À N H &nbsp; V I Ê N </div>
                <div class="div_ann_content">
                <form class="flogin_page" name="fr" method="post" action="do_register.php?do=register">
                    <label>Tên đăng nhập <span>*</span>: </label>
                    <input class="flquery_page" name="fr_user" type="text" />
                    <div class="clear"></div>
                    <label>Tên hiển thị (tại các shop, box...) <span>*</span>: </label>
                    <input class="flquery_page" name="fr_dsp" type="text" />
                    <div class="clear"></div>
                    <label>Mật khẩu <span>*</span>: </label>
                    <input class="flquery_page" name="fr_pass" type="password" />
                    <div class="clear"></div>
                    <label>Xác nhận Mật khẩu <span>*</span>: </label>
                    <input class="flquery_page" name="fr_pass2" type="password" />
                    <div class="clear"></div>
                    <label>Email <span>*</span>: </label>
					<input class="flquery_page" name="fr_email" type="text" />
                    <div class="clear"></div>
                    <label>Nick Yahoo <span>*</span> (không ghi @yahoo.com): </label>
					<input class="flquery_page" name="fr_yh" type="text" />
                    <div class="clear"></div>
                    <label>Số Điện thoại <span>*</span>: </label>
                    <input class="flquery_page" name="fr_tel" type="text" />
                    <div class="clear"></div>
                    <label>Tên thật <span>*</span>: </label>
					<input class="flquery_page" name="fr_fname" type="text" />
                    <div class="clear"></div>
                    <label>Địa chỉ <span>*</span>: </label>
					<input class="flquery_page" name="fr_addr" type="text" />
                    <div class="clear"></div>
                    <label>Mã xác nhận <span>*</span>: </label>
                    <input class="flquery_page" type="text" name="captcha_cli" />
                    <div id="captcha">
    				<img class="img_captcha" src="func/captcha/captcha.php" alt="captcha" />
                    </div>
                    <div class="clear"></div>
                    <input class="flimg_page" name="fr_img" type="image" src="templates/register_gr.png" />
            	</form>
                <div class="clear"></div>
                <h1>Khi bạn đăng ký, nghĩa là bạn đã chấp nhận <a target="_blank" href="use.php">Điều khoản</a> của chúng tôi</h1>
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
