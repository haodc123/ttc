<div id="efooter">
    	<div id="footer">
            <img class="img_footer" src="../templates/logo2.png" />
            <h1 class="h1_footer_title">
            	Thời Trang Chung - Mua bán, trao đổi, chia sẻ phong cách thời trang
            </h1>
            <div class="div_fa1">
            	<a class="a_fa_title" href="../fashion.php?type=all">Mua bán, trao đổi</a>
            	<a class="a_fa" href="../fashion.php?type=Thoi-trang-nam">Thời trang Nam</a>
                <a class="a_fa" href="../fashion.php?type=Thoi-trang-nu">Thời trang Nữ</a>
                <a class="a_fa" href="../fashion.php?type=Quan-ao-tre-em">Quần áo Trẻ em</a>
                <a class="a_fa" href="../fashion.php?type=Phu-kien-khac">Phụ kiện khác</a>
            </div>
            <div class="div_fa2">
            	<a class="a_fa_title" href="../old.php?type=all">Đồ cũ</a>
            	<a class="a_fa" href="../old.php?type=Thoi-trang-nam">Thời trang Nam</a>
                <a class="a_fa" href="../old.php?type=Thoi-trang-nu">Thời trang Nữ</a>
                <a class="a_fa" href="../old.php?type=Quan-ao-tre-em">Quần áo Trẻ em</a>
                <a class="a_fa" href="../old.php?type=Phu-kien-khac">Phụ kiện khác</a>
            </div>
            <div class="div_fa3">
            	<a class="a_fa_title" href="../shows.php">Chia sẻ phong cách</a>
            	<a class="a_fa" href="../shows.php?do=vote">Được bình chọn nhiều nhất</a>
                <a class="a_fa" href="../shows.php?do=latest">Mới nhất</a>
                <a class="a_fa" href="../shows.php?do=vote">Đăng nhiều nhất</a>
                <a class="a_fa" href="
                <?php 
				if (isset($_SESSION['Name']))
					echo 'personal.php?do=shows&name='.$_SESSION['NameNone'];
				else
					echo 'login.php';
				?>
                ">Tủ đồ của tôi</a>
            </div>
            <div class="div_fa4">
            	<a class="a_fa_title" href="http://thoitrangchung.com">Thời Trang Chung . Com</a>
                <p>Email : <span>hotro@thoitrangchung.com</span></p>
                <p>Điện thoại : <span>0168 204 0081 - 0126 270 0836 - 0122 988 3023</span></p>
            </div>
   		</div><!-- #footer -->
        <div class="div_bottom">
        	<!--<p class="p_left">Sàn giao dịch TMĐT không thèm đăng ký</p>
            <p class="p_right">Ra đời năm 2012. Toàn quyền được bảo hộ</p>-->
        </div>
    </div><!-- #efooter -->