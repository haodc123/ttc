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
Đánh dấu
<?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
                
                <div class="div_area_big" id="b1">
                	<div class="div_area_title">
                    	<img src="templates/icon_star.png" />
                        <h1><a href="#">Các sản phẩm đã đánh dấu</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<?php	
							$que_u = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
							$row_u = mysql_fetch_object($que_u);
							$que_bm = que("SELECT * FROM bookmarks WHERE idUser = '".$row_u->idUser."' OR IP = '".$_SERVER['REMOTE_ADDR']."' ORDER BY Date DESC");
							
                            while ($row_bm = mysql_fetch_object($que_bm))
                            {
							$que = que("SELECT * FROM products WHERE idProduct = '".$row_bm->idProduct."'");
							$row = mysql_fetch_object($que);
                            ?>
                        	<li class="li_area_content">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <a class="a_summary" href="detail_product.php?name=<?php echo $row->NameNone; ?>">
                                	<p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 58);
									echo $summary;
									?>
                                	</p>
                                </a>
                                <!--<a class="a_zoom" href="#">
                                	<img src="templates/icon_zoom.png" alt="Phóng to" />
                                </a>-->
                                <div class="clear"></div>
                                <p class="p_price">
                                	Giá: <span><?php cleanPrice($row->Price); ?> vnđ</span>
                                </p>
                                <?php
								$que1 = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
								$row1 = mysql_fetch_object($que1);
								?>
                                <a class="a_author" href="personal.php?do=products&name=<?php echo $row1->NameNone; ?>">
                                	<p class="p_author">
                                	Đăng bởi: <span>
									<?php
									echo $row1->Name;
									?>
                                    </span>
                                	</p>
                                </a>
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                    </div>
                    <div class="clear"></div>
                </div><!-- #b1 -->

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
