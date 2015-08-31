<?php


function sql_set($a)
{
	$result=mysql_query($a);
	
		if($result)
		{
		//echo "ABC";
		$rec=mysql_fetch_array($result);
		if(isset($rec))		return $rec;
		else return false;
		}
		else return false;
		
	
}

function sql_result($a)
{
	$result=mysql_query($a);
	
		if($result)
		{
			return $result;
		}
		else return false;
		
	
}

function check_row($sql_set)
{
	if(mysql_num_rows($sql_set)==0)
	return false;
	else return true;
}

function get_id($id_field,$field)
{
	$last_id=get_single_value($id_field,$field);
	if($last_id)
	{
		return $last_id+1;
	}
	else
	{
		return 1;
	}
}
//HAM LAY GIA TRI KHI BIET FIELD VA TABLE
function get_single_value($field,$table)
{
	$sql_select="select $field from $table ORDER BY $field DESC LIMIT 1";
	$set_select=sql_set($sql_select);
	if(isset($set_select))
	{
		return $set_select[$field];

	}
	else
	{
		return false;
	}
}

function get_value_dk($table,$dk1,$dk1_value,$field)
{
	$sql_select="select * from $table WHERE $dk1='$dk1_value'";
	//echo $sql_select;
	$set_select=sql_set($sql_select);
	if(isset($set_select))
	{
		return $set_select[$field];
	}
	else
	{
		return false;
	}
}

function get_value_2dk($table,$dk1,$dk1_value,$dk2,$dk2_value,$field)
{
	$sql_select="select * from $table WHERE $dk1='$dk1_value' AND $dk2='$dk2_value'";
	//echo $sql_select;
	$set_select=sql_set($sql_select);
	if(isset($set_select))
	{
		return $set_select[$field];
	}
	else
	{
		return false;
	}
}

//TẠO MÃ XÁC NHẬN
function tao_ma_validate()
{
	$validate_code = substr(md5(uniqid(rand(), true)), 16, 16);
	return $validate_code;
}
//GỬI MAIL XÁC NHẬN - ON PROGRESS
function gui_mail_validate($email,$validate_code)
{
	$ten_tv=get_value_dk('thanhvien','Email',$email,'Username');
	//echo $ten_tv;
	//
	$noi_dung="Xin chào bạn ".$ten_tv.",<br/>

Địa chỉ email này đã được sử dụng để đăng ký tài khoản thành viên tại website CẦN THƠ NEW.<br/><br/>

Xin vui lòng kích hoạt tài khoản bằng cách truy cập vào đường link dưới đây:<br/><br/>

		<a href=localhost/canthonew/validate.php?c=$validate_code&e=$email>"."Kích hoạt tài khoản của bạn tại đây </a>
<br/><br/>
Sau khi kích hoạt thành công, hãy cập nhật thông tin cá nhân chính xác để được bảo vệ các quyền lợi và được hỗ trợ tốt nhất khi sử dụng các dịch vụ và tiện ích của Website Cần Thơ New<br/><br/>
Lưu ý:<br/>
- Nếu trong 24 giờ bạn không kích hoạt tài khoản, hệ thống sẽ tự động hủy tài khoản của bạn.<br/>
- Đây là email được gửi tự động từ hệ thống. Bạn không cần trả lời thư này. Nếu bạn gặp vấn đề trong khi kích hoạt tài khoản, vui lòng liên hệ CẦN THƠ NEW.<br/><br/>

Nếu thư này nằm ở thư mục spam, để những lần sau thư luôn vào Inbox, bạn vui lòng nhấn chuột vào tính năng Not Spam (của Yahoo, Gmail) hoặc di chuyển thư này về thư mục Inbox. <br/><br/>

Cảm ơn bạn vì đã trở thành thành viên của CẦN THƠ NEW.<br/>

";
	smtpmailer($email,'$newcantho@gmail.com','CẦN THƠ NEW','KÍCH HOẠT THÀNH VIÊN',$noi_dung );
}


		//GUI MAIL
require_once('mail/class.phpmailer.php');  
require_once('mail/class.smtp.php'); 

define('GUSER', 'newcantho@gmail.com'); // tài khoản đăng nhập Gmail
define('GPWD', 'cantho084'); // mật khẩu cho mail này  

function smtpmailer($to, $from, $from_name, $subject, $body) { 
    global $error;
    $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
    $mail->IsSMTP(); // bật chức năng SMTP
	$mail->IsHTML(true);
    $mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
    $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
    $mail->SMTPSecure = "ssl"; //ssl sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; 
    $mail->Username = GUSER;  
    $mail->Password = GPWD;           
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
	$mail->CharSet = 'utf-8';
	$mail->SMTPKeepAlive = true;  
    if(!$mail->Send()) {
        $error = 'Gởi mail bị lỗi: \n '.$mail->ErrorInfo; 
        return false;
    } else {
        //echo 'Thư của bạn đã được gởi đến: '.$to."<br/>";
        return true;
    }
} 
//
function logout($name)
{
setcookie("name",$name,time()-86400);
session_start(); 
session_destroy();
if(isset($_SERVER['HTTP_REFERER'])) {
 header('Location: '.$_SERVER['HTTP_REFERER']);  
} else {
 header('Location: index.php');  
}
}

function kiemtra_login($name,$pw)
{
	$sql_check_login="select * from thanhvien where Username='$name' AND Password='$pw'";
	$kq_check_login=sql_result($sql_check_login);
	//echo $sql_check_login;
		
	$id=get_value_dk('thanhvien','Username',$name,'ID');
	$status=get_value_dk('xacnhan','ID',$id,'Status');		
//	echo $status;
	if(mysql_num_rows($kq_check_login)==1 && $status=="YES")
	{
		return true;
	}
	else
	{
		return false;
	}
	
}

function load_danhmuc_option()
{
	$sql_load_cat="select * from danh_muc ORDER BY cat_id";
	$kq_load_cat=sql_result($sql_load_cat);
	
	//echo $sql_load_cat;
	while($row=mysql_fetch_array($kq_load_cat,MYSQL_ASSOC))
	{
		if($row['cat_id_cha']==0)
		{
			echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
		}
		else
		{
			echo "<option style='background-color:yellow;' disabled value='".$row['cat_id']."'>".$row['cat_name']."</option>";
		}
	}
}

function tenvn($name)
{
	
	//return ucwords(STRTOLOWER($name));
	return $name;
}
//ham luu IP
function saveip()
{
$ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
return $ip;
}

//HAM UP ANH
//
function up_anh1($name,$id_rv)
{
$target_dir = "upload/".$name."/";
//echo $target_dir;
if(!is_dir($target_dir))
{
	mkdir($target_dir , 0777);
}
$target_dir = "upload/".$name."/".$id_rv."/";
//echo $target_dir;
if(!is_dir($target_dir)) 
{        
  		mkdir($target_dir , 0777);
}

//echo $target_dir;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit2"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        //echo "Tập tin này là ảnh - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Tập tin này không phải ảnh.<br/>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Lỗi: File đã tồn tại.<br/>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Lỗi: Dung lượng của ảnh > 500kb.<br/>";
    $uploadOk = 0;
}
// Check dimension của ảnh
$image_info=getimagesize($_FILES["image"]["tmp_name"]);
//echo $image_info[0];
//echo $image_info[1];

/*
if ($image_info[0]>640 || $image_info[1]>480) {
    echo "Lỗi: Chiều rộng của ảnh lớn hơn 480 hoặc chiều dài lớn hơn 640.<br/>";
    $uploadOk = 0;
}
*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Lỗi: Chỉ hỗ trợ tải lên các định dạng ảnh JPG, PNG và GIF.<br/>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br/>TẢI ẢNH LÊN THẤT BẠI.<br/>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "Ảnh ". basename( $_FILES["image"]["name"]). " đã được tải lên.";
		return true;
    } else {
        echo "<br/>Tải lên thất bại, xin kiểm tra lại.<br/>";
		return false;
    }
}
}//XONG HAM UP ANH


//
function demfile($name,$id_rv)
{
$dir = "upload/".$name."/".$id_rv."/";
$fi = new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi);
echo "SO FILE:".$fileCount;
}

function set_gia($option)
{
	switch($option)
	{
		case 1:
			$min=0;
			$max=1;
			$text="Dưới 1 triệu";
		break;
		case 13:
			$min=1;
			$max=3;
			$text="Từ 1-3 triệu";
		break;
		case 35:
			$min=3;
			$max=5;
			$text="Từ 3-5 triệu";
		break;
		case 510:
			$min=5;
			$max=10;
			$text="Từ 5-10 triệu";
		break;
		case 199:
			$min=10;
			$max=1000;
			$text="Hơn 10 triệu";
		break;
		case 9999:
			$min=-1;
			$max=-1;
			$text="Thỏa thuận";
		break;
	}
return array ($min, $max, $text);
}

function set_gia2($min,$max)
{
	if($min=0 && $max=1)
	{
		return "Dưới 1 triệu";
		break;
	}
	if($min=1 && $max=3)
	{
		return "Từ 1-3 triệu";
		break;
	}
	if($min=3 && $max=5)
	{
		return "Từ 3-5 triệu";
		break;
	}
	if($min=5 && $max=10)
	{
		return "Từ 5-10 triệu";
		break;
	}
	if($min=10 && $max=1000)
	{
		return "Hơn 10 triệu";
		break;
	}
	if($min=-1 && $max=-1)
	{
		return "Thỏa thuận";
		break;
	}
	
}

function tb_dangtin_fail()
{
	?>
    
    
    <?php
}
?>

