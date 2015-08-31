		<?php
include("config.php");
include("header.php");
include("left.php");

?>

<?php

if(isset($_GET['c']))
{
	$code=$_GET['c'];
	$email_kh=$_GET['e'];
	//Tim ID
	$id_kh=get_value_dk('thanhvien','Email',$email_kh,'ID');
	//CHECK CODE VA ID
	$kt_validate=get_value_2dk('xacnhan','ID',$id_kh,'Code',$code,'ID');
	//THOI GIAN VALIDATE
	$time_ex=strtotime(get_value_dk('xacnhan','ID',$id_kh,'Ex_time'));
	//TRANG THAI KICH HOAT
	$status=get_value_dk('xacnhan','ID',$id_kh,'Status');
	
	//echo $username;
	//
	$time_current=strtotime(date("Y-m-d"));
	//echo $time_current."&&".$time_ex;
	//$kt_kichhoat=get_value_2dk('xacnhan','Code',$ma_kh,'ID',$id_kh,'Status');
	//echo $kt_kichhoat;
	if(isset($kt_validate) && $status=="NO")
	{
		if($time_ex<$time_current)
		{
		
		$sql_update_status="update xacnhan set Status='YES' where ID='$id_kh'";
		$kq_update_status=sql_result($sql_update_status);
		echo "<br/>Kích hoạt thành công. Sẽ quay lại trang chủ trong 5 giây.";
		//Set Cookie
		$username=get_value_dk('thanhvien','ID',$id_kh,'Username');		
		setcookie("name",$username,time() + 86400);
		echo "<meta http-equiv='refresh' content='5;url=index.php'>";
		}
		else
		{
	
			
			echo "		<br/>KÍCH HOẠT THẤT BẠI vì:<br/>
			- Link kích hoạt đã hết hạn. !<br/>";
			echo "<br/>Sẽ quay lại trang chủ trong 5 giây.";
			$sql_delete_thanhvien="delete from thanhvien where ID='$id_kh'";
			$kq_delete_thanhvien=sql_result($sql_delete_thanhvien);
			echo "<meta http-equiv='refresh' content='5;url=index.php'>";
		}
	}
	else
	{
		echo "		<br/>KHÔNG THỂ XÁC NHẬN EMAIL NÀY VÌ:<br/>
		- Email này đã được kích hoạt!<br/>
		- Email và mã kích hoạt không trùng khớp!<br/>";
	}
		
	
}
else
{
	
}

?>

	

<?php
include("right.php");
include("footer.php");

?>   