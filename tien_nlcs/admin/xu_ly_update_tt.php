<?php 
	$tt=$_POST['tt'];
	$idd=$_POST['idd'];
	require '../connect_database.php';
	$sql = "UPDATE dondathang SET trangthai ='$tt' WHERE maddh=$idd";
	//echo $sql;
	$result =$con->query($sql);
	if($tt==-1){
		$con->query("DELETE FROM ctdondathang WHERE maddh=$idd");
		header("location:donhang.php");
	}
	header("location:donhang.php");
	$con->close();
 ?>