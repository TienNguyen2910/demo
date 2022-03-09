<?php session_start();
if(!isset($_SESSION['client'])){
	header("location:login_client.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng</title>
	<meta charset="utf-8">
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
		<div class="row" style="background-color: #0879c9;">
			<div class="col-sm-4">
				<div class="khoi"><img src="img/logo2.png"><a href="index_giohang.php" id="td">Electronic shop</a></div>
			</div>
			<div class="col-sm-6">
				<div class="khoi1">
					<div class="form">
						<i class="fa fa-search"></i>
						<input type="search" class="form-control form-input" placeholder=" Tìm kiếm sản phẩm ở đây" name="keyword" onkeypress="myfunction(this.value)">
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="khoi1">
					<?php
					require 'connect_database.php';
					$id_khach=$_SESSION['id_client'];
					$cau="SELECT * FROM giohang WHERE makhach=$id_khach";
					$result=$con->query($cau);
					$count=0;
					while($result->fetch_assoc()){
						$count++;
					}
					?>
					<a class="btn btn-outline-light" href="giohang.php" id="cart"><i class="fas fa-cart-plus"></i><?php echo $count; ?></a> <!-- cái giỏ hàng -->
				</div>
			</div>
		</div>
	</div> <!-- end thanh tiêu đề -->
	<span id="ctsp">
		<div class="tab2">
			<h4 class='title_giohang'>Giỏ hàng của bạn</h4>
			<table class="table">
				<thead class="table-dark">
					<tr>
						<th colspan="2">STT</th>
						<th id="cot_hinh">Mặt hàng</th>
						<th>Số lượng</th>
						<th>Tên Hàng</th>
						<th>Đơn giá</th>
						<th>Số tiền</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<form id="form1" action="checkout.php" method="POST" enctype="multipart/form-data">
					<tbody>
						<?php 
						$makhach=$_SESSION['id_client'];
						$sql="SELECT gh.id_giohang,gh.mahang,mt.tenhang,mt.dongia,mt.hinhanh,gh.soluong FROM giohang gh,mathang mt WHERE gh.makhach=$makhach AND gh.mahang = mt.mahang";
						$result=$con->query($sql);
						$count=1; $tongtien=0;
						while($rows=$result->fetch_assoc()){
							$hinh="./admin".$rows['hinhanh'];
							$giatien=$rows['soluong'] *$rows['dongia'];
							echo "<tr>";
							echo "  <td><input type='checkbox' form='form1' name='masp[]' value='".$rows['mahang']."'></td>
									<td>$count</td>
									<td><img src='$hinh' width='60%'height='60%'></td>";
							echo "	<form id='form2' action='update_giohang.php' method='GET' enctype='multipart/form-data'>
										<input type='hidden' name='idsp' form='form2' value='".$rows['id_giohang']."'>
									<td><input type='number' name='sl' min='1' form='form2' value='".$rows['soluong']."'></td>";

							echo"		<td>".$rows['tenhang']."</td>
										<td>".number_format($rows['dongia'])."đ</td>
										<td id='price'>".number_format($giatien)."đ</td>
										<td>
											<button type='submit' form='form2' class='nut_upd'><i class='fas fa-pen-fancy'></i>Cập nhật</button>
											<a href='delete_giohang.php?idsp=".$rows['id_giohang']."' class='nut_del'><i class='far fa-trash-alt'></i> Xoá</a>
										</td>";
							echo "	</form>";
							echo "</tr>";
							$count++;
							$tongtien += $giatien;
						}
						echo "<tr>
								<td colspan='5' class='tongtien'>Tổng tiền </td>
								<td colspan='2' id='price'>".number_format($tongtien)."đ</td>
							</tr>";
						?>
						<tr>
							<td colspan='7' id='nut_tt'><input type="submit" class="btn btn-success" form="form1" value="Mua hàng"></td>
						</tr>		
					</tbody>
				</form>
			</table>
		</div>
	</span>
	<!-- Load jquery trước khi load bootstrap js -->
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/myscript.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
</body>
</html>
