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
<title>Cá nhân - <?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">
        	<div class="div_content">
            
            <?php		
			$gname = htmlspecialchars(mysql_real_escape_string($_GET['name']));
			$gdo = htmlspecialchars(mysql_real_escape_string($_GET['do']));
			$que = que("SELECT * FROM users WHERE NameNone = '".$gname."'");
			$row = mysql_fetch_object($que);
			?>
            
            	<div class="div_products">
                	<div class="div_product" id="personal">
                
                	<a class="a_img" href="personal.php?name=<?php echo $row->NameNone; ?>"><img src="images/<?php echo replaceAva($row->urlAvatar); ?>" alt="<?php echo $row->Name; ?>" /></a>
                    
                    <div class="info">
                    	<div class="div_rate">
						<?php
						$que2 = que("SELECT * FROM packages WHERE idPackage = '".$row->idPackage."'");
						$row2 = mysql_fetch_object($que2);
						if ($row2->Name == 'Vàng')
							echo '<img src="templates/icon_gold.png" />';
						elseif ($row2->Name == 'Bạc')
							echo '<img src="templates/icon_silver.png" />';
						?>
                        </div>
                        
                        <a class="a_name" href="personal.php?name=<?php echo $row->NameNone; ?>"><?php echo $row->Name; ?></a><br />
                        <div class="clear"></div>
                        <div class="info_left">
                            <p class="p_line1">
                                Ngày đăng ký : 
                                <?php DateFriendly($row->sRegDate); ?>
                            </p>
                            <p class="p_line2">
                                <?php
                                if ($row->idTypeUser <> 1) echo 'Số lần Post còn lại: '.$row->nPosts;
                                ?>
                            </p>
                            <p class="p_line3">
                                <?php
                                if ($row->idTypeUser <> 1) echo 'Số lượt Up còn lại : '.$row->nUp;
                                ?>
                            </p>
                            <p class="p_line3">
                                <?php
                                if ($row->idTypeUser <> 1) echo 'Số lượt Edit còn lại : '.$row->nEdit;
                                ?>
                            </p>
                        </div>
                        <div class="info_right">
                        	Yahoo ID: 
                            <a href="ymsgr:sendim?<?php echo $row->Yahoo; ?>&amp;m=Chào bạn, mình thấy shop bạn trên Shop4La.Com, mình nói chuyện với bạn 1 chút nhé">
                                <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=<?php echo $row->Yahoo; ?>&m=g&t=1=us" border=0>                        
                            </a><br />
                            ĐT: <?php echo $row->Tel; ?><br />
							Địa chỉ: <?php echo $row->Address; ?>
                        </div>
                        
                    </div><!-- .info -->
                    <div class="clear"></div>
                    
                    </div><!-- .div_product -->
                </div><!-- .div_products -->
                    	
                <div class="div_personal_primary">
                <div class="nav_tab">
                    <div class="div_tab" 
                    <?php
                    if ($gdo == '' || $gdo == 'info') echo 'id="current"';
                    ?>
                    >
                        <a href="personal.php?do=info&name=<?php echo $row->NameNone; ?>">Thông tin</a>
                    </div>
                    <div class="div_tab" 
                    <?php
                    if ($gdo == 'products') echo 'id="current"';
                    ?>
                    >
                        <a href="personal.php?do=products&name=<?php echo $row->NameNone; ?>">Sản phẩm</a>
                    </div>
                    <div class="div_tab" 
                    <?php
                    if ($gdo == 'shows') echo 'id="current"';
                    ?>
                    >
                        <a href="personal.php?do=shows&name=<?php echo $row->NameNone; ?>">Tủ đồ</a>
                    </div>
                </div>
                        
                        <!--      Content      -->
                        
                        <?php
                        if ($gdo == '' || $gdo == 'info')
						{
						?>
                        <div class="div_personal_content" id="info">
                        
                            <p class="p_title">Tên đăng nhập :</p>
                            <p class="p_content"><?php echo $row->Username; ?></p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=usn">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Tên hiển thị :</p>
                            <p class="p_content"><?php echo $row->Name; ?></p>
                            <p class="p_note">Bạn không được sửa tên hiển thị</p>
                            <div class="clear"></div>
                            
                            <p class="p_title">Mật khẩu :</p>
                            <p class="p_content">********</p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=pass">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Email :</p>
                            <p class="p_content"><?php echo $row->Email; ?></p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=email">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Yahoo :</p>
                            <p class="p_content"><?php replaceText($row->Yahoo, 'Chưa có thông tin'); ?></p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=yh">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Avatar :</p>
                            <?php
							$row->urlAvatar <> '' ? $ava = $row->urlAvatar : $ava = 'Chưa có thông tin';
                            if ($row->urlAvatar == '') echo '<p class="p_content">'.$ava.'</p>';
								else echo '<img class="img_content" src="images/'.$ava.'" />';
							?>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=ava">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <h1>Thông tin khác</h1>
                            
                            <p class="p_title">Giới tính :</p>
                            <p class="p_content"><?php $row->Gender == 0 ? $gender = 'Nam' : $gender = 'Nữ' ; echo $gender; ?></p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=gender">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Ngày sinh :</p>
                            <p class="p_content"><?php replaceText($row->BirDate, 'Chưa có thông tin'); ?></p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=bdate">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Địa chỉ :</p>
                            <p class="p_content"><?php replaceText($row->Address, 'Chưa có thông tin'); ?></p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=addr">Sửa</a><?php } ?>
                            <div class="clear"></div>
                            
                            <p class="p_title">Điện thoại :</p>
                            <p class="p_content"><?php replaceText($row->Tel, 'Chưa có thông tin'); ?></p>
                            <?php if ($_SESSION['NameNone'] == $gname) { ?><a class="a_edit" href="edit_personal.php?name=<?php echo $gname; ?>&part=tel">Sửa</a><?php } ?>
                            <div class="clear"></div>
                        
                        </div><!-- .div_personal_content -->
                        <?php
						} // .if ($gdo == 'info')
						?>
                        
                        <!--  Products  -->
                        <?php	
                        if ($gdo == 'products')
						{
						// Paging 1
						require_once('z-include/paging1.php');
						// End Paging 1
						?>
                        <div class="div_personal_content" id="products">
                        	<?php
							
							$que_3 = que("SELECT * FROM products WHERE PriProduct = 1 AND idUser = '".$row->idUser."' ORDER BY Date DESC");
                            $que3 = que("SELECT * FROM products WHERE PriProduct = 1 AND idUser = '".$row->idUser."' ORDER BY Date DESC LIMIT ".$start.",".$perPage);
							
							// Paging 2			
							$num = mysql_num_rows($que_3);
							$odd2 = $num - (intval($num / $perPage) * $perPage);
							$odd2 <> 0 ? $totalPage = intval($num/$perPage) + 1 : $totalPage = intval($num/$perPage);		
							// End Paging 2
				
							while ($row3 = mysql_fetch_object($que3))
							{
                            ?>
                        <div class="div_personal_content_product">
							<a class="a_img" href="detail_product.php?name=<?php echo $row3->NameNone; ?>"><img src="images/<?php echo $row3->urlImg; ?>" alt="<?php echo $row3->Name; ?>" /></a>
                    		<div class="info">
                                <div class="div_rate">
                                <?php
								$que4 = que("SELECT * FROM hot WHERE idHot = '".$row3->idHot."'");
								$row4 = mysql_fetch_object($que4);
								if ($row4->Name == 'Hot')
									echo '<img src="templates/icon_hot2.png" />';
								elseif ($row4->Name == 'VIP')
									echo '<img src="templates/icon_vip.png" />';
								?>
                                </div>
                                
                                <a class="a_name" href="detail_product.php?name=<?php echo $row3->NameNone; ?>"><?php echo $row3->Name; ?></a><br />
                                <div class="clear"></div>
                                <div class="info_left">
                                    <p class="p_line1">
                                        <?php DateFriendly($row3->sDate);
										echo ' | <span>';
										TimeFriendly($row3->Date);
										echo '</span>';
										?>
                                    </p>
                                    <p class="p_line2">
                                        
                                    </p>
                                    <p class="p_line3">
                                    <?php
                                    if ($row3->Active == 0)
										echo 'Đang chờ kiểm duyệt'; 
									?>
                                    </p>
                                </div>
                                <div class="info_right">
                                    Giá : <span><?php cleanPrice($row3->Price); ?> đ</span><br />
                                    Lượt xem : <?php echo $row3->View; ?><br />
									<?php
									$que_u = que("SELECT * FROM users WHERE NameNone = '".$_SESSION['NameNone']."'");
									$row_u = mysql_fetch_object($que_u);
									if ($_SESSION['NameNone'] == $gname && $row3->Active == 1)
									{
										if ($row_u->nUp > 0)
											echo '<a href="up.php?name='.$row3->NameNone.'">Up Shop này lên</a><br />';
										else
											echo 'Bạn đã hết lượt up cho phép<br />';
									}
                                    if ($_SESSION['NameNone'] == $gname && $row3->Active == 1)
									{
										if ($row_u->nEdit > 0)
											echo '<a href="edit_post.php?name='.$row3->NameNone.'">Sửa bài đăng</a>';
										else
											echo 'Bạn đã hết lượt Edit cho phép<br />';
									}
									?>
                                    
                                </div>
                                
                          </div><!-- .info -->
                            <div class="clear"></div>
                        </div><!--  div_personal_content_product  -->
                        
                            <?php
							} // .while ($row3 = mysql_fetch_object($que3))
							
							if ($num <> 0) {
							?>
                		
                        <div class="div_paging" id="personal_paging">
						<?php               
                        // Paging 3
                        require_once('z-include/paging3.php');
                        // End Paging 3
                        ?>
                        </div><!--  .div_paging -->
                        <?php
						}
						?>
                    
                        </div><!--  .div_personal_content  -->
                        
                    <?php
                    } // .if ($gdo == 'products')
					?>
                	
                    <!-- shows -->
                	<?php
                    if ($gdo == 'shows')
                    {
					?>
					<div class="div_personal_content" id="shows">
                    <?php
						if (isset($_SESSION['Name']) && $_SESSION['Name'] <> $row->Name)
						{
                    ?> 
                        <form class="fmessage" name="fm" method="post" action="up_comments.php?type=messages&nameto=<?php echo $row->NameNone; ?>">
                            <textarea class="fmcontent" cols="50" name="fm_content"></textarea>
                            <input class="fmimg" name="fm_img" type="image" src="templates/comment.png" />
                        </form>
                        <?php
						}
						elseif ($_SESSION['Name'] == $row->Name)
						{
						?>
                        <a class="a_share" href="up_shows.php">Đăng ảnh / chia sẻ thời trang</a>
                        <form class="fmessage" name="fm" method="post" action="up_comments.php?type=messages&nameto=<?php echo $row->NameNone; ?>">
                            <textarea class="fmcontent" cols="50" name="fm_content"></textarea>
                            <input class="fmimg" name="fm_img" type="image" src="templates/message.png" />
                        </form>
                        <?php
						}
						else
						{
						?>
                        <h2 class="h2_comment_locked">Bạn chưa thể viết bình luận, gửi tin nhắn khi chưa 
                        <a href="login.php">Đăng nhập</a> hoặc 
                        <a href="register.php">Đăng ký</a></h2>
                        <?php
						} // .end elseif ($_SESSION['Name'] == $row->Name)
						
						$que4 = que("SELECT * FROM show_comments WHERE (PriShow = -1 && idUser = '".$row->idUser."') OR (PriShow = -1 && idUserTo = '".$row->idUser."') OR (PriShow = 0 && idUser = '".$row->idUser."' && idUserTo <> '".$row->idUser."') OR (PriShow = 1 && idUser = '".$row->idUser."' && idUserTo = '".$row->idUser."')");
                        
                        while ($row4 = mysql_fetch_object($que4))
                        {
                        ?>
                        <div class="div_personal_content_show">
                        
                        <?php
						$que5 = que("SELECT * FROM shows WHERE idShow = '".$row4->idShow."'");
                        $row5 = mysql_fetch_object($que5);
						if ($row4->PriShow == 0 && $row4->idUserTo <> $row->idUser)
						{
						$que6 = que("SELECT * FROM users WHERE idUser = '".$row5->idUser."'");
                        $row6 = mysql_fetch_object($que6);
						echo $row->Name.' viết bình luận trên <a class="a_per_show_0" href="detail_show.php?name='.$row5->NameNone.'">'.$row5->Name.'</a> của <a class="a_per_show_0" href="personal.php?do=shows&name='.$row6->NameNone.'">'.$row6->Name.'</a>';
						}
						elseif ($row4->PriShow == 1)
						{
						?>
						<a class="a_img" href="detail_show.php?name=<?php echo $row5->NameNone; ?>"><img src="images/<?php echo $row5->urlImg; ?>" alt="<?php echo $row5->Summary; ?>" /></a>
                        <a class="a_summary" href="detail_show.php?name=<?php echo $row5->NameNone; ?>">
                        	<?php
							echo $row5->Name;
							?>
                        </a>
                        
                        <?php
						$que8a = que("SELECT COUNT(Name) FROM show_comments WHERE idShow = '".$row5->idShow."'");
						$row8a = mysql_fetch_array($que8a);
						$start8a = $row8a['COUNT(Name)'] - 3;
						if ($start8a < 1)
						{
							$start8a = 1;
						}
							?>
							<div class="div_comment" id="first">
                                <p class="p_comment">
                                <?php echo $row4->Content; ?>
                                </p>
                            </div>
                            
                            <p class="p_like">
                            Có <span><?php echo $row5->nLike; ?></span> người thích và <span>
                            <?php
                            $que7 = que("SELECT COUNT(Content) FROM show_comments WHERE idShow = '".$row5->idShow."'");
                            $row7 = mysql_fetch_array($que7);
                            echo $row7['COUNT(Content)'] - 1;
                            ?>
                            </span> bình luận
                            </p>
                            
                            <!-- LIKE -->
                            <?php
                            $IP = $_SERVER['REMOTE_ADDR'];
							$new = true;
							$que_u = que("SELECT * FROM users WHERE Name = '".$_SESSION['Name']."'");
                            $row_u = mysql_fetch_object($que_u);
							$que_k = que("SELECT * FROM likes");
							while ($row_k = mysql_fetch_object($que_k))
							{
								if ((($row_k->idUser == $row_u->idUser || $row_k->idUser == 0) && $row_k->IP == $IP && $row_k->idShow == $row5->idShow) || ($row_k->idUser == $row_u->idUser && $row_k->idShow == $row5->idShow))
								{
									echo '<a class="a_like" href="#">Bạn đã thích chia sẻ này</a>';
									$new = false;
									break;
								}
							}
							if ($new == true)
								echo '<a class="a_like" href="like.php?name='.$row5->NameNone.'">Tôi thích phong cách này</a>';
							?>
                            
							<?php
						$que8 = que("SELECT * FROM show_comments WHERE idShow = '".$row5->idShow."' ORDER BY Date ASC LIMIT ".$start8a.",3");
						while ($row8 = mysql_fetch_object($que8))
						{
							?>
                            <div class="div_comment">
                                <?php
                                $que9 = que("SELECT * FROM users WHERE idUser = '".$row8->idUser."'");
                                $row9 = mysql_fetch_object($que9);
                                ?>
                                <img src="images/<?php replaceAva($row9->urlAvatar); ?>" />
                                <a class="a_author" href="personal.php?do=shows&name=<?php echo $row9->NameNone; ?>">
                                <?php
                                echo $row9->Name;
                                ?>
                                </a>
                                <p class="p_comment">
                                <?php echo $row8->Content; ?>
                                </p>
                            </div>
						<?php
						} // .while ($row8 = mysql_fetch_object($que8))
						?>  
                        
                        <!-- I comment -->
						<?php
                        if (isset($_SESSION['Name']))
                        {
                        ?>
                        <div class="div_comment" id="I_comment">
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
                            <form class="fcomment" name="fc" method="post" action="up_comments.php?type=shows&name=<?php echo $row5->NameNone; ?>">
                                <textarea class="fccontent" cols="36" name="fc_content"></textarea>
                                <input class="fcimg" name="fc_img" type="image" src="templates/comment.png" />
                            </form>
                            </p>
                        </div>
                        <?php
                        }
                        else
                        {
                        ?>
                        <div class="div_comment" id="I_comment">
                        <h2 class="h2_comment_locked">Bạn chưa thể gửi bình luận khi chưa 
                        <a href="login.php">Đăng nhập</a> hoặc 
                        <a href="register.php">Đăng ký</a></h2>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="clear"></div>
                        <a class="a_comment_detail" href="detail_show.php?name=<?php echo $row5->NameNone; ?>">
                        Xem chi tiết các bình luận
                        </a>
                        
                        <div class="clear"></div>
						<?php
                        } // .elseif ($row4->PriShow == 1)
						elseif ($row4->PriShow == -1)
						{
						$que11 = que("SELECT * FROM users WHERE idUser = '".$row4->idUser."'");
                        $row11 = mysql_fetch_object($que11);
						$que12 = que("SELECT * FROM users WHERE idUser = '".$row4->idUserTo."'");
                        $row12 = mysql_fetch_object($que12);
						if ($row11->Name <> $row->Name)  // khi ai do viet len tu cua toi
						{
							echo '<a class="a_per_show_0" href="personal.php?do=shows&name='.$row11->NameNone.'">'.$row11->Name.'</a> đã viết :<br />';
							echo $row4->Content;
						}
						elseif ($row11->Name == $row12->Name && $row12->Name == $row->Name) // khi toi tu viet cam xuc len tu cua minh
						{
							echo $row->Name.' đã viết<br />';
							echo $row4->Content;
						}
						else  // khi toi viet len tu nguoi khac
							echo '<a class="a_per_show_0" href="personal.php?do=shows&name='.$row11->NameNone.'">'.$row11->Name.'</a> viết tin nhắn trên tủ của <a class="a_per_show_0" href="personal.php?do=shows&name='.$row12->NameNone.'">'.$row12->Name.'</a>';
						?>
                        
                        <?php
						} // .else : $row4->PriShow == -1
						?>
                        </div><!--  .div_personal_content_show  -->
                        <?php
						} // .while ($row4 = mysql_fetch_object($que4))
						?>
                    </div><!--  .div_personal_content  -->
                    <?php
                    } // .if ($gdo == 'shows')
                    ?>
				
                   </div><!-- .div_personal_primary -->
                        
            <div class="clear"></div>
            
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
