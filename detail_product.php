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
<?php
$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
$que = que("SELECT * FROM products WHERE NameNone = '".$gname."' AND PriProduct = 1");
$row = mysql_fetch_object($que);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row->Summary; ?> - <?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            
            <?php		
			
			$view = intval($row->View);
			$view ++; 
			$queu = que("UPDATE products SET View = '$view' WHERE NameNone = '".$gname."'");
			
			$que2 = que("SELECT * FROM posts WHERE idPost = '".$row->idPost."'");
			$row2 = mysql_fetch_object($que2);
			$view2 = intval($row2->View);
			$view2 ++; 
			$queu2 = que("UPDATE posts SET View = '$view2' WHERE idPost = '".$row->idPost."'");
			?>
                
            <div class="div_direction">
                <h1>
                <?php
				$que6 = que("SELECT * FROM typeproducts WHERE idTypeProduct = '".$row->idTypeProduct."'");
                $row6 = mysql_fetch_object($que6);
				$que7 = que("SELECT * FROM typeproducts2 WHERE idTypeProduct2 = '".$row->idTypeProduct2."'");
                $row7 = mysql_fetch_object($que7);
				
				if ($row->idOldNew == 1) 
				{
					echo '<a href="fashion.php?type=all">Thời trang</a>';				
					echo ' > ';
					echo '<a href="fashion.php?type='.$row6->NameNone.'">'.$row6->Name.'</a>';
					echo ' > ';
					echo '<a href="fashion.php?type='.$row6->NameNone.'&type2='.$row7->NameNone.'">'.$row7->Name.'</a>';
				}
				else 
				{
					echo '<a href="old.php?type=all">Phố đồ cũ</a>';
					echo ' > ';
					echo '<a href="old.php?type='.$row6->NameNone.'">'.$row6->Name.'</a>';
					echo ' > ';
					echo '<a href="old.php?type='.$row6->NameNone.'&type2='.$row7->NameNone.'">'.$row7->Name.'</a>';
				}
                ?>
                </h1>
            </div>    

			<div class="div_products">
                
                <div class="div_product" id="detail">
                
                	<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Name; ?>" /></a>
                    
                    <div class="info">
                    	<div class="div_rate">
						<?php
						$que3 = que("SELECT * FROM hot WHERE idHot = '".$row->idHot."'");
						$row3 = mysql_fetch_object($que3);
						if ($row3->Name == 'Hot')
							echo '<img src="templates/icon_hot2.png" />';
						elseif ($row3->Name == 'VIP')
							echo '<img src="templates/icon_vip.png" />';
						?>
                        </div>
                        
                        <a class="a_name" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><?php echo $row->Name; ?></a><br />
                        <div class="clear"></div>
                        
                        <div class="info_left">
                            <p class="p_line1">
                                <?php
                                $que4 = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
                                $row4 = mysql_fetch_object($que4);
                                echo '<a href="personal.php?do=products&name='.$row4->NameNone.'">'.$row4->Name.'</a> - ';
                                $que5 = que("SELECT * FROM location WHERE idLocation = '".$row->idLocation."'");
                                $row5 = mysql_fetch_object($que5);
                                echo $row5->Name;
								if ($row4->Authentication == '1')
									echo '<img src="templates/authen.png" />'
                                ?>
                            </p>
                      <p class="p_line2">
                                <?php DateFriendly($row->sDate);
                                echo ' | <span>';
                                TimeFriendly($row->Date);
                                echo '</span>';
                                ?>
                            </p>
                        </div>
                        <div class="info_right">
                        	Yahoo ID: 
                            <a href="ymsgr:sendim?<?php echo $row4->Yahoo; ?>&amp;m=Chào bạn, mình thấy shop bạn trên ThoiTrangChung.Com, mình nói chuyện với bạn 1 chút nhé">
                                <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=<?php echo $row4->Yahoo; ?>&m=g&t=1=us" border=0>                        
                            </a><br />
                            ĐT: <?php echo $row4->Tel; ?><br />
							Địa chỉ: <?php echo $row4->Address; ?>
                        </div>
                        
                    </div><!-- .info -->
                    <div class="clear"></div>
                    	
                    <div class="div_product_imgs">
                    <?php
					$que11 = que("SELECT * FROM products WHERE idPost = '".$row->idPost."' ORDER By Number ASC");
					while ($row11 = mysql_fetch_object($que11))
					{
                    	echo '<p><img class="img_small" src="images/'.$row11->urlImg.'" alt="'.$row11->Price.'" />';
					?>
							<span class="number"><?php echo $row11->Number; ?></span>
                        	<img class="img_big" src="images/<?php echo $row11->urlImg; ?>" />
                            <span class="price">Giá: <span><?php cleanPrice($row11->Price); ?></span> VNĐ</span>
                        </p>
					<?php
                    }
					?>
                    <div class="clear"></div>
                    </div><!-- .div_product_imgs -->
                    
                    <div class="div_product_content">
                    	<?php
						echo $row2->Content;
						?>
                    </div>
                    <div class="clear"></div>
                    <div class="div_product_cmt">
                    	<?php
						$que8 = que("SELECT * FROM post_comments WHERE Active = 1 AND idPost = '".$row->idPost."' ORDER By Date DESC");
						while ($row8 = mysql_fetch_object($que8))
						{			
							$que9 = que("SELECT * FROM users WHERE idUser = '".$row8->idUser."'");
							$row9 = mysql_fetch_object($que9);
						?>
                        <div class="div_product_1cmt">
                        	<img src="images/<?php replaceAva($row9->urlAvatar); ?>" />
                            
                            <?php
                            if ($row8->idUser <> 0)
								echo '<a class="a_author" href="personal.php?do=products&name='.$row9->NameNone.'">'.$row9->Name.'</a>';
							elseif ($row8->idUser == 0)
								echo '<a class="a_author" href="#">'.$row8->Name.' :</a>';
                            ?>
							
                            <span>
							<?php 
							DateFriendly($row8->sDate);
                            echo ' | ';
                            TimeFriendly($row8->Date);
							?></span>
                            <p class="p_comment">
                            <?php echo $row8->Content; ?>
                            </p>
                            <?php
                            $que_uS = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
							$row_uS = mysql_fetch_object($que_uS);
							if ($row2->idUser == $row_uS->idUser || ($row_uS->idUser == $row9->idUser && $row_uS->idUser <> '') || $row_uS->idGroup == 1)
								echo '<a class="a_del" href="del_cmt.php?idc='.$row8->idPost_Comment.'">Xóa</a>';
							?>
                            <div class="clear"></div>
                            
                        </div><!-- .div_product_1cmt -->
                        <?php
						}
						?>
                    <div class="clear"></div>
                    <!-- I comment -->
					<?php
                    if (isset($_SESSION['Name']))
                    {
                    ?>
                    <div class="div_product_1cmt" id="I_comment">
                        <?php
                        $que10 = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
                        $row10 = mysql_fetch_object($que10);
                        ?>
                        <img src="images/
						<?php
                        replaceAva($row10->urlAvatar);
                        ?>
                        "/>
                        <a class="a_author" href="personal.php?do=shows&name=<?php echo $_SESSION['NameNone']; ?>">
                        <?php
                        echo $_SESSION['Name'];	
                        ?>
                        :
                        </a>
                        
                        <p class="p_comment">
                        <form class="fcomment" name="fc" method="post" action="up_comments.php?type=posts&name=<?php echo $row2->NameNone; ?>">
                            <textarea class="fccontent" cols="75" rows="5" name="fc_content"></textarea>
                            <input class="fcimg" name="fc_img" type="image" src="templates/comment.png" />
                        </form>
                        </p>
                        
                    </div>
					<?php
                    }
                    else
                    {
                    ?>
                    
                    <div class="div_product_1cmt" id="I_comment">
                        <h1>Khách viết bình luận :</h1>
                        <p class="p_comment">
                        <form class="fcomment" name="fc" method="post" action="up_comments.php?type=posts&name=<?php echo $row2->NameNone; ?>">
                        	<label>Nhập tên : </label>
                        	<input class="fctxt" name="fc_name" type="text" /><br /><br />
                            <label>Nội dung bình luận : </label>
                            <textarea class="fccontent" cols="75" rows="5" name="fc_content"></textarea>
                            <input class="fcimg" name="fc_img" type="image" src="templates/comment.png" />
                        </form>
                        </p>
                    </div>
					<?php
                    }
                    ?>
                    <div class="clear"></div>
                    </div><!-- .div_product_cmt -->
                    
                </div><!-- .div_product -->
                
            </div><!-- .div_products -->
			
            </div><!-- .content -->
            
			
            <div class="div_sbright">
            
            	<div class="div_area" id="sr1">
                	<div class="div_area_title">
                    	<img src="templates/icon_saleoff.png" />
                        <a href="promote.php?type=all"><h1>Sản phẩm Khuyến mãi</h1></a>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<li class="show">
                    			<a class="a_img" href="detail_product.php?name=Big-Polo-794659"><img src="images/Shop4la%20-%20196117_252339798208429_1481603366_n-23554.jpg" alt="ao thun - mua xinh" /></a>
                                <p class="p_summary">
                                	Big Polo Shop ---- NHẬN ORDER SỈ LẺ CÁC MẶT HÀNG QUẢNG CHÂU ...
                                </p>
                                <div class="clear"></div>
                                <a class="a_author" href="#">
                                	<p class="p_author">
                                	Đăng bởi: <span>Big Polo</span>
                                	</p>
                                </a>
                                <p class="p_price">
                                	Giá: <span>160.000 vnđ</span>
                                </p>
                              <a class="a_more" href="promote.php?type=all">Xem thêm</a>
                        	</li>
                            
                            <?php
                            $que_sr1 = que("SELECT * FROM products WHERE idPr = 2 AND PriProduct = 1 AND Active = 1 ORDER BY Date DESC LIMIT 3,3");
                            while ($row_sr1 = mysql_fetch_object($que_sr1))
                            {
                            ?>
                            <li class="hide">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row_sr1->NameNone; ?>"><img src="images/<?php echo $row_sr1->urlImg; ?>" alt="<?php echo $row_sr1->Summary; ?>" /></a>
                                <p class="p_summary">
                                	<?php
									$summary = smr($row_sr1->Summary, 50);
									echo $summary;
									?>
                                </p>
                                <div class="clear"></div>
                                <?php
								$que_sr1b = que("SELECT * FROM users WHERE idUser = '".$row_sr1->idUser."'");
								$row_sr1b = mysql_fetch_object($que_sr1b);
								?>
                                <a class="a_author" href="personal.php?do=products&name=<?php echo $row_sr1b->NameNone; ?>">
                                	<p class="p_author">
                                	Đăng bởi: <span>
                                    <?php
									echo $row_sr1b->Name;
									?>
                                    </span>
                                	</p>
                                </a>
                                <p class="p_price">
                                	Giá: <span><?php cleanPrice($row_sr1->Price); ?> vnđ</span>
                                </p>
                              <a class="a_more" href="promote.php?type=all">Xem thêm</a>
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                    </div>
                    <div class="clear"></div>
                </div><!-- #sr1 -->
                
                <div class="div_area" id="sr2">
                	<div class="div_area_title">
                        <h1>Các Sản phẩm cùng người bán</h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        	
                            <?php
							$que_p = que("SELECT * FROM products WHERE idUser = '".$row->idUser."' AND PriProduct = 1 ORDER BY Date DESC LIMIT 0, 10");
							while ($row_p = mysql_fetch_object($que_p))
                            {
							?>
                            <li class="li_area_content">
                            	<img class="img_logobg" src="templates/logo.png" />
                    			<div class="div_number">
                                </div>
                                <a class="a_img" href="detail_product.php?name=<?php echo $row_p->NameNone; ?>"><img src="images/<?php echo $row_p->urlImg; ?>" alt="<?php echo $row_p->Summary; ?>" /></a>
                                <p class="p_summary_p">
									<?php
									echo '<span style="color:#FF6600; font-weight: bold;">'.$row_p->Name.'</span><br />';
									$summary = smr($row_p->Summary, 100);
									echo $summary;
									?>
                                </p>
                                <div class="clear"></div>
                              
                              <a class="a_more" href="detail_product.php?name=<?php echo $row_p->NameNone; ?>">Xem thêm</a>
                              <div class="clear"></div>
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                    </div>
                    <div class="clear"></div>
                </div><!-- #sr2 -->
                
                <!--<div class="div_area" id="sr3">
                	<div class="div_area_title">
                        <img src="templates/icon_statistics.png" /><h1>Thống kê</h1>
                    </div>
                    <div class="div_area_content">
                    	<img src="templates/icon_statistics2.png" /><p>Số lượng truy cập</p>
                        <h1>
                        <?php
						/*$que_h = que("SELECT * FROM hit WHERE idHit = 1");
						$row_h = mysql_fetch_object($que_h);
						$hit = $row_h->Hit;
						echo $hit;
						?>
                        </h1>
                        
                        <img src="templates/icon_shop3.png" /><p>Shop hàng mới nhất</p>
                        <h1>
                        <?php
						$que_lp = que("SELECT * FROM posts ORDER BY Date DESC LIMIT 0,1");
						$row_lp = mysql_fetch_object($que_lp);
						$name_lp = smr($row_lp->Name, 50);
						echo '<a href="detail_product.php?name='.$row_lp->NameNone.'">'.$name_lp.'</a>';
						?>
                        </h1>
                        
                        <img src="templates/icon_user.png" /><p>Người đăng ký mới nhất</p>
                        <h1>
                        <?php
						$que_lu = que("SELECT * FROM users ORDER BY RegDate DESC LIMIT 0,1");
						$row_lu = mysql_fetch_object($que_lu);
						echo '<a href="personal.php?do=products&name='.$row_lu->NameNone.'">'.$row_lu->Name.'</a>';
						*/?>
                        </h1>
                    </div>
                </div>-->
                
            </div><!-- .sbright -->
            
            
            
   		</div><!-- #primary -->
        
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php //require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
