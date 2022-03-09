<?php 
	session_start();
	if(isset($_SESSION['client'])){
		$id_gh=$_GET['idsp'];
		require 'connect_database.php';
		$sql="DELETE FROM giohang WHERE id_giohang=$id_gh";
		$result=$con->query($sql);
		if($result){
			header("location:giohang.php");
		}
		else{
			echo "Delete Error";
		}
		$con->close();
	}
	else{
		header("location:login_client.html");
	}
 ?>