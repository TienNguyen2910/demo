<?php 
	session_start();
	if(isset($_SESSION['client'])){
		$id_gh=$_GET['idsp'];
		$soluong=$_GET['sl'];
		//echo "số lượng= ".$soluong." id_gio hang= ".$id_gh;
		require 'connect_database.php';
		$sql="UPDATE giohang SET soluong=$soluong WHERE id_giohang=$id_gh";
		$result=$con->query($sql);
		if($result){
			header("location:giohang.php");
		}
		else{
			echo "Update Error";
		}
		$con->close();
	}
	else{
		header("location:login_client.html");
	}
 ?>