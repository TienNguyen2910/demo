<?php 
	session_start();
	if(isset($_SESSION['user'])){
		$idsp=$_GET['idsp'];
		require '../connect_database.php';
		$sql = "DELETE FROM mathang WHERE mahang=$idsp";
		$result =$con->query($sql);
		//echo $sql;
		if($result){
			header("location:tables.php");
		}
		else {
			echo "Error!!";
		}
		$con->close();
	}
	else{
		header("location:login.html");
	}
 ?>