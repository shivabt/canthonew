		<?php

include("config.php");
include("header.php");


?>
<div style="height:580px;">
<form id="id_form_dangky_tv" method="post" action="register_kq.php">

<table id="table_dangky" >
<tr><a id="title_dk">ĐĂNG KÝ NGƯỜI DÙNG</a></tr>
<tr>
<td><p>Họ và tên: </p></td>
<td><input name="dk_name" id="id_dk_name" type="text" /></td>
<td></td>
</tr>
<tr>
<td><p>Tên đăng nhập: </p></td>
<td><input name="dk_username" id="id_dk_username" type="text" /></td>
<td></td>
</tr>

<tr>
<td><p>Mật khẩu: </p></td>
<td><input name="dk_pw" id="id_dk_pw" type="password" /></td>
<td></td>
</tr>

<tr>
<td><p>Nhập lại mật khẩu: </p></td>
<td><input name="dk_re_pw" id="id_dk_re_pw" type="password" /></td>
<td></td>
</tr>

<tr>
<td><p>Email: </p></td>
<td><input name="dk_email" id="id_dk_email" type="email" /></td>
<td></td>
</tr>

<tr>
<td><p>Địa chỉ: </p></td>
<td><input name="dk_address" id="id_dk_address" type="text" /></td>
<td></td>
</tr>

<tr>
<td><p>SĐT: </p></td>
<td><input name="dk_tel" id="id_dk_tel" type="tel"  /></td>
<td></td>
</tr>

<tr>
<td><p>Giới tính: </p></td>
<td >
<select name="dk_sex" id="id_dk_sex">
  <option value="nam">Nam</option>
  <option value="nu">Nữ</option>
</select>
</td>
<td></td>
</tr>

<!--
<tr>
<td><a>Sinh nhật: </a></td>
<td >Ngày
<select id="dob_day" name="dob_day"> 
<option value="1">1</option> 
<option value="2">2</option>
 <option value="3">3</option> 
<option value="4">4</option>
 <option value="5">5</option> 
<option value="6">6</option> 
<option value="7">7</option> 
<option value="8">8</option>
 <option value="9">9</option> 
<option value="10">10</option>
 <option value="11">11</option>
 <option value="12">12</option>
 <option value="13">13</option> 
<option value="14">14</option>
 <option value="15">15</option>
 <option value="16">16</option>
 <option value="17">17</option>
 <option value="18">18</option> 
<option value="19">19</option> 
<option value="20">20</option> 
<option value="21">21</option> 
<option value="22">22</option> 
<option value="23">23</option>
 <option value="24">24</option>
 <option value="25">25</option>
 <option value="26">26</option>
 <option value="27">27</option>
 <option value="28">28</option> 
<option value="29">29</option>
 <option value="30">30</option>
 <option value="31">31</option>
</select>

Tháng
<select name="dob_month">
             	
            
             	
            <option value="1" selected="selected">Tháng một</option>
             	
            <option value="2">Tháng hai</option>
             	
            <option value="3">Tháng ba</option>
             	
            <option value="4">Tháng tư</option>
             	
            <option value="5">Tháng năm</option>
             	
            <option value="6">Tháng sáu</option>
             	
            <option value="7">Tháng bảy</option>
             	
            <option value="8">Tháng tám</option>
             	
            <option value="9">Tháng chín</option>
             	
            <option value="10">Tháng mười</option>
             	
            <option value="11">Tháng mười một</option>
             	
            <option value="12">Tháng mười hai</option>
             
          </select>

Năm
<select id="dob_year" name="dob_year">
<?php
	$day=2010;
	while($day>=1920)
	{
	echo '<option value='.$day.'>'.$day.'</option>';
	$day=$day-1;
	}
	
?>
</select>
</td>

</tr>
-->
<tr>
<td><p>Mã xác nhận: </p></td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td 	colspan="3">
<input type="checkbox" name="dk_agree" value="1" id="id_dk_agree" />
              Tôi đồng ý với
            <a href="http://canthonew.com/quydinh.php" target="_blank">Quy định của Cần Thơ New</a>
     
     
     
</td>
</tr>


</table>
       <input type="submit" value="Đăng ký" accesskey="s" id="SubmitButton" style="margin-left:350px;margin-top:10px;" onclick="return kiemtra_dk()" />

</form>

<div class="clear"></div>


  
</form>
</div><!--DIV TAO KHOANG CACH VUA-->            
  
<?php

include("footer.php");

?>   
            
            