<?php 
	$tendn=$_POST['tendn'];
	$mk=md5($_POST['pass']);
	require 'connect_database.php';
	$sql="SELECT * FROM khachhang WHERE tenkhach='$tendn' AND matkhau='$mk'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
	session_start();
	if($result->num_rows){
		$_SESSION['client']=$row['tenkhach'];
		$_SESSION['id_client']=$row['makhach'];
		header("location:index_giohang.php");
	}
	else{
		echo "<script>alert(Sai email hoặc mật khẩu)</scipt>";
		header("location:login_client.html");
	}
	$con->close();
 ?>