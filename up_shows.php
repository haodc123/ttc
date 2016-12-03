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
<title>
Chia sẻ thời trang - <?php require_once('z-include/title_p2.php'); ?>
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

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<h1 class="h1_up_title">Chia sẻ phong cách Thời trang của bạn :</h1>
        	<?php
			$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
			$gerror = htmlspecialchars(mysql_real_escape_string($_GET['error']));
			
			$que_u = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
			$row_u = mysql_fetch_object($que_u);
			
			?>
            
        	<div class="div_up">
            
        <?php
		if ($gdo == '' && $gerror == '')
		{	
			if (!isset($_SESSION['Name']))
			{
			?>
            <p>Bạn chưa thể Chia sẻ phong cách Thời trang khi chưa là Thành viên. Mời bạn <a href="register.php">Đăng ký</a>.<br />
            Nếu bạn đã là thành viên, hãy <a href="login.php">Đăng nhập</a>.</p>
            <?php
			}
			elseif (isset($_SESSION['Name']))
			{
			?>
            
          <form class="fup" name="fup1" enctype="multipart/form-data" method="post" action="do_up.php?type=shows">
            
                <label>Bạn định đặt tên Chia sẻ này là gì <span>*</span>: </label>
                <input class="fuptxt" name="fup_name" type="text" />
                <div class="clear"></div>
                
                <label>Hình đại diện cho Chia sẻ này <span>*</span>: </label>
                <input class="fupimgs" name="fup_img" type="file" />
                <div class="clear"></div>
                
                <label>Hãy tóm tắt 1 chút về chia sẻ này của bạn <span>*</span>: </label>
                <textarea class="fuptxta" cols="85" rows="3" name="fup_smr"></textarea>
                <div class="clear"></div>
                
                <label>Nội dung Chia sẻ của bạn <span>*</span>: </label>
                <textarea class="fuptxta" cols="85" rows="6" name="fup_content"></textarea>
                <div class="clear"></div>

                <input class="fupimg" name="fup_img" type="image" src="templates/but_danglen_gr.png" />
                <div class="clear"></div>
                
            </form>
            <?php
			} // if ($gdo == '')
		}
		elseif ($gdo == 'finish')
		{
			?>
            <p>Bạn đã đăng thành công, chúc mừng bạn ! Bài đăng của bạn sẽ được chúng tôi kiểm tra để tránh các nội quy vi phạm trước khi chính thức đưa lên website</p>
            <p><a href="detail_show.php?name=<?php echo $_SESSION['Show']; ?>">Di chuyển tới Chia sẻ vừa đăng</a></p>
            <?php
		}
		elseif ($gerror == 'blank')
		{
			?>
            <p>Có lỗi xảy ra. Bạn phải nhập tất cả các thông tin trên !</p>
            <p><a href="up_shows.php?name=<?php echo $gname; ?>">Trở lại</a></p>
            <?php
		}
		elseif ($gerror == 'blankimg')
		{
			?>
            <p>Có lỗi xảy ra. Phải có hình đại diện cho Chia sẻ này !</p>
            <p><a href="up_shows.php?name=<?php echo $gname; ?>">Trở lại</a></p>
            <?php
		}
		?>
            
            <div class="clear"></div>
			<?php $_SESSION['NameNone'] = $_SESSION['aaa']; ?>
            </div><!-- .div_up -->
            
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
