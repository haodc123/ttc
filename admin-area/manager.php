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
        	<h1 class="h1_up_title">Quản trị thông tin Shop hàng :</h1>
        	<?php
			$que = que("SELECT * FROM products WHERE PriProduct = 1 AND NameNone = '".$gname."'");
			$row = mysql_fetch_object($que);
			$que1 = que("SELECT * FROM posts WHERE NameNone = '".$gname."'");
			$row1 = mysql_fetch_object($que1);
			$que_u = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
			$row_u = mysql_fetch_object($que_u);
			$que_c = que("SELECT COUNT(Name) FROM products WHERE idPost = '".$row1->idPost."'");
			$row_c = mysql_fetch_array($que_c);
			?>
            
        <div class="div_up" id="ad_mgr">

          <form class="fup" name="fad_post" method="post" action="do_edit.php?type=products&do=edit&name=<?php echo $gname; ?>">
            
                <label>Tên shop : </label>
                <input class="fuptxt" name="fadp_name" type="text" value="<?php echo $row->Name; ?>" />
                <div class="clear"></div>
                
                <!--<label>Lượt view : </label>
                <input class="fuptxt" name="fadp_view" type="text" value="<?php //echo $row->View; ?>" />
                <div class="clear"></div>-->
                
                <label>Sản phẩm thuộc nhóm/loại : </label>
                <select class="fupmenu" name="fadp_type2">
                	<?php
					$que2 = que("SELECT * FROM typeproducts2");
					while ($row2 = mysql_fetch_object($que2))
					{
					if ($row2->idTypeProduct2 == $row->idTypeProduct2)
						echo '<option selected>'.$row2->Name.'</option>';
					else
						echo '<option>'.$row2->Name.'</option>';
					}
					?>
                </select> 
            	<div class="clear"></div>
                
                <label>Bán ở : </label>
                <select class="fupmenu" name="fadp_location">
                	<?php
					$que3 = que("SELECT * FROM location");
					while ($row3 = mysql_fetch_object($que3))
					{
                    if ($row3->idLocation == $row->idLocation)
						echo '<option selected>'.$row3->Name.'</option>';
					else
						echo '<option>'.$row3->Name.'</option>';
                    }
					?>
                </select>
                <div class="clear"></div>
                
                <label>Hàng mới / cũ : </label>
                <select class="fupmenu" name="fadp_oldnew">
                	<?php
					$que4 = que("SELECT * FROM oldnew");
					while ($row4 = mysql_fetch_object($que4))
					{
                    if ($row4->idOldNew == $row->idOldNew)
						echo '<option selected>'.$row4->Name.'</option>';
					else
						echo '<option>'.$row4->Name.'</option>';
                    }
					?>
                </select>
                <div class="clear"></div>
                
                <label>Bán / trao đổi : </label>
                <select class="fupmenu" name="fadp_purpose">
                	<?php
					$que5 = que("SELECT * FROM purposes");
					while ($row5 = mysql_fetch_object($que5))
					{
                    if ($row5->idPurpose == $row->idPurpose)
						echo '<option selected>'.$row5->Name.'</option>';
					else
						echo '<option>'.$row5->Name.'</option>';
                    }
					?>
                </select>
                <div class="clear"></div>
                
                <label>Tóm tắt shop hàng : </label>
                <textarea class="fuptxta" cols="78" rows="3" name="fadp_smr"><?php echo $row->Summary; ?></textarea>
                <div class="clear"></div>
                
                <label>Nội dung shop hàng : </label>
                <textarea class="fuptxta" id="fupcontent" cols="85" rows="4" name="fadp_content"><?php echo $row1->Content; ?></textarea>
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
                
                <label>Khuyến mãi : </label>
                <select class="fupmenu" name="fadp_promote">
                	<?php
					$que6 = que("SELECT * FROM promote");
					while ($row6 = mysql_fetch_object($que6))
					{
					if ($row->idPr == $row6->idPromote)
						echo '<option selected>'.$row6->Name.'</option>';
					else
						echo '<option>'.$row6->Name.'</option>';
					}
					?>
                </select> 
                <div class="clear"></div>
            
                <label>Hình đại diện cho shop hàng : </label>
                <img class="ad_img_pro" src="../images/<?php echo $row->urlImg; ?>" />
                <div class="clear"></div>
                
                <label>Giá tiền của món hàng này : </label>
                <input class="fuptxt" id="price_pri" name="fadp_price_pri" type="text" value="<?php echo $row->Price; ?>"/>
                <label class="label_short">VNĐ</label>
                <div class="clear"></div>
                
                <?php
				$que_prs = que("SELECT * FROM products WHERE PriProduct = 0 AND NameNone = '".$gname."' ORDER BY Number ASC");
				$i = 2;
				while ($row_prs = mysql_fetch_object($que_prs))
				{
				?>
                <label class="label_short">Hình <?php echo $i; ?> : </label>
                <img class="ad_img_pro" src="../images/<?php echo $row_prs->urlImg; ?>" />
                <label class="label_short">Giá : </label>
                <input class="fuptxt" id="price" name="fadp_price_<?php echo $i; ?>" type="text" value="<?php echo $row_prs->Price; ?>"/>
                <label class="label_short">VNĐ</label>
                <div class="clear"></div>
                <?php
				$i ++;
				}
				?>
                <input class="fupimg" name="fadp_img" type="image" src="../templates/but_capnhat_gr.png" />
                <div class="clear"></div> 
        </form>
        
        <a href="do_edit.php?type=products&do=del&name=<?php echo $gname; ?>">
        	<img class="ad_img_del" src="../templates/but_xoa_gr.png" />
        </a>

<?php
	}
	elseif ($gdo == 'finish')
	{
		echo '<p>Bạn đã chỉnh sửa thành công</p><br />';
		echo '<a href="../detail_product.php?name='.$_SESSION['last'].'">Di chuyển tới trang vừa sửa</a><br /><br />';
	}
	elseif ($gdo == 'confirm')
	{
		echo '<p>Bạn có thật sự muốn xóa. Thật đấy, lần này nhấn "Có" là sạch sẽ !</p><br />';
		echo '<a href="do_edit.php?type=products&do=delok&name='.$gname.'">Có</a><br /><br />';
		echo '<a href="do_edit.php?type=products&do=delcancel&name='.$gname.'">Không</a><br /><br />';
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
