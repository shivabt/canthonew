</div><!--MID-->
<div id="right">   
   
		<?php
	    $_SESSION['url']=$_SERVER['PHP_SELF'];
		//echo $_SESSION['url'];
        if(isset($_COOKIE['name']))
        {
			$name=$_COOKIE['name'];
            ?>
            <div id="wraper" > 
                            <h1 style="color:#06F;">Thành viên</h1> <br/><a>Xin chào</a><?php echo "<span style='font-weight:bold;font-size:15px;color:red;'> ".$name."</span> ";?><br/></a>
                            <br />
                            <a href="usercp.php" id="dashboard">Bảng điều khiển</a>
                            <div class="clear"></div>
                            <br />
                            <a id="quenmk" onclick="location.href = 'logout.php?n=<?php echo $name; ?>'">Đăng xuất</a>
                    <div class="clear"></div> 
            
            </div><!--DIV WRAPPER LOGIN-->            
			<?php
        }
        else
        {
        ?>  
            
            <div id="wraper" >
                        <form method="post" action="ketqua_login.php"> <h1 style="color:#06F;">ĐĂNG NHẬP</h1> <label></label> <input type="text" name="username" placeholder="Tên đăng nhập" /> <label></label> <input type="password" name="pass" placeholder="Mật khẩu" />
                        <div class="clear"></div>
                        <a id="quenmk" href="register.php">Đăng ký thành viên</a><br/>
                        <div style="margin-top:5px;"><a id="quenmk">Quên mật khẩu?</a></div>
                        <div class="clear"></div> 
                        <input type="submit" name="submit" value="Đăng nhập" /> </form>
            </div><!--DIV WRAPPER LOGIN-->
            
            
          <?php
		
			
         }//Neu khong co cookie thi co box login
		 
		 ?>
            
            </div><!--RIGHT-->