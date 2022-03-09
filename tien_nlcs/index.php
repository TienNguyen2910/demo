<!DOCTYPE html>
<html>
<head>
	<title>Electronic Shop</title>
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
				<div id="support">
					<!-- <a href="" class="btn btn-outline-light" id="the"><i class="header_nabar_icon far fa-bell"></i>Thông báo</a>
					<a href="" class="btn btn-outline-light"id="the"><i class="header_nabar_icon fas fa-info-circle"></i>Hỗ trợ</a> -->
					<a  class="btn btn-outline-light" id="the" href="register_client.html">Đăng ký</a>
					|<a  class="btn btn-outline-light" id="the" href="login_client.html">Đăng nhập</a>
				</div>
			</div>
		</div>
		<div class="row" style="background-color: #0879c9;">
			<div class="col-sm-4">
				<div class="khoi"><img src="img/logo2.png"><a href="index.php" id="td">Electronic shop</a></div>
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
						<a href="giohang.php" class="btn btn-outline-light" id="cart"><i class="fas fa-cart-plus"></i></a> <!-- cái giỏ hàng -->
					</div>
				</div>
		</div>
	</div> <!-- end thanh tiêu đề -->
	<span id="ctsp">
		<!-- Tạo slideshow quảng cáo -->
		<div class="container" style="padding-top:20px;"> 
			<div class="row">
				<div class="col-sm-12">
					<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="img/banner1.png" class="d-block w-100" >
							</div>
							<div class="carousel-item">
								<img src="img/banner2.jpg" class="d-block w-100">
							</div>
							<div class="carousel-item">
								<img src="img/banner3.jpg" class="d-block w-100">
							</div>
							<div class="carousel-item">
								<img src="img/banner4.jpg" class="d-block w-100">
							</div>
						</div>	
					</div>	
				</div>
			</div>
		</div>  <!-- end slideshow quảng cáo -->

		<?php require 'connect_database.php'; 
		$sql = "SELECT * FROM loaisanpham";
		$result = $con->query($sql);
		$sqli = "SELECT * FROM hangsanxuat";
		$res = $con->query($sqli);
		?>
		<!-- cart item -->
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-md-2 col-sm-6">
					<div class="list-group" id="listItem">
						<a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
							Danh mục
						</a>
						<?php while($rows=$result->fetch_assoc()){ 
							echo	"<a class='list-group-item list-group-item-action catalog' onclick='search_catalog(".$rows['maloai'].")'>".$rows['tenloai']."</a> ";
						}
						?>
					</div>
					<div class="list-group" id="listItem" style="margin-top: 10px;">
						<a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
							Thương hiệu
						</a>
						<?php while($rows=$res->fetch_assoc()){ 
							echo	"<a class='list-group-item list-group-item-action catalog' onclick='search_brand(".$rows['mahsx'].")'>".$rows['tenhsx']."</a> ";
						}
						?>
					</div>
				</div>
				<div class="col-md-10 col-sm-6 tab2">
					<!-- laptop -->
					<div class="row">
						<?php 
							$caulenh ="SELECT * FROM mathang";
							$result=$con->query($caulenh);
							while($rows=$result->fetch_assoc()){
						?>
						<div class="col-md-4 col-sm">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="<?php echo "admin/".$rows['hinhanh'] ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?php echo $rows['tenhang'] ?></h5>
									<p class="card-text" id="price"><?php echo number_format($rows['dongia'])."đ" ?></p>
									<a href="index_giohang.php" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<?php echo
									"<a onclick='product_detail(".$rows['mahang'].")' class='btn btn-primary'>Xem chi tiết</a>"; ?>
								</div>
							</div>
						</div>			
						<?php } 
							$con->close();
						?>
					</div> <!-- end item laptop -->
				</div>
			</div>
		</div>
		<!-- end cart item -->
	
		<!-- copyright -->
	<div class="container-fluid thanks">
		<div class="row">
				<p class="text-center">© 2021 Electrocnic Shop. All rights reserved. Thanks for visit website</p>
		</div>
	</div>
	<!-- //copyright -->
	</span>
		<!-- Load jquery trước khi load bootstrap js -->
		<script type="text/javascript" src="bootstrap-5.1.1-dist/js/myscript.js"></script>
		<script type="text/javascript" src="bootstrap-5.1.1-dist/js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>

</body>
</html>