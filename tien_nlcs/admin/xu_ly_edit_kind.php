<?php 
	$idl=$_POST['idl'];
	$tenl =$_POST['name_kind'];
	require '../connect_database.php';
	$sql = "UPDATE loaisanpham SET tenloai ='$tenl' WHERE maloai=$idl";
	//echo $sql;
	$result =$con->query($sql);
	if($result){
		header("location:loaihang.php");
	}
	else {
		echo "Error!!";
	}
	$con->close();
 ?>