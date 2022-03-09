<?php session_start();
	if(!isset($_SESSION['client'])){
		header("location:login_client.html");
	}
	else{
		$mahang=$_GET['id'];
		$makhach=$_SESSION['id_client'];
		//echo $makhach;
		require 'connect_database.php';
		$sql="INSERT INTO giohang (mahang,soluong,makhach) VALUES($mahang,1,$makhach)";
		$result=$con->query($sql);
		
		// $result=$con->query("SELECT * FROM giohang WHERE makhach=$makhach");
		// $row=$result->fetch_assoc();

		// $idsp=$row['mahang'];
		// $_SESSION['cart'][$idsp]=$row;
		//print_r($_SESSION['cart']);
		header("location:index_giohang.php");
		$con->close();
	}
 ?>