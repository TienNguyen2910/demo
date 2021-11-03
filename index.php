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
					<a href="" class="btn btn-outline-light" id="the"><i class="header_nabar_icon far fa-bell"></i>Thông báo</a>
					<a href="" class="btn btn-outline-light"id="the"><i class="header_nabar_icon fas fa-info-circle"></i>Hỗ trợ</a>
					<a  class="btn btn-outline-light" id="the" data-bs-toggle="modal" data-bs-target="#dk_modal">Đăng ký</a>
					|<a  class="btn btn-outline-light" id="the" data-bs-toggle="modal" data-bs-target="#dn_modal">Đăng nhập</a>
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
						<i class="fas fa-cart-plus" id="cart"></i> <!-- cái giỏ hàng -->
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
								<img src="img/banner2.png" class="d-block w-100">
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

		<!-- form đăng ký modal -->
		<div class="modal fade" id="dk_modal" tabindex="-1"  aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Đăng ký</h4>
						<span id="dn" data-bs-toggle="modal" data-bs-target="#dn_modal">Đăng nhập</span>
					</div>
					<div class="modal-body">
						<form action="xuly_dk.php" method="POST" enctype="multipart/form-data" onsubmit="return check()" id="form_dk">
							<div class="row">
								<div class="mb-3">
									<input type="text" class="form-control" id="name" required placeholder="Nhập tên của bạn vào" name="tenkh">
									<span id="ten"></span>
								</div>
							</div>
							<div class="row">
								<div class="mb-3">
									<input type="email" class="form-control" id="email" required placeholder="Nhập email của bạn vào" name="email">
								</div>
							</div>
							<div class="row">
								<div class="mb-3">
									<input type="number" class="form-control" id="phone" required name="phone"  placeholder="Nhập số điện thoại của bạn vào">
									<span id="sdt"></span>
								</div>
							</div>
							<div class="row">
								<div class="mb-3">
									<input type="password" class="form-control" id="pass" required placeholder="Nhập mật khẩu của bạn" name="pass">
									<span id="mk"></span>
								</div>
							</div>
							<div class="row" style="text-align: right">
								<div class="md-3">
									<button type="reset" class="btn btn-secondary">Làm lại</button>
									<button type="submit" class="btn btn-primary" >Đăng ký</button>
								</div>
							</div>
						</div>
						<div class="modal-footer">

						</div>
					</form>
				</div>
			</div> 
		</div><!--  end form đăng ký modal -->
		<!-- form đăng nhập -->
		<div class="modal fade" id="dn_modal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
						<span id="dn" data-bs-toggle="modal" data-bs-target="#dk_modal">Đăng ký</span>
					</div>
					<div class="modal-body">
						<form action="" enctype="multipart/form-data">
							<div class="row">
								<div class="mb-3">
									<input type="email" class="form-control" required name="email" placeholder="Nhập email của bạn vào">
								</div>
							</div>
							<div class="row">
								<div class="mb-3">
									<input type="password" class="form-control" required name="pass" placeholder="Nhập password của bạn vào">
								</div>
							</div>
							<div class="row" style="text-align: right">
								<div class="mb-3">
									<button type="submit" class="btn btn-primary">Đăng nhập</button>
								</div>
							</div>
						</form>
					</div>
					<p id="doan">Hoặc đăng nhập bằng Facebook or Google</p>
					<hr>
					<div class="row lien_ket">
						<div class="col-md-6">
							<a href="" class="btn btn-primary"><i class="fab fa-facebook"></i> Facebook</a>
						</div>
						<div class="col-md-6">
							<a href="" class="btn btn-danger"><i class="fab fa-google-plus-g"></i> Google</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php require 'connect_database.php'; 
		$sql = "SELECT * FROM loaisanpham";
		$result = $con->query($sql);
		$sqli = "SELECT * FROM hangsanxuat";
		$res = $con->query($sqli);
		?>
		<!-- cart item -->
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-md-2">
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
				<div class="col tab2">
					<!-- laptop -->
					<div class="row">
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/dell 5570-5.jpeg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Laptop Dell Inspiron 5570 i7 8550U </h5>
									<p class="card-text" id="price">22,790,000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem;height: 430px;">
								<img src="img/dell i5.jpg" class="card-img-top" height="50%" width="100%">
								<div class="card-body">
									<h5 class="card-title">Laptop Dell Vostro 3568 i5 7200U </h5>
									<p class="card-text" id="price">14,590,000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/dell 1.jpg" class="card-img-top">
								<div class="card-body">
									<h5 class="card-title">Laptop Dell Vostro 3400 70253900 i5-1135G7 </h5>
									<p class="card-text" id="price">22,790,000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
					</div> <!-- end item laptop -->
					<!--  smartphone -->
					<div class="row" style="padding-top: 25px">
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/samsung.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Điện thoại Galaxy S20+</h5>
									<p class="card-text" id="price">14,999,000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/oppo.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Điện thoại Oppo A92</h5>
									<p class="card-text" id="price">5,696,000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/iphone 12.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Điện thoại iPhone 12 Mini</h5>
									<p class="card-text" id="price">13,990,000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
					</div> <!-- end item smartphone -->
					<!--  earphone -->
					<div class="row" style="padding-top: 25px">
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/earpod remax.jpg" class="card-img-top">
								<div class="card-body">
									<h5 class="card-title">Tai nghe Remax TWS-10I True Wireless</h5>
									<p class="card-text" id="price">590.000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/tainghecoday.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Tai nghe VE Monk Plus Mic-U</h5>
									<p class="card-text" id="price">249.000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem; height: 430px;">
								<img src="img/headphone havit.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Tai nghe chụp tai Havit i62</h5>
									<p class="card-text" id="price">450.000₫</p>
									<a href="#" class="btn btn-info" style="margin-left: 5px;"><i class="fas fa-cart-plus"></i></a>
									<a href="#" class="btn btn-primary" onclick="addCart()">Xem chi tiết</a>
								</div>
							</div>
						</div>
					</div>	<!-- end item earphone -->
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