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
<?php
if ($gdo == '' && isset($_SESSION['Name']) && ($_GET['step'] == '2' || $_GET['step'] == '2p'))
	echo 'Bước 2 - ';
elseif ($gdo == '' && isset($_SESSION['Name']) && ($_GET['step'] == '1' || $_GET['step'] == ''))
	echo 'Bước 1 - ';
?>
Đăng sản phẩm - <?php require_once('z-include/title_p2.php'); ?>
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
        	<h1 class="h1_up_title">Đăng tin / Sản phẩm :</h1>
        	<?php
			$gstep = htmlspecialchars(mysql_real_escape_string($_GET['step']));
			$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
			$gerror = htmlspecialchars(mysql_real_escape_string($_GET['error']));
			
			$que_np = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
			$row_np = mysql_fetch_object($que_np);
			
			if ($gdo <> 'finish' && $row_np->nPosts > 0)
			{
			?>
            <div class="div_step">
            <?php
				if ($gstep == '1' || $gstep == '')
				{
			?>
            	<img id="current" class="img_step1" src="templates/step.png" />
                <span id="current" class="span_step1">
                <h1>1</h1> Thông tin shop hàng
                </span>
                <img class="img_step2" src="templates/step.png" />
                <span class="span_step2">
                <h1>2</h1> Ảnh sản phẩm
                </span>
            <?php
				}
				else
				{
			?>
            	<img class="img_step1" src="templates/step.png" />
                <span class="span_step1">
                <h1>1</h1> Thông tin shop hàng
                </span>
                <img id="current" class="img_step2" src="templates/step.png" />
                <span id="current" class="span_step2">
                <h1>2</h1> Ảnh sản phẩm
                </span>
            <?php
				} // else - if ($gstep == '1' || $gstep == '')
			} // if ($gdo == 'finish')
			?>
            </div>
        	<div class="div_up">
            
        <?php
		if ($gdo == '' && $gerror == '' && $row_np->nPosts > 0)
		{	
			if (!isset($_SESSION['Name']))
			{
			?>
            <p>Bạn chưa thể đăng tin, đăng sản phẩm khi chưa là Thành viên. Mời bạn <a href="register.php">Đăng ký</a>.<br />
            Nếu bạn đã là thành viên, hãy <a href="login.php">Đăng nhập</a>.</p>
            <?php
			}
			elseif (($gstep == '1' || $gstep == '') && isset($_SESSION['Name']))
			{
			?>
            <p>Bạn sẽ trải qua 2 bước khi đăng tin. Điều này có rắc rối với bạn không?<br />
            Chúng tôi muốn phân bước để rõ ràng hơn cho bạn mà thôi. Nếu có bất cứ vấn đề gì, các bạn có thể phản hồi ở góc phải menu ngang bên trên.<br />
            <span style="color:#FF9900">Những mục có * là bắt buộc</span></p>
          <form class="fup" name="fup1" method="post" action="do_up.php?type=products&step=1">
            
                <label>Bạn định đặt tên shop là gì <span>*</span>: </label>
                <input class="fuptxt" name="fup_name" type="text" value="<?php echo $_SESSION['pname']; ?>" />
                <div class="clear"></div>
                
                <label>Sản phẩm bạn định đăng thuộc nhóm/loại gì <span>*</span>: </label>
                <select class="fupmenu" name="fup_type">
                	<?php
					$que = que("SELECT * FROM typeproducts2");
					while ($row = mysql_fetch_object($que))
					{
					if ($_SESSION['ptype'] == $row->Name)
						echo '<option selected>'.$row->Name.'</option>';
					else
						echo '<option>'.$row->Name.'</option>';
					}
					?>
                </select> 
            	<div class="clear"></div>
                
                <label>Sản phẩm bạn định đăng có khuyến mãi không <span>*</span>: </label>
                <select class="fupmenu" name="fup_promote">
                	<?php
					$que = que("SELECT * FROM promote");
					while ($row = mysql_fetch_object($que))
					{
					if ($_SESSION['ppro'] == $row->Name)
						echo '<option selected>'.$row->Name.'</option>';
					else
						echo '<option>'.$row->Name.'</option>';
					}
					?>
                </select> 
            	<div class="clear"></div>
                
                <label>Bạn định bán ở đâu <span>*</span>: </label>
                <select class="fupmenu" name="fup_location">
                	<?php
					$que1 = que("SELECT * FROM location");
					while ($row1 = mysql_fetch_object($que1))
					{
                    if ($_SESSION['plocation'] == $row1->Name)
						echo '<option selected>'.$row1->Name.'</option>';
					else
						echo '<option>'.$row1->Name.'</option>';
                    }
					?>
                </select>
                <div class="clear"></div>
                
                <label>Bạn định đăng hàng mới hay cũ <span>*</span>: </label>
                <select class="fupmenu" name="fup_oldnew">
                	<?php
					$que2 = que("SELECT * FROM oldnew");
					while ($row2 = mysql_fetch_object($que2))
					{
                    if ($_SESSION['poldnew'] == $row2->Name)
						echo '<option selected>'.$row2->Name.'</option>';
					else
						echo '<option>'.$row2->Name.'</option>';
                    }
					?>
                </select>
                <div class="clear"></div>
                
                <label>Bạn đăng lên để bán hay để trao đổi <span>*</span>: </label>
                <select class="fupmenu" name="fup_purpose">
                	<?php
					$que3 = que("SELECT * FROM purposes");
					while ($row3 = mysql_fetch_object($que3))
					{
                    if ($_SESSION['ppurpose'] == $row3->Name)
						echo '<option selected>'.$row3->Name.'</option>';
					else
						echo '<option>'.$row3->Name.'</option>';
                    }
					?>
                </select>
                <div class="clear"></div>
                
                <label>Tóm tắt shop hàng của bạn <span>*</span>: </label>
                <textarea class="fuptxta" cols="85" rows="3" name="fup_smr"><?php echo $_SESSION['psmr']; ?></textarea>
                <div class="clear"></div>
                
                <label>Nội dung shop hàng của bạn <span>*</span>: </label><a target="_blank" class="a_help_up" href="help.php?do=sale#up_img">Hướng dẫn đăng bài</a>
                <textarea class="fuptxta" id="fupcontent" cols="85" rows="4" name="fup_content"><?php echo $_SESSION['pcontent']; ?></textarea>
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

    oEdit1.cmdAssetManager = "modalDialogShow('http://shop4la.com//editor/assetmanager/assetmanager.php',640,465)"; //Command to open the Asset Manager add-on.
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

                <input class="fupimg" name="fup_img" type="image" src="templates/but_tieptuc_gr.png" />
                <div class="clear"></div>
                
            </form>
            <?php
			}
			elseif ($gstep == '2p' && isset($_SESSION['Name']))
			{
			?>
            <form class="fup" name="fup2p" method="post" action="do_up.php?type=products&step=2p">
            
                <label>Bạn muốn đăng lên bao nhiêu hình : </label>
                <label id="note">Bạn chú ý rằng đây là những hình được đưa ra riêng (bên cạnh nội dung shop hàng) và có giá cụ thể từng món hàng</label>
                <select class="fupmenu" name="fup_manyImg">
                	<option>Dưới 10</option>
                    <option>10 - 20</option>
                    <option>Trên 20</option>
                </select>
                <div class="clear"></div>
                
                <input class="fupimg" name="fup_img" type="image" src="templates/but_tieptuc_gr.png" />
                <div class="clear"></div>
                
            </form>
            <a href="up_products.php?step=1"><img class="img_back" src="templates/but_quaylai_gr.png" /></a>
            <?php
			}
			elseif ($gstep == '2' && isset($_SESSION['Name']))
			{
			?>
            <p>Bạn chú ý rằng chỉ được đưa hình ảnh lên (và kèm theo giá)<br />
            Các tập tin hình ảnh được chấp nhận gồm các đuôi: .jpg, .jpeg, .png, .gif, .bmp</p>
            <p>Bạn đã chọn đưa tối đa <span><?php echo $_SESSION['manyImg']; ?></span> hình</p>
            <form class="fup" enctype="multipart/form-data" name="fup2" method="post" action="do_up.php?type=products&step=2">
            
                <label>Hình đại diện cho shop hàng <span>*</span>: </label>
                <input class="fupimgs" name="fup_img_pri" type="file" />
                <div class="clear"></div>
                
                <label>Giá tiền của món hàng này <span>*</span>: </label>
                <input class="fuptxt" id="price_pri" name="fup_price_pri" type="text" />
                <label class="label_short">VNĐ</label>
                <div class="clear"></div>
                
                <?php
				for ($i=1; $i<=$_SESSION['manyImg']; $i++)
				{
				?>
                <label class="label_short">Hình <?php echo $i; ?> : </label>
                <input class="fupimgs" name="fup_img_<?php echo $i; ?>" type="file" />
                <label class="label_short">Giá : </label>
                <input class="fuptxt" id="price" name="fup_price_<?php echo $i; ?>" type="text" />
                <label class="label_short">VNĐ</label>
                <div class="clear"></div>
                <?php
				}
				?>
                <input class="fupimg" name="fup_img" type="image" src="templates/but_danglen_gr.png" />
                <div class="clear"></div>
                
            </form>
            <a href="up_products.php?step=2p"><img class="img_back" src="templates/but_quaylai_gr.png" /></a>
			<?php
			} // elseif ($gstep == '2' && isset($_SESSION['Name']))
		} // if ($gdo == '')
		elseif ($gdo == 'finish')
		{
			?>
            <p>Bạn đã đăng thành công, chúc mừng bạn ! Bài đăng của bạn sẽ được chúng tôi kiểm duyệt trong thời gian sớm nhất (tối đa 6 tiếng) trước khi được chính thức đưa lên Website.</p>
            <p><a href="detail_product.php?name=<?php echo $_SESSION['Post']; ?>">Di chuyển tới shop hàng vừa đăng</a></p>
            <?php
		}
		elseif ($gerror == 'blank')
		{
			?>
            <p>Có lỗi xảy ra. Bạn phải nhập tất cả các thông tin trên !</p>
            <p><a href="up_products.php?step=1">Trở lại</a></p>
            <?php
		}
		elseif ($gerror == 'long')
		{
			?>
            <p>Có lỗi xảy ra. Tên Shop không được dài quá 60 ký tự !</p>
            <p><a href="up_products.php?step=1">Trở lại</a></p>
            <?php
		}
		elseif ($gerror == 'blankimg')
		{
			?>
            <p>Có lỗi xảy ra. Phải có hình đại diện cho shop hàng và giá tiền của sản phẩm này !</p>
            <p><a href="up_products.php?step=2">Trở lại</a></p>
            <?php
		}
		elseif ($row_np->nPosts <= 0)
		{
			?>
            <p>Bạn đã hết lượt post shop hàng cho phép !</p>
            <p><a href="feedback.php">Bạn có thể liên hệ chúng tôi để biết thêm chi tiết</a></p>
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
