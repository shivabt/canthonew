	<?php

include("config.php");
include("header.php");

if(isset($_COOKIE['name']))
{
//
?>

<?php
if(isset($_GET['a']) && isset($_POST['fname']))//Nhap tin
{
	?>
        <div style="margin-left:150px;margin-top:50px;">
        <span style="font-size:15px;font-weight:bold;color:red;font-family:Verdana, Geneva, sans-serif;">
<?php
	
$id_rv=get_id('id_rv','tin_rao_vat');
$author_rv=$_COOKIE['name'];
$date_rv=date("Y-m-d");
$ex_date_rv=date("Y-m-d",strtotime($date_rv . "+30 day"));//Sau này quay lại chỉnh, có thể tùy chỉnh số ngày
$loai_rv=$_POST['radio_buy_sell'];
//echo $loai_rv;
$cat_rv=$_POST['rv_cat'];
//echo $cat_rv;
$view_rv=1;
$title_rv=$_POST['fname'];
//echo $title_rv;
$content_rv=$_POST['editor2'];
//echo "NOI DUNG:".$content_rv;
//VIET HAM CHECK ANH, KICH CO, DUNG LUONG
//demfile($author_rv);
$ip_rv=saveip();
//echo "IP:".$ip_rv;
$price_range=set_gia($_POST['rv_price']);
$price_min_rv=$price_range[0];
$price_max_rv=$price_range[1];
$price_range_name=$price_range[2];

//echo $_POST['rv_price'];
//echo $price_min_rv;
//echo $price_max_rv;
$pic1_rv="";
$pic2_rv="";
$pic3_rv="";
$upanh=1;


if(isset($_FILES["image"]['name']) && !empty( $_FILES["image"]["name"]))
{
	//echo "ABC:".$_FILES['image']['name'];
	$pic1_rv=$_FILES["image"]["name"];
	//$pic2_rv="";
	//$pic3_rv="";
	if(up_anh1($author_rv,$id_rv))
	{
		$upanh=1;
//up_anh2($author_rv);
//up_anh3($author_rv);
	}//DONG IF up ảnh ok nên tiếp tục đăng tin
	else
	{
		$upanh=0;
		echo "<br/>ĐĂNG TIN RAO VẶT THẤT BẠI!<br/><br/>";	
		echo "<a href='dangtin_raovat.php'>>>Trở lại<<</a>";	
	}//ĐÓNG IF UP ẢNH THẤT BẠI
}//dong ham up anh

if($upanh==1)
{

$sql_insert_rv=
"
		insert into tin_rao_vat
		(id_rv,author_rv,date_rv,ex_date_rv,loai_rv,cat_rv,view_rv,title_rv,content_rv,pic1_rv,pic2_rv,pic3_rv,ip_rv,price_min_rv,price_max_rv)
		values
		('$id_rv','$author_rv','$date_rv','$ex_date_rv','$loai_rv','$cat_rv','$view_rv','$title_rv','$content_rv','$pic1_rv','$pic2_rv','$pic3_rv','$ip_rv','$price_min_rv','$price_max_rv');
		;
";
//echo $sql_insert_rv;
$kq_insert_rv=sql_result($sql_insert_rv);
//
if($kq_insert_rv)
	{
		$email_rv=get_value_dk('thanhvien','Username',$author_rv,'Email');
		$sdt_rv=get_value_dk('thanhvien','Username',$author_rv,'Telephone');
		$add_rv=get_value_dk('thanhvien','Username',$author_rv,'Address');
		
		$cat_name_rv=get_value_dk('danh_muc','cat_id',$cat_rv,'cat_name');

		//
		echo "<div style='height:500px;'>";
		echo "<span style='margin-left:130px;'>ĐĂNG TIN RAO VẶT THÀNH CÔNG!</span><br/><br/>";
		echo "<span>Tin sẽ được duyệt trong thời gian nhanh nhất có thể, tối đa 24 giờ!</span><br/><br/>";
		echo "<div style='margin-left:100px;'><p>Xem lại thông tin đã đăng</p></div>";
		echo "<table id='kq_insert'>";
		echo "<tr>";
		echo "<td><p>Email: </p></td><td>".$email_rv;
		echo "</td></tr>";
		echo "<tr>";
		echo "<td><p>Số điện thoại: </p></td><td>".$sdt_rv;
		echo "</td></tr>";
		echo "<tr>";
		echo "<td><p>Chuyên mục: </p></td><td>".$cat_name_rv;
		echo "</td></tr>";
		echo "<td><p>Bạn muốn:</p></td><td> BÁN";
		echo "</td></tr>";
		echo "<tr>";
		echo "<td><p>Địa chỉ: </p></td><td>".$add_rv;
		echo "</td></tr>";
		echo "<tr>";
		echo "<td><p>Tựa đề: </p></td><td>".$title_rv;
		echo "</td></tr>";
		echo "<tr>";
	//		echo "<td><p>Nội dung tin: </p></td><td>".$content_rv."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><p>Khoản giá: </p></td><td>".$price_range_name;
		echo "</td></tr>";
		echo "</table>";
		echo "</div>";
//////////////////
$sql_insert_duyet="insert into duyet_rv values('$id_rv','','$date_rv','pending')";
$kq_insert_duyet=sql_result($sql_insert_duyet);

	}
else
	{
		echo "<br/>ĐĂNG TIN RAO VẶT THẤT BẠI!";
		echo "<a href='dangtin_raovat.php'>Trở lại</a>";	
	}//IF KIEM TRA THUC THI SQL
}//ẢNH OK THÌ THỰC THI




?>
</span>
</div>
<?php
}
else
{
//CODE FORM NHAP THONG TIN RAO VAT	

	?>


    <form id="form_dangtin" method="post" action="dangtin_raovat.php?a=1" enctype="multipart/form-data">
    		
            <table id="id_table_dangtin" >
            <tr>
            	<td style="vertical-align:top;"><p>Bạn muốn: </p></td>
            	<td><input type="radio" name="radio_buy_sell" value="sell" checked="checked" />Bán<input type="radio" name="radio_buy_sell" value="buy"/>Mua</td>
            </tr>
            
            <tr>
            	<td><p>Chọn loại tin: </p></td>
            	<td>
                <select name="rv_cat" id="id_rv_cat">
                <option value="-1">Chọn danh mục: </option>
				<?php load_danhmuc_option(); ?>
            	</select>
                <b>Khoản giá</b>
                <select name="rv_price" id="id_rv_price">
                    <option value="9999">Thỏa thuận</option>
                    <option value="1">Dưới 1 triệu</option>
                    <option value="13">Từ 1-3 triệu</option>
                    <option value="35">Từ 3-5 triệu</option>
                    <option value="510">Từ 5-10 triệu</option>
					<option value="199">Hơn 10 triệu</option>

            	</select>
	            </td>

                <td><a id="tb_type_rv" style="display:none;color:red;font-size:12px;">Xin kiểm tra lại danh mục và khoản giá</a></td>
            </tr>
            
            <tr>
            	<td><p>Tiêu đề: </p></td>
            	<td id="input_tieu_de"><input style="width:450px;" type="text" name="fname" id="fname" onKeyDown="CountLeft(this.form.fname, this.form.left,60);" 
                onKeyUp="CountLeft(this.form.fname,this.form.left,60);" />
                <input readonly type="text" name="left" id="input_left" value="60" disabled="disabled">/<input readonly type="text" id="input_left" value="60" disabled="disabled">
                </td>
                <td><a id="tb_title_rv" style="display:none;color:red;font-size:12px;">Tựa đề không được để trống</a></td>
            </tr>
            
            <tr>
            	<td style="vertical-align:top;"><p>Nội dung: </p></td>
            	<td id="editable"><textarea id="editor1" name="editor2" ></textarea></td>
                <td style="vertical-align:middle;"><a id="tb_content_rv" style="display:none;color:red;font-size:12px;">Nội dung không được để trống</a></td>
            </tr>

			<tr>
            <td>Hình ảnh</td>
			<td>                  
				<div class="uphinh btn btn-primary">
                	<span>Chọn ảnh</span>
					<input id="uploadFile" type="file" name="image" class="img" />
				</div>

				<!--<div class="uphinh btn btn-primary">
                	<span>Chọn ảnh</span>
					<input id="uploadFile2" type="file" name="image2" class="img"  />
				</div>               

				<div class="uphinh btn btn-primary">
                	<span>Chọn ảnh</span>
					<input id="uploadFile3" type="file" name="image3" class="img" />
				</div>  -->
                
            </td>
               <td>
               
               </td>
            </tr>

<tr>
<td></td>
<td><div id="imagePreview" style="margin-top:10px;"></div>
<!--<div id="imagePreview2" style="margin-top:10px;"></div>
<div id="imagePreview3" style="margin-top:10px;"></div>-->
</td>
</tr>
			<tr>
            <td id="submit_rv" colspan="2"><input type="submit" value="Đăng" name="submit2" id="submit2" onclick="return check_rao_vat()"/><input style="margin-left:10px;" type="button" 
            onclick="window.open('preview_rv.php?m=<?php ?>','PREVIEW','height=700,width=1200,resizable=no')" value="Xem trước"  /></td>
            </tr>
            
            </table>

    </form>
    


        
        <?php
		?>
<script>

	CKEDITOR.replace( 'editor1' );
	
	CKEDITOR.disableAutoInline = true;
	CKEDITOR.inline('editable', {
    on: {
        blur: function( event ) {

            var params = {
                page_id: $("#editor1").val(),
                body_text: event.editor.getData()
            };

            $.ajax({
                url: 'dangtin_raovat.php',
                global: false,
                type: "POST",
                dataType: "html json",
                data: params,
                success: function(result) {
                    console.log(result);
                }
            });

        }
    }
});

</script>
    <?php
	}//dong if kiem tra la nhập hay submit tin rao vặt
}//dong if kiem tra cookie
else
{
	echo "BẠN CẦN PHẢI ĐĂNG NHẬP ĐỂ SỬ DỤNG TÍNH NĂNG NÀY";
}//dong else



include("footer.php");

?>
