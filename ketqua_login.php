	<?php
//session_start();
include("config.php");
include("header.php");
include("left.php");

//
$url_hientai=$_SERVER['PHP_SELF'];
//echo $url_hientai;

if($url_hientai=="/canthonew/ketqua_login.php")
{
	$url_hientai="/canthonew/index.php";
}
if(isset($_POST['username']) && isset($_POST['pass']))
{
	$name=strtolower($_POST['username']);
	$pw=$_POST['pass'];
	
$kq=kiemtra_login($name,$pw);

if($kq)
 {
?>

		<div id="thongbao_dangnhap_thanhcong">
            <p><span style="font-weight:0;margin-left:-100px">Đăng nhập thành công...Bạn sẽ được chuyển về trang trước đó</span></p>
            <div id="progress_bar"></div>
    	</div>
        </div><!--MID-->
<?php
 setcookie("name",$name,time() + 86400);
 echo "<meta http-equiv='refresh' content='5;url=$url_hientai'>";
 }
 else           
 {
	 ?>
     
          	<div id="thongbao_dangnhap_thanhcong">
            <p style="font-weight:bold;color:red;margin-left:-100px;">ĐĂNG NHẬP THẤT BẠI... XIN ĐĂNG NHẬP LẠI</p>

    </div>

            
<?php
include("right.php");
 }//ELSE KIEM TRA DANG NHAP
}//NGAN NGUOI DUNG TRUY CAP TRUC TIEP
include("footer.php");

?>   
            
            