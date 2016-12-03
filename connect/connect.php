<?php
$myHost = 'localhost';
$myDB = 'ttc';
$uname = 'root';
$upass = '12345678';
$myCon = mysql_pconnect($myHost, $uname, $upass) or die ('can not connect db');
mysql_select_db($myDB,$myCon);
mysql_query ("set names 'utf8'"); 
?>