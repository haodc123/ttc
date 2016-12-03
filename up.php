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
<script type="text/javascript" src="editor/scripts/innovaeditor.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Up Shop - <?php require_once('z-include/title_p2.php'); ?>
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
        	<h1 class="h1_up_title">Up Shop hàng :</h1>
        	<?php
			$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
			$Date = date("Y-n-d H:i:s");
			$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
			$row = mysql_fetch_object($que);
			$nUp = $row->nUp - 1;

			$queu = que("UPDATE products SET Date = '".$Date."' WHERE NameNone = '".$gname."'");
			$queu2 = que("UPDATE users SET nUp = '".$nUp."' WHERE NameNone = '".$_SESSION['NameNone']."'");
			
			if ($queu)
			{
			?>
			<div class="div_up">
            <p>Bạn đã up thành công, chúc mừng bạn !</p>
            <p><a href="personal.php?do=products&name=<?php echo $_SESSION['NameNone']; ?>">Về trang cũ</a></p>
            
            <div class="clear"></div>

            </div><!-- .div_up -->
			<?php
			}
			?>
            
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
