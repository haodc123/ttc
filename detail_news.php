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
$que = que("SELECT * FROM news WHERE NameNone = '".$gname."'");
$row = mysql_fetch_object($que);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row->Name; ?> - <?php require_once('z-include/title_p2.php'); ?>
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
			$queu = que("UPDATE news SET View = '$view' WHERE NameNone = '".$gname."'");
			?>
            
            <div class="div_direction">
                <h1>
                Tin tức Thời trang ><?php echo ' '.$row->Name; ?>
                </h1>
            </div>
            
			<div class="div_products">
                
                <div class="div_product" id="news">
                    <div class="div_product_content">
                    	<img class="ava" src="images/<?php echo $row->urlImg; ?>" alt="<?php echo $row->Name; ?>" />
                        <h1 class="news_title"><?php echo $row->Name; ?></h1>
                        <h2 class="news_date">Được đăng lúc : <?php echo $row->Date; ?></h2>
                        <p class="news_summary"><?php echo $row->Summary; ?></p>
                        <div class="clear"></div>
						<?php
						echo $row->Content;
						?>
                    </div>
                    <div class="clear"></div>
                </div><!-- .div_product -->          
            </div><!-- .div_products -->
            <div class="news_other">
            	<h1>Các tin khác :</h1><br />
            	<?php
            	$que1 = que("SELECT * FROM news WHERE NameNone != '".$gname."' AND Active = 1 ORDER BY Date DESC");
				while ($row1 = mysql_fetch_object($que1))
				{
					echo '<a href="detail_news.php?name='.$row1->NameNone.'">+ '.$row1->Name.' - '.$row1->sDate.'</a><br /><br />';
				}
				?>
            </div>
         </div><!-- .content -->
	
         <?php require_once('z-include/sidebar_right.php'); ?>
            
   		</div><!-- #primary -->
        
    </div><!-- #eprimary -->
	<div class="clear"></div>
    
    <?php //require_once('z-include/footer.php'); ?>
</div><!-- end #container -->

</body>
</html>
