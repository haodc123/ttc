<?php
require_once("func/PHPMailer/class.phpmailer.php");
require_once("func/PHPMailer/class.smtp.php");

define('GUSER', 'shop4la@gmail.com'); // tài khoản đăng nhập Gmail
define('GPWD', 'hoangggglan@123g'); // mật khẩu cho cái mail này  

function smtpmailer($to, $from, $from_name, $subject, $body) { 
    global $error;
    $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
    $mail->IsSMTP(); // bật chức năng SMTP
    $mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
    $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
    $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; 
    $mail->Username = GUSER;  
    $mail->Password = GPWD;           
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $error = 'Sending failed: '.$mail->ErrorInfo; 
        return false;
    } else {
        $error = 'Sending done ';
        return true;
    }
} 

if (smtpmailer('nguoixanhtihon@mail.com', 'shop4la@gmail.com', 'Shop4la', 'test mail message', 'Hello World!')) {
    // gởi  xong rồi thông báo gì đó cho ngươi dùng  :D viết ở đây
}
if (!empty($error)) echo $error;  

?>