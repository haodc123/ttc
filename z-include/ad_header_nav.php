<div id="eheader">
    	<div id="header">
        	<div class="div_logo">
            	<img src="../templates/logo.png" />            
            </div>
            <div class="div_slogan">
            	Thời trang theo phong cách của bạn...
            </div>
            <div class="div_search">
            	<form class="fsearch" name="fs" method="get" action="search_result.php">
                    <input class="fsquery" name="fs_query" type="text" />
                    <input class="fsimg" name="img" type="image" src="../templates/search.png" />
            	</form>
            </div>
            <?php
			if (!isset($_SESSION['Name']))
			{
			?>
            <div class="div_login">
            
            	<form class="flogin" name="fl" method="post" action="../login.php?do=login">
                    <input class="flqueryu" name="fl_user" type="text" />
                    <input class="flqueryp" name="fl_pass" type="password" />
                    <input class="flcheck" type="checkbox" />
                    <label>Ghi nhớ</label>
                    <input class="flimg" name="fl_img" type="image" src="../templates/login_gr.png" />
            	</form>
                
            </div>
            <?
			}
			else
			{
			?>
				<h1 class="h1_hello">Chào <span><?php echo $_SESSION['Name']; ?></span> !
                <div class="popup_personal_menu">
                	<a href="../personal.php?do=products&amp;name=<?php echo $_SESSION['NameNone']; ?>">Shop hàng đã đăng</a><br />
					<a href="../bookmark.php">Các SP đã đánh dấu</a><br />
                    <a href="../personal.php?do=shows&amp;name=<?php echo $_SESSION['NameNone']; ?>">Tủ đồ của bạn</a><br />
                    <a href="../personal.php?do=info&amp;name=<?php echo $_SESSION['NameNone']; ?>">Thông tin tài khoản</a>
                </div>
                </h1>
			<?php
			}
			?>
            <div class="div_register">
            	<?php
				if (!isset($_SESSION['Name']))
				{
				?>
            	<a href="../register.php">Đăng ký</a><br />
                <!--<a href="lost_pass.php">Quên mật khẩu ?</a>-->
                <?php
				}
				else
				{
				?>
                <a class="a_logout" href="../login.php?do=logout">Thoát</a>
                <a class="a_up" href="../up_products.php">UP TIN / SẢN PHẨM</a>
                <?php
				}
				?>
            </div>
            <ul class="ul_help">
            	<li class="li_help">
                	Hỗ trợ trực tuyến
                    <div class="div_help_tel">
                        <img class="img_tel" src="../templates/tel.png" />
                        <div class="div_h1"><span>HOTLINE :</span> 0168 204 0081</div>
                        
                        <div class="clear"></div>
                        <div class="div_h2">Kinh Doanh :</div>
                        <a href="ymsgr:sendim?shop4la&amp;m=Hello">
                            <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=shop4la&m=g&t=1=us" border=0>                        
                        </a>
                        <div class="clear"></div>
                        <div class="div_h2">Kỹ thuật :</div>
                        <a href="ymsgr:sendim?conghao_89dn&amp;m=Hello">
                            <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=conghao_89dn&m=g&t=1=us" border=0>                        
                        </a>
                        <div class="clear"></div>
                        <div class="div_h2">Tư vấn Mua-Bán :</div>
                        <a href="ymsgr:sendim?shop4la&amp;m=Hello">
                            <img class="img_yh2" alt="Click to contact for support" src="http://opi.yahoo.com/online?u=shop4la&m=g&t=1=us" border=0>                        
                        </a>
                    </div>
                </li>
                <li class="li_help" id="use">
                    Hướng dẫn MUA / BÁN hàng
                    <div class="div_help_use">
                        <a class="a_buy" target="_blank" href="../help.php?do=buy">Hướng dẫn <span>MUA</span> hàng</a><br /><br />
                        <a class="a_sale" target="_blank" href="../help.php?do=sale">Hướng dẫn <span>ĐĂNG BÁN</span></a>
                    </div>
            	</li>
            </ul>
            
   		</div><!-- #header -->
    </div><!-- #eheader -->
    <div id="enav">
    	<div id="nav">
        	<ul class="ul_nav">
            	<li class="li_nav" id="nav_home">
                	<a id="a_home" href="../home.php"><div></div></a>
                </li><span> | </span>
                <li class="li_nav">
                	<a href="../fashion.php?type=all">Thời trang mới</a>
                    <ul class="ul_subnav">
                    	<li class="li_subnav">
                        	<a href="../fashion.php?type=Thoi-trang-nam">Thời trang Nam</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="../fashion.php?type=Thoi-trang-nu">Thời trang Nữ</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="../fashion.php?type=Quan-ao-tre-em">Quần áo trẻ em</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="../fashion.php?type=Phu-kien-khac">Thời trang khác</a>
                        </li>
                    </ul>
                </li><span> | </span>
                <li class="li_nav">
                	<a href="../old.php?type=all">Thời trang cũ</a>
                    <ul class="ul_subnav">
                    	<li class="li_subnav">
                        	<a href="../old.php?type=Thoi-trang-nam">Thời trang Nam</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="../old.php?type=Thoi-trang-nu">Thời trang Nữ</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="../old.php?type=Quan-ao-tre-em">Đồ cũ trẻ em</a>
                        </li>
                        <li class="li_subnav">
                        	<a href="../old.php?type=Phu-kien-khac">Thời trang khác</a>
                        </li>
                    </ul>
                </li><span> | </span>
                <li class="li_nav">
                	<a href="../exchange.php?type=all">Khu trao đổi</a>
                </li><span> | </span>
                <li class="li_nav" id="nav_big">
                	<a href="../promote.php?type=all">Hàng khuyến mãi</a>
                </li><span> | </span>
                <li class="li_nav">
                	<a href="
                    <?php 
					if (isset($_SESSION['Name']))
						echo 'personal.php?do=shows&name='.$_SESSION['NameNone'];
					else
						echo 'login.php';
					?>
                    ">Tủ đồ của tôi</a>
                </li><span> | </span>
                <li class="li_nav">
                	<a href="../feedback.php">Phản hồi</a>
                </li>
            </ul>
   		</div><!-- #nav -->
    </div><!-- #enav -->