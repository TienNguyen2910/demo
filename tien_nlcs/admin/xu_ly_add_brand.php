<?php 
	
	$tenth =$_POST['name_brand'];
	require '../connect_database.php';
	$caulenh="INSERT INTO hangsanxuat(tenhsx) VALUES('$tenth')";
	//echo $caulenh;
	$result =$con->query($caulenh);
	if($result){
		header("location:thuonghieu.php");
	}
	else {
		echo "Error!!";
	}
	$con->close();
 ?>