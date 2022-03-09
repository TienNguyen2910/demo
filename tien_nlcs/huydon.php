<?php 
	session_start(); 
	if(!isset($_SESSION['client'])){
	header('location:login_client.html');
	}
	else{
		$id_don=$_GET['id_don'];
		//echo $id_don;
		require 'connect_database.php';
		$result=$con->query("UPDATE dondathang SET huydon=1 WHERE maddh=$id_don");
		if($result){
			$sql="SELECT mt.mahang,soluong,soluongton FROM ctdondathang ct,mathang mt WHERE maddh=$id_don AND mt.mahang=ct.mahang";
			$res=$con->query($sql);
			while($row=$res->fetch_assoc()){
				$ma=$row['mahang'];
				$sl= $row['soluong'];
				$slt=$row['soluongton'];
				$cap=$slt+$sl;
				//echo $cap;
				$con->query("UPDATE mathang SET soluongton=$cap WHERE mahang=$ma");
			}
			//$con->query("DELETE FROM ctdondathang WHERE maddh=$id_don");
		}
		header("location:index_giohang.php");
		$con->close();
	}
 ?>