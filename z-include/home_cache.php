<?php
session_start();
$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$_SESSION['url'] = $url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/slider_jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="scripts/slider_jquery.scrollTo.js"></script>
<script type="text/javascript" src="scripts/slider_embed.js"></script>
<script type="text/javascript" src="scripts/a1_embed.js"></script>
<script type="text/javascript" src="scripts/sr1_embed.js"></script>
<?php require_once('connect/muaxinh.php'); ?>
<?php require_once('func/main.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mua xinh - Mua, bán, trao, đổi quần áo - Thể hiện cá tính thời trang của bạn</title>
</head>

<body>
<div id="container">
	<div id="eheader">
    	<div id="header">
        	<div class="div_logo">
            	<img src="templates/logo.png" />            
            </div>
            <div class="div_slogan">
            	Thời trang theo phong cách của bạn...
            </div>
            <div class="div_search">
            	<form class="fsearch" name="search" method="post" action="search_result.php">
                    <input class="fsquery" name="fsquery" type="text" />
                    <input class="fsimg" name="img" type="image" src="templates/search.png" />
            	</form>
            </div>
            <?php
			if (!isset($_SESSION['Name']))
			{
			?>
            <div class="div_login">
            
            	<form class="flogin" name="fl" method="post" action="login.php?do=login">
                    <input class="flqueryu" name="fl_user" type="text" />
                    <input class="flqueryp" name="fl_pass" type="password" />
                    <input class="flcheck" type="checkbox" />
                    <label>Ghi nhớ</label>
                    <input class="flimg" name="fl_img" type="image" src="templates/login_gr.png" />
            	</form>
                
            </div>
            <?
			}
			else
			{
			?>
				<h1 class="h1_hello">Chào <span><?php echo $_SESSION['Name']; ?></span> !</h1>
			<?php
			}
			?>
            <div class="div_register">
            	<?php
				if (!isset($_SESSION['Name']))
				{
				?>
            	<a href="register.php">Đăng ký</a><br />
                <a href="lost_pass.php">Quên mật khẩu ?</a>
                <?php
				}
				else
				{
				?>
                <a class="a_logout" href="login.php?do=logout">Thoát</a>
                <?php
				}
				?>
            </div>
            <ul class="ul_help">
            	<li class="li_help">
                	Hỗ trợ trực tuyến
                    <div class="div_help_tel">
                        <img class="img_tel" src="templates/tel.png" />
                        <div class="div_h1"><span>HOTLINE :</span> 0168 204 0081</div>
                        
                        <div class="clear"></div>
                        <div class="div_h2">Kinh Doanh :</div>
                        <a href="ymsgr:sendim?doanductin_doanductin&amp;m=Hello">
                            <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=doanductin_doanductin&m=g&t=1=us" border=0>                        
                        </a>
                        <div class="clear"></div>
                        <div class="div_h2">Kỹ thuật :</div>
                        <a href="ymsgr:sendim?conghao_89dn&amp;m=Hello">
                            <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=conghao_89dn&m=g&t=1=us" border=0>                        
                        </a>
                        <div class="clear"></div>
                        <div class="div_h2">Tư vấn Mua-Bán :</div>
                        <a href="ymsgr:sendim?daisuke_dn_acc&amp;m=Hello">
                            <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=daisuke_dn_acc&m=g&t=1=us" border=0>                        
                        </a>
                    </div>
                </li>
                <li class="li_help" id="use">
                    Hướng dẫn MUA / BÁN hàng
                    <div class="div_help_use">
                        <a class="a_buy" href="help.php?do=buy">Hướng dẫn <span>MUA</span> hàng</a><br /><br />
                        <a class="a_sale" href="help.php?do=sale">Hướng dẫn <span>ĐĂNG BÁN</span></a>
                    </div>
            	</li>
            </ul>
            
   		</div><!-- #header -->
    </div><!-- #eheader -->
    <div id="enav">
    	<div id="nav">
        	<ul class="ul_nav">
            	<li class="li_nav" id="nav_home">
                	<a id="a_home" href="home.php"><div></div></a>
                </li><span> :: </span>
                <li class="li_nav">
                	<a href="fashion.php">Thời trang</a>
                    <ul class="ul_subnav">
                    	<li class="li_subnav">
                        	<a href="fashion.php?do=men">Áo quần Nam</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="fashion.php?do=women">Áo quần Nữ</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="fashion.php?do=child">Áo quần trẻ em</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="fashion.php?do=other">Thời trang khác</a>
                        </li>
                    </ul>
                </li><span> :: </span>
                <li class="li_nav">
                	<a href="old.php">Phố đồ cũ</a>
                    <ul class="ul_subnav">
                    	<li class="li_subnav">
                        	<a href="old.php?do=men">Nam</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="old.php?do=women">Nữ</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="old.php?do=child">Đồ cũ trẻ em</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="old.php?do=other">Thời trang khác</a>
                        </li>
                    </ul>
                </li><span> :: </span>
                <li class="li_nav">
                	<a href="exchange.php">Khu trao đổi</a>
                </li><span> :: </span>
                <li class="li_nav" id="nav_big">
                	<a href="
                    <?php 
					if (isset($_SESSION['Name']))
						echo 'personal.php?do=shows&name='.$_SESSION['NameNone'];
					else
						echo 'login.php';
					?>
                    ">Thời trang của tôi</a>
                </li><span> :: </span>
                <li class="li_nav">
                	<a href="feedback.php">Phản hồi</a>
                </li>
            </ul>
   		</div><!-- #nav -->
    </div><!-- #enav -->
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            	<div class="div_area" id="a1">
                	<div class="div_area_title">
                    	<img src="templates/icon_star.png" />
                        <h1>Sản phẩm nổi bậc</h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<li class="show">
                    			<a class="a_img" href="detail_product.php?name=Ao-quan-mua-xinh1"><img src="images/1332592770472586698_130_130.jpg" alt="ao thun - mua xinh" /></a>
                                <p class="p_summary">
                                	Áo thun chất lượng, giá thanh lý, mua ở Cam-pu-chia...Áo thun chất lượng, giá thanh lý, mua ở Cam-pu-chia...
                                </p>
                                <div class="clear"></div>
                                <a class="a_author" href="personal.php?do=products&name=hao">
                                	<p class="p_author">
                                	Đăng bởi: <span>hao</span>
                                	</p>
                                </a>
                                <p class="p_price">
                                	Giá: <span>23.000 vnđ</span>
                                </p>
                              <a class="a_more" href="detail_product.php?name=Ao-quan-mua-xinh1">Xem thêm</a>
                        	</li>
                            
                            <?php
                            $que = que("SELECT * FROM products WHERE idHot = 3 ORDER BY Date DESC LIMIT 0,2");
                            while ($row = mysql_fetch_object($que))
                            {
                            ?>
                            <li class="hide">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 58);
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
                                	Giá: <span><?php echo $row->Price; ?> vnđ</span>
                                </p>
                              <a class="a_more" href="detail_product.php?name=<?php echo $row->NameNone; ?>">Xem thêm</a>
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
                                <li><a href="#"><img class="imgslider" src="images/slider/s1.jpg" alt=""/></a></li>
                                <li><a href="#"><img class="imgslider" src="images/slider/s2.jpg" alt=""/></a></li>
                                <li><a href="#"><img class="imgslider" src="images/slider/s3.jpg" alt=""/></a></li>
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
                        <h1><a href="hotnnew.php?do=hot">Thời trang hot</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<?php		
                            $que = que("SELECT * FROM products WHERE idHot = 2 ORDER BY Date DESC LIMIT 0,8");
                            while ($row = mysql_fetch_object($que))
                            {
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
                                	Giá: <span><?php echo $row->Price; ?> vnđ</span>
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
                        <a class="a_more" href="hotnnew.php?do=hot">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #b1 -->
                
                <div class="div_area_big" id="c1">
                	<div class="div_area_title">
                    	<img src="templates/icon_new.png" />
                        <h1><a href="hotnnew.php?do=new">Sản phẩm mới nhất</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
 
                            <?php
                            $que = que("SELECT * FROM products ORDER BY Date DESC LIMIT 0,4");
                            while ($row = mysql_fetch_object($que))
                            {
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
                                <div class="clear"></div>
                                <p class="p_price">
                                	Giá: <span><?php echo $row->Price; ?> vnđ</span>
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
                        <a class="a_more" href="hotnnew.php?do=new">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #c1 -->
                
                <div class="div_area_big" id="d1">
                	<div class="div_area_title">
                    	<img src="templates/icon_clothers.png" />
                        <h1><a href="old.php">Đồ cũ</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<?php
                            $que = que("SELECT * FROM products WHERE idOldNew = 2 ORDER BY Date DESC LIMIT 0,4");
                            while ($row = mysql_fetch_object($que))
                            {
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
                                <div class="clear"></div>
                                <p class="p_price">
                                	Giá: <span><?php echo $row->Price; ?> vnđ</span>
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
                        <a class="a_more" href="old.php">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #d1 -->
                
                <div class="div_area_big" id="e1">
                	<div class="div_area_title">
                    	<img src="templates/icon_thoitrang.png" />
                        <h1><a href="shows.php">Show hàng</a></h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        	
                            <?php
                            $que = que("SELECT * FROM show_comments ORDER BY Date DESC");
							$idS[] = 0;
							$idSCount = 0;
							while ($row = mysql_fetch_object($que))
                            {
							$token = 'ok';
								for ($i = 0; $i <= $idSCount; $i++)
								{
									if ($row->idShow == $idS[$i])
									{
										$token = 'none';
									}
								}
								if ($token == 'ok' && $idSCount < 3)
								{
									$idSCount++;
									$que1 = que("SELECT * FROM shows WHERE idShow = '".$row->idShow."'");
									$row1 = mysql_fetch_object($que1);
                            ?>
                        	<li class="li_area_content">
                    			<a class="a_img" href="detail_show.php?name=<?php echo $row1->NameNone; ?>"><img src="images/<?php echo $row1->urlImg; ?>" alt="<?php echo $row1->Summary; ?>" /></a>
                                <a class="a_summary" href="detail_show.php?name=<?php echo $row1->NameNone; ?>">
                                	<p class="p_summary">
                                	<?php
									$summary = smr($row1->Summary, 58);
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
                                Có <span><?php echo $row1->nLike; ?></span> người thích và <span>
                                <?php
                                $que5 = que("SELECT COUNT(Content) FROM show_comments WHERE idShow = '".$row->idShow."'");
								$row5 = mysql_fetch_array($que5);
								echo $row5['COUNT(Content)'];
								?>
                                </span> comments
                                </p>
                                
                                <?php
								$que3a = que("SELECT COUNT(Name) FROM show_comments WHERE idShow = '".$row->idShow."'");
								$row3a = mysql_fetch_array($que3a);
								$start3a = $row3a['COUNT(Name)'] - 3;
								if ($start3a < 0)
								{
									$start3a = 0;
								}
								$que3 = que("SELECT * FROM show_comments WHERE idShow = '".$row->idShow."' ORDER BY Date ASC LIMIT ".$start3a.",3");
								while ($row3 = mysql_fetch_object($que3))
								{
								?>
                                <div class="div_comment">
                                	<?php
                                    $que4 = que("SELECT * FROM users WHERE idUser = '".$row3->idUser."'");
									$row4 = mysql_fetch_object($que4);
									?>
                                	<img src="images/<?php echo $row4->urlAvatar; ?>" />
                                    <a class="a_author" href="personal.php?do=info&name=<?php echo $row4->NameNone; ?>">
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
                                    <form class="fcomment" name="fc" method="post" action="detail_show_cmt.php?name=<?php echo $row1->NameNone; ?>">
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
                                <a class="a_comment_detail" href="detail_show.php?name=<?php echo $row1->NameNone; ?>">
                                Xem chi tiết các bình luận
                                </a>
                        	</li>
                            <?php
								}
								$idS[] = $row->idShow;
							}
							?>
                            
                    	</ul>
                        <a class="a_more" href="shows.php">Xem thêm</a>
                    </div>
                    <div class="clear"></div>
                </div><!-- #e1 -->
                
            </div><!-- .content -->
            <div class="div_sbright">
            
            	<div class="div_area" id="sr1">
                	<div class="div_area_title">
                    	<img src="templates/icon_shop.png" />
                        <h1>Shop uy tín</h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        
                        	<li class="show">
                    			<a class="a_img" href="detail_product.php?name=Ao-quan-mua-xinh1"><img src="images/1332592770472586698_130_130.jpg" alt="ao thun - mua xinh" /></a>
                                <p class="p_summary">
                                	Áo thun chất lượng, giá thanh lý, mua ở Cam-pu-chia...Áo thun chất lượng, giá thanh lý, mua ở Cam-pu-chia...
                                </p>
                                <div class="clear"></div>
                                <a class="a_author" href="personal.php?do=products&name=hao">
                                	<p class="p_author">
                                	Đăng bởi: <span>hao</span>
                                	</p>
                                </a>
                                <p class="p_price">
                                	Giá: <span>23.000 vnđ</span>
                                </p>
                              <a class="a_more" href="detail_product.php?name=Ao-quan-mua-xinh1">Xem thêm</a>
                        	</li>
                            
                            <?php
                            $que = que("SELECT * FROM products WHERE idHot = 3 ORDER BY Date DESC LIMIT 0,2");
                            while ($row = mysql_fetch_object($que))
                            {
                            ?>
                            <li class="hide">
                    			<a class="a_img" href="detail_product.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <p class="p_summary">
                                	<?php
									$summary = smr($row->Summary, 58);
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
                                	Giá: <span><?php echo $row->Price; ?> vnđ</span>
                                </p>
                              <a class="a_more" href="detail_product.php?name=<?php echo $row->NameNone; ?>">Xem thêm</a>
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
                        <h1>Show hàng được bình chọn</h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        	
                            <?php
							$que = que("SELECT * FROM shows ORDER BY nLike DESC LIMIT 0,5");
                            $count = 0;
							while ($row = mysql_fetch_object($que))
                            {
							?>
                            <li class="li_area_content">
                            	<img class="img_logobg" src="templates/logo.png" />
                    			<div class="div_number">
                                <?php
								$count++;
								echo $count;
								?>
                                </div>
                                <a class="a_img" href="detail_show.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Summary; ?>" /></a>
                                <p class="p_summary">
                                	Áo thun chất lượng, giá thanh lý, mua ở Cam-pu-chia...Áo thun chất lượng.
                                </p>
                                <div class="clear"></div>
                                <?php
								$que1 = que("SELECT * FROM users WHERE idUser = '".$row->idUser."'");
								$row1 = mysql_fetch_object($que1);
								?>
                                <a class="a_author" href="personal.php?do=shows&name=<?php echo $row1->NameNone; ?>">
                                	<p class="p_author">
                                	Đăng bởi: <span>
                                    <?php
									echo $row1->Name;
									?>
                                    </span>
                                	</p>
                                </a>
                                <p class="p_like">
                                Có <span>
                                <?php echo $row->nLike; ?>
                                </span> người thích và <span>
                                <?php
                                $que2 = que("SELECT COUNT(Content) FROM show_comments WHERE idShow = '".$row->idShow."'");
								$row2 = mysql_fetch_array($que2);
								echo $row2['COUNT(Content)'];
								?>
                                </span> comments
                                </p>
                              
                              <a class="a_more" href="detail_show.php?name=<?php echo $row->NameNone; ?>">Xem thêm</a>
                              <div class="clear"></div>
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                    </div>
                    <div class="clear"></div>
                </div><!-- #sr2 -->
                
            </div><!-- .sbright -->
   		</div><!-- #primary -->
        <div class="clear"></div>
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <div id="efooter">
    	<div id="footer">
            <img class="img_footer" src="templates/logo.png" />
            <h1 class="h1_footer_title">
            	Mua xinh - Mua bán, trao đổi, chia sẻ phong cách thời trang
            </h1>
            <div class="div_fa1">
            	<a class="a_fa_title" href="fashion.php">Mua bán, trao đổi</a>
            	<a class="a_fa" href="fashion.php?do=men">Quần áo Nam</a>
                <a class="a_fa" href="fashion.php?do=women">Quần áo Nữ</a>
                <a class="a_fa" href="fashion.php?do=child">Quần áo Trẻ em</a>
                <a class="a_fa" href="fashion.php?do=other">Phụ kiện khác</a>
            </div>
            <div class="div_fa2">
            	<a class="a_fa_title" href="old.php">Đồ cũ</a>
            	<a class="a_fa" href="old.php?do=men">Quần áo Nam</a>
                <a class="a_fa" href="old.php?do=women">Quần áo Nữ</a>
                <a class="a_fa" href="old.php?do=child">Quần áo Trẻ em</a>
                <a class="a_fa" href="old.php?do=other">Phụ kiện khác</a>
            </div>
            <div class="div_fa3">
            	<a class="a_fa_title" href="shows.php">Show hàng</a>
            	<a class="a_fa" href="shows.php?do=vote">Được bình chọn nhiều nhất</a>
                <a class="a_fa" href="shows.php?do=latest">Mới nhất</a>
                <a class="a_fa" href="shows.php?do=vote">Đăng nhiều nhất</a>
                <a class="a_fa" href="
                <?php 
				if (isset($_SESSION['Name']))
					echo 'personal.php?do=shows&name='.$_SESSION['NameNone'];
				else
					echo 'login.php';
				?>
                ">Show hàng của tôi</a>
            </div>
            <div class="div_fa4">
            	<a class="a_fa_title" href="#">MuaXinh.Com</a>
                <p>Email : <span>contact@muaxinh.com</span></p>
                <p>Điện thoại : <span>0168 204 0081 - 0126 270 0836 - 0121 550 4573</span></p>
            </div>
   		</div><!-- #footer -->
        <div class="div_bottom">
        	<p class="p_left">Sàn giao dịch TMĐT không thèm đăng ký</p>
            <p class="p_right">Ra đời năm 2012. Toàn quyền được bảo hộ</p>
        </div>
    </div><!-- #efooter -->
</div><!-- end #container -->

</body>
</html>
