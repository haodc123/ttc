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
Quản trị Tin tức - <?php require_once('../z-include/title_p2.php'); ?>
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
?>
        	<h1 class="h1_up_title">Quản trị Tin tức Thời trang :</h1>
        	<?php
			$que = que("SELECT * FROM news WHERE NameNone = '".$gname."'");
			$row = mysql_fetch_object($que);
			$que_u = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
			$row_u = mysql_fetch_object($que_u);
			
			if ($gdo == '')
			{
			?>
            
        <div class="div_up" id="ad_mgr">

          <form class="fup" name="fad_post" method="post" action="do_edit.php?type=news&do=edit&name=<?php echo $gname; ?>">
            
                <label>Tiêu đề : </label>
                <input class="fuptxt" name="fadp_name" type="text" value="<?php echo $row->Name; ?>" />
                <div class="clear"></div>
                
                <label>Tin thuộc loại : </label>
                <select class="fupmenu" name="fadp_type">
                	<?php
					$que2 = que("SELECT * FROM typenews");
					while ($row2 = mysql_fetch_object($que2))
					{
					if ($row2->idTypeNews == $row->idTypeNews)
						echo '<option selected>'.$row2->Name.'</option>';
					else
						echo '<option>'.$row2->Name.'</option>';
					}
					?>
                </select> 
            	<div class="clear"></div>

                <label>Tóm tắt : </label>
                <textarea class="fuptxta" cols="78" rows="3" name="fadp_smr"><?php echo $row->Summary; ?></textarea>
                <div class="clear"></div>
                
                <label>Nội dung : </label>
                <textarea class="fuptxta" id="fupcontent" cols="85" rows="4" name="fadp_content"><?php echo $row->Content; ?></textarea>
                <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    /***************************************************
      SETTING EDITOR DIMENSION (WIDTH x HEIGHT)
    ***************************************************/

    oEdit1.width=700;//You can also use %, for example: oEdit1.width="100%"
    oEdit1.height=350;


    /***************************************************
      SHOWING DISABLED BUTTONS
    ***************************************************/

    oEdit1.btnPrint=true;
    oEdit1.btnPasteText=true;
    oEdit1.btnFlash=true;
    oEdit1.btnMedia=true;
    oEdit1.btnLTR=true;
    oEdit1.btnRTL=true;
    oEdit1.btnSpellCheck=true;
    oEdit1.btnStrikethrough=true;
    oEdit1.btnSuperscript=true;
    oEdit1.btnSubscript=true;
    oEdit1.btnClearAll=true;
    oEdit1.btnSave=true;
    oEdit1.btnStyles=true; //Show "Styles/Style Selection" button

    /***************************************************
      APPLYING STYLESHEET
      (Using external css file)
    ***************************************************/

    oEdit1.css="style/test.css"; //Specify external css file here

    /***************************************************
      APPLYING STYLESHEET
      (Using predefined style rules)
    ***************************************************/
    /*
    oEdit1.arrStyle = [["BODY",false,"","font-family:Verdana,Arial,Helvetica;font-size:x-small;"],
          [".ScreenText",true,"Screen Text","font-family:Tahoma;"],
          [".ImportantWords",true,"Important Words","font-weight:bold;"],
          [".Highlight",true,"Highlight","font-family:Arial;color:red;"]];

    If you'd like to set the default writing to "Right to Left", you can use:

    oEdit1.arrStyle = [["BODY",false,"","direction:rtl;unicode-bidi:bidi-override;"]];
    */


    /***************************************************
      ENABLE ASSET MANAGER ADD-ON
    ***************************************************/

    oEdit1.cmdAssetManager = "modalDialogShow('http://thoitrangchung.com//editor/assetmanager/assetmanager.php',640,465)"; //Command to open the Asset Manager add-on.
    //Use relative to root path (starts with "/")

    /***************************************************
      ADDING YOUR CUSTOM LINK LOOKUP
    ***************************************************/

    oEdit1.cmdInternalLink = "modelessDialogShow('links.htm',365,270)"; //Command to open your custom link lookup page.

    /***************************************************
      ADDING YOUR CUSTOM CONTENT LOOKUP
    ***************************************************/

    oEdit1.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)"; //Command to open your custom content lookup page.

    /***************************************************
      USING CUSTOM TAG INSERTION FEATURE
    ***************************************************/

    oEdit1.arrCustomTag=[["First Name","{%first_name%}"],
        ["Last Name","{%last_name%}"],
        ["Email","{%email%}"]];//Define custom tag selection

    /***************************************************
      SETTING COLOR PICKER's CUSTOM COLOR SELECTION
    ***************************************************/

    oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors

    /***************************************************
      SETTING EDITING MODE

      Possible values:
        - "HTMLBody" (default)
        - "XHTMLBody"
        - "HTML"
        - "XHTML"
    ***************************************************/

    oEdit1.mode="XHTMLBody";


    oEdit1.REPLACE("fupcontent");
  </script>
                
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
            
                <input class="fupimg" name="fadp_img" type="image" src="../templates/but_capnhat_gr.png" />
                <div class="clear"></div> 
        </form>
        
        <a href="do_edit.php?type=news&do=del&name=<?php echo $gname; ?>">
        	<img class="ad_img_del" src="../templates/but_xoa_gr.png" />
        </a>

<?php
		}
		if ($gdo == 'add')
		{
?>
            
        <div class="div_up" id="ad_mgr">

          <form class="fup" name="fad_post" enctype="multipart/form-data" method="post" action="do_edit.php?type=news&do=add">
            
                <label>Tiêu đề : </label>
                <input class="fuptxt" name="fadp_name" type="text" value="" />
                <div class="clear"></div>
                
                <label class="label_short">Hình Đại diện : </label>
                <input class="fupimgs" name="fadp_img" type="file" />
                
                <label>Tin thuộc loại : </label>
                <select class="fupmenu" name="fadp_type">
                	<?php
					$que2 = que("SELECT * FROM typenews");
					while ($row2 = mysql_fetch_object($que2))
					{
						echo '<option>'.$row2->Name.'</option>';
					}
					?>
                </select> 
            	<div class="clear"></div>

                <label>Tóm tắt : </label>
                <textarea class="fuptxta" cols="78" rows="3" name="fadp_smr"></textarea>
                <div class="clear"></div>
                
                <label>Nội dung : </label>
                <textarea class="fuptxta" id="fupcontent" cols="85" rows="4" name="fadp_content"></textarea>
                <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    /***************************************************
      SETTING EDITOR DIMENSION (WIDTH x HEIGHT)
    ***************************************************/

    oEdit1.width=700;//You can also use %, for example: oEdit1.width="100%"
    oEdit1.height=350;


    /***************************************************
      SHOWING DISABLED BUTTONS
    ***************************************************/

    oEdit1.btnPrint=true;
    oEdit1.btnPasteText=true;
    oEdit1.btnFlash=true;
    oEdit1.btnMedia=true;
    oEdit1.btnLTR=true;
    oEdit1.btnRTL=true;
    oEdit1.btnSpellCheck=true;
    oEdit1.btnStrikethrough=true;
    oEdit1.btnSuperscript=true;
    oEdit1.btnSubscript=true;
    oEdit1.btnClearAll=true;
    oEdit1.btnSave=true;
    oEdit1.btnStyles=true; //Show "Styles/Style Selection" button

    /***************************************************
      APPLYING STYLESHEET
      (Using external css file)
    ***************************************************/

    oEdit1.css="style/test.css"; //Specify external css file here

    /***************************************************
      APPLYING STYLESHEET
      (Using predefined style rules)
    ***************************************************/
    /*
    oEdit1.arrStyle = [["BODY",false,"","font-family:Verdana,Arial,Helvetica;font-size:x-small;"],
          [".ScreenText",true,"Screen Text","font-family:Tahoma;"],
          [".ImportantWords",true,"Important Words","font-weight:bold;"],
          [".Highlight",true,"Highlight","font-family:Arial;color:red;"]];

    If you'd like to set the default writing to "Right to Left", you can use:

    oEdit1.arrStyle = [["BODY",false,"","direction:rtl;unicode-bidi:bidi-override;"]];
    */


    /***************************************************
      ENABLE ASSET MANAGER ADD-ON
    ***************************************************/

    oEdit1.cmdAssetManager = "modalDialogShow('http://thoitrangchung.com//editor/assetmanager/assetmanager.php',640,465)"; //Command to open the Asset Manager add-on.
    //Use relative to root path (starts with "/")

    /***************************************************
      ADDING YOUR CUSTOM LINK LOOKUP
    ***************************************************/

    oEdit1.cmdInternalLink = "modelessDialogShow('links.htm',365,270)"; //Command to open your custom link lookup page.

    /***************************************************
      ADDING YOUR CUSTOM CONTENT LOOKUP
    ***************************************************/

    oEdit1.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)"; //Command to open your custom content lookup page.

    /***************************************************
      USING CUSTOM TAG INSERTION FEATURE
    ***************************************************/

    oEdit1.arrCustomTag=[["First Name","{%first_name%}"],
        ["Last Name","{%last_name%}"],
        ["Email","{%email%}"]];//Define custom tag selection

    /***************************************************
      SETTING COLOR PICKER's CUSTOM COLOR SELECTION
    ***************************************************/

    oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors

    /***************************************************
      SETTING EDITING MODE

      Possible values:
        - "HTMLBody" (default)
        - "XHTMLBody"
        - "HTML"
        - "XHTML"
    ***************************************************/

    oEdit1.mode="XHTMLBody";


    oEdit1.REPLACE("fupcontent");
  </script>
                
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
            
                <input class="fupimg" name="fadp_img" type="image" src="../templates/but_capnhat_gr.png" />
                <div class="clear"></div> 
        </form>

<?php
	}
	elseif ($gdo == 'finish')
	{
		//$_SESSION['NameNone'] = $_SESSION['aaa'];
		echo '<p>Bạn đã chỉnh sửa / thêm thành công</p><br />';
		echo '<a href="../detail_news.php?name='.$_SESSION['last'].'">Di chuyển tới trang vừa sửa</a><br /><br />';
	}
	elseif ($gdo == 'confirm')
	{
		echo '<p>Bạn có thật sự muốn xóa. Thật đấy, lần này nhấn "Có" là sạch sẽ !</p><br />';
		echo '<a href="do_edit.php?type=news&do=delok&name='.$gname.'">Có</a><br /><br />';
		echo '<a href="do_edit.php?type=news&do=delcancel&name='.$gname.'">Không</a><br /><br />';
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
