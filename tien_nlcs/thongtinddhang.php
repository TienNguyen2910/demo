<?php session_start(); 
if(!isset($_SESSION['client'])){
	header('location:login_client.html');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thông tin đặt hàng</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap-5.1.1-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap-5.1.1-dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css">
</head>
<body>
	<div class="container" style="padding-top: 40px;">
		<div class="row">
			<h4 style="text-align: center;">Thông tin đơn đặt hàng</h4>
		</div>
		<div class="row">
			<div class="col-md col-sm">
				<table class="table table-borderless">
					<thead>
						<tr id="t_td">
							<th>Mã đơn hàng </th>
							<th>Ngày đặt</th>
							<th scope="col">Địa chỉ nhận</th>
							<th scope="col">Trạng thái đơn hàng</th>
							<th scope="col" colspan="2">Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$idkh=$_SESSION['id_client'];
						 	require 'connect_database.php';	
							$sql="SELECT * FROM  dondathang  WHERE  makhach=$idkh";
							$result=$con->query($sql);
							$count=0;
							while($row=$result->fetch_assoc()){
								$arr[$count]=$row['maddh'];
								$tt[$count]=$row['tongtien'];
								echo "<tr>
									<td>".$row['maddh']."</td>
									<td>".$row['ngaydat']."</td>
									<td>".$row['noigiao']."</td>";
								$tthai =$row['trangthai'];
								$tth[$count]=$tthai;
								switch ($tthai) {
									case '-1':
										echo"<td style='color:red;'> Đơn đã hủy</td>";
										break;
									case '0':
										echo"<td style='color:#006400;'> Đơn mới tạo</td>";
										echo "<td>
											<a class='btn btn-light' href='huydon.php?id_don=$arr[$count]'>Huỷ</a>
										</td>";
										break;	
									case '1':
										echo"<td style='color: #FF8C00'> Đang được xử lý</td>";
										echo "<td>
											<a class='btn btn-light' href='huydon.php?id_don=$arr[$count]'>Huỷ</a>
										</td>";
										break;
									case '2':
										echo"<td style='color: #2715bd'> Đơn đã giao</td>";
										echo"<td>	<a class='btn btn-danger' href='nhanhang.php?id_don=$arr[$count]'>Đã nhận</a></td>";
										break;
									case '3':
										echo"<td style='color:#FF1493;'>Đã nhận hàng</td>";
										echo"<td>	<a class='btn btn-danger' href='nhanhang.php?id_don=$arr[$count]'>Đã nhận</a></td>";
										break;
								}
								echo"</tr>";
								$count++;
							}
						?>
						
					</tbody>
				</table>
			</div>		
		</div>
		<div class="row">
			<div class="col-md col-sm">
				<table class="table">
					<thead>
						<tr id="t_td">
							<th scope="col">Mã đơn hàng</th>
							<th scope="col">Tên sản phẩm</th>
							<th scope="col">Đơn giá</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Thanh tiền</th>
						</tr>
					</thead>
					<tbody>			
						<?php  
							for ($i=0; $i < $count; $i++) 
								{ 
								 if($tth[$i]>=0){
									$sqli="SELECT tenhang,ct.dongia,soluong FROM  ctdondathang ct,mathang mh WHERE ct.maddh=$arr[$i] AND ct.mahang=mh.mahang";
										$res=$con->query($sqli);
									while($row=$res->fetch_assoc()){
										$ttien=$row['dongia'] *$row['soluong'];
										echo "<tr>";
										echo "	<td>$arr[$i]</td>
												<td>".$row['tenhang']."</td>
										  		<td>".number_format($row['dongia'])."đ</td>
										  		<td>".$row['soluong']."</td>
										  		<td>".number_format($ttien)."đ</td>
											";
										echo "</tr>";
									}					
						?>
						<tr>
							<td colspan="4" style="text-align: center;color:#cf430d;">Tổng tiền</td>
							<td style="color:#cf430d;"><?php echo number_format($tt[$i]); ?>đ</td>
						</tr>
						<?php 
							}
						}
						
					$con->close(); 
				?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>