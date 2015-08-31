<?php
include("config.php");
if(isset($_GET['n']))
{
echo "ĐĂNG XUẤT THÀNH CÔNG!";
logout($_GET['n']);
}
echo "<meta http-equiv='refresh' content='3;url=index.php'>";
?>