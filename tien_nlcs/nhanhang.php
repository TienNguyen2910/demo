<?php 
	session_start(); 
	if(!isset($_SESSION['client'])){
	header('location:login_client.html');
	}
	else{
		$id_don=$_GET['id_don'];
		//echo $id_don;
		require 'connect_database.php';
		$con->query("UPDATE dondathang SET trangthai=3 WHERE maddh=$id_don");
		header("location:index_giohang.php");
		$con->close();
	}
 ?>