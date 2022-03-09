<?php 
	$ten=$_POST['tenkh'];
	$email=$_POST['email'];
	$sdt=$_POST['phone'];
	$mk=md5($_POST['pass']);
	//echo $ten."<br>".$email."<br>".$sdt."<br>".$mk
	require 'connect_database.php';
	$sql="INSERT INTO khachhang (tenkhach,dienthoai,email,matkhau) VALUES ('$ten','$sdt','$email','$mk')";
	//echo $sql;
	$result = $con->query($sql);
	session_start();
	if($result){
		$_SESSION['client']=$row['tenkhach'];
		$_SESSION['id_client']=$row['makhach'];
		header("location:index_giohang.php");
	}
	else echo "Insert Error";
	$con->close();
 ?>