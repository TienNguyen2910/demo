<!DOCTYPE html>
<html>
<head>
	<title>Chi tiết sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./bootstrap-5.1.1-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap-5.1.1-dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css">
	<style type="text/css">
		.col-sm{
			font-size: 14px;
		}
	</style>
</head>
<body>
	<div class="tab2">
		<?php 
			$idsp = $_GET['idsp'];
			//echo $idsp ."<br>";
			require 'connect_database.php';
				//viết câu lệnh lấy tên hàng, đơn giá 
			$cau = "SELECT tenhang,mt.mahang,mt.dongia,maloai,SUM(soluong) TongSP_B FROM mathang mt,ctdondathang ct  WHERE mt.mahang =$idsp AND mt.mahang=ct.mahang ";
			$result = $con->query($cau);
			$kq =$result->fetch_assoc();

			echo "<div class='container'>";	//start container
			echo "	<div class='row content'>"; //start row content
			echo "		<div class='col-sm-6'>";	//start col thu 1
			echo "		<div style='font-size:20px'>".$kq['tenhang']."</div>";	//hiện tên hàng

			// lấy hình ảnh sản phẩm cho chi tiết 
			$sqli = "SELECT link_anh FROM hinhanhsp  WHERE  mahang=$idsp";
			$res = $con->query($sqli);
			while ($rows = $res->fetch_assoc()) {
						$hinh = "./admin".$rows['link_anh'];		
			echo "		<img src='".$hinh."'>";
					}   
			echo "		</div>";	//end col thu 1
				// điều kiện để lấy ra thông số kỹ thuật từng loại

			echo "		<div class='col-sm-6'>";	//start col thu 2
			echo "		<div id='price'> Giá: ".number_format($kq['dongia'])."đ</div><br>";
			if($kq['TongSP_B']>0){
				echo "		Đã bán: ".$kq['TongSP_B']." sản phẩm<br><br>";
			 }
			else{
				echo "		Đã bán: 0 sản phẩm<br><br>";
			}
			switch ($kq['maloai']) {
				case '1':	//1: laptop
					$sql = "SELECT * FROM tskthuat_laptop WHERE mahang=$idsp";
					$result = $con->query($sql); 
					$row = $result->fetch_assoc();
					echo "
								Model: " .$row['model']." <br>
								CPU: ".$row['CPU']." <br>
								RAM: ".$row['RAM']." <br>
								Màn hình: ".$row['manhinh']." <br>
								Card màn hình: ".$row['card_manhinh']." <br>
								Ổ cứng: ".$row['o_cung']." <br>
								Hệ điều hành: ".$row['hedieuhanh']." <br>
							"; 
					break;
				case '2':
					$sql = "SELECT * FROM tskthuat_dt WHERE  mahang=$idsp";
					$result = $con->query($sql); 
					$row = $result->fetch_assoc();
					echo "
								Màn hình: " .$row['manhinh']." <br>
								Hệ điều hành: ".$row['hdh']." <br>
								Camera trước: ".$row['camera_truoc']." <br>
								Camera sau: ".$row['camera_sau']." <br>
								RAM: ".$row['RAM']." <br>
								Bộ nhớ trong: ".$row['bo_nho_trong']." <br>
								SIM: ".$row['SIM']." <br>
								Dung lượng pin: ".$row['dung_luong_pin']." <br>
							"; 
					break;
			}
			echo "		<div class='col-sm-6' style='padding-top:50px;'>
							<form action='checkout.php' method='POST' enctype='multipart/form-data'>
								<a href='themgiohang.php?id=".$kq['mahang']."'  class='btn btn-info' style='margin-left: 5px;'>Thêm vào giỏ hàng</a>
								<input type='hidden' name='masp[]' value='".$kq['mahang']."'>
								<button type='submit' class='btn btn-danger'>Mua hàng</button>
							</form>
						</div>";
			echo "		</div>"; //end col thu 2
			echo "	</div>"; //end row content
			echo"</div>"; //end container 
		?>
	<div class='container-fluid thank_ct'>
		<div class='row'>
			<p class='text-center'>© 2021 Electrocnic Shop. All rights reserved. Thanks for visit website</p>
		</div>
	</div>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/myscript.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
</body>
</html>