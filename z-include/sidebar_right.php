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
                            $que = que("SELECT * FROM products WHERE idPr = 2 AND PriProduct = 1 AND Active = 1 ORDER BY Date DESC LIMIT 3,3");
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
                </div><!-- #sr1 -->
                
                <div class="fb-like-box" data-href="http://www.facebook.com/phomuasamm" data-width="245" data-height="640" data-show-faces="true" data-border-color="#ccc" data-stream="true" data-header="true"></div>
                
                <div class="div_area" id="sr3">
                	<div class="div_area_title">
                        <h1>Tin tức Thời trang</h1>
                    </div>
                    <div class="div_area_content">
                    	<ul class="ul_area_content">
                        	
                            <?php
							$que = que("SELECT * FROM news WHERE Active = 1 ORDER BY Date DESC LIMIT 0,6");
							while ($row = mysql_fetch_object($que))
                            {
							?>
                            <li class="li_area_content">
                                <h1><a href="detail_news.php?name=<?php echo $row->NameNone; ?>">
								<img src="templates/b_play.png" />
								<?php echo $row->Name; ?></a></h1>
                                <div class="clear"></div>
                        	</li>
                            <?php
							}
							?>
                            
                    	</ul>
                    </div>
                    <div class="clear"></div>
                </div><!-- #sr3 -->
                
                <div class="div_area" id="sr2">
                	<div class="div_area_title">
                        <h1>Thời trang được bình chọn</h1>
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
								echo $row2['COUNT(Content)'] - 1;
								?>
                                </span> bình luận
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
                
                <!--<div class="div_area" id="sr2">
                	<div class="div_area_title">
                        <h1>Kết nối facebook</h1>
                    </div>
                    <div class="div_area_content">
                		<div class="fb-comments" data-href="http://thoitrangchung.com" data-num-posts="2" data-width="244px"></div>
                    </div>
                </div>-->

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