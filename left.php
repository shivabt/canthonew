<div id="left">
            <div class="tags" style="">	
            	<a href="dangtin_raovat.php" class="tags">ĐĂNG TIN</a>   			
            </div><!--END TAG-->
   
                    <ul id="cat_menu">
                       	
                        <li><a>Bất động sản</a>
                            <ul id="bds_2">
                                <li><a>Bán, cho thuê</a></li>
                                <li><a>Mua</a></li>
                                <li><a>Sàn BĐS, môi giới</a></li>
                            </ul>
                        </li>
                        
                        <li><a>Thời trang - Quần áo</a></li>
                        <li><a>Tin học, điện tử, games</a></li>
                        <li><a>Xây dựng - Nội thất</a></li>
                        <li><a>Điện thoại, tablet</a></li>
                        <li><a>Xe hơi, xe máy, xe đạp</a></li>
                        <li><a>Mẹ và bé</a></li>
                        <li><a>Đồ gia dụng</a></li>
                        <li><a>Thẩm mỹ, làm đẹp</a></li>
                        <li><a>Sản phẩm, dịch vụ khác</a></li>
                        
                    </ul><!--MENU-->
                
            </div><!--LEFT-->
            
<div id="mid">

<form id="search_bar">
            <div id="timkiem_rv">
            
            		<input id="search_box" type="text" placeholder="Tìm kiếm"/>
                    <input id="btn_Search" type="submit" value=" " />
            
            </div><!--DIV TIM KIEM-->
            
                            <select name="search_rv_cat" id="search_id_rv_cat">
                                <option value="-1">Chọn danh mục: </option>
                                <?php load_danhmuc_option(); ?>
                            </select>	
                            <input type="radio" name="radio_buy_sell" class="class_radio_buy_sell" value="sell" checked="checked" style="margin-top:10px;"/><a>Bán</a><input type="radio" class="class_radio_buy_sell" name="radio_buy_sell" value="buy"/><a>Mua</a>
                            
              <!--<input id="submit_rv_cat" type="submit" value="Tìm" />-->
</form><!--DIV SEARCH BAR-->
            
<div class="clear"></div>