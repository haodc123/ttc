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
<title>Khu trao đổi - <?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            	
            <div class="div_frame_ctrl">
                <ul class="ul_frame_ctrl">
                	<?php
					$gtype = htmlspecialchars(mysql_real_escape_string($_GET['type']));
					if ($_POST['flo_menu'] <> '')
					{
						$_SESSION['lo'] = $_POST['flo_menu'];
					}
					if ($_SESSION['lo'] <> 'Tất cả' && $_SESSION['lo'] <> '')
					{
						$que_lo1 = que("SELECT * FROM location WHERE Name = '".$_SESSION['lo']."'");
						$row_lo1 = mysql_fetch_object($que_lo1);
						$idLocation = $row_lo1->idLocation;
					}
					
					$que = que("SELECT * FROM typeproducts");
					while ($row = mysql_fetch_object($que))
					{
					?>
                	<li class="li_frame_ctrl"
                    <?php
                    if ($row->NameNone == $gtype)
						echo 'id="current"';
					?>
                    >
                    	<a href="exchange.php?type=<?php echo $row->NameNone; ?>"><?php echo $row->Name; ?></a>
                    </li>
					<?php
					}
                    ?>
                </ul>
                <div class="div_frame_ctrl_content">
                	<?php
					$que2 = que("SELECT * FROM typeproducts WHERE NameNone = '".$gtype."'");
					$row2 = mysql_fetch_object($que2);
					$que3 = que("SELECT * FROM typeproducts2 WHERE idTypeProduct ='".$row2->idTypeProduct."' ORDER BY idTypeProduct2");
					while ($row3 = mysql_fetch_object($que3))
					{
						$NameNone = $row3->NameNone;
						$Name2 = $row3->Name;
						$gtype2 = htmlspecialchars(mysql_real_escape_string($_GET['type2']));
						if ($gtype2 == $NameNone)
							echo '<a id="current" href="exchange.php?type='.$gtype.'&type2='.$NameNone.'">'.$Name2.'</a>';
						else
							echo '<a href="exchange.php?type='.$gtype.'&type2='.$NameNone.'">'.$Name2.'</a>';
					}
					?>
                    <div class="clear"></div>
                </div>
                <div class="div_frame_ctrl_left">
                <h2>Sắp xếp theo :</h2>
                <?php
				$qsort0 = explode('&page', $url2);
				$qsort = explode('&sort', $qsort0[0]);
				?>
                <a href="<?php echo $qsort[0].'&sort=Date'; ?>">- Mới nhất</a><br /><br />
                <a href="<?php echo $qsort[0].'&sort=Price'; ?>">- Rẻ nhất</a><br /><br />
                <a href="<?php echo $qsort[0].'&sort=View'; ?>">- Nhiều người xem nhất</a>
                </div>
            </div>
            
            <div class="div_direction">
                <h1>Khu trao đổi
                <?php
                $que4 = que("SELECT * FROM typeproducts2 WHERE NameNone = '".$gtype2."'");
                $row4 = mysql_fetch_object($que4);
                if ($row2->Name <> '') echo ' > '.$row2->Name;
				if ($row4->Name <> '') echo ' > '.$row4->Name;
                ?>
                </h1>
                
                <h2>
                <?php
				$gsort = htmlspecialchars(mysql_real_escape_string($_GET['sort']));
				if ($gsort == '') $gsort = 'Date';
				/*if ($gsort == 'Price') echo ' Giá'; elseif ($gsort == 'View') echo ' Lượt xem'; else echo ' Thời gian';*/
				?>
                
                <form class="flo" name="flo" method="post" action="<? echo $_SESSION['url']; ?>">
                <label>Tỉnh thành</label>
                <select class="flomenu" name="flo_menu">
                	<option>Tất cả</option>
                	<?php
					$que_lo = que("SELECT * FROM location");
					while ($row_lo = mysql_fetch_object($que_lo))
					{
					if ($_SESSION['lo'] == $row_lo->Name)
						echo '<option selected>'.$row_lo->Name.'</option>';
					else
						echo '<option>'.$row_lo->Name.'</option>';
					}
					?>
                </select>
                <input type="submit" value="Đi" />
                </form>
                </h2>
            </div>    

			<div class="div_products">
            	<?php
				
				// Paging 1			
				require_once('z-include/paging1.php');		
				// End Paging 1

				$tsort = 'DESC';
				if ($gsort == 'Price') $tsort = 'ASC';
				
				if ($_SESSION['lo'] == 'Tất cả' || $_SESSION['lo'] == '')
				{
					if ($row2->idTypeProduct == '')
					{
						$que_5 = que("SELECT * FROM products WHERE idPurpose = 2 AND PriProduct = 1 AND Active = 1");
						$que5 = que("SELECT * FROM products WHERE idPurpose = 2 AND PriProduct = 1 AND Active = 1 ORDER BY ".$gsort." ".$tsort." LIMIT ".$start.",".$perPage);
					}
					elseif ($row4->idTypeProduct2 == '')
					{
						$que_5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idPurpose = 2 AND PriProduct = 1");
						$que5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idPurpose = 2 AND PriProduct = 1 ORDER BY ".$gsort." ".$tsort." LIMIT ".$start.",".$perPage);
					}
					else
					{
						$que_5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idTypeProduct2 = '".$row4->idTypeProduct2."' AND idPurpose = 2 AND PriProduct = 1");
						$que5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idTypeProduct2 = '".$row4->idTypeProduct2."' AND idPurpose = 2 AND PriProduct = 1 ORDER BY ".$gsort." ".$tsort." LIMIT ".$start.",".$perPage);
					}
				}
				else
				{
					if ($row2->idTypeProduct == '')
					{
						$que_5 = que("SELECT * FROM products WHERE idPurpose = 2 AND PriProduct = 1 AND Active = 1 AND idLocation = '".$idLocation."'");
						$que5 = que("SELECT * FROM products WHERE idPurpose = 2 AND PriProduct = 1 AND Active = 1 AND idLocation = '".$idLocation."' ORDER BY ".$gsort." ".$tsort." LIMIT ".$start.",".$perPage);
					}
					elseif ($row4->idTypeProduct2 == '')
					{
						$que_5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idLocation = '".$idLocation."' AND idPurpose = 2 AND PriProduct = 1");
						$que5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idLocation = '".$idLocation."' AND idPurpose = 2 AND PriProduct = 1 ORDER BY ".$gsort." ".$tsort." LIMIT ".$start.",".$perPage);
					}
					else
					{
						$que_5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idLocation = '".$idLocation."' AND idTypeProduct2 = '".$row4->idTypeProduct2."' AND idPurpose = 2 AND PriProduct = 1");
						$que5 = que("SELECT * FROM products WHERE idTypeProduct ='".$row2->idTypeProduct."' AND Active = 1 AND idLocation = '".$idLocation."' AND idTypeProduct2 = '".$row4->idTypeProduct2."' AND idPurpose = 2 AND PriProduct = 1 ORDER BY ".$gsort." ".$tsort." LIMIT ".$start.",".$perPage);
					}
				}
				
				
				// Paging 2			
				$num = mysql_num_rows($que_5);
				$odd2 = $num - (intval($num / $perPage) * $perPage);
				$odd2 <> 0 ? $totalPage = intval($num/$perPage) + 1 : $totalPage = intval($num/$perPage);		
				// End Paging 2
				
				if ($num == 0) echo 'Chưa có sản phẩm tại phân mục này !';
				while ($row5 = mysql_fetch_object($que5))
				{
				
				?>
                <div class="div_product">
                	<a class="a_img" href="detail_product.php?name=<?php echo $row5->NameNone; ?>"><img src="images/<?php echo $row5->urlImg; ?>" alt="<?php echo $row5->Name; ?>" /></a>
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
                        
                        <a class="a_name" href="detail_product.php?name=<?php echo $row5->NameNone; ?>"><?php echo $row5->Name; ?></a><br />
                        <div class="clear"></div>
                        <h1>
							<?php
                            $que6 = que("SELECT * FROM users WHERE idUser = '".$row5->idUser."'");
                            $row6 = mysql_fetch_object($que6);
                            echo '<a href="personal.php?do=products&name='.$row6->NameNone.'">'.$row6->Name.'</a> - ';
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
							$summary = smr($row5->Summary, 72);
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
								if (($row_bm->IP == $IP && $row_bm->idProduct == $row5->idProduct) || ($row_bm->idUser == $row_u->idUser && $row_bm->idProduct == $row5->idProduct))
								{
									echo 'Đã đánh dấu';
									echo '&nbsp;<a href="bookmark.php">Xem tất cả các đánh dấu</a>';
									$new = false;
									break;
								}
							}
							if ($new == true)
								echo '<a href="up_bookmark.php?name='.$row5->NameNone.'">Đánh dấu sản phẩm này</a>';
							?>
                        </h6>
                        <div class="clear"></div>
                    </div>
                </div>
                <?php
				}
				?>
            </div>
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
