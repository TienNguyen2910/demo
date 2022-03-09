<?php 
session_start();
$ht=$_POST['htenkh'];
$sdt=$_POST['phonekh'];
$dc=$_POST['dcnhan'];
$tt=$_POST['tt'];
$makhach=$_SESSION['id_client'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp=time();
$day=date("Y/m/d H:i:s ",$timestamp);
	//echo $day;
require 'connect_database.php';
 // $sql="INSERT INTO dondathang(makhach,ngaydat,noigiao,tongtien) VALUES($makhach,$day,$dc,$tt)";
 //  echo $sql;
$result=$con->query("UPDATE khachhang SET ho_ten='$ht',dienthoai='$sdt' WHERE makhach=$makhach");
$res=$con->query("INSERT INTO dondathang(makhach,ngaydat,noigiao,tongtien) VALUES($makhach,'$day','$dc',$tt)");

if($res){
	$id_gh=$con->insert_id;
	foreach ($_POST['masp'] as $value) {
		$kq=$con->query("SELECT soluong,dongia,soluongton FROM mathang mt, giohang gh WHERE mt.mahang=$value AND mt.mahang=gh.mahang");
		if($kq->num_rows>0){
			$row=$kq->fetch_assoc();
			$sl= $row['soluong'];
			$dg=$row['dongia'];
			$slt=$row['soluongton'];
			$cap=$slt - $sl;
		}
		else{
			$kq=$con->query("SELECT dongia,soluongton FROM mathang WHERE mahang=$value");
			$row=$kq->fetch_assoc();
			$sl= 1;
			$dg=$row['dongia'];
			$slt=$row['soluongton'];
			$cap=$slt - $sl;
		}
		$con->query("INSERT INTO ctdondathang(maddh,mahang,soluong,dongia) VALUES($id_gh,$value,$sl,$dg)");
		$con->query("UPDATE mathang SET soluongton=$cap WHERE mahang=$value");
	}
	$thongbao="Thank you for buying your purchase";
	header("location:index_giohang.php");
}
	
?>