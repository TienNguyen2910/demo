<?php 
	$idsp=$_POST['idsp'];
	$tensp =$_POST['name_item'];
	$gia=$_POST['price'];
	$sl=$_POST['quantity'];
	$dmuc=$_POST['category'];
	$th=$_POST['brand'];
	$file = $_FILES['image'];
	$duongdan = 'img/'.$file['name'];
	move_uploaded_file($file['tmp_name'],$duongdan);
	require '../connect_database.php';
	$sql = "UPDATE mathang SET tenhang ='$tensp', dongia='$gia',soluongton=$sl,hinhanh='$duongdan',maloai=$dmuc,mahsx=$th WHERE mahang=$idsp";
	$result =$con->query($sql);
	if($result){
		header("location:tables.php");
	}
	else {
		echo "Error!!";
	}
	$con->close();
 ?>