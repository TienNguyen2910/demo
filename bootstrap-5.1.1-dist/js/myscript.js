function check(){
	var name = document.getElementById("name").value;
	var phone = document.getElementById("phone").value;
	var password = document.getElementById("pass").value;
	var kt =/^[A-Za-z][A-Za-z0-9]{3,20}$/;
	var check =true;
	if (!kt.test(name)) {
		document.getElementById("ten").innerHTML="Tên đăng nhập phải bắt đầu bằng chữ cái,có 4 đến 20 ký tự ";
		check =false;
	}
	else{
		document.getElementById("ten").innerHTML="";
	}
	if(phone.length!=10){
		document.getElementById("sdt").innerHTML="Bạn nhập sai,phải có 10 số";
		check = false;
	}
	else{
		document.getElementById("sdt").innerHTML="";
	}
	if (!kt.test(name)) {
		document.getElementById("mk").innerHTML="Mật khẩu phải bắt đầu bằng chữ cái,có 4 đến 20 ký tự ";
		check = false;
	}
	else{
		document.getElementById("mk").innerHTML="";
	}
	return check;
}

function addCart(){

}

function myfunction(str){
	var xmlhttp=new XMLHttpRequest();
	 		xmlhttp.onreadystatechange=function(){
	 			if(this.readyState==4 && this.status==200){
	 				document.getElementsByClassName("tab2")[0].innerHTML=this.responseText;
	 			}
	 		};
	 		xmlhttp.open("GET","tim_kiem.php?u="+str,true);
	 		xmlhttp.send();
}

function search_catalog(idloai){
	var xmlhttp=new XMLHttpRequest();
	 		xmlhttp.onreadystatechange=function(){
	 			if(this.readyState==4 && this.status==200){
	 				document.getElementsByClassName("tab2")[0].innerHTML=this.responseText;
	 			}
	 		};
	 		xmlhttp.open("GET","tkiem_phu_luc.php?id="+idloai,true);
	 		xmlhttp.send();
}
function search_brand(idhsx){
	var xmlhttp=new XMLHttpRequest();
	 		xmlhttp.onreadystatechange=function(){
	 			if(this.readyState==4 && this.status==200){
	 				document.getElementsByClassName("tab2")[0].innerHTML=this.responseText;
	 			}
	 		};
	 		xmlhttp.open("GET","tkiem_thuong_hieu.php?id="+idhsx,true);
	 		xmlhttp.send();
}
function product_detail(idsp){
	var xmlhttp=new XMLHttpRequest();
	 		xmlhttp.onreadystatechange=function(){
	 			if(this.readyState==4 && this.status==200){
	 				document.getElementById("ctsp").innerHTML=this.responseText;
	 			}
	 		};
	 		xmlhttp.open("GET","chitiet_sp.php?idsp="+idsp,true);
	 		xmlhttp.send();
}