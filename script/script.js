// JavaScript Document

function kiemtra_username()
{
	var name1;
	var ketqua_name1;
	
	name1=document.getElementById('id_dk_username').value;
	if(name1!="")
	{
		return true;
	}
	else
	{
		return false;
	}
}

function kiemtra_sdt()
{
		
}

function kiemtra_pw()
{
	var pw1;
	var pw2;
	var kq_pw;
	
	pw1=document.getElementById('id_dk_pw').value;
	pw2=document.getElementById("id_dk_re_pw").value;
	
	if(pw1==pw2)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function kiemtra_email()
{
	var email1=document.getElementById('id_dk_email').value;
	var email_pattern=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if (email1.match(email_pattern))
	{
		return true;		
	}
	else
	{
		return false;
	}
}

function kiemtra_agree()
{
	var agree1;
	var ketqua_agree1;
	
	agree1=document.getElementById('id_dk_agree').checked;
	if(agree1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function kiemtra_dk()
{
	var name=kiemtra_username();
	var pw=kiemtra_pw();
	var email=kiemtra_email();
	var agree=kiemtra_agree();
	if(name==true && pw==true && email==true && agree==true)
	{
		return true;
	}
	else
	{
		return false;
	}
}

//DEM SO KY TU
function CountLeft(field, count, max) 
{
if (field.value.length > max)
field.value = field.value.substring(0, max);
else
count.value = max - field.value.length;
}

//SAVE DU LIEU
function ClickToSave () {
    var data = CKEDITOR.instances.textToBeSaved.getData();
    $.post('save.php', {
        content : data
        })
    }
	
//CHECK DANG TIN RAO VAT
function check_rao_vat()
{

	 var id_rv_cat=document.getElementById('id_rv_cat');
	 var tb_type_rv=document.getElementById('tb_type_rv');
	 
	 var id_rv_price=document.getElementById('id_rv_price');
	 	 
	 var title_rv=document.getElementById('fname');
	 var tb_rv_title=document.getElementById('tb_title_rv');
//	alert(title_rv.value); 
	 var tb_content_rv=document.getElementById('tb_content_rv');
	 var content_rv=CKEDITOR.instances.editor1.getData();

//alert(content_rv);
//alert(id_rv_cat);
//		alert("1");
	
	if(id_rv_cat.value==-1)
	{
		
		//alert("2");
		id_rv_cat.style.backgroundColor = 'yellow';
		tb_type_rv.style.display= 'block';
		var cat=0;
	}
	else
	{
		
		id_rv_cat.style.backgroundColor = 'white';
		tb_type_rv.style.display= 'none';
		var cat =1;
	}//END IF

	if(title_rv.value=="")
	{
		
		//alert("3");
		title_rv.style.backgroundColor = 'yellow';
		tb_rv_title.style.display= 'block';
		var title=0;
	}
	else
	{
		title_rv.style.backgroundColor = 'white';
		tb_rv_title.style.display= 'none';
		var title=1;
	}//END IF
	
	
	
	if(content_rv.length==0)
	{
		//alert(content_rv);
		tb_content_rv.style.display= 'block';
		var content=0;
	}
	else
	{
		
		tb_content_rv.style.display= 'none';
		var content=1;
	}//END IF
	

	if(cat && title && content)
	{
			return true;
	}
	else
	{
			return false;	
	}
	
}
