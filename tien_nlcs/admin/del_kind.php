<?php 
	session_start();
	if(isset($_SESSION['user'])){
		$idl=$_GET['idl'];
		require '../connect_database.php';
		$sql = "DELETE FROM loaisanpham WHERE maloai=$idl";
		$result =$con->query($sql);
		//echo $sql;
		if($result){
			header("location:loaihang.php");
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