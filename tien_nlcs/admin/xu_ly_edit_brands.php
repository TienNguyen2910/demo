<?php 
	$idth=$_POST['idth'];
	$tenth =$_POST['name_brand'];
	require '../connect_database.php';
	$sql = "UPDATE hangsanxuat SET tenhsx ='$tenth' WHERE mahsx=$idth";
	//echo $sql;
	$result =$con->query($sql);
	if($result){
		header("location:thuonghieu.php");
	}
	else {
		echo "Error!!";
	}
	$con->close();
 ?>