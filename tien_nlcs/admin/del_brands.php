<?php 
	session_start();
	if(isset($_SESSION['user'])){
		$idth=$_GET['idth'];
		require '../connect_database.php';
		$sql = "DELETE FROM hangsanxuat WHERE mahsx=$idth";
		$result =$con->query($sql);
		//echo $sql;
		if($result){
			header("location:thuonghieu.php");
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