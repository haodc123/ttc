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
<title>Thời trang - <?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">

			<div class="div_products">
            	<?php
				$pquery = htmlspecialchars(mysql_real_escape_string($_GET['fs_query']));
				// Paging 1			
				require_once('z-include/paging1.php');		
				// End Paging 1

					$que_1 = que("SELECT * FROM posts WHERE (Name LIKE '%".$pquery ."%' OR Content LIKE '%".$pquery ."%') AND Active = 1 ORDER BY Date DESC");
					$que1 = que("SELECT * FROM posts WHERE (Name LIKE '%".$pquery ."%' OR Content LIKE '%".$pquery ."%') AND Active = 1 ORDER BY Date DESC LIMIT ".$start.",".$perPage);

				// Paging 2			
				$num = mysql_num_rows($que_1);
				$odd2 = $num - (intval($num / $perPage) * $perPage);
				$odd2 <> 0 ? $totalPage = intval($num/$perPage) + 1 : $totalPage = intval($num/$perPage);		
				// End Paging 2
				
				if ($num == 0) echo 'Không tìm thấy kết quả nào !';
				while ($row1 = mysql_fetch_object($que1))
				{
				
				?>
                <div class="div_product">
                	<a class="a_img" href="detail_product.php?name=<?php echo $row1->NameNone; ?>"><img src="images/
					<?php 
					$que1b = que("SELECT * FROM products WHERE idPost = '".$row1->idPost ."' AND PriProduct = 1");
					$row1b = mysql_fetch_object($que1b);
					echo $row1b->urlImg;
					?>" alt="<?php echo $row1->Name; ?>" /></a>
                    <div class="info">
                    
                    	<div class="div_rate">        		
						<?php
						$que2 = que("SELECT * FROM hot WHERE idHot = '".$row1->idHot."'");
						$row2 = mysql_fetch_object($que2);
						if ($row2->Name == 'Hot')
							echo '<img src="templates/icon_hot2.png" />';
						elseif ($row2->Name == 'VIP')
							echo '<img src="templates/icon_vip.png" />';
						?>
                        </div>
                        
                        <a class="a_name" href="detail_product.php?name=<?php echo $row1->NameNone; ?>"><?php echo $row1->Name; ?></a><br />
                        <div class="clear"></div>
                        <h1>
							<?php
                            $que3 = que("SELECT * FROM users WHERE idUser = '".$row1->idUser."'");
                            $row3 = mysql_fetch_object($que3);
                            echo '<a href="personal.php?do=products&name='.$row3->NameNone.'">'.$row3->Name.'</a> - ';
                            $que4 = que("SELECT * FROM location WHERE idLocation = '".$row1b->idLocation."'");
                            $row4 = mysql_fetch_object($que4);
                            echo $row4->Name;
                            ?>
                        </h1>
                        <h2>
                        	Giá : <span><?php cleanPrice($row1b->Price); ?> đ</span>
                        </h2>
                        <div class="clear"></div>
                        <h3>
							<?php DateFriendly($row1b->sDate);
							echo ' | <span>';
							TimeFriendly($row1b->Date);
							echo '</span>';
							?>
                        </h3>
                        <h4>Lượt xem : <?php echo $row1b->View; ?></h4>
                        <div class="clear"></div>
                        <h5>
							<?php
							$summary = smr($row1->Summary, 72);
							echo $summary;
							?>
                        </h5>
                        <h6>
                        	<?php
							/*
							$que_bm = que("SELECT * FROM bookmarks");
							$new = true;
							while ($row_bm = mysql_fetch_object($que_bm))
							{
								if ($_SESSION[$row_bm->idBookmark.'BMidProduct'] == $row5->idProduct)
								{
									echo 'Bạn đã đánh dấu sản phẩm này';
									$new = false;
								}
							}
							if ($new == true)
								echo '<a href="up_bookmark.php?name='.$row5->NameNone.'">Đánh dấu sản phẩm này</a>';
							*/
							$IP = $_SERVER['REMOTE_ADDR'];
							$new = true;
							$que_u = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
                            $row_u = mysql_fetch_object($que_u);
							$que_bm = que("SELECT * FROM bookmarks");
							while ($row_bm = mysql_fetch_object($que_bm))
							{
								if (($row_bm->IP == $IP && $row_bm->idProduct == $row1b->idProduct) || ($row_bm->idUser == $row_u->idUser && $row_bm->idProduct == $row1b->idProduct))
								{
									echo 'Đã đánh dấu';
									echo '&nbsp;<a href="bookmark.php">Xem tất cả các đánh dấu</a>';
									$new = false;
									break;
								}
							}
							if ($new == true)
								echo '<a href="up_bookmark.php?name='.$row1->NameNone.'">Đánh dấu sản phẩm này</a>';
							?>
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
                    require_once('z-include/paging3.php');
                    // End Paging 3
					?>
                </div><!-- .div_paging -->
                <?php
				}
				?>
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
