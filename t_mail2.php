<?php ob_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "func/PHPMailer/class.phpmailer.php"; 

$from = "hotro@thoitrangchung.com"; // Reply to this email
$to = "nguoixanhtihon@gmail.com"; // Recipients email ID
$name = "nguoixanhtihon"; // Recipient's name

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.gmail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = $from; // your SMTP username or your gmail username
$mail->Password = "ThoiTrangChung12345"; // your SMTP password or your gmail password

$mail->From = $from;
$mail->FromName = "Thoi Trang Chung"; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($to,$name);
$mail->AddReplyTo($from,$name);
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Test";
$mail->Body = "Chao ban quản trị website. Bạn &nbsp;".$name."&nbsp;để lại lời nhắn abcdef"; //HTML Body
$mail->AltBody =''; //Text Body
//$mail->SMTPDebug = 2;
$mail->SetFrom($tmp, 'Test Mail');
$mail->CharSet = "UTF-8";
if(!$mail->Send())
{
    echo "<h1>Loi khi goi mail: " . $mail->ErrorInfo . '</h1>';
}
else
{
    echo "<h1>Send mail thanh cong</h1>";
    //header("location:guixong.php");
}
?> 