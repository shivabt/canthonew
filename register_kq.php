		<?php

include("config.php");
include("header.php");
include("left.php");

?>

<?php
//session_start();
$id=get_id('ID','thanhvien');
$ten=tenvn($_POST['dk_name']);
//echo $ten;
$username=strtolower($_POST['dk_username']);
$pw=$_POST['dk_pw'];
$email=$_POST['dk_email'];
$sex=$_POST['dk_sex'];
$telephone=$_POST['dk_tel'];
$address=$_POST['dk_address'];
$join=date("Y-m-d");


if(isset($_POST['dk_username']))
{
	$sql_insert_thanhvien="Insert into thanhvien (ID, Ten, Username, Password, Email, Sex, Telephone, Address, Join_date) values('$id', '$ten','$username','$pw','$email','$sex','$telephone','$address','$join')";
	//echo $sql_insert_thanhvien;
	$kq_insert_thanhvien=sql_result($sql_insert_thanhvien);
	//
	if($kq_insert_thanhvien)
	{
		echo "<div style='margin-left:50px;margin-top:30px;text-align:center;float:left;'>";
				echo "Một email có chứa liên kết xác nhận đã được gửi đến email: <b>$email</b>,
				<br>Bạn vui lòng truy cập hộp thư để hoàn tất thủ tục đăng ký trở thành thành viên của CẦN THƠ NEW";
		echo "</div>";
		//
		$validate_code=tao_ma_validate();
		$ex_time=strtotime($join . "+1 day");
		$sql_insert_validate="Insert into xacnhan (ID,Code,Ex_time,Status) values ('$id','$validate_code','$ex_time','NO')";
		//echo $sql_insert_validate;
		$kq_insert_validate=sql_result($sql_insert_validate);
		gui_mail_validate($email,$validate_code);
	}
	else
	{
		echo "THẤT BẠI!";
	}
}

?>
	

<?php
include("right.php");
include("footer.php");

?>   