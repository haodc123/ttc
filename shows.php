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
            
            <div class="div_gtext">
            	<div class="div_gtext_title">
                	<h1>Chia sẻ phong cách thời trang</h1>
                </div>
            </div>
                    	
                <div class="div_personal_primary">
                
					<div class="div_personal_content" id="showspage">
                    
                        <?php
						
						$que4 = que("SELECT * FROM shows WHERE Active = 1 ORDER BY LDate DESC");
                        while ($row4 = mysql_fetch_object($que4))
                        {
                        ?>
                        <div class="div_personal_content_show">
                        
                        <?php
						$que5 = que("SELECT * FROM shows WHERE idShow = '".$row4->idShow."'");
                        $row5 = mysql_fetch_object($que5);

						?>
						<a class="a_img" href="detail_show.php?name=<?php echo $row5->NameNone; ?>"><img src="images/<?php echo $row5->urlImg; ?>" alt="<?php echo $row5->Summary; ?>" /></a>
                        <a class="a_summary" href="detail_show.php?name=<?php echo $row5->NameNone; ?>">
                        	<?php
							echo $row5->Name;
							?>
                        </a>

                        <?php
							$que2 = que("SELECT * FROM users WHERE idUser = '".$row5->idUser."'");
							$row2 = mysql_fetch_object($que2);
						?>
                        <a class="a_author1" href="personal.php?do=shows&name=<?php echo $row2->NameNone; ?>">
                            <p class="p_author">
                            Chủ nhân: <span>
                            <?php
                            echo $row2->Name;
                            ?>
                            </span>
                            </p>
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
                            echo $row7['COUNT(Content)'];
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

                        </div><!--  .div_personal_content_show  -->
                        <?php
						} // .while ($row4 = mysql_fetch_object($que4))
						?>
                    </div><!--  .div_personal_content  -->
				
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
