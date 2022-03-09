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
	<?php 
	$keyword = $_GET['u'];
	//echo $keyword;
	require 'connect_database.php';
	$sql = "SELECT mahang,tenhang, dongia,hinhanh,mota  FROM  mathang where tenhang LIKE '$keyword%' ";
	$result = $con ->query($sql);
	echo "<div class='row'>";
	while($rows=$result->fetch_assoc()){
		echo "<div class='col-md-4'>
				<div class='card' style='width: 18rem; height: 430px;'>";
		echo				"<img src='admin/".$rows['hinhanh']."' class='card-img-top' alt=''>";
		echo					"<div class='card-body'> ";
		echo						"<h5 class='card-title'>".$rows['tenhang']."</h5>";
		echo						"<p class='card-text' id='price'>".number_format($rows['dongia'])."đ</p>";
		echo						"<a href='#' class='btn btn-info' style='margin-left: 5px;''><i class='fas fa-cart-plus'></i></a>
									<a onclick='product_detail(".$rows['mahang'].")' class='btn btn-primary'>Xem chi tiết</a>
								</div>
				</div>
			</div>";
	}
	echo "</div>";
	?>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/myscript.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
</body>
</html>