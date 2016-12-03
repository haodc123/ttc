<?php 
//Import Class + Function
require("Captcha.php");
$captcha 				= array();
$captcha["publickey"] 	= "6Ledd7oSAAAxxxxx9WA0YkWp1N";
$captcha["privatekey"]	= "6Ledd7oSAAAAxxxxxoYgcAvSqy";
$captcha["error"]		= ""; //Luu gia tri loi cua captcha
$captcha["object"]		= null;

//Kiem tra Submit
if( isset($_POST["ok"]) )
{
	$captcha["object"] = recaptcha_check_answer ($captcha["privatekey"],
		                                        $_SERVER["REMOTE_ADDR"],
		                                        $_POST["recaptcha_challenge_field"],
		                                        $_POST["recaptcha_response_field"]);
		
	if (!$captcha["object"]->is_valid) 
	{
		echo "Da nhap xai Captcha";
		$captcha["error"] = $captcha["object"]->error;
	}
	else 
	{
		echo "Da nhap dung Captcha";
	}
}
//* Load Captcha
$data['htmlcaptcha'] = recaptcha_get_html($captcha["publickey"], $captcha["error"]);

?>
<form method="post">
<?php echo $data["htmlcaptcha"]; ?>
<br />
<input type="submit" name="ok" value="Submit" />
</form>