<?php
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phản hồi - <?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            	
            <div class="div_ann">
                <div class="div_ann_title"> P H Ả N &nbsp; H Ồ I </div>
                <div class="div_ann_content">
                <form class="flogin_page" name="fr" method="post" action="do_feedback.php?do=feedback">
                    <label>Tên người đăng <span>*</span> : </label>
                    <input class="flquery_page" name="ff_author" type="text" />
                    <div class="clear"></div>
                    <label>Địa chỉ email <span>*</span> : </label>
                    <input class="flquery_page" name="ff_email" type="text" />
                    <div class="clear"></div>
                    <label>Chủ đề <span>*</span> : </label>
                    <input class="flquery_page" name="ff_name" type="text" />
                    <div class="clear"></div>
                    <label>Nội dung phản hồi <span>*</span> : </label>
                    <textarea class="fccontent" cols="35" rows="6" name="ff_content"></textarea>
                    <div class="clear"></div>
                    <label>Mã xác nhận <span>*</span> : </label>
                    <input class="flquery_page" type="text" name="captcha_cli" />
    				<div id="captcha">
                   	<img class="img_captcha" src="func/captcha/captcha.php" alt="captcha" />
                    </div>
                    <div class="clear"></div>
                    <input class="flimg_page" name="ff_img" type="image" src="templates/feedback_gr.png" />
            	</form>
                <div class="clear"></div>
                <h1></h1>
                </div>
            </div>
                
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
