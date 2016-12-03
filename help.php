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
<title>Trợ giúp - <?php require_once('z-include/title_p2.php'); ?><?php require_once('z-include/title_p2.php'); ?>
</head>

<body>
<div id="container">
	<?php require_once('z-include/header_nav.php'); ?>
    <div id="eprimary">
    	<div id="primary">   
        	<div class="div_content">
            	
            <?php
			if ($_GET['do'] == 'buy')
			{
			?>
            <div class="div_gtext">
            	<div class="div_gtext_title">
                	<h1>Trợ giúp Mua hàng</h1>
                </div>
                <div class="div_gtext_content">
                	
<p>THOITRANGCHUNG.COM - Chúng tôi là 1 Sàn Giao dịch Thương mại trực tuyến cung cấp Dịch vụ hỗ trợ cho các bạn trong việc Kinh doanh và Mua sắm mặt hàng THỜI TRANG Online.</p>

<p class="p_title1_help">A. HƯỚNG DẪN QUẢN LÝ TÀI KHOẢN:</p>

<p class="p_title2_help">I. HƯỚNG DẪN ĐĂNG KÝ TÀI KHOẢN:</p>

Nhấp vào ĐĂNG KÝ trên thoitrangchung.com để tạo tài khoản mới:<br />

<img src="templates/help/a1.png" /><br />

Điền thông tin và mật khẩu cần thiết.<br />
Chú ý:<br />
•	Phần tên đăng nhập dùng để đăng nhập vào tài khoản<br />
•	Phần tên hiển thị các bạn nên đặt tên mình, tên shop hoặc tên công ty của mình<br />

<p class="p_title2_help">II. HƯỚNG DẪN CẬP NHẬP THÔNG TIN CÁ NHÂN TRÊN THOITRANGCHUNG.COM:</p>

Sau khi đăng nhập thành công bạn có thể chỉnh sửa thông tin cá nhân của mình bằng cách vào mục <span>TỦ ĐỒ CỦA TÔI</span> và vào phần <span>THÔNG TIN</span><br />

<img src="templates/help/a2.png" /><br />

Tại đây bạn có thể chỉnh sửa thông tin cá nhân của mình bằng cách nhấp vào nút SỬA bên phải mục cần chỉnh sửa.<br />

<img src="templates/help/a22.png" /><br />

Hãy đảm bảo đây là những thông tin chính xác  để giúp việc kinh doanh bạn dễ dàng hơn!<br />

<p class="p_title2_help">III. HƯỚNG DẪN LẤY LẠI MẬT KHẨU</p>

Để bảo vệ quyền lợi của bạn, bạn không nên cho bất kỳ ai biết mật khẩu của mình. Nếu bạn quên mật khảu, bạn có thể khôi phục lại bằng cách nhấp vào dòng chữ “Quên mật khẩu” gần thanh đăng nhập.<br />

<img src="templates/help/a3.png" /><br />

<p class="p_title1_help">B. DÀNH CHO NGƯỜI MUA</p>

<p class="p_title2_help">I. QUYỀN LỢI CỦA KHÁCH MUA HÀNG Ở THOITRANGCHUNG.COM</p>

Để dễ dàng mua sắm mọi lúc mọi nơi bạn hãy tạo một tài khoản để sử dụng tài nguyên của thoitrangchung.com tại <a href="register.php">ĐÂY</a> với các lợi ích sau:<br />
•	Giúp bạn có nhiều lựa chọn hàng hóa trên thoitrangchung.com.<br />
•	Dễ dàng bình chọn, đánh giá hàng hóa và đặt mua hàng online trên thoitrangchung.com.<br />
•	Được thoitrangchung.com bảo hộ giao dịch khi đặt mua hàng online tại thoitrangchung.com.<br />
•	Được mua hàng với giá tốt nhất tại các chương trình khuyến mãi, giảm giá, hậu mãi do website thoitrangchung.com thực hiện.<br />
•	Sử dụng các tài nguyên hoàn toàn miễn phí.<br />
•	Được tham gia các chương trình đảm bảo an toàn giao dịch do thoitrangchung.com cung cấp.<br />
•	Được tham gia đánh giá, bình chọn sản phẩm và nhà cung cấp.<br />
•	Được quyền sử dụng các chức năng của thoitrangchung.com để tìm kiếm thông tin nâng cao hoặc thông tin thông thường.<br />
•	Được quyền nhận xét, đánh giá sản phẩm.<br />
•	Được cung cấp, tư vấn các thông tin liên quan đến sản phẩm, dịch vụ.<br />
•	Được cung cấp các thông tin khuyến mại, giảm giá, các chương trình hỗ trợ khách hàng.<br />
•	Được quyền gửi phản ánh, chất lượng dịch vụ, đến thoitrangchung.com qua email: <span>hotro@thoitrangchung.com</span>, mục <span>PHẢN HỒI</span> hoặc liên hệ trực tiếp theo số điện thoại:<br />
<span>0168 204 0081 - 0126 270 0836 - 0122 988 3023.<br /></span>

<p class="p_title2_help">II. QUI ĐỊNH MUA HÀNG</p>
 
•	Tuân thủ tất cả các quy định của thoitrangchung.com<br />
•	Người mua nên đăng ký đúng địa chỉ nhận hàng để người bán có thể dễ dàng giao hàng<br />
•	Người mua chịu trách nhiệm khi có những thiếu sót, nhầm lần trong việc thanh toán tiền cho người Bán.<br />

<p class="p_title2_help">III. QUY ĐỊNH VỀ XÓA NỘI DUNG BÌNH LUẬN</p>

•	Thông tin viết giống nhau lặp đi lặp lại<br />
•	Thông tin không liên quan gì đến nội dung của sản phẩm, dịch vụ cần bình luận.<br />
•	Những dòng lệnh lập trình có hại.<br />
•	Thông tin xâm hại đến quyền lợi hoặc đời tư của người khác.<br />
•	Thông tin mang tính bài thị, gây tổn thương đến người khác.<br />
•	Thông tin có liên quan đến các hành vi tội phạm.<br />
•	Nhưng thông tin vi phạm đạo đức, thuần phong mỹ tục của Việt Nam và các nước khác.<br />
•	Thông tin có liên quan đến những việc nguy hiểm, thông tin chính trị, tôn giáo nhạy cảm<br />
•	Thông tin mang tính trục lợi, thương mại cá nhân, tuyên truyền quảng cáo.<br />
•	Thông tin ảnh hưởng đến công việc kinh doanh của thoitrangchung.com.<br />
•	Những thông tin khác mà chúng tôi cho rằng không hợp lý khi đăng tải lên thoitrangchung.com.<br />

<p class="p_title2_help">IV. LÀM SAO ĐỂ MUA HÀNG NHANH NHẤT ?</p>
•	Trong mỗi sản phẩm đều có địa chỉ lien hệ của người bán như: số điện thoại, email, nick yahoo.v.v. theo đó, bạn lựa chọn công ty/shop bán tốt nhất để liên hệ trực tiếp với người bán để thực hiện giao dịch mua sản phẩm.<br />
•	Các thông tin về thanh toán, giao hàng, đổi trả hàng và bảo hành được thương lượng trực tiếp giữa người mua và người bán.<br />
•	Comment trực tiếp bên dưới để liên lạc với người bán.<br />

<p class="p_title2_help">V. HỖ TRỢ KHÁCH HÀNG</p> 

<img src="templates/help/hotro.png" /><br />

 Trong quá trình sử dụng các bạn gặp lỗi hay có thắc mắc xin hãy gởi tin nhắn đến chúng tôi bằng cách vào mục PHẢN HỒI hoặc HỖ TRỢ TRỰC TUYẾN . chúng tôi sẽ trả lời bạn sớm nhất!
                    
                </div>
            </div>
            <?php
			}
			else
			{
			?>
            <div class="div_gtext">
            	<div class="div_gtext_title">
                	<h1>Trợ giúp Đăng bán</h1>
                </div>
                <div class="div_gtext_content">
<p>THOITRANGCHUNG.COM - Chúng tôi là 1 Sàn Giao dịch Thương mại trực tuyến cung cấp Dịch vụ hỗ trợ cho các bạn trong việc Kinh doanh và Mua sắm mặt hàng THỜI TRANG Online.</p>

<p class="p_title1_help">A. HƯỚNG DẪN QUẢN LÝ TÀI KHOẢN:</p>

<p class="p_title2_help">I. HƯỚNG DẪN ĐĂNG KÝ TÀI KHOẢN:</p>

Nhấp vào ĐĂNG KÝ trên thoitrangchung.com để tạo tài khoản mới:<br />

<img src="templates/help/a1.png" /><br />

Điền thông tin và mật khẩu cần thiết.<br />
Chú ý:<br />
•	Phần tên đăng nhập dùng để đăng nhập vào tài khoản<br />
•	Phần tên hiển thị các bạn nên đặt tên mình, tên shop hoặc tên công ty của mình<br />

<p class="p_title2_help">II. HƯỚNG DẪN CẬP NHẬP THÔNG TIN CÁ NHÂN TRÊN THOITRANGCHUNG.COM:</p>

Sau khi đăng nhập thành công bạn có thể chỉnh sửa thông tin cá nhân của mình bằng cách vào mục TỦ ĐỒ CỦA TÔI và vào phần  THÔNG TIN<br />

<img src="templates/help/a2.png" /><br />

Tại đây bạn có thể chỉnh sửa thông tin cá nhân của mình bằng cách nhấp vào nút SỬA bên phải mục cần chỉnh sửa.<br />

<img src="templates/help/a22.png" /><br />

Hãy đảm bảo đây là những thông tin chính xác  để giúp việc kinh doanh bạn dễ dàng hơn!<br />

<p class="p_title2_help">III. HƯỚNG DẪN LẤY LẠI MẬT KHẨU</p>

Để bảo vệ quyền lợi của bạn, bạn không nên cho bất kỳ ai biết mật khẩu của mình. Nếu bạn quên mật khảu, bạn có thể khôi phục lại bằng cách nhấp vào dòng chữ “Quên mật khẩu” gần thanh đăng nhập.<br />

<img src="templates/help/a3.png" /><br />

<p class="p_title1_help">B. DÀNH CHO NGƯỜI BÁN</p>

<p class="p_title2_help">I. QUY ĐỊNH VÀ QUYỀN LỢI CỦA CÁC SHOP:</p>

<p class="p_title3_help">-	QUY ĐỊNH ĐĂNG TIN</p>

•	Mọi khách hàng có tài khoản của thoitrangchung.com điều có quyền đăng tin bán hàng miễn phí.<br />
•	Khách hàng phải chịu trách nhiệm về nội dung và thông tin đăng rao của mình trên thoitrangchung.com.<br />
•	Khách hàng đăng tin rao phải đầy đủ Tên, Giá và Thông tin mô tả cho từng sản phẩm, phải đăng đúng chuyên mục.<br />
•	thoitrangchung từ chối không nhận đăng các thông tin không liên quan đến thời trang.<br />
•	Các thông tin đăng trên website thoitrangchung chỉ được niêm yết giá tiền đồng Việt Nam.<br />
•	thoitrangchung không chịu trách nhiệm và không bảo đảm về tính chính xác của thông tin được đăng. Đồng thời, không chịu bất cứ trách nhiệm pháp lý hoặc bồi thường thiệt hại nào về việc mất mát hay hư hỏng đối với những hàng hóa được đề cập đến trong tất cả các giao dịch trên thoitrangchung .<br />
•	Các thành viên  được đăng và up tin 1 tin miễn phí/ngày . Riêng các thành viên đã mua gói “Silver Và Gold “ được hưởng các quyền lợi tốt hơn,xem thêm tại đây<br />

<p class="p_title3_help">-	QUYỀN LỢI CỦA SHOP TẠI THOITRANGCHUNG.COM</p>

•	Được tham gia các dịch vụ hỗ trợ kinh doanh của thoitrangchung.<br />
•	Có shop và quản lý gian hàng.<br />
•	Tiếp cận được nhiều khách hàng mới,mở rộng thị trường kinh doanh.<br />
•	Được tham gia các chương trình, sự kiện do thoitrangchung.com thực hiện.<br />
•	thoitrangchung.com luôn ủng hộ, hỗ trợ các shop phát triển thương hiệu và nâng cao năng lực kinh doanh online chuyên nghiệp tại thoitrangchung.com<br />
•	Sử dụng các tài nguyên hoàn toàn miễn phí.<br />

<a name="up_img"><p class="p_title2_help">II. HƯỚNG DẪN ĐĂNG BÁN :</p></a>

Bước 1 :  TRUY CẬP VÀO thoitrangchung.COM<br />

Bước 2 :  ĐĂNG NHẬP<br />

<img src="templates/help/dang ban 1.jpg" /><br />

Bước 3:  BẤM VÀO UP TIN / SẢN PHẨM<br />

<img src="templates/help/dang ban 2.png" /><br />

Bước 4:  CẦN HOÀN THÀNH 2 BƯỚC SAU ĐỂ TẠO SHOP:<br />

-	Bước 1: Thông tin shop hàng<br />

<img src="templates/help/dang ban 3.png" /><br />

<span>Hướng dẫn đăng hình ở phần NỘI DUNG SHOP HÀNG CỦA BẠN<br />

-	Bước 1: Chọn biểu tượng.<br />

<img src="templates/help/dang ban 4.png" /><br />

-	Bước 2: Sẽ xuất hiện 1 trang Image. Tại đây bạn tiếp tục chọn biểu tượng mà mũi tên chỉ vào<br />

<img src="templates/help/dang ban 5.png" /><br />

-	Bước 3: Tiếp đó sẽ xuất hiện 1 trang khác,bạn phóng lớn trang này, tại đây bạn chọn 1 chọn tệp tin và bạn tự chọn hình mình muốn đăng và thực hiện 2.up hình khi ô trống màu trắng hiện lên ảnh bạn muốn đăng thì thực hiện 3.ok<br />

<img src="templates/help/dang ban 6.png" /><br />

-	Bước 4 Sau khi bấm ok ở bước 3 sẽ về lại trang Image . Bạn bấm vào Insert để đăng hình lên.<br />

<img src="templates/help/dang ban 8.png" /><br />

<img src="templates/help/dang ban 9.png" /><br />

Xong rồi các hình tiếp theo bạn thực hiện tương tự.<br />

Chúc thành bạn thành công, nếu có thắc mắc xin liên hệ đến chúng tôi sẽ hỗ trợ bạn ngay lập tức.<br /></span>

-	Bước 2 :Ảnh sản phẩm<br />

Cách up hình : bạn vào chọn tệp tin và đưa đường dẫn đến hình bạn muốn<br />

<img src="templates/help/dang ban 10.jpg" /><br />

BẤM VÀO ĐĂNG LÊN KHI BẠN ĐÃ ĐIỀN ĐẦY ĐỦ THÔNG TIN. CHÚC BẠN THÀNH CÔNG!<br />

<p class="p_title2_help">III. HƯỚNG DẪN QUẢN LÝ SHOP</p>

Có 2 cách vào trang quản lý shop<br />

Cách 1 đặc con trỏ ở tên tài khoản sẽ hiện ra 1 danh sách tính năng.<br />

<img src="templates/help/quan ly shop 1.png" /><br />

Cách 2 trên thanh menu bạn vào mục “ Tủ Đồ Của Tôi”<br />

<img src="templates/help/quan ly shop 2.png" /><br />

Chức năng <span class="blue">Up Shop Này Lên</span> sẽ giúp shop của bạn lên trang đầu. Lưu ý 1 tài khoản được up 1 lần một ngày cho đến khi hết lượt up cho phép. Bạn nhìn lên vùng thông tin User để biết số lượt Up và Post còn lại của mình<br />

<p class="p_title2_help">IV. HỖ TRỢ KHÁCH HÀNG</p>

<img src="templates/help/hotro.png" /><br />

 Trong quá trình sử dụng các bạn gặp lỗi hay có thắc mắc xin hãy gởi tin nhắn đến chúng tôi bằng cách vào mục phản hồi hoặc hỗ trợ trực tuyến . chúng tôi sẽ trả lời bạn sớm nhất!

        
                </div>
            </div>
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
