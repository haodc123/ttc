<?php
session_start(); 
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
			if ($_GET['do'] == "feedback") {
				$author = htmlspecialchars(mysql_real_escape_string($_POST['ff_author']));
				$email = htmlspecialchars(mysql_real_escape_string($_POST['ff_email']));
				$email_r = explode('@', $email);
				$name = htmlspecialchars(mysql_real_escape_string($_POST['ff_name']));
				$NameNone = changeTitle($name);
				$content = htmlspecialchars(mysql_real_escape_string($_POST['ff_content']));
				$date = date("Y-n-d H:i:s");
				$sdate = date("d-n-Y");
				
				if ($name == '' || $content == '' || $author == '' || $_POST['captcha_cli'] <> $_SESSION['code'])
				{
					if ($name == '' || $content == '' || $author == '')
					{
						echo '<p class="p_ann">Tất cả các mục đều cần điền đầy đủ thông tin !</p>';
					}
					elseif ($_POST['captcha_cli'] <> $_SESSION['code'])
					{
						echo '<p class="p_ann">Bạn nhập sai mã xác nhận rồi !</p>';
					}
					echo '<a href="feedback.php"><p class="p_ann">Quay lại !</p></a>';
				}
				else
				{
					$que = que("INSERT INTO feedbacks (Name, NameNone, Content, Date, sDate, Author, InfoAuthor) VALUES ('$name', '$NameNone', '$content', '$date', '$sdate', '$author', '$email')");
					if ($que)
					{
						echo '<p class="p_ann">Bạn đã phản hồi thành công !</p>';
					}
					else
					{
						echo '<p class="p_ann">Phản hồi không thành công !</p>';
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
