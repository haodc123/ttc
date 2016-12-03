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
<?php require_once('z-include/title_p2.php'); ?>
</head>

<body>

<?php
$que_h = que("SELECT * FROM hit WHERE idHit = 1");
$row_h = mysql_fetch_object($que_h);
$hit = $row_h->Hit;
$hit ++;
$queu_h = que("UPDATE hit SET Hit = '$hit' WHERE idHit = 1");
?>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
			<script type="text/javascript" charset="utf-8" src="http://cdn.sencha.io/ext-4.1.0-gpl/ext-all.js"></script>
            	<div class="div_area" id="a1">
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
                                	Giá: <span>210.000 vnđ</span>
                                </p>
                              <a class="a_more" href="promote.php?type=all">Xem thêm</a>
                        	</li>
                            
                            <?php
                            $que = que("SELECT * FROM products WHERE idPr = 2 AND PriProduct = 1 AND Active = 1 ORDER BY Date DESC LIMIT 0,3");
                            while ($row = mysql_fetch_object($que))
                            {
                            ?>
                            <li class="hide">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 50);
									echo $summary;
									?>
                                </p>
                                <div class="clear"></div>
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
                                <p class="p_price">
                                	Giá: <span><?php cleanPrice($row->Price); ?> vnđ</span>
                                </p>
                              <a class="a_more" href="promote.php?type=all">Xem thêm</a>
                        	</li>
                            <?php
							}
							?>
                    	</ul>
                    </div>
                    <div class="clear"></div>
                </div><!-- #a1 -->
                
                <div class="div_slider" id="a2">
                	<div id="slider">
                        <div id="mask-gallery">
                            <ul id="gallery">
                                <li><a href="ann.php"><img class="imgslider" src="images/slider/s1.jpg" alt=""/></a></li>
                                <li><a href="ann.php"><img class="imgslider" src="images/slider/s2.jpg" alt=""/></a></li>
                                <li><a href="ann.php"><img class="imgslider" src="images/slider/s3.jpg" alt=""/></a></li>
                            </ul>
                        </div>
                        <!--
                        <div id="mask-excerpt">
                            <ul id="excerpt">
                                <li>Cras dictum. Maecenas ut turpis. In vitae erat ac orci dignissim eleifend.</li>
                                <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</li>
                                <li>Nunc quis justo. Sed vel ipsum in purus tincidunt pharetra.</li>
                            </ul>
                        </div> -->
                        <div id="buttons">
                            <a href="#" id="btn-prev"><img class="imgbut" src="templates/b_prev.png" id="btn-prev" /></a>
                            <a href="#" id="btn-pause"><img class="imgbut" src="templates/b_pause.png" id="btn-pause" /></a>
                            <a href="#" id="btn-play"><img class="imgbut" src="templates/b_play.png" id="btn-play" /></a>
                            <a href="#" id="btn-next"><img class="imgbut" src="templates/b_next.png" id="btn-next" /></a>
                        </div>
   			  		</div><!-- #slider -->
                </div><!-- #a2 -->
                <div class="clear"></div>
                
                <div class="div_area_big" id="b1">
                	<div class="div_area_title">
                    	<img src="templates/icon_hot.png" />
                        <h1><a href="hot.php?type=all">Thời trang hot</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<?php		
                            $que = que("SELECT * FROM products WHERE idHot = 3 AND PriProduct = 1 AND Active = 1 ORDER BY Date DESC LIMIT 0,8");
                            while ($row = mysql_fetch_object($que))
                            {
                            ?>
                        	<li class="li_area_content">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <a class="a_summary" href="detail_product.php?name=<?php echo $row->NameNone; ?>">
                                	<p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 50);
									echo $summary;
									?>
                                	</p>
                                </a>
                                <div class="clear"></div>
                                <p class="p_price">
                                	Giá: <span><?php cleanPrice($row->Price); ?> vnđ</span>
                                </p>
                                <?php
								$que1 = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
								$row1 = mysql_fetch_object($que1);
								?>
                                <!--<a class="a_author" href="personal.php?do=products&name=<?php echo $row1->NameNone; ?>">
                                	<p class="p_author">
                                	Đăng bởi: <span>
									<?php
									echo $row1->Name;
									?>
                                    </span>
                                	</p>
                                </a>-->
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                        <a class="a_more" href="hot.php?type=all">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #b1 -->
                
                <div class="div_area_big" id="b2">
                	<div class="div_area_title">
                    	<img src="templates/icon_good.png" />
                        <h1><a href="good.php?type=all">Thời trang nổi bật</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
 
                            <?php
                            $que = que("SELECT * FROM products WHERE idHot = 2 AND PriProduct = 1 AND Active = 1 ORDER BY Date DESC LIMIT 0,8");
                            while ($row = mysql_fetch_object($que))
                            {
                            ?>
                        	<li class="li_area_content">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <a class="a_summary" href="detail_product.php?name=<?php echo $row->NameNone; ?>">
                                	<p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 50);
									echo $summary;
									?>
                                	</p>
                                </a>
                                <div class="clear"></div>
                                <p class="p_price">
                                	Giá: <span><?php cleanPrice($row->Price); ?> vnđ</span>
                                </p>
                                <?php
								$que1 = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
								$row1 = mysql_fetch_object($que1);
								?>
                                <!--<a class="a_author" href="personal.php?do=products&name=<?php echo $row1->NameNone; ?>">
                                	<p class="p_author">
                                	Đăng bởi: <span>
									<?php
									echo $row1->Name;
									?>
                                    </span>
                                	</p>
                                </a>-->
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                        <a class="a_more" href="good.php?type=all">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #b2 -->
                
                <div class="div_area_big" id="c1">
                	<div class="div_area_title">
                    	<img src="templates/icon_new.png" />
                        <h1><a href="fashion.php?type=all&sort=Date">Sản phẩm mới nhất</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
 
                            <?php
                            $que = que("SELECT * FROM products WHERE PriProduct = 1 AND idOldNew = 1 AND idHot = 1 AND Active = 1 ORDER BY Date DESC LIMIT 0,8");
                            while ($row = mysql_fetch_object($que))
                            {
                            ?>
                        	<li class="li_area_content">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <a class="a_summary" href="detail_product.php?name=<?php echo $row->NameNone; ?>">
                                	<p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 50);
									echo $summary;
									?>
                                	</p>
                                </a>
                                <div class="clear"></div>
                                <p class="p_price">
                                	Giá: <span><?php cleanPrice($row->Price); ?> vnđ</span>
                                </p>
                                <?php
								$que1 = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
								$row1 = mysql_fetch_object($que1);
								?>
                                <!--<a class="a_author" href="personal.php?do=products&name=<?php echo $row1->NameNone; ?>">
                                	<p class="p_author">
                                	Đăng bởi: <span>
									<?php
									echo $row1->Name;
									?>
                                    </span>
                                	</p>
                                </a>-->
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                        <a class="a_more" href="fashion.php?type=all&sort=Date">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #c1 -->
                
                <div class="div_area_big" id="d1">
                	<div class="div_area_title">
                    	<img src="templates/icon_clothers.png" />
                        <h1><a href="old.php?type=all">Đồ cũ</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<?php
                            $que = que("SELECT * FROM products WHERE idOldNew = 2 AND PriProduct = 1 AND idHot = 1 AND Active = 1 ORDER BY Date DESC LIMIT 0,4");
                            while ($row = mysql_fetch_object($que))
                            {
                            ?>
                        	<li class="li_area_content">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <a class="a_summary" href="detail_product.php?name=<?php echo $row->NameNone; ?>">
                                	<p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 50);
									echo $summary;
									?>
                                	</p>
                                </a>
                                <div class="clear"></div>
                                <p class="p_price">
                                	Giá: <span><?php cleanPrice($row->Price); ?> vnđ</span>
                                </p>
                                <?php
								$que1 = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
								$row1 = mysql_fetch_object($que1);
								?>
                                <!--<a class="a_author" href="personal.php?do=products&name=<?php echo $row1->NameNone; ?>">
                                	<p class="p_author">
                                	Đăng bởi: <span>
									<?php
									echo $row1->Name;
									?>
                                    </span>
                                	</p>
                                </a>-->
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                        <a class="a_more" href="old.php?type=all">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #d1 -->
                
                <div class="div_area_big" id="e1">
                	<div class="div_area_title">
                    	<img src="templates/icon_thoitrang.png" />
                        <h1><a href="shows.php">Thời trang phong cách</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        	
                            <?php
                            $que = que("SELECT * FROM shows WHERE Active = 1 ORDER BY LDate DESC LIMIT 0,3");
							while ($row = mysql_fetch_object($que))
                            {
								$que1 = que("SELECT * FROM show_comments WHERE idShow = '".$row->idShow."' AND PriShow = 1");
								$row1 = mysql_fetch_object($que1);
                            ?>
                        	<li class="li_area_content">
                    			<a class="a_img" href="detail_show.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <a class="a_summary" href="detail_show.php?name=<?php echo $row->NameNone; ?>">
                                	<p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 50);
									echo $summary;
									?>
                                	</p>
                                </a>
                                <div class="clear"></div>
                                <?php
								$que2 = que("SELECT * FROM users WHERE idUser = '".$row1->idUser."'");
								$row2 = mysql_fetch_object($que2);
								?>
                                <a class="a_author" href="personal.php?do=shows&name=<?php echo $row2->NameNone; ?>">
                                	<p class="p_author">
                                	Chủ nhân: <span>
                                    <?php
									echo $row2->Name;
									?>
                                    </span>
                                	</p>
                                </a>
                                <p class="p_like">
                                Có <span><?php echo $row->nLike; ?></span> người thích và <span>
                                <?php
                                $que5 = que("SELECT COUNT(Content) FROM show_comments WHERE idShow = '".$row->idShow."'");
								$row5 = mysql_fetch_array($que5);
								echo $row5['COUNT(Content)'] - 1;
								?>
                                </span> bình luận
                                </p>
                                
                                <?php
                                
								$que3a = que("SELECT COUNT(Name) FROM show_comments WHERE idShow = '".$row->idShow."' AND PriShow = 0");
								$row3a = mysql_fetch_array($que3a);
								$start3a = $row3a['COUNT(Name)'] - 3;
								if ($start3a < 0)
								{
									$start3a = 0;
								}
								$que3 = que("SELECT * FROM show_comments WHERE idShow = '".$row->idShow."' AND PriShow = 0 ORDER BY Date ASC LIMIT ".$start3a.",3");
								while ($row3 = mysql_fetch_object($que3))
								{
								?>
                                <div class="div_comment">
                                	<?php
                                    $que4 = que("SELECT * FROM users WHERE idUser = '".$row3->idUser."'");
									$row4 = mysql_fetch_object($que4);
									?>
                                	<img src="images/<?php replaceAva($row4->urlAvatar); ?>" />
                                    <a class="a_author" href="personal.php?do=shows&name=<?php echo $row4->NameNone; ?>">
                                    <?php
									echo $row4->Name;
									?>
                                    </a>
                                    <p class="p_comment">
                                    <?php echo $row3->Content; ?>
                                    </p>
                                </div>
                                <?php
								}
								?>
                                
                                <!-- I comment -->
                                <?php
								if (isset($_SESSION['Name']))
								{
								?>
                                <div class="div_comment" id="I_comment">
                                	<?php
									$que6 = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
									$row6 = mysql_fetch_object($que6);
									?>
                                	<img src="images/
									<?php
									replaceAva($row6->urlAvatar);
									?>
                                    "/>
                                    <a class="a_author" href="personal.php?do=shows&name=<?php echo $_SESSION['NameNone']; ?>">
                                    <?php
                                    echo $_SESSION['Name'];	
									?>
                                    :
                                    </a>
                                    <p class="p_comment">
                                    <form class="fcomment" name="fc" method="post" action="up_comments.php?type=shows&name=<?php echo $row->NameNone; ?>">
                                        <textarea class="fccontent" cols="24" name="fc_content"></textarea>
                                        <input class="fcimg" name="fc_img" type="image" src="templates/comment.png" />
                                    </form>
                                    </p>
                                </div>
                                <?php
								}
								else
								{
								?>
                                <h2 class="h2_comment_locked">Bạn chưa thể gửi bình luận khi chưa 
                                <a href="login.php">Đăng nhập</a> hoặc 
                                <a href="register.php">Đăng ký</a></h2>
                                <?php
								}
								?>
                                <a class="a_comment_detail" href="detail_show.php?name=<?php echo $row->NameNone; ?>">
                                Xem chi tiết các bình luận
                                </a>
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                        <a class="a_more" href="shows.php">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #e1 -->
                
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
