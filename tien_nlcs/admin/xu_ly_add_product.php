<?php 
	
	$tensp =$_POST['name_item'];
	$gia=$_POST['price'];
	$sl=$_POST['quantity'];
	$dmuc=$_POST['category'];
	$th=$_POST['brand'];
	$file = $_FILES['image'];
	$duongdan = './img/'.$file['name'];
	move_uploaded_file($file['tmp_name'],$duongdan);
	require '../connect_database.php';
	$caulenh="INSERT INTO mathang(tenhang,dongia,soluongton,hinhanh,maloai,mahsx) VALUES('$tensp','$gia',$sl,'$duongdan',$dmuc,$th)";
	//echo $caulenh;
	$result =$con->query($caulenh);
	if($result){
		header("location:tables.php");
	}
	else {
		echo "Error!!";
	}
	$con->close();
 ?>