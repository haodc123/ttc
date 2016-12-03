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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản trị - <?php require_once('../z-include/title_p2.php'); ?>
</head>

<body id="admin">
<div id="container">
	<?php require_once('../z-include/ad_header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
<?php
$que = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
$row = mysql_fetch_object($que);
if ($row->idGroup == -1)
{
?>
			<h1 class="h1_up_title">Quản trị thông tin - Danh sách Shop hàng :</h1>
			<div class="div_products">
            	<?php
				
				// Paging 1			
				require_once('../z-include/paging1.php');		
				// End Paging 1

					$que_5 = que("SELECT * FROM products WHERE PriProduct = 1");
					$que5 = que("SELECT * FROM products WHERE PriProduct = 1 ORDER BY Date DESC LIMIT ".$start.",".$perPage);
				
				// Paging 2			
				$num = mysql_num_rows($que_5);
				$odd2 = $num - (intval($num / $perPage) * $perPage);
				$odd2 <> 0 ? $totalPage = intval($num/$perPage) + 1 : $totalPage = intval($num/$perPage);		
				// End Paging 2
				
				if ($num == 0) echo 'Chưa có sản phẩm !';
				while ($row5 = mysql_fetch_object($que5))
				{
				
				?>
                <div class="div_product">
                	<a target="_blank" class="a_img" href="../detail_product.php?name=<?php echo $row5->NameNone; ?>"><img src="../images/<?php echo $row5->urlImg; ?>" alt="<?php echo $row5->Name; ?>" /></a>
                    <div class="info">
                    
                    	<div class="div_rate">        		
						<?php
						$que7 = que("SELECT * FROM hot WHERE idHot = '".$row5->idHot."'");
						$row7 = mysql_fetch_object($que7);
						if ($row7->Name == 'Hot')
							echo '<img src="templates/icon_hot2.png" />';
						elseif ($row7->Name == 'VIP')
							echo '<img src="templates/icon_vip.png" />';
						?>
                        </div>
                        
                        <a target="_blank" class="a_name" href="../detail_product.php?name=<?php echo $row5->NameNone; ?>"><?php echo $row5->Name; ?></a><br />
                        <div class="clear"></div>
                        <h1>
							<?php
                            $que6 = que("SELECT * FROM users WHERE idUser = '".$row5->idUser."'");
                            $row6 = mysql_fetch_object($que6);
                            echo '<a href="../personal.php?do=products&name='.$row6->NameNone.'">'.$row6->Name.'</a> - ';
                            $que8 = que("SELECT * FROM location WHERE idLocation = '".$row5->idLocation."'");
                            $row8 = mysql_fetch_object($que8);
                            echo $row8->Name;
                            ?>
                        </h1>
                        <h2>
                        	Giá : <span><?php cleanPrice($row5->Price); ?> đ</span>
                        </h2>
                        <div class="clear"></div>
                        <h3>
							<?php DateFriendly($row5->sDate);
							echo ' | <span>';
							TimeFriendly($row5->Date);
							echo '</span>';
							?>
                        </h3>
                        <h4>Lượt xem : <?php echo $row5->View; ?></h4>
                        <div class="clear"></div>
                        <h5>
							<?php 
							if ($row5->Active == 1)
								echo 'Đã kích hoạt';
							else
								echo 'Chưa kích hoạt';
							?>
                        </h5>
                        <h6>
                        	<a target="_blank" href="manager.php?name=<?php echo $row5->NameNone; ?>">Quản trị</a>
                        </h6>
                        <div class="clear"></div>
                    </div><!-- .info -->
                </div><!-- div_product -->
                <?php
				}
				?>
            </div><!-- div_products -->
                <?php
				if ($num <> 0) {
				?>
                <div class="div_paging">
					<?php               
                    // Paging 3
                    require_once('../z-include/paging3.php');
                    // End Paging 3
					?>
                </div><!-- .div_paging -->
                <?php
				}
}			
else
	echo 'Bạn phải <a href="../login.php">đăng nhập</a> và phải là admin';
?>
            </div><!-- .content -->
            <?php require_once('../z-include/ad_sidebar_right.php'); ?>
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php require_once('../z-include/ad_footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
