<?php
include "PHPMailer/class.phpmailer.php"; 
	function que($str)  // Query MySQL
	{
		$rs = mysql_query ($str) or die ('can not do this query');
		return $rs;
	}
	
	function smr($str, $num)  // If string too long, cut it -> Display SUMMARY area
	{
		if(strlen($str) > $num)
		{
			$rs = substr($str, 0, $num).'...';
		}
		else
		{
			$rs = $str;
		}
		return $rs;
	}
	
	function DateFriendly ($sdate)  // Friendly Date
	{
		$curdate = date_default_timezone_set("d-n-Y");
		if ($sdate == $curdate) echo 'Hôm nay';
			else echo $sdate;
	}
	
	function replaceText($data, $str)  // Replace blank Text by a string 
	{
		if ($data == '') echo $str;
			else echo $data;
	}
	function replaceAva($ava)  // Replace blank avatar by a ava_df 
	{
		if ($ava == '') echo 'ava_df.jpg';
			else echo $ava;
	}
	function TimeFriendly ($date)  // Friendly Time
	{
		echo substr($date, -8, 5);
	}
	
	function cleanPrice ($price)  // Clearly Price
	{
		if ($price <= 9999)
		{
			$sprice = strval($price);
			$nblock = intval(strlen($sprice)/3);
			for ($i = 0; $i < $nblock; $i ++)
			{
				$vnd[$i] = substr($sprice, -3*($i+1), 3);
			}
			$odd = strlen($sprice) - $nblock*3;
			$vnd[$nblock] = substr($sprice, 0, $odd);
			
			if ($vnd[$nblock] == '')
				for ($j = $nblock - 1; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
			else
				for ($j = $nblock; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
			$rs .= '.000';
		}
		else
		{
			$sprice = strval($price);
			$nblock = intval(strlen($sprice)/3);
			for ($i = 0; $i < $nblock; $i ++)
			{
				$vnd[$i] = substr($sprice, -3*($i+1), 3);
			}
			$odd = strlen($sprice) - $nblock*3;
			$vnd[$nblock] = substr($sprice, 0, $odd);
			
			if ($vnd[$nblock] == '')
				for ($j = $nblock - 1; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
			else
				for ($j = $nblock; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
		}
		echo $rs;
	}
	
	function changeTitle($str){       //   Change Title to title parameter link with random
		$str = stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);        
		$str = str_replace("  "," ",$str);
		$str = trim($str);
		$str = mb_convert_case($str , MB_CASE_TITLE , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);    
		$rand = rand(0, 999999);
		$str.= '-'.$rand;
		return $str;
	}
	function changeTitle2($str){       //   Change Title to title parameter link
		$str = stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);        
		$str = str_replace("  "," ",$str);
		$str = trim($str);
		$str = mb_convert_case($str , MB_CASE_TITLE , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);
		return $str;
	}
	
	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'd'=>'đ',
		 'D'=>'Đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 'i'=>'í|ì|ỉ|ĩ|ị',      
		 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		 '-'=>'+|&'
		);
		foreach($unicode as $khongdau=>$codau) {
		  $arr = explode("|",$codau);
		  $str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}
	
	function renameImg($name)
	{
		$rand = rand(0, 99999);
		$extname = substr($name, -4);
		if ($extname <> 'jpeg')
		{
		$name = 'Thoi Trang Chung - '.substr($name, 0, -4).'-'.$rand.substr($name, -4);;
		}
		else
		{
		$name = 'Thoi Trang Chung - '.substr($name, 0, -5).'-'.$rand.substr($name, -5);;
		}
		return $name;
	}
	
	function compress_image($source_url, $destination_url, $quality) {
		$info = getimagesize($source_url);
	 
		if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
		elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
		elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
	 
		//save it
		imagejpeg($image, $destination_url, $quality);
	 
		//return destination file url
		return $destination_url;
	}
	
	function sendM($from, $name, $pass, $to, $content, $print) {
	
	//$from = "hotro@thoitrangchung.com"; // Reply to this email
	//$name = "Thời Trang Chung";
	//$pass = "...";
	//$to = "nguoixanhtihon@gmail.com"; // Recipients email ID
	//$content = "Xin chào";
	
	$mail = new PHPMailer();
	$mail->IsSMTP(); // set mailer to use SMTP
	$mail->Host = "smtp.gmail.com"; // specify main and backup server
	$mail->Port = 465; // set the port to use
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->SMTPSecure = 'ssl';
	$mail->Username = $from; // your SMTP username or your gmail username
	$mail->Password = $pass; // your SMTP password or your gmail password
	
	$mail->From = $from;
	$mail->FromName = $name; // Name to indicate where the email came from when the recepient received
	$mail->AddAddress($to,$name);
	$mail->AddReplyTo($from,$name);
	$mail->WordWrap = 50; // set word wrap
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = "Test";
	$mail->Body = $content; //HTML Body
	$mail->AltBody =''; //Text Body
	//$mail->SMTPDebug = 2;
	$mail->SetFrom($tmp, 'Test Mail');
	$mail->CharSet = "UTF-8";
		if ($print == 0)
		{
			$mail->Send();
		}
		else
		{
			if(!$mail->Send())
			{
				echo "<h1>Loi khi goi mail: " . $mail->ErrorInfo . '</h1>';
			}
			else
			{
				echo "<h1>Send mail thanh cong</h1>";
			}
		}
	}
?>