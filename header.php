<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php ?>
<title>Cần Thơ New - Thông Tin Mua Bán, Việc Làm, Bất Động Sản của TP Cần Thơ</title>

<link rel="stylesheet" href="style.css" />

<link rel="shortcut icon" href="images/favicon.ico" />

<script src="script/jquery-1.11.2.min.js"></script>
<script language="javascript" src="script/script.js"></script>

<script src="plugin/ckeditor/ckeditor.js"></script>


<link href="plugin/imageupload/css/style.css" rel="stylesheet">
<style>
#imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
	
}
#imagePreview2 {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}

#imagePreview3 {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}

#uploadFile_remove{
  display: inline-block;
  padding: 3px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
  color: #fff;
  background-color: #966;
  border-color: #2e6da4;
}
</style>
<script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});

$(function() {
    $("#uploadFile_remove").on("click", function()
    {
		$("#imagePreview").css("background-image", "url("+123+")");
		$('#uploadFile').val('');
        var files = !!this.files ? this.files : [];
		 var reader = new FileReader(); // instance of the FileReader
         reader.readAsDataURL("")

        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(""); // read the local file

        }
    });
});
//
$(function() {
    $("#uploadFile2").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview2").css("background-image", "url("+this.result+")");
            }
        }
    });
});
$(function() {
    $("#uploadFile3").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview3").css("background-image", "url("+this.result+")");
            }
        }
    });
});
//

    $(document).ready(function(){
        var clientHeight = document.documentElement.clientHeight;
        $('#wrapperHeight').height(clientHeight+'px');
        var bodyHeight = clientHeight - $('#body_div').css("marginTop").replace('px', '') - $('#footer').outerHeight(true);
        $('#body_div').height(bodyHeight+'px');
    });

</script>


</head>

<body>
<div id="wrapper">



<div id="header">

	<div id="logo"><a href="http://localhost/canthonew"><img src="images/logo_ctn.png"/></a></div><!--LOGO-->
    <div id="banner_head_1"><img src="images/ct_banner.jpg" /></div><!--BANNER HEAD 1-->
	<div class="clear"></div><!--CLEAR-->

<div id="menu" style="display:none;">   
<!--                <div id='cssmenu'>
                <ul >
                   <li class='active'><a href='#'>HOME</a></li>
                   <li><a href='#'>VIỆC LÀM </a></li>
                   <li><a href='#'>DU LỊCH </a></li>
                   <li><a href='#'>LIÊN HỆ </a></li>
                
                </ul>
                </div><!--CSS MENU-->
               <nav id="nav">	
	<ul>		
		<li>
			<a href=""><span>CẦN THƠ</span></a>
		</li>
		<li>
			<a href=""><span>TIN TỨC</span></a>
		</li>
		<li>
			<a href=""><span>VIỆC LÀM</span></a>
		</li>
		<li>
			<a href=""><span>LIÊN HỆ</span></a>
		</li>
	</ul>

</nav>
            <!--<div id="search_bar"><input id="search_box" type="text" placeholder="Tìm kiếm"/><input id="btn_Search" type="submit" value=" " /></div><!--SEARCH BAR-->      
    </div><!--MENU-->

    
</div><!--HEADER-->
<div class="clear"></div>
<div id="main">