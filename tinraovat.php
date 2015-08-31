@@ -1,91 +0,0 @@
	<?php

include("config.php");
include("header.php");

if(isset($_GET['rv']) && isset($_COOKIE['name']) )
{
$id_rv=$_GET['rv'];
//Lay du lieu
//echo $id_rv;

$sql_select_rv="select * from tin_rao_vat where id_rv='$id_rv'";
$kq_select_rv=sql_set($sql_select_rv);

$kq=$kq_select_rv;

$author_rv=$kq['author_rv'];
//echo $author_rv;
$date_rv=$kq['date_rv'];
//echo $date_rv;
$ex_date_rv=$kq['ex_date_rv'];
//XU LY LOẠI TIN MUA BÁN
if($kq['loai_rv']!="sell")
{
$loai_rv="mua";
}
else $loai_rv="bán";
//echo $loai_rv;
$cat_rv=get_value_dk('danh_muc','cat_id',$kq['cat_rv'],'cat_name');
//echo $cat_rv;
//XU LY + VIEW;
$view_rv=$kq['view_rv']+1;
$sql_update_view="";

//
$title_rv=$kq['title_rv'];
//echo $title_rv;
$content_rv=$kq['content_rv'];
//echo "NOI DUNG:".$content_rv;
//VIET HAM CHECK ANH, KICH CO, DUNG LUONG
//demfile($author_rv);
$ip_rv=$kq['ip_rv'];
//echo "IP:".$ip_rv;
$price_min=$kq['price_min_rv'];
$price_max=$kq['price_max_rv'];
$price_rv=set_gia2($price_min,$price_max);
//echo $price_rv;


//echo $price_min_rv;
//echo $price_max_rv;
$pic1_rv="http://localhost/canthonew/upload/".$author_rv."/".$id_rv."/".$kq['pic1_rv'];

echo "<div id='anh1' style='width:400px;height:400px;float:right;'><img src='$pic1_rv'"."/"."></div>";
//echo $pic1_rv;
$pic2_rv="";
$pic3_rv="";
	
	
?>
<style>
#anh1 img
{
	max-height:100%;
	max-width:100%;
}
</style>
<div style="float:left;">
<div id="path_rv"> <a>Cần Thơ New</a> » <a><?php echo $cat_rv ?></a> » <a><?php echo $title_rv ?></a> </div><!--PATH RAO VAT-->
<div id="title_rv"><?php //echo $title_rv ?></div><!--TITLE RAO VAT-->
<div id="content_rv">
	<?php
	
	?>
</div><!--NOI DUNG RAO VAT-->
</div>



            
<?php
}//
else
{
	echo " ";//NGĂN TRUY CẬP TRỰC TIẾP
}
include("footer.php");

?>   
            
            
\ No newline at end of file