<?php
session_start();
ob_start();
error_reporting(0);
//	$servername = 'sql308.freevnn.com';
//	$dbusername = 'freev_10484934';
//	$dbpassword = '123456';
//	$dbname = 'freev_10484934_csdl_n13 ';
	
	$servername = 'localhost';
	$dbusername = 'shiva';
	$dbpassword = '123';
	$dbname = 'csdl_canthonew';

	$link = mysql_connect($servername, $dbusername, $dbpassword) or die("Không thể kết nối đến CSDL MySQL");
	mysql_select_db($dbname) or die("Không thể mở CSDL. ".mysql_error()); // Chon ten CSDL
	mysql_query("SET NAMES UTF8");
	mysql_query('set character_set_connection=utf8');
	mysql_query('set character_set_client=utf8');  // Thiet lap font Unicode
	
	$max_size = 50*1024*1024;

	//function file_extension($filename)
//	{
//    	return @strtolower(end(explode(".", $filename)));
//	}

//	$exts = array("mp4","avi","wmv","mp3","flv"); 
include("script/func.php");
?>