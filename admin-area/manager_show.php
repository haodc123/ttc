<?php
session_start();
require_once('../z-include/se_url.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('../z-include/ad_css.php'); ?>
<?php require_once('../z-include/ad_js.php'); ?>
<?php require_once('../connect/connect.php'); ?>
<?php require_once('../func/main.php'); ?>
<script type="text/javascript" src="../editor/scripts/innovaeditor.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Quản trị Shop hàng - <?php require_once('../z-include/title_p2.php'); ?>
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
	<?php require_once('../z-include/ad_header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
        
<?php
$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
$gerror = htmlspecialchars(mysql_real_escape_string($_GET['error']));
$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
$row = mysql_fetch_object($que);
if ($row->idGroup == 1)
{
	if ($gdo == '')
	{
?>
        	<h1 class="h1_up_title">Quản trị thông tin Show hàng Thời trang:</h1>
        	<?php
			$que = que("SELECT * FROM shows WHERE NameNone = '".$gname."'");
			$row = mysql_fetch_object($que);
			$que_u = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
			$row_u = mysql_fetch_object($que_u);
			$que_c = que("SELECT COUNT(Name) FROM show_comments WHERE idShow = '".$row->idShow."'");
			$row_c = mysql_fetch_array($que_c);
			?>
            
        <div class="div_up" id="ad_mgr">

          <form class="fup" name="fad_post" method="post" action="do_edit.php?type=shows&do=edit&name=<?php echo $gname; ?>">
            
                <label>Tên show : </label>
                <input class="fuptxt" name="fadp_name" type="text" value="<?php echo $row->Name; ?>" />
                <div class="clear"></div>
                
                <label>Tóm tắt show hàng : </label>
                <textarea class="fuptxta" cols="84" rows="3" name="fadp_smr"><?php echo $row->Summary; ?></textarea>
                <div class="clear"></div>
                
                <label>Nội dung show hàng : </label>
                <textarea class="fuptxta" cols="85" rows="4" name="fadp_content"><?php echo $row->Content; ?></textarea>
                <div class="clear"></div>
                
                <label>Trạng thái : </label>
                <select class="fupmenu" name="fadp_status">
                <?php
				if ($row->Active == 1)
				{
				?>
                	<option selected>Đã kích hoạt</option>
                    <option>Chưa kích hoạt</option>
                <?php
				}
				else
				{
				?>
                	<option>Đã kích hoạt</option>
                    <option selected>Chưa kích hoạt</option>
                <?php
				}
				?>
                </select>
                <div class="clear"></div>
            
                <label>Hình đại diện cho show hàng : </label>
                <img class="ad_img_pro" src="../images/<?php echo $row->urlImg; ?>" />
                <div class="clear"></div>

                <input class="fupimg" name="fadp_img" type="image" src="../templates/but_capnhat_gr.png" />
                <div class="clear"></div> 
        </form>
        
        <a href="do_edit.php?type=shows&do=del&name=<?php echo $gname; ?>">
        	<img class="ad_img_del" src="../templates/but_xoa_gr.png" />
        </a>

<?php
	}
	elseif ($gdo == 'finish')
	{
		echo '<p>Bạn đã chỉnh sửa thành công</p><br />';
		echo '<a href="../detail_show.php?name='.$_SESSION['last'].'">Di chuyển tới trang vừa sửa</a><br /><br />';
	}
	elseif ($gdo == 'confirm')
	{
		echo '<p>Bạn có thật sự muốn xóa. Thật đấy, lần này nhấn "Có" là sạch sẽ !</p><br />';
		echo '<a href="do_edit.php?type=shows&do=delok&name='.$gname.'">Có</a><br /><br />';
		echo '<a href="do_edit.php?type=shows&do=delcancel&name='.$gname.'">Không</a><br /><br />';
	}
}			
else
	echo 'Bạn phải <a href="../login.php">đăng nhập</a> và phải là admin<br /><br />';
?>
			</div>
        </div>
        <?php require_once('../z-include/ad_sidebar_right.php'); ?>
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php require_once('../z-include/ad_footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
