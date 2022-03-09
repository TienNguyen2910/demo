<?php session_start();
if(!isset($_SESSION['client'])){
	header("location:login_client.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap-5.1.1-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap-5.1.1-dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css">
</head>
<body>
	<!-- thanh tiêu đề  -->
	<div class="container-fluid" id="title">
		<div class="row" style="background-color: #0879c9;">
			<div class="col-sm">
				<ul class="nav justify-content-end" id="support">
					<!-- <li class="nav-item"><a href="" class="btn btn-outline-light" id="the"><i class="header_nabar_icon far fa-bell"></i>Thông báo</a></li>
					<li class="nav-item"><a href="" class="btn btn-outline-light" id="the"><i class="header_nabar_icon fas fa-info-circle"></i>Hỗ trợ</a></li> -->
					<li class="nav-item"><div class="dropdown">
						<a class="btn btn-outline-light dropdown-toggle" id="the" data-bs-toggle="dropdown" aria-expanded="false">
							<?php echo $_SESSION['client'] ?>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" id="lsdh" onclick="orders()">Lịch sử đặt hàng</a></li>
							<li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
						</ul>
					</div></li>
				</ul>
			</div>
		</div>
		<div class="row" >
			<div class="col-sm-4">
				<div class="khoi"><img src="img/logo2.png"><a href="index_giohang.php" id="td" style="color:blue;">Electronic shop</a></div>
			</div>
		</div>
	</div> <!-- end thanh tiêu đề -->
	<div id="ctsp">
		<div class="container" style="padding-top: 40px;">
			<?php 
				$idkh=$_SESSION['id_client'];
				require 'connect_database.php';	
			$res=$con->query("SELECT * FROM khachhang WHERE makhach=$idkh");
			$row=$res->fetch_assoc();
			?>
		<div class="row">
			<div class="col-md-6 col-sm">
				<form id="form1" action="xuly_checkout.php" method="POST" enctype="multipart/form-data" >
					<div class="mb-3">
						<input type="text" class="form-control" id="name" required placeholder="Nhập họ tên đầy đủ của bạn vào" value="<?php echo $row['ho_ten']; ?>" name="htenkh">
					</div>
					<div class="mb-3">
						<input type="number" class="form-control"  id="name" required placeholder="Nhập số điện thoại" value="<?php echo $row['dienthoai']; ?>" name="phonekh">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" id="name" required placeholder="Nhập địa chỉ nhận hàng" name="dcnhan">
					</div>
					<div class="mb-3">
						<p style="color:red; text-align: center;">Bạn sẽ phải thanh toán bằng tiền mặt khi nhận hàng</p>
						<input type="submit" class="btn btn-danger" value="Đặt hàng">
					</div>
				</form>
			</div>
			<div class="col-md-6 col-sm">
				<h4>Thông tin đơn hàng</h4>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Tên sản phẩm</th>
							<th scope="col">Đơn giá</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Thanh tiền</th>
						</tr>
					</thead>
					<?php 
						$count=0;
					if(isset($_POST['masp'])){
						foreach ($_POST['masp'] as $key ) {
							$arr[$count]=$key;
							$count++;
						}
						$dem=$count-1;
						
					?>
					<tbody>
						<?php
						$tong=0;
						 do {
						 	
							$sql="SELECT tenhang,dongia,soluong FROM mathang mt, giohang gh WHERE gh.mahang=$arr[$dem] AND mt.mahang=gh.mahang";
							$result=$con->query($sql);
							if($result->num_rows>0){
								$row=$result->fetch_assoc();
								$tt= $row['dongia'] * $row['soluong'];
								$tong+=$tt;
								echo "<tr>";
								echo "	<td>".$row['tenhang']."</td>
									  	<td>".number_format($row['dongia'])."đ</td>
									  	<td>".$row['soluong']."</td>
									  	<td>".number_format($tt)."đ</td>
								";
								echo "</tr>";
							}
							else{
								$res=$con->query("SELECT tenhang,dongia FROM mathang WHERE mahang=$arr[$dem]");
								$row=$res->fetch_assoc();
								$tong= $row['dongia'];
								echo "<tr>";
								echo "	<td>".$row['tenhang']."</td>
									  	<td>".number_format($row['dongia'])."đ</td>
									  	<td>1</td>
									  	<td>".number_format($tong)."đ</td>
								";
								echo "</tr>";
							}
							echo "<input type='hidden' name='masp[]' value='$arr[$dem]' form='form1'>";
							$dem--;
						} while ($dem>=0);
						$con->close();
						?>
						<tr>
							<td colspan="3">Tổng tiền</td>
							<td><?php echo number_format($tong); ?>đ</td>
						</tr>
					<?php 
					} 		?>
						<input type="hidden" name="tt" value="<?php echo $tong ?>" form="form1">
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/myscript.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
</body>
</html>