<?php 
	
	$tenl =$_POST['name_kind'];
	require '../connect_database.php';
	$caulenh="INSERT INTO loaisanpham(tenloai) VALUES('$tenl')";
	//echo $caulenh;
	$result =$con->query($caulenh);
	if($result){
		header("location:loaihang.php");
	}
	else {
		echo "Error!!";
	}
	$con->close();
 ?>