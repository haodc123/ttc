<?php
$myHost = 'localhost';
$myDB = 'owjmcssl_ttc';
$uname = 'owjmcssl_ttc';
$upass = 'thoitrangchungdd@123aa';
$myCon = mysql_pconnect($myHost, $uname, $upass) or die ('can not connect db');
mysql_select_db($myDB,$myCon);
mysql_query ("set names 'utf8'"); 
?>